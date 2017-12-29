<?php
include_once 'authenticate.php';
include_once 'controller.php';

class FriendController{
    public function getIndex($auth_session_id, $db)
    { //Authenticate the user and get their friends.
        if (auth($auth_session_id)) {
            $stmt = $db->prepare("SELECT friend_id FROM friends WHERE user_id = ?");
            $stmt->bindParam(1, $auth_session_id);

            if ($friend = $stmt->execute()) {
                return $friends = $friend;
            }
        }
    }

    public function friendRequests($auth_session_id, $db)
        { //Authenticate the user and get their friend requests.
            if (auth($auth_session_id)) {
                $stmt = $db->prepare("SELECT friend_id FROM friends WHERE user_id = ? AND accepted = '0'");
                $stmt->bindParam(1, $auth_session_id);

                if ($request = $stmt->execute()) {
                    return $requests = $request;
                }
            }

        }

    public function getAdd($auth_user_id, $user_username, $user_user_id, $db)
    { //Authenticate the user and get their friend requests.
        if (auth($user_username)) {
            $stmt = $db->prepare("SELECT id FROM users WHERE username = ?");
            $stmt->bindParam(1, $user_username);

            $id = $stmt->execute();


            if($auth_user_id == $id){
                General::redirectToHome();
            }else{ //check to see if either the suth user or the user has a friend request pending from the other.
                $stmt_request_pending = $db->prepare("SELECT * FROM friends WHERE user_id = ? AND friend_id = $user_user_id");
                $stmt_request_pending->bindParam(1, $auth_user_id);
                $stmt_request_pending->bindParam(2, $user_user_id);

                $request_pending = $stmt->execute();


                if($request_pending['accepted'] !== 0 && $request_pending['user_id'] == $auth_user_id && $request_pending['friend_id'] == $user_user_id){
                    General::redirectToHome();
                }else{ //If the auth user tries manuelly add the user in the url bar using 'friends/add/{username}' then it will redirect to the profile pager
                    $stmt_friends_with = $db->prepare("SELECT accepted FROM friendss WHERE user_id = ? AND friend_id = $user_user_id");
                    $stmt_friends_with->bindParam(1, $auth_user_id);
                    $stmt_friends_with->bindParam(2, $user_user_id);

                    $friends_with = $stmt->execute();


                    if($request_pending == 1){
                        General::redirectToHome();
                    } else{

                    }
                }
            }


        }

    }
    public function get_add($username, $db){
        $user = User::where('username', $username)->first();
        if(!$user){
            return redirect()->route('home')
                ->with('info', 'That user could not be find. Please try again');
        }

        if(Auth::user()->id === $user->id){ //If the user is trying to add themselves in the url bar by adding friends/add/{username} then redirect them back
            return redirect()->route('home');
        }

        if(Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user())){ //check to see if either the suth user or the user has a friend request pending from the other.
            redirect()->
            route('profile.index', ['username' => $user->username])
                ->with('info', 'Friend request already pending.');
        }

        if(Auth::user()->isFriendsWith($user)){ //If the auth user tries manuelly add the user in the url bar using 'friends/add/{username}' then it will redirect to the profile pager
            return redirect()
                ->route('profile.index', ['username' => $user->username])
                ->with('info', 'You are already friends.');
        }

        Auth::user()->addFriend($user);

        return redirect()->route('profile.index', ['username' => $username])
            ->with('info', 'Friend request sent');
    }

    public function getAccept($username){
        $user = User::where('username', $username)->first();
        if(!$user){
            return redirect()
                ->route('home')
                ->with('info', 'That user could not be found');
        }

        if(!Auth::user()->hasFriendRequestReceived($user)){ //If the user is trying to accept a user that no request was sent redirect them.
            return redirect()->route('home');
        }

        Auth::user()->acceptFriendRequest($user);

        return redirect()
            ->route('profile.index', ['username' => $username]);
    }

    public function postDelete($username){
        $user = User::where('username', $username)->first();
        if(!Auth::user()->isFriendsWith($user)){ //If the auth user tries manuelly add the user in the url bar using 'friends/add/{username}' then it will redirect to the profile pager
            return redirect()->back();
        }

        Auth::user()->deleteFriend($user);

        return redirect()->back()->with('info', 'Friend deleted');
    }
}

?>
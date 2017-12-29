<?php
require_once 'external/core.inc.php';
    //send a friend request
    if(isset($_POST['add_friend_auth_id']) && isset($_POST['add_friend_user_id']) && isset($_POST['token']) && !empty($_POST['add_friend_auth_id']) && !empty($_POST['add_friend_user_id']) && !empty($_POST['token'])){
        $auth = $_POST['add_friend_auth_id'];
        $user = $_POST['add_friend_user_id'];
        $token = $_POST['token'];

        if(Token::check($token)){
            if(User::addFriend($auth, $user, $time, $db)){}else{User::addFriend($user, $auth, $time, $db);}
            Notifications::create(1, $user, $auth, '', '', '', $time, '', $db);

            header('Location: profile_template_user.php?page_id='.$user);
        }
    }

    //accept a friend request
    if(isset($_POST['accept_friend_auth_id']) && isset($_POST['accept_friend_user_id']) && isset($_POST['token']) && !empty($_POST['accept_friend_auth_id']) && !empty($_POST['accept_friend_user_id']) && !empty($_POST['token'])){
        $auth = $_POST['accept_friend_auth_id'];
        $user = $_POST['accept_friend_user_id'];
        $token = $_POST['token'];

        if(Token::check($token)){
            if(User::acceptFriendRequest($auth, $user, $time, $db)){}else{User::acceptFriendRequest($user, $auth, $time, $db);}
        }
    }

    //cancel a friend request sent
    if(isset($_POST['cancel_friend_auth_id']) && isset($_POST['cancel_friend_user_id']) && isset($_POST['token']) && !empty($_POST['cancel_friend_auth_id']) && !empty($_POST['cancel_friend_user_id']) && !empty($_POST['token'])){
        $auth = $_POST['cancel_friend_auth_id'];
        $user = $_POST['cancel_friend_user_id'];
        $token = $_POST['token'];

        if(Token::check($token)){
            if(User::cancelFriend($auth, $user, $db)){
                notifications::delete_friend_request($auth, $user, $db);
            }else{
                User::cancelFriend($user, $auth, $db); echo '2';
                notifications::delete_friend_request($auth, $user, $db);
            }

            header('Location: profile_template_user.php?page_id='.$user);
        }

    }

    //delete a friend
    if(isset($_POST['delete_friend_auth_id']) && isset($_POST['delete_friend_user_id']) && isset($_POST['token']) && !empty($_POST['delete_friend_auth_id']) && !empty($_POST['delete_friend_user_id']) && !empty($_POST['token'])){
        $auth = $_POST['delete_friend_auth_id'];
        $user = $_POST['delete_friend_user_id'];
        $token = $_POST['token'];

        if(Token::check($token)){
            if(User::deleteFriend($auth, $user, $db)){}else{User::deleteFriend($user, $auth, $db);}
            header('Location: profile_template_user.php?page_id='.$user);
        }
    }
?>
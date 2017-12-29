<?php
session_start();
require_once '../../external/connect.inc.php';
require_once '../../controllers/controller_mods/user.php';
require_once '../../controllers/controller_mods/chat.php';
require_once '../../controllers/controller_mods/token.php';
require_once '../../controllers/smiley.php';

if(isset($_GET['task']) && $_GET['task'] == 'get_chat_friend'){
    $auth_id = $_GET['auth_id'];
    $user_id = $_GET['friend_id'];
    $time = $_GET['timestamp'];

    $token = $_GET['token'];

    if(Token::ajax_check($token)){
        $chats = Chat::get_friend_chat($auth_id, $user_id, $db);

        if(!isset($chats) || empty($chats)){
            Chat::create_chat($auth_id, $user_id, $time, $db);
            $chats = Chat::get_friend_chat($auth_id, $user_id, $db);
        }

        foreach($chats as $key => $chat){
            $messages = Chat::get_messages(htmlspecialchars($chat['id']), $db);

            if($messages > 0){
                foreach($messages as $key2 => $message){
                    $user_id = htmlspecialchars($message['user1_id']);
                    $chat_text = htmlspecialchars($message['chat_text']);
                    $time = htmlspecialchars($message['updated_at']);

                    $user_info = User::getFullUserInfo($user_id, $db);
                    foreach($user_info as $key5 => $user_i){
                        foreach($user_i as $key6 =>$user){
                            $message_user_id = htmlspecialchars($user->id);
                            $user_profile_img = User::getUserProfileImage(htmlspecialchars($user->profile_image_upload_location));
                            $user_name = User::getNameOrUsername(htmlspecialchars($user->username), htmlspecialchars($user->firstname), htmlspecialchars($user->surname));
                        }
                    }
                    require '../../external/block/chat/messageblock.php';
                }
            }else{
                return '';
            }
        }
    }
}

if(isset($_GET['task']) && $_GET['task'] == 'chat_friend_search'){
    $auth_id = $_GET['auth_id'];
    $search = $_GET['search'];

    $token = $_GET['token'];

    if(Token::ajax_check($token)){
        $friends = User::showFriends($auth_id, $db);

        foreach($friends as $key => $friend){
            if($friend['user_id'] == $auth_id){
                $friend_id = $friend['friend_id'];
            }else{
                $friend_id = $friend['user_id'];
            }

            $results = User::searchFriends($friend_id, $search, $db);

            if(isset($results) && !empty($results)){
                $friend_id = htmlspecialchars($results[0]['id']);
                $friend_profile_img = User::getUserProfileImage(htmlspecialchars($results[0]['profile_image_upload_location']));
                $friend_name = User::getNameOrUsername(htmlspecialchars($results[0]['username']), htmlspecialchars($results[0]['firstname']), htmlspecialchars($results[0]['surname']));
                require '../../external/block/chat/chat_friend_list_block.php';
            }
        }
    }
}

if(isset($_POST['task']) && $_POST['task'] == 'input_message'){
    $auth_id = $_POST['auth_id'];
    $user_id = $_POST['friend_id'];
    $chat_text = $_POST['message'];
    $time = $_POST['timestamp'];

    if(isset($auth_id) && isset($user_id) && isset($chat_text) && !empty($auth_id) && !empty($user_id) && !empty($chat_text)){

        $token = $_POST['token'];

        if(Token::ajax_check($token)){
            $chats = Chat::get_friend_chat($auth_id, $user_id, $db);
            foreach($chats as $key1=> $chat){
                $chat_id = $chat['id'];
                if(Chat::insert_message($auth_id, $user_id, $time, $chat_text, $chat_id, $db)){
                    Chat::notify_user($chat_id, $user_id, $time, $db);
                    $user_info = User::getFullUserInfo($auth_id, $db);
                    foreach($user_info as $key5 => $user_i){
                        foreach($user_i as $key6 =>$user){
                            $message_user_id = $user->id;
                            $user_profile_img = User::getUserProfileImage(htmlspecialchars($user->profile_image_upload_location));
                            $user_name = User::getNameOrUsername(htmlspecialchars($user->username), htmlspecialchars($user->firstname), htmlspecialchars($user->surname));
                        }
                    }

                    require '../../external/block/chat/messageblock.php';
                }
            }
        }
    }
}
?>
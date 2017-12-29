<?php
    $auth_id = $user_id;
    $chats = Chat::get_user_chats($auth_id, $db);
    foreach($chats as $key => $chat){
        if($chat['user1_id'] == $auth_id){
            $friend_id = htmlspecialchars($chat['user2_id']);
        }else{
            $friend_id = htmlspecialchars($chat['user1_id']);
        }

        $user_info = User::getFullUserInfo($friend_id, $db);
        foreach($user_info as $key2 => $user_i){
            foreach($user_i as $key3 =>$user){
                $friend_profile_img = User::getUserProfileImage($user->profile_image_upload_location);
                $friend_name = User::getNameOrUsername($user->username, $user->firstname, $user->surname);
                require 'external/block/chat/chat_friend_list_block.php';
            }
        }
    }
?>
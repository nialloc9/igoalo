<?php
$count = Status::getRepliesCount(htmlspecialchars($status->id), $db);
$statuses = Status::getReplies(htmlspecialchars($status->id), 0, $db);
if(isset($statuses) && !empty($statuses)){
    foreach($statuses as $key => $user_status){
        foreach($user_status as $key2 => $status){
            if(htmlspecialchars($status->parent_id) > 0){
                $user_info = User::getFullUserInfo(htmlspecialchars($status->user_id), $db);
                $likes = Like::like_counter(htmlspecialchars($status->id), $db);

                foreach($user_info as $user_key => $users){
                    foreach($users as $user_key2 => $user){
                        $user = $user;
                    }
                }
                require 'ajax_replyblock.php';
            }
        }
    }
}
?>

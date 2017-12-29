<?php
$friends = User::showFriends($page_id, $db);

foreach($friends as $key => $friend){
    $user_id = $friend['user_id'];
    $my_friend = $friend['friend_id'];

    if($user_id == $page_id){
        $friend_id = $my_friend;
    }else{
        $friend_id = $user_id;
    }

    $user_friend = User::getFullUserInfo($friend_id, $db);
    foreach($user_friend as $key3 => $user_f){
        foreach($user_f as $key4 => $user){
            echo "<div class='col-sm-2'>";
            require 'external/block/friendblock.php';
            echo "</div>";
        }
    }
}
?>
<?php
    $friends = User::show_6_friends($page_id, $db);

    foreach($friends as $key => $friend){
            $u_id = $friend['user_id'];
            $my_friend = $friend['friend_id'];

        if($u_id == $user_page){
            $friend_id = $my_friend;
        }else{
            $friend_id = $u_id;
        }
        $user_friend = User::getFullUserInfo($friend_id, $db);
        foreach($user_friend as $key3 => $user_f){
            foreach($user_f as $key4 => $user){

                echo "<div class='col-sm-6'>";
                    require 'external/block/friendblock.php';
                echo "</div>";
            }
        }
    }
?>
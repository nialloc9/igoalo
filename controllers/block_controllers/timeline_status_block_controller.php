<?php
$friends_array = User::showFriends($user_id, $db);
$group_array = Groups::show_groups_user_is_a_member_of($user_id, $db);


$n = sizeof($friends_array);
$ng = sizeof($group_array);

$friends = [];
$groups = [];

for ($i=0; $i < $n || $i < $ng; $i++) {
    if($friends_array[$i]['friend_id'] == $user_id){
        $friend = $friends_array[$i]['user_id'];
    }else{
        $friend = $friends_array[$i]['friend_id'];
    }

    if(isset($friend) && !empty($friend)){
        $friend_id = $friend;
    }

    $group = $group_array[$i]['group_id'];

    if(isset($group) && !empty($group)){
        $group_id = $group;
    }

    array_push($friends, $friend_id);
    array_push($groups, $group_id);
}


$status_timeline = Status::t_status($friends, $groups, $user_id, 0, 10, $db);
    foreach($status_timeline as $key4 => $status){
        $status_edit = $status;
        if($status['parent_id'] < 1){
            $user_info = User::getFullUserInfo(htmlspecialchars($status['user_id']), $db);
            $likes = Like::like_counter(htmlspecialchars($status['id']), $db);
            foreach($user_info as $user_key => $users){
                foreach($users as $user_key2 => $user){
                    $user = $user;
                }
            }
            if(!isset($user->profile_image_upload_location) || empty($user->profile_image_upload_location)){
                $user_profile_status_image = 'images/no_profile_picture.jpg';
            }else{
                $user_profile_status_image = htmlspecialchars($user->profile_image_upload_location);
            }

            if(isset($status['group_status'])){
                $group = Groups::show_group_by_id(htmlspecialchars($status['group_status']), $db); htmlspecialchars($status['group_status']);
                foreach($group as $a => $group_info){
                    $group = $group_info;
                }
            }
            
            if(isset($status['group_id'])){
                $group = Groups::show_group_by_id(htmlspecialchars($status['group_id']), $db); htmlspecialchars($status['group_id']);
                foreach($group as $a => $group_info){
                    $group = $group_info;
                }
            }

            if(isset($status['group_status'])){
                $group = Groups::show_group_by_id(htmlspecialchars($status['group_status']), $db); htmlspecialchars($status['group_status']);
                foreach($group as $a => $group_info){
                    $group = $group_info;
                }
            }


            $page_post_info = User::get_status_post_page_user_info($status['user_id'] , $status['page_id'], $group, $db);
            $page_post_user = $page_post_info[0][0];

            require 'ajax/ajax_resources/infinite_scroll_timeline_statusblock.php';
        }
    }

?>


<?php
if(isset($_POST['status_type_edit']) && !empty($_POST['status_type_edit']) && isset($_POST['status_id_edit']) && !empty($_POST['status_id_edit'])){
    $status_type = $_POST['status_type_edit'];
    $status_id = $_POST['status_id_edit'];
    $updated_at = $time;

    if((isset($_POST['status_body_edit']) && !empty($_POST['status_body_edit']))){
        $body = $_POST['status_body_edit'];
    }else{
        $body = '';
    }

    if((isset($_POST['status_image_edit']) && !empty($_POST['status_image_edit']))){
        $image = $_POST['status_image_edit'];
    }else{
        $image = '';
    }

    if((isset($_POST['status_video_edit']) && !empty($_POST['status_video_edit']))){
        $video = $_POST['status_video_edit'];
    }else{
        $video = '';
    }

    if((isset($_POST['status_attachment_edit']) && !empty($_POST['status_attachment_edit']))){
        $attachment = $_POST['status_attachment_edit'];
    }else{
        $attachment = '';
    }

    Status::update($status_id, $body, $attachment, $image, $video, $updated_at, $db);
    header('Location: home.php?page_id='.$_SESSION['user_id']);
}
?>
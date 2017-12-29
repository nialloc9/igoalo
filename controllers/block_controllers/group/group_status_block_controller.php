<?php
$statuses = Status::group_page_paginate(0, 10, $group['id'], $db);
foreach($statuses as $key => $user_status){
    foreach($user_status as $key2 => $status){
        $status = $status;
        $status_edit = $status;
        if($status->parent_id < 1){
            $user_info = User::getFullUserInfo($status->user_id, $db);
            $likes = Like::like_counter($status->id, $db);
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
            require 'external/block/statusblock.php';
        }
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
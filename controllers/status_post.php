<?php
if(isset($user_user_id) && isset($user_id) && !empty($user_user_id) && !empty($user_id) && isset($_POST['status_body'])){
    if(isset($_POST['parent_id']) && !empty($_POST['parent_id'])){
        $parent_id = $_POST['parent_id'];
    }else{
        $parent_id = '';
    }


    if(isset($_POST['attachment']) && !empty($_POST['attachment'])){
        $attachment = $_POST['attachment'];
    }else{
        $attachment = '';
    }

    if(isset($_POST['status_image']) && !empty($_POST['status_image'])){
        $image = $_POST['status_image'];
    }else{
        $image = '';
    }

    if(isset($_POST['status_video']) && !empty($_POST['status_video'])){
        $video = $_POST['status_video'];
    }else{
        $video = '';
    }
    $status_body = $_POST['status_body'];
    Status::insert($user_id, $parent_id, $user_user_id, $status_body, $attachment, $image, $video, $time, $db);
}
?>
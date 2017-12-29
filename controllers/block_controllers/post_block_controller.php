<?php
//This is for the model that uploads a pic with the status
if($user_id == $page_id){
    $user_user_id = $user_id;
}else{
    $user_user_id = $page_id;
}

$user_info = User::getFullUserInfo($user_user_id, $db);

if(isset($_POST['status_body']) || isset($_POST['status_image']) || isset($_POST['status_video']) || isset($_POST['status_attachment'])) {
    if(!empty($_POST['status_body']) || !empty($_POST['status_image']) || !empty($_POST['status_video']) || !empty($_POST['status_attachment'])) {
        if (isset($user_user_id) && isset($user_id) && !empty($user_user_id) && !empty($user_id)) {

            if (isset($_POST['status_body']) && !empty($_POST['status_body'])) {
                $body = $_POST['status_body'];
                $status_body = str_replace("\n", "<br>", $body);
            } else {
                $status_body = '';
            }

            if (isset($_POST['parent_id']) && !empty($_POST['parent_id'])) {
                $parent_id = $_POST['parent_id'];
            } else {
                $parent_id = '';
            }


            if (isset($_POST['attachment']) && !empty($_POST['attachment'])) {
                $attachment = $_POST['attachment'];
            } else {
                $attachment = '';
            }

            if (isset($_POST['status_image']) && !empty($_POST['status_image'])) {
                $image = $_POST['status_image'];
            } else {
                $image = '';
            }

            if (isset($_POST['status_video']) && !empty($_POST['status_video'])) {
                $video = $_POST['status_video'];
            } else {
                $video = '';
            }

            Status::insert($user_id, $parent_id, $user_user_id, $status_body, $attachment, $image, $video, $time, $db);
        }
    }
}


?>
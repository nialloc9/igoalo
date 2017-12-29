<?php
if(isset($_POST['reply_text']) || isset($_POST['attachment']) || isset($_POST['status_image']) || isset($_POST['status_video'])){
    if(!empty($_POST['reply_text']) || !empty($_POST['attachment']) || !empty($_POST['status_image']) || !empty($_POST['status_video'])){
        if(isset($_POST['status_id']) && isset($_POST['status_token']) && isset($_POST['page_id']) && isset($_POST['post_user_id']) && isset($_POST['time'])){
            if(!empty($_POST['status_id']) && !empty($_POST['status_token']) && !empty($_POST['page_id']) && !empty($_POST['post_user_id']) && !empty($_POST['time'])){
                $body = $_POST['reply_text'];
                $attachment = $_POST['attachment'];
                $image = $_POST['status_image'];
                $video = $_POST['status_video'];
                $status_id = $_POST['status_id'];
                $token = $_POST['status_token'];
                $page_id = $_POST['page_id'];
                $user_id = $_POST['post_user_id'];
                $time = $_POST['time'];

                Status::insert($user_id, $status_id, $page_id, $body, $attachment, $image, $video, $time, '', '', '', $db);
            }
        }
    }
}
?>
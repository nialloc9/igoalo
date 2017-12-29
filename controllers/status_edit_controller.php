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

    $token = $_POST['status_edit_token'];

    if(Token::check($token)){
        Status::update($status_id, $body, $attachment, $image, $video, $updated_at, $db);
        header('Location: home.php?page_id='.$_SESSION['user_id']);
    }
}
?>
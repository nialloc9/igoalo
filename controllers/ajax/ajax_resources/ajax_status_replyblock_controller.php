<?php
if(isset($_POST['ajax_reply_status']) && isset($_POST['ajax_reply_status_parent_id']) && !empty($_POST['ajax_reply_status']) && !empty($_POST['ajax_reply_status_parent_id'])){

    $status = $_POST['ajax_reply_status'];
    $parent_id = $_POST['ajax_reply_status_parent_id'];
    $user_id = $_POST['ajax_reply_status_user_id'];
    $page_id = $_POST['ajax_reply_status_page_id'];
    $time = $_POST['ajax_reply_status_posted_at'];

    echo 'Token: '.$_POST['ajax_reply_token'];

    $token = $_POST['ajax_reply_token'];

    if(Token::ajax_check($token)){
        Status::insert($user_id, $parent_id, $page_id, $status, '', '', '', $time, '', '', '', $db);
    }

}
?>
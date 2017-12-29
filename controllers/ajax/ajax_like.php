<?php
session_start();
$like_time = $time = date('Y-m-d G:i:s');
$type = $_POST['type'];
$user_id = $_POST['user_id'];
if(isset($_POST['task']) && $_POST['task'] == 'like'  && isset($_POST['id'])){
    require_once '../external/connect.inc.php';
    require_once '../controllers/controller_mods/like.php';
    require_once '../controllers/controller_mods/token.php';

    $token = $_POST['token'];
    if(Token::ajax_check($token)){
        Like::likeable($type, $_POST['id'], $like_time, $user_id, $db);
    }
}

?>


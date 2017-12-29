<?php
$like_time = $time = date('Y-m-d G:i:s');
$type = $_POST['type'];
$user_id = $_POST['user_id'];
if(isset($_POST['task']) && $_POST['task'] == 'like'  && isset($_POST['id'])){
    require_once '../external/connect.inc.php';
    require_once '../controllers/controller_mods/like.php';
    require_once '../controllers/controller_mods/token.php';
    require_once '../controllers/controller_mods/notifications.php';
    require_once '../controllers/controller_mods/status.php';

    $token = $_POST['token'];
    if(Token::ajax_check($token)){
        if(Like::likeable($type, $_POST['id'], $like_time, $user_id, $db)){

            $status_info = Status::get_status_info($_POST['id'], $db);
            $status = $status_info[0][0];
            notifications::create(8, $status->user_id, $user_id, $status->group_id, $status->id, '', $like_time, '', $db);
        }else{

        }
    }
}else{
    echo 'Data Not found';
}

?>


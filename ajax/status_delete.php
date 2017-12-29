<?php
session_start();
if(isset($_POST['task']) && $_POST['task'] =='status_delete') {
    require_once '../external/connect.inc.php';
    require_once '../controllers/controller_mods/status.php';
    require_once '../controllers/controller_mods/token.php';

    $token = $_POST['token'];

    if(Token::ajax_check($token)){
        if(class_exists('Status')){
            if(Status::delete($_POST['status_id'], $db)){

            }else{

            }
        }
    }
}
?>
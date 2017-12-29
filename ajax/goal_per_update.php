<?php
session_start();
require_once '../controllers/controller_mods/token.php';
if(isset($_POST['task']) && $_POST['task'] == 'goal_per_update'){
    $id = $_POST['id'];
    $per = $_POST['per'];
    $completed = $_POST['completed'];
    $time = $_POST['time'];
    $token = $_POST['token'];

    if(Token::check($token)){
        require_once '../external/connect.inc.php';
        require_once '../ajax/ajax_resources/ajax_update_per_btn.php';
    }
}
?>
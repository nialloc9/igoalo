<?php
session_start();
    if(isset($_POST['task']) && $_POST['task'] == 'unlike'){
        require_once '../external/connect.inc.php';
        require_once '../controllers/controller_mods/like.php';
        require_once '../controllers/controller_mods/token.php';

        $token = $_POST['token'];

        if(Token::ajax_check($token)){
            Like::delete_like($_POST['id'], $db);
        }
    }
?>

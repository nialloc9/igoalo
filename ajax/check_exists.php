<?php
require_once '../external/connect.inc.php';
require_once '../controllers/controller_mods/user.php';

if(isset($_GET['task']) && $_GET['task'] == 'check_email'){
    $count = User::val_email($_GET['email'], $db);

    if($count == false){
        echo '0';
    }else{
        echo '1';
    }
}

if(isset($_GET['task']) && $_GET['task'] == 'check_username'){
    $count = User::val_username($_GET['username'], $db);

    if($count == false){
        echo '0';
    }else{
        echo '1';
    }
}
?>
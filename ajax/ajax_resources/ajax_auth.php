<?php
function auth($s_id){
    if(!isset($s_id) || empty($s_id)){
        session_destroy();
        header('Location: ../mainPage.php');
    }else{
        return true;
    }
}
?>
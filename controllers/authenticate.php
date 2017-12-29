<?php
function auth($s_id){
    if(!isset($s_id)){
        header('Location: index.php');
    }else{
        return true;
    }
}
?>
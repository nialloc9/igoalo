<?php

if(!isset($_POST['secure'])){
    $_SESSION['secure'] = rand(1000,9999);
}else{
    if($_SESSION['secure'] == $_POST['secure']){

    }else{
        $_SESSION['secure'] = rand(1000,9999);
    }
}


?>

<!--
    We start a session here that stores a random value between 1000 and 9999 with the name secure.
    We tell the browser if the value secure stored in the session is the same as the one POSTed by the user then eecho good.
    If not then echo please enter the correct number and then this is important it creates a new number to enter.
--><?php

if(!isset($_POST['secure'])){
    $_SESSION['secure'] = rand(1000,9999);
}else{
    if($_SESSION['secure'] == $_POST['secure']){;
    }else{
        $_SESSION['secure'] = rand(1000,9999);
    }
}


?>

<!--
    We start a session here that stores a random value between 1000 and 9999 with the name secure.
    We tell the browser if the value secure stored in the session is the same as the one POSTed by the user then eecho good.
    If not then echo please enter the correct number and then this is important it creates a new number to enter.
-->
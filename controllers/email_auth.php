<?php
//POST variables

if(isset($_POST['token']) && !empty($_POST['token'])){
    //POST VARIABLES
    $csrf_token = $_POST['token'];
    $time = $_POST['time'];

    //GET VARIABLES
    $email = $_GET['e'];
    $token = $_GET['t'];
    $auth_id = $_GET['i'];

    if(token::check($csrf_token)){
        if(user::verify_email_request_confirmation($email, $auth_id, $token, $db)){
            if(user::verify_email($auth_id, $db)){
                $success_message = "Email Verified.";
            }else{
                $error = "Could not verify email";
            }
        }else{
            $error = $email.$token.$auth_id;
        }
    }else{
        $error = "Could not activate";
    }
}

?>
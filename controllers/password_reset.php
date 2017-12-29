<?php
if(isset($_POST['password_reset']) && isset($_POST['password_reset_again'])){
    if(!empty($_POST['password_reset']) && !empty($_POST['password_reset_again'])){
        if($_POST['password_reset'] == $_POST['password_reset_again']){
            //POST variables
            $password = $_POST['password_reset'];
            $csrf_token = $_POST['token'];
            $time = $_POST['time'];

            //GET variables
            $email = $_GET['email'];
            $token = $_GET['token'];
            $auth_id = $_GET['id'];

            if(token::check($csrf_token)){
                if(user::forgotton_pass_confirmation($email, $auth_id, $token, $db)){
                    if(user::update_password($auth_id, $password, $db)){
                        $success_message = "Password successfully updated.";
                    }
                }
            }
        }else{
            $error = "Passwords do not match.";
        }
    }else{
        $error = "Please fill in all fields.";
    }
}
?>
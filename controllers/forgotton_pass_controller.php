<?php
if(isset($_POST['fp_username']) && isset($_POST['fp_email']) && isset($_POST['copchaImage']) && isset($_POST['time']) && isset($_POST['token'])){
    if(!empty($_POST['fp_username']) && !empty($_POST['fp_email']) && !empty($_POST['copchaImage']) && !empty($_POST['time']) && !empty($_POST['token'])){
        $username = $_POST['fp_username'];
        $email = $_POST['fp_email'];
        $capcha = $_POST['copchaImage'];
        $token = $_POST['token'];
        $time = $_POST['time'];
        if(token::check($token)){
            if($capcha == $_SESSION['secure']){
                $auth = user::get_id_from_email_and_username($username, $email, $db);
                $auth = $auth['id'];
                $auth_id = htmlspecialchars($auth);

                if(isset($auth_id) && !empty($auth_id)){
                    if(User::forgotton_pass_request($email, $auth_id, $token, $time, $db)){
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        // More headers
                        $headers .= 'From: noreply@igoalo.com' . "\r\n";
                        $headers .= "X-MSMail-Priority: High\r\n";

                        $subject = "iGoalo password reset request.";

                        $to = "Dear ".$username;
                        $body = "<br><br>iGoalo.com password reset received. If you did not request this please report this to iGoalo. If
                                 you did request a password reset follow the link below: <br><br>";
                        $link = "www.igoalo.com/password_reset.php?token=".urlencode($token)."&email=".$email."&id=".$auth_id;

                        $from = "<br><br>The iGoalo team";
                        $tag = "<br><br>Every goal is a step closer to where you want to be.\n\n".$from;
                        $message = $to.$body.$link.$tag;


                        mail($email,$subject,$message,$headers);

                        $success_message = "Email has been sent to the following email: ".$email;
                    }
                }
            }
        }
    }else{
        $error = "All areas must be filled in.";
    }
}
?>


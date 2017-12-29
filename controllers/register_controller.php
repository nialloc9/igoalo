<?php
if(isset($_GET['fn']) && isset($_GET['ln']) && isset($_GET['e'])){
    $firstname = $_GET['fn'];
    $surname = $_GET['ln'];
    $email = $_GET['e'];
}

if(!loggedin()){

    if (
        isset($_POST['username_register']) &&
        isset($_POST['password_register']) &&
        isset($_POST['password_register_again']) &&
        isset($_POST['firstname']) &&
        isset($_POST['surname']) &&
        isset($_POST['age']) &
        isset($_POST['gender']) &&
        isset($_POST['address']) &&
        isset($_POST['state']) &&
        isset($_POST['country']) &&
        isset($_POST['email']) &&
        isset($_POST['checkbox']) &&
        isset($_POST['token']) &&
        isset($_POST['copchaImage'])

    )


    {


        $username = $_POST['username_register'];

        $password = $_POST['password_register'];
        $password_again = $_POST['password_register_again'];
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $post = $_POST['post'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $copchaImage = $_POST['copchaImage'];
        $checkbox = $_POST['checkbox'];
        $token = $_POST['token'];
        $about = '';
        $time = $_POST['time'];

        if (
            !empty($username) &&
            !empty($password) &&
            !empty($password_again) &&
            !empty($firstname) &&
            !empty($email) &&
            !empty($age) &&
            !empty($country) &&
            !empty($state) &&
            !empty($copchaImage) &&
            !empty($token) &&
            !empty($surname)


        ) {
            if (strlen($username) > 30 || strlen($firstname) > 40 || strlen($surname) > 40 || strlen($phone) > 20 || strlen($email) > 100 || strlen($copchaImage) > 4 || strlen($address) > 100) {
                $error = 'Please adher to maxlength of fields.';
            } else {
                $max_length = '';
                if ($password != $password_again) {
                    $error =  'Passwords dont match.';
                } else {
                    if($checkbox != 'agree'){
                        $error = 'You must accept the terms and conditions of use.';
                    }else{
                        $stmt2 = $db->prepare("SELECT `username` FROM `users` WHERE `username`= :username");

                        $stmt2->bindValue(':username', $username);

                        $stmt2->execute();

                        $count = $stmt2->rowCount();
                        if ($count == 1) {
                            $error =  'The username ' . $username . ' already exists.';
                        } else {
                            if(token::check($token)){


                                $query_run = User::create($username, $about, $password_hashed, $firstname, $surname, $gender, $age, $address, $state,
                                    $country, $post, $phone, $email, '', '',
                                    '', $about, $time, $db);




                                $stmt4 = $db->prepare("SELECT `id` AS `id` FROM `users` WHERE `username`=:username");

                                $stmt4->bindParam(':username', $username);

                                if (!$id_query_run = $stmt4->execute()) {

                                    echo("'Query failed " . $sql . " Error: " . mysqli_error($dbcnx));
                                    exit();
                                } else {
                                    $user_id = $stmt4->fetch(PDO::FETCH_ASSOC);
                                    $auth_id = $user_id['id'];
                                    if(User::verify_email_request($email, $auth_id, $token, $time, $db)){
                                        $headers = "MIME-Version: 1.0" . "\r\n";
                                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                        // More headers
                                        $headers .= 'From: noreply@igoalo.com' . "\r\n";
                                        $headers .= "X-MSMail-Priority: High\r\n";

                                        $subject = "iGoalo email verification request.";

                                        $to = "Dear ".$username;
                                        $body = "<br><br>iGoalo.com email verification request. Please folow the link below to verify your account: <br><br>";
                                        $link = "www.igoalo.com/email_authenticate.php?t=".urlencode($token)."&e=".$email."&i=".$auth_id;

                                        $from = "<br><br>The iGoalo team";
                                        $tag = "<br><br>Every goal is a step closer to where you want to be.\n\n".$from;
                                        $message = $to.$body.$link.$tag;


                                        mail($email,$subject,$message,$headers);

                                        $success_message = "Email verification has been sent to the following email: ".$email;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        else {
            $alert = 'Please make sure you have filled in all fields.';
        }

    }else {
        $alert = 'Required information not set. Please make sure you have filled in all fields.';
    }
    if (!isset($_POST['secure'])) {
        $_SESSION['secure'] = rand(1000, 9999);
    } else {
        if ($_SESSION['secure'] == $_POST['secure']) {
        } else {
            $_SESSION['secure'] = rand(1000, 9999);
        }
    }
}else{
    echo 'You are already logged in. Logout to register a new account.';
    die();
};
?>
<?php
require 'core.inc.php';
require_once 'controllers/controller_mods/user.php';
require_once 'controllers/controller_mods/token.php';
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $time = $_POST['time'];
    $token = $_POST['token'];

    if(token::check($_POST['token'])){
        if (!empty($username) && !empty($password)) {
            if(user::verify_email_is_activated($username, $db)){
                $stmt = $db->prepare("SELECT password FROM users WHERE username = ?");
                $stmt->bindParam(1, $username);

                $stmt->execute();

                $hash_array = $stmt->fetch(PDO::FETCH_ASSOC);
                $hash = $hash_array['password'];

                if (password_verify($password, $hash) == true) {
                    $stmt_id = $db->prepare("SELECT id FROM users WHERE username = ?");
                    $stmt_id->bindParam(1, $username);

                    $stmt_id->execute();

                    $user_id = $stmt_id->fetch(PDO::FETCH_ASSOC);

                    $id_num_rows = $stmt_id->rowCount();
                    if ($id_num_rows == 0) {
                        $error = 'You have entered a wrong password';
                    }else if($id_num_rows == 1){
                        $_SESSION['user_id'] = $user_id['id'];
                        User::update_last_login($time, $user_id['id'], $db);

                        if(isset($_POST['remember_me']) && $_POST['remember_me'] == 1){
                            $series = base64_encode(openssl_random_pseudo_bytes(32));
                            $token = base64_encode(openssl_random_pseudo_bytes(32));
                            $user_id = $user_id['id'];;

                            $stmt_id = $db->prepare("INSERT INTO `remember_me`(`id`, `series`, `token`, `user_id`, `created_at`, `updated_at`)
                                              VALUES ('',:series,:token,:user_id,:created_at,:updated_at)");

                            $stmt_id->bindParam(':series', $series );
                            $stmt_id->bindParam(':token', $token);
                            $stmt_id->bindParam(':user_id', $user_id);
                            $stmt_id->bindParam(':created_at', $time);
                            $stmt_id->bindParam(':updated_at', $time);

                            if($stmt_id->execute()){
                                setcookie('series', $series , time() + (10 * 365 * 24 * 60 * 60), '/', 'www.igoalo.com');
                                setcookie('token', $token, time() + (30 * 24 * 60 * 60), '/', 'www.igoalo.com');
                            }
                        }
                        header("Location: home.php?page_id=".$_SESSION['user_id']);
                        exit();
                    }
                } else {
                    $error = "Please enter a username and password.";
                }
            }else{
                $error = "Account email not activated.";
            }
        }
    }
}
?>
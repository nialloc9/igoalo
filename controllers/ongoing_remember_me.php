<?php
if(isset($_COOKIE['series'])){
    $token = base64_encode(openssl_random_pseudo_bytes(32));
    $series = $_COOKIE['series'];
    $stmt = $db->prepare("UPDATE `remember_me` SET `token`=:token WHERE `series` = :series");
    $stmt->bindParam(':token', $token);
    $stmt->bindParam(':series', $series);

    if($stmt->execute()){
        if (isset($_COOKIE['token'])) {
            unset($_COOKIE['token']);
            setcookie('token', $token, time() + (30 * 24 * 60 * 60), '/', 'www.igoalo.com'); // empty value and old timestamp
            $_COOKIE['token'] = $token;
        }
    }
}
?>
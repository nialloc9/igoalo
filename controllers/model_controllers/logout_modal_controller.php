<?php
if(isset($_POST['log_out']) && $_POST['log_out'] == 1){
    if(token::check($_POST['token'])){
        $stmt = $db->prepare("DELETE FROM `remember_me` WHERE series = :series && token = :token");
        $stmt->bindParam(':series', $_COOKIE['series']);
        $stmt->bindParam(':token', $_COOKIE['token']);

        $stmt->execute();

        if (isset($_COOKIE['series'])) {
            unset($_COOKIE['series']);
            setcookie('series', '/', 1); // empty value and old timestamp
        }

        if (isset($_COOKIE['token'])) {
            unset($_COOKIE['token']);
            setcookie('token', '/', 1); // empty value and old timestamp
        }

        header('Location: external/logout.inc.php');
    }
}
?>
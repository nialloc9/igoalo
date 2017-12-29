<?php
    session_start();
    ob_start();
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();

    header('Location: ../index.php');
?>
<?php
    if(isset($_GET['firstname']) && isset($_GET['lastname']) && isset($_GET['email'])){
        if(!empty($_GET['firstname']) && !empty($_GET['lastname']) && !empty($_GET['email'])){
            header('Location: register.php?fn='.$_GET['firstname'].'&ln='.$_GET['lastname'].'&e='.$_GET['email']);
        }else{
            $reg_box_info = 'Opps! You forgot to fill in all boxes.';
            if(isset($_GET['firstname']) && !empty($_GET['firstname'])){
                $firstname = $_GET['firstname'];
            }

            if(isset($_GET['lastname']) && !empty($_GET['lastname'])){
                $lastname = $_GET['lastname'];
            }

            if(isset($_GET['email']) && !empty($_GET['email'])){
                $email = $_GET['email'];
            }
        }
    }
?>
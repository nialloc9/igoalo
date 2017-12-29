<?php
if(!isset($_SESSION)){
    session_start();
}
class Token{
    public static function generate(){
        //If this dosn't work check to see if openssl is included in your php or use a differant method.
        return $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32)); //This just generates a 32 byte value
    }

    public static function check($token){
        if($token == $_SESSION['token']){
            unset($_SESSION['token']);
            return true;
        }else{
            return false;
        }
    }

    public static function ajax_check($token){
        if($token == $_SESSION['token']){
            return true;
        }else{
            return false;
        }
    }
}
?>
<?php
session_start();
error_reporting(0);
@ini_set('display_errors', 0);
require 'connect.inc.php';


ob_start();

$current_file = $_SERVER['SCRIPT_NAME'];
@$http_referer = $_SERVER['HTTP_REFERER'];

if(isset($_COOKIE['series']) && isset($_COOKIE['token'])){

    $stmt = $db->prepare("SELECT `user_id` FROM `remember_me` WHERE `series`=:series AND `token`=:token");
    $stmt->bindParam(':series', $_COOKIE['series']);
    $stmt->bindParam(':token', $_COOKIE['token']);

    if($stmt->execute()){
        if($stmt->rowCount() > 0){
            $result = $stmt->fetch();
            $_SESSION['user_id'] = $result['user_id'];
        }
    }
}

function loggedin(){
    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        return true;
    }else{
        return false;
    }
}


$time = date('Y-m-d G:i:s');
?>

<!--This file is created so we don't have to do this each time. We can just require this file in the document.
    This code gets the name of the file being used. This can be added to any page. It also will start a session
    so we don't have to do it for each login. We use the ob_start() function here because it will not send other
    data except for our header.

    ob_start():
Think of ob_start() as saying "Start remembering everything that would normally be outputted, but don't quite do anything with it yet."

For example:

ob_start();
echo("Hello there!"); //would normally get printed to the screen/output to browser
$output = ob_get_contents();
ob_end_clean();
There are two other functions you typically pair it with: ob_get_contents(), which basically gives you whatever has been "saved" to the buffer since it was turned on with ob_start(), and then ob_end_clean() or ob_flush(), which either stops saving things and discards whatever was saved, or stops saving and outputs it all at once, respectively.

The loggedin() function says:
If a session has been made called user_id and is not empty then the user is already logged in.

The HTTP_REFERER query tells us the page the user has come from.

The getField() function is used for 82gatheringUserData.php. It gets data that we want by using the id number stored in the session to select data that is stored in a variable called
$field. We store hte query in an if statement so that the code is not run unless the query is successful.
The if statement says run the query $query and then return the value in row 0 from the field we specified.
The code will only run if the mysql_result function works. If it dosn't we can return an error message.
The reason for this is if we can't find the value using the query we don't want an ugly looking error appearing
in our program.
-->
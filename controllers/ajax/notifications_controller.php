<?php
session_start();
require_once '../external/connect.inc.php';
$s_id = $_SESSION['user_id'];
require_once 'ajax_resources/ajax_auth.php';
require_once '../controllers/controller_mods/user.php';
require_once '../controllers/controller_mods/groups.php';
require_once '../controllers/controller_mods/notifications.php';
require_once '../controllers/controller_mods/token.php';
$task = $_POST['task'];
//Accept group member
if(isset($task) && $task=='accept_member'){
    if(isset($_POST['mf_id']) && isset($_POST['group_id']) && !empty($_POST['mf_id']) && !empty($_POST['group_id'])){
        $user = $_POST['mf_id'];
        $time = $_POST['not_time'];
        $not_id = $_POST['not_id'];
        $group = $_POST['group_id'];

        $token = $_POST['token'];

        if(Token::ajax_check($token)){
            Groups::accept_member($user, $group, $time, $db);
            Notifications::delete($not_id, $db);
        }
    }
}

//Reject group member
if(isset($task) && $task=='reject_member'){
    if(isset($_POST['mf_id']) && isset($_POST['group_id']) && !empty($_POST['mf_id']) && !empty($_POST['group_id'])){
        $user = $_POST['mf_id'];
        $group = $_POST['group_id'];
        $not_id = $_POST['not_id'];

        $token = $_POST['token'];

        if(Token::ajax_check($token)){
            Groups::reject_member($group, $user, $db);
            Notifications::delete($not_id, $db);
        }
    }
}

//Add friend
if(isset($task) && $task == 'accept_friend'){
    if(isset($_POST['mf_id']) && isset($_POST['auth_id']) && !empty($_POST['mf_id']) && !empty($_POST['auth_id'])){
        $auth = $_POST['auth_id'];
        $user = $_POST['mf_id'];
        $time = $_POST['not_time'];
        $not_id = $_POST['not_id'];

        $token = $_POST['token'];

        if(Token::ajax_check($token)){
            if(User::acceptFriendRequest($auth, $user, $time, $db)){
                Notifications::delete($not_id, $db);
            }else{
                User::acceptFriendRequest($user, $auth, $time, $db);
                Notifications::delete($not_id, $db);
            }
        }
    }
}

//Reject friend
if(isset($task) && $task == 'reject_friend'){
    if(isset($_POST['mf_id']) && isset($_POST['auth_id']) && !empty($_POST['mf_id']) && !empty($_POST['auth_id'])){
        $auth = $_POST['auth_id'];
        $user = $_POST['mf_id'];
        $time = $_POST['not_time'];
        $not_id = $_POST['not_id'];

        $token = $_POST['token'];

        if(Token::ajax_check($token)){
            if(User::cancelFriend($auth, $user, $db)){
                Notifications::delete($not_id, $db);
            }else{
                User::cancelFriend($user, $auth, $db);
                Notifications::delete($not_id, $db);
            }
        }
    }
}


//Remove post notification
if(isset($task) && $task == 'hide_post'){
    if(isset($_POST['not_id']) && !empty($_POST['not_id'])){
        $not_id = $_POST['not_id'];

        $token = $_POST['token'];

        if(Token::ajax_check($token)){
            Notifications::delete($not_id, $db);
        }
    }
}

?>
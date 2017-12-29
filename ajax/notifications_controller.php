<?php
session_start();
require_once '../external/connect.inc.php';
$s_id = $_SESSION['user_id'];
require_once 'ajax_resources/ajax_auth.php';
require_once '../controllers/controller_mods/user.php';
require_once '../controllers/controller_mods/groups.php';
require_once '../controllers/controller_mods/notifications.php';
require_once '../controllers/controller_mods/token.php';
require_once '../controllers/controller_mods/chat.php';

if(isset($_POST['task']) && !empty($_POST['task'])){
    $task = $_POST['task'];
}
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
            notifications::delete($not_id, $db);
            notifications::create(6, $user, '', $group, '', '', $time, '', $db);
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
            notifications::delete($not_id, $db);
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
                notifications::delete($not_id, $db);
                notifications::create(5, $user, $auth, '', '', '', $time, '', $db);
            }else{
                User::acceptFriendRequest($user, $auth, $time, $db);
                notifications::delete($not_id, $db);
                notifications::create(5, $auth, $user, '', '', '', $time, '', $db);
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
                notifications::delete($not_id, $db);
            }else{
                User::cancelFriend($user, $auth, $db);
                notifications::delete($not_id, $db);
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
            notifications::delete($not_id, $db);
        }
    }
}

//Controller navbar notification
if(isset($_GET['task']) && $_GET['task'] == 'check_user_notification'){
    $auth = $_GET['auth_id'];
    $token = $_GET['token'];
    if(Token::ajax_check($token)){
        $groups = Groups::show_groups_user_is_an_admin_of($auth, $db);
        if(isset($groups) && !empty($groups)){
            foreach($groups as $key => $group){
                if(notifications::user_has_group_notifications($group['group_id'], $db)){
                    $notification = 1;
                }else{
                    $notification = 0;
                }
            }
        }else{
            $notification = 0;
        }

        if(notifications::user_has_notifications($auth, $db) || $notification > 0){
            $notification_status_class = '1';
        }else{
            $notification_status_class = '';
        }

        echo $notification_status_class;
    }
}

//Controller navbar chat notification
if(isset($_GET['task']) && $_GET['task'] == 'check_chat_notification'){
    $auth = $_GET['auth_id'];
    $token = $_GET['token'];
    if(Token::ajax_check($token)){

        if(Chat::check_if_auth_is_notified($auth, $db)){
            $chat_status_class = '1';
        }else{
            $chat_status_class = '';
        }

        echo $chat_status_class;
    }
}
?>
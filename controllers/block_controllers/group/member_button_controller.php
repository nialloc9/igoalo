<?php
require_once 'external/core.inc.php';
//send a join request
if(isset($_POST['join_auth_id']) && isset($_POST['join_group_id']) && !empty($_POST['join_auth_id']) && !empty($_POST['join_group_id'])){
    $auth = $_POST['join_auth_id'];
    $group = $_POST['join_group_id'];

    $token = $_POST['token'];

    if(Token::check($token)){
        Groups::add_member($group, $auth, $time, $db);
        Notifications::create(2, '', $auth, $group, '', '', $time, '', $db);
        header('Location: profile_template_group.php?group_id='.$group);
    }
}


//cancel a join request sent
if(isset($_POST['cancel_auth_id']) && isset($_POST['cancel_group_id']) && !empty($_POST['cancel_auth_id']) && !empty($_POST['cancel_group_id'])){
    $auth_id = $_POST['cancel_auth_id'];
    $group = $_POST['cancel_group_id'];

    $token = $_POST['token'];

    if(Token::check($token)){
        Groups::reject_member($group, $auth_id, $db);

        Notifications::delete_from_group_id_and_user_id($group, $auth_id, $db);
        header('Location: profile_template_group.php?group_id'.$group);
    }
}

//Leave a group
if(isset($_POST['leave_auth_id']) && isset($_POST['leave_group_id']) && !empty($_POST['leave_auth_id']) && !empty($_POST['leave_group_id'])){
    $auth = $_POST['leave_auth_id'];
    $group = $_POST['leave_group_id'];

    $token = $_POST['token'];

    if(Token::check($token)){
        Groups::leave_group($auth, $group, $db);
        header('Location: profile_template_user.php?group_id='.$group);
    }
}

//Delete Group
if(isset($_POST['delete_group_id'])){
    $group = $_POST['delete_group_id'];

    $token = $_POST['token'];

    if(Token::check($token)){
        Groups::delete($group, $db);
        Groups::delete_all_group_members($group, $db);
        Status::delete_status_from_group_id($group, $db);
        header('Location: home.php');
    }
}

?>
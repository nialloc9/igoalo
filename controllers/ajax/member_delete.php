<?php
require_once '../external/connect.inc.php';
require_once 'ajax_resources/ajax_auth.php';
require_once '../controllers/controller_mods/groups.php';
require_once '../controllers/controller_mods/token.php';
$task = $_POST['task'];

if(isset($task) && $task == 'member_delete'){
    $token = $_POST['token'];

    if(Token::ajax_check($token)){
        $member_id = $_POST['member_id'];
        $group_id = $_POST['group_id'];

        Groups::leave_group($member_id, $group_id, $db);
    }
}
?>
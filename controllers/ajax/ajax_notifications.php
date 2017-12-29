<?php
if(isset($_GET['task']) && $_GET['task'] == 'notification'){
    $user_id = $_GET['user_id'];
    $groups = Groups::show_groups_user_is_an_admin_of($user_id, $db);

    foreach($groups as $key => $group){
        if(notifications::user_has_group_notifications($group['group_id'], $db)){
            $notification = 1;
        }
    }

    if(notifications::user_has_notifications($user_id, $db) || $notification > 0){
        $notification_status_class = 'user_has_notifcation';
    }else{
        $notification_status_class = '';
    }

    if(Chat::check_if_auth_is_notified($user_id, $db)){
        $chat_status_class = 'user_has_notifcation';
    }else{
        $chat_status_class = '';
    }

    echo $chat_status_class;
}
?>
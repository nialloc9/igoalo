<?php
$groups = Groups::show_groups_user_is_an_admin_of($user_id, $db);

foreach($groups as $key => $group){
    if(notifications::user_has_group_notifications($group['group_id'], $db)){
        $notification = 1;
    }
}

echo $notification;
if(notifications::user_has_notifications($user_id, $db) || $notification > 0){
    $notification_status_class = 'user_has_notifcation';
    $header_icon_bar = 'header_icon_bar_red';
    $header_icon_bar_border = 'header_icon_bar_red_border';
}else{
    $notification_status_class = '';
    $header_icon_bar = '';
}
?>
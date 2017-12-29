<?php
if(Chat::check_if_auth_is_notified($user_id, $db)){
    $chat_status_class = 'user_has_notifcation';
    $header_icon_bar = 'header_icon_bar_red';
    $header_icon_bar_border = 'header_icon_bar_red_border';
}else{
    $chat_status_class = '';
    $header_icon_bar = '';
}
?>
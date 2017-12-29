<?php
$type = 1;
$user_id = 26;
$receiver = 26;
$sender = 27;
$group_id = 43;
$status_id = 1234;
$goal_id = 32;
$time = '2016-05-08 14:09:15';
$hide = 0;
$not_id =1000;

//create_test.
$test = notifications::create_test($type, $receiver, $sender, $group_id, $status_id, $goal_id, $time, $hide, $db);

if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> notifications::create_test<br>';
}else{
    echo '<strong>Fail:</strong> notifications::create_test<br>';
}
notifications::delete($not_id, $db);


//Delete_test.
notifications::create_test($type, $receiver, $sender, $group_id, $status_id, $goal_id, $time, $hide, $db);
$test = notifications::delete($not_id, $db);

if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> notifications::delete<br>';
}else{
    echo '<strong>Fail:</strong> notifications::delete<br>';
}
notifications::delete($not_id, $db);

//delete_friend_request.
notifications::create_test($type, $receiver, $sender, $group_id, $status_id, $goal_id, $time, $hide, $db);
$test = notifications::delete_friend_request($sender, $receiver, $db);

if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> notifications::delete_friend_request<br>';
}else{
    echo '<strong>Fail:</strong> notifications::delete_friend_request<br>';
}

//delete_from_group_id_and_user_id.
notifications::create_test($type, $receiver, $sender, $group_id, $status_id, $goal_id, $time, $hide, $db);
$test = notifications::delete_from_group_id_and_user_id($group_id, $receiver, $db);

if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> notifications::delete_from_group_id_and_user_id<br>';
}else{
    echo '<strong>Fail:</strong> notifications::delete_from_group_id_and_user_id<br>';
}
notifications::delete($not_id, $db);

//get_user_notifications.
notifications::create_test($type, $receiver, $sender, $group_id, $status_id, $goal_id, $time, $hide, $db);
$test = notifications::get_user_notifications($user_id, $db);
if($test > 0){
    echo '<strong>Pass:</strong> notifications::get_user_notifications<br>';
}else{
    echo '<strong>Fail:</strong> notifications::get_user_notifications<br>';
}
notifications::delete($not_id, $db);

//get_group_notifications.
notifications::create_test($type, $receiver, $sender, $group_id, $status_id, $goal_id, $time, $hide, $db);
$test = notifications::get_group_notifications($group_id, $db);
if($test > 0){
    echo '<strong>Pass:</strong> notifications::get_group_notifications<br>';
}else{
    echo '<strong>Fail:</strong> notifications::get_group_notifications<br>';
}
notifications::delete($not_id, $db);

//user_has_notifications.
notifications::create_test($type, $receiver, $sender, $group_id, $status_id, $goal_id, $time, $hide, $db);
$test = notifications::user_has_notifications($user_id, $db);
if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> notifications::user_has_notifications<br>';
}else{
    echo '<strong>Fail:</strong> notifications::user_has_notifications<br>';
}
notifications::delete($not_id, $db);


//user_has_group_notifications.
notifications::create_test($type, $receiver, $sender, $group_id, $status_id, $goal_id, $time, $hide, $db);
$test = notifications::user_has_group_notifications($group_id, $db);
if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> notifications::user_has_group_notifications<br>';
}else{
    echo '<strong>Fail:</strong> notifications::user_has_group_notifications<br>';
}
notifications::delete($not_id, $db);
?>
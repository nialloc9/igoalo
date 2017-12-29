<?php
$auth_id = 26;
$user_id = 27;
$time = '2016-05-08 14:09:15';
$message = 'This is a test.';
$chat_id = 1000;
$message_id = 1000;

//Create_chat test
$test = Chat::create_chat_test($auth_id, $user_id, $time, $db);
if($test == true){
    echo '<strong>Pass:</strong> Chat::create_chat_test<br>';
}else{
    echo '<strong>Fail:</strong> Chat::create_chat_test<br>';
}

//Delete chat test
$test = Chat::delete_chat($chat_id ,$db);
if($test == true){
    echo '<strong>Pass:</strong> Chat::delete_chatt<br>';
}else{
    echo '<strong>Fail:</strong> Chat::delete_chat<br>';
}

//Notify user chat test
Chat::create_chat_test($auth_id, $user_id, $time, $db);
$test = Chat::notify_user($chat_id, $user_id, $time, $db);
if($test == true){
    echo '<strong>Pass:</strong> Chat::notify_user<br>';
}else{
    echo '<strong>Fail:</strong> Chat::notify_user<br>';
}
Chat::delete_chat($chat_id ,$db);

//Check if user has notification
Chat::create_chat_test($auth_id, $user_id, $time, $db);
Chat::notify_user($chat_id, $user_id, $time, $db);

$test = Chat::check_if_auth_is_notified($user_id, $db);
if($test == true){
    echo '<strong>Pass:</strong> Chat::check_if_auth_is_notified<br>';
}else{
    echo '<strong>Fail:</strong> Chat::check_if_auth_is_notified<br>';
}
Chat::delete_chat($chat_id ,$db);



//Remove chat_not
Chat::create_chat_test($auth_id, $user_id, $time, $db);
Chat::notify_user($chat_id, $user_id, $time, $db);

$test = Chat::remove_chat_not($auth_id, $time, $db);
if($test == true){
    echo '<strong>Pass:</strong> Chat::remove_chat_not<br>';
}else{
    echo '<strong>Fail:</strong> Chat::remove_chat_not<br>';
}
Chat::delete_chat($chat_id ,$db);

//Get user chats
Chat::create_chat_test($auth_id, $user_id, $time, $db);
Chat::create_chat_test($auth_id, $user_id, $time, $db);

$test = Chat::get_user_chats($auth_id, $db);
if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> Chat::get_user_chats<br>';
}else{
    echo '<strong>Fail:</strong> Chat::get_user_chats<br>';
}
Chat::delete_chat($chat_id ,$db);

//Get friend chat
Chat::create_chat_test($auth_id, $user_id, $time, $db);

$test = Chat::get_friend_chat($auth_id, $user_id, $db);
if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> Chat::get_friend_chat<br>';
}else{
    echo '<strong>Fail:</strong> Chat::get_friend_chat<br>';
}
Chat::delete_chat($chat_id ,$db);

//Insert message
$test = Chat::insert_message($auth_id, $user_id, $time, $message, $chat_id, $db);
if($test == true){
    echo '<strong>Pass:</strong> Chat::insert_message<br>';
}else{
    echo '<strong>Fail:</strong> Chat::insert_message<br>';
}

//Delete message
$test = Chat::delete_message($message_id, $db);
if($test == true){
    echo '<strong>Pass:</strong> Chat::delete_message<br>';
}else{
    echo '<strong>Fail:</strong> Chat::delete_message<br>';
}

//Get messages
Chat::insert_message_test($auth_id, $user_id, $time, $message, $chat_id, $db);
Chat::insert_message_test($auth_id, $user_id, $time, $message, $chat_id, $db);

$test = Chat::get_messages($chat_id, $db);
if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> Chat::get_messages<br>';
}else{
    echo '<strong>Fail:</strong> Chat::get_messages<br>';
}
Chat::delete_message(1000, $db);


?>
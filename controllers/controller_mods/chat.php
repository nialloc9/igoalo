<?php
class Chat{
    //Chat
    public function create_chat($auth_id, $user_id, $time, $db){
        $stmt = $db->prepare("INSERT INTO `chat`(`id`, `user1_id`, `user2_id`, `created_at`, `updated_at`, `user_not`) VALUES ('',:user1,:user2,:created_at,:updated_at, '')");
        $stmt->bindParam(':user1', $auth_id);
        $stmt->bindParam(':user2', $user_id);
        $stmt->bindParam(':created_at', $time);
        $stmt->bindParam(':updated_at', $time);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function notify_user($chat_id, $user_id, $time, $db){
        $stmt = $db->prepare("UPDATE `chat` SET `updated_at`=:updated_at,`user_not`=:user_not WHERE `id`=:chat_id");
        $stmt->bindParam(':updated_at', $time);
        $stmt->bindParam(':user_not', $user_id);
        $stmt->bindParam(':chat_id', $chat_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update_user_chat_time($chat_id, $time, $db){
        $stmt = $db->prepare("UPDATE `chat` SET `updated_at`=:updated_at WHERE id = :chat_id");
        $stmt->bindParam(':updated_at', $time);
        $stmt->bindParam(':chat_id', $chat_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function check_if_auth_is_notified($auth_id, $db){
        $stmt = $db->prepare("SELECT * FROM `chat` WHERE (`user1_id` = :user1_id OR `user2_id` = :user2_id) AND user_not = :user_not");
        $stmt->bindParam(':user1_id', $auth_id);
        $stmt->bindParam(':user2_id', $auth_id);
        $stmt->bindParam(':user_not', $auth_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function remove_chat_not($auth_id, $time, $db){
        $stmt = $db->prepare("UPDATE `chat` SET `updated_at`=:updated_at,`user_not`='' WHERE `user_not`=:auth_id");
        $stmt->bindParam(':updated_at', $time);
        $stmt->bindParam(':auth_id', $auth_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete_chat($chat_id ,$db){
        $stmt = $db->prepare("DELETE FROM `chat` WHERE `id`=:chat_id");
        $stmt->bindParam(':chat_id', $chat_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function get_user_chats($auth_id, $db){
        $stmt = $db->prepare("SELECT * FROM `chat` WHERE `user1_id` = :user1_id OR `user2_id` = :user2_id ORDER BY `updated_at` DESC");
        $stmt->bindParam(':user1_id', $auth_id);
        $stmt->bindParam(':user2_id', $auth_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll();
            return $result;
        }else{
            return null;
        }
    }

    public function get_friend_chat($auth_id, $user_id, $db){
        $stmt = $db->prepare("SELECT * FROM `chat` WHERE (`user1_id` = :user1_id AND `user2_id` = :user2_id) || (`user1_id` = :user2_id AND `user2_id` = :user1_id)");
        $stmt->bindParam(':user1_id', $auth_id);
        $stmt->bindParam(':user2_id', $user_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll();
            return $result;
        }else{
            return null;
        }
    }
    //Messages
    public function insert_message($auth_id, $user_id, $time, $message, $chat_id, $db){
        $stmt = $db->prepare("INSERT INTO `messages`(`id`, `user1_id`, `user2_id`, `chat_id`, `chat_text`, `created_at`, `updated_at`) VALUES ('',:user1_id,:user2_id,:chat_id,:chat_text,:created_at,:updated_at)");
        $stmt->bindParam(':user1_id', $auth_id);
        $stmt->bindParam(':user2_id', $user_id);
        $stmt->bindParam(':chat_id', $chat_id);
        $stmt->bindParam(':chat_text', $message);
        $stmt->bindParam(':created_at', $time);
        $stmt->bindParam(':updated_at', $time);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete_message($message_id, $db){
        $stmt = $db->prepare("DELETE FROM `messages` WHERE `id` = :message_id");
        $stmt->bindParam(':message_id', $message_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function get_messages($chat_id, $db){
        $stmt = $db->prepare("SELECT * FROM `messages` WHERE `chat_id` = :chat_id ORDER BY `updated_at` DESC");
        $stmt->bindParam(':chat_id', $chat_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll();
            return $result;
        }else{
            return null;
        }
    }

    public function get_message_info($messages_array){

    }

    //Tests
    public function create_chat_test($auth_id, $user_id, $time, $db){
        $stmt = $db->prepare("INSERT INTO `chat`(`id`, `user1_id`, `user2_id`, `created_at`, `updated_at`, `user_not`) VALUES (1000,:user1,:user2,:created_at,:updated_at, '')");
        $stmt->bindParam(':user1', $auth_id);
        $stmt->bindParam(':user2', $user_id);
        $stmt->bindParam(':created_at', $time);
        $stmt->bindParam(':updated_at', $time);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function insert_message_test($auth_id, $user_id, $time, $message, $chat_id, $db){
        $stmt = $db->prepare("INSERT INTO `messages`(`id`, `user1_id`, `user2_id`, `chat_id`, `chat_text`, `created_at`, `updated_at`) VALUES (1000,:user1_id,:user2_id,:chat_id,:chat_text,:created_at,:updated_at)");
        $stmt->bindParam(':user1_id', $auth_id);
        $stmt->bindParam(':user2_id', $user_id);
        $stmt->bindParam(':chat_id', $chat_id);
        $stmt->bindParam(':chat_text', $message);
        $stmt->bindParam(':created_at', $time);
        $stmt->bindParam(':updated_at', $time);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>
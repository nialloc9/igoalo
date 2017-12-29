<?php
//If type: 1 = friend request, 2 = group join request, 3 = page post
class notifications{
    public function create($type, $receiver, $sender, $group_id, $status_id, $goal_id, $time, $hide, $db){
        $stmt = $db->prepare("INSERT INTO `notifications`(`id`, `notification_type`, `user_id`, `requesting_id`, `group_id`, `status_id`, `goal_id`, `created_at`, `updated_at`, `hide`, `seen`)
                              VALUES ('',:not_type,:receiver,:sender,:group_id,:status_id,:goal_id,:created_at,:updated_at,:hide,'')");
        $stmt->bindParam(':not_type', $type);
        $stmt->bindParam(':receiver', $receiver);
        $stmt->bindParam(':sender', $sender);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':status_id', $status_id);
        $stmt->bindParam(':goal_id', $goal_id);
        $stmt->bindParam(':created_at', $time);
        $stmt->bindParam(':updated_at', $time);
        $stmt->bindParam(':hide', $hide);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($not_id, $db){
        $stmt = $db->prepare("DELETE FROM `notifications` WHERE `id`=:not_id");
        $stmt->bindParam(':not_id', $not_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete_friend_request($requesting_id, $friend_id, $db){
        $stmt = $db->prepare("DELETE FROM `notifications` WHERE (`requesting_id`=:requesting_id AND `user_id`=:friend_id) || (`requesting_id`=:friend_id AND `user_id`=:requesting_id) AND `notification_type`=1");
        $stmt->bindParam(':requesting_id', $requesting_id);
        $stmt->bindParam(':friend_id', $friend_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete_from_group_id_and_user_id($group_id, $auth_id, $db){
        $stmt = $db->prepare("DELETE FROM `notifications` WHERE `requesting_id`=:auth_id AND `group_id`=:group_id");
        $stmt->bindParam(':auth_id', $auth_id);
        $stmt->bindParam(':group_id', $group_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function get_user_notifications($user_id, $db){
        $stmt = $db->prepare("SELECT * FROM `notifications` WHERE `user_id`=:user_id ORDER BY `updated_at`");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll();
            return $result;
        }else{
            return 0;
        }
    }

    public function get_group_notifications($group_id, $db){
        $stmt = $db->prepare("SELECT * FROM `notifications` WHERE `group_id`=:group_id ORDER BY `updated_at`");
        $stmt->bindParam(':group_id', $group_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll();
            return $result;
        }else{
            return 0;
        }
    }

    public function user_has_notifications($user_id, $db){
        $stmt = $db->prepare("SELECT * FROM `notifications` WHERE `user_id`=:user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function user_has_group_notifications($group_id, $db){
        $stmt = $db->prepare("SELECT * FROM `notifications` WHERE `group_id`=:group_id");
        $stmt->bindParam(':group_id', $group_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    //Tests
    public function create_test($type, $receiver, $sender, $group_id, $status_id, $goal_id, $time, $hide, $db){
        $stmt = $db->prepare("INSERT INTO `notifications`(`id`, `notification_type`, `user_id`, `requesting_id`, `group_id`, `status_id`, `goal_id`, `created_at`, `updated_at`, `hide`, `seen`)
                              VALUES (1000,:not_type,:receiver,:sender,:group_id,:status_id,:goal_id,:created_at,:updated_at,:hide,'')");
        $stmt->bindParam(':not_type', $type);
        $stmt->bindParam(':receiver', $receiver);
        $stmt->bindParam(':sender', $sender);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':status_id', $status_id);
        $stmt->bindParam(':goal_id', $goal_id);
        $stmt->bindParam(':created_at', $time);
        $stmt->bindParam(':updated_at', $time);
        $stmt->bindParam(':hide', $hide);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}

?>
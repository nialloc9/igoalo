<?php
if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
    auth($_SESSION['user_id']);
}

class Recommend
{
    //recommend group based on goal/group name/type and state/country
    public function group_a_s_c($user_main_goal_name, $user_main_goal_type, $user_add, $user_state, $user_country, $db){
        $stmt = $db->prepare("SELECT * FROM `groups` WHERE `group_name` LIKE :goal_name OR `group_type` LIKE :goal_type AND `city_town_village` LIKE :user_add AND `state` = :state AND `country` = :country LIMIT 6");
        $stmt->bindParam(':goal_name', $user_main_goal_name);
        $stmt->bindParam(':goal_type', $user_main_goal_type);
        $stmt->bindParam(':user_add', $user_add);
        $stmt->bindParam(':state', $user_state);
        $stmt->bindParam(':country', $user_country);
        $stmt->execute();

        $count = $stmt->rowCount();

        if($count > 0){
            $result = $stmt->fetchAll();

            return $result;
        }
    }
    //recommend group based on user/group goal name/type and state/country
    public function group_s_c($user_main_goal_name, $user_main_goal_type, $user_state, $user_country, $db){
        $stmt = $db->prepare("SELECT * FROM `groups` WHERE `group_name` LIKE :goal_name OR `group_type` LIKE :goal_type AND `state` = :state AND `country` = :country LIMIT 6");
        $stmt->bindParam(':goal_name', $user_main_goal_name);
        $stmt->bindParam(':goal_type', $user_main_goal_type);
        $stmt->bindParam(':state', $user_state);
        $stmt->bindParam(':country', $user_country);
        $stmt->execute();

        $count = $stmt->rowCount();

        if($count > 0){
            $result = $stmt->fetchAll();

            return $result;
        }
    }
    //recommend group based on user/group goal name/type and country
    public function group_c($user_main_goal_name, $user_main_goal_type, $user_country, $db){
        $stmt = $db->prepare("SELECT * FROM `groups` WHERE `group_name` LIKE :goal_name OR `group_type` LIKE :goal_type AND `country` = :country LIMIT 6");
        $stmt->bindParam(':goal_name', $user_main_goal_name);
        $stmt->bindParam(':goal_type', $user_main_goal_type);
        $stmt->bindParam(':country', $user_country);
        $stmt->execute();

        $count = $stmt->rowCount();

        if($count > 0){
            $result = $stmt->fetchAll();

            return $result;
        }
    }



    //hide local goal recommendation
    public function hide_goal_recommendation($goal_id, $user_id, $time, $db){
        $stmt = $db->prepare("INSERT INTO `recommend`(`id`, `user_id`, `group_id`, `goal_id`, `friend_id`, `created_at`, `updated_at`, `hide`) VALUES ('',:user_id,'',:goal_id,'',:created_at,:updated_at,1)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':goal_id', $goal_id);
        $stmt->bindParam(':created_at', $time);
        $stmt->bindParam(':updated_at', $time);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    //hide group recommendation
    public function hide_group_recommendation($group_id, $user_id, $time, $db){
        $stmt = $db->prepare("INSERT INTO `recommend`(`id`, `user_id`, `group_id`, `goal_id`, `friend_id`, `created_at`, `updated_at`, `hide`) VALUES ('',:user_id,:group_id,'','',:created_at,:updated_at,1)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':created_at', $time);
        $stmt->bindParam(':updated_at', $time);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    //check if group recommendation is hidden
    public function check_if_group_hidden($group_id, $user_id, $db){
        $stmt = $db->prepare("SELECT * FROM `recommend` WHERE `hide`=1 AND `group_id`=:group_id AND `user_id`=:user_id");
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    //check if goal recommendation is hidden
    public function check_if_goal_hidden($goal_id, $user_id, $db){
        $stmt = $db->prepare("SELECT * FROM `recommend` WHERE `hide`=1 AND `goal_id`=:goal_id AND `user_id`=:user_id");
        $stmt->bindParam(':goal_id', $goal_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    //check if friend recommendation is hidden
    public function check_if_friend_hidden($friend_id, $user_id, $db){
        $stmt = $db->prepare("SELECT * FROM `recommend` WHERE `hide`=1 AND `friend_id`=:friend_id AND `user_id`=:user_id");
        $stmt->bindParam(':friend_id', $friend_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}
<?php
class Goals{
    public function get_goals($user_id, $db){
        $stmt = $db->prepare("SELECT * FROM `goals` WHERE user_id = :user_id ORDER BY updated_at DESC");
        $stmt->bindParam(':user_id', $user_id);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                while($rows = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                    $output[] = $rows;
                    return $output;
                }
            }
        }
    }

    public function get_first_five_goals($user_id, $db){
        $stmt = $db->prepare("SELECT * FROM `goals` WHERE user_id = :user_id ORDER BY updated_at DESC LIMIT 5");
        $stmt->bindParam(':user_id', $user_id);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                while($rows = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                    $output[] = $rows;
                    return $output;
                }
            }
        }
    }

    public function get_goal($goal_id, $db){
        $stmt = $db->prepare("SELECT * FROM goals  WHERE id = :id");
        $stmt->bindParam(':id', $goal_id);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                while($rows = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                    $output[] = $rows;
                    return $output;
                }
            }
        }
    }

    public function get_user_from_goal($user_id, $db){
        $stmt = $db->prepare("SELECT user_id FROM goals  WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $query = $stmt->execute();
        if( $query ) {
            return $query;
        }
    }

    public function get_goal_from_user_id_and_time($user_id, $time, $db){
        $stmt = $db->prepare("SELECT `id` FROM goals WHERE user_id = :user_id AND created_at = :created_at");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':created_at', $time);
        $stmt->execute();

        $id = $stmt->fetch();

        return $id;
    }

    public function get_goal_owner_info($goal_user_id, $db){
        $stmt = $db->prepare("SELECT * FROM `users` WHERE `id` = :id");
        $stmt->bindParam(':id', $goal_user_id);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                while($rows = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                    $output[] = $rows;
                    return $output;
                }
            }
        }
    }

    public function get_goals_from_name($name, $db){
        $stmt = $db->prepare("SELECT * FROM goals  WHERE `name` LIKE :name");
        $stmt->bindParam(':name', $name);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                while($rows = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                    $output[] = $rows;
                    return $output;
                }
            }
        }
    }

    public function get_goals_from_type($type, $db){
        $stmt = $db->prepare("SELECT * FROM goals  WHERE type LIKE :type");
        $stmt->bindParam(':type', $type);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                while($rows = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                    $output[] = $rows;
                    return $output;
                }
            }
        }
    }

    public function add_goal($type, $name, $about, $user_id, $created_at, $goal_completed, $goal_per_completed, $goal_10, $goal_20, $goal_30, $goal_40, $goal_50, $goal_60, $goal_70, $goal_80, $goal_90, $goal_100, $group_id, $hide, $db){
        $stmt = $db->prepare("INSERT INTO `goals`(`id`, `type`, `name`, `about`, `user_id`, `created_at`, `updated_at`, `goal_completed`,
                            `goal_per_completed`, `goal_10`, `goal_20`, `goal_30`, `goal_40`, `goal_50`, `goal_60`, `goal_70`, `goal_80`, `goal_90`, `goal_100`, `group_id`, `hide`)
                              VALUES ('', :type, :name, :about, :user_id, :created_at, :updated_at, :goal_completed, :goal_per_completed,
                              :goal_10, :goal_20, :goal_30, :goal_40, :goal_50, :goal_60, :goal_70, :goal_80, :goal_90, :goal_100, :group_id, :hide)");



        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':about', $about);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':updated_at', $created_at);
        $stmt->bindParam(':goal_completed', $goal_completed);
        $stmt->bindParam(':goal_per_completed', $goal_per_completed);
        $stmt->bindParam(':goal_10', $goal_10);
        $stmt->bindParam(':goal_20', $goal_20);
        $stmt->bindParam(':goal_30', $goal_30);
        $stmt->bindParam(':goal_40', $goal_40);
        $stmt->bindParam(':goal_50', $goal_50);
        $stmt->bindParam(':goal_60', $goal_60);
        $stmt->bindParam(':goal_70', $goal_70);
        $stmt->bindParam(':goal_80', $goal_80);
        $stmt->bindParam(':goal_90', $goal_90);
        $stmt->bindParam(':goal_100', $goal_100);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':hide', $hide);
        $stmt->execute();
    }

    public function update_goal($id, $type, $name, $about, $updated_at, $goal_completed, $goal_per_completed, $goal_10, $goal_20, $goal_30, $goal_40, $goal_50, $goal_60, $goal_70, $goal_80, $goal_90, $goal_100, $db){
        $stmt = $db->prepare("UPDATE `goals` SET `type`=:type,`name`=:name,`about`=:about,`updated_at`=:updated_at,
                              `goal_completed`=:goal_completed,`goal_per_completed`=:goal_per_completed,`goal_10`=:goal_10,
                              `goal_20`=:goal_20,`goal_30`=:goal_30,`goal_40`=:goal_40,`goal_50`=:goal_50,`goal_60`=:goal_60,
                              `goal_70`=:goal_70,`goal_80`=:goal_80,`goal_90`=:goal_90,`goal_100`=:goal_100 WHERE `id`=:id");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':about', $about);
        $stmt->bindParam(':updated_at', $updated_at);
        $stmt->bindParam(':goal_completed', $goal_completed);
        $stmt->bindParam(':goal_per_completed', $goal_per_completed);
        $stmt->bindParam(':goal_10', $goal_10);
        $stmt->bindParam(':goal_20', $goal_20);
        $stmt->bindParam(':goal_30', $goal_30);
        $stmt->bindParam(':goal_40', $goal_40);
        $stmt->bindParam(':goal_50', $goal_50);
        $stmt->bindParam(':goal_60', $goal_60);
        $stmt->bindParam(':goal_70', $goal_70);
        $stmt->bindParam(':goal_80', $goal_80);
        $stmt->bindParam(':goal_90', $goal_90);
        $stmt->bindParam(':goal_100', $goal_100);
        $stmt->execute();
    }

    public function delete_goal($id, $db){
        $stmt = $db->prepare("DELETE FROM `goals` WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function goal_belongs_to_user($goal_creater, $user_id){
        if($goal_creater == $user_id){
            return true;
        }else{
            return false;
        }
    }

    public function is_goal_completed($goal_per_completed){
        if($goal_per_completed == 100){
            return 1;
        }else{
            return 0;
        }
    }

    public function make_main_goal($user_id, $goal_id, $db){
        $stmt = $db->prepare("UPDATE `users` SET `main_goal`=:goal_id WHERE id = :user_id");
        $stmt->bindParam(':goal_id', $goal_id);
        $stmt->bindParam(':user_id', $user_id);

        $stmt->execute();
    }

    //Group goals
    public function get_goal_from_group_id_and_time($group_id, $time, $db){
        $stmt = $db->prepare("SELECT `id` FROM goals WHERE group_id = :group_id AND created_at = :created_at");
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':created_at', $time);
        $stmt->execute();

        $id = $stmt->fetch();

        return $id;
    }

    public function group_get_goals($group_id, $db){
        $stmt = $db->prepare("SELECT * FROM `goals` WHERE group_id = :group_id ORDER BY updated_at DESC");
        $stmt->bindParam(':group_id', $group_id);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                while($rows = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                    $output[] = $rows;
                    return $output;
                }
            }
        }
    }

    public function group_get_first_five_goals($group_id, $db){
        $stmt = $db->prepare("SELECT * FROM `goals` WHERE group_id = :group_id ORDER BY updated_at DESC LIMIT 5");
        $stmt->bindParam(':group_id', $group_id);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                while($rows = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                    $output[] = $rows;
                    return $output;
                }
            }
        }
    }

    public function group_make_main_goal($group_id, $goal_id, $db){
        $stmt = $db->prepare("UPDATE `groups` SET `main_goal`=:goal_id WHERE id = :group_id");
        $stmt->bindParam(':goal_id', $goal_id);
        $stmt->bindParam(':group_id', $group_id);

        $stmt->execute();
    }

    public function group_update_goal($id, $type, $name, $about, $updated_at, $goal_completed, $goal_per_completed, $goal_10, $goal_20, $goal_30, $goal_40, $goal_50, $goal_60, $goal_70, $goal_80, $goal_90, $goal_100, $db){
        $stmt = $db->prepare("UPDATE `goals` SET `type`=:type,`name`=:name,`about`=:about,`updated_at`=:updated_at,
                              `goal_completed`=:goal_completed,`goal_per_completed`=:goal_per_completed,`goal_10`=:goal_10,
                              `goal_20`=:goal_20,`goal_30`=:goal_30,`goal_40`=:goal_40,`goal_50`=:goal_50,`goal_60`=:goal_60,
                              `goal_70`=:goal_70,`goal_80`=:goal_80,`goal_90`=:goal_90,`goal_100`=:goal_100 WHERE `id`=:id");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':about', $about);
        $stmt->bindParam(':updated_at', $updated_at);
        $stmt->bindParam(':goal_completed', $goal_completed);
        $stmt->bindParam(':goal_per_completed', $goal_per_completed);
        $stmt->bindParam(':goal_10', $goal_10);
        $stmt->bindParam(':goal_20', $goal_20);
        $stmt->bindParam(':goal_30', $goal_30);
        $stmt->bindParam(':goal_40', $goal_40);
        $stmt->bindParam(':goal_50', $goal_50);
        $stmt->bindParam(':goal_60', $goal_60);
        $stmt->bindParam(':goal_70', $goal_70);
        $stmt->bindParam(':goal_80', $goal_80);
        $stmt->bindParam(':goal_90', $goal_90);
        $stmt->bindParam(':goal_100', $goal_100);
        $stmt->execute();
    }

    public function group_delete_goal($id, $db){
        $stmt = $db->prepare("DELETE FROM `goals` WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    //Get unique goals
    public function get_unique($user_id, $db){
        $stmt = $db->prepare("SELECT * FROM goals WHERE user_id = :user_id GROUP BY type LIMIT 5;");
        $stmt->bindParam(':user_id', $user_id);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                while($rows = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                    $output[] = $rows;
                    return $output;
                }
            }
        }
    }

    //Count all goals
    public function get_all_goals_count($db){
        $stmt = $db->prepare("SELECT * FROM `goals`");
        $stmt->execute();
        $count = $stmt->rowCount();

        if( $count > 0) {
            return $count;
        }else{
            return 0;
        }
    }

    //Count all completed goals
    public function get_all_completed_goals_count($db){
        $stmt = $db->prepare("SELECT * FROM `goals` AND completed = 1");
        $stmt->execute();
        $count = $stmt->rowCount();

        if( $count > 0) {
            return $count;
        }else{
            return 0;
        }
    }

    //Get goal count by type
    public function get_goal_count_by_type($type, $db){
        $stmt = $db->prepare("SELECT * FROM `goals` WHERE type = :type");
        $stmt->bindParam(':type', $type);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            return $count;
        }
    }

    //Get goal count by user_id
    public function get_goal_count_by_user_id($type, $db){
        $stmt = $db->prepare("SELECT * FROM `goals` WHERE type = :type GROUP BY user_id");
        $stmt->bindParam(':type', $type);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            return $count;
        }
    }

    public function get_group_count_by_group_type($type, $db){
        $stmt = $db->prepare("SELECT * FROM `groups` WHERE group_type = :type GROUP BY id");
        $stmt->bindParam(':type', $type);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            return $count;
        }
    }


    //Get goal count by type and completed = 1
    public function get_goal_count_by_type_and_completed($type, $db){
        $stmt = $db->prepare("SELECT * FROM `goals` WHERE type = :type AND goal_completed = 1");
        $stmt->bindParam(':type', $type);
        $query = $stmt->execute();
        if( $query ) {
            if($stmt->rowCount() > 0){
                $count = $stmt->rowCount();
                return $count;
            }else{
                return 0;
            }
        }
    }

    //Get largest group info by type
    public function get_largest_group_by_type($type, $db){
        $stmt = $db->prepare("SELECT COUNT(group_members.group_id) AS value_occurance, groups.group_name, groups.main_goal, groups.city_town_village,
                              groups.state, groups.country, groups.updated_at, groups.created_at, groups.group_type, groups.id FROM group_members
                              INNER JOIN groups ON group_members.group_id = groups.id WHERE groups.group_type = :group_type");
        $stmt->bindParam(':group_type', $type);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                while($rows = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                    $output[] = $rows;
                    return $output;
                }
            }
        }
    }
}
?>
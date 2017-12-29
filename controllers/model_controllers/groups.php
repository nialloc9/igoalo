<?php

class Groups
{
    //Create update delete
    public function create($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db){
        $stmt = $db->prepare("INSERT INTO `groups`(`id`, `group_name`, `profile_pic`, `cover_pic`, `creater`, `group_type`, `about`, `main_goal`, `state`, `country`, `city_town_village`, `created_at`, `updated_at`)
                VALUES ('',:group_name,'','',:creater,:group_type,:about,'',:state,:country,:city_town_village,:created_at,:updated_at)");
        $stmt->bindParam(':group_name', $name);
        $stmt->bindParam(':creater', $creater);
        $stmt->bindParam(':group_type', $type);
        $stmt->bindParam(':about', $about);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':city_town_village', $city_town_village);
        $stmt->bindParam(':created_at', $time);
        $stmt->bindParam(':updated_at', $time);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($group_id, $type, $name, $about, $city_town_village, $state, $country, $time, $db){
        $stmt = $db->prepare("UPDATE `groups` SET `group_name`=:group_name,
                `group_type`=:group_type,`about`=:group_about,
                `state`=:group_state,`country`=:group_country,`city_town_village`=:city_town_village,`updated_at`=:updated_at WHERE `id`=:group_id");

        $stmt->bindParam(':group_name', $name);
        $stmt->bindParam(':group_type', $type);
        $stmt->bindParam(':group_about', $about);
        $stmt->bindParam(':group_state', $state);
        $stmt->bindParam(':group_country', $country);
        $stmt->bindParam(':city_town_village', $city_town_village);
        $stmt->bindParam(':updated_at', $time);
        $stmt->bindParam(':group_id', $group_id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($group_id, $db){
        $stmt = $db->prepare("DELETE FROM `groups` WHERE `id` = :group_id");
        $stmt->bindParam(':group_id', $group_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Update profile and cover pic
    public function update_profile_and_cover_pic($group_id, $profile_pic, $cover_pic, $updated_at, $db){
        $stmt = $db->prepare("UPDATE `groups` SET `profile_pic`=:profile_pic, `cover_pic`=:cover_pic, `updated_at` = :updated_at WHERE `id`=:group_id");
        $stmt->bindParam(':profile_pic', $profile_pic);
        $stmt->bindParam(':cover_pic', $cover_pic);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':updated_at', $updated_at);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update_profile($group_id, $profile_pic, $updated_at, $db){
        $stmt = $db->prepare("UPDATE `groups` SET `profile_pic`=:profile_pic, `updated_at` = :updated_at WHERE `id`=:group_id");
        $stmt->bindParam(':profile_pic', $profile_pic);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':updated_at', $updated_at);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update_cover_pic($group_id, $cover_pic, $updated_at, $db){
        $stmt = $db->prepare("UPDATE `groups` SET `cover_pic`=:cover_pic, `updated_at` = :updated_at WHERE `id`=:group_id");
        $stmt->bindParam(':cover_pic', $cover_pic);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':updated_at', $updated_at);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update_main_goal($group_id, $goal_id, $updated_at, $db){
        $stmt = $db->prepare("UPDATE `groups` SET `main_goal`=:main_goal, `updated_at`=:updated_at WHERE `id`=:group_id");
        $stmt->bindParam(':main_goal', $goal_id);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':updated_at', $updated_at);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Show groups
    public function show_group_by_id($group_id, $db){
        $stmt = $db->prepare("SELECT * FROM `groups` WHERE `id`=:group_id");
        $stmt->bindParam(':group_id', $group_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll();
            return $result;
        }else{
            return null;
        }

    }

    public function show_group_by_type($group_type, $db){
        $stmt = $db->prepare("SELECT * FROM `groups` WHERE `group_type`=:group_type");
        $stmt->bindParam(':group_type', $group_type);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll();
            return $result;
        }else{
            return '';
        }
    }

    public function show_group_by_name($group_name, $db){
        $stmt = $db->prepare("SELECT * FROM `groups` WHERE `group_name`=:group_name");
        $stmt->bindParam(':group_name', $group_name);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll();
            return $result;
        }else{
            return '';
        }
    }

    public function show_group_by_creater_and_time($user_id, $time, $db){
        $stmt = $db->prepare("SELECT `id` FROM `groups` WHERE `creater`=:creater AND `created_at`=:created_at");
        $stmt->bindParam(':creater', $user_id);
        $stmt->bindParam(':created_at', $time);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetch();
            return $result;
        }else{
            return '';
        }
    }

    public function show_groups_user_is_a_member_of($member_id, $db){
        $stmt = $db->prepare("SELECT `group_id` FROM `group_members` WHERE `member_id`=:member_id");

        $stmt->bindParam(':member_id', $member_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll();
            return $result;
        }else{
            false;
        }
    }

    public function show_groups_user_is_an_admin_of($member_id, $db){
        $stmt = $db->prepare("SELECT `group_id` FROM `group_members` WHERE `member_id`=:member_id AND `admin`='1'");

        $stmt->bindParam(':member_id', $member_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll();
            return $result;
        }else{
            return '';
        }
    }

    public function show_six_groups_user_is_a_member_of($member_id, $db){
        $stmt = $db->prepare("SELECT `group_id` FROM `group_members` WHERE `member_id`=:member_id ORDER BY `updated_at` DESC LIMIT 6");

        $stmt->bindParam(':member_id', $member_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll();
            return $result;
        }else{
            return '';
        }

    }

    public function group_create_member($group_id, $user_id, $time, $db){
        $stmt = $db->prepare("INSERT INTO `group_members`(`id`, `member_id`, `group_id`, `admin`, `joined`, `created_at`, `updated_at`,`accepted`)
                              VALUES ('',:member_id,:group_id,1,:joined,:created_at,:updated_at,1)");
        $stmt->bindParam(':member_id', $user_id);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':joined', $time);
        $stmt->bindParam(':created_at', $time);
        $stmt->bindParam(':updated_at', $time);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function add_member($group_id, $user_id, $time, $db){
        $stmt = $db->prepare("INSERT INTO `group_members`(`id`, `member_id`, `group_id`, `admin`, `joined`, `created_at`, `updated_at`,`accepted`)
                              VALUES ('',:member_id,:group_id,'',:joined,:created_at,:updated_at,0)");
        $stmt->bindParam(':member_id', $user_id);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':joined', $time);
        $stmt->bindParam(':created_at', $time);
        $stmt->bindParam(':updated_at', $time);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function accept_member($member_id, $group_id, $time, $db){
        $stmt = $db->prepare("UPDATE `group_members` SET `accepted`='1',`updated_at`=:updated_at WHERE `member_id`=:member_id AND `group_id`=:group_id");
        $stmt->bindParam(':updated_at', $time);
        $stmt->bindParam(':member_id', $member_id);
        $stmt->bindParam(':group_id', $group_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function reject_member($group_id, $user_id, $db){
        $stmt = $db->prepare("DELETE FROM `group_members` WHERE `member_id`=:member_id AND `group_id`=:group_id AND `accepted`=0");
        $stmt->bindParam(':member_id', $user_id);
        $stmt->bindParam(':group_id', $group_id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function add_admin($member_id, $group_id, $time, $db){
        $stmt = $db->prepare("UPDATE `group_members` SET `admin`='1',`updated_at`=:updated_at WHERE `member_id`=:member_id AND `group_id`=:group_id");

        $stmt->bindParam(':updated_at', $time);
        $stmt->bindParam(':member_id', $member_id);
        $stmt->bindParam(':group_id', $group_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function leave_group($member_id, $group_id, $db){
        $stmt = $db->prepare("DELETE FROM `group_members` WHERE `member_id`=:member_id AND `group_id`=:group_id");

        $stmt->bindParam(':member_id', $member_id);
        $stmt->bindParam(':group_id', $group_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete_all_group_members($group_id, $db){
        $stmt = $db->prepare("DELETE FROM `group_members` WHERE `group_id`=:group_id");

        $stmt->bindParam(':group_id', $group_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete_admin($member_id, $group_id, $time, $db){
        $stmt = $db->prepare("UPDATE `group_members` SET `admin`='',`updated_at`=:updated_at WHERE `member_id`=:member_id AND `group_id`=:group_id");

        $stmt->bindParam(':updated_at', $time);
        $stmt->bindParam(':member_id', $member_id);
        $stmt->bindParam(':group_id', $group_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function show_members($group_id, $db){
        $stmt = $db->prepare("SELECT * FROM `group_members` WHERE `group_id`=:group_id AND `accepted`=1 ORDER BY `joined` ASC");

        $stmt->bindParam(':group_id', $group_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll();
            return $result;
        }else{
            return '';
        }
    }

    public function show_six_members($group_id, $db){
        $stmt = $db->prepare("SELECT * FROM `group_members` WHERE `group_id`=:group_id AND `accepted` = 1 ORDER BY `joined` ASC LIMIT 6");

        $stmt->bindParam(':group_id', $group_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll();
            return $result;
        }else{
            return '';
        }
    }

    public function count_members($group_id, $db){
        $stmt = $db->prepare("SELECT * FROM `group_members` WHERE `group_id`=:group_id");

        $stmt->bindParam(':group_id', $group_id);
        $stmt->execute();

        $result = $stmt->rowCount();

        if($result > 0){
            return $result;
        }else{
            return 0;
        }
    }

    public function count_admin($group_id, $db){
        $stmt = $db->prepare("SELECT `admin` FROM `group_members` WHERE `group_id`=:group_id");

        $stmt->bindParam(':group_id', $group_id);
        $stmt->execute();

        $result = $stmt->rowCount();

        if($result > 0){
            return $result;
        }else{
            return 0;
        }
    }

    public function show_admin($group_id, $db){
        $stmt = $db->prepare("SELECT * FROM `group_members` WHERE `group_id`=:group_id AND `admin`='1' ORDER BY `id` DESC");

        $stmt->bindParam(':group_id', $group_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function show_six_admin($group_id, $db){
        $stmt = $db->prepare("SELECT * FROM `group_members` WHERE `group_id`=:group_id AND `admin`='1' ORDER BY `id` DESC LIMIT 6");

        $stmt->bindParam(':group_id', $group_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function user_is_group_member($member_id, $group_id, $db){
        $stmt = $db->prepare("SELECT * FROM `group_members` WHERE `member_id`=:member_id AND `group_id`=:group_id AND `accepted`=1");

        $stmt->bindParam(':member_id', $member_id);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function user_is_group_admin($member_id, $group_id, $db){
        $stmt = $db->prepare("SELECT * FROM `group_members` WHERE `member_id`=:member_id AND `group_id`=:group_id AND `admin`='1'");

        $stmt->bindParam(':member_id', $member_id);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function join_request_sent($member_id, $group_id, $db){
        $stmt = $db->prepare("SELECT * FROM `group_members` WHERE `member_id`=:member_id AND `group_id`=:group_id AND `accepted`=0");

        $stmt->bindParam(':member_id', $member_id);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    //Get group profile and cover pictures
    public function get_group_profile_pic($pic){
        if(isset($pic) && !empty($pic)){
            return $pic;
        }else{
            return 'images/no_group_profile_pic.jpg';
        }
    }

    public function get_group_cover_pic($pic){
        if(isset($pic) && !empty($pic)){
            return $pic;
        }else{
            return 'images/no_cover_picture.jpg';
        }
    }

    //Count groups
    public function count_groups($db){
        $stmt = $db->prepare("SELECT * FROM groups");
        $stmt->execute();

        $count = $stmt->rowCount();

        if($count > 0){
            return $count;
        }else{
            return 0;
        }

    }



    //Get largest group info
    public function get_largest_group($db){
        $stmt = $db->prepare("SELECT COUNT(group_members.group_id) AS value_occurance, groups.group_name, groups.main_goal, groups.city_town_village,
                              groups.state, groups.country, groups.updated_at, groups.created_at, groups.group_type, groups.id FROM group_members
                              INNER JOIN groups ON group_members.group_id = groups.id");
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
    //Tests
    //Create update delete
    public function create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db){
        $stmt = $db->prepare("INSERT INTO `groups`(`id`, `group_name`, `profile_pic`, `cover_pic`, `creater`, `group_type`, `about`, `main_goal`, `state`, `country`, `city_town_village`, `created_at`, `updated_at`)
                VALUES (1000,:group_name,'','',:creater,:group_type,:about,'',:state,:country,:city_town_village,:created_at,:updated_at)");
        $stmt->bindParam(':group_name', $name);
        $stmt->bindParam(':creater', $creater);
        $stmt->bindParam(':group_type', $type);
        $stmt->bindParam(':about', $about);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':city_town_village', $city_town_village);
        $stmt->bindParam(':created_at', $time);
        $stmt->bindParam(':updated_at', $time);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
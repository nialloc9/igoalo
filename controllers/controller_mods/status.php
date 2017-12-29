<?php
class Status{
    //Status
    //We are actually going to have 2 methods here just incase you want to chamge them or use them individually just so we have hte flexibility..

    public function statuses($page_id, $db) // Get statuses
    {
        $stmt = $db->prepare("SELECT * FROM `statuses` WHERE page_id = :page_id ORDER BY updated_at DESC");
        $stmt->bindParam(':page_id', $page_id);
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

    public function get_status_info($status_id, $db) //Get a single status
    {
        $stmt = $db->prepare("SELECT * FROM statuses  WHERE id = :id");
        $stmt->bindParam(':id', $status_id);
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

    public function count_statuses($page_id, $db) // Get statuses
    {
        $stmt = $db->prepare("SELECT * FROM `statuses` WHERE page_id = :page_id ORDER BY updated_at DESC");
        $stmt->bindParam(':page_id', $page_id);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            return $count;
        }
    }

    //Ajax
    public function ajax_get_status($_user_id, $created_at, $db){
        $stmt = $db->prepare("SELECT * FROM statuses  WHERE user_id = :user_id AND created_at = :created_at");
        $stmt->bindParam(':user_id', $_user_id);
        $stmt->bindParam(':created_at', $created_at);
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

    public function user($status_user_id, $user_id){//This checks that this status being used belongs to the user with the same id as this user_id.
           if($status_user_id == $user_id){
               return true;
           }else{
               return false;
           }
    }

    //Reply
    //There are too differant types of statuses in the statuses table.
    public function statusNotReply($status_id, $db){ //This checks if the status is a reply to another status.
        $stmt = $db->prepare("SELECT parent_id FROM statuses  WHERE id = :id");
        $stmt->bindParam(':id', $status_id);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                if($query == null){
                    $result = true;
                }else{
                    $result = false;
                }
            }
        }
        return $result;
    }

    public function replies($status_id, $reply_id, $db){ //This creates a relationship called between what ever we call this for and the status model using the parent_id.
        $stmt = $db->prepare("UPDATE `statuses` SET `parent_id`= :reply_id WHERE id = :status_id");
        $stmt->bindParam('reply_id:', $reply_id);
        $stmt->bindParam('status_id:', $status_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getRepliesCount($status_id, $db){ //Get list of replies to a status
        $stmt = $db->prepare("SELECT * FROM statuses  WHERE parent_id = :parent_id ORDER BY id ASC");
        $stmt->bindParam(':parent_id', $status_id);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            return $count;
        }
    }

    public function getReplies($status_id, $start, $db){ //Get list of replies to a status
        $stmt = $db->prepare("SELECT * FROM statuses  WHERE parent_id = :parent_id ORDER BY id ASC LIMIT $start, 5");
        $stmt->bindParam(':parent_id', $status_id);
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

    //Make sure that you input the old data in first before you change it so that the data won't be null.
    public function insert($user_id, $parent_id, $page_id, $body, $attachment, $image, $video, $created_at, $goal_id, $group_id, $group_status, $db){ //Insert a new status
        $stmt = $db->prepare("INSERT INTO `statuses`(`id`, `user_id`, `parent_id`, `page_id`, `body`, `attachment`, `image`, `video`, `created_at`, `updated_at`, `goal_id`, `group_id`, `group_status`, `hide`) VALUES ('', :user_id, :parent_id, :page_id, :body, :attachment, :image, :video, :created_at, :updated_at, :goal_id, :group_id, :group_status, '')");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':parent_id', $parent_id);
        $stmt->bindParam(':page_id', $page_id);
        $stmt->bindParam(':body', $body);
        $stmt->bindParam(':attachment', $attachment);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':video', $video);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':updated_at', $created_at);
        $stmt->bindParam(':goal_id', $goal_id);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':group_status', $group_status);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($id, $body, $attachment, $image, $video, $updated_at, $db){ //Update a status
        $stmt = $db->prepare("UPDATE `statuses` SET `body`= :body,`attachment`= :attachment,`image`= :image,`video`= :video, `updated_at`= :updated_at WHERE id = :id");
        $stmt->bindParam(':body', $body);
        $stmt->bindParam(':attachment', $attachment);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':video', $video);
        $stmt->bindParam(':updated_at', $updated_at);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


    public function update_parent_status_updated_at($id, $updated_at, $db){ //Update a status
        $stmt = $db->prepare("UPDATE `statuses` SET `updated_at`= :updated_at WHERE id = :id");
        $stmt->bindParam(':updated_at', $updated_at);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id, $db){//Delete a status.
        $stmt = $db->prepare("DELETE FROM `statuses` WHERE id = :id OR parent_id = :id");
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function type($status, $image, $video, $attachment){
        if(isset($image) && !empty($image) && (!isset($status) || empty($status)) && (!isset($video) || empty($video)) && (!isset($attachment) || empty($attachment))){
            return 2;
        }elseif(isset($video) && !empty($video) && (!isset($status) || empty($status)) && (!isset($image) || empty($image)) && (!isset($attachment) || empty($attachment))){
            return 3;
        }elseif(isset($attachment) && !empty($attachment) && (!isset($status) || empty($status)) && (!isset($video) || empty($video)) && (!isset($image) || empty($image))){
            return 4;
        }else{
            return 1;
        }
    }

    //Paginate
    public function paginate($start, $per_page, $user_page, $db){
        $stmt = $db->prepare("SELECT * FROM `statuses` WHERE page_id = :page_id ORDER BY updated_at DESC LIMIT $start, $per_page");
        $stmt->bindParam(':page_id', $user_page);
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

    public function paginatePages($page_id, $per_page, $db){
        $stmt = $db->prepare("SELECT * FROM `statuses` WHERE page_id = :page_id");
        $stmt->bindParam(':page_id', $page_id);
        $query = $stmt->execute();
        if( $query ) {
            $total = $stmt->rowCount();
            $pages = ceil($total/$per_page); //Ceil function rounds up the number.
            return $pages;
        }
    }

    //Goals
    public function delete_status_from_goal_id($goal_id, $db){//Delete a status with goal id.
        $stmt = $db->prepare("DELETE FROM `statuses` WHERE goal_id = :goal_id");
        $stmt->bindParam(':goal_id', $goal_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete_status_from_group_id($group_id, $db){//Delete a status with group id.
        $stmt = $db->prepare("DELETE FROM `statuses` WHERE group_id = :group_id");
        $stmt->bindParam(':group_id', $group_id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Group page
    public function group_page_paginate($start, $per_page, $group_id, $db){
        $stmt = $db->prepare("SELECT * FROM `statuses` WHERE group_status = :group_status ORDER BY updated_at DESC LIMIT $start, $per_page");
        $stmt->bindParam(':group_status', $group_id);
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

    public function groupPaginatePages($group_id, $per_page, $db){
        $stmt = $db->prepare("SELECT * FROM `statuses` WHERE group_status = :group_status");
        $stmt->bindParam(':group_status', $group_id);
        $query = $stmt->execute();
        if( $query ) {
            $total = $stmt->rowCount();
            $pages = ceil($total/$per_page); //Ceil function rounds up the number.
            return $pages;
        }
    }

    public function group_count_statuses($group_id, $db) // Get statuses
    {
        $stmt = $db->prepare("SELECT * FROM `statuses` WHERE group_status = :group_id ORDER BY updated_at DESC");
        $stmt->bindParam(':group_id', $group_id);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            return $count;
        }
    }

    public function t_status($friends, $groups, $user_id, $start, $per_page, $db){

        $group_array = implode(',', $groups);
        $friend_array = implode(',', $friends);

        $stmt = $db->prepare("SELECT * FROM statuses WHERE (user_id IN ($friend_array)) OR user_id = :auth_id OR (group_id IN ($group_array) && group_id != 0) ORDER BY updated_at DESC LIMIT :offset, :limit");
        $stmt->bindParam(':auth_id', $user_id);
        $stmt->bindParam(':offset', $start, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $per_page, PDO::PARAM_INT);

        $stmt->execute();


        if ($stmt->rowCount() > 0) {
            $arr= array();
            while($row = $stmt->fetch()) {
                $arr[]=$row;
            }
            return $arr;
        }
    }

    //Insert test
    public function test_insert($id, $user_id, $parent_id, $page_id, $body, $attachment, $image, $video, $created_at, $goal_id, $group_id, $group_status, $db)
    { //Insert a new status
        $stmt = $db->prepare("INSERT INTO `statuses`(`id`, `user_id`, `parent_id`, `page_id`, `body`, `attachment`, `image`, `video`, `created_at`, `updated_at`, `goal_id`, `group_id`, `group_status`, `hide`) VALUES (:id, :user_id, :parent_id, :page_id, :body, :attachment, :image, :video, :created_at, :updated_at, :goal_id, :group_id, :group_status, '')");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':parent_id', $parent_id);
        $stmt->bindParam(':page_id', $page_id);
        $stmt->bindParam(':body', $body);
        $stmt->bindParam(':attachment', $attachment);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':video', $video);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':updated_at', $created_at);
        $stmt->bindParam(':goal_id', $goal_id);
        $stmt->bindParam(':group_id', $group_id);
        $stmt->bindParam(':group_status', $group_status);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
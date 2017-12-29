<?php
class Like{


    public function likes($status_id, $db){//This gets the user who has the status, image etc that was liked.
        $stmt = $db->prepare("SELECT `user_id`, FROM `statuses` WHERE id = :id");
        $stmt->bindParam(':id', $status_id);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                return $query;
            }
        }
    }
    //If we wanted to add likeable functionality to another model like to like a user we would add the functionalty above to the model user.php

    public function like_counter($status_id, $db){//This gets the user who has the status, image etc that was liked.
        $stmt = $db->prepare("SELECT * FROM `likeable` WHERE likeable_id = :likeable_id");
        $stmt->bindParam(':likeable_id', $status_id);
        $query = $stmt->execute();
        if( $query ) {
            return $stmt->rowCount();
        }
    }

    public function likeable($likeable_type, $likeable_id, $created_at, $user_id, $db){//This says that I am a polymorphic model. I can be applied to anyother model like images, vidoes, statuses, etc.
        $stmt = $db->prepare("INSERT INTO `likeable`(`id`, `user_id`, `likeable_id`, `likeable_type`, `created_at`, `updated_at`) VALUES ('', :user_id, :likeable_id, :likeable_type, :created_at, '')");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':likeable_id', $likeable_id);
        $stmt->bindParam(':likeable_type', $likeable_type);
        $stmt->bindParam(':created_at', $created_at);
        if($stmt->execute()){
            return true;
        }
    }

    public function delete_like($likeable_id, $db){//This says that I am a polymorphic model. I can be applied to anyother model like images, vidoes, statuses, etc.
        $stmt = $db->prepare("DELETE FROM `likeable` WHERE likeable_id = :id");
        $stmt->bindParam(':id', $likeable_id);
        $stmt->execute();
    }

    public function user_has_liked($user_id, $status_id, $db){
        $stmt = $db->prepare("SELECT * FROM `likeable` WHERE likeable_id = :likeable_id AND user_id = :user_id");
        $stmt->bindParam(':likeable_id', $status_id);
        $stmt->bindParam(':user_id', $user_id);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                return 1;
            }else{
                return 0;
            }
        }
    }

    public function user($user_id){ //This gets the suer who liked the status image etc
        return $user_like = $user_id;
    }
}
?>
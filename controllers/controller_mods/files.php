<?php
class Files{
    //upload file
    public function upload_file($name, $tmp_name, $location)
    {
        if (isset($name) && !empty($name)) {
            move_uploaded_file($tmp_name, $location . $name);
        }
    }

    public function check_file_size($size, $max, $min){
        if(($size > $max) || ($size < $min)){
            return false;
        }else{
            return true;
        }
    }

    public function check_if_image($path_to_image){
        $get_image_size = getimagesize($path_to_image);
        if($get_image_size == 0){
            return false;
        }else{
            return true;
        }
    }

    public function check_if_image_type_is_allowed($name, $type){
        if(isset($name) && !empty($name)){
            $extension = strtolower(substr($name, strpos($name, '.') + 1));
            if(($extension=='jpg' || $extension=='jpeg' || $extension =='png' || $extension=='gif') && ($type=='image/jpeg'||$type=='image/png'||$type=='image/gif')){ ///We also perform checks here to make sure the file has an extension of either jpg or jpeg.
                return true;
            }
        }
    }

    public function check_if_video_type_is_allowed($type){

    }

    public function upload_file_location_to_database($location, $type, $user_id, $time, $db){

        $stmt = $db->prepare("INSERT INTO `images_videos_attachments`(`id`, `file_type`, `location`, `status_id`, `user_id`, `created_at`, `updated_at`)
                              VALUES ('',:file_type,:location,'',:user_id,:created_at,:updated_at)");

        $stmt->bindParam(':file_type', $type);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':created_at', $time);
        $stmt->bindParam(':updated_at', $time);
        $stmt->execute();

    }

    public function get_image_video_attachment_by_name($location, $user_id, $db){
        $stmt = $db->prepare("SELECT `id`, FROM `images_videos_attachments` WHERE `location`=:location AND `user_id`=:user_id");
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
    }
}
?>
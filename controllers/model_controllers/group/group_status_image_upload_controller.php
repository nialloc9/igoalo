<?php
require_once 'controllers/controller_mods/status.php';
if(
    isset($_POST['group_image_post_status_body']) ||
    isset($_POST['group_image_post_image']) &&
    isset($_POST['group_image_post_group_id']) &&
    isset($_POST['group_image_post_status_token']) &&
    isset($_POST['group_image_post_post_user_id']) &&
    isset($_POST['group_image_post_post_time'])
){
    if(
        !empty(['group_image_post_image']) ||
        !empty(['group_image_post_group_id']) &&
        !empty(['group_image_post_status_token']) &&
        !empty(['group_image_post_post_user_id']) &&
        !empty(['group_image_post_post_time'])
    ){
        $image_post_body = $_POST['group_image_post_status_body'];
        $image_post_group_id = $_POST['group_image_post_group_id'];
        $token = $_POST['group_image_post_status_token'];
        $image_post_user_id = $_POST['group_image_post_user_id'];
        $image_post_created_at = $_POST['group_image_post_time'];

        $image_name = $_FILES['group_image_post_image']['name'];
        $image_type = $_FILES['group_image_post_image']['type'];
        $image_size = $_FILES['group_image_post_image']['size'];
        $tmp_name = $_FILES['group_image_post_image']['tmp_name'];
        $error = $_FILES['group_image_post_image']['error'];

        $image_time = time();

        $location = 'images/user_images/'.$image_time;

        if($body == ''){
            $body ='Uploaded a picture';
        }

        if(Token::check($token)){
            if(Files::check_if_image_type_is_allowed($image_name, $image_type) && Files::check_if_image($tmp_name) && Files::check_file_size($image_size, 3000000, 0)) {
                //pic
                Files::upload_file($image_name, $tmp_name, $location);
                $image_location = $location.$image_name;
                Files::upload_file_location_to_database($image_location, $image_type, $image_post_user_id, $image_post_created_at, $db);

                //Create status
                if(Status::insert($image_post_user_id, '', '', $body, '', $image_location, '', $image_post_created_at, '', '', $image_post_group_id, $db)){

                }
            }
        }

        header('Location: profile_template_group.php?group_id='.$image_post_group_id);
    }
}
?>
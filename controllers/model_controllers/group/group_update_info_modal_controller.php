<?php
if(isset($_POST['group_update_type']) &&
    isset($_POST['group_update_name']) &&
    isset($_POST['group_update_about']) &&
    isset($_POST['group_update_country']) &&
    isset($_POST['group_update_state']) &&
    isset($_POST['group_address_update']) &&
    isset($_POST['group_id_update']) &&
    isset($_POST['group_update_user_id']) &&
    isset($_POST['group_time_update']) &&
    !empty($_POST['token']) &&
    !empty($_POST['group_update_type']) &&
    !empty($_POST['group_update_name']) &&
    !empty($_POST['group_update_country']) &&
    !empty($_POST['group_update_state']) &&
    !empty($_POST['group_address_update']) &&
    !empty($_POST['group_id_update']) &&
    !empty($_POST['group_time_update']) &&
    !empty($_POST['group_update_user_id']) &&
    !empty($_POST['token'])
){
    $group_type = $_POST['group_update_type'];
    $name = $_POST['group_update_name'];
    $about = $_POST['group_update_about'];
    $country = $_POST['group_update_country'];
    $state = $_POST['group_update_state'];
    $city_town_village = $_POST['group_address_update'];
    $group_id = $_POST['group_id_update'];
    $group_time = $_POST['group_time_update'];
    $time = time();
    $token = $_POST['token'];
    $group_user_id = $_POST['group_update_user_id'];

    if($group_type == 'More'){
        $type = $_POST['group_update_type_more'];
    }else{
        $type = $group_type;
    }

    if(Token::check($token)){
        Groups::update($group_id, $type, $name, $about, $city_town_village, $state, $country, $group_time, $db);

        $profile_pic_name = $_FILES['group_profile_pic_update']['name']; ///This will show us the file name of the file we have uploaded.
        $cover_pic_name = $_FILES['group_cover_pic_update']['name'];

        $profile_pic_size = $_FILES['group_profile_pic_update']['size']; /// This will show us the size of the file.
        $cover_pic_size = $_FILES['group_cover_pic_update']['name'];

        $profile_pic_type = $_FILES['group_profile_pic_update']['type']; ///This will show the type of the file.
        $cover_pic_type = $_FILES['group_cover_pic_update']['type'];

        $profile_pic_tmp_name=$_FILES['group_profile_pic_update']['tmp_name']; ///This is slightly differant to the ones above. When we upload the file it is sent to a temporary location on you server. It is ready and waiting for us to process it. Even though we have uploaded it we havn't moved it yet.
        $cover_pic_tmp_name = $_FILES['group_cover_pic_update']['tmp_name'];

        $profile_pic_error = $_FILES['group_profile_pic_update']['error']; ///This returns an error(1) if there is one or 0 if there is not.
        $cover_pic_error = $_FILES['group_cover_pic_update']['error'];

        $profile_pic_location = 'images/group_profile/'.$time;
        $cover_pic_location = 'images/group_cover/'.$time;

        if((Files::check_if_image_type_is_allowed($profile_pic_name, $profile_pic_type) && Files::check_if_image($profile_pic_tmp_name) && Files::check_file_size($profile_pic_size, 3000000, 0)) &&
            (Files::check_if_image_type_is_allowed($cover_pic_name, $cover_pic_type) && Files::check_if_image($cover_pic_tmp_name) && Files::check_file_size($cover_pic_size, 3000000, 0))
        ){
            //profile
            Files::upload_file($profile_pic_name, $profile_pic_tmp_name, $profile_pic_location);
            $profile_image = $profile_pic_location.$profile_pic_name;
            Files::upload_file_location_to_database($profile_image, $profile_pic_type, $group_user_id, $group_time, $db);

            //cover
            Files::upload_file($cover_pic_name, $cover_pic_tmp_name, $cover_pic_location);
            $cover_image = $cover_pic_location.$cover_pic_name;
            Files::upload_file_location_to_database($cover_image, $cover_pic_type, $group_user_id, $group_time, $db);

            //update group info
            Groups::update_profile_and_cover_pic($group_id, $profile_image, $cover_image, $group_time, $db);

            //Create status
            $profile_body = 'We added a new profile picture.';
            $cover_body = 'We added a new cover picture.';

            Status::insert($group_user_id, '', '', $profile_body, '', $profile_image, '', $group_time,'','',$group_id, $db);
            Status::insert($group_user_id, '', '', $cover_body, '', $cover_image, '', $group_time,'','',$group_id, $db);

            header('Location: profile_template_group.php?group_id='.$group_id);

        }elseif(Files::check_if_image_type_is_allowed($profile_pic_name, $profile_pic_type) && Files::check_if_image($profile_pic_tmp_name) && Files::check_file_size($profile_pic_size, 3000000, 0)){
            //profile pic
            Files::upload_file($profile_pic_name, $profile_pic_tmp_name, $profile_pic_location);
            $profile_image = $profile_pic_location.$profile_pic_name;
            Files::upload_file_location_to_database($profile_image, $profile_pic_type, $group_user_id, $group_time, $db);
            Groups::update_profile($group_id, $profile_image, $group_time, $db);

            //Create status
            $profile_body = 'We updated our profile picture.';
            Status::insert($group_user_id, '', '', $profile_body, '', $profile_image, '', $group_time,'','',$group_id, $db);

            header('Location: profile_template_group.php?group_id='.$group_id);

        }elseif(Files::check_if_image_type_is_allowed($cover_pic_name, $cover_pic_type) && Files::check_if_image($cover_pic_tmp_name) && Files::check_file_size($cover_pic_size, 3000000, 0)){
            //cover pic
            Files::upload_file($cover_pic_name, $cover_pic_tmp_name, $cover_pic_location);
            $cover_image = $cover_pic_location.$cover_pic_name;
            Files::upload_file_location_to_database($cover_image, $cover_pic_type, $group_user_id, $group_time, $db);
            Groups::update_cover_pic($group_id, $cover_image, $group_time, $db);

            //Create status
            $cover_body = 'We updated our cover picture.';
            Status::insert($group_user_id, '', '', $cover_body, '', $cover_image, '', $group_time,'','',$group_id, $db);

            header('Location: profile_template_group.php?group_id='.$group_id);
        }
    }
}
?>
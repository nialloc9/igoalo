<?php
if(isset($_POST['username_update']) &&
    isset($_POST['firstname_update']) &&
    isset($_POST['surname_update']) &&
    isset($_POST['age_update']) &&
    isset($_POST['gender_update']) &&
    isset($_POST['country_update']) &&
    isset($_POST['state_update']) &&
    isset($_POST['address_update']) &&
    isset($_POST['phone_update']) &&
    isset($_POST['email_update']) &&
    isset($_POST['user_id_update']) &&
    isset($_POST['time_update']) &&
    !empty($_POST['firstname_update']) &&
    !empty($_POST['surname_update']) &&
    !empty($_POST['age_update']) &&
    !empty($_POST['gender_update']) &&
    !empty($_POST['country_update']) &&
    !empty($_POST['state_update']) &&
    !empty($_POST['address_update']) &&
    !empty($_POST['email_update']) &&
    !empty($_POST['user_id_update'])
){
    $username_update = $_POST['username_update'];
    $firstname_update = $_POST['firstname_update'];
    $surname_update = $_POST['surname_update'];
    $age_update = $_POST['age_update'];
    $gender_update = $_POST['gender_update'];
    $country_update = $_POST['country_update'];
    $state_update = $_POST['state_update'];
    $address_update = $_POST['address_update'];
    $post_update = $_POST['post_update'];
    $phone_update = $_POST['phone_update'];
    $email_update = $_POST['email_update'];
    $age_update = $_POST['age_update'];
    $user_update_id = $_POST['user_id_update'];
    $updated_at = $_POST['time_update'];
    $user_update_id = $_POST['user_id_update'];


    $time = time();
    if(Token::check($_POST['token'])){

        User::update($user_update_id, $username_update, '', $firstname_update, $surname_update, $gender_update, $age_update, $address_update, $state_update, $country_update, $post_update, $phone_update, $email_update, $update_at, $db);

        $profile_pic_name = $_FILES['profile_pic_update']['name']; ///This will show us the file name of the file we have uploaded.
        $cover_pic_name = $_FILES['cover_pic_update']['name'];

        $profile_pic_size = $_FILES['profile_pic_update']['size']; /// This will show us the size of the file.
        $cover_pic_size = $_FILES['cover_pic_update']['name'];

        $profile_pic_type = $_FILES['profile_pic_update']['type']; ///This will show the type of the file.
        $cover_pic_type = $_FILES['cover_pic_update']['type'];

        $profile_pic_tmp_name=$_FILES['profile_pic_update']['tmp_name']; ///This is slightly differant to the ones above. When we upload the file it is sent to a temporary location on you server. It is ready and waiting for us to process it. Even though we have uploaded it we havn't moved it yet.
        $cover_pic_tmp_name = $_FILES['cover_pic_update']['tmp_name'];

        $profile_pic_error = $_FILES['profile_pic_update']['error']; ///This returns an error(1) if there is one or 0 if there is not.
        $cover_pic_error = $_FILES['cover_pic_update']['error'];

        $profile_pic_location = 'images/user_profile/'.$time;
        $cover_pic_location = 'images/user_cover/'.$time;

        if((Files::check_if_image_type_is_allowed($profile_pic_name, $profile_pic_type) && Files::check_if_image($profile_pic_tmp_name) && Files::check_file_size($profile_pic_size, 5000000, 0)) &&
            (Files::check_if_image_type_is_allowed($cover_pic_name, $cover_pic_type) && Files::check_if_image($cover_pic_tmp_name) && Files::check_file_size($cover_pic_size, 5000000, 0))
        ){
            //profile
            Files::upload_file($profile_pic_name, $profile_pic_tmp_name, $profile_pic_location);
            $profile_image = $profile_pic_location.$profile_pic_name;
            Files::upload_file_location_to_database($profile_image, $profile_pic_type, $user_user_id, $updated_at, $db);

            //cover
            Files::upload_file($cover_pic_name, $cover_pic_tmp_name, $cover_pic_location);
            $cover_image = $cover_pic_location.$cover_pic_name;
            Files::upload_file_location_to_database($cover_image, $cover_pic_type, $user_user_id, $updated_at, $db);

            //update user info
            User::update_profile_and_cover_pic($user_user_id, $cover_image, $profile_image, $updated_at, $db);

            //Create status
            $profile_body = 'Check out my new profile picture.';
            $cover_body = 'Check out my new cover picture.';
            Status::insert($user_user_id, '', $user_user_id, $profile_body, '', $profile_image, '', $updated_at,'', '', '', $db);
            Status::insert($user_user_id, '', $user_user_id, $cover_body, '', $cover_image, '', $updated_at,'', '', '', $db);

            header('Location: profile_template_user.php?page_id='.$user_user_id);

        }elseif(Files::check_if_image_type_is_allowed($profile_pic_name, $profile_pic_type) && Files::check_if_image($profile_pic_tmp_name) && Files::check_file_size($profile_pic_size, 5000000, 0)){
            //profile pic
            Files::upload_file($profile_pic_name, $profile_pic_tmp_name, $profile_pic_location);
            $profile_image = $profile_pic_location.$profile_pic_name;
            Files::upload_file_location_to_database($profile_image, $profile_pic_type, $user_update_id, $updated_at, $db);
            User::update_profile_pic($user_user_id, $profile_image, $updated_at, $db);

            //Create status
            $profile_body = 'Check out my new profile picture.';
            Status::insert($user_user_id, '', $user_user_id, $profile_body, '', $profile_image, '', $updated_at,'', '', '', $db);



            header('Location: profile_template_user.php?page_id='.$user_user_id);
        }elseif(Files::check_if_image_type_is_allowed($cover_pic_name, $cover_pic_type) && Files::check_if_image($cover_pic_tmp_name) && Files::check_file_size($cover_pic_size, 5000000, 0)){
            //cover pic
            Files::upload_file($cover_pic_name, $cover_pic_tmp_name, $cover_pic_location);
            $cover_image = $cover_pic_location.$cover_pic_name;
            Files::upload_file_location_to_database($cover_image, $cover_pic_type, $user_user_id, $updated_at, $db);
            User::update_cover_pic($user_user_id, $cover_image, $updated_at, $db);

            //Create status
            $cover_body = 'Check out my new cover picture.';
            Status::insert($user_user_id, '', $user_user_id, $cover_body, '', $cover_image, '', $updated_at,'', '', '', $db);

            header('Location: profile_template_user.php?page_id='.$user_user_id);
        }
    }

}


?>
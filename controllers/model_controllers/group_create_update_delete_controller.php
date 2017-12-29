<?php
    if(isset($_POST['group_create_name']) &&
        isset($_POST['group_create_city_town_village']) && isset($_POST['group_create_state']) && isset($_POST['group_create_country']) &&
        isset($_POST['group_create_user_id']) && isset($_POST['group_create_time']) && isset($_POST['group_create_token'])){

        if(!empty($_POST['group_create_name']) &&
        !empty($_POST['group_create_city_town_village']) && !empty($_POST['group_create_state']) && !empty($_POST['group_create_country']) &&
            !empty($_POST['group_create_user_id']) && !empty($_POST['group_create_time']) && !empty($_POST['group_create_token'])
        ){
            $t = $_POST['group_create_type'];
            $t_more = $_POST['group_create_type_more'];

            if(isset($t) && !empty($t)){
                $type = $t;
            }else{
                $type = $t_more;
            }

            $name = $_POST['group_create_name'];
            $about = '';
            $city_town_village = $_POST['group_create_city_town_village'];
            $state = $_POST['group_create_state'];
            $country = $_POST['group_create_country'];
            $creater = $_POST['group_create_user_id'];
            $created_at = $_POST['group_create_time'];
            $token = $_POST['group_create_token'];

            if(Token::check($token)){
                Groups::create($type, $name, $creater,$about, $city_town_village, $state, $country, $created_at, $db);

                $group = Groups::show_group_by_creater_and_time($creater, $created_at, $db);

                $group_id = $group['id'];

                Groups::group_create_member($group_id, $creater, $created_at, $db);

                $group_info = Groups::show_group_by_id($group_id, $db);

                $status_body = 'Check out my new group I just made!';

                $group_info[0]['id'];

                Status::insert($creater, '', $creater, $status_body, '', '', '', $created_at, '', $group_id, '', $db);

            }
        }
    }
?>
<?php
if(isset($_POST['goal_type']) && !empty($_POST['goal_type']) && isset($_POST['goal_name']) && !empty($_POST['goal_name'])){


    if(!isset($_SESSION['token']) || empty($_SESSION['token'])){

    }
    $type = $_POST['goal_type'];
    $name = $_POST['goal_name'];
    $about = $_POST['goal_about'];
    $user_id = $_POST['goal_user_id'];
    $created_at = $_POST['goal_time'];
    $goal_per_completed = $_POST['goal_per_completed'];

    $goal_completed = Goals::is_goal_completed($goal_per_completed);

    $goal_10 = $_POST['goal_10'];
    $goal_20 = $_POST['goal_20'];
    $goal_30 = $_POST['goal_30'];
    $goal_40 = $_POST['goal_40'];
    $goal_50 = $_POST['goal_50'];
    $goal_60 = $_POST['goal_60'];
    $goal_70 = $_POST['goal_70'];
    $goal_80 = $_POST['goal_80'];
    $goal_90 = $_POST['goal_90'];
    $goal_100 = $_POST['goal_100'];

    if($type == 'More'){
        $type = $_POST['goal_more_type'];
    }

    $token = $_POST['token'];

    if(Token::check($token)){
        Goals::add_goal($type, $name, $about, $user_id, $created_at, $goal_completed, $goal_per_completed, $goal_10, $goal_20, $goal_30, $goal_40, $goal_50, $goal_60, $goal_70, $goal_80, $goal_90, $goal_100, '', '', $db);

        //Create status
        $body = htmlspecialchars($user_info[0][0]->firstname).' created a new goal.';
        $g_id = Goals::get_goal_from_user_id_and_time($user_id, $created_at, $db);
        $goal_id = htmlspecialchars($g_id['id']);
        Status::insert($user_id, '', $user_id, $body, '', '', '', $created_at, $goal_id, '', '', $db);

        if(isset($_POST['main_goal_checkbox']) && !empty($_POST['main_goal_checkbox'])){
            $goal_id = Goals::get_goal_from_user_id_and_time($user_id, $created_at, $db);
            Goals::make_main_goal($user_id, $goal_id[0], $db);
        }
        header('Location: profile_template_user.php?page_id='.$user_id);
        exit();
    }
}

if(isset($_POST['goal_update_type']) && !empty($_POST['goal_update_type']) && isset($_POST['goal_update_name']) && !empty($_POST['goal_update_name'])){

    $id = $_POST['goal_update_id'];
    $type = $_POST['goal_update_type'];
    $name = $_POST['goal_update_name'];
    $about = $_POST['goal_update_about'];
    $updated_at = $_POST['goal_update_time'];
    $goal_per_completed = $_POST['goal_update_per_completed'];

    $goal_completed = Goals::is_goal_completed($goal_per_completed);;

    $goal_10 = $_POST['goal_update_10'];
    $goal_20 = $_POST['goal_update_20'];
    $goal_30 = $_POST['goal_update_30'];
    $goal_40 = $_POST['goal_update_40'];
    $goal_50 = $_POST['goal_update_50'];
    $goal_60 = $_POST['goal_update_60'];
    $goal_70 = $_POST['goal_update_70'];
    $goal_80 = $_POST['goal_update_80'];
    $goal_90 = $_POST['goal_update_90'];
    $goal_100 = $_POST['goal_update_100'];

    $token = $_POST['token'];

    if($type == 'More'){
        $type = $_POST['goal_update_more_type'];
    }

    if(Token::check($token)){
        Goals::update_goal($id, $type, $name, $about, $updated_at, $goal_completed,
            $goal_per_completed, $goal_10, $goal_20, $goal_30, $goal_40, $goal_50,
            $goal_60, $goal_70, $goal_80, $goal_90, $goal_100, $db);

        //Create status
        $body = htmlspecialchars($user_info[0][0]->firstname).' updated a goal.';
        $user_id = $_POST['goal_update_user_id'];
        Status::insert($user_id, '', $user_id, $body, '', '', '', $updated_at, $id, '', '', $db);

        if(isset($_POST['main_goal_checkbox']) && !empty($_POST['main_goal_checkbox'])){
            $goal_id = $_POST['main_goal_checkbox'];


            Goals::make_main_goal($user_id, $goal_id, $db);
        }

        header('Location: profile_template_user.php?page_id='.$user_id);
        exit();
    }

}

if(isset($_POST['goal_delete_id']) && !empty($_POST['goal_delete_id'])){

    $token = $_POST['token'];

    if(Token::check($token)){
        Goals::delete_goal($_POST['goal_delete_id'], $db);
        Status::delete_status_from_goal_id($_POST['goal_delete_id'], $db);
    }

    header('Location: profile_template_user.php?page_id='.$_SESSION['user_id']);
    exit();
}


//Group goals
if(isset($_POST['group_goal_type']) && !empty($_POST['group_goal_type']) && isset($_POST['group_goal_name']) && !empty($_POST['group_goal_name'])){
    $user_id = $_POST['group_goal_user_id'];
    $type = $_POST['group_goal_type'];
    $name = $_POST['group_goal_name'];
    $about = $_POST['group_goal_about'];
    $created_at = $_POST['group_goal_time'];
    $goal_per_completed = $_POST['group_goal_per_completed'];

    $goal_completed = Goals::is_goal_completed($goal_per_completed);

    $goal_10 = $_POST['group_goal_10'];
    $goal_20 = $_POST['group_goal_20'];
    $goal_30 = $_POST['group_goal_30'];
    $goal_40 = $_POST['group_goal_40'];
    $goal_50 = $_POST['group_goal_50'];
    $goal_60 = $_POST['group_goal_60'];
    $goal_70 = $_POST['group_goal_70'];
    $goal_80 = $_POST['group_goal_80'];
    $goal_90 = $_POST['group_goal_90'];
    $goal_100 = $_POST['group_goal_100'];
    $group_id = $_POST['group_goal_group_id'];

    if($type == 'More'){
        $type = $_POST['group_goal_more_type'];
    }

    $token = $_POST['token'];

    if(Token::check($token)){
        Goals::add_goal($type, $name, $about, '', $created_at, $goal_completed, $goal_per_completed, $goal_10, $goal_20, $goal_30, $goal_40, $goal_50, $goal_60, $goal_70, $goal_80, $goal_90, $goal_100, $group_id, '', $db);

        //Create status
        $body = 'Check out the groups new goal!';
        $g_id = Goals::get_goal_from_group_id_and_time($group_id, $created_at, $db);
        $goal_id = htmlspecialchars($g_id['id']);
        Status::insert($user_id, '', '', $body, '', '', '', $created_at, $goal_id, '', $group_id, $db);

        header('Location: profile_template_group.php?group_id='.$group_id);
        exit();
    }
}

if(isset($_POST['group_goal_update_type']) && !empty($_POST['group_goal_update_type']) && isset($_POST['group_goal_update_name']) && !empty($_POST['group_goal_update_name'])){

        $user_id = $_POST['group_goal_update_user_id'];
        $id = $_POST['group_goal_update_id'];
        $type = $_POST['group_goal_update_type'];
        $name = $_POST['group_goal_update_name'];
        $about = $_POST['group_goal_update_about'];
        $updated_at = $_POST['group_goal_update_time'];
        $goal_per_completed = $_POST['group_goal_update_per_completed'];

        $goal_completed = Goals::is_goal_completed($goal_per_completed);;

        $goal_10 = $_POST['group_goal_update_10'];
        $goal_20 = $_POST['group_goal_update_20'];
        $goal_30 = $_POST['group_goal_update_30'];
        $goal_40 = $_POST['group_goal_update_40'];
        $goal_50 = $_POST['group_goal_update_50'];
        $goal_60 = $_POST['group_goal_update_60'];
        $goal_70 = $_POST['group_goal_update_70'];
        $goal_80 = $_POST['group_goal_update_80'];
        $goal_90 = $_POST['group_goal_update_90'];
        $goal_100 = $_POST['group_goal_update_100'];
        $group_id = $_POST['goal_update_group_id'];

        if($type == 'More'){
            $type = $_POST['group_goal_update_more_type'];
        }

        $token = $_POST['token'];

        if(Token::check($token)){
            Goals::group_update_goal($id, $type, $name, $about, $updated_at, $goal_completed,
                $goal_per_completed, $goal_10, $goal_20, $goal_30, $goal_40, $goal_50,
                $goal_60, $goal_70, $goal_80, $goal_90, $goal_100, $db);

            //Create status
            $body = 'Check it out! We just updated our groups goal.';
            Status::insert($user_id, '', '', $body, '', '', '', $updated_at, $id, '', $group_id, $db);
            header('Location: profile_template_group.php?group_id='.$group_id);
            exit();
        }
    }


if(isset($_POST['group_goal_delete_id']) && !empty($_POST['group_goal_delete_id'])){

    $token = $_POST['token'];
    $group_id = $_POST['goal_delete_group_id'];

    if(Token::check($token)){
        Goals::group_delete_goal($_POST['group_goal_delete_id'], $db);
        Status::delete_status_from_goal_id($_POST['group_goal_delete_id'], $db);
        header('Location: profile_template_group.php?group_id='.$group_id);
        exit();
    }
}


if(isset($_POST['group_main_goal_checkbox']) && !empty($_POST['group_main_goal_checkbox'])){
    $user_id = $_POST['group_goal_update_user_id'];
    $goal_id = $_POST['group_main_goal_checkbox'];
    $group_id = $_POST['goal_update_group_id'];
    $updated_at = $_POST['group_goal_update_time'];

    $token = $_POST['token'];

    if(Token::check($token)){

    }
}


?>



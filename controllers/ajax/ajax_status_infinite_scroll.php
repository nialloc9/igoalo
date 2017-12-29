<?php
if(isset($_POST['task']) && $_POST['task'] == 'status'){
    require_once '../external/core.inc.php';
    require_once 'ajax_resources/ajax_auth.php';
    require_once '../controllers/controller_mods/user.php';
    require_once '../ajax/ajax_resources/ajax_user.php';
    require_once '../controllers/controller_mods/status.php';
    require_once '../controllers/controller_mods/like.php';
    require_once '../controllers/controller_mods/token.php';

    $load = $_POST['load'];
    $start = $load * 10;
    $auth_id = $_POST['auth_id'];
    $user_page = $_POST['user_page'];
    $user_user_id = $_POST['user_page'];

    $token = $_POST['token'];

    if(Token::ajax_check($token)){
        $auth_info = User::getFullUserInfo($auth_id, $db);
        $auth = htmlspecialchars($auth_info[0][0]);

        $user_id = $auth_id;
        $username = htmlspecialchars($auth->username);
        $firstname = htmlspecialchars($auth->firstname);
        $lastname = htmlspecialchars($auth->surname);
        $profile_image_upload_location = htmlspecialchars($auth->profile_image_upload_location);



        $statuses = Status::paginate($start, 10, $user_page, $db);
        if(isset($statuses) && !empty($statuses)){
            foreach($statuses as $key => $user_status){
                foreach($user_status as $key2 => $status){
                    $status = $status;
                    $status_edit = $status;
                    if($status->parent_id < 1) {
                        $user_info = AjaxGetFullUserInfo(htmlspecialchars($status->user_id), $db);
                        $likes = Like::like_counter($status->id, $db);
                        foreach ($user_info as $user_key => $users) {
                            foreach ($users as $user_key2 => $user) {
                                $user = $user;
                            }
                        }
                        if (!isset($user->profile_image_upload_location) || empty($user->profile_image_upload_location)) {
                            $user_profile_status_image = 'images/no_profile_picture.jpg';
                        } else {
                            $user_profile_status_image = htmlspecialchars($user->profile_image_upload_location);
                        }
                        require '../ajax/ajax_resources/infinite_scroll_statusblock.php';
                    }
                }
            }
        }
    }
}

if(isset($_POST['task']) && $_POST['task'] == 'group_status'){
    require_once '../external/core.inc.php';
    require_once 'ajax_resources/ajax_auth.php';
    require_once '../controllers/controller_mods/user.php';
    require_once '../ajax/ajax_resources/ajax_user.php';
    require_once '../controllers/controller_mods/status.php';
    require_once '../controllers/controller_mods/like.php';
    require_once '../controllers/controller_mods/token.php';

    $load = $_POST['load'];
    $start = $load * 10;
    $auth_id = $_POST['auth_id'];
    $group_id = $_POST['group_id'];

    $token = $_POST['token'];

    if(Token::ajax_check($token)){
        $auth_info = User::getFullUserInfo($auth_id, $db);
        $auth = htmlspecialchars($auth_info[0][0]);

        $user_id = $auth_id;
        $username = htmlspecialchars($auth->username);
        $firstname = htmlspecialchars($auth->firstname);
        $lastname = htmlspecialchars($auth->surname);
        $profile_image_upload_location = htmlspecialchars($auth->profile_image_upload_location);


        $statuses = Status::group_page_paginate($start, 10, $group_id, $db);
        if(isset($statuses) && !empty($statuses)){
            foreach($statuses as $key => $user_status){
                foreach($user_status as $key2 => $status){
                    $status = $status;
                    $status_edit = $status;
                    if($status->parent_id < 1) {
                        $user_info = AjaxGetFullUserInfo(htmlspecialchars($status->user_id), $db);
                        $likes = Like::like_counter(htmlspecialchars($status->id), $db);
                        if(isset($user_info) && !empty($user_info)){
                            foreach ($user_info as $user_key => $users) {
                                foreach ($users as $user_key2 => $user) {
                                    $user = $user;
                                }
                            }
                        }
                        if (!isset($user->profile_image_upload_location) || empty($user->profile_image_upload_location)) {
                            $user_profile_status_image = 'images/no_profile_picture.jpg';
                        } else {
                            $user_profile_status_image = htmlspecialchars($user->profile_image_upload_location);
                        }
                        require '../ajax/ajax_resources/infinite_scroll_statusblock.php';
                    }
                }
            }
        }
    }
}


if(isset($_POST['task']) && $_POST['task'] == 'timeline_status'){
    require_once '../external/core.inc.php';
    require_once 'ajax_resources/ajax_auth.php';
    require_once '../controllers/controller_mods/user.php';
    require_once '../controllers/controller_mods/groups.php';
    require_once '../controllers/controller_mods/goal.php';
    require_once '../ajax/ajax_resources/ajax_user.php';
    require_once '../controllers/controller_mods/status.php';
    require_once '../controllers/controller_mods/like.php';

    $load = $_POST['load'];
    $start = $load * 10;
    $auth_id = $_POST['auth_id'];
    $user_id = $auth_id;


    $friends_array = User::showFriends($user_id, $db);
    $group_array = Groups::show_groups_user_is_a_member_of($user_id, $db);


    $n = sizeof($friends_array);
    $ng = sizeof($group_array);

    $friends = [];
    $groups = [];

    for($i=0; $i< $n; $i++){
        if($friends_array[$i]['friend_id'] == $user_id){
            $friend = htmlspecialchars($friends_array[$i]['user_id']);
        }else{
            $friend = htmlspecialchars($friends_array[$i]['friend_id']);
        }

        array_push($friends, $friend);
    }


    for($i=0; $i< $ng; $i++){
        array_push($groups, htmlspecialchars($group_array[$i]['group_id']));
    }

    $status_timeline = Status::t_status($friends, $groups, $user_id, $start, 10, $db);

    foreach($status_timeline as $s => $status){
        $status_edit = $status;
        //echo 'User: '.$status['user_id'].' Group '.$status['group_status'].' ';
        if($status['parent_id'] < 1){
            $user_info = User::getFullUserInfo(htmlspecialchars($status['user_id']), $db);
            $likes = Like::like_counter(htmlspecialchars($status['id']), $db);
            foreach($user_info as $user_key => $users){
                foreach($users as $user_key2 => $user){
                    $user = $user;
                }
            }

            if(!isset($user->profile_image_upload_location) || empty($user->profile_image_upload_location)){
                $user_profile_status_image = 'images/no_profile_picture.jpg';
            }else{
                $user_profile_status_image = htmlspecialchars($user->profile_image_upload_location);
            }

            if(isset($status['group_status'])){
                $group_i = Groups::show_group_by_id(htmlspecialchars($status['group_status']), $db); $status['group_status'];
                $group = $group_i[0];
            }

            if(isset($status['group_id'])){
                $group_status_info = Groups::show_group_by_id(htmlspecialchars($status['group_id']), $db);
                $group_info = $group_status_info[0];
            }

            require 'ajax_resources/infinite_scroll_timeline_statusblock.php';
        }
    }
}





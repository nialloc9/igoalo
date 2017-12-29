<?php
if(isset($_POST['task']) && $_POST['task'] =='status_insert'){

    $user_id = $_POST['user_id'];
    $status =  str_replace("\n", "<br>", $_POST['status']);
    $video = $_POST['video'];
    $image = $_POST['image'];
    $attachment = $_POST['attachment'];
    $parent_id = $_POST['parent_id'];
    $page_id = $_POST['page_id'];
    $created_at = $_POST['created_at'];

    $token = $_POST['token'];
    require_once '../external/connect.inc.php';
    require_once '../ajax/ajax_resources/ajax_user.php';
    require_once '../controllers/controller_mods/status.php';
    require_once '../controllers/controller_mods/token.php';
    require_once '../controllers/controller_mods/notifications.php';

    if(Token::ajax_check($token)){
        if(class_exists('Status')) {

            Status::insert($user_id, $parent_id, $page_id, $status, $attachment, $image, $video, $created_at, '', '', '', $db);

            $status_info = Status::ajax_get_status($user_id, $created_at, $db);
            $user_info = AjaxGetFullUserInfo($user_id, $db);

            if(!isset($user_info[0][0]->profile_image_upload_location) || empty($user_info[0][0]->profile_image_upload_location)){
                $user_profile_status_image = 'images/no_profile_picture.jpg';
            }else{
                $user_profile_status_image = htmlspecialchars($user_info[0][0]->profile_image_upload_location);
            }

            $std = new stdClass();
            $std->user_id = htmlspecialchars($user_id);
            $std->status = strip_tags($status, '<br>');
            $std->video = htmlspecialchars($video);
            $std->image = htmlspecialchars($image);
            $std->attachment = htmlspecialchars($attachment);
            $std->parent_id = htmlspecialchars($parent_id);
            $std->page_id = htmlspecialchars($page_id);
            $std->created_at = htmlspecialchars($created_at);
            $std->username = htmlspecialchars($user_info[0][0]->username);
            $std->profile_image = htmlspecialchars($user_profile_status_image);
            $std->status_id = htmlspecialchars($status_info[0][0]->id);

            echo json_encode($std);

            if(isset($status_info[0][0]->parent_id) && !empty($status_info[0][0]->parent_id)){
                $status_replied_to = Status::get_status_info($status_info[0][0]->parent_id, $db);
                $sr = $status_replied_to[0][0];
                $sr_id = $sr->id;
            }else{
                $sr_id = '';
            }

            if($user_id != $page_id && $sr_id == ''){
                if(class_exists('notifications')){
                    notifications::create(3, $page_id, $user_id, '', $status_info[0][0]->id, '', $created_at, '', $db);
                }
            }elseif(isset($sr_id) && !empty($sr_id)){
                if(class_exists('notifications')){
                    notifications::create(7, $sr->user_id, $user_id, '', $sr_id, '', $created_at, '', $db);
                }
            }
        }
    }


    }

if(isset($_POST['task']) && $_POST['task'] == 'group_status_insert'){
    $user_id = $_POST['user_id'];
    $status =  str_replace("\n", "<br>", $_POST['status']);
    $video = $_POST['video'];
    $image = $_POST['image'];
    $attachment = $_POST['attachment'];
    $parent_id = $_POST['parent_id'];
    $group_id = $_POST['group_id'];
    $created_at = $_POST['created_at'];
    $token = $_POST['token'];

    require_once '../external/connect.inc.php';
    require_once '../ajax/ajax_resources/ajax_user.php';
    require_once '../controllers/controller_mods/status.php';
    require_once '../controllers/controller_mods/token.php';
    require_once '../controllers/controller_mods/notifications.php';


    if(Token::ajax_check($token)){
        if(class_exists('Status')) {

            Status::insert($user_id, $parent_id, '', $status, $attachment, $image, $video, $created_at, '', '', $group_id, $db);

            $status_info = Status::ajax_get_status($user_id, $created_at, $db);
            $user_info = AjaxGetFullUserInfo($user_id, $db);

            if(!isset($user_info[0][0]->profile_image_upload_location) || empty($user_info[0][0]->profile_image_upload_location)){
                $user_profile_status_image = 'images/no_profile_picture.jpg';
            }else{
                $user_profile_status_image = $user_info[0][0]->profile_image_upload_location;
            }

            $std = new stdClass();
            $std->user_id = $user_id;
            $std->status = $status;
            $std->video = $video;
            $std->image = $image;
            $std->attachment = $attachment;
            $std->parent_id = $parent_id;
            $std->group_id = $group_id;
            $std->created_at = $created_at;
            $std->username = $user_info[0][0]->username;
            $std->profile_image = $user_profile_status_image;
            $std->status_id = $status_info[0][0]->id;

            echo json_encode($std);

            if(class_exists('notifications')){
                notifications::create(4, '', $user_id, $group_id, $status_info[0][0]->id, '', $created_at, '', $db);
            }



        }
    }
}
?>
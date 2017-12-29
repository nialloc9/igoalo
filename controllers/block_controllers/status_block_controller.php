<?php
            $statuses = Status::paginate(0, 10, $user_page, $db);
            foreach($statuses as $key => $user_status){
                foreach($user_status as $key2 => $status){
                    $status = $status;
                    $status_edit = $status;
                    if($status->parent_id < 1){
                        $user_info = User::getFullUserInfo(htmlspecialchars($status->user_id), $db);

                        $likes = Like::like_counter(htmlspecialchars($status->id), $db);
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
                        require 'external/block/statusblock.php';

                    }
                }
            }
?>





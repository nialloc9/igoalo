<?php
    if($notification['notification_type'] == 1){ //Friend request
        $type = 1;
        //User info
        $user_info = User::getFullUserInfo(htmlspecialchars($notification['requesting_id']), $db);
        $user = $user_info[0][0];
    }elseif($notification['notification_type'] == 2){ //User wants to join group
        $type = 2;
        //User info
        $user_info = User::getFullUserInfo(htmlspecialchars($notification['requesting_id']), $db);
        $user = $user_info[0][0];
        //Group info
        $group_info = Groups::show_group_by_id(htmlspecialchars($notification['group_id']), $db);
        $group = $group_info[0];
    }elseif($notification['notification_type'] == 3){ //User posted on another user page (future use)
        $type = 3;
        //User posting to user page info
        $user_posting_info = User::getFullUserInfo(htmlspecialchars($notification['requesting_id']), $db);
        $user = $user_posting_info[0][0];
    }elseif($notification['notification_type'] == 4){ //User posted in user page
        $type = 4;
        //User info
        $user_posting_info = User::getFullUserInfo(htmlspecialchars($notification['requesting_id']), $db);
        $user = $user_posting_info[0][0];
        //Group info
        $group_info = Groups::show_group_by_id(htmlspecialchars($notification['group_id']), $db);
        $group = $group_info[0];
    }elseif($notification['notification_type'] == 5){ //Friend request acceoted
        $type = 5;
        //User info
        $user_info = User::getFullUserInfo(htmlspecialchars($notification['requesting_id']), $db);
        $user = $user_info[0][0];
    }elseif($notification['notification_type'] == 6){ //Group request accepted
        $type = 6;
        //User info
        $user_posting_info = User::getFullUserInfo(htmlspecialchars($notification['requesting_id']), $db);
        $user_posting = $user_posting_info[0][0];
        //Group info
        $group_info = Groups::show_group_by_id(htmlspecialchars($notification['group_id']), $db);
        $group = $group_info[0];
    }elseif($notification['notification_type'] == 7){ //User replied to post
        $type = 7;
        //Replying user info
        $user_posting_info = User::getFullUserInfo(htmlspecialchars($notification['requesting_id']), $db);
        $user = $user_posting_info[0][0];

        //status info
        $status_info = Status::get_status_info($notification['status_id'], $db);
        $status = $status_info[0][0];

        if(isset($status->page_id) && !empty($status->page_id)){
            $status_location = 'profile_template_user.php?page_id='.$status->page_id;
        }elseif(isset($status->group_id) && !empty($status->group_id)){
            $status_location = 'profile_template_group.php?group_id='.$status->group_id;
        }
    }elseif($notification['notification_type'] == 8){ //User likeed post
        $type = 8;
        //liking user info
        $user_liking_info = User::getFullUserInfo(htmlspecialchars($notification['requesting_id']), $db);
        $user = $user_liking_info[0][0];

        //status info
        $status_info = Status::get_status_info($notification['status_id'], $db);
        $status = $status_info[0][0];

        if(isset($status->page_id) && !empty($status->page_id)){
            $status_location = 'profile_template_user.php?page_id='.$status->page_id;
        }elseif(isset($status->group_id) && !empty($status->group_id)){
            $status_location = 'profile_template_group.php?group_id='.$status->group_id;
        }
    }
?>
<div class="media block col-sm-6 _not" id="<?php echo htmlspecialchars($notification['id']); ?>">
    <div class="notblock_wrapper">
        <div class="notblock">
            <div class="notblock_body">
                <div class="not_wrapper">
                    <?php if($type == 1): ?>
                        <!-- Friend Request -->
                        <a class="userblock-image-holder pull-left" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
                            <img class="media-object img-thumbnail userblock-image" alt="<?php echo htmlspecialchars($user->username); ?>" src="<?php echo User::getUserProfileImage(htmlspecialchars($user->profile_image_upload_location)); ?>">
                        </a>

                        <p class="message">
                            <a class="userblock-image-holder" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
                                <?php echo User::getNameOrUsername(htmlspecialchars($user->username), htmlspecialchars($user->firstname), htmlspecialchars($user->surname)); ?>
                            </a>
                            wants to be your friend.
                            <a href="#" id="accept_friend_icon_<?php echo htmlspecialchars($notification['id']); ?>"><i class="fa fa-check accept" aria-hidden="true"></i></a>
                            <a href="#" id="reject_friend_icon_<?php echo htmlspecialchars($notification['id']); ?>"><i class="fa fa-times decline" aria-hidden="true"></i></a>
                        </p>
                    <?php elseif($type==2): ?>
                        <!-- Group join Request -->
                        <a class="userblock-image-holder pull-left" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
                            <img class="media-object img-thumbnail userblock-image" alt="<?php echo htmlspecialchars($user->username); ?>" src="<?php echo User::getUserProfileImage(htmlspecialchars($user->profile_image_upload_location)); ?>">
                        </a>

                        <p class="message">
                            <a class="userblock-image-holder" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
                                <?php echo User::getNameOrUsername(htmlspecialchars($user->username), htmlspecialchars($user->firstname), htmlspecialchars($user->surname)); ?>
                            </a>
                            wants to join
                            <a href="<?php echo 'profile_template_group.php?group_id='.htmlspecialchars($group['id']); ?>"><?php echo htmlspecialchars($group['group_name']); ?></a>.
                            <a href="#" id="accept_member_icon_<?php echo htmlspecialchars($notification['id']); ?>"><i class="fa fa-check accept" aria-hidden="true"></i></a>
                            <a href="#" id="reject_member_icon_<?php echo htmlspecialchars($notification['id']); ?>"><i class="fa fa-times decline" aria-hidden="true"></i></a>
                        </p>
                    <?php elseif($type==3): ?>
                        <!-- User posted on page -->
                        <p class="pull-right"><a href="#" id="post_hide_<?php echo htmlspecialchars($notification['id']); ?>">x</a></p>
                        <a class="userblock-image-holder pull-left" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
                            <img class="media-object img-thumbnail userblock-image" alt="<?php echo htmlspecialchars($user->username); ?>" src="<?php echo User::getUserProfileImage(htmlspecialchars($user->profile_image_upload_location)); ?>">
                        </a>

                        <p class="message">
                            <a class="userblock-image-holder" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
                                <?php echo User::getNameOrUsername(htmlspecialchars($user->username), htmlspecialchars($user->firstname), htmlspecialchars($user->surname)); ?>
                            </a>
                            posted on <a href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($notification['user_id']); ?>">your page</a>.
                        </p>
                    <?php elseif($type==4): ?>
                        <!-- User posted on group page -->
                        <p class="pull-right"><a href="#" id="post_hide_<?php echo htmlspecialchars($notification['id']); ?>">x</a></p>
                        <a class="userblock-image-holder pull-left" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
                            <img class="media-object img-thumbnail userblock-image" alt="<?php echo htmlspecialchars($user->username); ?>" src="<?php echo User::getUserProfileImage(htmlspecialchars($user->profile_image_upload_location)); ?>">
                        </a>

                        <p class="message">
                            <a class="userblock-image-holder" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
                                <?php echo User::getNameOrUsername($user->username, $user->firstname, $user->surname); ?>
                            </a>
                            posted in
                            <a class="group_redirect"  href="<?php echo 'profile_template_group.php?group_id='.htmlspecialchars($group['id']); ?>"><?php echo htmlspecialchars($group['group_name']); ?></a>.
                        </p>
                    <?php elseif($type==5): ?>
                        <!-- Friend Request Accepted -->
                        <p class="pull-right"><a href="#" id="post_hide_<?php echo htmlspecialchars($notification['id']); ?>">x</a></p>
                        <a class="userblock-image-holder pull-left" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
                            <img class="media-object img-thumbnail userblock-image" alt="<?php echo htmlspecialchars($user->username); ?>" src="<?php echo User::getUserProfileImage(htmlspecialchars($user->profile_image_upload_location)); ?>">
                        </a>

                        <p class="message">
                            <a class="userblock-image-holder" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
                                <?php echo User::getNameOrUsername(htmlspecialchars($user->username), htmlspecialchars($user->firstname), htmlspecialchars($user->surname)); ?>
                            </a>
                            is now your friend.
                        </p>
                    <?php elseif($type==6): ?>
                        <!-- Group Request Accepted -->
                        <p class="pull-right"><a href="#" id="post_hide_<?php echo htmlspecialchars($notification['id']); ?>">x</a></p>
                        <a class="userblock-image-holder pull-left"  href="<?php echo 'profile_template_group.php?group_id='.htmlspecialchars($group['id']); ?>">
                            <img class="media-object img-thumbnail userblock-image" alt="<?php echo htmlspecialchars($group['group_name']); ?>" src="<?php echo Groups::get_group_profile_pic(htmlspecialchars($group['profile_pic'])); ?>">
                        </a>

                        <p class="message">
                            <?php if(User::authIsUser($user_id, htmlspecialchars($notification['user_id']))){echo 'You are now a member of:';}else{echo htmlspecialchars($group['group_name']).' has a new member.';} ?>

                            <a href="<?php echo 'profile_template_group.php?group_id='.htmlspecialchars($group['id']); ?>"><?php echo htmlspecialchars($group['group_name']); ?></a>.
                        </p>
                    <?php elseif($type==7): ?>
                        <!-- User replied to status -->
                        <p class="pull-right"><a href="#" id="post_hide_<?php echo htmlspecialchars($notification['id']); ?>">x</a></p>
                        <a class="userblock-image-holder pull-left" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
                            <img class="media-object img-thumbnail userblock-image" alt="<?php echo htmlspecialchars($user->username); ?>" src="<?php echo User::getUserProfileImage(htmlspecialchars($user->profile_image_upload_location)); ?>">
                        </a>

                        <p class="message">
                            <a class="userblock-image-holder" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
                                <?php echo User::getNameOrUsername(htmlspecialchars($user->username), htmlspecialchars($user->firstname), htmlspecialchars($user->surname)); ?>
                            </a>
                            replied your <a href="<?php echo $status_location; ?>">post</a>.
                        </p>

                    <?php elseif($type==8): ?>
                        <!-- User liked your status -->
                        <p class="pull-right"><a href="#" id="post_hide_<?php echo htmlspecialchars($notification['id']); ?>">x</a></p>
                        <a class="userblock-image-holder pull-left" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
                            <img class="media-object img-thumbnail userblock-image" alt="<?php echo htmlspecialchars($user->username); ?>" src="<?php echo User::getUserProfileImage(htmlspecialchars($user->profile_image_upload_location)); ?>">
                        </a>

                        <p class="message">
                            <a class="userblock-image-holder" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
                                <?php echo User::getNameOrUsername(htmlspecialchars($user->username), htmlspecialchars($user->firstname), htmlspecialchars($user->surname)); ?>
                            </a>
                            liked your <a href="<?php echo $status_location; ?>">post</a>.
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="notblock_time">
                <a href="#"><?php echo htmlspecialchars($notification['created_at']); ?></a>
            </div>
            <!-- JavaScript calls an ajax query using these values when the buttons above a clicked. -->
            <div class="hidden">
                <input type="text" id="group_id_<?php echo htmlspecialchars($notification['id']); ?>" value="<?php echo htmlspecialchars($group['id']); ?>"/>
                <input type="text" id="auth_id_<?php echo htmlspecialchars($notification['id']); ?>" value="<?php echo $user_id; ?>"/>
                <input type="text" id="mf_id_<?php echo htmlspecialchars($notification['id']); ?>" value="<?php echo htmlspecialchars($user->id); ?>">
                <input type="text" id="not_time_<?php echo htmlspecialchars($notification['id']); ?>" class="timestamp">
                <input type="text" id="notification_delete_<?php echo htmlspecialchars($notification['id']); ?>" value="<?php echo htmlspecialchars($notification['id']); ?>">
            </div>
        </div>
    </div>
</div>

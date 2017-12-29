<!-- If user clicks edit this status will appear and the status at the bottom will disappear -->
<?php if(isset($status->group_id) && ($status->group_id != '')) {
    $group_status_info = Groups::show_group_by_id($status->group_id, $db);
    $group_info = $group_status_info[0];
}

?>
<div id="status_edit_show_<?php echo htmlspecialchars($status_edit->id); ?>" class="media col-sm-9 status-container hidden">
    <div class="status-image-wrapper">
        <a class="pull-left" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
            <img class="media-object img-rounded status-image" alt="<?php echo htmlspecialchars($user->username); ?>" src="<?php echo $user_profile_status_image; ?>">
        </a>
    </div>
    <div class="media-body edit_status_text_box">
        <form action="" method="post">
        <h4 class="media-heading"><a href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>"><?php echo htmlspecialchars($user->username); ?></a></h4>
            <p id="status_body"><textarea name="status_body_edit" class="form-control" rows="5"><?php echo strip_tags($status->body, '<br>'); ?></textarea></p>
        <ul class="list-inline">
                <input type="hidden" id="status_type<?php echo htmlspecialchars($status_edit->id); ?>" name="status_type_edit" value="<?php echo Status::type(htmlspecialchars($status->body), htmlspecialchars($status->image), htmlspecialchars($status->video), htmlspecialchars($status->attachment)); ?>"/>
                <input type="hidden" name="status_id_edit" value="<?php echo htmlspecialchars($status_edit->id); ?>"/>
                <input type="hidden" name="status_edit_token" value="<?php echo $csrf_token; ?>"/>
                <input type="hidden" name="status_image_edit" value="<?php echo htmlspecialchars($status_edit->image); ?>"/>

                <li class="status_edit_cancel btn"><input id="cancel<?php echo htmlspecialchars($status->id); ?>" type="button" value="Cancel" class="btn btn-default"/></li>
                <li class="status_edit_cancel btn"><input type="submit" value="Update" class="btn btn-primary"/></li>
        </ul>
        </form>
    </div>
</div>


<!-- Status that is shown on the page. -->
<div id="hide_<?php echo $status->id; ?>" class="media col-sm-9 status-container">
    <div class="status-image-wrapper">
        <a class="pull-left" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
            <img class="media-object img-rounded status-image" alt="<?php echo $user->username; ?>" src="<?php echo $user_profile_status_image; ?>">
        </a>
    </div>

    <div class="media-body status_body">
            <h4 class="media-heading"><a href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>"><?php echo htmlspecialchars($user->username); ?></a>
            </h4>
        <p id="status_body"><a href="<?php echo 'profile_template_group.php?group_id='.htmlspecialchars($group_info['id']); ?>"><?php if(isset($status->group_status) && $status->group_status != ''){echo $group_info['group_name'];} ?></a> <?php echo strip_tags($status->body, '<br>'); ?></p>
            <?php if(isset($status->image) && !empty($status->image)): ?>
                <p id="status_body"><a><img class="status_post_image" src="<?php echo htmlspecialchars($status->image); ?>"</a></p>
            <?php elseif(isset($status->video) && !empty($status->video)): ?>
                <p id="status_body">
                    <video controls>
                        <source src="<?php echo htmlspecialchars($status->video); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </p>
            <?php elseif(isset($status->attachment) && !empty($status->attachment)): ?>
                <p id="status_body"><!-- Attachment goes here --></p>
            <?php elseif(isset($status->goal_id) && !empty($status->goal_id)): ?>
                <?php $s_goal = Goals::get_goal(htmlspecialchars($status->goal_id), $db); $status_goal = $s_goal[0][0]; ?>
                <?php if(isset($status_goal) && !empty($status_goal)): ?>
                        <?php require 'status_goal.php'; ?>
                    <?php endif; ?>
                <?php elseif(isset($status->group_id) && !empty($status->group_id)): ?>
                    <?php require 'status_group.php'; ?>
            <?php endif; ?>
        <ul class="list-inline">
            <li id="status_time" class="btn"><p class="time"><?php echo htmlspecialchars($status->created_at); ?></p></li><br> <!-- The diffForHumans() function will change the time to like 1 hour ago etc. -->
            <?php if(!User::authIsUser($user_id, $status->user_id)): ?>
                <?php if(Like::user_has_liked($user_id, $status->id, $db)): ?>
                    <li id="unlike_button_<?php echo htmlspecialchars($status->id); ?>" class="btn unlike_button"><a>Unlike</a></li>
                <?php else: ?>
                    <li id="like_button_<?php echo htmlspecialchars($status->id); ?>" class="btn like_button"><a>Like</a></li>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(Status::user(htmlspecialchars($status->user_id), $user_id)): ?>
                <li  class="status_edit btn" id="status_edit<?php echo htmlspecialchars($status->id); ?>"><a>Edit</a></li>
                <li class="status_delete btn" id="<?php echo htmlspecialchars($status->id); ?>"><a>Delete</a></li>
            <?php elseif(User::authIsUser($user_id, $page_id)): ?>
                <li class="status_delete btn" id="<?php echo htmlspecialchars($status->id); ?>"><a>Delete</a></li>
            <?php endif ?>

            <li><p class="like_counter" id="like_counter<?php echo htmlspecialchars($status->id); ?>"><?php echo $likes; ?></p><p class="likes like_likes" id="like_likes<?php echo htmlspecialchars($status->id); ?>"><?php if($likes == 1){echo ' like';}else{echo ' likes';} ?></p></li>

            <input type="hidden" id="status_type<?php echo htmlspecialchars($status->id); ?>" value="<?php echo Status::type(strip_tags($status->body, '<br>'), htmlspecialchars($status->image), htmlspecialchars($status->video), htmlspecialchars($status->attachment)); ?>"/>
            <input type="hidden" id="likes_input<?php echo htmlspecialchars($status->id); ?>" value="<?php echo $likes; ?>"/>
            <input type="hidden" id="like_user_id" value="<?php echo $user_id; ?>"/>
        </ul>

        <?php

        //Reply to comment
        $status_id = $status->id;
        require 'ajax/ajax_resources/ajax_reply_postblock.php';
        //Add replies
        require 'ajax/ajax_resources/ajax_reply_block_controller.php';
        ?>
        <div id="reply_area<?php echo $status_id; ?>"></div>
        <?php if($count > 5): ?>
            <p id="more_<?php echo $status_id; ?>" class="reply_more time">More</p>
            <input type="hidden" id="reply_count" value="<?php echo $count; ?>"/>
            <input type="hidden" id="current_reply_count" value="5"/>
        <?php endif; ?>
    </div>
</div>
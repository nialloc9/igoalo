<div id="status_edit_show_<?php echo htmlspecialchars($status->id); ?>" class="media col-sm-9 status-container hidden reply_status">
    <div class="status-image-wrapper" id="reply_profile<?php echo htmlspecialchars($status->id); ?>">
        <a class="pull-left" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
            <img class="media-object img-rounded replyblock_image" alt="<?php echo htmlspecialchars($user->username); ?>" src="<?php echo htmlspecialchars($user->profile_image_upload_location); ?>">
        </a>
    </div>

    <a class="pull-left" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">

    </a><br><br>
    <div class="media-body">
        <form action="<?php if($current_file == '/projects/goal/goal/ajax/ajax_resources/ajax_more_replies_controller.php'){echo 'home.php';}else{echo $current_file;} ?>" method="post">
            <h4 class="media-heading"><a href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>"><?php echo htmlspecialchars($user->username); ?></a></h4>
            <p id="status_body"><textarea name="status_body_edit" class="form-control" rows="5"><?php echo strip_tags($status->body, '<br>'); ?></textarea></p>
            <?php if(isset($status->image) && !empty($status->image)): ?>
                <p id="status_body"><input type="file" name="status_image_edit" value="<?php echo htmlspecialchars($status->image); ?>"><br><a>Remove</a></p>
            <?php elseif(isset($status->video) && !empty($status->video)): ?>
                <p id="status_body"><input type="file" name="status_video_edit" value="<?php echo htmlspecialchars($status->video); ?>"><br><a>Remove</a></p>
            <?php elseif(isset($status->attachment) && !empty($status->attachment)): ?>
                <p id="status_body"><input type="file" name="status_attachment_edit" value="<?php echo htmlspecialchars($status->attachment); ?>"><br><a>Remove</a></p>
            <?php endif; ?>
            <ul class="list-inline">
                <input type="hidden" id="status_type<?php echo $status->id; ?>" name="status_type_edit" value="<?php echo Status::type($status->body, $status->image, $status->video, $status->attachment) ?>"/>
                <input type="hidden" name="status_id_edit" value="<?php echo htmlspecialchars($status->id); ?>"/>
                <input type="hidden" name="status_edit_token" value="<?php echo $csrf_token; ?>"/>

                <li class="status_edit_cancel btn"><input id="cancel<?php echo htmlspecialchars($status->id); ?>" type="button" value="Cancel" class="btn btn-default"/></li>
                <li class="status_edit_cancel btn"><input type="submit" value="Update" class="btn btn-primary"/></li>
            </ul>
        </form>
    </div>
</div>

<div id="hide_<?php echo $status->id; ?>" class="media replyblock_container">
    <div class="replyblock_image_wrapper" id="reply_profile<?php echo htmlspecialchars($status->id); ?>">
        <a class="pull-left" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($status->user_id); ?>">
            <img class="media-object img-rounded replyblock_image" alt="<?php echo htmlspecialchars($user->username); ?>" src="<?php echo htmlspecialchars($user->profile_image_upload_location); ?>">
        </a>
    </div>


    <div class="media-body">
        <h4 class="media-heading"><a href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($status->user_id); ?>"><?php echo htmlspecialchars($user->username); ?></a></h4>
        <p id="status_body"><?php echo strip_tags($status->body, '<br>'); ?></p>
        <ul class="list-inline">
            <li id="status_time" class="btn"><p class="time"><?php echo htmlspecialchars($status->created_at); ?></p></li><br> <!-- The diffForHumans() function will change the time to like 1 hour ago etc. -->
            <?php if(!Status::user($status->user_id, $_SESSION['user_id'])): ?>
                <?php if(Like::user_has_liked($_SESSION['user_id'], $status->id, $db)): ?>
                    <li id="unlike_button_<?php echo htmlspecialchars($status->id); ?>" class="btn unlike_button"><a>Unlike</a></li>
                <?php else: ?>
                    <li id="like_button_<?php echo htmlspecialchars($status->id); ?>" class="btn like_button"><a>Like</a></li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(Status::user($status->user_id, $_SESSION['user_id'])): ?>
                <li class="status_edit btn" id="status_edit<?php echo htmlspecialchars($status->id); ?>"><a>Edit</a></li>
                <li class="status_delete btn" id="<?php echo htmlspecialchars($status->id); ?>"><a>Delete</a></li>
            <?php elseif(User::authIsUser($user_id, $_SESSION['user_id'])): ?>
                <li class="status_delete btn" id="<?php echo htmlspecialchars($status->id); ?>"><a>Delete</a></li>
            <?php endif; ?>
            <?php ?>
            <li><p class="like_counter" id="like_counter<?php echo htmlspecialchars($status->id); ?>"><?php echo $likes; ?></p><p class="likes like_likes" id="like_likes<?php echo htmlspecialchars($status->id); ?>"><?php if($likes == 1){echo ' like';}else{echo ' likes';} ?></p></li>

            <input type="hidden" id="post_user_id<?php echo htmlspecialchars($status->id)?>" value="<?php echo $user_id; ?>"/>
            <input type="hidden" id="status_type<?php echo htmlspecialchars($status->id); ?>" value="<?php echo Status::type($status->body, $status->image, $status->video, $status->attachment) ?>"/>
            <input type="hidden" id="likes_input<?php echo htmlspecialchars($status->id); ?>" value="<?php echo $likes; ?>"/>
            <input type="hidden" id="like_user_id" value="<?php echo $user_id; ?>"/>
        </ul>
    </div>
</div>
<br>

<div id="#reply_insert_wrapper<?php echo htmlspecialchars($status_id); ?>"></div>


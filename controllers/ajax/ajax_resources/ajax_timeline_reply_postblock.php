<form role="form" action="#" method="post">
    <div class="form-group">
        <textarea name="reply_<?php echo htmlspecialchars($status['id']); ?>" id='reply<?php echo htmlspecialchars($status['id']); ?>' class="form-control" rows="2" placeholder="Reply to this status"></textarea>
    </div>
    <input id="reply_btn<?php echo htmlspecialchars($status['id']); ?>" type="button" value="Reply" class="btn btn-primary btn-sm reply_btn">
    <input type="hidden" value="<?php echo htmlspecialchars($status['page_id']); ?>" name="page_id" id="page_id<?php echo htmlspecialchars($status['id']); ?>"/>
    <input type="hidden" value="<?php echo htmlspecialchars($status['id']); ?>" name="parent_id" id="parent_id<?php echo htmlspecialchars($status['id']); ?>"/>
    <input type="hidden" value="1" name="status_token" id="status_token<?php echo htmlspecialchars($status['id']); ?>"/>
    <input type="hidden" value="" name="attachment" id="attachment<?php echo htmlspecialchars($status['id']); ?>"/>
    <input type="hidden" value="" name="status_image" id="status_image<?php echo htmlspecialchars($status['id']); ?>"/>
    <input type="hidden" value="" name="status_video" id="status_video<?php echo htmlspecialchars($status['id']); ?>"/>
    <input type="hidden" value="<?php echo $user_id; ?>" name="post_user_id" id="post_user_id<?php echo htmlspecialchars($status['id']); ?>"/>
    <input type="hidden" value="<?php echo $username; ?>" name="post_username" id="post_username<?php echo htmlspecialchars($status['id']); ?>"/>
    <input type="hidden" value="<?php echo $profile_image_upload_location; ?>" name="post_profile_image_upload_location" id="post_profile_image_upload_location<?php echo htmlspecialchars($status['id']); ?>"/>
    <input type="hidden" value="<?php echo $time; ?>" name="post_time" id="post_time<?php echo htmlspecialchars($status['id']); ?>"/>
</form>
<div id="reply_insert_wrapper<?php echo htmlspecialchars($status['id']); ?>"></div>
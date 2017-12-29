<form role="form" method="post">
    <div id="post_wrapper" class="form-group">
        <textarea name="status_body" id="status_body" class="form-control" rows="5" style="width: 80%" placeholder="What's on your mind?"></textarea>
    </div>
    <input type="hidden" value="<?php echo $page_id; ?>" name="page_id" id="page_id"/>
    <input type="hidden" value="<?php echo null; ?>" name="parent_id" id="parent_id"/>
    <input type="hidden" value="<?php echo $csrf_token; ?>" name="status_token" id="status_token"/>
    <input type="hidden" value="" name="attachment" id="attachment"/>
    <input class="hidden" type="file" value="" name="status_image" id="status_image"/>
    <input type="hidden" value="" name="status_video" id="status_video"/>
    <input type="hidden" value="<?php echo $user_id; ?>" name="post_user_id" id="post_user_id"/>
    <input type="hidden" value="<?php echo htmlspecialchars($user_info[0][0]->username); ?>" name="post_username" id="post_username"/>
    <input type="hidden" value="<?php echo htmlspecialchars($user_info[0][0]->profile_image_upload_location); ?>" name="post_profile_image_upload_location" id="post_profile_image_upload_location"/>
    <input type="hidden" class="timestamp" name="post_time" id="post_time"/>
    <div class="btn btn-primary btn-sm" id="status_post">Post</div>
    <!-- Glyphicons -->
    <!-- Make these bring up a model that has the same postbox but instead submits instead of using ajax. -->
    <a href="#post_image" data-toggle="modal"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span></a>
    <span class="glyphicon glyphicon-facetime-video hidden" aria-hidden="true"></span>
    <span class="glyphicon glyphicon-open-file hidden" aria-hidden="true"></span>
    <!-- If error appear here. -->
    <div id="post_info"></div>
</form>

<div class="modal fade" id="group_post_image" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="form-horizontal" role="form">
                <div class="modal-header">
                    <h4>Upload an image</h4>
                </div>
                <div class="modal-body">
                    <form action='' enctype="multipart/form-data" method='post'>
                        <div id="post_wrapper" class="form-group">
                            <textarea name="group_image_post_status_body" id="group_image_post_status_body" class="form-control image_post_text_area" rows="5" style="width: 80%" placeholder="What's on your mind?"></textarea>
                        </div>
                        <input type="hidden" value="<?php echo htmlspecialchars($group['id']); ?>" name="group_image_post_group_id" id="group_image_post_group_id"/>
                        <input type="hidden" value="<?php echo $csrf_token; ?>" name="group_image_post_status_token" id="group_image_post_status_token"/>
                        <input type="hidden" value="<?php echo $user_id; ?>" name="group_image_post_user_id" id="group_image_post_user_id"/>
                        <input type="hidden" class="timestamp" name="group_image_post_time" id="group_image_post_time"/>
                        <input type="submit" class="btn btn-primary btn-sm" id="group_post_status_post" value="Post">
                        <!-- Glyphicons -->
                        <!-- Make these bring up a model that has the same postbox but instead submits instead of using ajax. -->
                        <span class="glyphicon glyphicon-camera" id="group_image_post_icon" aria-hidden="true" onclick="upload_image('#group_image_post_image')"></span>
                        <p id="group_image_post_image_name" class="image_post_image_name"></p>
                        <input type="file" name="group_image_post_image" id="group_image_post_image" class="hidden">
                        <!-- If error appear here. -->
                        <div id="group_image_post_post_info"></div>
                    </form>
                </div>


                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>
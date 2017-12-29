<div class="media block">
    <div class="userblock_wrapper">
        <div class="userblock">
            <div class="userblock_header">
                <?php
                $user_profile_img = User::getUserProfileImage(htmlspecialchars($user['profile_image_upload_location']));
                ?>
                <a class="userblock-image-holder" href="<?php echo 'profile_template_user.php?page_id='.$user['id']; ?>">
                    <img class="media-object img-thumbnail userblock-image" alt="<?php echo htmlspecialchars($user['username']); ?>" src="<?php echo $user_profile_img; ?>">
                </a>
                <div class="userblock_info_wrapper">
                    <p class="userblock_header_username">
                        <a href="<?php echo 'profile_template_user.php?page_id='.$user['id']; ?>"><h4 class="media-heading userblock-username"><?php echo User::getNameOrUsername(htmlspecialchars($user['username']), htmlspecialchars($user['firstname']), htmlspecialchars($user['surname'])); ?></h4></a>
                    </p>
                    <?php if(isset($user['state']) && !empty($user['state']) && isset($user['country']) && !empty($user['country'])): ?>
                        <p class="userblock_header_info"><?php echo htmlspecialchars($user['state']).' '.htmlspecialchars($user['country']); ?></p>
                    <?php endif ?>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>

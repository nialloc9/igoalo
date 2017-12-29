<div class="media block" id="member<?php echo $user->id; ?>">
    <div class="userblock_wrapper">
        <div class="userblock">
            <div class="userblock_header">
                <?php
                $user_profile_img = User::getUserProfileImage(htmlspecialchars($user->profile_image_upload_location));
                ?>
                <a class="userblock-image-holder" id="<?php echo htmlspecialchars($user->id); ?>" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>">
                    <img class="media-object img-thumbnail userblock-image" alt="<?php echo htmlspecialchars($user->username); ?>" src="<?php echo $user_profile_img; ?>">
                </a>
                <?php if(Groups::user_is_group_admin($_SESSION['user_id'], $group_id, $db) && $_SESSION['user_id'] !== $user->id):?>
                    <a href="#" id="delete_member<?php echo htmlspecialchars($user->id); ?>" class="float_right"><i class="fa fa-times decline" aria-hidden="true"></i></a>
                <?php endif; ?>
                <div class="userblock_info_wrapper">
                    <p class="userblock_header_username">
                        <a class="user_redirect" onclick="page_redirect(<?php echo htmlspecialchars($user->id); ?>)" id="<?php echo htmlspecialchars($user->id); ?>" href="<?php echo 'profile_template_user.php?page_id='.htmlspecialchars($user->id); ?>"><h4 class="media-heading userblock-username"><?php echo User::getNameOrUsername(htmlspecialchars($user->username), htmlspecialchars($user->firstname), htmlspecialchars($user->surname)); ?></h4></a>
                    </p>
                    <?php if(isset($user->state) && !empty($user->state) && isset($user->country) && !empty($user->country)): ?>
                        <p class="userblock_header_info"><?php echo htmlspecialchars($user->state).' '.htmlspecialchars($user->country); ?></p>
                    <?php endif ?>
                </div>
                <input type="hidden" class="member_delete_class_grapper" id="<?php echo htmlspecialchars($user->id); ?>" value="<?php echo htmlspecialchars($user->id); ?>">
                <input type="hidden" id="delete_member_group_id" value="<?php echo htmlspecialchars($group_id); ?>"/>
            </div>
            <hr>
        </div>
    </div>
</div>
<br>
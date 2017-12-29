<?php
if(!isset($group_info['profile_pic']) || empty($group_info['profile_pic'])){
    $group_info_profile_pic = 'images/no_group_profile_pic.jpg';
}else{
    $group_info_profile_pic = $group_info['profile_pic'];
}
?>


<div class="media block status_group_block">
    <div class="status_group_wrapper">
        <div class="status_group_image_wrapper">
            <a class="groupblock-image-holder" href="<?php echo 'profile_template_group.php?group_id='.htmlspecialchars($group_info['id']); ?>"><img class="status_group_image" src="<?php echo $group_info_profile_pic; ?>"/></a>
        </div>
        <div class="status_group_info_wrapper">
            <a class="groupblock-image-holder" href="<?php echo 'profile_template_group.php?group_id='.htmlspecialchars($group_info['id']); ?>"><h3 class="status_group_info"><?php echo htmlspecialchars($group_info['group_name']); ?></h3></a>
            <p class="status_group_info"><?php echo htmlspecialchars($group_info['state']); ?></p>
            <p class="status_group_info"><?php echo htmlspecialchars($group_info['country']); ?></p>
        </div>
    </div>
</div>
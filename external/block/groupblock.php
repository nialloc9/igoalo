<?php
if(!isset($group['profile_pic']) || empty($group['profile_pic'])){
    $group_profile_pic = 'images/no_group_profile_pic.jpg';
}else{
    $group_profile_pic = htmlspecialchars($group['profile_pic']);
}
?>

<?php $m_goal = Goals::get_goal(htmlspecialchars($group['main_goal']), $db);
$main_goal = $m_goal[0][0];
?>

<div class="media block">
    <div class="groupblock_wrapper">
        <div class="groupblock">
            <div class="groupblock_header">
                <a class="groupblock-image-holder"id="<?php echo htmlspecialchars($group['id']); ?>" href="<?php echo 'profile_template_group.php?group_id='.htmlspecialchars($group['id']); ?>">
                    <img class="media-object img-thumbnail groupblock-image" alt="<?php echo htmlspecialchars($group['group_name']); ?>" src="<?php echo $group_profile_pic; ?>">
                </a>
                <div class="groupblock_info_wrapper">
                    <p class="groupblock_header_groupname">
                        <a id="<?php echo htmlspecialchars($group['id']); ?>" href="<?php echo 'profile_template_group.php?group_id='.htmlspecialchars($group['id']); ?>"><h4 class="media-heading groupblock-groupname"><?php echo htmlspecialchars($group['group_name']); ?></h4></a>
                    </p>
                    <?php if(isset($group['state']) && !empty($group['state']) && isset($group['country']) && !empty($group['country'])): ?>
                        <p class="groupblock_header_info"><?php echo htmlspecialchars($group['state']).' '.htmlspecialchars($group['country']); ?></p>
                    <?php endif ?>
                </div>
            </div>
            <hr>
                <div class="media-body groupblock-info">
                    <div class="group_block_main_goal_wrapper">
                        <p class="goal_main_goal"><strong>Type: </strong><?php echo htmlspecialchars($group['group_type']); ?></p>
                        <p class="goal_main_goal"><strong>Members: </strong><?php echo Groups::count_members(htmlspecialchars($group['id']), $db); ?></p>
                    </div>
                </div>
        </div>
    </div>
</div>
<br>


<?php
$goal_count = Goals::get_goal_count_by_type(htmlspecialchars($gr->type), $db);
$user_count = Goals::get_goal_count_by_user_id(htmlspecialchars($gr->type), $db);
$group_count = Goals::get_group_count_by_group_type(htmlspecialchars($gr->type), $db);
$goal_completed_count = Goals::get_goal_count_by_type_and_completed(htmlspecialchars($gr->type), $db);
$largest_group = Goals::get_largest_group_by_type(htmlspecialchars($gr->type), $db);
foreach($largest_group as $key9 => $largest_g){
    foreach($largest_g as $key8 => $lg){
        if(isset($lg) && !empty($lg)){
            $lg_id = htmlspecialchars($lg->id);
            $lg_type = htmlspecialchars($lg->group_type);
            $lg_name = htmlspecialchars($lg->group_name);
            $lg_add = htmlspecialchars($lg->city_town_village);
            $lg_state = htmlspecialchars($lg->state);
            $lg_country = htmlspecialchars($lg->country);
            $lg_created_at = htmlspecialchars($lg->created_at);
            $lg_updated_at = htmlspecialchars($lg->updated_at);
            $lg_member_count = htmlspecialchars($lg->value_occurance);
        }
    }
}
?>

<div class="media block scroll_bottom">
    <div class="main_page_goal_wrapper">
        <div class="panel panel panel-default main_page_goal_panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo htmlspecialchars($gr->name); ?></h3>
            </div>
            <div class="panel-body bg-grey text-center">
                <div class="thumbnail">
                    <img src="images/navbar_logo.jpg" alt="Goal" class="img">
                    <h4><?php echo htmlspecialchars($gr->type); ?> goals</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default main_page_goal_panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo htmlspecialchars($gr->type); ?> goal numbers</h3>
        </div>
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <td>Users:</td>
                <td><?php echo $user_count; ?></td>
            </tr>
            <tr>
                <td><?php echo $gr->type; ?> groups</td>
                <td><?php echo $group_count; ?></td>
            </tr>
            <tr>
                <td>Biggest group</td>
                <td><a <?php if(isset($lg_name) && !empty($lg_name)): ?> href="<?php echo 'profile_template_group.php?group_id='.$lg_id; ?>" <?php else:  ?>href= '#' <?php endif; ?>><?php if(isset($lg_name) && !empty($lg_name)){ echo $lg_name;}else{echo 'No groups yet.';} ?></a></td>
            </tr>
            <tr>
                <td>Active goals</td>
                <td><?php echo $goal_count; ?></td>
            </tr>
            <tr>

                <td>Completed goals</td>
                <td><?php echo $goal_completed_count; ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<br>
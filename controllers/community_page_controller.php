<?php
$goal_count = Goals::get_all_goals_count($db);
$user_count = User::count_users($db);
$group_count = Groups::count_groups($db);
$goal_completed_count = Goals::get_all_completed_goals_count($db);

$largest_group = Groups::get_largest_group($db);

$lg = $largest_group[0][0];

$lg_n = htmlspecialchars($lg->group_name);

if(isset($lg_n) && !empty($lg_n) && $lg_n !== ''){
    $lg_name = htmlspecialchars($lg->group_name);
}else{
    $lg_name = 'No group created yet.';
}
?>
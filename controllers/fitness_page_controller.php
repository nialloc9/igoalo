<?php
$goal_count = Goals::get_group_count_by_group_type('Fitness', $db);
$user_count = Goals::get_goal_count_by_user_id('Fitness', $db);
$group_count = Goals::get_group_count_by_group_type('Fitness', $db);
$goal_completed_count = Goals::get_goal_count_by_type_and_completed('Fitness', $db);

$largest_group = Goals::get_largest_group_by_type('Fitness', $db);

$lg = $largest_group[0][0];

$lg_n = htmlspecialchars($lg->group_name);

if(isset($lg_n) && !empty($lg_n) && $lg_n !== ''){
    $lg_name = $lg_n;
}else{
    $lg_name = 'No group created yet.';
}
?>
<?php
$goal_count = Goals::get_group_count_by_group_type('Career', $db);
$user_count = Goals::get_goal_count_by_user_id('Career', $db);
$group_count = Goals::get_group_count_by_group_type('Career', $db);
$goal_completed_count = Goals::get_goal_count_by_type_and_completed('Career', $db);

$largest_group = Goals::get_largest_group_by_type('Career', $db);

$lg = $largest_group[0][0];

$lg_n = htmlspecialchars($lg->group_name);

if(isset($lg_n) && !empty($lg_n) && $lg_n !== ''){
    $lg_name = htmlspecialchars($lg->group_name);
}else{
    $lg_name = 'No group created yet.';
}
?>
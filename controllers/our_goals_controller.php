<?php
$goal_target = 10000;
$group_target = 500;
$user_target = 1000;

$goal_count = (int)Goals::get_all_goals_count($db);
$user_count = (int)User::count_users($db);
$group_count = (int)Groups::count_groups($db);

$goal_c = ceil($goal_count / $goal_target);
$group_c = ceil($group_count / $group_target);
$user_c = ceil($user_count / $user_target);
?>
<?php
$goal_count = Goals::get_all_goals_count($db);
$user_count = User::count_users($db);
$group_count = Groups::count_groups($db);
?>
<?php
    $goal_count = Goals::get_group_count_by_group_type('Education', $db);
    $user_count = Goals::get_goal_count_by_user_id('Education', $db);
    $group_count = Goals::get_group_count_by_group_type('Education', $db);
    $goal_completed_count = Goals::get_goal_count_by_type_and_completed('Education', $db);

    $largest_group = Goals::get_largest_group_by_type('Education', $db);

    $lg = $largest_group[0][0];

    $lg_n = $lg->group_name;

    if(isset($lg_n) && !empty($lg_n) && $lg_n !== ''){
        $lg_name = $lg->group_name;
    }else{
        $lg_name = 'No group created yet.';
    }
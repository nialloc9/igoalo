<?php
//Have group with 'a' as goal name and type and user with address as below.
$group_a_s_c = Recommend::group_a_s_c('a', 'a', '4 The Cross Brosna', 'Kerry', 'Ireland', $db);

if(isset($group_a_s_c) && !empty($group_a_s_c)){
    echo '<strong>Pass:</strong> Recommend::group_a_s_c<br>';
}else{
    echo '<strong>Fail:</strong> Recommend::group_a_s_c<br>';
}

//Have user id of 26 and goal of id 50 in database.
if(Recommend::hide_goal_recommendation(50, 26, '2016-04-01 02:38:19', $db)){
    echo '<strong>Pass:</strong> Recommend::hide_goal_recommendation<br>';
}else{
    echo '<strong>Fail:</strong> Recommend::hide_goal_recommendation<br>';
}

//Have group id of 42 and user id of 26 in db
if(Recommend::hide_group_recommendation(42, 26, '2016-04-01 02:38:19', $db)){
    echo '<strong>Pass:</strong> Recommend::hide_group_recommendation<br>';
}else{
    echo '<strong>Fail:</strong> Recommend::hide_group_recommendation<br>';
}

//Have group id of 44 and user_id of 26 and is in the reommend table with hide of 1 in db
if(Recommend::check_if_group_hidden(44, 26, $db)){
    echo '<strong>Pass:</strong> Recommend::check_if_group_hidden<br>';
}else{
    echo '<strong>Fail:</strong> Recommend::check_if_group_hidden<br>';
}

//Have group id of 94 and user_id of 26 and is in the reommend table with hide of 1 in db
if(Recommend::check_if_goal_hidden(94, 26, $db)){
    echo '<strong>Pass:</strong> Recommend::check_if_goal_hidden<br>';
}else{
    echo '<strong>Fail:</strong> Recommend::check_if_goal_hidden<br>';
}

//Have group id of 44 and user_id of 26 and is in the reommend table with hide of 1 in db
if(Recommend::check_if_friend_hidden(29, 26, $db)){
    echo '<strong>Pass:</strong> Recommend::check_if_friend_hidden<br>';
}else{
    echo '<strong>Fail:</strong> Recommend::check_if_friend_hidden<br>';
}
?>
<?php

$message = 'This is a test.';
$chat_id = 1000;
$message_id = 1000;

$auth_id = 26;
$user_id = 27;
$group_id = 1000;
$type = 'Fitness';
$name = 'Test';
$creater = 26;
$about = 'fdafas';
$city_town_village = 'fdsfd';
$state = 'fgdsfd';
$country = 'gdfsgf';
$time = '2016-05-08 14:09:15';
$profile_pic = 'dsfgdfg';
$cover_pic = 'gfdgfd';
$created_at = '2016-05-08 14:09:15';
$updated_at = '2016-05-08 14:09:15';
$goal_id = '43';
$group_name = 'Test';

//create_test
$test = Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
if($test == true){
    echo '<strong>Pass:</strong> Groups::create_test<br>';
}else{
    echo '<strong>Fail:</strong> Groups::create_test<br>';
}
Groups::delete($group_id, $db);

//Update test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::update($group_id, $type, $name, $about, $city_town_village, $state, $country, $time, $db);
if($test == true){
    echo '<strong>Pass:</strong> Groups::update<br>';
}else{
    echo '<strong>Fail:</strong> Groups::update<br>';
}
Groups::delete($group_id, $db);

//Delete test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::delete($group_id, $db);
if($test == true){
    echo '<strong>Pass:</strong> Groups::delete<br>';
}else{
    echo '<strong>Fail:</strong> Groups::delete<br>';
}

//update_profile_and_cover_pic test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::update_profile_and_cover_pic($group_id, $profile_pic, $cover_pic, $updated_at, $db);
if($test == true){
    echo '<strong>Pass:</strong> Groups::update_profile_and_cover_pic<br>';
}else{
    echo '<strong>Fail:</strong> Groups::update_profile_and_cover_pic<br>';
}
Groups::delete($group_id, $db);

//update_profile test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::update_profile($group_id, $profile_pic, $updated_at, $db);
if($test == true){
    echo '<strong>Pass:</strong> Groups::update_profile<br>';
}else{
    echo '<strong>Fail:</strong> Groups::update_profile<br>';
}
Groups::delete($group_id, $db);

//update_cover_pic test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::update_cover_pic($group_id, $cover_pic, $updated_at, $db);
if($test == true){
    echo '<strong>Pass:</strong> Groups::update_cover_pic<br>';
}else{
    echo '<strong>Fail:</strong> Groups::update_cover_pic<br>';
}
Groups::delete($group_id, $db);


//update_main_goal test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::update_main_goal($group_id, $goal_id, $updated_at, $db);
if($test == true){
    echo '<strong>Pass:</strong> Groups::update_main_goal<br>';
}else{
    echo '<strong>Fail:</strong> Groups::update_main_goal<br>';
}
Groups::delete($group_id, $db);

//show_group_by_id test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::show_group_by_id($group_id, $db);
if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> Groups::show_group_by_id<br>';
}else{
    echo '<strong>Fail:</strong> Groups::show_group_by_id<br>';
}
Groups::delete($group_id, $db);


//show_group_by_type test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::show_group_by_type($type, $db);
if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> Groups::show_group_by_type<br>';
}else{
    echo '<strong>Fail:</strong> Groups::show_group_by_type<br>';
}
Groups::delete($group_id, $db);

//show_group_by_name test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::show_group_by_name($group_name, $db);
if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> Groups::show_group_by_name<br>';
}else{
    echo '<strong>Fail:</strong> Groups::show_group_by_name<br>';
}
Groups::delete($group_id, $db);

//show_group_by_creater_and_time test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::show_group_by_creater_and_time($creater, $time, $db);
if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> Groups::show_group_by_creater_and_time<br>';
}else{
    echo '<strong>Fail:</strong> Groups::show_group_by_creater_and_time<br>';
}
Groups::delete($group_id, $db);

//show_groups_user_is_a_member_of test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::show_groups_user_is_a_member_of($creater, $db);
if(isset($test) && !empty($test) && $test !== false){
    echo '<strong>Pass:</strong> Groups::show_groups_user_is_a_member_of<br>';
}else{
    echo '<strong>Fail:</strong> Groups::show_groups_user_is_a_member_of<br>';
}
Groups::delete($group_id, $db);

//show_groups_user_is_an_admin_of test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::show_groups_user_is_an_admin_of($creater, $db);
if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> Groups::show_groups_user_is_an_admin_of<br>';
}else{
    echo '<strong>Fail:</strong> Groups::show_groups_user_is_an_admin_of<br>';
}
Groups::delete($group_id, $db);

//show_six_groups_user_is_a_member_of test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::show_six_groups_user_is_a_member_of($creater, $db);
if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> Groups::show_six_groups_user_is_a_member_of<br>';
}else{
    echo '<strong>Fail:</strong> Groups::show_six_groups_user_is_a_member_of<br>';
}
Groups::delete($group_id, $db);

//group_create_member test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::group_create_member($group_id, $user_id, $time, $db);
if($test == true){
    echo '<strong>Pass:</strong> Groups::group_create_member<br>';
}else{
    echo '<strong>Fail:</strong> Groups::group_create_member<br>';
}
Groups::delete($group_id, $db);

//add_member test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::add_member($group_id, $user_id, $time, $db);
if($test == true){
    echo '<strong>Pass:</strong> Groups::add_member<br>';
}else{
    echo '<strong>Fail:</strong> Groups::add_member<br>';
}
Groups::delete($group_id, $db);

//accept_member test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $user_id, $time, $db);
$test = Groups::accept_member($user_id, $group_id, $time, $db);

if($test == true){
    echo '<strong>Pass:</strong> Groups::accept_member<br>';
}else{
    echo '<strong>Fail:</strong> Groups::accept_member<br>';
}
Groups::delete($group_id, $db);

//reject_member test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $user_id, $time, $db);
$test = Groups::reject_member($group_id, $user_id, $db);

if($test == true){
    echo '<strong>Pass:</strong> Groups::reject_member<br>';
}else{
    echo '<strong>Fail:</strong> Groups::reject_member<br>';
}
Groups::delete($group_id, $db);
//add_admin test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $user_id, $time, $db);
$test = Groups::add_admin($user_id, $group_id, $time, $db);

if($test == true){
    echo '<strong>Pass:</strong> Groups::add_admin<br>';
}else{
    echo '<strong>Fail:</strong> Groups::add_admin<br>';
}
Groups::delete($group_id, $db);

//leave_group test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $user_id, $time, $db);
$test = Groups::leave_group($user_id, $group_id, $db);

if($test == true){
    echo '<strong>Pass:</strong> Groups::leave_group<br>';
}else{
    echo '<strong>Fail:</strong> Groups::leave_group<br>';
}
Groups::delete($group_id, $db);

//delete_all_group_members test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $user_id, $time, $db);
$test = Groups::delete_all_group_members($group_id, $db);

if($test == true){
    echo '<strong>Pass:</strong> Groups::delete_all_group_members<br>';
}else{
    echo '<strong>Fail:</strong> Groups::delete_all_group_members<br>';
}
Groups::delete($group_id, $db);

//delete_admin test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $user_id, $time, $db);
Groups::add_admin($user_id, $group_id, $time, $db);
$test = Groups::delete_admin($user_id, $group_id, $time, $db);

if($test == true){
    echo '<strong>Pass:</strong> Groups::delete_admin<br>';
}else{
    echo '<strong>Fail:</strong> Groups::delete_admin<br>';
}
Groups::delete($group_id, $db);

//show_members test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $user_id, $time, $db);
Groups::accept_member($user_id, $group_id, $time, $db);

$test = Groups::show_members($group_id, $db);
if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> Groups::show_members<br>';
}else{
    echo '<strong>Fail:</strong> Groups::show_members<br>';
}
Groups::delete($group_id, $db);

//show_six_members test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $user_id, $time, $db);
Groups::accept_member($user_id, $group_id, $time, $db);

$test = Groups::show_six_members($group_id, $db);

if(isset($test) && !empty($test)){
    echo '<strong>Pass:</strong> Groups::show_six_members<br>';
}else{
    echo '<strong>Fail:</strong> Groups::show_six_members<br>';
}
Groups::delete($group_id, $db);
Groups::delete_all_group_members($group_id, $db);


//count_members test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $creater, $time, $db);
Groups::accept_member($creater, $group_id, $time, $db);
$test = Groups::count_members($group_id, $db);
if($test > 0){
    echo '<strong>Pass:</strong> Groups::count_members<br>';
}else{
    echo '<strong>Fail:</strong> Groups::count_members<br>';
}
Groups::delete($group_id, $db);
Groups::delete_all_group_members($group_id, $db);

//count_admin test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $creater, $time, $db);
Groups::accept_member($creater, $group_id, $time, $db);
Groups::add_admin($creater, $group_id, $time, $db);
$test = Groups::count_admin($group_id, $db);
if($test > 0){
    echo '<strong>Pass:</strong> Groups::count_admin<br>';
}else{
    echo '<strong>Fail:</strong> Groups::count_admin<br>';
}
Groups::delete($group_id, $db);
Groups::delete_all_group_members($group_id, $db);

//show_admin test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $user_id, $time, $db);
Groups::add_admin($user_id, $group_id, $time, $db);
$test = Groups::show_admin($group_id, $db);

if($test == true){
    echo '<strong>Pass:</strong> Groups::show_admin<br>';
}else{
    echo '<strong>Fail:</strong> Groups::show_admin<br>';
}
Groups::delete($group_id, $db);
Groups::delete_all_group_members($group_id, $db);

//show_admin test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $user_id, $time, $db);
Groups::add_admin($user_id, $group_id, $time, $db);
$test = Groups::show_six_admin($group_id, $db);

if($test == true){
    echo '<strong>Pass:</strong> Groups::show_six_admin<br>';
}else{
    echo '<strong>Fail:</strong> Groups::show_six_admin<br>';
}
Groups::delete($group_id, $db);
Groups::delete_all_group_members($group_id, $db);

//user_is_group_member test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $user_id, $time, $db);
Groups::accept_member($user_id, $group_id, $time, $db);
$test = Groups::user_is_group_member($user_id, $group_id, $db);

if($test == true){
    echo '<strong>Pass:</strong> Groups::user_is_group_member<br>';
}else{
    echo '<strong>Fail:</strong> Groups::user_is_group_member<br>';
}
Groups::delete($group_id, $db);
Groups::delete_all_group_members($group_id, $db);

//user_is_group_admin test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $user_id, $time, $db);
Groups::add_admin($user_id, $group_id, $time, $db);
$test = Groups::user_is_group_admin($user_id, $group_id, $db);

if($test == true){
    echo '<strong>Pass:</strong> Groups::user_is_group_admin<br>';
}else{
    echo '<strong>Fail:</strong> Groups::user_is_group_admin<br>';
}
Groups::delete($group_id, $db);
Groups::delete_all_group_members($group_id, $db);

//join_request_sent test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $user_id, $time, $db);
Groups::add_admin($user_id, $group_id, $time, $db);
$test = Groups::join_request_sent($user_id, $group_id, $db);

if($test == true){
    echo '<strong>Pass:</strong> Groups::join_request_sent<br>';
}else{
    echo '<strong>Fail:</strong> Groups::join_request_sent<br>';
}
Groups::delete($group_id, $db);
Groups::delete_all_group_members($group_id, $db);

//join_request_sent test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
$test = Groups::count_groups($db);

if($test == true){
    echo '<strong>Pass:</strong> Groups::count_groups<br>';
}else{
    echo '<strong>Fail:</strong> Groups::count_groups<br>';
}
Groups::delete($group_id, $db);

//Get largest group
//join_request_sent test
Groups::create_test($type, $name, $creater,$about, $city_town_village, $state, $country, $time, $db);
Groups::add_member($group_id, $user_id, $time, $db);
Groups::add_admin($user_id, $group_id, $time, $db);
$test = Groups::get_largest_group($db);

if($test == true){
    echo '<strong>Pass:</strong> Groups::get_largest_group<br>';
}else{
    echo '<strong>Fail:</strong> Groups::get_largest_group<br>';
}
Groups::delete($group_id, $db);
Groups::delete_all_group_members($group_id, $db);
?>
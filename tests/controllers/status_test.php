<?php
//Have user with id of 26 and some statuses in the db.
Status::test_insert(2000, 26, '', 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
$status = Status::statuses(26, $db);

if(isset($status) && !empty($status)){
    echo '<strong>Pass:</strong> Status::statuses<br>';
}else{
    echo '<strong>Fail:</strong> Status::statuses<br>';
}

Status::delete(2000, $db);
//Have status with id of 832 in the db.
/*
$get_status = Status::status(832, $db);

if(isset($get_status) && !empty($get_status)){
    echo '<strong>Pass:</strong> Status::status<br>';
}else{
    echo '<strong>Fail:</strong> Status::status<br>';
}
*/

//Have user with id of 26 and some statuses in the db.
Status::test_insert(2000, 26, '', 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
$status_count = Status::count_statuses(26, $db);

if(isset($status_count) && !empty($status_count)){
    echo '<strong>Pass:</strong> Status::count_statuses<br>';
}else{
    echo '<strong>Fail:</strong> Status::count_statuses<br>';
}
Status::delete(2000, $db);


//Have user with id of 26 and a status with created at of 2016-05-04 04:28:48.
Status::test_insert(2000, 26, '', 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
$status_ajax_get = Status::ajax_get_status(26, '2016-05-04 04:28:48', $db);

if(isset($status_ajax_get) && !empty($status_ajax_get)){
    echo '<strong>Pass:</strong> Status::ajax_get_status<br>';
}else{
    echo '<strong>Fail:</strong> Status::ajax_get_status<br>';
}
Status::delete(2000, $db);

Status::test_insert(2000, 26, '', 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
$status_user = Status::user(26, 26);

if($status_user == true){
    echo '<strong>Pass:</strong> Status::user<br>';
}else{
    echo '<strong>Fail:</strong> Status::user<br>';
}
Status::delete(2000, $db);

//Have status with id of 2000 witb a parent id of ''.
Status::test_insert(2000, 26, '', 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
$status_not_reply = Status::statusNotReply(2000, $db);

if($status_not_reply === true){
    echo '<strong>Pass:</strong> Status::statusNotReply<br>';
}else{
    echo '<strong>Fail:</strong> Status::statusNotReply<br>';
}
Status::delete(2000, $db);

//Have status with id of 934 and 945 available
Status::test_insert(2000, 26, 2001, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
$status_reply_rela = Status::replies(2000, 2001, $db);

if($status_reply_rela == true){
    echo '<strong>Pass:</strong> Status::replies<br>';
}else{
    echo '<strong>Fail:</strong> Status::replies<br>';
}
Status::delete(2000, $db);

//Have statuses with parent_id of 2000 availavble.
Status::test_insert(2000, 26, '', 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
Status::test_insert(2005, 26, 2000, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
$get_replies = Status::getReplies(2000, 0, $db);

if(isset($get_replies) && !empty($get_replies)){
    echo '<strong>Pass:</strong> Status::getReplies<br>';
}else{
    echo '<strong>Fail:</strong> Status::getReplies<br>';
}
Status::delete(2000, $db);
Status::delete(2005, $db);

//Count replies
Status::test_insert(2000, 26, '', 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
Status::test_insert(2005, 26, 2000, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
$count = Status::getRepliesCount(2000, $db);

if($count > 0){
    echo '<strong>Pass:</strong> Status::getRepliesCount<br>';
}else{
    echo '<strong>Fail:</strong> Status::getRepliesCount<br>';
}

Status::delete(2000, $db);
Status::delete(2005, $db);

Status::test_insert(2000, 26, 2001, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);

if($insert == true){
    echo '<strong>Pass:</strong> Status::insert<br>';
}else{
    echo '<strong>Fail:</strong> Status::insert<br>';
}
Status::delete(2000, $db);

//Have status with id of 2000.
Status::test_insert(2000, 26, 2001, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
$update = Status::update(2000, 'This is a status that is updated for a test', '', '', '', '2016-05-04 04:28:48', $db);

if($update == true){
    echo '<strong>Pass:</strong> Status::update<br>';
}else{
    echo '<strong>Fail:</strong> Status::update<br>';
}
Status::delete(2000, $db);

//Have status with id of 2000 and a status with created at of 2016-05-04 04:28:48.
Status::test_insert(2000, 26, 2001, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
$update_parent_status_updated_at = Status::update_parent_status_updated_at(817, '2016-05-04 04:28:48', $db);

if($update_parent_status_updated_at){
    echo '<strong>Pass:</strong> Status::update_parent_status_updated_at<br>';
}else{
    echo '<strong>Fail:</strong> Status::update_parent_status_updated_at<br>';
}
Status::delete(2000, $db);

//Have status with id of 2000.
Status::test_insert(2000, 26, 2001, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
$delete = Status::delete(2000, $db);

if($delete){
    echo '<strong>Pass:</strong> Status::delete<br>';
}else{
    echo '<strong>Fail:</strong> Status::delete<br>';
}

$state_test_type = Status::type(1, '', '', '') + Status::type('', 1, '', '') + Status::type('', '', 1, '') +Status::type('', '', '', 1);

if($state_test_type == 8){
    echo '<strong>Pass:</strong> Status::type<br>';
}else{
    echo '<strong>Fail:</strong> Status::type<br>';
}

//Have user with id of 26 and some statuses in the db.
Status::test_insert(2000, 26, 2001, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
Status::test_insert(2001, 26, 2001, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
Status::test_insert(2002, 26, 2001, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
Status::test_insert(2003, 26, 2001, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
Status::test_insert(2004, 26, 2001, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
$paginate_status = Status::paginate(0, 5, 26, $db);

if(isset($paginate_status) && !empty($paginate_status)){
    echo '<strong>Pass:</strong> Status::paginate<br>';
}else{
    echo '<strong>Fail:</strong> Status::paginate<br>';
}
Status::delete(2000, $db);
Status::delete(2001, $db);
Status::delete(2002, $db);
Status::delete(2003, $db);
Status::delete(2004, $db);

//Have user with id of 26 and some statuses in the db.
Status::test_insert(2000, 26, 2001, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
Status::test_insert(2001, 26, 2001, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
Status::test_insert(2002, 26, 2001, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
Status::test_insert(2003, 26, 2001, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
Status::test_insert(2004, 26, 2001, 26, 'This is a test.', '', '', '', '2016-05-04 04:28:48', '', '', '', $db);
$paginatePages = Status::paginatePages(26, 5, $db);

if(isset($paginatePages) && !empty($paginatePages)){
    echo '<strong>Pass:</strong> Status::paginatePages<br>';
}else{
    echo '<strong>Fail:</strong> Status::paginatePages<br>';
}
Status::delete(2000, $db);
Status::delete(2001, $db);
Status::delete(2002, $db);
Status::delete(2003, $db);
Status::delete(2004, $db);

//delete_status_from_goal_id
Status::insert(26, '', 26, 'fdg', '', '', '', '2016-05-04 04:28:48', 60, '', '', $db);
$delete_from_goal = Status::delete_status_from_goal_id(60, $db);

if($delete_from_goal){
    echo '<strong>Pass:</strong> Status::delete_status_from_goal_id<br>';
}else{
    echo '<strong>Fail:</strong> Status::delete_status_from_goal_id<br>';
}

//delete_status_from_group_id
Status::insert('', '', '', 'fdg', '', '', '', '2016-05-04 04:28:48', '', 60, '', $db);
$delete_status_from_group_id = Status::delete_status_from_group_id(60, $db);

if($delete_status_from_group_id){
    echo '<strong>Pass:</strong> Status::delete_status_from_group_id<br>';
}else{
    echo '<strong>Fail:</strong> Status::delete_status_from_group_id<br>';
}

//Timeline test
$friends_array = User::showFriends(26, $db);
$group_array = Groups::show_groups_user_is_a_member_of(26, $db);
$result = Status::t_status($friends_array, $group_array, 26, 0, 10, $db);
if(isset($result) && !empty($result)){
    echo '<strong>Pass:</strong> Status::timeline_status<br>';
}else{
    echo '<strong>Fail:</strong> Status::timeline_status<br>';
}
?>
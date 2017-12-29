<?php
if(isset($_GET['task']) && $_GET['task'] == 'get_replies'){
    $id = $_GET['status_id'];
    $start = $_GET['start'];

    $status_id = (int)$id;

    require_once '../../external/core.inc.php';
    require_once '../ajax_resources/ajax_auth.php';
    require_once '../../controllers/controller_mods/user.php';
    require_once '../../ajax/ajax_resources/ajax_user.php';
    require_once '../../controllers/controller_mods/status.php';
    require_once '../../controllers/controller_mods/like.php';


    $statuses = Status::getReplies($status_id, $start, $db);
}
?>

<?php
foreach($statuses as $key => $reply){
    foreach($reply as $key2 => $status){
        if(htmlspecialchars($status->parent_id) > 0){
            $user_info = User::getFullUserInfo(htmlspecialchars($status->user_id), $db);
            $likes = Like::like_counter(htmlspecialchars($status->id), $db);

            foreach($user_info as $user_key => $users){
                foreach($users as $user_key2 => $user){
                    $user = $user;
                }
            }
            require '../../external/block/replyblock.php';
        }
    }
}
?>

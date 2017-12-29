<?php
if(User::authIsUser($user_id, $page_id) || User::isFriendsWith($user_id, $page_id, $db) || User::isFriendsWith($page_id, $user_id, $db)) {
    require_once 'external/block/postbox.php';
}
?>
<?php
$groups = Groups::show_six_members($group['id'], $db);
foreach($groups as $key => $group_info){
    $group_id = htmlspecialchars($group_info['group_id']);
    $member_id = htmlspecialchars($group_info['member_id']);

    $group_member = User::getFullUserInfo($member_id, $db);

    foreach($group_member as $key3 => $group_m){
        foreach($group_m as $key4 => $user){
            echo "<div class='col-sm-6'>";
            require 'external/block/friendblock.php';
            echo "</div>";
        }
    }
}
?>
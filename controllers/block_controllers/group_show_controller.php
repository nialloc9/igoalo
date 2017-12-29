<?php
$groups = Groups::show_six_groups_user_is_a_member_of($page_id, $db);

foreach($groups as $key => $group_i){
    $group_id = htmlspecialchars($group_i['group_id']);

    $group_info = Groups::show_group_by_id($group_id, $db);

    $group = $group_info[0];
        echo "<div class='col-sm-6'>";
            require 'external/block/groupblock.php';
        echo "</div>";
}
?>
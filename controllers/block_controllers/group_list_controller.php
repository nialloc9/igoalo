<?php
    $groups = Groups::show_groups_user_is_a_member_of($page_id, $db);

    foreach($groups as $key => $group){
        $group_i = Groups::show_group_by_id(htmlspecialchars($group['group_id']), $db);
        foreach($group_i as $key => $group){
            echo "<div class='col-sm-2'>";
                require 'external/block/groupblock.php';
            echo "</div>";
        }
    }
?>
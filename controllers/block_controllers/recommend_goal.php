<?php
    $goal_reco = Goals::get_unique($user_id, $db);
if(isset($goal_reco) && !empty($goal_reco)){
    foreach($goal_reco as $key => $goal_r){
        foreach($goal_r as $key => $gr){
            require 'external/block/goal_info_block.php';
        }
    }
}else{
    echo "<div class='no_goals_or_groups_to_recommend'>Oh you have not set any goals. Start creating goals today!...</div>";
}
?>
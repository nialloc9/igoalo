<?php
    $group_reco = Recommend::group_a_s_c(htmlspecialchars($umg->name), htmlspecialchars($umg->type), htmlspecialchars($user->address), htmlspecialchars($user->state), htmlspecialchars($user->country), $db);

    if(!isset($group_reco) || empty($group_reco)){
        $group_reco = Recommend::group_s_c(htmlspecialchars($umg->name), htmlspecialchars($umg->type), htmlspecialchars($user->state), htmlspecialchars($user->country), $db);
    }elseif(count($group_reco) < 6){
        $group_add = Recommend::group_s_c(htmlspecialchars($umg->name), htmlspecialchars($umg->type), htmlspecialchars($user->state), htmlspecialchars($user->country), $db);
        $group_reco = array_unique(array_merge($group_reco, $group_add), SORT_REGULAR);
    }

    if(!isset($group_reco) || empty($group_reco)){
        $group_reco = Recommend::group_c(htmlspecialchars($umg->name), htmlspecialchars($umg->type), htmlspecialchars($user->country), $db);
    }elseif(count($group_reco) < 6){

        $group_add = Recommend::group_c(htmlspecialchars($umg->name), htmlspecialchars($umg->type), htmlspecialchars($user->country), $db);
        $group_reco = array_unique(array_merge($group_reco, $group_add), SORT_REGULAR);
    }

    if(isset($group_reco) && !empty($group_reco)){
        $found_group_rec = 1;
        foreach($group_reco as $key6 => $group_rocom){
            $group = $group_rocom;
            echo "<div class='col-sm-6 main_page_goal_recommend_goal'>";
                require 'external/block/groupblock.php';
            echo "</div>";
        }
    }else{
        $found_group_rec = 0;
        echo "<div class='no_goals_or_groups_to_recommend'>Uh oh. Looks like there are no groups to recommend. You may need to set a main goal. To do this go to goals and update one of your existing goals and make it your main goal.</div>";
    }
?>
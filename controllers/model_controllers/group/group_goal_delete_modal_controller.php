<?php
$goal_array = Goals::group_get_goals($group['id'], $db);

if(isset($goal_array) && is_array($goal_array)): ?>

    <?php
    foreach ($goal_array as $key => $goals):
        foreach($goals as $key2 => $goal):
            $i=1;
            $max = count($goal_array);


            while($i<=$max):
                if($goal->goal_per_completed < 100) {
                    $goal_n = $goal->goal_per_completed + 10;
                    $goal_next = $goal_n.'%';
                }elseif($goal->goal_per_completed == 100){
                    $goal_next = '100';
                }else{
                    $goal_next = 'Success';
                }

                require 'external/block/group/group_goal_delete_block.php';
                ?>


                <?php $i++; ?>
            <?php endwhile;?>
        <?php endforeach; ?>
    <?php endforeach;?>
<?php endif; ?>
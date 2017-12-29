<?php
$goal_array = Goals::group_get_first_five_goals($group['id'], $db);
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
                    $goal_update_button_type = 1;
                }elseif($goal_n == 100){
                    $goal_next = 'Success';
                    $goal_update_button_type = 2;
                }else{
                    $goal_next = 'null';
                    $goal_update_button_type = 3;
                }


                ?>
                <?php require 'external/block/goalblock.php'; ?>

                <?php $i++; ?>
            <?php endwhile;?>
        <?php endforeach; ?>
    <?php endforeach;?>
<?php endif; ?>
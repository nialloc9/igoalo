 <div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title goal_block_title">
                <a data-toggle="collapse" data-parent="#accordion" href="#more_collapse<?php echo htmlspecialchars($goal->id); ?>">
                    <?php echo htmlspecialchars($goal->type); ?>: <?php echo htmlspecialchars($goal->name); ?></a>
                <?php if(User::authIsUser($user_id, $page_id)): ?>
                    <?php if($goal_update_button_type == '2'): ?>
                        <div class="goal_next_button_wrapper"><input type="button" id="goal_next<?php echo htmlspecialchars($goal->id); ?>" class="btn-small btn-primary goal_next_button" value="success"/></div>
                    <?php elseif($goal_update_button_type == 3): ?>
                    <?php else: ?>
                        <div class="goal_next_button_wrapper"><input type="button" id="goal_next<?php echo htmlspecialchars($goal->id); ?>" class="btn-small btn-primary goal_next_button" value="<?php echo (int)$goal_next; ?>"/></div>
                    <?php endif; ?>
                <?php endif ?>


            </h4>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" id="progress<?php echo htmlspecialchars($goal->id); ?>" role="progressbar"
                     aria-valuenow="<?php echo htmlspecialchars($goal->goal_per_completed); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $goal->goal_per_completed; ?>%">
                    <?php echo htmlspecialchars($goal->goal_per_completed); ?>%
                </div>
            </div>

        </div>
        <div id="more_collapse<?php echo htmlspecialchars($goal->id); ?>" class="panel-collapse collapse">
            <div class="panel-body">
                <?php if(!empty(htmlspecialchars($goal->about))): ?>
                    <p class="goal_text"><?php echo htmlspecialchars($goal->about); ?>.<br><br>

                    </p><hr>
                <?php endif; ?>

                <?php if(!empty($goal->goal_10)): ?>
                    <p class="goal_text">10%: <?php echo htmlspecialchars($goal->goal_10); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($goal->goal_20)): ?>
                    <p class="goal_text">20%: <?php echo htmlspecialchars($goal->goal_20); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($goal->goal_30)): ?>
                    <p class="goal_text">30%: <?php echo htmlspecialchars($goal->goal_30); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($goal->goal_40)): ?>
                    <p class="goal_text">40%: <?php echo htmlspecialchars($goal->goal_40); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($goal->goal_50)): ?>
                    <p class="goal_text">50%: <?php echo htmlspecialchars($goal->goal_50); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($goal->goal_60)): ?>
                    <p class="goal_text">60%: <?php echo htmlspecialchars($goal->goal_60); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($goal->goal_70)): ?>
                    <p class="goal_text">70%: <?php echo htmlspecialchars($goal->goal_70); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($goal->goal_80)): ?>
                    <p class="goal_text">80%: <?php echo htmlspecialchars($goal->goal_80); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($goal->goal_90)): ?>
                    <p class="goal_text">90%: <?php echo htmlspecialchars($goal->goal_90); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($goal->goal_100)): ?>
                    <p class="goal_text">100%: <?php echo htmlspecialchars($goal->goal_100); ?></p><hr>
                <?php endif; ?>

                <p class="goal_text">Created at: <span class="time"><?php echo htmlspecialchars($goal->created_at); ?></span></p><br>

                <input type="hidden" value="<?php echo htmlspecialchars($goal->goal_per_completed); ?>" id="goal_per_input_hidden<?php echo htmlspecialchars($goal->id); ?>">
                <input type="hidden" class="timestamp" id="goal_time_per_input_hidden<?php echo htmlspecialchars($goal->id); ?>">
                <input type="hidden" name="token" id="goal_per_input_token<?php echo htmlspecialchars($goal->id); ?>" value="<?php echo $csrf_token; ?>">
            </div>
        </div>
    </div>
    </div><?php
/**
 * Created by PhpStorm.
 * User: Niall
 * Date: 13/05/2016
 * Time: 13:18
 */
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title goal_block_title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo htmlspecialchars($status_goal->id); ?>">
                    <?php echo htmlspecialchars($status_goal->type); ?>: <?php echo htmlspecialchars($status_goal->name); ?></a>
            </h4>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" id="progress<?php echo htmlspecialchars($status_goal->id); ?>" role="progressbar"
                     aria-valuenow="<?php echo htmlspecialchars($status_goal->goal_per_completed); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo htmlspecialchars($status_goal->goal_per_completed); ?>%">
                    <?php echo htmlspecialchars($status_goal->goal_per_completed); ?>%
                </div>
            </div>

        </div>
        <div id="collapse<?php echo htmlspecialchars($status_goal->id); ?>" class="panel-collapse collapse">
            <div class="panel-body">
                <?php if(!empty($status_goal->about)): ?>
                    <p class="goal_text"><strong>About:</strong> <?php echo htmlspecialchars($status_goal->about); ?>.<br>

                    </p><hr>
                <?php endif; ?>

                <?php if(!empty($status_goal->goal_10)): ?>
                    <p class="goal_text">10%: <?php echo htmlspecialchars($status_goal->goal_10); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($status_goal->goal_20)): ?>
                    <p class="goal_text">20%: <?php echo htmlspecialchars($status_goal->goal_20); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($status_goal->goal_30)): ?>
                    <p class="goal_text">30%: <?php echo htmlspecialchars($status_goal->goal_30); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($status_goal->goal_40)): ?>
                    <p class="goal_text">40%: <?php echo htmlspecialchars($status_goal->goal_40); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($status_goal->goal_50)): ?>
                    <p class="goal_text">50%: <?php echo htmlspecialchars($status_goal->goal_50); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($status_goal->goal_60)): ?>
                    <p class="goal_text">60%: <?php echo htmlspecialchars($status_goal->goal_60); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($status_goal->goal_70)): ?>
                    <p class="goal_text">70%: <?php echo htmlspecialchars($status_goal->goal_70); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($status_goal->goal_80)): ?>
                    <p class="goal_text">80%: <?php echo htmlspecialchars($status_goal->goal_80); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($status_goal->goal_90)): ?>
                    <p class="goal_text">90%: <?php echo htmlspecialchars($status_goal->goal_90); ?></p><hr>
                <?php endif; ?>

                <?php if(!empty($status_goal->goal_100)): ?>
                    <p class="goal_text">100%: <?php echo htmlspecialchars($status_goal->goal_100); ?></p><hr>
                <?php endif; ?>
                <p class="goal_text">Created at: <p class="time"><?php echo htmlspecialchars($status_goal->created_at); ?></p></p><br>

                <input type="hidden" value="<?php echo htmlspecialchars($status_goal->goal_per_completed); ?>" id="goal_per_input_hidden<?php echo htmlspecialchars($status_goal->id); ?>">
                <input type="hidden" value="<?php echo $time; ?>" id="goal_time_per_input_hidden<?php echo htmlspecialchars($status_goal->id); ?>">
            </div>
        </div>
    </div>
</div>
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
                <p class="goal_text">Created at: <p class="time"><?php echo htmlspecialchars($status_goal->created_at); ?></p></p><br>

                <input type="hidden" value="<?php echo htmlspecialchars($status_goal->goal_per_completed); ?>" id="goal_per_input_hidden<?php echo htmlspecialchars($status_goal->id); ?>">
                <input type="hidden" value="<?php echo $time; ?>" id="goal_time_per_input_hidden<?php echo htmlspecialchars($status_goal->id); ?>">
            </div>
        </div>
    </div>
</div>
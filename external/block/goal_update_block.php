 <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_update<?php echo htmlspecialchars($goal->id); ?>">
                        <?php echo htmlspecialchars($goal->type); ?>: <?php echo htmlspecialchars($goal->name); ?></a>
                </h4>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar"
                         aria-valuenow="<?php echo htmlspecialchars($goal->goal_per_completed); ?>" aria-valuemin="0" aria-valuemax="100" id="progress_update<?php echo htmlspecialchars($goal->id); ?>" style="width:<?php echo $goal->goal_per_completed; ?>%">
                        <?php echo htmlspecialchars($goal->goal_per_completed); ?>
                    </div>
                </div>
            </div>

            <form method="post" action="">
            <div id="collapse_update<?php echo htmlspecialchars($goal->id); ?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="goal_update_type_label" class="col-sm-2 control-label">
                            Type:
                        </label>
                        <div class="col-sm-4">
                            <select class="form-control goal_update_type" name="goal_update_type" id="goal_update_type<?php echo htmlspecialchars($goal->id); ?>">
                                <option>Fitness</option>
                                <option>Career</option>
                                <option>Education</option>
                                <option selected id="goal_update_type_more<?php echo htmlspecialchars($goal->id); ?>">More</option>
                            </select>
                            <br>
                            <div id="type_more<?php echo htmlspecialchars($goal->id); ?>">
                                <input class="form-control" type="text" name="goal_update_more_type" id="goal_update_more_type<?php echo htmlspecialchars($goal->id); ?>" value="<?php echo htmlspecialchars($goal->type); ?>" placeholder="goal type"/>
                            </div>
                        </div>

                        <div class="col-sm-6" id="type_more<?php echo htmlspecialchars($goal->type); ?>">
                            <p class="help-block">Please select your goal type from the list or make your own below.</p>
                        </div>

                    </div>
                    <br>

                    <div class="form-group">
                        <label for="goal_update_name" class="col-sm-2 control-label">
                            Name:
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="goal_update_name" id="goal_update_name<?php echo htmlspecialchars($goal->id); ?>" maxlength="20" class="form-control goal_update_name" value="<?php echo htmlspecialchars($goal->name); ?>" placeholder="<?php echo htmlspecialchars($user_info[0][0]->username); ?>'s goal"/>
                        </div>
                        <div class="col-sm-2">
                            <p><p id="goal_update_name_char_remaining<?php echo htmlspecialchars($goal->id); ?>"></p></p>
                        </div>
                        <div class="col-sm-4">
                            <p id="goal_update_about_char_remaining<?php echo htmlspecialchars($goal->id); ?>" class="hidden">Please name your goal in 20 characters or less.</p>
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="group_name" class="col-sm-2 control-label">
                            About:
                        </label>
                        <div class="col-sm-8">
                            <textarea name="goal_update_about" maxlength="150" class="form-control goal_update_about" placeholder="This is <?php echo htmlspecialchars($user_info[0][0]->username); ?>'s goal. Describe it here." id="goal_update_about<?php echo htmlspecialchars($goal->id); ?>"><?php echo htmlspecialchars($goal->about); ?></textarea>
                        </div>
                        <div class="col-sm-2">
                            <p><p id="goal_update_about_char<?php echo htmlspecialchars($goal->id); ?>"></p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <!-- White space -->
                        </div>
                        <div class="col-sm-4">
                            <p id="goal_update_about_char_remaining<?php echo htmlspecialchars($goal->id); ?>" class="hidden">Please describe your goal in 150 characters or less.</p>
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="goal_update_steps" class="col-sm-2 control-label">
                            Steps:
                        </label>
                        <p class="col-sm-10">Please describe what you need to do for each step to achieve your goal. (These are optional. Fill in as many as you want.) Make the desrciptions short.</p>
                    </div>
                    <br>

                    <!-- goal_update % -->


                    <div class="form-group">

                        <div class="col-sm-4">
                            10%: <input type="text" maxlength="250" name="goal_update_10" id="goal_update_10<?php echo htmlspecialchars($goal->id); ?>" class="form-control goal_update_10" value="<?php echo htmlspecialchars($goal->goal_10); ?>" placeholder="Step 1."/>
                        </div>
                        <div class="col-sm-4">
                            20%: <input type="text" maxlength="250" name="goal_update_20" id="goal_update_20<?php echo htmlspecialchars($goal->id); ?>" class="form-control goal_update_20" value="<?php echo htmlspecialchars($goal->goal_20); ?>" placeholder="Step 2."/>
                        </div>
                        <div class="col-sm-4">
                            30%: <input type="text" maxlength="250" name="goal_update_30" id="goal_update_30<?php echo htmlspecialchars($goal->id); ?>" class="form-control goal_update_30" value="<?php echo htmlspecialchars($goal->goal_30); ?>" placeholder="Step 3."/>
                        </div>

                        <div class="col-sm-4">
                            40%: <input type="text" maxlength="250" name="goal_update_40" id="goal_update_40<?php echo htmlspecialchars($goal->id); ?>" class="form-control goal_update_40" value="<?php echo htmlspecialchars($goal->goal_40); ?>" placeholder="Step 4."/>
                        </div>
                        <div class="col-sm-4">
                            50%: <input type="text" maxlength="250" name="goal_update_50" id="goal_update_50<?php echo htmlspecialchars($goal->id); ?>" class="form-control goal_update_50" value="<?php echo htmlspecialchars($goal->goal_50); ?>" placeholder="Step 5."/>
                        </div>
                        <div class="col-sm-4">
                            60%: <input type="text" maxlength="250" name="goal_update_60" id="goal_update_60<?php echo htmlspecialchars($goal->id); ?>" class="form-control goal_update_60" value="<?php echo htmlspecialchars($goal->goal_60); ?>" placeholder="Step 6."/>
                        </div>


                        <div class="col-sm-4">
                            70%: <input type="text" maxlength="250" name="goal_update_70" id="goal_update_70<?php echo htmlspecialchars($goal->id); ?>" class="form-control goal_update_70" value="<?php echo htmlspecialchars($goal->goal_70); ?>" placeholder="Step 7."/>
                        </div>
                        <div class="col-sm-4">
                            80%: <input type="text" maxlength="250" name="goal_update_80" id="goal_update_80<?php echo htmlspecialchars($goal->id); ?>" class="form-control goal_update_80" value="<?php echo htmlspecialchars($goal->goal_80); ?>" placeholder="Step 8."/>
                        </div>
                        <div class="col-sm-4">
                            90%: <input type="text" maxlength="250" name="goal_update_90" id="goal_update_90<?php echo htmlspecialchars($goal->id); ?>" class="form-control goal_update_90" value="<?php echo htmlspecialchars($goal->goal_90); ?>" placeholder="Step 9."/>
                        </div>
                        <div class="col-sm-4">
                            100%: <input type="text" maxlength="250" name="goal_update_100" id="goal_update_100<?php echo htmlspecialchars($goal->id); ?>" class="form-control goal_update_100" value="<?php echo htmlspecialchars($goal->goal_100); ?>" placeholder="Step 10."/>
                        </div>
                        <div class="col-sm-4">
                            <p class="goal_update_per_char" id="goal_update_per_char<?php echo $goal->id; ?>"></p>
                        </div>
                        <div class="col-sm-4">
                            <p class="main_goal_checkbox_area"><input type="checkbox" name="main_goal_checkbox" value="<?php echo htmlspecialchars($goal->id); ?>"/><span class="main_goal_help"> Profile goal</span></p>
                        </div>

                        <div class="col-sm-12 goal_update_per">
                            % complete:
                            <input type="range" min="0" max="100" step="10" value="<?php echo htmlspecialchars($goal->goal_per_completed); ?>" name="goal_update_per_completed" class="goal_update_per_completed" id="goal_update_per_completed<?php echo htmlspecialchars($goal->id); ?>"/>
                            <span id="goal_update_per_value<?php echo htmlspecialchars($goal->id); ?>"><?php echo htmlspecialchars($goal->goal_per_completed); ?></span>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="goal_update_user_id" value="<?php echo $user_id; ?>"/>
                <input type="hidden" name="goal_update_time" class="timestamp"/>
                <input type="hidden" name="goal_update_id" value="<?php echo htmlspecialchars($goal->id); ?>"/>
                <input type="hidden" name="token" value="<?php echo $csrf_token; ?>">

                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Update" id="goal_update<?php echo htmlspecialchars($goal->id); ?>"/>
                </div>
                </div>
            </form>
        </div>
 </div>

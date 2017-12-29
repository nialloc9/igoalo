<div class="modal fade" id="group_create_goal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
                <div class="form-horizontal" role="form">
                    <div class="modal-header">
                        <h4>My goal</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="group_goal_type_label" class="col-sm-2 control-label">
                                Type:
                            </label>
                            <div class="col-sm-4">
                                <select class="form-control" name="group_goal_type" id="group_goal_type">
                                    <option>Fitness</option>
                                    <option>Career</option>
                                    <option>Education</option>
                                    <option id="group_goal_type_more">More</option>
                                </select>
                                <br>
                                <div id="group_goal_type_more_input" class="hidden">
                                    <p class="help-block">Please enter your goal type below:</p>
                                    <input class="form-control" type="text" name="group_goal_more_type" placeholder="Goal type"/>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <p>Please choose a goal type.</p>
                            </div>

                        </div>
                        <br>

                        <div class="form-group">
                            <label for="group_goal_name" class="col-sm-2 control-label">
                                Name:
                            </label>
                            <div class="col-sm-4">
                                <input type="text" name="group_goal_name" id="group_goal_name" maxlength="20" class="form-control" placeholder="<?php echo $group['group_name']; ?>'s goal"/>
                            </div>
                            <div class="col-sm-2">
                                <p><p id="group_goal_name_char"></p></p>
                            </div>
                            <div class="col-sm-4">
                                <p id="group_goal_char_remaining" class="hidden info">Please name your goal in 20 characters or less.</p>
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="group_group_name" class="col-sm-2 control-label">
                                About:
                            </label>
                            <div class="col-sm-8">
                                <textarea name="group_goal_about" maxlength="150" class="form-control" placeholder="This is <?php echo $group['group_name']; ?>'s goal. Describe it here." id="group_goal_about"></textarea>
                            </div>
                            <div class="col-sm-2">
                                <p><p id="group_goal_about_char">150</p></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <!-- White space -->
                            </div>
                            <div class="col-sm-4">
                                <p id="group_goal_char_remaining" class="hidden">Please describe your goal in 150 characters or less.</p>
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="group_goal_steps" class="col-sm-2 control-label">
                                Steps:
                            </label>
                            <p class="col-sm-10">Please describe what you need to do for each step to achieve your goal. (These are optional. Fill in as many as you want.) Make the desrciptions short.</p>
                        </div>
                        <br>

                        <!-- Goal % -->


                        <div class="form-group">

                            <div class="col-sm-4">
                                10%: <input type="text" name="group_goal_10" id="group_goal_10" class="form-control" maxlength="20" placeholder="Step 1."/>
                            </div>
                            <div class="col-sm-4">
                                20%: <input type="text" name="group_goal_20" id="group_goal_20" class="form-control" maxlength="20" placeholder="Step 2."/>
                            </div>
                            <div class="col-sm-4">
                                30%: <input type="text" name="group_goal_30" id="group_goal_30" class="form-control" maxlength="20" placeholder="Step 3."/>
                            </div>

                            <div class="col-sm-4">
                                40%: <input type="text" name="group_goal_40" id="group_goal_40" class="form-control" maxlength="20" placeholder="Step 4."/>
                            </div>
                            <div class="col-sm-4">
                                50%: <input type="text" name="group_goal_50" id="group_goal_50" class="form-control" maxlength="20" placeholder="Step 5."/>
                            </div>
                            <div class="col-sm-4">
                                60%: <input type="text" name="group_goal_60" id="group_goal_60" class="form-control" maxlength="20" placeholder="Step 6."/>
                            </div>


                            <div class="col-sm-4">
                                70%: <input type="text" name="group_goal_70" id="group_goal_70" class="form-control" maxlength="20" placeholder="Step 7."/>
                            </div>
                            <div class="col-sm-4">
                                80%: <input type="text" name="group_goal_80" id="group_goal_80" class="form-control" maxlength="20" placeholder="Step 8."/>
                            </div>
                            <div class="col-sm-4">
                                90%: <input type="text" name="group_goal_90" id="group_goal_90" class="form-control" maxlength="20" placeholder="Step 9."/>
                            </div>
                            <div class="col-sm-4">
                                100%: <input type="text" name="group_goal_100" id="group_goal_100" class="form-control" maxlength="20" placeholder="Step 10."/>
                            </div>
                            <div class="col-sm-4">
                                <p class="goal_update_per_char" id="group_goal_update_per_char">20</p>
                            </div>

                            <div class="col-sm-12 goal_per">
                                % complete:
                                <input type="range" min="0" max="100" step="10" value="0" name="group_goal_per_completed" id="group_goal_per_completed"/>
                                <span id="group_goal_per_value"></span>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="group_goal_user_id" value="<?php echo $user_id; ?>">
                    <input type="hidden" class="timestamp" name="group_goal_time"/>
                    <input type="hidden" name="group_goal_group_id" value="<?php echo htmlspecialchars($group['id']); ?>"/>
                    <input type="hidden" name="token" value="<?php echo $csrf_token; ?>">
                    <div class="modal-footer">
                        <a class="btn btn-default" data-dismiss="modal">Close</a>
                        <input type="submit" class="btn btn-primary" value="Create" id="group_goal_create"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
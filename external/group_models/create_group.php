<div class="modal fade" id="create_group" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#">
                <div class="form-horizontal" role="form">
                    <div class="modal-header">
                        <h4>Create group</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="group_type_label" id="group_create_type_label">
                                    Type:
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control" name="group_create_type" id="group_create_type">
                                    <option>Fitness</option>
                                    <option>Career</option>
                                    <option>Education</option>
                                    <option id="group_type_more">More</option>
                                </select>
                                <br>
                                <div id="g_type_more" class="hidden">
                                    <p class="help-block">Please enter your group type below:</p>
                                    <input class="form-control" type="text" name="group_create_type_more" placeholder="Group type"/>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <p>Please choose a group type.</p>
                            </div>

                        </div>
                        <br>

                        <div class="form-group">
                            <label for="group_name" class="col-sm-2 control-label">
                                Name:
                            </label>
                            <div class="col-sm-4">
                                <input type="text" name="group_create_name" id="group_create_name" maxlength="40" class="form-control" placeholder="Group name"/>
                            </div>
                            <div class="col-sm-2">
                                <p><p id="group_name_char"></p></p>
                            </div>
                            <div class="col-sm-4">

                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="group_create_city_town_village" class="col-sm-2 control-label">
                                City/Town:
                            </label>
                            <div class="col-sm-8">
                                <input name="group_create_city_town_village" maxlength="255" class="form-control" placeholder="Groupville." id="group_create_city_town_village"/>
                            </div>
                            <div class="col-sm-2">
                                <p><p id="group_city_town_village_char"></p></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="group_city_town_village" class="col-sm-2 control-label">

                            </label>
                            <div class="col-sm-8">
                                <div class="form-group col-sm-6">
                                    <label for="sel1">Country:</label>
                                    <select id="group_create_country" name = "group_create_country" class="form-control"></select>
                                    <input type="hidden" id="group_create_country_hidden">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="county" class="form_push_left">State:</label><br>
                                    <select name = "group_create_state" id = "group_create_state" class="form-control form_push_left"></select>
                                    <input type="hidden" id="group_create_state_hidden">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">
                                <!-- White space -->
                            </div>
                            <div class="col-sm-4">

                            </div>
                        </div>
                        <br>
                    </div>

                    <input type="hidden" name="group_create_user_id" value="<?php echo $user_id; ?>"/>
                    <input type="hidden" class="timestamp" name="group_create_time"/>
                    <input type="hidden" name="group_create_token" value="<?php echo $csrf_token; ?>"/>
                    <div class="modal-footer">
                        <a class="btn btn-default" data-dismiss="modal">Close</a>
                        <input type="submit" class="btn btn-primary" value="Create" id="group_create_submit"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
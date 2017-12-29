<div class="modal fade" id="update_group_info" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="form-horizontal" role="form">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="modal-header">
                                <h4>Update <?php echo htmlspecialchars($group['group_name']); ?></h4>
                            </div>
                            <div class="col-sm-1">
                                <!--White space-->
                            </div>

                            <div class="col-sm-10 update_user_info">
                                <form action='<?php echo 'profile_template_group.php?group_id='.htmlspecialchars($group['id']); ?>' enctype="multipart/form-data" method='post'>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group username_update">
                                                <label for="group_update_type" class="col-sm-2 control-label">
                                                    Type:
                                                </label>
                                                <select class="form-control" name="group_update_type" id="group_update_type">
                                                    <option>Fitness</option>
                                                    <option>Career</option>
                                                    <option>Education</option>
                                                    <option id="group_update_type_more" selected>More</option>
                                                </select>
                                                <br>
                                                <div id="g_update_type_more">
                                                    <p class="help-block">Please enter your group type below:</p>
                                                    <input class="form-control" type="text" id="group_update_type_more" max="20" name="group_update_type_more" placeholder="Group type" value="<?php echo htmlspecialchars($group['group_type']); ?>"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="group_update_name" class="col-sm-2 control-label">
                                                Name:
                                            </label>
                                            <input type="text" id="group_update_name" name="group_update_name" value="<?php echo htmlspecialchars($group['group_name']); ?>" class="form-control"/>
                                        </div>
                                        <div class="col-sm-2">
                                            <p id="group_info_update_char" class="group_info_update_char"></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- white space -->
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="group_update_about">About: </label>
                                        <textarea id="group_update_about" name="group_update_about" class="form-control about_update" rows="5" maxlength="250"><?php echo htmlspecialchars($group['about']); ?></textarea>
                                    </div>

                                    <hr />
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="group_update_country">Country:</label>
                                            <select id="group_update_country" name ="group_update_country" class="form-control"></select>
                                            <input type="hidden" id="group_update_country_edit_hidden" value="<?php echo htmlspecialchars($group['country']); ?>">
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="group_update_state" class="form_push_left">State:</label><br>
                                            <select name ="group_update_state" id ="group_update_state" class="form-control form_push_left"></select>
                                            <input type="hidden" id="group_state_edit_hidden" value="<?php echo htmlspecialchars($group['state']); ?>">
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="group_address_update">City/Town:: </label>
                                            <input type="text" class="form-control" id="group_address_update" name="group_address_update" maxlength="100" value="<?php echo htmlspecialchars($group['city_town_village']); ?>">
                                        </div>
                                    </div>

                                    <hr />

                                    <div class="row">
                                        <div class="form-group col-sm-5">
                                            <label for="group_profile_pic_update">Upload profile picture: </label>
                                            <span class="glyphicon glyphicon-camera" aria-hidden="true" onclick="upload_image('#group_profile_pic_update')"></span>
                                            <p id="group_profile_pic_update_name"></p>
                                            <input class="hidden" type="file" id="group_profile_pic_update" name="group_profile_pic_update" maxlength="30">
                                        </div>

                                        <div class="form-group col-sm-5">
                                            <label for="group_cover_pic_update">Upload cover picture: </label>
                                            <span class="glyphicon glyphicon-camera" aria-hidden="true" onclick="upload_image('#group_cover_pic_update')"></span>
                                            <p id="group_cover_pic_update_name"></p>
                                            <input class="hidden" type="file" id="group_cover_pic_update" name="group_cover_pic_update" maxlength="100">
                                        </div>
                                    </div>
                                    <input type="hidden" name="group_id_update" value="<?php echo htmlspecialchars($group['id']); ?>"/>
                                    <input type="hidden" class="timestamp" name="group_time_update"/>
                                    <input type="hidden" name="group_update_user_id" value="<?php echo $user_id; ?>"/>
                                    <input type="hidden" name="token" value="<?php echo $csrf_token; ?>"/>
                                    <hr />

                                    <div class="form-group">
                                        <input type="submit" id="group_submit_update" value="Update" class="btn btn-success"/>
                                    </div>

                                </form>
                            </div>

                            <div class="col-sm-1">
                                <!--White space-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
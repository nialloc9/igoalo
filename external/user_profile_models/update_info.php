<div class="modal fade" id="update_user_info" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="form-horizontal" role="form">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="modal-header">
                                <h4>All about me</h4>
                            </div>
                        <div class="col-sm-1">
                            <!--White space-->
                        </div>

                        <div class="col-sm-10 update_user_info">
                            <form action='<?php echo 'profile_template_user.php?page_id='.$page_id; ?>' enctype="multipart/form-data" method='post'>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group username_update">
                                            <label for="username">Username: </label>
                                            <input type="text" class="form-control" id="username_update" name="username_update" value="<?php echo htmlspecialchars($user_info[0][0]->username); ?>" maxlength="30">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <p id="user_about_update_char" class="user_info_update_char"></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- white space -->
                                    </div>
                                </div>


                                <hr>
                                <!--
                                <div class="form-group">
                                    <label for="about">About: </label>
                                    <textarea id="about_update" name="about_update" class="form-control about_update" rows="5" maxlength="250"><?php echo htmlspecialchars($user_info[0][0]->about); ?></textarea>
                                </div>


                                -->

                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="password">Password: </label>
                                        <input type="password" class="form-control" id="password_old" name="password_old" maxlength="15">
                                    </div>
                                    <div class="col-sm-2">
                                        <p id="password_area_char_remaining" class="user_info_update_char"></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="password">New password: </label>
                                        <input type="password" class="form-control" id="password_new" name="password_new" maxlength="15">
                                    </div>

                                    <div class="form-group col-sm-6 form_push_left">
                                        <label for="password_again" class="form_push_left">Password again: </label>
                                        <input type="password" class="form-control form_push_left" id="password_new_again" name="password_new_again" maxlength="15">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="firstname">Firstname: </label>
                                        <input type="text" class="form-control" id="firstname_update" name="firstname_update" maxlength="40" value="<?php echo htmlspecialchars($user_info[0][0]->firstname); ?>">
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="surname" class="form_push_left">Surname: </label>
                                        <input type="text" class="form-control form_push_left" id="surname_update" name="surname_update" maxlength="40" value="<?php echo htmlspecialchars($user_info[0][0]->surname); ?>">
                                    </div>
                                </div>

                                <div class="row age_input">
                                    <div class="form-group col-sm-6">
                                        <div class="form-group row">
                                            <label for="date">Age: &nbsp; (DD/MM/YY)<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></label><br>
                                            <input type="text" class="form-control age_input_width" id="date" name="age_update" value="<?php echo htmlspecialchars($user_info[0][0]->age); ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <p id="first_last_age_char_remaining" class="user_info_update_char"></p>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="radio">
                                        <label class="radio-inline"><input type="radio" name="gender_update" value="male" <?php if(htmlspecialchars($user_info[0][0]->gender) == 'male'){echo 'checked';} ?>>Male</label>
                                        <label class="radio-inline"><input type="radio" name="gender_update" value="female" <?php if(htmlspecialchars($user_info[0][0]->gender) == 'female'){echo 'checked';} ?>>Female</label>
                                    </div>
                                </div>

                                <hr />
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="sel1">Country:</label>
                                        <select id="country_update" name ="country_update" class="form-control"></select>
                                        <input type="hidden" id="country_edit_hidden" value="<?php echo htmlspecialchars($user_info[0][0]->country); ?>">
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="county" class="form_push_left">State:</label><br>
                                        <select name ="state_update" id ="state" class="form-control form_push_left"></select>
                                        <input type="hidden" id="state_edit_hidden" value="<?php echo htmlspecialchars($user_info[0][0]->state); ?>">
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="add">Address: </label>
                                        <input type="text" class="form-control" id="address_update" name="address_update" maxlength="100" value="<?php echo htmlspecialchars($user_info[0][0]->address); ?>">
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="post_code" class="form_push_left">Post Code(Optional): </label>
                                        <input type="text" class="form-control form_push_left" id="post_update" name="post_update" maxlength="15" value="<?php echo htmlspecialchars($user_info[0][0]->post); ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="phone_number">Phone Number(Optional): </label>
                                        <input type="text" class="form-control" id="phone_update" name="phone_update" maxlength="30" value="<?php echo htmlspecialchars($user_info[0][0]->phone); ?>">
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="email_address" class="form_push_left">Email: </label>
                                        <input type="email" class="form-control form_push_left" id="email_update" name="email_update" maxlength="100" value="<?php echo htmlspecialchars($user_info[0][0]->email); ?>">
                                    </div>
                                </div>

                                <hr />

                                <div class="row">
                                    <div class="form-group col-sm-5">
                                        <label for="profile_pic_update">Upload profile picture: </label><br>
                                        <span class="glyphicon glyphicon-camera" aria-hidden="true" onclick="upload_image('#profile_pic_update')"></span>
                                        <p id="profile_pic_update_name"></p>
                                        <input class="hidden" type="file" id="profile_pic_update" name="profile_pic_update" maxlength="30">
                                    </div>

                                    <div class="form-group col-sm-5">
                                        <label for="cover_pic_update">Upload cover picture: </label><br>
                                        <span class="glyphicon glyphicon-camera" aria-hidden="true" onclick="upload_image('#cover_pic_update')"></span>
                                        <p id="cover_pic_update_name"></p>
                                        <input class="hidden" type="file" id="cover_pic_update" name="cover_pic_update" maxlength="100">
                                    </div>
                                </div>
                                <input type="hidden" name="user_id_update" value="<?php echo htmlspecialchars($user_info[0][0]->id); ?>"/>
                                <input class="timestamp" type="hidden" name="time_update"/>
                                <input type="hidden" name="token" value="<?php echo $csrf_token; ?>"
                                <hr />

                                <div class="form-group">
                                    <input type="submit" id="submit_update" value="Update" class="btn btn-success"/>
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
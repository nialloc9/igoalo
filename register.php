<?php
require_once 'header.inc.php';
require_once 'controllers/controller_mods/user.php';
require_once 'controllers/controller_mods/token.php';
require_once 'external/generateCapchaImage.inc.php';
require_once 'controllers/register_controller.php';
?>
<!DOCTYPE html>
<html>
<header>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/custom.css"/>

    <?php $csrf_token = token::generate(); ?>
</header>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-1">
            <!--White space-->
        </div>
        <?php if(!loggedin()): ?>
            <div class="col-sm-10">
                <p class="info_block_negative"><?php if(isset($error)){echo $error;} ?></p>
                <p class="info_block_success"><?php if(isset($success_message)){echo $success_message;} ?></p>
                <form  id="g" action='<?php echo $current_file; ?>' method='post'>
                    <div class="form-group">
                        <label for="username">Username: </label><p class="register_char_remaining" id="char_username"></p><p class="info_block_negative" id="username_check"></p>
                        <input type="text" class="required_input form-control" id="username_register" name="username_register" maxlength="30" placeholder="Username123" value="<?php if(isset($username)){echo $username;} ?>">
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="password">Password: <p class="register_char_remaining" id="char_pass"> <p class="info_block_negative hidden" id="password_info"> Passwords cannot be empty and must match.</p></label><p class="register_char_remaining" id="char_pass"></p>
                            <input type="password" class="required_input form-control" id="password_register" name="password_register" maxlength="20" placeholder="********">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="password_again">Password again: </label><p class="register_char_remaining"  id="char_pass_again"></p>
                            <input type="password" class="required_input form-control" id="password_register_again" name="password_register_again" maxlength="20" placeholder="********">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="firstname">Firstname: </label><p class="register_char_remaining"  id="char_first"></p>
                            <input type="text" class="required_input form-control" id="firstname" name="firstname" maxlength="40" placeholder="John" value="<?php if(isset($firstname)){echo $firstname;} ?>">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="surname">Surname: </label><p class="register_char_remaining" id="char_sur"></p>
                            <input type="text" class="required_input form-control" id="surname" name="surname" maxlength="40" placeholder="Smith" value="<?php if(isset($surname)){echo $surname;} ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="date">Age: &nbsp; (DD/MM/YY)<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></label><br>
                            <input type="text" class="required_input form-control age_input_width" id="date" name="age" placeholder="00/00/0000" value="<?php if(isset($age)){echo $age;} ?>"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="radio">
                            <label class="radio-inline"><input class="required_input" type="radio" id="male" value="male" name="gender" <?php if(isset($gender) && $gender == 'male'){echo 'checked';} ?>>Male</label>
                            <label class="radio-inline"><input class="required_input" type="radio" id="female" value="female" name="gender" <?php if(isset($gender) && $gender == 'female'){echo 'checked';} ?>>Female</label>
                            <input type="hidden" id="gener_hidden"/>
                        </div>

                    </div>

                    <hr />
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="sel1">Country:</label>
                            <select id="country" name="country" class="required_input form-control"></select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="state">State:</label><br>
                            <select id="state" name="state" class="required_input form-control"></select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="add">Address: </label><p class="register_char_remaining"  id="char_add"></p>
                            <input type="text" class="required_input form-control" id="address" name="address" maxlength="100" placeholder="Village/Town/City" value="<?php if(isset($address)){echo $address;} ?>">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="post_code">Post Code(Optional): </label><p class="register_char_remaining" id="char_post"></p>
                            <input type="text" class="form-control" id="post" name="post" maxlength="15" placeholder="000-000" value="<?php if(isset($post)){echo $post;} ?>">
                        </div>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="phone_number">Phone Number(Optional): </label><p class="register_char_remaining" id="char_phone"></p>
                            <input type="text" class="form-control" id="phone" name="phone" maxlength="30" placeholder="000-000-0000" value="<?php if(isset($num)){echo $num;} ?>">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="email_address">Email: </label><p class="info_block_negative hidden" id="email_check">An account is already using that email address.</p>
                            <input type="email" class="required_input form-control" id="email" name="email" maxlength="100" placeholder="example@example.com" value="<?php if(isset($email)){echo $email;} ?>">
                        </div>
                    </div>

                    <hr />


                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="capctha">Please write the number below: </label><br>
                            <img src="external/generateCapchaImage.php" alt="security code" class="thumbnail thumb" width="50%"/>
                            <input type="text" size="6" name="copchaImage" class="required_input form-control" id="copcha-image"/>
                        </div>
                    </div>

                    <input type="hidden" name="token" value="<?php echo $csrf_token; ?>"/>
                    <label for="checkbox">I agree to the terms and conditions of use. <a href="tac.php">T & C</a> </label>
                    <input type ='checkbox' name="checkbox" value="agree" id="checkbox" class="required_input"/><br>

                    <input class="timestamp" type="hidden" name="time">
                    <div class="form-group">
                        <input type="submit" id="register_submit" value="Start my journey" class="btn btn-success"/>
                    </div>

                </form>
            </div>
        <?php endif; ?>
        <div class="col-sm-1">
            <!--White space-->
        </div>
    </div>
</div>

</body>
</html>
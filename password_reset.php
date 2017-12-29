<?php
require 'header.inc.php';

require_once 'controllers/password_reset.php';
$csrf_token = token::generate();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <title></title>
    <!-- Forgotton password custom CSS -->
    <link rel="stylesheet" href="css/forgotton_pass.css">
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>Reset your password below: </h1>
        <div class="fp_form_wrapper">
            <form action="#" method="post">
                <div class="col-sm-12">
                    <br>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="form-group col-sm-6">
                                <label for="password">Password: <p class="register_char_remaining" id="char_pass"> <p class="info_block_negative hidden" id="password_info"> Passwords cannot be empty and must match.</p></label><p class="register_char_remaining" id="char_pass"></p>
                                <input type="password" class="required_input form-control" id="password_register" name="password_reset" maxlength="20" placeholder="********">
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="password_again">Password again: </label><p class="register_char_remaining"  id="char_pass_again"></p>
                                <input type="password" class="required_input form-control" id="password_register_again" name="password_reset_again" maxlength="20" placeholder="********">
                            </div>
                            <input type="submit" id="fp_submit" value="Reset my password" class="btn btn-success"/>
                            <?php if(isset($error) && !empty($error)): ?>
                                <p class="alert_message"><?php echo $error; ?></p>
                            <?php elseif(isset($success_message) && !empty($success_message)): ?>
                                <p class="success_message"><?php echo $success_message; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <input class="timestamp" type="hidden" name="time">
                <input type="hidden" name="token" value="<?php echo $csrf_token; ?>"/>
            </form>
        </div>
    </div>
</div>
<div class="footer_wrapper">
    <?php include 'footer.inc.html'; ?>
</div>
</body>
</html>
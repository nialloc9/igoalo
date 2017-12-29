<?php
require 'header.inc.php';

require_once 'controllers/forgotton_pass_controller.php';
$csrf_token = token::generate();
require_once 'external/generateCapchaImage.inc.php';
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
        <h1>Dude where's my password?</h1>
        <div class="fp_form_wrapper">
            <form action="#" method="post">
                <div class="col-sm-12">
                    <br>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="fp_username">Username:
                            <input type="text" class="fp_username form-control" id="fp_username" name="fp_username" placeholder="myusername">
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="fp_email">Email: </label>
                            <input type="email" class="fp_email form-control" id="fp_email" name="fp_email" placeholder="example@example.com">
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="capctha">Please write the number below: </label><br>
                            <img src="external/generateCapchaImage.php" alt="security code" class="thumbnail thumb fp_captchat_image"/>
                            <input type="text" size="6" name="copchaImage" class="form-control fp_copthca_input" id="copcha-image"/><br>
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
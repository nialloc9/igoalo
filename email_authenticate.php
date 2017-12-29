<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <title></title>
    <!-- Forgotton password custom CSS -->
    <meta charset="UTF-8">
    <!-- META TAGS -->
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="keywords" content="www.igoalo.com, igoalo.com, igoalo, social network, Niall, O Connor, social, network, goal, goal social, goals, goals social, goal social network, igoalo social network, goal social network, goals social network, OCWebtech, Technology, IT, Brosna, Kerry, Munster, Ireland, ocwebtech, ocwebtech.com, niall, target, targets, target social network, dreams, plan, plans, dream, want, wants, idea, ideas, group, groups, group, group social, group social network, igoalosocial, igoalosocialnetwork, share, yeongwol, gangwon, gangwon-do, korea, south, korea, south korea">
    <meta property="og:title" content="Where dreams become reality." />
    <meta property="og:description" content="iGoalo is a place for people who dream. Here you will meet people who share your goals and together they will become a reality." />
    <meta property="og:image" content="images/logo.png" />

    <?php
    require 'header.inc.php';

    require_once 'controllers/email_auth.php';
    $csrf_token = token::generate();
    ?>
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>Reset your password below: </h1>
        <div class="fp_form_wrapper">
            <form action="<?php echo $current_page; ?>" method="post">
                <div class="col-sm-12">
                    <br>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <input type="submit" id="fp_submit" value="Authenticate" class="btn btn-success"/>
                            <?php if(isset($error) && !empty($error)): ?>
                                <p style="display: inline; font-size: 11px; color: red;font-weight: 400;" class="alert_message"><?php echo $error; ?></p>
                            <?php elseif(isset($success_message) && !empty($success_message)): ?>
                                <p style="display: inline; font-size: 11px; color: green;font-weight: 400;" class="success_message"><?php echo $success_message; ?></p>
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
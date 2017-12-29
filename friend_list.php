<?php
require_once 'external/core.inc.php';
?>
<!DOCTYPE html>
<?php require_once 'header_loggedin.inc.php'; ?>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <title></title>
    <!-- Profile template CSS -->

    <link rel="stylesheet" href="css/profile_template.css">
</head>
<body class='profile_body'">
<div class='container'>
    <div class='row'>
        <?php require_once 'controllers/block_controllers/friend_list_controller.php'; ?>
    </div>
</div>
<input type="hidden" id="auth_id" value="<?php echo $user_id; ?>"/>
</body>
</html>
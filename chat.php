<?php
require_once 'external/core.inc.php';
?>
<!DOCTYPE html>
<?php require_once 'header_loggedin.inc.php'; ?>

<?php

$user_profile_img = User::getUserProfileImage(htmlspecialchars($user['profile_image_upload_location']));

Chat::remove_chat_not($user_id, $time, $db);
?>

<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <title></title>
    <!-- Profile template CSS -->

    <link rel="stylesheet" href="css/chat.css">
    <script type="text/javascript" src="js/chat/chat.js"></script>
    <script type="text/javascript">
        $(".chat_friend_search").keyup(function (e) {
            if (e.keyCode == 13) {
                alert('4223');
            }
        });


    </script>
</head>

<body class='profile_body'">
<div class='container'>
    <div class='row'>
        <div class='col-sm-3 friend_list_chat_area' id="chat_friend_search">
                <input type="text" class="friend_list_chat_search" id="chat_friend_search_input" placeholder="Enter friends name..">
                <input type="hidden" value="<?php echo $user_id; ?>" id="chat_friend_search_auth_id"/>
                <div id="chat_avail">
                    <?php require_once 'controllers/block_controllers/chat/chat_list_controller.php'; ?>
                </div>
        </div>

        <div class="col-sm-5 chat_area">
            <div id="ajax_get"><?php require 'external/chat/chatbox.php'; ?></div>
            <div class="message_area">
                <div id="new_message_area"></div>
                <div id="message_area"></div>
            </div>
        </div>
    </div>
</div>
<input type="text" id="hidden_csrf_token" value="<?php echo $csrf_token; ?>"/>
</body>
</html>
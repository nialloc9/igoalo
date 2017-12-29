<?php
require_once 'controllers/controller_mods/token.php';


//id's
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    $user_id=$_SESSION['user_id'];
}

if(isset($_GET['page_id'])){
    $page_id = $_GET['page_id'];
}

if(isset($_GET['group_id'])){
    $group_id = $_GET['group_id'];
}

require_once 'controllers/authenticate.php';


if(isset($_GET['search'])  && !empty($_GET['search'])){
    $_SESSION['search'] = $_GET['search'];
}


//Search functions (not class)
require_once 'controllers/controller_mods/search.php';

//Auth
require_once 'controllers/authenticate.php';

//Controllers
require_once 'controllers/controller_mods/user.php';
require_once 'controllers/controller_mods/status.php';
require_once 'controllers/controller_mods/like.php';
require_once 'controllers/controller_mods/goal.php';
require_once 'controllers/controller_mods/files.php';
require_once 'controllers/controller_mods/groups.php';
require_once 'controllers/controller_mods/notifications.php';
require_once 'controllers/controller_mods/recommend.php';
require_once 'controllers/controller_mods/chat.php';

require_once 'controllers/block_controllers/post_block_controller.php';

//Friends

require_once 'controllers/block_controllers/friend_button_controller.php';
require_once 'controllers/model_controllers/user_update_info_controller.php';

//Goals controller
require_once 'controllers/model_controllers/goal_create_update_delete_controller.php';

//Status controllers
require_once 'ajax/ajax_resources/ajax_status_replyblock_controller.php';
require_once 'controllers/status_edit_controller.php';
require_once 'controllers/model_controllers/user_status_image_upload_controller.php';
require_once 'controllers/model_controllers/group/group_status_image_upload_controller.php';
//Group controllers
require_once 'controllers/model_controllers/group_create_update_delete_controller.php';
require_once 'controllers/model_controllers/group/group_update_info_modal_controller.php';
require_once 'controllers/block_controllers/group/member_button_controller.php';

//Search
require_once 'controllers/search_controller.php';

//Smileys
require_once 'controllers/smiley.php';

//logout
require_once 'controllers/model_controllers/logout_modal_controller.php';
$csrf_token = Token::generate();



$firstname = User::get_firstname($_SESSION['user_id'], $db);
?>

<!DOCTYPE html>
<link rel="icon" type="image/ico" href="images/logo.png">
<html lang="en">
<head>
        <meta charset="UTF-8">
        <!-- META TAGS -->
        <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1">
        <meta charset="UTF-8">
        <meta name="keywords" content="www.igoalo.com, igoalo.com, igoalo, social network, Niall, O Connor, social, network, goal, goal social, goals, goals social, goal social network, igoalo social network, goal social network, goals social network, OCWebtech, Technology, IT, Brosna, Kerry, Munster, Ireland, ocwebtech, ocwebtech.com, niall, target, targets, target social network, dreams, plan, plans, dream, want, wants, idea, ideas, group, groups, group, group social, group social network, igoalosocial, igoalosocialnetwork, share, yeongwol, gangwon, gangwon-do, korea, south, korea, south korea">
        <meta property="og:title" content="Where dreams become reality." />
        <meta property="og:description" content="iGoalo is a place for people who dream. Here you will meet people who share your goals and together they will become a reality." />
        <meta property="og:image" content="images/logo.png" />
        <title>iGoalo</title>

        <title></title>

        <script type="text/javascript" src="js/jquery.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

        <!-- Awesome font -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!-- Google open-sans font style -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

        <!-- Google Oswald font style.-->
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/custom.css">

        <!-- Userblock CSS -->
        <link rel="stylesheet" href="css/userblock.css">

        <!-- Statusblock CSS -->
        <link rel="stylesheet" href="css/statusblock.css">

        <!-- Goal area CSS -->
        <link rel="stylesheet" type="text/css" href= "css/goal_area.css">

        <!-- JQuery UI datepicker -->
        <link href="datepicker/jquery-ui.css" rel="stylesheet">
        <link href="datepicker/jquery-ui.theme.min.css" rel="stylesheet">
        <link href="css/datepicker_change.css" rel="stylesheet">

        <!-- User info update form -->
        <link href="css/user_info_edit.css" rel="stylesheet">

        <!-- Groupblock -->
        <link href="css/groupblock.css" rel="stylesheet">

        <!-- Notifications -->
        <link href="css/notifications.css" rel="stylesheet">

        <!-- Home -->
        <link href="css/home.css" rel="stylesheet">
        <!-- Friend block styling (most taken from userblock.css) -->

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

        <!-- General -->
        <script type="text/javascript" src="js/general.js"></script>
        <script type="text/javascript" src="js/time.js"></script>

        <script type="text/javascript" src="js/input_validation.js"></script>

        <script type="text/javascript" src="js/char_remaining.js"></script>

        <script type="text/javascript" src="js/status_delete.js"></script>

        <script type="text/javascript" src="js/status_edit.js"></script>

        <script type="text/javascript" src="js/status_insert.js"></script>

        <script type="text/javascript" src="js/reply_insert.js"></script>

        <script type="text/javascript" src="js/more_replies.js"></script>

        <script type="text/javascript" src="js/like.js"></script>

        <script type="text/javascript" src="js/page_redirect.js"></script>

        <script type="text/javascript" src="js/goal.js"></script>

        <script type="text/javascript" src="js/goal_update_model.js"></script>

        <script type="text/javascript" src="js/status_show.js"></script>

        <script type= "text/javascript" src = "country_state_picker/countries.js"></script>

        <script type="text/javascript" src="js/update_user_info.js"></script>
        <!-- JQuery UI datepicker -->
        <script src="datepicker/external/jquery/jquery.js"></script>
        <script src="datepicker/jquery-ui.js"></script>
        <script type="text/javascript" src="js/datepicker.js"></script>

        <!-- Groups -->
        <script type="text/javascript" src="js/group_create.js"></script>
        <script type="text/javascript" src="js/group_status_insert.js"></script>
        <script type="text/javascript" src="js/member_delete.js"></script>

        <!-- Notification nav bar controller -->
        <script type="text/javascript" src="js/check_user_notification.js"></script>

        <!-- Notification block -->
        <script type="text/javascript" src="js/notification_block.js"></script>

        <!-- goal create -->
        <script type="text/javascript" src="js/goal_create.js"></script>



	<?php	
	//Goals
	
	
	require_once 'external/goal_models/goal_create_model.php';
	
	require_once 'external/goal_models/goal_update_model.php';
	
	require_once 'external/goal_models/goal_delete_model.php';
	
	require_once 'external/goal_models/more_goals_modal.php';
	
	
	//User Profile
	require_once 'external/user_profile_models/update_info.php';
	
	require_once 'external/post_block_models/upload_image_status.php';
	
	//Groups
	require_once 'external/group_models/create_group.php';
	
	//Logout
	require_once 'external/modals.php';
	
	//Notifications
	require_once 'controllers/navbar_notification_controller.php';
	
	//Chat
	require_once 'controllers/navbar_chat_controller.php';
	
	?>
</head>
<body>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle <?php echo $header_icon_bar_border; ?>" data-toggle="collapse" data-target=".navbar-collapse" id="header_icon_bar_button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar header_icon_bar <?php echo $header_icon_bar; ?>" id="header_icon_bar"></span>
                <span class="icon-bar header_icon_bar <?php echo $header_icon_bar; ?>" id="header_icon_bar2"></span>
                <span class="icon-bar header_icon_bar <?php echo $header_icon_bar; ?>" id="header_icon_bar3"></span>
            </button>

            <a href='<?php echo 'home.php?page_id='.$user_id; ?>'><img class="logo" src="images/logo.png" width="50" height="50"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo 'profile_template_user.php?page_id='.$user_id; ?>"><?php echo htmlspecialchars($firstname['firstname']); ?></a></li>
                <li><a href="<?php echo 'home.php?page_id='.$user_id; ?>">Home</a></li>
                <li>
                    <a href="notifications.php"><i class="fa fa-dot-circle-o <?php echo $notification_status_class; ?>" aria-hidden="true" id="user_not_icon"></i></a>
                </li>
                <li>
                    <a href="chat.php"><i class="fa fa-comment-o <?php echo $chat_status_class; ?>" aria-hidden="true" id="chat_icon"></i></i></a>
                </li>
                <li>
                    <form method="GET" class="navbar-form navbar-left" role="search" action="">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Find people or groups">
                            <input type="hidden" name="token" value="<?php echo $csrf_token; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#logout" data-toggle='modal'><span class="fa fa-sign-out"></span> Log out</a></li>
            </ul>
        </div>
    </div>
</div>





</body>
</html>
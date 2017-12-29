<?php
require 'external/login.inc.php';
require_once 'controllers/controller_mods/goal.php';
require_once 'controllers/controller_mods/groups.php';
require_once 'controllers/controller_mods/user.php';
require_once 'controllers/controller_mods/token.php';

if(loggedin()){
    header('Location: home.php');
}
$csrf_token = token::generate();
?>
<!DOCTYPE html>
<link rel="icon" type="image/ico" href="images/logo.png">
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

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

        <!-- General -->
        <script type="text/javascript" src="js/time.js"></script>

	<?php require_once 'external/main_page_modals/login.php'; ?>

</head>
<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href='index.php'><img class="logo" src="images/logo.png" width="50" height="50"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="community.php">Community</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">About<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="our_goals.php">Our goals</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="tac.php">T & C</a></li>
                    </ul>
                </li>
                <li><a href="#contact" data-toggle="modal">Contact</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#login" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>




    </div>
</div>
</body>
</html>
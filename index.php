<?php include 'controllers/index_includes_controller.php';?>
<!DOCTYPE html>
<html lang="en">
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
    <?php
        $csrf_token = Token::generate();
        require_once 'external/main_page_modals/login.php';
        //Check if user is already loggedin
        if(loggedin()){
            header('Location: home.php?page_id='.$_SESSION['user_id']);
        }
    ?>
</head>
<body>

<div class="row index_first_block">
    <div class="col-sm-2">
        <div class="index_first_block_nav_wrapper">
            <div class="index_first_block_nav">
                <div class="index_first_block_nav_option">
                    <p class="index_first_block_nav_option_text">
                        <a href="index.php">Home</a>
                    </p>
                </div>
                <div class="index_first_block_nav_option">
                    <p class="index_first_block_nav_option_text">
                        <a href="#login" data-toggle="modal">Login</a>
                    </p>
                </div>
                <div class="index_first_block_nav_option">
                    <p class="index_first_block_nav_option_text">
                        <a href="community.php">Community</a>
                    </p>
                </div>
                <div class="index_first_block_nav_option">
                    <li class="index_first_block_nav_option_text dropdown">
                        <a href="#"  class="dropdown-toggle" data-toggle="dropdown">
                            About
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="our_goals.php">Our goals</a></li>
                            <li><a href="faq.php">FAQ</a></li>
                            <li><a href="tac.php">T & C</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <img class="index_first_block_logo" src="images/logo.png"/>

        <div class="index_first_block_message">
            Welcome to the next step.
        </div>
    </div>
	

    <div class="col-sm-4 index_first_right_block">
        <form method="get">
            <div class="index_first_right_block_text_input_wrapper">
                <input type="text" class="form-control" name="firstname" placeholder="John" value="<?php if(isset($firstname)){echo $firstname;} ?>"/>
            </div>

            <div class="index_first_right_block_text_input_wrapper">
                <input type="text" class="form-control" name="lastname" placeholder="Smith" value="<?php if(isset($lastname)){echo $lastname;} ?>"/>
            </div>

            <br>
            <div class="index_first_right_block_text_input_wrapper">
                <input type="email" class="form-control" name="email" placeholder="example@example.com" value="<?php if(isset($email)){echo $email;} ?>"/>
            </div>

            <div class="index_first_right_block_button_input_wrapper">
                <input type="submit" class="btn btn-primary index_first_right_sub" value="Take the next step"/>
            </div>
        </form>
    </div>
</div>
<div class="row index_second_block">
    <div class="col-sm-2">

    </div>

    <div class="col-sm-4">
        <div class="index_second_block_middle">
            <p class="index_second_block_middle_text">
                iGoalo is here for you. Everybody has a goal in life but not everybody fulfills theres. But what if there was somewhere that we could meet people with the same goal? What if we could share ideas and knowledge so that we can all achieve the same goals. This is that place. Using iGoalo's unique functionality we are matching like minded indivduals who share a common goal. It is common knowledge that when faced with a problem many heads are better than one so join the movement of driven people from all over the world and watch your dreams come through.
            </p>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="index_second_block_right">
            <div class="index_second_block_right_counter_box">
                <p class="index_second_block_right_counter_box_text">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Users: <?php echo $user_count; ?>
                </p>
                <p class="index_second_block_right_counter_box_text">
                    <span class="glyphicon glyphicon-record" aria-hidden="true"></span>  Goals: <?php echo $goal_count; ?>
                </p>
                <p class="index_second_block_right_counter_box_text">
                    <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>  Groups: <?php echo $group_count; ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row index_third_block">
    <div class="col-sm-4 index_third_col_one">
        <div class="index_third_block_career">
            <div class="index_third_block_career_image_wrapper">
                <a href="career.php"><img src="images/career.jpg" class="index_third_block_career_image"/></a>
            </div>
            <div class="index_third_block_career_text_wrapper">
                <h5 class="index_third_block_career_text_header">
                    Careers
                </h5>
                <p class="index_third_block_career_text">
                    Together the iGoalo community is working together to help each other with advice and support from our many career oriented groups and users.
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-4 index_third_col_two">
        <div class="index_third_block_career">
            <div class="index_third_block_career_image_wrapper">
                <a href="fitness.php">
                    <img src="images/fitness.jpg" class="index_third_block_career_image"/>
                </a>
            </div>
            <div class="index_third_block_career_text_wrapper">
                <h5 class="index_third_block_career_text_header_middle">
                    Fitness
                </h5>
                <p class="index_third_block_career_text_middle">
                    There is nothing more motivating then being a part of a team. Whether it is just getting into shape or making the starting line-up our sport oriented groups and users have first hand experience to help achieve your goals.
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-4 index_third_col_three">
        <div class="index_third_block_career">
            <div class="index_third_block_career_image_wrapper">
                <a href="education.php">
                    <img src="images/education.jpg" class="index_third_block_career_image"/>
                </a>
            </div>
            <div class="index_third_block_career_text_wrapper">
                <h5 class="index_third_block_career_text_header">
                    Education
                </h5>
                <p class="index_third_block_career_text">
                    Here at iGoalo our users goals to further there education has led to groups and users specifically dedicatiated to helping to further our education goals.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row index_fourth_block">
    <div class="index_fourth_block_block">
        Copyright <?php echo date("Y"); ?> igoalo.com
        <br>
        An <a href="http://www.ocwebtech.com/">OCWebTech</a> Creation
    </div>
</div>
</body>
</html>
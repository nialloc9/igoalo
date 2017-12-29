<?php
    require 'header_community.inc.php';
    require_once 'controllers/community_page_controller.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <title></title>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Our community</h1>
        </div>
        <div class="col-sm-12">
            <!--This the code for the carousel. -->

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="images/group6.jpg" alt="...">
                        <div class="carousel-caption">
                            <h3>Achieving goals together</h3>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/group2.jpg" alt="...">
                    </div>
                    <div class="item">
                        <img src="images/group5.jpg" alt="...">
                    </div>
                    <div class="item">
                        <img src="images/ladder.jpg" alt="...">
                    </div>
                    <div class="item">
                        <img src="images/group7.jpg" alt="...">
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div> <!-- Carousel -->
        </div>

        </div>
    </div>

     <div class="container">
            <div class="col-sm-12">
                <div class=col-sm-8>
                    <h3>Working toward common goals</h3><br><br>
                    <blockquote><p>Connecting dreams is like building houses. The more people building them the faster we can move in.</p>
                                        <p><small>The iGoalo team.</small></blockquote><br><br>
                    <p>Around the world today there are billions of people who share common goals and want nothing more than to fulfill these dreams. However, even with the internet and
                    modern communications; help, advice, and support can seem distant. Here at iGoalo we are trying to solve these problems by creating a social platform for people to connect
                    with people who share their goals and ambitions in life. <br><br>


                    Our greatest accomplishments and achievements have not come from a single persons goal but from shared goals between like minded people who are all seeking the same thing.
                    At iGoalo we try to connect you with these people through your shared goals. People with shared goals in life are more likely to both achieve their ambitions because they have someone
                    who understands the problems and solutions to the obstacles to acheiving their goals.

                    </p>
                </div>
                <div class="col-sm-4">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">iGoalo</h3>
                                </div>
                                <div class="panel-body bg-grey text-center">
                                    <div class="thumbnail">
                                    <img src="images/logo2.png" alt="Goal" class="img">
                                    <h4>Community</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Our community</h3>
                                </div>
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Users:</td>
                                            <td><?php echo htmlspecialchars($user_count); ?></td>
                                        </tr>
                                    <tr>
                                        <td>Groups</td>
                                        <td><?php echo htmlspecialchars($group_count); ?></td>
                                    </tr>
                                        <tr>
                                            <td>Biggest group</td>
                                            <td><p class="biggest_group_name"><?php echo htmlspecialchars($lg_name); ?></p></td>
                                        </tr>
                                        <tr>
                                            <td>Goals</td>
                                            <td><?php echo htmlspecialchars($goal_count); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Completed goals</td>
                                            <td><?php echo htmlspecialchars($goal_completed_count); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                </div>
                        </div>

    </div>
           </div>


         <div class="modal fade" id="login" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Login</h4>
                        </div>
                        <div class="modal-body">
                            <p>Username: <input type='text' name='username'/></p>
                            <p>Password: <input type='text' name='username'/></p>
                            <p><input type='submit' class='btn btn-success'/></p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" data-dismiss="modal">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div>
    <?php include 'footer.inc.html'; ?>
</div>
</body>
</html>
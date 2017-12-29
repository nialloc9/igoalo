<?php
    require 'header.inc.php';

    require_once 'controllers/education_page_controller.php';
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
            <h1>Education</h1>
        </div>
        <div class="col-sm-8">
            <div class="thumbnail">
                <img src="images/education.jpg" alt="Careers" class='thumbnail thumb'>
                <div class="caption text-center">
                    <a href="register.php" class="btn btn-primary" role="button">Start the journey</a>
                </div>
                <p>Getting that degree? Highschool exams? What ever your goals are. Here you can meet and associate with people who share your ambitions and hopes. Get advice and support to achieve
                your dreams.</p>
                <h3>Our groups</h3>
                <li>Education specific</li>
                <li>Create your own.</li>
                <li>Meet people seeking the same goals</li>
                <li>Find learning tips</li>
                <li>Get advice from those who know</li>
            </div>
        </div>
        <div class="col-sm-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Goal</h3>
                </div>
                <div class="panel-body bg-grey text-center">
                    <div class="thumbnail">
                    <img src="images/logo2.png" alt="Goal" class="img image_group_type">
                    <h4>Education goals</h4>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Education goal numbers</h3>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>Users:</td>
                            <td><?php echo $user_count; ?></td>
                        </tr>
                    <tr>
                        <td>Education groups</td>
                        <td><?php echo $group_count ?></td>
                    </tr>
                        <tr>
                            <td>Biggest group</td>
                            <td><p class="biggest_group_name"><?php echo htmlspecialchars($lg_name); ?></p></td>
                        </tr>
                        <tr>
                            <td>Active goals</td>
                            <td><?php echo $goal_count; ?></td>
                        </tr>
                        <tr>
                            <td>Completed goals</td>
                            <td><?php echo $goal_completed_count; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="contact" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="form-horizontal" role="form">
                    <div class="modal-header">
                        <h4>Contact</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="contact-name" class="col-sm-2 control-label">
                                Name
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="contact-name" placeholder="First & last name"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact-email" class="col-sm-2 control-label">
                                Email
                            </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="contact-email" placeholder="example@domain.com"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact-message" class="col-sm-2 control-label">
                                Name
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                        </div>

                    </div>


                    <div class="modal-footer">
                        <a class="btn btn-default" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
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
                            <p>Username: <input type='text' name='username'/></p>
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
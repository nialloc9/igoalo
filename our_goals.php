<?php
    require_once 'header.inc.php';
    require_once 'controllers/our_goals_controller.php';
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
            <h1>Our Goals</h1>
        </div>
        <div class='row'>
            <div class='col-sm-6'>
            <h3>10,000 goals</h3>
                           <div class="progress">
                               <div class="progress-bar progress-bar-striped active" role="progressbar"
                               aria-valuenow="<?php echo $goal_c; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $goal_c; ?>%">
                               <?php echo $goal_c; ?>%
                                </div>
                                </div>
                                <p>The more goals created the more goals completed. We aim to get our users and groups to succeed so this is our aim.</p><br><br>


                <h3>1,000 users</h3>
                <div class="progress">
                      <div class="progress-bar progress-bar-striped active" role="progressbar"
                      aria-valuenow="<?php echo $user_c; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $user_c; ?>%">
                        <?php echo $user_c; ?>%
                      </div>
                    </div>
                    <p>As our original goal we aim to reach 1,000 users. This is important to us so our users can meet more people with similar goals.</p><br><br>

                <h3>500 groups</h3>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar"
                    aria-valuenow="<?php echo $group_c; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $group_c; ?>%">
                    <?php echo $group_c; ?>%
                    </div>
                    </div>
                    <p>Imagine the potential of 1 group of like minded people. Now multiply that by 500 and that is what we want to achieve.</p><br><br>


            </div>

            <div class='col-sm-1'>
            </div>

            <div class='col-sm-4'>
                <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Goal</h3>
                                </div>
                                <div class="panel-body bg-grey text-center">
                                    <div class="thumbnail">
                                    <img src="images/navbar_logo.jpg" alt="Goal" class="img">
                                    <h4>Our goals</h4>
                                    </div>
                                    <p></p>
                                    <blockquote><p>Here at iGoalo we are striving to create an environment that will help you achieve your ambitions. Whether it is introducing new ideas or upgrading old ones.
                                                   We are doing it with you the user at the center of it all.</p>
                                                   <p><small>The iGoalo team</small></blockquote><br><br>
                                </div>
                            </div>
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
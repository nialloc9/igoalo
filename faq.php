<?php
    require 'header.inc.php';
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
            <h1>F & Q</h1>
        </div>
        <div class='row'>
            <div class='col-sm-12'>


              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapse1">Who is this site for?</a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">This site is for anyone who has any goal that they wish to accomplish. Whether it is personal goal they wish to
                    keep track of or a goal they wish to receive advice and support for. Users can find groups that are dedicated to accomplishing the same or similar
                    goals to their own.</div>

                  </div>
                </div>
              </div><br><br>


                            <div class="panel-group">
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse2">How does it work?</a>
                                  </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                  <div class="panel-body">iGoalo uses it's unique functionality to connect people with the similar goals. We encourage our users to create groups for
                                  members to join based on their goals. iGoalo will recommend these groups then to people who have similar goals.</div>
                                </div>
                              </div>
                            </div><br><br>


                            <div class="panel-group">
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse3">How much does it cost?</a>
                                  </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse">
                                  <div class="panel-body">Free. Totally free. This site was designed to connect people and we firmly believe that our users should not pay to be connected.</div>
                                </div>
                              </div>
                            </div><br><br>

                            <div class="panel-group">
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                      <a data-toggle="collapse" href="#collapse4">How do I find people with the same goals?</a>
                                    </h4>
                                  </div>
                                  <div id="collapse4" class="panel-collapse collapse">
                                    <div class="panel-body">iGoalo will recommend groups to you based on what goals you have made. You don't have to join these but you do
                                    have a choice. You can also search groups based on location or by name.</div>
                                  </div>
                                </div>
                              </div><br><br>

                            <div class="panel-group">
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse5">What if I can't find a group?</a>
                                  </h4>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse">
                                  <div class="panel-body">Why not create your own? Im the iGoalo community we try to empower our users to create groups. If you cannot find a group why not create your own?
                                  If your local soccer team is aiming to win the local league why not create a group for your team where the players can post and can work for the same goals.</div>
                                </div>
                              </div>
                            </div><br><br>

                            <div class="panel-group">
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse6">Who runs the groups?</a>
                                  </h4>
                                </div>
                                <div id="collapse6" class="panel-collapse collapse">
                                  <div class="panel-body">Each group is run by it's members who handle all the actions of the groups.</div>
                                </div>
                              </div>
                            </div><br><br>
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
                            <p>Password: <input type='password' name='password'/></p>
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
<?php
    require 'header.inc.php';
    require_once 'controllers/career_page_controller.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>Careers</h1>
    </div>
    <div class="col-sm-8">
        <div class="thumbnail">
            <img src="images/career.jpg" alt="Careers" class='thumbnail thumb' id="image_group_type">
            <div class="caption text-center">
                <a href="register.php" class="btn btn-primary" role="button">Improve my carreer</a>
            </div>
            <p>Your goals are career oriented? You want to move up the ladder? Here at goal, people like you are meeting and discussing ways to achieve their goals together. Groups dedicated to
                people with similar goals you where advice and information is passed freely.</p>
            <h3>Groups present</h3>
            <li>Industry specific</li>
            <li>Company specific</li>
            <li>Meet fellow professionals</li>
            <li>Find training</li>
            <li>Get advice</li>
        </div>
    </div>
    <div class="col-sm-4">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Goal</h3>
            </div>
            <div class="panel-body bg-grey text-center">
                <div class="thumbnail">
                    <img src="images/logo2.png" alt="Goal" class="img">
                    <h4>Career goals</h4>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Career goal numbers</h3>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <td>Users:</td>
                    <td><?php echo htmlspecialchars($user_count); ?></td>
                </tr>
                <tr>
                    <td>Education groups</td>
                    <td><?php echo htmlspecialchars($group_count); ?></td>
                </tr>
                <tr>
                    <td>Biggest group</td>
                    <td><p class="biggest_group_name"><?php echo htmlspecialchars($lg_name); ?></p></td>
                </tr>
                <tr>
                    <td>Active goals</td>
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


<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Login</h4>
            </div>
            <div class="modal-body">
                <p>Username: <input type='text' name='username'/></p>
                <p>Password: <input type='text' name='password'/></p>
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
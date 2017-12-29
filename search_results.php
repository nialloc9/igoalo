<?php
require_once 'external/core.inc.php';
?>
<!DOCTYPE html>
<?php require_once 'header_loggedin.inc.php'; ?>
<?php
require_once 'external/functions.inc.php';
require_once 'controllers/controller_mods/user.php';
require_once 'controllers/controller_mods/groups.php';
require_once 'controllers/controller_mods/search.php';

require_once 'controllers/block_controllers/user_block_controller.php';
require_once 'controllers/block_controllers/group_block_controller.php';
require_once 'controllers/block_controllers/goal_block_controller.php';

$user_id = $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html>
    <header>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">

    </header>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Users</h3>
                    <div id="user_search">

                    </div>
                </div>



                <div class="col-sm-6">
                    <h3>Groups</h3>
                            <?php if(isset($group_search) && !empty($group_search)): ?>
                             <?php foreach($group_search as $group): ?>
                                    <?php $main_goal = Goals::get_goal($group['group_main_goal'], $db); ?>
                                    <?php echo "<div class='col-sm-6'>"; ?>
                                        <?php require 'external/block/groupblock.php' ?>
                                    <?php echo "</div>"; ?>
                                <?php endforeach ?>
                            <?php endif ?>
                </div>
            </div>
        </div>
    </body>
</html>

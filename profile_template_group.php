<?php
require_once 'external/core.inc.php';
?>
<!DOCTYPE html>
<?php
if(isset($_SESSION['user_id'])){
    require_once 'header_loggedin.inc.php';
}else{
    require_once 'header.inc.php';
}

?>
<?php
$group_information = Groups::show_group_by_id($group_id, $db);

$group = $group_information[0];

if(!isset($group) || empty($group)){
    die('Sorry, that group does not seem to exist.');
}

$group_profile_pic = Groups::get_group_profile_pic(htmlspecialchars($group['profile_pic']));
$group_cover_pic = Groups::get_group_cover_pic(htmlspecialchars($group['cover_pic']));

//Group goal models
require_once 'external/goal_models/group/group_goal_create.php';
require_once 'external/goal_models/group/group_goal_update_modal.php';
require_once 'external/goal_models/group/group_goal_delete_modal.php';
require_once 'external/post_block_models/group_upload_image_status.php';
require_once 'external/goal_models/group/group_more_goals_modal.php';
require_once 'external/group_models/update_group_info.php';
?>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <title></title>
    <!-- Profile template CSS -->

    <link rel="stylesheet" href="css/profile_template.css">

    <script type="text/javascript" src="js/group_create_goal_modal.js"></script>
    <script type="text/javascript" src="js/update_group_info.js"></script>
</head>
<body class='profile_body'">
<div class='container'>
    <div class='row'>
        <div class='col-sm-1'>
            <!--White space-->
        </div>

        <div class='col-sm-3'>
            <div class='profile_element'>
                <div class='profile_area'>
                    <a href="<?php echo 'profile_template_group.php?group_id=' .$group_id;?>" id="<?php echo htmlspecialchars($group['id']); ?>">
                        <img src="<?php echo $group_profile_pic; ?>" class="img-circle profile_pic" alt="Profile Picture" width="102" height="76">
                    </a>
                    <ul class='info'>
                        <?php if(Groups::user_is_group_admin($user_id, htmlspecialchars($group['id']), $db)): ?>
                            <li>
                                <div class="float_right">
                                    <a href="#update_group_info" data-toggle="modal"><i class="fa fa-pencil-square-o"></i></a>
                                </div>
                            </li>
                        <?php endif ?>
                        <li><?php echo htmlspecialchars($group['group_name']); ?></li>
                        <li><?php echo htmlspecialchars($group['city_town_village']).', '.htmlspecialchars($group['state']); ?></li>
                        <li><?php echo htmlspecialchars($group['country']); ?></li>
                        <li>Type: <?php echo htmlspecialchars($group['group_type']); ?></li>
                    </ul>


                </div>
            </div>
        </div>

        <div class='col-sm-7'>
            <div class='cover_area'>
                <img src='<?php echo $group_cover_pic; ?>' class='cover_pic' alt='Cover Picture'>
            </div>
        </div>
    </div>

    <div class='col-sm-1'>
        <!-- White space-->
    </div>


</div>
</div>
<!-- Check if auth is a member. -->
<?php if(Groups::user_is_group_member($user_id, htmlspecialchars($group['id']), $db)): ?>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-1'>
                <!--White space-->
            </div>
        </div>

        <div class="col-sm-11 friend_accept_reject_cancel_delete_wrapper">
            <ul class="pull-right">
                <li class="friend_accept_reject_cancel_delete">
                    <?php if(Groups::user_is_group_admin($user_id, htmlspecialchars($group['id']), $db) && Groups::count_admin(htmlspecialchars($group['id']), $db) == 1): ?>
                        <form action="" method="post">
                            <input type="hidden" name="delete_group_id" value="<?php echo htmlspecialchars($group['id']); ?>"/>
                            <input type="hidden" name="token" id="token" value="<?php echo $csrf_token; ?>"/>
                            <br><p class="pull-right not_friends"><input type="submit" class="btn-sm btn-danger" value="Delete group"/></p>
                        </form>
                    <?php else: ?>
                        <form action="" method="post">
                            <input type="hidden" name="leave_auth_id" value="<?php echo $user_id; ?>"/>
                            <input type="hidden" name="leave_group_id" value="<?php echo htmlspecialchars($group['id']); ?>"/>
                            <input type="hidden" id="token" name="token" value="<?php echo $csrf_token; ?>"/>
                            <br><p class="pull-right not_friends"><input type="submit" class="btn-sm btn-danger" value="Leave"/></p>
                        </form>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>

    <div class='container'>
        <div class='row'>
            <div class="col-sm-1">
                <!-- White space -->
            </div>
            <div class="col-sm-5"><br>
                <div class="post_area col-sm-12">
                    <?php require_once 'external/block/group/group_postbox.php'; ?>
                    <div id="status_insert_wrapper"></div>
                    <div class="statuses">
                        <?php require_once 'controllers/block_controllers/group/group_status_block_controller.php'; ?>
                    </div>
                    <div class="add_statuses" id="add_statuses">
                        <?php require_once 'ajax/ajax_resources/count_statuses_available.php'; ?>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('.loader').hide();
                                var did_scroll = false;
                                var load = 0;
                                var nbr = '<?php echo $group_nbr; ?>';
                                var auth_id = $('#auth_id').val();
                                var group_id = $('#group_page').val();
                                $(window).scroll(function(){
                                    did_scroll = true;
                                    setInterval(function() {
                                        if (did_scroll) {
                                            if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                                                $('.loader').show();
                                                did_scroll = false;
                                                load++;
                                                console.log(load);
                                                if(load * 10 >nbr){
                                                    $('.loader').hide();
                                                    console.log('No statuses left.');
                                                }else{
                                                    var token = $('#hidden_csrf_token').val();
                                                    $.post('ajax/ajax_status_infinite_scroll.php', {
                                                        task: 'group_status',
                                                        load: load,
                                                        auth_id: auth_id,
                                                        group_id: group_id,
                                                        token: token
                                                    }).success(function(data){
                                                        $('.add_statuses').append(data);
                                                        $('.loader').hide();
                                                        reply_post_click();
                                                        add_delete_function();
                                                        add_status_edit_function();
                                                        add_like_function();
                                                        add_unlike_function();
                                                        add_reply_more_function();
                                                    }).error(function(){
                                                        console.log('Error getting statuses');
                                                    })
                                                }
                                            }
                                        }
                                    },250);
                                });
                            });
                        </script>
                    </div>
                    <div class="loader">
                        <img src="images/loader.gif">
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="goal_area col-sm-12">
                    <div class="goal_button_wrapper goal_area col-sm-12">
                        <?php if(Groups::user_is_group_admin($user_id, htmlspecialchars($group['id']), $db)): ?>
                            <?php require_once 'controllers/model_controllers/goal_create_update_delete_controller.php'; ?>
                            <h3>Goal: <?php require_once 'external/block/group/group_goal_header_block.php'; ?></h3>
                        <?php endif ?>
                    </div>

                    <div class="goal_show_area">
                        <br><br><br>
                        <?php require_once 'controllers/block_controllers/group/group_goal_show_block_controller.php'; ?>
                        <?php if(isset($goal_array) && !empty($goal_array)): ?>
                            <a href="#group_more_goals" data-toggle="modal"><p>All goals</p></a>
                        <?php elseif(!isset($goal_array) || empty($goal_array)):  ?>
                            <p><?php echo $group['group_name']; ?> has not set any goals yet.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="friend_area col-sm-12">
                    <h3>Members:</h3>
                    <br>
                    <?php require_once 'controllers/block_controllers/group/member_show_controller.php'; ?>
                    <br>
                </div>
                <a href="<?php echo 'member_list.php?group_id='.htmlspecialchars($group['id']); ?>"><p>All members</p></a>
            </div>
            <div class="col-sm-1">
                <!-- White space -->
            </div>
        </div>
    </div>

    <!-- Check if user has group join request pending. -->
<?php elseif(Groups::join_request_sent($user_id, htmlspecialchars($group['0']), $db)): ?>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-1'>
                <!--White space-->
            </div>
        </div>
        <div class="col-sm-11">
            <ul>
                <li class="pull-right friend_accept_reject_cancel_delete">
                    <form action="<?php echo $current_file; ?>" method="post">
                        <input type="hidden" name="cancel_auth_id" value="<?php echo $user_id ?>"/>
                        <input type="hidden" name="cancel_group_id" value="<?php echo htmlspecialchars($group['id']); ?>"/>
                        <input type="hidden" id="token" name="token" value="<?php echo $csrf_token; ?>"/>
                        <br><p><input class="btn btn-danger" type="submit" value="Cancel"/></p>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- Else show this: -->
<?php else: ?>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-1'>
                <!--White space-->
            </div>

        </div>
        <div class="col-sm-11">
            <ul>
                <li class="pull-right friend_accept_reject_cancel_delete">
                    <form action="<?php echo $current_file; ?>" method="post">
                        <input type="hidden" name="join_auth_id" value="<?php echo $user_id ?>"/>
                        <input type="hidden" name="join_group_id" value="<?php echo htmlspecialchars($group['id']); ?>"/>
                        <input type="hidden" id="token" name="token" value="<?php echo $csrf_token; ?>"/>
                        <br><p><input type="submit" value="Join" class="btn btn-success"/></p>
                    </form>
                </li>
            </ul>
        </div>
    </div>

<?php endif ?>
<input type="hidden" id="user_page" value="<?php echo $user_page; ?>"/>
<input type="hidden" id="auth_id" value="<?php echo $user_id; ?>"/>
<input type="hidden" id="group_page" value="<?php echo htmlspecialchars($group['id']); ?>"/>
<input type="hidden" id="hidden_csrf_token" value="<?php echo $csrf_token; ?>"/>
</body>
</html>
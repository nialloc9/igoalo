<?php
require_once 'external/core.inc.php';
?>
<!DOCTYPE html>
<?php require_once 'header_loggedin.inc.php'; ?>
<?php
    $user_info = User::getFullUserInfo($user_id, $db);

    foreach($user_info as $key => $user_i){
        foreach($user_i as $key2 => $user_){
            $user = $user_;
        }
    }

    $user_main_goal = Goals::get_goal($user->main_goal, $db);

    foreach($user_main_goal as $key3 => $_main_goal){
        foreach($_main_goal as $key4 => $u_m_g){
            $umg = $u_m_g;
        }
    }

?>

<?php //User controller test ?>
<?php //Goal controller test ?>
<?php //require_once 'tests/controllers/group_test.php'; ?>
<?php //Files controller test ?>
<?php //require_once 'tests/controllers/notification_test.php'; ?>
<?php //require_once 'tests/controllers/status_test.php'; ?>
<?php //Search controller test ?>
<?php //require_once 'tests/controllers/recommend_test.php'; ?>
<?php //require_once 'tests/controllers/chat_test.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <title></title>
     <!-- Profile template CSS -->
     <link rel="stylesheet" href="css/profile_template.css">

    <?php require_once 'controllers/ongoing_remember_me.php'; ?>
</head>
<body class='profile_body'>
    <div class="container">
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-5">
                    <div class="profile_element">
                        <div class="post_area col-sm-12">
                            <?php require_once 'controllers/block_controllers/postbox_include_controller.php'; ?>
                            <div id="status_insert_wrapper"></div>
                            <div class="statuses">
                                <?php require_once 'controllers/block_controllers/timeline_status_block_controller.php'; ?>
                            </div>
                            <div class="add_statuses" id="add_statuses">
                                <?php require_once 'ajax/ajax_resources/count_statuses_available.php'; ?>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('.loader').hide();
                                        var did_scroll = false;
                                        var load = 0;
                                        var auth_id = $('#auth_id').val();
                                        $(window).scroll(function(){
                                            did_scroll = true;
                                            setInterval(function() {
                                                if (did_scroll) {
                                                    if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                                                        $('.loader').show();
                                                        did_scroll = false;
                                                        load++;
                                                        console.log(load);
                                                            $.post('ajax/ajax_status_infinite_scroll.php', {
                                                                task: 'timeline_status',
                                                                load: load,
                                                                auth_id: auth_id
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
                </div>
                <div class="col-sm-1">
                </div>
                <div class="col-sm-5">
                        <div class="group_goal_area">
                            <h3 class="group_goal_reco_header">Groups for you:</h3>
                            <div class="col-sm-12">
                                <!-- Recommend group -->
                                <?php require_once 'controllers/block_controllers/recommend_group.php'; ?>
                            </div>

                            <h3 class="group_goal_reco_header">Goals like yours:</h3>
                            <!-- Recommend goal -->
                            <div>
                                <?php require_once 'controllers/block_controllers/recommend_goal.php'; ?>
                            </div>
                        </div>

                </div>
            </div>
    </div>
    <input type="hidden" id="user_page" value="<?php echo $user_page; ?>"/>
    <input type="hidden" id="auth_id" value="<?php echo $user_id; ?>"/>
    <input type="hidden" id="hidden_csrf_token" value="<?php echo $csrf_token; ?>"/>
</body>
</html>
<?php
require_once 'external/core.inc.php';
?>
<!DOCTYPE html>
<?php
ini_set('default_charset', 'UTF-8');
header('Content-Type: text/html;charset=utf-8');
?>
<?php
if(isset($_SESSION['user_id'])){
    require_once 'header_loggedin.inc.php';
}else{
    require_once 'header.inc.php';
}
?>
<?php
    $user_id = $_SESSION['user_id'];

    $user_page = $_GET['page_id'];
    $user_info = User::getFullUserInfo($user_page, $db);

	if(!isset($user_info) || empty($user_info)){
        die('Sorry, that user does not seem to exist.');
    }
    
    if(htmlspecialchars($user_info[0][0]->profile_image_upload_location) == '' || $user_info[0][0]->profile_image_upload_location == null){
        $user_info[0][0]->profile_image_upload_location = 'images/no_profile_picture.jpg';
    }

    if(htmlspecialchars($user_info[0][0]->cover_image_upload_location) == '' || $user_info[0][0]->cover_image_upload_location == null){
        $user_info[0][0]->cover_image_upload_location = 'images/no_cover_picture.jpg';
    }

?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title></title>
     <!-- Profile template CSS -->

     <link rel="stylesheet" href="css/profile_template.css">
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
                        <a href="<?php echo 'profile_template_user.php?page_id='.$user_page; ?>">
                            <img src="<?php echo htmlspecialchars($user_info[0][0]->profile_image_upload_location); ?>" class="img-circle profile_pic" alt="Profile Picture" width="102" height="76">
                        </a>
                        <ul class='info'>
                            <?php if(User::authIsUser($user_id, htmlspecialchars($user_info[0][0]->id))): ?>
                            <li>
                                <div class="float_right">
                                    <a href="#update_user_info" data-toggle="modal"><i class="fa fa-pencil-square-o"></i></a>
                                </div>
                            </li>
                            <?php endif ?>
                            <li><?php echo User::getName(htmlspecialchars($user_info[0][0]->firstname), htmlspecialchars($user_info[0][0]->surname)); ?></li>
                            <li><?php echo htmlspecialchars($user_info[0][0]->age); ?></li>
                            <li><?php echo htmlspecialchars($user_info[0][0]->address).', '.htmlspecialchars($user_info[0][0]->state); ?></li>
                            <li><?php echo htmlspecialchars($user_info[0][0]->country); ?></li>
                                <li><?php echo htmlspecialchars($user_info[0][0]->phone); ?></li>
                        </ul>


                    </div>
                </div>
            </div>


            <div class='col-sm-7'>
                    <div class='cover_area'>
                        <img src='<?php echo htmlspecialchars($user_info[0][0]->cover_image_upload_location); ?>' class='cover_pic' alt='Cover Picture'>
                    </div>
                </div>
            </div>

            <div class='col-sm-1'>
            <!-- White space-->
            </div>


        </div>
    </div>
        <!-- Check if auth is user. -->
    <?php if(!User::authIsUser($user_id, $user_page) && (User::isFriendsWith($user_id, $user_page, $db) || User::isFriendsWith($user_page, $user_id, $db))): ?>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-1'>
                    <!--White space-->
                </div>
            </div>
            <div class="col-sm-11 friend_accept_reject_cancel_delete_wrapper">
                <ul class="pull-right">
                    <li class="friend_accept_reject_cancel_delete">
                        <form action="<?php echo $current_file; ?>" method="post">
                            <input type="hidden" name="delete_friend_auth_id" value="<?php echo $user_id ?>"/>
                            <input type="hidden" name="delete_friend_user_id" value="<?php echo $user_user_id ?>"/>
                            <input type="hidden" name="token" value="<?php echo $csrf_token ?>"/>
                            <br><p class="pull-right not_friends"><input type="submit" class="btn-sm btn-danger" value="Unfriend"/></p>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    <?php endif ?>

    <?php if(User::friends($user_id, $user_page, $db) || User::authIsUser($user_id, $user_page)): ?>
        <?php $goal_user_info = $user_info; ?>
    <div class='container'>
        <div class='row'>
            <div class="col-sm-1">
                <!-- White space -->
            </div>
            <div class="col-sm-5"><br>
                <div class="post_area col-sm-12">
                    <?php require_once 'controllers/block_controllers/postbox_include_controller.php'; ?>
                    <div id="status_insert_wrapper"></div>
                    <div class="statuses">
                        <?php require_once 'controllers/block_controllers/status_block_controller.php'; ?>

                    </div>
                    <div class="add_statuses" id="add_statuses">

                        <?php require_once 'ajax/ajax_resources/count_statuses_available.php'; ?>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('.loader').hide();
                                var did_scroll = false;
                                var load = 0;
                                var nbr = '<?php echo $nbr; ?>';
                                var auth_id = $('#auth_id').val();
                                var user_page = $('#user_page').val();
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
                                                        task: 'status',
                                                        load: load,
                                                        auth_id: auth_id,
                                                        user_page: user_page,
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
                        <?php if(User::authIsUser($user_id, $page_id)): ?>

                            <h3>Goal: <?php require_once 'external/block/goal_header_block.php'; ?></h3>

                        <?php endif ?>
                    </div>

                    <div class="goal_show_area">
                        <br><br><br>
                            <?php require_once 'controllers/block_controllers/goal_show_block_controller.php'; ?>

                        <?php if(isset($goal_array) && !empty($goal_array)): ?>
                            <a href="#more_goals" data-toggle="modal"><p>All goals</p></a>
                        <?php elseif(!isset($goal_array) || empty($goal_array)):  ?>
                            <p><?php echo htmlspecialchars($goal_user_info[0][0]->firstname); ?> has not set any goals yet.</p>
                        <?php elseif(!isset($goal_array) && empty($goal_array) && User::authIsUser($user_id, $page_id)): ?>
                            <p>You have not set any goals yet.</p>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="friend_area col-sm-12">
                    <h3>Friends:</h3>
                    <br>
                    <?php require_once 'controllers/block_controllers/friend_show_controller.php'; ?>

                    <br>
                </div>
                <?php if(isset($friends) && !empty($friends)): ?>
                    <a href="<?php echo 'friend_list.php?page_id='.$page_id; ?>"><p>All friends</p></a>
                <?php elseif(!isset($friends) || empty($friends)): ?>
                    <p><?php echo htmlspecialchars($goal_user_info[0][0]->firstname); ?> has not made any friends yet.</p>
                <?php elseif(!isset($friends) || empty($friends) && User::authIsUser($user_id, $user_page)): ?>
                    <p>You have not made any friends yet.</p>
                <?php endif; ?>


                <div class="col-sm-12">
                    <h3>Groups: <?php if((User::authIsUser($user_id, $page_id))){require_once 'external/block/group_header_block.php';} ?></h3>
                    <br>
                    <?php require_once 'controllers/block_controllers/group_show_controller.php'; ?>
                    <br>
                </div>
                <?php if(isset($groups) && !empty($groups)): ?>
                    <a href="<?php echo 'group_list.php?page_id='.$page_id; ?>"><p>All groups</p></a>
                <?php elseif(!isset($groups) || empty($groups)): ?>
                    <p><?php echo htmlspecialchars($goal_user_info[0][0]->firstname); ?> has not joined any groups yet.</p>
                <?php elseif(!isset($groups) || empty($groups) && User::authIsUser($user_id, $page_id)): ?>
                    <p>You have not joined any groups yet.</p>
                <?php endif; ?>
            </div>
            <div class="col-sm-1">
                <!-- White space -->
            </div>
        </div>
    </div>

        <!-- Check if user has friend request pending. -->
        <?php elseif(User::friendOf($user_page, $user_id, $db) == true && User::friendOf($user_id, $user_page, $db) == false): ?>
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
                            <input type="hidden" name="cancel_friend_auth_id" value="<?php echo $user_id ?>"/>
                            <input type="hidden" name="cancel_friend_user_id" value="<?php echo $user_user_id ?>"/>
                            <input type="hidden" name="token" value="<?php echo $csrf_token; ?>">
                            <br><p><input class="btn btn-danger" type="submit" value="Cancel Friend Request"/></p>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Check if auth has friend request pending. -->
        <?php elseif(User::friendOf($user_id, $user_page, $db) == true && User::friendOf($user_page, $user_id, $db) == false): ?>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-1'>
                    <!--White space-->
                </div>
            <div class="col-sm-10">
                <ul class="pull-right">
                    <li class="friend_accept_reject_cancel_delete">
                        <br>
                        <form action="<?php echo $current_file; ?>" method="post">
                            <input type="hidden" name="accept_friend_auth_id" value="<?php echo $user_id ?>"/>
                            <input type="hidden" name="accept_friend_user_id" value="<?php echo $user_user_id ?>"/>
                            <input type="hidden" name="token" value="<?php echo $csrf_token; ?>">
                            <p><input type="submit" class="btn btn-success" value="Accept"/></p>
                        </form>
                    </li>

                    <li class="friend_accept_reject_cancel_delete">
                        <form action="<?php echo $current_file; ?>" method="post">
                            <input type="hidden" name="cancel_friend_auth_id" value="<?php echo $user_id ?>"/>
                            <input type="hidden" name="cancel_friend_user_id" value="<?php echo $user_user_id ?>"/>
                            <input type="hidden" name="token" value="<?php echo $csrf_token; ?>">
                            <p><input class="btn btn-danger" type="submit" value="Reject"/></p>
                        </form>
                    </li>
                </ul>

            </div>

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
                                    <input type="hidden" name="add_friend_auth_id" value="<?php echo $user_id ?>"/>
                                    <input type="hidden" name="add_friend_user_id" value="<?php echo $user_user_id ?>"/>
                                    <input type="hidden" name="token" value="<?php echo $csrf_token; ?>">
                                    <br><p><input type="submit" value="Add Friend" class="btn btn-success"/></p>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
    <?php endif ?>


<input type="hidden" id="user_page" value="<?php echo $user_page; ?>"/>
<input type="hidden" id="auth_id" value="<?php echo $user_id; ?>"/>
<input type="hidden" id="hidden_csrf_token" value="<?php echo $csrf_token; ?>"/>

</body>
</html>
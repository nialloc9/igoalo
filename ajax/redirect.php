<?php
if(isset($_POST['task']) && !empty($_POST['task'])){
    session_start();
    $task = $_POST['task'];
    $id = $_POST['id'];

    //If the task is a user_page_redirect then change the user_page session variable otherwise if it is a group redirect change the group_page variable. Same for a goal_page_redirect.
    if($task == 'user_page_redirect'){
        $_SESSION['user_page'] = $id;
        echo 'User page redirect id '.$id.' added.';
    }

    if($task == 'group_page_redirect'){
        $_SESSION['group_page'] = $id;
        echo 'Group page redirect id added.';
    }

    if($task == 'goal_page_redirect'){
        $_SESSION['goal_page'] = $id;
        echo 'Goal page redirect id added.';
    }
}
?>

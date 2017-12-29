<?php
if(isset($_GET['search'])  && !empty($_GET['search'])){
    $search = $_GET['search'];

    $user_search = searchUsers($search, $db);
}

?>
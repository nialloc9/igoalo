<?php
if(isset($_GET['search'])  && !empty($_GET['search'])){
    $search = $_GET['search'];
    $goal_search = searchGoals($search, $db);
}
?>
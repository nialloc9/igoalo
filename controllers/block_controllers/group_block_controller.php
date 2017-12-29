<?php
if(isset($_GET['search'])  && !empty($_GET['search'])){
    $search = $_GET['search'];
    $group_search = searchGroups($search, $db);
}

?>
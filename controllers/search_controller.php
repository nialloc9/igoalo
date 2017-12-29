<?php
if(isset($_GET['search']) && !empty($_GET['search'])){
    $search = $_GET['search'];
    $token = $_GET['token'];

    if(Token::check($token)){
        header('Location: search_results.php?search='.$search);
    }
}
?>
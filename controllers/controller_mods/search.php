<?php
if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
    auth($_SESSION['user_id']);
}
    function searchUsers($user_search, $db){

        $query = $db->prepare('SELECT * FROM users WHERE username LIKE ? OR firstname LIKE ? OR surname LIKE ?  OR state LIKE ?');
        $user_search = '%'.$user_search.'%';
        $query->bindParam(1, $user_search);
        $query->bindParam(2, $user_search);
        $query->bindParam(3, $user_search);
        $query->bindParam(4, $user_search);
        $query->execute();

        while ($user_results = $query->fetchAll())
        {
                return $user_results;
        }
    }


    function searchGroups($user_search, $db){
        $query = $db->prepare('SELECT * FROM groups WHERE group_name LIKE ? OR group_type LIKE ? OR state LIKE ?');
        $user_search = '%'.$user_search.'%';
        $query->bindParam(1, $user_search);
        $query->bindParam(2, $user_search);
        $query->bindParam(3, $user_search);
        $query->execute();

        while ($group_results = $query->fetchAll())
        {
            return $group_results;
        }
    }

    function searchGoals($user_search, $db){
        $query = $db->prepare('SELECT * FROM goals WHERE name LIKE ? OR type LIKE ?'); //Need to add a goal.php that gets the creater id and matches it to a group or user.
        $user_search = '%'.$user_search.'%';
        $query->bindParam(1, $user_search);
        $query->bindParam(2, $user_search);
        $query->execute();


        while ($goal_results = $query->fetchAll())
        {
            return $goal_results;
        }
    }
?>

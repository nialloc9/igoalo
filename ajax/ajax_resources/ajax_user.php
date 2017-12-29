<?php
function AjaxGetFullUserInfo($user_user_id, $db){
    $stmt = $db->prepare("SELECT * FROM users  WHERE id = :id");
    $stmt->bindParam(':id', $user_user_id);
    $query = $stmt->execute();
    if( $query ) {
        $count = $stmt->rowCount();
        if($count>0){
            while($rows = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                $output[] = $rows;
                return $output;
            }
        }
    }
}
?>
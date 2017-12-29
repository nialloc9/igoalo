<?php
    $stmt = $db->prepare("UPDATE `goals` SET `updated_at` = :time, `goal_completed` = :completed, `goal_per_completed`= :per WHERE `id` = :id");
    $stmt->bindParam(':time', $time);
    $stmt->bindParam(':completed', $completed);
    $stmt->bindParam(':per', $per);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        echo 'goal per updated with button.';
    }else{
        echo 'error using update button query.';
    }

?>



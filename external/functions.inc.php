<?php
function getUserInfo($user_id, $db)
{
    $date = new DateTime();
    $time = $date->format('Y-m-d H:i:sP');


    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");

    $stmt->bindParam(1, $user_id);

    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $username = htmlentities($row['username']);
        $password = htmlentities($row['password']);
        $firstname = htmlentities($row['firstname']);
        $surname = htmlentities($row['surname']);
        $gender = htmlentities($row['gender']);
        $age = htmlentities($row['age']);
        $address = htmlentities($row['address']);
        $state = htmlentities($row['state']);
        $country = htmlentities($row['country']);
        $postcode = htmlentities($row['post']);
        $phone = htmlentities($row['phone']);
        $email = htmlentities($row['email']);
        $cover_image_upload_location = htmlentities($row['cover_image_upload_location']);
        $profile_image_upload_location = htmlentities($row['profile_image_upload_location']);
        $goals = htmlentities($row['goals']);
        $profile_post = htmlentities($row['profile_post']);
        $about = htmlentities($row['about']);

        if ($phone == 0) {
            $phone = $username . ' has not provided his/her phone number for view.';
        }

        if ($postcode == null) {
            $postcode = '0000';
        }

        if ($cover_image_upload_location == null) {
            $cover_image_upload_location = 'images/no_cover_picture.jpg';
        }

        if ($profile_image_upload_location == null) {
            $profile_image_upload_location = 'images/no_profile_picture.jpg';
        }

        if ($goals == null) {
            $goals = $username . ' has not created any goals yet.';
        }

        if ($profile_post == null) {
            $profile_post = $username . ' has not posted yet..';
        }

        if ($about == null) {
            $about = $username . ' has not wrote a profile description.';
        }
        // echo "<pre>".var_dump($row)."</pre>"
    }
}
?>

<!--
/**
 * Created by PhpStorm.
 * User: Niall
 * Date: 30/10/2015
 * Time: 14:27
 */
 -->
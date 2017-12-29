<?php
class User
{
    public function create($username, $about, $password, $firstname, $surname, $gender, $age, $address, $state,
                           $country, $post, $phone, $email, $cover_image_upload_location, $profile_image_upload_location,
                            $main_goal, $about, $time, $db){
        $stmt = $db->prepare("INSERT INTO `users`(`id`, `username`, `password`, `firstname`, `surname`, `gender`, `age`, `address`, `state`, `country`,
                              `post`, `phone`, `email`, `cover_image_upload_location`, `profile_image_upload_location`, `main_goal`, `about`,
                              `created_at`, `updated_at`, `last_login`, `activated`, `terms`)
                              VALUES (
                              '',:username,:password,:firstname,:surname,:gender,:age,:address,:state,:country,:post,:phone,
                              :email,:cover_image_upload_location,:profile_image_upload_location,:main_goal,:about,
                              :created_at, :updated_at, :last_login, '0', '1')");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':post', $post);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cover_image_upload_location', $cover_image_upload_location);
        $stmt->bindParam(':profile_image_upload_location', $profile_image_upload_location);
        $stmt->bindParam(':main_goal', $main_goal);
        $stmt->bindParam(':about', $about);
        $stmt->bindParam(':created_at', $time);
        $stmt->bindParam(':updated_at', $time);
        $stmt->bindParam(':last_login', $time);
        $stmt->execute();
    }

    public function update($id, $username, $about, $firstname, $surname, $gender, $age, $address, $state, $country, $post, $phone, $email, $time, $db){
        $stmt = $db->prepare("UPDATE `users` SET `username`=:username,`firstname`=:firstname,`surname`=:surname,
                                                  `gender`=:gender,`age`=:age,`address`=:address,`state`=:state,`country`=:country,
                                                  `post`=:post,`phone`=:phone,`email`=:email,
                                                  `about`=:about,`created_at`=:created_at,
                                                  `updated_at`=:updated_at,`last_login`=:last_login WHERE `id`=:id");


        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':post', $post);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':about', $about);
        $stmt->bindParam(':created_at', $time);
        $stmt->bindParam(':updated_at', $time);
        $stmt->bindParam(':last_login', $time);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
        }
    }

    public function delete($id, $db){
        $stmt = $db->prepare("DELETE FROM `users` WHERE `id`=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function val_email($email, $db){
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function val_username($username, $db){
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update_password($id, $password, $db){
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $db->prepare("UPDATE `users` SET `password`=:password WHERE `id`=:id");
        $stmt->bindParam(':password', $password_hashed);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }
    //Auth
    public function authIsUser($auth, $user){ //Checks if the page looking at is the owner of the page or not.
        if($auth == $user){
            return true;
        }else{
            return false;
        }
    }

    //Get full user info
    public function getFullUserInfo($user_user_id, $db){
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

    //Count users
    public function count_users($db){
        $stmt = $db->prepare("SELECT * FROM users");
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            return $count;
        }
    }

    //Get firstname
    public function get_firstname($user_id, $db){
        $stmt = $db->prepare("SELECT firstname FROM users  WHERE id = :id");
        $stmt->bindParam(':id', $user_id);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                while($row = $stmt->fetch()) {
                    return $row;
                }
            }
        }
    }

    //Manipulate user info
    public function getName($firstname, $lastname) //Get full name
    {
        return $firstname . ' ' . $lastname;
    }

    public function getNameOrUsername($username, $firstname, $lastname) //Get fullname or username
    {
        $fullname = User::getName($firstname, $lastname, $username);
        if (isset($fullname) && !empty($fullname)) { //If the function we just created getName returns a value then return that. But if not return the username.
            return $fullname;
        } else {
            return $username;
        }
    }

    public function getFirstNameOrUsername($username, $firstname)  //Get firstname or username
    { //Say for example we were sending an email and we wanted to address themaby there first name we could create a function that would get that or their username if first_name is not present.
        if (isset($firstname) && !empty($firstname)) {
            return $firstname;
        } else {
            $username;
        }
    }

    public function getUserProfileImage($user_profile_img){ //Get profile image location or use default
        if(!isset($user_profile_img) || empty($user_profile_img)){
            return $user_profile_img = 'images/no_profile_picture.jpg';
        }else{
            return $user_profile_img;
        }
    }

    public function getUserCoverImage($user_cover_img){ //Get cover image or use default
        if(!isset($user_cover_img) || empty($user_cover_img)){
            return $user_cover_img = 'images/no_cover_picture.jpg';
        }else{
            return $user_cover_img;
        }
    }

    /*
     * Friends
     * We create 2 methods. First show the friends you have and the second is those who have you as their friend.
     */

    public function friendsOfMine($auth_id, $user_user_id, $db) //Has the user requested me as a friend but I havn't accepted them yet.
    {
        $stmt = $db->prepare("SELECT * FROM friends WHERE user_id = :user_id AND friend_id = :friend_id AND accepted = '0'");
        $stmt->bindParam(':user_id', $user_user_id);
        $stmt->bindParam(':friend_id', $auth_id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function friendOf($auth_id, $user_user_id, $db) //Have I have requested friendship but they havn't accepted me
    {

        $stmt = $db->prepare("SELECT * FROM friends WHERE user_id = :user_id AND friend_id = :friend_id AND accepted = '0'");
        $stmt->bindParam(':user_id', $user_user_id);
        $stmt->bindParam(':friend_id', $auth_id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function friends($auth_id, $user_user_id, $db) //Are we friends that I have accepted or has accepted me.
    {
        $stmt = $db->prepare("SELECT * FROM friends WHERE user_id = :user_id AND friend_id = :friend_id AND accepted = '1'");
        $stmt->bindParam(':user_id', $user_user_id);
        $stmt->bindParam(':friend_id', $auth_id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            $stmt = $db->prepare("SELECT * FROM friends WHERE user_id = :user_id AND friend_id = :friend_id AND accepted = '1'");
            $stmt->bindParam(':user_id', $auth_id);
            $stmt->bindParam('friend_id', $user_user_id);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function showFriends($page_id, $db) //Are we friends that I have accepted or has accepted me.
    {
        $stmt = $db->prepare("SELECT * FROM `friends` WHERE (user_id = :friend_id && friend_id != :friend_id AND accepted = 1) OR (friend_id = :friend_id && user_id != :friend_id AND accepted = 1)");
        $stmt->bindParam(':friend_id', $page_id);
        $stmt->execute();
        while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $row;
        }
    }

    public function show_6_friends($page_id, $db) //Are we friends that I have accepted or has accepted me.
    {
        $stmt = $db->prepare("SELECT * FROM `friends` WHERE (user_id = :friend_id && friend_id != :friend_id AND accepted = 1) OR (friend_id = :friend_id && user_id != :friend_id AND accepted = 1) LIMIT 6");
        $stmt->bindParam(':friend_id', $page_id);
        $stmt->execute();
        while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $row;
        }
    }

    public function friendRequests($auth_id, $db){ //Who are the users that I have requested by has not accepted me yet.
        $stmt = $db->prepare("SELECT user_id FROM friends WHERE  friend_id = ? AND accepted = '0'");
        $stmt->bindParam(1, $auth_id);

        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user_id = htmlentities($row['user_id']);
            return $user_id;
        }
    }

    ///Get pending friend requests
    public function friendRequestsPending($user_user_id, $db){ //Who are the users that have requested me as friend by I havn't accepted yet.
        $stmt = $db->prepare("SELECT friend_id FROM friends WHERE  user_id = ? AND accepted = '0'");
        $stmt->bindParam(1, $user_user_id);

        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $friend_id = htmlentities($row['friend_id']);
            return $friend_id;
        }
    }

    public function addFriend($auth_id, $user_id, $time, $db){ //Sends a friend request
        $stmt = $db->prepare("INSERT INTO `friends`(`id`, `user_id`, `friend_id`, `accepted`, `created_at`, `updated_at`) VALUES ('', ?, ?, '0', ?, '')");
        $stmt->bindParam(1, $auth_id);
        $stmt->bindParam(2, $user_id);
        $stmt->bindParam(3, $time);


        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteFriend($auth_id, $user_id, $db){ //Delete a friend
        $stmt = $db->prepare("DELETE FROM `friends` WHERE `user_id` = ? AND `friend_id` = ? AND `accepted` = '1'");
        $stmt->bindParam(1, $auth_id);
        $stmt->bindParam(2, $user_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //cancel a friend request
    public function cancelFriend($auth_id, $user_id, $db){ //Delete a friend
        $stmt = $db->prepare("DELETE FROM `friends` WHERE `user_id` = ? AND `friend_id` = ? AND `accepted` = '0'");
        $stmt->bindParam(1, $auth_id);
        $stmt->bindParam(2, $user_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Changes the accepted value from 0 to 1
    public function acceptFriendRequest($auth_id, $user_id, $time, $db){ //Accept a friend.
        $stmt = $db->prepare("UPDATE `friends` SET `accepted`='1', `updated_at`=? WHERE `user_id`= ? AND `friend_id`= ? AND `accepted` = '0'");


        $stmt->bindParam(1, $time);
        $stmt->bindParam(2, $auth_id);
        $stmt->bindParam(3, $user_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Is friends with
    public function isFriendsWith($auth_id, $user_id, $db){ //Are the 2 users friends?
        $stmt = $db->prepare("SELECT * FROM friends WHERE friend_id = ? AND user_id = ? AND accepted = '1'");
        $stmt->bindParam(1, $auth_id);
        $stmt->bindParam(2, $user_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        //This looks at the friends table using the friends method and checks if the users are friends. Remember it is either a 0 or 1 so we can return these as booleon values.
        //Just incase we make a mistake in the order that we put in the auth_user and the user_id it won't matter as we check for that mistake.
    }

    //Search Friends
    function searchFriends($user_id, $user_search, $db){
        $query = $db->prepare('SELECT * FROM users WHERE id = ? AND (firstname LIKE ? || surname LIKE ? || username LIKE ?)');
        $user_search = '%'.$user_search.'%';
        $query->bindParam(1, $user_id);
        $query->bindParam(2, $user_search);
        $query->bindParam(3, $user_search);
        $query->bindParam(4, $user_search);
        $query->execute();

        while ($group_results = $query->fetchAll())
        {
            return $group_results;
        }
    }

    public function update_profile_pic($user_id, $pic_name, $updated_at, $db){
        $stmt = $db->prepare("UPDATE `users` SET `profile_image_upload_location`=:pic_name,`updated_at`=:updated_at WHERE `id`=:id");
        $stmt->bindParam(':pic_name', $pic_name);
        $stmt->bindParam(':updated_at', $updated_at);
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
    }

    public function update_cover_pic($user_id, $pic_name, $updated_at, $db){
        $stmt = $db->prepare("UPDATE `users` SET `cover_image_upload_location`=:pic_name,`updated_at`=:updated_at WHERE `id`=:id");
        $stmt->bindParam(':pic_name', $pic_name);
        $stmt->bindParam(':updated_at', $updated_at);
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
    }

    public function update_profile_and_cover_pic($user_id, $cover_pic_name, $profile_pic_name, $updated_at, $db){
        $stmt = $db->prepare("UPDATE `users` SET `cover_image_upload_location`=:cover_pic_name, `profile_image_upload_location`=:profile_pic_name,`updated_at`=:updated_at WHERE `id`=:id");
        $stmt->bindParam(':cover_pic_name', $cover_pic_name);
        $stmt->bindParam(':profile_pic_name', $profile_pic_name);
        $stmt->bindParam(':updated_at', $updated_at);
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
    }

    public function get_status_post_page_user_info($status_user_id, $status_page_id, $group_info, $db){
        if($status_user_id !== $status_page_id && (!isset($group_info) || empty($group_info))){
            $stmt = $db->prepare("SELECT * FROM users  WHERE id = :id");
            $stmt->bindParam(':id', $status_page_id);
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
    }

    public function update_last_login($time, $auth_id, $db){
        $stmt = $db->prepare("UPDATE `users` SET `last_login`=:login_time WHERE `id`=:id");
        $stmt->bindParam(':login_time', $time);
        $stmt->bindParam(':id', $auth_id);
        $stmt->execute();
    }

    //Get user_id from email and username
    public function get_id_from_email_and_username($username, $email, $db){
        $stmt = $db->prepare("SELECT id FROM users  WHERE username = :username AND email = :email");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                while($row = $stmt->fetch()) {
                    return $row;
                }
            }
        }
    }

    //Store info to be confirmed later
    public function forgotton_pass_request($email, $auth_id, $token, $time, $db){
        $stmt = $db->prepare("INSERT INTO `forgotton_password`(`id`, `user_id`, `token`, `email`, `time`) VALUES ('',:auth_id,:token,:email,:time)");
        $stmt->bindParam(':auth_id', $auth_id);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':time', $time);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Confrim email sent matches infor stored from forgotton_pass_request
    public function forgotton_pass_confirmation($email, $auth_id, $token, $db){
        $stmt = $db->prepare("SELECT * FROM `forgotton_password` WHERE `user_id`=:auth_id AND `token`=:token AND `email`=:email");
        $stmt->bindParam(':auth_id', $auth_id);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':email', $email);
        if($query = $stmt->execute()){
            $count = $stmt->rowCount();
            if($count>0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    //VERIFY USERS ACCOUNT IS ACTIVATED
    public function verify_email_is_activated($username, $db){
        $stmt = $db->prepare("SELECT password FROM users WHERE username = ? AND activated = 1");
        $stmt->bindParam(1, $username);

        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    //AUTHENTICATE EMAIL REQUEST
    public function verify_email_request($email, $auth_id, $token, $time, $db){
        $stmt = $db->prepare("INSERT INTO `email_auth`(`id`, `user_id`, `token`, `email`, `time`) VALUES ('',:auth_id,:token,:email,:time)");
        $stmt->bindParam(':auth_id', $auth_id);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':time', $time);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    //CONFIRM EMAIL SENT MATCHS STORED INFO
    public function verify_email_request_confirmation($email, $auth_id, $token, $db){
        $stmt = $db->prepare("SELECT * FROM `email_auth` WHERE `user_id`=:auth_id AND `token`=:token AND `email`=:email");
        $stmt->bindParam(':auth_id', $auth_id);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':email', $email);
        if($query = $stmt->execute()){
            $count = $stmt->rowCount();
            if($count>0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    //UPDATE EMAIL VALIDATION
    public function verify_email($auth_id, $db){
        $stmt = $db->prepare("UPDATE `users` SET `activated` = 1 WHERE id = :auth_id");
        $stmt->bindParam(':auth_id', $auth_id);
        if($query = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>
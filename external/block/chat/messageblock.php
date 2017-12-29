<?php

    $smilies = array(
        ':|'  => 'mellow',
        ':-|' => 'mellow',
        ':-o' => 'ohmy',
        ':-O' => 'ohmy',
        ':o'  => 'ohmy',
        ':O'  => 'ohmy',
        ';)'  => 'wink',
        ';-)' => 'wink',
        ':p'  => 'tongue',
        ':-p' => 'tongue',
        ':P'  => 'tongue',
        ':-P' => 'tongue',
        ':D'  => 'biggrin',
        ':-D' => 'biggrin',
        '8)'  => 'cool',
        '8-)' => 'cool',
        '^_^' => 'smile',
        ':)'  => 'smile',
        ':-)' => 'smile',
        ':('  => 'sad',
        ':-(' => 'sad',
        '8ol' => 'angry',
        '(l)' => 'love',
        '(L)' => 'love',
    );

    $sizes = array(
        'biggrin' => 18,
        'cool' => 20,
        'haha' => 20,
        'mellow' => 20,
        'ohmy' => 20,
        'sad' => 20,
        'smile' => 18,
        'tongue' => 20,
        'wink' => 20,
        'love' => 20,
        'angry' => 20,
    );

    $replace = array();
    foreach ($smilies as $smiley => $imgName)
    {
        $size = $sizes[$imgName];
        array_push($replace, '<img src="images/smiley/'.$imgName.'.ico" alt="'.$smiley.'" width="'.$size.'" height="'.$size.'" />');
    }
    $text = str_replace(array_keys($smilies), $replace, $chat_text);
    $username = str_replace(array_keys($smilies), $replace, $user_name);
?>

<div class="chat_box_wrapper">
    <div class="chat_box">
        <div class="media block">
            <div class="chat_box_header">
                <a id="<?php echo $message_user_id; ?>" href="<?php echo 'profile_template_user.php?page_id='.$message_user_id; ?>">
                    <img src='<?php echo $user_profile_img; ?>' class='chat_are_friend_pic'/>
                    <p class='friend_list_chat_area_name'><?php echo $user_name; ?></p>
                </a>
            </div>
            <div class="chat_box_body">
                <?php echo $text; ?>
            </div>
            <div class="chat_box_time">
                <p class="chat_time"><?php echo $time; ?></p>
            </div>
        </div>
    </div>
</div><br>
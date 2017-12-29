<div class="chat_messagebox">
    <form>
        <div class="messagebox_wrapper">
            <textarea name="messagebox" class="messagebox" id="messagebox"></textarea>
        </div>
        <input type="hidden" name="user2" id="user2" value=""/>
        <input type="hidden" id="chat_auth" value="<?php echo $user_id; ?>">
        <input type="hidden" class="timestamp" id="message_time">
        <br>
        <input type="button" onclick="input_message(<?php echo $user_id; ?>)" class="btn btn-primary" id="message_submit_btn" value="Send"/>
    </form>

    <!--
        Later update
        <img src="images/smiley/angry.ico" id="angry_smiley" class="chat_smiley">
        <img src="images/smiley/biggrin.ico" id="biggrin_smiley" class="chat_smiley">
        <img src="images/smiley/cool.ico" id=cool_smiley" class="chat_smiley">
        <img src="images/smiley/love.ico" id="love_smiley" class="chat_smiley">
        <img src="images/smiley/mellow.ico" id="mellow_smiley" class="chat_smiley">
        <img src="images/smiley/ohmy.ico" id="ohmy_smiley" class="chat_smiley">
        <img src="images/smiley/sad.ico" id="sad_smiley" class="chat_smiley">
        <img src="images/smiley/smile.ico" id="smile_smiley" class="chat_smiley">
        <img src="images/smiley/tongue.ico" id="tongue_smiley" class="chat_smiley">
        <img src="images/smiley/wink.ico" id="wink_smiley" class="chat_smiley">

        -->

</div>
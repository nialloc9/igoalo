<?php if(isset($user_search) && !empty($user_search)): ?>
    <?php foreach($user_search as $user): ?>
        <?php echo "<div class='col-sm-6'>"; ?>
        <?php require 'external/block/userblock.php' ?><br>
        <?php echo "</div>"; ?>
    <?php endforeach ?>
<?php endif ?>
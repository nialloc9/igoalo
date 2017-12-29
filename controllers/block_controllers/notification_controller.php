<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h3>User notifications</h3><br>
            <?php $notifications = Notifications::get_user_notifications($user_id, $db); ?>
            <?php foreach($notifications as $key => $notification): ?>
                <?php require 'external/block/notification_block.php'; ?>
            <?php endforeach; ?>
        </div>
        <div class="col-sm-6">
            <h3>Group notifications</h3><br>
            <?php
            $groups = Groups::show_groups_user_is_an_admin_of($user_id, $db);

            foreach($groups as $key2 => $group){
                if(Notifications::user_has_group_notifications(htmlspecialchars($group['group_id']), $db)){
                    $notifications = Notifications::get_group_notifications(htmlspecialchars($group['group_id']), $db);
                    foreach($notifications as $key => $notification){
                        require 'external/block/notification_block.php';
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
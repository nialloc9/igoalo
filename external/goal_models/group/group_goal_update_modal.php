<div class="modal fade" id="group_update_goal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="form-horizontal" role="form">
                <div class="modal-header">
                    <h4>Update <?php echo htmlspecialchars($group['group_name']); ?>'s goals</h4>
                </div>
                <div class="modal-body">
                    <?php require_once 'controllers/model_controllers/group/group_goal_update_modal_controller.php'; ?>
                </div>


                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>
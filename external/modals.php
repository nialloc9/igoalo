<div class="modal fade" id="logout" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Log out</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to log out?</p>
                <form method="post">
                    <input type="hidden" value="1" name="log_out"/>
                    <p><input type='submit' class='btn btn-success' id ='logout_button' value='Log out'/></p>
                    <input type="hidden" name="token" value="<?php echo $csrf_token; ?>"/>
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>
</div>








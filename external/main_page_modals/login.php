<div class="modal fade" id="contact" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="form-horizontal" role="form">
                <div class="modal-header">
                    <h4>Contact</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group" style="margin-left: 20px">
                        If you have any queries or questions. Please email us at:<br>
                        <p class="time">info@igoalo.com</p>
                    </div>

                </div>


                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Login</h4>
            </div>
            <div class="modal-body">
                <form action ="<?php echo $current_file;?>" method="post">
                    <p>Username: <input type='text' name='username'/></p>
                    <p>Password: &nbsp;<input type='password' name='password'/></p>
                    <p>Remember me: <input type="checkbox" value="1" name="remember_me"/></p>
                    <p><a href="forgotton_pass.php">Forgotton password</a></p>
                    <p style="display: inline; font-size: 11px; color: red;font-weight: 400;"><?php if(isset($error)){echo 'Previous login attempt:'.$error;} ?></p>
                    <input type="hidden" class="token" name="token" value="<?php echo $csrf_token; ?>"/>
                    <input type="hidden" class="timestamp" name="time"/>
                    <p><input type='submit' class='btn btn-success' value="Log in"/></p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" data-dismiss="modal">Close</a>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
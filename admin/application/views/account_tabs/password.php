<form name="update_admin_password" class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/updateUserPasswordInfo" method="POST">
    <input type="hidden" name="user_id" value="<?php if (!empty($data['adminInfo']->user_id)) echo $data['adminInfo']->user_id; ?>">
    <div class="form-group">
        <label class="col-sm-2 control-label asterisk">Current Password</label>
        <div class="col-md-9">
            <input type="password" class="form-control" name="curr_password" required="required">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label asterisk">Password</label>
        <div class="col-md-9">
            <input type="password" class="form-control" name="password" id="change_password" required="required">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label asterisk">Confirm Password</label>
        <div class="col-md-9">
            <input type="password" class="form-control" name="con_password" type="password" required="required">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
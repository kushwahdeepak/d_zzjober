<form name="update_admin_profile" class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/updateUserInfo" method="POST">
    <input type="hidden" name="user_id" value="<?php if (!empty($data['adminInfo']->user_id)) echo $data['adminInfo']->user_id; ?>">
    <div class="form-group">
        <label class="col-sm-2 control-label asterisk">First Name</label>
        <div class="col-md-9">
            <?php if (isset($data['adminInfo']->first_name)) { ?>
            <input type="text" class="form-control" name="fname" value="<?php if (!empty($data['adminInfo']->first_name)) echo $data['adminInfo']->first_name; ?>" required="required">
            <?php } else { ?>
            <input type="text" class="form-control" name="fname" required="required">
            <?php } ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Middle Name</label>
        <div class="col-md-9">
            <?php if (isset($data['adminInfo']->middle_name)) { ?>
            <input type="text" class="form-control" name="mname" value="<?php if (!empty($data['adminInfo']->middle_name)) echo $data['adminInfo']->middle_name; ?>">
            <?php } else { ?>
            <input type="text" class="form-control" name="mname">
            <?php } ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label asterisk">Last Name</label>
        <div class="col-md-9">
            <?php if (isset($data['adminInfo']->last_name)) { ?>
            <input type="text" class="form-control" name="lname" value="<?php if (!empty($data['adminInfo']->last_name)) echo $data['adminInfo']->last_name; ?>" required="required">
            <?php } else { ?>
            <input type="text" class="form-control" name="lname" required="required">
            <?php } ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label asterisk">Email</label>
        <div class="col-md-9">
            <?php if (isset($data['adminInfo']->email)) { ?>
            <input type="email" class="form-control" name="email" value="<?php if (!empty($data['adminInfo']->email)) echo $data['adminInfo']->email; ?>" required="required">
            <?php } else { ?>
            <input type="email" class="form-control" name="email">
            <?php } ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label asterisk">Mobile</label>
        <div class="col-md-9">
            <?php if (isset($data['adminInfo'])) { ?>
            <input type="text" class="form-control" name="mobile" value="<?php if (!empty($data['adminInfo']->mobile)) echo $data['adminInfo']->mobile; ?>" required="required">
            <?php } else { ?>
            <input type="text" class="form-control" name="mobile">
            <?php } ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label asterisk">Address</label>
        <div class="col-md-9">
            <?php if (isset($data['adminInfo']->address)) { ?>
            <textarea type="text" class="form-control" name="address"><?php if (!empty($data['adminInfo']->address)) echo $data['adminInfo']->address; ?></textarea>
            <?php } else { ?>
            <textarea type="text" class="form-control" name="address"></textarea>
            <?php } ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label asterisk">City</label>
        <div class="col-md-9">
            <?php if (isset($data['adminInfo']->city)) { ?>
            <input type="text" class="form-control" name="city" value="<?php if (!empty($data['adminInfo']->city)) echo $data['adminInfo']->city; ?>" required="required">
            <?php } else { ?>
            <input type="text" class="form-control" name="city" required="required">
            <?php } ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label asterisk">State</label>
        <div class="col-md-9">
            <?php if (isset($data['adminInfo']->state)) { ?>
            <input type="text" class="form-control" value="<?php if (!empty($data['adminInfo']->state)) echo $data['adminInfo']->state; ?>" name="state" required="required">
            <?php } else { ?>
            <input type="text" class="form-control" name="state" required="required">
            <?php } ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label asterisk">Zip</label>
        <div class="col-md-9">
            <?php if (isset($data['adminInfo']->zip)) { ?>
            <input type="text" class="form-control" value="<?php if (!empty($data['adminInfo']->zip)) echo $data['adminInfo']->zip; ?>" name="zip" required="required">
            <?php } else { ?>
            <input type="text" class="form-control" name="zip" required="required">
            <?php } ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label asterisk">Country</label>
        <div class="col-md-9">
            <?php if (isset($data['adminInfo']->country)) { ?>
            <input type="text" class="form-control" value="<?php if (!empty($data['adminInfo']->country)) echo $data['adminInfo']->country; ?>" name="country" required="required">
            <?php } else { ?>
            <input type="text" class="form-control" name="country" required="required">
            <?php } ?>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
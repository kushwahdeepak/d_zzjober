<form class="form-horizontal" action="<?php echo base_url();?>index.php/admin/vendorchangepassword" method="POST">
    <input type="hidden" name="user_id" value="<?php if (!empty($data['vendorinfo'])) echo $data['vendorinfo']->user_id; ?>">
    <div class="row">
        <div class="form-group col-sm-12 col-md-12">
            <label class="col-sm-2 control-label asterisk"> Password  </label>
            <div class="col-md-9">
                <input type="password" class="form-control" name="password" placeholder="Password" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;"required="required">
            </div>
        </div>
    </div>
    <div class="row">    
        <div class="form-group col-sm-12 col-md-12">
            <label class="col-sm-2 control-label asterisk"> Confrim Password </label>
            <div class="col-md-9">
                <input type="password" id="password_two" class="form-control" name="con_password" placeholder="Confrim Password"  pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');">
            </div>
        </div>
    </div>  

    <div class="modal-footer">
        <input type="button" id="customerInfosubmitbutton" class="btn btn-default" onclick="history.back();" value="Back">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </form>
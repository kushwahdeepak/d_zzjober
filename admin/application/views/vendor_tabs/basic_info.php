<form class="form-horizontal" id="updatevendorInfos" action="#" method="POST" accept-charset="utf-8"
      enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php if (!empty($data['vendorinfo'])) echo $data['vendorinfo']->user_id; ?>">
    <div class="row">
        <div class="form-group col-sm-6 col-md-6">
            <label class="col-sm-3 control-label asterisk"> First Name </label>
            <div class="col-md-9">
                <?php if (isset($data['vendorinfo']->first_name)) { ?>
                    <input type="text" class="form-control" name="fname" placeholder="First Name"
                           value="<?php if (!empty($data['vendorinfo']->first_name)) echo $data['vendorinfo']->first_name; ?>"
                           required="required">
                <?php } else { ?>
                    <input type="text" class="form-control" name="fname" placeholder="First Name" required="required">
                <?php } ?>
            </div>
        </div>
        <div class="form-group col-sm-6 col-md-6">
            <label class="col-sm-3 control-label asterisk"> Last Name </label>
            <div class="col-md-9">
                <?php if (isset($data['vendorinfo']->last_name)) { ?>
                    <input type="text" class="form-control" name="lname" placeholder="Last Name"
                           value="<?php if (!empty($data['vendorinfo']->last_name)) echo $data['vendorinfo']->last_name; ?>">
                <?php } else { ?>
                    <input type="text" class="form-control" name="lname" placeholder="Last Name">
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-6 col-md-6">
            <label class="col-sm-3 control-label asterisk"> Phone </label>
            <div class="col-md-9">
                <?php if (isset($data['vendorinfo']->phone)) { ?>
                    <input type="text" class="form-control col-sm-6" style="width:50%;" name="area_code"
                           value="<?php if (!empty($data['vendorinfo']->area_code)) echo $data['vendorinfo']->area_code; ?>"
                           required="required">
                    <input type="text" class="form-control col-sm-6" style="width:50%;" name="phone_no"
                           value="<?php if (!empty($data['vendorinfo']->phone)) echo $data['vendorinfo']->phone; ?>"
                           required="required">
                <?php } else { ?>
                    <input type="text" class="form-control col-sm-6" style="width:50%;" name="area_code"
                           required="required">
                    <input type="text" class="form-control col-sm-6" style="width:50%;" name="phone_no"
                           required="required">
                <?php } ?>
            </div>
        </div>
        <div class="form-group col-sm-6 col-md-6">
            <label class="col-sm-3 control-label asterisk"> Mobile </label>
            <div class="col-md-9">
                <?php if (isset($data['vendorinfo']->mobile)) { ?>
                    <input type="text" class="form-control" name="mobile" placeholder="Mobile"
                           value="<?php if (!empty($data['vendorinfo']->mobile)) echo $data['vendorinfo']->mobile; ?>">
                <?php } else { ?>
                    <input type="text" class="form-control" name="mobile" placeholder="Mobile">
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-6 col-md-6">
            <label class="col-sm-3 control-label asterisk"> Email </label>
            <div class="col-md-9">
                <?php if (isset($data['vendorinfo']->email)) { ?>
                    <input type="email" class="form-control" name="email" placeholder="Email"
                           value="<?php if (!empty($data['vendorinfo']->email)) echo $data['vendorinfo']->email; ?>"
                           required="required">
                <?php } else { ?>
                    <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                <?php } ?>
            </div>
        </div>
        <div class="form-group col-sm-6 col-md-6">
            <label class="col-sm-3 control-label asterisk"> City </label>
            <div class="col-md-9">
                <?php if (isset($data['vendorinfo']->city)) { ?>
                    <input type="text" class="form-control" name="city" placeholder="City"
                           value="<?php if (!empty($data['vendorinfo']->city)) echo $data['vendorinfo']->city; ?>"
                           required="required">
                <?php } else { ?>
                    <input type="text" class="form-control" name="city" placeholder="City" required="required">
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-6 col-md-6">
            <label class="col-sm-3 control-label asterisk"> State </label>
            <div class="col-md-9">
                <?php if (isset($data['vendorinfo']->state)) { ?>
                    <input type="text" class="form-control" name="state" placeholder="State"
                           value="<?php if (!empty($data['vendorinfo']->state)) echo $data['vendorinfo']->state; ?>">
                <?php } else { ?>
                    <input type="text" class="form-control" name="state" placeholder="State">
                <?php } ?>
            </div>
        </div>
        <div class="form-group col-sm-6 col-md-6">
            <label class="col-sm-3 control-label asterisk"> Zip </label>
            <div class="col-md-9">
                <?php if (isset($data['vendorinfo']->zip)) { ?>
                    <input type="number" class="form-control" name="zip" placeholder="Zip"
                           value="<?php if (!empty($data['vendorinfo']->zip)) echo $data['vendorinfo']->zip; ?>">
                <?php } else { ?>
                    <input type="number" class="form-control" name="zip" placeholder="Zip">
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-6 col-md-6">
            <label class="col-sm-3 control-label asterisk"> Gender </label>
            <div class="col-md-9">
                <?php if (isset($data['vendorinfo']->gender)) { ?>
                    <label style="border:1px solid #d4d4d4;width: 100%;padding: 7px;">
                        <input type="radio" name="gender"
                               value="female" <?php if (isset($data['vendorinfo']->gender) && $data['vendorinfo']->gender == "female") echo "checked" ?> >
                        <span>Female</span>
                        <input type="radio" name="gender"
                               value="male" <?php if (isset($data['vendorinfo']->gender) && $data['vendorinfo']->gender == "male") echo "checked" ?> >
                        <span> Male </span>
                    </label>
                <?php } else { ?>
                    <label style="border:1px solid #d4d4d4;width: 100%;padding: 7px;">
                        <input type="radio" name="gender" value="female"> <span>Female</span>
                        <input type="radio" name="gender" value="male"> <span> Male </span>
                    </label>
                <?php } ?>
            </div>
        </div>
        <div class="form-group col-sm-6 col-md-6">
            <label class="col-sm-3 control-label asterisk"> Address </label>
            <div class="col-md-9">
                <?php if (isset($data['vendorinfo']->address)) { ?>
                    <textarea type="text" class="form-control" name="address"
                              placeholder="Address"><?php if (!empty($data['vendorinfo']->address)) echo $data['vendorinfo']->address; ?>  </textarea>
                <?php } else { ?>
                    <textarea type="text" class="form-control" name="address" placeholder="Address">  </textarea>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <input type="button" id="customerInfosubmitbutton" class="btn btn-default" onclick="history.back();"
               value="Back">
        <button type="submit" id="vendorInfosubmitbutton" class="btn btn-primary">Update</button>
    </div>
    <div id="div1" style="width:80px;height:80px;display:none;background-color:red;"></div>

</form>
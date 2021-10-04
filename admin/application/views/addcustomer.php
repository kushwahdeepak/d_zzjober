<!--
  
  KARYON SOLUTIONS CONFidENTIAL
  __________________
  
    Author : Sudeep Gandhi
    Url - http://www.karyonsolutions.com  
    [2016] - [2017] Karyon Solutions 
    All Rights Reserved.
  
  NOTICE:  All information contained herein is, and remains
  the property of Karyon Solutions and its suppliers,
  if any.  The intellectual and technical concepts contained
  herein are proprietary to Karyon Solutions
  and its suppliers and may be covered by Indian and Foreign Patents,
  patents in process, and are protected by trade secret or copyright law.
  Dissemination of this information or reproduction of this material
  is strictly forbidden unless prior written permission is obtained
 from Karyon Solutions.
-->

<div class="content-wrapper">
     <?php if ($this->session->flashdata('success_msg') != "") { ?>
      <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> <?php echo $this->session->flashdata('success_msg'); ?>
      </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error_msg') != "") { ?>
      <div class="alert alert-warning alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
      </div>
    <?php } ?>

    <section class="content">
            <!-- Main content -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">  
                            <div class="col-md-6">
                                <h2 class="box-title floatalign_text_left"> Add Customer Info </h2>
                            </div>
                            <div class="col-md-6 pull-right">
                                <a href="<?php echo base_url(); ?>index.php/admin/customers" class="btn btn-default" style="float: right;"><i class="fa fa-reply"></i></a>
                            </div>
                        </div>


                        <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/addcustomerInfo" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="user_type" value="customer">
                            <input type="hidden" name="status" value="Active">

                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-3 control-label asterisk"> First Name </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="fname" placeholder="First Name" required="required">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-3 control-label asterisk"> Last Name </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name">  
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-3 control-label asterisk"> Phone </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control col-sm-6" style="width:50%;" name="area_code"  required="required">
                                        <input type="text" class="form-control col-sm-6" style="width:50%;" name="phone_no" required="required">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-3 control-label asterisk"> Mobile </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="mobile" required="required" placeholder="Mobile">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-3 control-label asterisk"> Email </label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                                    </div>
                                </div>
                                 <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-3 control-label asterisk"> State </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="state" placeholder="State">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-3 control-label asterisk"> City </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="city" placeholder="City">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-3 control-label asterisk"> Zip </label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="zip" placeholder="Zip">  
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-3 control-label asterisk"> Password </label>
                                    <div class="col-md-9">
                                        <input type="Password" id="password" class="form-control" name="password" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.confirmpassword.pattern = this.value;" placeholder="Password" required="required">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-3 control-label asterisk"> Confirm Password </label>
                                    <div class="col-md-9">
                                        <input type="Password" class="form-control" title="Password do not match" id="confirmpassword" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" name="confirmpassword" placeholder="Confirm Password" required="required">  
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-3 control-label asterisk"> Country </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="country" placeholder="Country">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-3 control-label asterisk"> Gender </label>
                                    <div class="col-md-9">
                                        <label style="border:1px solid #d4d4d4;width: 100%;padding: 7px;">
                                            <input type="radio" name="gender" value="female"> <span>Female</span>
                                            <input type="radio" name="gender" value="male"> <span> Male </span>
                                        </label>
                                    </div>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-3 control-label asterisk"> Address </label>
                                    <div class="col-md-9">
                                        <textarea type="text" class="form-control" required="required" name="address" placeholder="Address">  </textarea>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-3 control-label asterisk">Customer Image</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" style="display: none;"/>
                                        <label for="file-7"><span></span>
                                            <strong>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"> <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg>
                                                Upload Image&hellip;
                                            </strong>
                                        </label>
                                    </div>
                                </div>    
                            </div>
                            <div class="walk_request_button">
                                <button id="submitbutton" type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </form>
</section>
    </div>


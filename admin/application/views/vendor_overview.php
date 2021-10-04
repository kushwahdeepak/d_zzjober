        <!--
      KARYON SOLUTIONS CONFidENTIAL
        _________________
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

 <style type="text/css">  
 .td-center {
  vertical-align: middle !important;
  text-align: center;
}
.th-center {
  vertical-align: middle !important;
  text-align: center;
}
/*td {
  vertical-align: middle !important;
  text-align: center;
}
th {
  vertical-align: middle !important;
  text-align: center;
}*/
.service-inactive-status {
    background-color: #D8534F;
    border-color: #D8534F;
    font-size: 12px;
}
.service-status {
    background-color: #049600;
    border-color: #049600;
    font-size: 12px;
}
.service-status-icon {
    border: 1px solid;
    color: #fff;
    text-align: center;
    padding-top: 2px;
    padding-left: 10px;
    padding-right: 10px;
}
.bb-none {
    border: none;
    background: none;
}
input.star { display: none; }
label.star {
    float: right;
    padding: 3px;
    font-size: 16px;
    color: #444;
    transition: all .2s;
}
input.star:checked ~ label.star:before {
    content: '\f005';
    color: #FD4;
    transition: all .25s;
}
input.star-5:checked ~ label.star:before {
    color: #FE7;
    text-shadow: 0 0 20px #952;
}
input.star-1:checked ~ label.star:before { color: #F62; }
label.star:hover { transform: rotate(-15deg) scale(1.3); }
label.star:before {
    content: '\f006';
    font-family: FontAwesome;
}
.fix_size {
    width: 114px !important;
}
.margin0w100{
    margin-bottom: 0px;
    width: 100%;
}
</style>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <?php if ($this->session->flashdata('success_msg') != "") { ?>
    <div id="successalert" class="alert alert-success fadeIn alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> <?php echo $this->session->flashdata('success_msg'); ?>
    </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error_msg') != "") { ?>
    <div class="alert alert-warning alert-dismissable fadeIn">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
    </div>
    <?php } ?>

    <div id="div1" class="alert alert-success alert-dismissable" style="display: none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> Vendor Service Delete Successfully
    </div>

    <div id="div2" class="alert alert-warning alert-dismissable" style="display: none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning</strong> Vendor Service Appointment Exist
    </div>

    <div id="div3" class="alert alert-success alert-dismissable" style="display: none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> Basic Info Updated Successfully
    </div>

    <section class="content-header">
        <h1>Vendor Overview</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/admin/vendor"><i class="fa fa-dashboard"></i> Home </a></li>
            <li class="active">Vendor Overview</li>
        </ol>
        <div id="user_updation_id" user_id="<?php echo $data['vendorinfo']->user_id; ?>" style="display: none;"></div>
    </section>
    <!-- Main content -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="<?php if ($data['active'] == "basicinfo") echo "active"; ?>"><a href="#basicinfo" data-toggle="tab"> Basic Info </a></li>
                        <li class="<?php if ($data['active'] == "addvendorserivces") echo "active"; ?>"><a href="#addvendorserivces" data-toggle="tab"> Services </a></li>
                        <li class="<?php if ($data['active'] == "addemployees") echo "active"; ?>"><a href="#addemployees" data-toggle="tab"> Employee </a></li>
                        <li class="<?php if ($data['active'] == "appointmentlist") echo "active"; ?>"><a href="#appointmentlist" data-toggle="tab"> Appointment List </a></li>
                        <li class="<?php if ($data['active'] == "vendorpassword") echo "active"; ?>"><a href="#vendorpassword" data-toggle="tab"> Change Password </a></li>
                    </ul>

                    <div class="tab-content" style="padding-top: 0px;"> 

                       <div class="tab-pane <?php if ($data['active'] == "addvendorserivces") echo "active"; ?>" id="addvendorserivces">
                        <br>
                        <?php include('vendor_tabs/services.php'); ?>
                    </div> 

                    <div class="tab-pane <?php if ($data['active'] == "addemployees") echo "active"; ?>" id="addemployees">
                        <br>
                        <?php include('vendor_tabs/employee.php'); ?>

                    </div>
                    <div class="tab-pane <?php if ($data['active'] == "basicinfo") echo "active"; ?>" id="basicinfo">
                        <br>
                        <?php include('vendor_tabs/basic_info.php'); ?>
                    </div>

                    <div class="tab-pane <?php if ($data['active'] == "vendorpassword") echo "active"; ?>" id="vendorpassword">
                        <br>
                        <?php include('vendor_tabs/password.php'); ?>
                    </div>

                    <div class="tab-pane <?php if ($data['active'] == "appointmentlist") echo "active"; ?>" id="appointmentlist">
                     <?php include('vendor_tabs/appointment.php'); ?>            
                 </div>
             </div>
         </div>
     </div>
 </div>
</div> 
</div>
</div>
</div> 
</section>

<!-- Modal for creating customer starts -->
<div class="modal fade" id="addvendorserviceDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">                        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('add_sub_service'); ?></h4>
            </div>                        
            <form method="post" action="<?php echo base_url();?>index.php/admin/addvendorservice"> 
                <input type="hidden" name="user_id" value="<?php echo $data['vendorinfo']->user_id; ?>"> 
                <input type="hidden" name="ups_id" value="<?php if(!empty($data['vendorinfo'])) echo $data['vendorinfo']->ups_id; ?>">
                <input type="hidden" name="status" value="active">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="asterisk">Service Name</label>
                            <input type="text" name="service_name" class="form-control" placeholder="Service Name" required="required"/>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">                                       
                            <label class="asterisk">Service Charge</label>
                            <input type="text" name="service_charge" class="form-control" placeholder="Service Charge" required="required"/>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 col-md-6">                   
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label class="asterisk">Appointment Duration</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control timepicker" name="app_duration" required="required">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" onclick='' class="btn btn-primary">Add</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Modal for creating employee starts -->
<div class="modal fade" id="addemployeesDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">                        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('add_employee'); ?></h4>
            </div>                        
            <form method="post" action="<?php echo base_url();?>index.php/admin/addemployee" enctype="multipart/form-data"> 

                <input type="hidden" name="user_id" value="<?php if(!empty($data['vendorinfo'])) echo $data['vendorinfo']->user_id; ?>">
                <input type="hidden" name="ups_id" value="<?php if(!empty($data['vendorinfo'])) echo $data['vendorinfo']->ups_id; ?>">
                <input type="hidden" name="status" value="active">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="asterisk">Employee Name</label>
                            <input type="text" name="employee_name" class="form-control" placeholder="Name" required="required"/>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">                                       
                            <label class="asterisk">Employee Mobile</label>
                            <input type="text" name="employee_mobile" class="form-control" placeholder="Mobile" required="required"/>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="asterisk">Employee Services</label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="<?php echo $this->lang->line('select_service'); ?>" name="service[]" required="required" style="width: 100%;">>

                                    <?php foreach ($data['vendorserviceList']  as $service) { ?>
                                    <option value="<?php echo $service->usc_id ?>" <?php if($service->usc_status == 'Deactive') echo "disabled"; ?>  ><?php echo $service->usc_title ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                         <label> Add Image</label>
                         <input type="file" style="border: 1px solid #d4d4d4; padding: 4px 7px;" class="margin0w100" name="employee_img" accept="image/*" value="Image">
                     </div>
                 </div>

             </div>   

             <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" onclick='' class="btn btn-primary">Add</button>
            </div>
        </div>

    </form>
</div>
</div>
</div>

<!-- Modal for show status and review -->
<div class="modal fade" id="showreasonorreviewmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                        
            <div class="modal-header">
                <button type="button" class="close button-bg-none" data-dismiss="modal" aria-label="Close" style="color: #000 !important;"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title abc" id="exampleModalLabel"> <span id="contentdata"> </span> </h4>
            </div>                        
            <form method="post" action=""> 
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label>Phone :</label>
                            <span id="phone"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label>Mobile :</label>
                            <span id="mobile"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label>Email :</label>
                            <span id="email"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label>Address :</label>
                            <span id="address"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label id="label_dec"> :</label>
                            <span id="Description"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-red btn-xsmall" data-dismiss="modal">Close</button>
                </div>                
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){      
        $(document).on('click','.editable', function() {
            data = {};
            data['val'] = $(this).attr('data');
            data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');

            $.ajax({   

                type: "POST",  
                url: "<?php echo site_url(); ?>/admin/showreasonorreview",  
                cache:false,  
                data: data,
                dataType: "json",       
                success: function(response)  
                {   
                    if (response. appointment_status_id != 8 && response. appointment_status_id != 2 && response. appointment_status_id != 3) {
                        $('#Description').text("");
                        $('#contentdata').text("");
                        $('#phone').text("");
                        $('#mobile').text("");
                        $('#email').text("");
                        $('#Address').text("");
                        $('#contentdata').text("Info");
                        $('#label_dec').text("Info :");
                        $('#phone').text(response.area_code+'-'+response.phone);
                        $('#mobile').text('+971-'+response.mobile);
                        $('#email').text(response.email);
                        $('#Address').text(response.address+'<br>'+response.city);
                        $('#Description').text(response.review_des ); 
                        $('#showreasonorreviewmodel').modal({'show' : true});
                    } else if (response. appointment_status_id == 8) {
                        $('#Description').text("");
                        $('#contentdata').text("");
                        $('#phone').text("");
                        $('#mobile').text("");
                        $('#email').text("");
                        $('#Address').text("");
                        $('#contentdata').text("Reviewed");
                        $('#label_dec').text("Reviewed :");
                        $('#phone').text(response.area_code+'-'+response.phone);
                        $('#mobile').text('+971-'+response.mobile);
                        $('#email').text(response.email);
                        $('#Address').text(response.address+'<br>'+response.city);
                        $('#Description').text(response.review_des ); 
                        $('#showreasonorreviewmodel').modal({'show' : true});
                    } else {
                        $('#Description').text("");
                        $('#phone').text("");
                        $('#mobile').text("");
                        $('#email').text("");
                        $('#Address').text("");
                        $('#contentdata').text("");
                        $('#contentdata').text("Cancel Reason");
                        $('#label_dec').text("Cancel Reason :");
                        $('#phone').text(response.area_code+'-'+response.phone);
                        $('#mobile').text('+971-'+response.mobile);
                        $('#email').text(response.email);
                        $('#Address').text(response.address+'<br>'+response.city);
                        $('#Description').text(response.cancel_reason ); 
                        $('#showreasonorreviewmodel').modal({'show' : true});
                    }
                }   

            });
        });
    });
</script> 

<script>  
   $(function(){
        $("#vendorInfosubmitbutton").click(function(e){  // passing down the event 

            $.ajax({
                url:'<?php echo base_url(); ?>index.php/admin/updatevendorInfo',
                type: 'POST',
                data: $("#updatevendorInfos").serialize(),
                success: function(response){
                    $('#div3').fadeIn();  
                }
            });
            e.preventDefault(); // could also use: return false;
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){      
      $(document).on('focusout','.editable-col', function() {
        data = {};
        data['val'] = $(this).val();
        data['index'] = $(this).attr('col-index');
        data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
        $.ajax({
            type: "POST",  
            url: "<?php echo site_url(); ?>/admin/updateInline/vendorservice",  
            cache:false,  
            data: data,
            dataType: "json",       
            success: function(response)  
            {   
            }   
        });
    });
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){      
      $(document).on('change','.editable-change', function() {
        data = {};
        data['val'] = $(this).val();
        data['index'] = $(this).attr('col-index');

        if(data['index'] == 4 || data['index'] == 5 || data['index'] == 6 || data['index'] == 7 || data['index'] == 8 || data['index'] == 9 || data['index'] == 10) {
            data['id'] = $(this).attr('data-id');
            $.ajax({ 
                type: "POST",  
                url: "<?php echo site_url(); ?>/admin/updateInline/vendorservice",  
                cache:false,  
                data: data,
                dataType: "json",       
                success: function(response)  
                {   
                }   
            });
        } else {
            if(data['index'] == 3) {
                data['id'] = $(this).parent('div').parent('td').parent('tr').attr('data-row-id');
            } else {
                data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            }
            $.ajax({
                type: "POST",  
                url: "<?php echo site_url(); ?>/admin/updateInline/vendorservice",  
                cache:false,  
                data: data,
                dataType: "json",       
                success: function(response)  
                {   
                }   
            });
        }

    });
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){      
        $(document).on('click','.editable-action', function() {

            data = {};
            data['user_id'] = $('#user_updation_id').attr('user_id');
            data['val'] = $(this).attr('data');
            data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');

            if(data['index'] == 9) {   

                if(confirm('Are you sure you want to delete this Service?')) {
                    $.ajax({   

                        type: "POST",  
                        url: "<?php echo base_url(); ?>/index.php/admin/updateInline/vendorservice",  
                        cache:false,  
                        data: data,
                        dataType: "json",       
                        success: function(response)  
                        {   
                            if(response.msg == "success") {

                                if (data['index'] == 8) {
                                    $(window).load(setTimeout(function(){
                                    window.location.href='<?php echo site_url(); ?>/admin/vendorOverview/addvendorserivces?user_id='+data['user_id']
                                    }, 400));
                                }  
                                if (data['index'] == 9) {
                                    $(window).load(setTimeout(function(){
                                    window.location.href='<?php echo site_url(); ?>/admin/vendorOverview/addvendorserivces?user_id='+data['user_id']
                                    }, 400));
                                    $("#div1").fadeIn();
                                }    
                            } else {
                                $("#div2").fadeIn();
                            }  
                        }   
                    });
                } 
            } else {
                $.ajax({   
                    type: "POST",  
                    url: "<?php echo base_url(); ?>/index.php/admin/updateInline/vendorservice",  
                    cache:false,  
                    data: data,
                    dataType: "json",       
                    success: function(response)  
                    {   
                        if(response.msg == "success") {

                            if (data['index'] == 8) {                                
                                $(window).load(setTimeout(function(){
                                window.location.href='<?php echo site_url(); ?>/admin/vendorOverview/addvendorserivces?user_id='+data['user_id']
                                }, 400));
                            }  
                            if (data['index'] == 9) {
                                $(window).load(setTimeout(function(){
                                window.location.href='<?php echo site_url(); ?>/admin/vendorOverview/addvendorserivces?user_id='+data['user_id']
                                }, 400));
                                $("#div1").fadeIn();
                            }    
                        } else {
                            $("#div2").fadeIn();
                        }  
                    }   
                });
            }  
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){      
      $(document).on('focusout','.editable-employee-col', function() {
        data = {};
        data['val'] = $(this).val();
        data['index'] = $(this).attr('col-index');
        data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
        $.ajax({
            type: "POST",  
            url: "<?php echo site_url(); ?>/admin/updateInline/employees",  
            cache:false,  
            data: data,
            dataType: "json",       
            success: function(response)  
            {   
                if(response.msg == "error") {
                    $('#error_employee_msg').html("");
                    $('#error_employee_msg').append("Appointment of this employee is present");
                }
            }   
        });
    });
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){      
        $(document).on('click','.editable-employee-action', function() {

            data = {};
            data['user_id'] = $('#user_updation_id').attr('user_id');
            data['val'] = $(this).attr('data');
            data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');

            if(data['index'] == 4) {   
                if(confirm('Are you sure you want to delete this Employee?')) {

                    $.ajax({   
                        type: "POST",  
                        url: "<?php echo base_url(); ?>/index.php/admin/updateInline/employees",  
                        cache:false,  
                        data: data,
                        dataType: "json",       
                        success: function(response)  
                        {   
                         if(response.msg == "success") {

                            if (data['index'] == 3) {
                                $(window).load(setTimeout(function(){
                                window.location.href='<?php echo site_url(); ?>/admin/vendorOverview/addemployees?user_id='+data['user_id']
                                }, 400));
                            }  
                            if (data['index'] == 4) {
                                $(window).load(setTimeout(function(){
                                window.location.href='<?php echo site_url(); ?>/admin/vendorOverview/addemployees?user_id='+data['user_id']
                                }, 400));
                                $("#div1").fadeIn();
                            }    
                        } else {
                            $("#div2").fadeIn();
                        }  
                    }   
                });
                }
            }else{
                $.ajax({   
                    type: "POST",  
                    url: "<?php echo base_url(); ?>/index.php/admin/updateInline/employees",  
                    cache:false,  
                    data: data,
                    dataType: "json",       
                    success: function(response)  
                    {   
                        if(response.msg == "success") {

                            if (data['index'] == 3) {
                                $(window).load(setTimeout(function(){
                                window.location.href='<?php echo site_url(); ?>/admin/vendorOverview/addemployees?user_id='+data['user_id']
                                }, 400));
                            }  
                            if (data['index'] == 4) {
                                $(window).load(setTimeout(function(){
                                window.location.href='<?php echo site_url(); ?>/admin/vendorOverview/addemployees?user_id='+data['user_id']
                                }, 400));
                                $("#div1").fadeIn();
                            }    
                        } else {
                            $("#div2").fadeIn();
                        }  
                    }   
                });
            }  

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){      
      $(document).on('change','#employee_services_change', function() {
        data = {};
        data['val'] = $(this).val();
        data['index'] = $(this).attr('col-index');
        data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
        $.ajax({
            type: "POST",  
            url: "<?php echo site_url(); ?>/admin/updateInline/employeeservice",  
            cache:false,  
            data: data,
            dataType: "json",       
            success: function(response)  
            {   
                if(response.msg == "error") {
                    $('#error_employee_msg').html("");
                    $('#error_employee_msg').append("Appointment of this employee is present");
                }
            }   
        });
    });
  });
</script>
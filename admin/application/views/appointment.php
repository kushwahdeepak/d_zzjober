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

<!-- admin_customers.php starts -->

<style type="text/css">  
.td-center {
  vertical-align: middle !important;
  text-align: center;
}
.th-center {
  vertical-align: middle !important;
  text-align: center;
}
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
</style>

<div class="content-wrapper">


        <section class="content-header">
            <h1> Appointment List </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url();?>index.php/admin"><i class="fa fa-dashboard"></i>admin</a></li>
                <li class="active"> Appointment List </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <h2 class="box-title floatalign_text_left"> Appointment List </h2>
                                </div>
                                <div class="col-sm-6 col-md-6" style="text-align:right; float: right;">                         

                                    <a href="<?php echo base_url();?>index.php/admin/appointment/all" class="btn btn-default <?php if($data['task'] == "all") echo "active"; ?>" > all </a>
                                    <a href="<?php echo base_url();?>index.php/admin/appointment/today" class="btn btn-default <?php if($data['task'] == "today") echo "active"; ?>" > day </a>
                                    <a href="<?php echo base_url();?>index.php/admin/appointment/week" class="btn btn-default <?php if($data['task'] == "week") echo "active"; ?>" > week </a>
                                    <a href="<?php echo base_url();?>index.php/admin/appointment/month" class="btn btn-default <?php if($data['task'] == "month") echo "active"; ?>" > month </a>

                                    <!-- <span class="dropdown pull-right" style="margin-left: 3px;">
                                        <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown"><i class="fa fa-bolt"></i>&nbsp;Action
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                            <li role="presentation">
                                                <a href="<?php echo base_url();?>index.php/admin/appointment/<?php echo $data['task']; ?>/" class="importform btn" > Pending Appointment </a>
                                            </li>   
                                            <div class="divider"></div>
                                            <li role="presentation">
                                                <a href="<?php echo base_url();?>index.php/admin/appointment/<?php echo $data['task']; ?>/" class="importform btn" > Cancel Appointment </a>
                                            </li>   
                                            <div class="divider"></div>
                                            <li role="presentation">
                                                <a href="<?php echo base_url();?>index.php/admin/appointment/<?php echo $data['task']; ?>/" class="importform btn" > Complete Appointment </a>
                                            </li>   
                                            <div class="divider"></div>
                                                         
                                        </ul>
                                    </span> -->
                            </div> 
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> No.ticket </th>
                                    <th> Customer </th>
                                    <th> Vendor </th>
                                    <th> Service </th>
                                    <th> sub Service </th>
                                    <th> Employee Name </th>
                                    <th> DateTime</th>
                                    <th> Price </th>
                                    <th> Transaction </th>
                                    <th style="width: 80px;"> Reviewed </th>
                                    <th class="th-center"> Status </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if($data['task'] == "month"){
                                    foreach ($data['appointmentlists'] as $appointment) { 
                                        $currentmonth = date('m');
                                        $month = date('m',strtotime($appointment->date));
                                        if($currentmonth == $month) { 
                                            ?>
                                            <?php   include('appointment_tr.php'); ?>

                                            <?php } } } else if($data['task'] == "week") { 
                                                foreach ($data['appointmentlists'] as $appointment) { 

                                                    $monday = strtotime("last monday");
                                                    $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

                                                    $sunday = strtotime(date("Y-m-d",$monday)." +6 days");

                                                    $this_week_sd = date("Y-m-d",$monday);
                                                    $this_week_ed = date("Y-m-d",$sunday);

                                                    $week = date('Y-m-d',strtotime($appointment->date));
                                                    if($this_week_sd <= $week && $this_week_ed >= $week) { 
                                                        ?>
                                                        <?php   include('appointment_tr.php'); ?>

                                                        <?php } } } else if($data['task'] == "today") {
                                                            foreach ($data['appointmentlists'] as $appointment) { 
                                                                $currentdate = date('Y-m-d');
                                                                $today = date('Y-m-d',strtotime($appointment->date));
                                                                if($currentdate == $today) { 
                                                                    ?>
                                                                    <?php   include('appointment_tr.php'); ?>

                                                                    <?php } } } else { 
                                                                        foreach ($data['appointmentlists'] as $appointment) { 
                                                                            ?>
                                                                            <?php   include('appointment_tr.php'); ?>

                                                                            <?php } } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

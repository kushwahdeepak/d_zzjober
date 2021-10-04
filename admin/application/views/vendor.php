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
    td {
      vertical-align: middle !important;
      text-align: center;
  }
  th {
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
</style>

<div class="content-wrapper">
<!-- 
    <?php if ($this->session->flashdata('success_msg') != "") { ?>
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Successfully</strong> <?php echo $this->session->flashdata('success_msg'); ?>
        </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error_msg') != "") { ?>
        <div class="alert alert-warning alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Warnig!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
        </div>
    <?php } ?> -->

     <div id="div1" class="alert alert-success alert-dismissable" style="display: none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> Vendor Delete Successfully
    </div>

     <div id="div2" class="alert alert-warning alert-dismissable" style="display: none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning</strong> Vendor Appointment Exist
    </div>

    <!-- <div id="div3" class="alert alert-success alert-dismissable" style="display: none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> Vendor Status Update Successfully
    </div> -->

    <section class="content-header">
        <h1> Vendor </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>index.php/admin"><i class="fa fa-dashboard"></i>admin</a></li>
            <li class="active"> Vendor </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- <div class="box-header">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <h2 class="box-title floatalign_text_left"> Vendor List </h2>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <a href="<?php echo base_url(); ?>index.php/admin/addvendor" class="btn btn-primary text__align__right floatalign_text_right"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div> -->
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> Image </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Phone </th>
                                    <th> Mobile </th>
                                    <th> Service </th>
                                    <th> Sub service </th>
                                    <th> Employees </th>
                                    <th> Current Appointment </th>
                                    <th> Status </th>
                                    <th style="width: 14%;"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['vendorinfolist'] as $vendorinfo) { 
                                    $vendorpendingcount = $this->adminmodel->getvendorappointmentpending($vendorinfo->user_id);
                                    $vendorservicecount = $this->adminmodel->getvendorservice($vendorinfo->user_id);
                                    $vendoremployeecount = $this->adminmodel->getvendoremployee($vendorinfo->user_id);
                                    ?>
                                    <tr data-row-id="<?php echo $vendorinfo->user_id;?>"  id="vendorAction<?php echo $vendorinfo->user_id;?>" <?php if($vendorinfo->confirm_register == "not_confirm") echo "style='background-color:#ff00001c;'" ?> >
                                        <td>
                                            <?php if ($vendorinfo->user_img == 'NULL' || $vendorinfo->user_img == '') { ?>
                                            <img class="profile-user-img img-responsive img-circle user__img" src="<?php echo base_url(); ?>images/profile_img.jpg">
                                            <?php } else { ?>
                                            <img class="profile-user-img img-responsive img-circle user__img" src='<?php echo base_url(); ?>images/vendor/<?php echo $vendorinfo->user_img; ?>'/>
                                            <?php } ?>    
                                        </td>
                                        <td>
                                           <a href="<?php echo base_url(); ?>index.php/admin/vendorOverview?user_id=<?php echo $vendorinfo->user_id ?>">
                                            <?php if(!empty($vendorinfo->first_name)) echo $vendorinfo->first_name; ?>
                                            <?php if(!empty($vendorinfo->last_name)) echo $vendorinfo->last_name; ?>
                                        </a>
                                    </td>
                                    <td> <?php if(!empty($vendorinfo->email)) echo $vendorinfo->email; ?> </td>
                                    <td> 
                                        <?php if(!empty($vendorinfo->area_code)) echo $vendorinfo->area_code; ?>
                                        <?php if(!empty($vendorinfo->phone)) echo " - ".$vendorinfo->phone; ?> 
                                    </td>
                                    <td> <?php if(!empty($vendorinfo->mobile)) echo $vendorinfo->mobile; ?> </td>
                                    <td> <?php if(!empty($vendorinfo->service_title)) echo $vendorinfo->service_title; ?> </td>
                                    <td> <?php if(!empty($vendorservicecount)) echo $vendorservicecount; else echo "N/A"; ?> </td>
                                    <td> <?php if(!empty($vendoremployeecount)) echo $vendoremployeecount; else echo "N/A"; ?> </td>


                                    <td> <?php if (!empty($vendorpendingcount)) echo $vendorpendingcount; else echo "N/A"; ?> </td>


                                    <td> 
                                        <?php if($vendorinfo->user_status == 'Active') { ?> 
                                        <span class="service-status service-status-icon">   <?php if (!empty($vendorinfo->user_status)) echo $vendorinfo->user_status; ?> </span>
                                        <?php } else { ?>
                                        <span class="service-inactive-status service-status-icon">   <?php if (!empty($vendorinfo->user_status)) echo $vendorinfo->user_status; ?> </span>
                                        <?php } ?>    
                                    </td>

                                    <td class="text-center">

                                        <?php  if($vendorinfo->confirm_register == "not_confirm") { ?>

                                            <a href="javascript:void(0)" col-index='3' data="0" class="btn btn-info editable-action">Add</a>
                                            <a href="javascript:void(0)" col-index='4' data="0" class="btn btn-danger editable-action">Remove</a> 

                                        <?php } else { ?>

                                            <?php if($vendorinfo->user_status == 'Active') { ?>                          
                                            <a href="javascript:void(0)" class="btn btn-primary editable-action" col-index='1' data="Deactive"><i class="fa fa-thumbs-up"></i></a>
                                            <?php } else { ?>                          
                                            <a href="javascript:void(0)" class="btn btn-default editable-action" col-index='1' data="Active"><i class="fa fa-thumbs-down"></i></a>
                                            <?php } ?>
                                            <a href="<?php echo base_url(); ?>index.php/admin/vendorOverview?user_id=<?php echo $vendorinfo->user_id ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" col-index='2' data="0" class="btn btn-danger editable-action"><i class="fa fa-trash"></i></a> 

                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>    





<script type="text/javascript">
    $(document).ready(function(){      
        $(document).on('click','.editable-action', function() {


            data = {};
            data['val'] = $(this).attr('data');
            data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');

            if(data['index'] == 2) {

                if(confirm('Are you sure you want to delete this Vendor?')) {

                    $.ajax({   

                        type: "POST",  
                        url: "<?php echo base_url(); ?>/index.php/admin/updateInline/vendordelete",  
                        cache:false,  
                        data: data,
                        dataType: "json",       
                        success: function(response)  
                        {   
                            if(response.msg == "success") {

                                if (data['index'] == 1) {
                                    location.reload();
                                    $("#div1").fadeIn();
                                }
                                if (data['index'] == 2) {
                                    location.reload();
                                    $("#div3").fadeIn();
                                }    
                            } else {
                                $("#div2").fadeIn();
                            }  
                        }   
                    });
                }    
            }
            else 
            {
                $.ajax({   

                type: "POST",  
                url: "<?php echo base_url(); ?>/index.php/admin/updateInline/vendordelete",  
                cache:false,  
                data: data,
                dataType: "json",       
                success: function(response)  
                {   
                    if(response.msg == "success") {

                        if (data['index'] == 1) {
                            location.reload();
                            $("#div1").fadeIn();
                        }
                        if (data['index'] == 2) {
                            location.reload();
                            $("#div3").fadeIn();
                        } else {
                            location.reload();
                        }  
                    } else {
                        $("#div2").fadeIn();
                        location.reload();
                    } 
                } 

            });
        }
   });
});
</script>
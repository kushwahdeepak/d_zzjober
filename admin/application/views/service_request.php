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
    <?php } ?>

     <div id="div1" class="alert alert-success alert-dismissable" style="display: none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> <?php echo $this->lang->line('request_for_service'); ?> has Accepted Confrimation Email has Send to Register Email Id  Successfully
    </div>

     <div id="div2" class="alert alert-success alert-dismissable" style="display: none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> <?php echo $this->lang->line('request_for_service'); ?> has Cancel Email has Send to Register Email Id 
    </div>

     <div id="div3" class="alert alert-warning alert-dismissable" style="display: none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning</strong> Something Went Wrong Please Try Again
    </div>

    <section class="content-header">
        <h1>Service Request</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url();?>index.php/admin"><i class="fa fa-dashboard"></i>admin</a></li>
                <li class="active">Service Request</li>
            </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Service Name </th>
                                    <th> Description </th>
                                    <th style="width: 14%;"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data['servicesrequestlist'] as $servicesrequest) { ?>
                                <tr data-row-id="<?php echo $servicesrequest->request_service_id;?>"  id="servicerequestAction<?php echo $servicesrequest->request_service_id;?>">
                                    <td> <?php if (!empty($servicesrequest->name)) echo $servicesrequest->name; ?> </td>
                                    <td> <?php if (!empty($servicesrequest->email)) echo $servicesrequest->email; ?> </td>
                                    <td> <?php if (!empty($servicesrequest->service_name)) echo $servicesrequest->service_name; ?> </td>
                                    <td> <?php if (!empty($servicesrequest->service_des)) echo $servicesrequest->service_des; ?> </td>
                                    <td>
                                        <a href="<?php echo site_url(); ?>/admin/updateservicerequeststatus/confirm?requested_servcie_id=<?php echo $servicesrequest->request_service_id; ?>" class="btn btn-info editable-action"><i class="fa fa-check"></i></a>

                                        <a href="<?php echo site_url(); ?>/admin/updateservicerequeststatus/cancel?requested_servcie_id=<?php echo $servicesrequest->request_service_id; ?>" class="btn btn-danger editable-action"><i class="fa fa-times"></i></a> 
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
            $(".editable-action").prop('disabled', true);
        });
    });
</script>
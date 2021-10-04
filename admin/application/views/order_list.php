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
    .td-center {
        vertical-align: middle !important;
        text-align: center;
    }
    .th-center {
        vertical-align: middle !important;
        text-align: center;
    }
</style>

<div class="content-wrapper">
    
    <section class="content-header">
        <h1>Orders </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url();?>index.php/admin"><i class="fa fa-dashboard"></i>Admin</a></li>
                <li class="active">Orders </li>
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
                                <h2 class="box-title floatalign_text_left">Orders </h2>
                            </div>
                            <div class="col-sm-6 col-md-6">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> Oder Id </th>
                                    <th> Booked On Date </th>
                                    <th> Booked On Time </th>
                                    <th> Client Name </th>
                                    <th> Quantity </th>
                                    <th> Amount </th>
                                    <th> Shipment  </th>
                                    <th class="th-center" style="width: 14%;"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['AllOrderList'] as $order) { 

                                    $clientname = $this->adminmodel->getUserName($order->user_id);
                                    $QuantityCount = $this->adminmodel->getQuantityCount($order->invoice_id);

                                    ?>
                                    <tr>

                                        <td> <?php echo $order->invoice_id ?> </td>
                                        <td> 
                                             <?php echo date('d M, Y', strtotime($order->order_date)); ?>
                                        </td>
                                        <td> 
                                             <?php echo date('h:i A', strtotime($order->order_date)); ?>
                                        </td>
                                        <td> <?php echo $clientname->first_name ?> </td>
                                        <td> <?php echo $QuantityCount ?> </td>
                                        <td> <?php echo $order->total_payment ?> </td>
                                        <td> <?php echo $order->address ?>,<?php echo $order->city ?> </td>
                                        
                                        <td> 
                                            <a href="<?php echo base_url(); ?>index.php/admin/order_overview?order_id=<?php echo $order->invoice_id ?>">
                                                <i class="fa fa-eye"> </i> View
                                            </a> 
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

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
<!-- admin_customers.php starts -->
<div class="content-wrapper">


    <section class="content-header">
        <h1>Customers</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>index.php/admin"><i class="fa fa-dashboard"></i>admin</a></li>
            <li class="active">Customers</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> S. No. </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Subject </th>
                                    <th> Review </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                  <?php foreach ($data['contactus'] as $contact) { ?>
                                    <tr>
                                      <td><?php echo $contact->contact_id; ?></td>
                                      <td><?php echo $contact->name; ?></td>
                                      <td><?php echo $contact->email; ?></td>
                                      <td><?php echo $contact->subject; ?></td>
                                      <td><?php echo $contact->review; ?></td> 
                                      <td>
                                         <a href="<?php echo base_url(); ?>index.php/admin/contact_status/Delete?contact_id=<?php echo $contact->contact_id; ?>">
                                          <i class="fa fa-trash" style="color: red;"></i>
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


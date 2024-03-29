  <!--

    KARYON SOLUTIONS CONFIDENTIAL
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

 <div class="content-wrapper" style="min-height: 946px;">

  <div class="row">
    <div class="col-md-12">
      <?php if (isset($successmsg)) { ?>
      <div class="alert alert-success alert-dismissable fade in login-warning-block">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong>&nbsp;<?php echo $successmsg; ?>
      </div>
      <?php } ?>
      <?php if (isset($errormsg)) { ?>
      <div class="alert alert-danger alert-dismissable fade in login-error-block">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error!</strong>&nbsp;<?php echo $errormsg; ?>
      </div>
      <?php } ?>
    </div>
  </div>
  <section class="content-header">
    <h1>
      Mailbox
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/admin"><i class="fa fa-dashboard"></i> admin</a></li>
      <li class="active">Mailbox</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        
        <?php include('notifications_sidebar.php'); ?>
        
        </div>
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="box-title">Read Mail</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3 style="margin: 5px 0px;"><b>Subject:</b> <b><?php if(!empty($data['notificationInfo']->subject)) echo $data['notificationInfo']->subject; ?></b></h3>               
                <h5> <b>From:</b>
                 <?php 
                 $this->db->select('*');
                 $this->db->from('users');
                 $this->db->where('user_id', $data['notificationInfo']->from_user );
                 $query = $this->db->get();
                 if ( $query->num_rows() > 0 )
                 {
                  $row = $query->row_array();
                  echo $row['first_name'] ;
                  echo " " ;
                  echo $row['last_name'] ;
                }
                ?>
                <span class="mailbox-read-time pull-right"><?php if(!empty($data['notificationInfo']->datetime)) echo $data['notificationInfo']->datetime; ?></span></h5>               
                <h5> <b>To:</b>
                 <?php 
                 echo $data['notificationInfo']->first_name;
                 echo " ";
                 echo $data['notificationInfo']->last_name;
                 ?>
                 <span class="mailbox-read-time pull-right"><?php if(!empty($data['notificationInfo']->datetime)) echo $data['notificationInfo']->datetime; ?></span></h5>                 
               </div>
               <!-- /.mailbox-read-info -->
               <div class="mailbox-read-message">
                <h3 style="margin-top: 0px;"><b>Message:</b></h3>
                <p><?php echo $data['notificationInfo']->message; ?></p>
              </div>
            </div>
            <div class="box-footer">
              <a href="<?php echo base_url();?>index.php/admin/deleteReadMail?notification_id=<?php echo $data['notificationInfo']->notification_id;?>"><button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button></a>
              <!-- <a href="<?php echo base_url();?>index.php/admin/sendnotificationmail?mail_id=<?php echo $data['notificationInfo']->notification_id;?>"><button type="button" class="btn btn-default"><i class="fa fa-envelope-o"></i> Email</button></a> -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
    function printFunctionmail() { 
      window.print();
    }
  </script>
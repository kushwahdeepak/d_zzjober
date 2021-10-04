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

<div class="content-wrapper" style="min-height: 946px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Mailbox
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/admin"><i class="fa fa-dashboard"></i> admin</a></li>
      <li class="active">Mailbox
        <x
        /li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          
          <?php include('notifications_sidebar.php'); ?>
          
          </div>
          <div class="col-md-9">
            <div class="box box-primary">
              <div class="box-header">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" onclick="deleteMail()"><i class="fa fa-trash-o"></i>
                  </button>
                </div>
                <button type="button" class="btn btn-default btn-sm" onClick="refreshPage()"><i class="fa fa-refresh"></i>
                </button>
                <div class="box-tools pull-right">
                  <div class="has-feedback">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                  </div>
                </div>
              </div>

              <div class="box-body table-responsive" style="margin-top: -54px;">
                <form id="deleteMail" action="<?php echo base_url();?>index.php/admin/deleteMail" method="POST">
                  <table  id="example22" class="table table-hover table-striped" style="margin-top: 12px !important;">
                    <thead style="display: none;">
                      <tr>
                        <th></th>    
                        <th></th>                    
                        <th></th>   
                        <th></th>  
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['sentNotificationInfo'] as $notification) { ?>
                      <tr>
                        <td><input type="checkbox" name="notifications[]" value="<?php echo $notification->notification_id; ?>"></td>
                        <td class="mailbox-name"><?php echo $notification->first_name; ?> <?php echo $notification->last_name; ?></td>
                        <td class="mailbox-subject">
                          <b><?php echo $notification->subject; ?></b> - 
                          <?php 
                          if (strlen($notification->message) < 60)
                            echo $notification->message;
                          else
                            echo substr($notification->message, 0, 57) . " . . . "."<a href='index.php/admin/readMail?mail_id=$notification->notification_id&sub=".$data['subPageName']."' style='color: #f66f3d;'>continue reading</a>";
                          ?>
                        </td>
                        <td class="mailbox-date">
                         <?php 

                         $currentdate = date('d M Y');
                         $notificationdate = date('d M Y',strtotime($notification->datetime));       
                         
                         $datetime1 = new DateTime($currentdate);
                         $datetime2 = new DateTime($notificationdate);

                         $interval = $datetime1->diff($datetime2);
                         if($interval->format('%y years') != 0)
                          echo $interval->format('%y years');echo " ";
                        if($interval->format('%m months') != 0)
                          echo $interval->format('%m months');echo " ";
                        if($interval->format('%d days') != 0)
                          echo $interval->format('%d days');echo " ";
                        if($interval->format('%y years') == 0 &&  $interval->format('%m months') == 0 &&  $interval->format('%d days') == 0 )
                          echo "Today";
                        if($interval->format('%y years') != 0 || $interval->format('%m months') != 0 || $interval->format('%d days') != 0 )
                          echo "ago";
                        ?>
                      </td>
                    </tr>                    
                    <?php } ?>
                  </tbody>
                </table>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  function refreshPage() {
    window.location.reload();
  }
</script>
<script>
  function deleteMail() {
    document.getElementByid("deleteMail").submit();
  }
</script>
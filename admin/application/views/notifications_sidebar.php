<!-- <?php if($data['subPageName'] == "COMPOSEMAIL") { ?>
  <a href="<?php echo base_url();?>index.php/admin/notifications" class="btn btn-primary btn-block margin-bottom">BacK to Inbox</a>
<?php } else { ?>
  <a href="<?php echo base_url(); ?>index.php/admin/composeMail" class="btn btn-primary btn-block margin-bottom">Compose</a>
<?php } ?> -->

<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Folders</h3>
    <div class="box-tools">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked">
      <li class="<?php if($data['subPageName'] == "NOTIFICATIONS") echo "active"; ?>">
        <a href="<?php echo base_url(); ?>index.php/admin/notifications"><i class="fa fa-inbox"></i> 
          Inbox
          <span class="label label-primary pull-right"><?php echo $data['notificationCount']; ?></span>
        </a>
      </li>
      <!-- <li class="<?php if($data['subPageName'] == "SENTNOTIFICATIONS") echo "active"; ?>">
        <a href="<?php echo base_url(); ?>index.php/admin/sentNotifications"><i class="fa fa-envelope-o"></i>
          Sent
          <span class="label label-info pull-right"><?php echo $data['sentNotificationCount']; ?></span>
        </a>
      </li>  -->     
      <li class="<?php if($data['subPageName'] == "TRASHNOTIFICATIONS") echo "active"; ?>">
        <a href="<?php echo base_url(); ?>index.php/admin/trashNotifications"><i class="fa fa-trash-o"></i>
          Trash
          <span class="label label-danger pull-right"><?php echo $data['trashNotificationCount']; ?></span>
        </a>
      </li>
    </ul>
  </div>
</div>
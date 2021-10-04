<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img class="thumbnail" src="<?php echo base_url();?>/assets/images/snoopyjob.png" style="width: 100%;background: transparent;border: navajowhite;">
  </div>
  <!-- /.login-logo -->
            <?php if ($this->session->flashdata('error_msg') != "") { ?>
                <div class="alert alert-warning alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Warning!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('success_msg') != "") { ?>
                <div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Successfully</strong> <?php echo $this->session->flashdata('success_msg'); ?>
                </div>
            <?php } ?>




 <!--  <div class="alert alert-warning alert-dismissable fade in login-warning-block" style="display: none;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong>&nbsp;please enter username and password
  </div>



  <div class="alert alert-danger alert-dismissable fade in login-error-block" style="display: none;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Invalid!</strong>&nbsp;username or password
  </div> -->



  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form method="post" action="<?php echo site_url('login'); ?>" name="loginform">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" required="required"/>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" class="form-control" type="password" name="password" placeholder="Password"
               required="required"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div>
        <!-- /.col -->
        <div>
          <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-key"></i>&nbsp;login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>

<div class="modal fade " tabindex="-1" role="dialog" id='myModal'>
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id='errTitle'>Modal title</h4>
      </div>
      <div class="modal-body">
        <p id='errMsg'></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        <!--<button type="button" class="btn btn-primary"><?php echo $this->lang->line('save_changes'); ?></button>-->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

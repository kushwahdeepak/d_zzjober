<form name="login_info_form" action="<?php echo site_url('user_controller/updateLoginInfo');?>" method="post">                        
   <div class="row">
      <div class="col-md-6">
         <label for="currentpassword" class="form-label">senha atual<span class="required">*</span></label>
         <input type="password" name="currentpassword" class="form-control input-lg" required>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6">
         <label for="password" class="form-label">Senha<span class="required">*</span></label>
         <input type="password" id="new_password" name="password" class="form-control input-lg" required>
      </div>
      <div class="col-md-6">
         <label for="cpassword" class="form-label">Confirme a Senha<span class="required">*</span></label>
         <input type="password" name="cpassword" class="form-control input-lg" required>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6">
         <input type="submit" class="btn btn-custom btn-lg" value="ATUALIZAR SENHA">
      </div>
   </div>
</form>
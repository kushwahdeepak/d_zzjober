<section id="content" role="main">
   <div class="breadcrumb-container">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <ul class="breadcrumb">
                  <li><a href="<?php echo site_url('authenti/index'); ?>" >Home</a></li>
                  <li class="active">Esqueceu a senha</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="xs-margin half"></div>
   <div class="container">
      <div class="row">
         <div class="col-sm-6 padding-right-md">
            <form name="email_reset_password_form" action="<?php echo site_url('authentication/forgotPassword'); ?>" method="post">
               <h2 class="color2">Recuperação de senha</h2>

               <p>Digite seu endereço de e-mail registrado. Um link para redefinir sua senha será enviado</p>

               <div class="form-group">
                  <label for="email" class="form-label">ENTRE COM SEU E-MAILl<span class="required">*</span></label>
                  <input type="email" name="email" id="email" class="form-control input-lg" required>
               </div>

               <div class="xs-margin"></div>

               <input type="submit" class="btn btn-custom btn-lg min-width" value="ENVIAR">

            </form>
         </div>
      </div>
   </div>
   <div class="lg-margin2x"></div>
</section>
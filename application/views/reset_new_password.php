<section id="content" role="main">
   <div class="breadcrumb-container">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <ul class="breadcrumb">
                  <li><a href="<?php echo site_url('authenti/index'); ?>" >Home</a></li>
                  <li class="active">Conectar</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="xs-margin half"></div>
   <div class="container">
      <div class="row">
         <div class="col-sm-6 padding-right-md">
            <h2 class="color2">Lembre-se!</h2>
            <ul class="list-style list-disc">
               <li>Use pelo menos oito caracteres de letras minúsculas e maiúsculas, números e símbolos em sua senha. Atenção, quanto mais, melhor.</li>
               <li>Dependendo da sensibilidade das informações protegidas, você deve alterar suas senhas periodicamente e evitar reutilizá-las por pelo menos um ano.</li>
               <li>Não conte a ninguém sua senha. Seu amigo de confiança agora pode não ser seu amigo no futuro. Mantenha suas senhas seguras, mantendo-as para si mesmo.</li>
               <li>Evite digitar senhas em computadores que você não controla (como computadores em um cybercafé ou biblioteca) - eles podem ter malware que rouba suas senhas.</li>
            </ul>
            <div class="xs-margin"></div>
         </div>
         <div class="xlg-margin visible-xs clearfix"></div>
         <div class="col-sm-6 padding-left-md">
            <form name="reset_password_form" action="<?php echo site_url('authentication/resetPassword'); ?>" id="login-form" method="post">
               <input type="hidden" name="token" value="<?php echo $token; ?>">
               <h2 class="color2"> Alterar senha</h2>

               <div class="form-group">
                  <label for="password" class="form-label">DIGITE UMA NOVA SENHA<span class="required">*</span></label>
                  <input type="password" name="password" id="reset_password" class="form-control input-lg" required>
               </div>

               <div class="form-group">
                  <label for="con_password" class="form-label">DIGITE A NOVA SENHA NOVAMENTE<span class="required">*</span></label>
                  <input type="password" name="con_password" id="con_password" class="form-control input-lg" required>
               </div>

               <div class="xs-margin"></div>

               <input type="submit" class="btn btn-custom btn-lg min-width" value="CONFIRMAR">

            </form>
         </div>
      </div>
   </div>
   <div class="lg-margin2x"></div>
</section>
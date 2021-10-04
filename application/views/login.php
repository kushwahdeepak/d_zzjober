            <section id="content" role="main">
               <div class="breadcrumb-container">
                  <div class="container">
                     <div class="row">
                        <div class="col-sm-12">
                           <ul class="breadcrumb">
                              <li><a href="<?php echo site_url('authenti/index'); ?>" >Home</a></li>
                              <li class="active">Entrar</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="xs-margin half"></div>
               <div class="container">
                  <div class="row">

                     <div class="col-sm-6 padding-left-md">
                        <form name="user_login_form" action="<?php echo site_url('authentication/userLogin'); ?>" id="login-form" method="post">
                           <h2 class="color2">Entrar</h2>
                           
                           <div class="form-group">
                              <label for="email" class="form-label">Insira seu email<span class="required">*</span></label>
                              <input type="email" name="email" id="email" class="form-control input-lg" required>
                           </div>

                           <div class="form-group">
                              <label for="password" class="form-label">Coloque sua senha<span class="required">*</span></label>
                              <input type="password" name="password" id="password" class="form-control input-lg" required>
                           </div>

                           <span class="help-block text-right"><a href="<?php echo site_url('home/Esqueceu_a_senha'); ?>">Esqueceu sua senha?</a></span>
                           <div class="xs-margin"></div>

                           <input type="submit" class="btn btn-custom btn-lg min-width" value="Entrar" style="float: right;">

                        </form>
                     </div>

                     <div class="xlg-margin visible-xs clearfix"></div>
                     
                     <div class="col-sm-6 padding-right-md">
                        <h2 class="color2">Novo usuário</h2>
                        <p>Se você não é um membro, você precisa se registrar clicando no botão abaixo e criar uma conta.</p>
                        <p>Ao criar uma conta em nosso site, você terá acesso á recursos exclusivos para nossos usuários e poderá avaliar serviços, adicionar serviços ao carrinho, e anunciar um serviço futuramente muito mais rápido. Aproveite!</p>
                        <div class="xs-margin"></div>
                        <a href="<?php echo site_url('home/Registrar_Conta');?>" class="btn btn-custom btn-lg" style="float: right;">Criar conta</a>
                     </div>
                  </div>
               </div>
               <!-- <div class="lg-margin2x"></div> -->
            </section>
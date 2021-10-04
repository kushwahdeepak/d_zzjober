<style type="text/css">
    .iframe-rwd  {
        position: relative;
        padding-bottom: 57.25%;
        padding-top: 32%;
        height: 0;
        overflow: hidden;
    }
    .iframe-rwd iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }
</style>

<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo site_url('home/index'); ?>" >Home</a></li>
                        <li class="active">Contato</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-7 padding-right-larger">
                <div class="iframe-rwd">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3704.7176934270824!2d-48.17509008203428!3d-21.79118438802566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b8f3e69a20f70b%3A0x323a30fe430fa9db!2sR.+Nove+de+Julho%2C+805%2C+Araraquara+-+SP%2C+14801-295%2C+Brazil!5e0!3m2!1sen!2sin!4v1556094668556!5m2!1sen!2sin" height="830" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-sm-5 contact-container">
                <h2 style="color: #004fb1;">Preencha o formulário</h2>

                <form name="contact_form" method="post"
                      action="<?php echo site_url('authentication/submitContactForm'); ?>" id="contact-form">
                    <div class="form-group">
                        <label for="contactname" class="form-label">NOME DO CONTATO
                            <span class="required">*</span>
                        </label>
                        <input type="text" class="form-control input-lg" name="contactname" required>
                    </div>
                    <div class="form-group ">
                        <label for="contactemail" class="form-label">Insira seu email
                            <span class="required">*</span>
                        </label>
                        <input type="email" class="form-control input-lg" name="contactemail" required>
                    </div>
                    <div class="form-group ">
                        <label for="contactsubject" class="form-label"> DESCREVA SEU ASSUNTO </label>
                        <input type="text" class="form-control input-lg" name="contactsubject">
                    </div>
                    <div class="form-group ">
                        <label for="contactmessage" class="form-label">DESCREVA SEU COMENTÁRIO<span class="required">*</span></label>
                        <textarea name="contactmessage" class="form-control input-lg min-height" cols="30" rows="6"
                                  required></textarea>
                    </div>
                    <div class="xss-margin"></div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-lg btn-custom-5" value="ENVIAR">
                    </div>
                </form>
            </div>
        </div>
        <div class="xlg-margin visible-xs clearfix"></div>
      
        <div class="row">
            <div class="col-sm-7 padding-right-larger contact-box">
                <h3>Entre em contato </h3>
                <p>Se você deseja entrar em contato com o nosso site para dúvidas, reclamações ou sugestões, preencha o formulário acima que em breve iremos responder e com maior prazer,
                    mas se você é um investidor e deseja investir em nosso site, entre em contato pelo Email: presidencia@zzjober.com</p>
            </div>
            <div class="xs-margin visible-xs clearfix"></div>
            <div class="col-sm-5">
                <div class="row">
                    <div class="col-md-7 contact-box">
                        <h3>Detalhes de contato</h3>
                        <ul class="contact-list">
                            <li><span style="color: #004fb1;">Telefone:</span>(16)99757-4771</li>
                            <li><span style="color: #004fb1;">Email:</span>atendimento@zzjober.com</li>
                            <li style="white-space: nowrap;"><span style="color: #004fb1;">Trabalhe conosco:</span>rh@zzjober.com</li>
                        </ul>
                    </div>
                   <!--  <div class="xs-margin visible-xs clearfix"></div> -->
                </div>
            </div>
        </div>
    </div>
    
</section>
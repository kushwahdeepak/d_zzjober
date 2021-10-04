<style type="text/css">
input[type=checkbox] {
    margin-top: -1px;
}
</style>

<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo site_url('home/index'); ?>">Home</a></li>
                        <li class="active">Registrar Conta</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="xs-margin half"></div>

    <div class="container">
        <form action="<?php echo site_url('authentication/registerUser'); ?>" name="user_registration" method="post"
              id="register-form">
            <input type="hidden" name="middlename" id="middlename" class="form-control input-lg">
            <input type="hidden" name="lastname" id="lastname" class="form-control input-lg">
            <div class="row">
                <div class="col-sm-6 padding-right-md">
                    <h2 class="color2">Seus dados pessoais</h2>

                    <div class="form-group">
                        <label for="firstname" class="form-label">Digite seu nome<span
                                    class="required">*</span></label>
                        <input type="text" name="firstname" id="firstname" class="form-control input-lg" required>
                    </div>

                    <div class="form-group">
                        <label for="username" class="form-label">Digite nome de usuário<span
                                    class="required">*</span></label>
                        <input type="text" name="username" id="username" class="form-control input-lg" required>
                    </div>

                    <div class="form-group">
                        <label for="telecom" class="form-label">Digite seu telefone<span
                                    class="required">*</span></label>
                        <input type="text" name="telecom" id="telecom" class="form-control input-lg" required>
                    </div>
                </div>

                <div class="md-margin visible-xs clearfix"></div>

                <div class="col-sm-6 padding-left-md">
                    <h2 class="color2">Seu endereço</h2>

                    <div class="form-group">
                        <label for="address1" class="form-label">Digite seu endereço</label>
                        <input type="text" name="address1" id="address1" class="form-control input-lg">
                    </div>

                    <div class="form-group">
                        <label for="city" class="form-label">Digite sua cidade<span class="required">*</span></label>
                        <input type="text" name="city" id="city" class="form-control input-lg" required>
                    </div>

                    <div class="form-group">
                        <label for="postcode" class="form-label">Digite seu código postal<span
                                    class="required">*</span></label>
                        <input type="text" name="postcode" id="postcode" class="form-control input-lg" required>
                    </div>

                    <div class="form-group">
                        <label for="country" class="form-label">Digite seu país<span
                                    class="required">*</span></label>
                        <div class="large-selectbox clearfix">
                            <select id="country" name="country" class="form-control geo__country"
                                    style="font-size: 16px;height: 46px;" required>
                                <option value="">Selecione o pais</option>
                                <?php
                                    if (isset($country_list) && !empty($country_list)) {
                                        foreach ($country_list as $country) {
                                            ?>
                                            <option value="<?php echo $country->geo_id; ?>"> <?php echo $country->geo_name; ?> </option>

                                        <?php }
                                    } ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="region" class="form-label">Digite sua região / estado<span
                                    class="required">*</span></label>
                        <div class="large-selectbox clearfix">
                            <select id="region" name="region" class="form-control geo__state"
                                    style="font-size: 16px;height: 46px;" required>
                                <option value="">Selecione o país primeiro</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 padding-right-md">
                    <h2 class="color2">Sua senha</h2>

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email" class="form-label">Insira seu email<span
                                        class="required">*</span></label>
                            <input type="email" name="email" id="email" class="form-control input-lg" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="password" class="form-label"> Digite sua senha<span class="required">*</span></label>
                            <input type="password" name="password" id="password" class="form-control input-lg" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="cpassword" class="form-label">Digite sua senha novamente<span
                                        class="required">*</span></label>
                            <input type="password" name="cpassword" id="cpassword" class="form-control input-lg"
                                   required>
                        </div>
                    </div>

                    <div class="form-group custom-checkbox-wrapper">
                        <span>Eu li e concordo com
                            <a style="color: #3296d4;" href="<?php echo site_url('home/Politica_de_Privacidade'); ?>">Política de Privacidade.</a>
                        </span>
                        <input type="checkbox" name="privacy_policy_checkbox"/>
                    </div>

                    <div class="xs-margin"></div>
                    <input type="submit" class="btn btn-custom btn-lg" value="Criar Conta">
                </div>
            </div>

        </form>
    </div>

    <div class="xlg-margin"></div>

</section>


<!-- Function for getting states list on the basis of selected country  -->
<script>
    $(document).ready(function () {
        $(document).on('change', '.geo__country', function () {
            var country_id = $(this).val();
            var selectbox_state_code = $('#region').attr('sb');

            $.ajax({
                url: '<?php echo site_url(); ?>home/getCountryStates',
                type: 'GET',
                data: {
                    country_id: country_id
                },
                success: function (data) {
                    $('.geo__state').html(data);
                },
                error: function () {
                    alert('An error has occurred');
                }
            });

        });
    });
</script>
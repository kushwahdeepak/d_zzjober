<style type="text/css">
.nav-justified li.active {
  background: #004fb1;
  color: #fff !important;
}
.nav-justified li.active a {
  color: #fff !important;
}
</style>


<section id="content" role="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('home'); ?>" >Home</a></li>
                    <li class="active">Minha conta</li>
                </ul>
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="active">
                        <a href="#basic_info" role="tab" data-toggle="tab">Informação básica</a>
                    </li>
                    <li>
                        <a href="#address_info" role="tab" data-toggle="tab">Informações de endereço</a>
                    </li>
                    <li>
                        <a href="#login_info" role="tab" data-toggle="tab">Informações de login</a>
                    </li>
                    <?php if (!empty($plan_info)) { ?>
                      <li>
                        <a href="#plan_info" role="tab" data-toggle="tab">Informações do plano</a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="#deactived_account" role="tab" data-toggle="tab"> DESATIVAR CONTA </a>
                    </li>
                     

                </ul>
                <div class="tab-content">
                  
                    <div class="tab-pane fade in active" id="basic_info">
                        <?php include('user_account/basic_info.php'); ?> 
                    </div>

                    <div class="tab-pane fade" id="address_info">
                        <?php include('user_account/address_info.php'); ?>
                    </div>


                    <div class="tab-pane fade" id="login_info">
                        <?php include('user_account/login_info.php'); ?>
                    </div>
                    <?php if (!empty($plan_info)) { ?>
                     <div class="tab-pane fade" id="plan_info">
                        <?php include('user_account/plan_info.php'); ?>
                    </div>
                    <?php } ?>
                    <div class="tab-pane fade" id="deactived_account">
                        <?php include('user_account/deactive_account.php'); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Function for getting states list on the basis of selected country  -->
<script>
    $(document).ready(function () {
       $(document).on('change', '.geo__country', function() {
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
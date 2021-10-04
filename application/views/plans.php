<style type="text/css">
.mb {
    margin-bottom: 15px;
}
.mt {
    margin-top: 15px;
}
</style>

<?php $userInfo = $this->session->userInfo; ?>
<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="index-2.html" >Home</a></li>
                        <li class="active">Planos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="margin-top: 40px;">
            <div class="col-md-12">
                
                <?php  if(!empty($planinfolist)) {
                    $i = 0;
                    foreach($planinfolist as $planinfo) {
                ?>

                    <div class="col-md-3 mb">
                        <table class="table compare-table">
                            <tr>
                                <td>
                                    <h2 class="product-name">
                                        <a href="javascript:void(0);">
                                            <?php echo $planinfo->plan_title; ?>
                                        </a>
                                    </h2>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="product-name">
                                        <a href="javascript:void(0);">
                                            <?php echo $planinfo->plan_description; ?>
                                        </a>
                                    </h2>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="product-name product-price-special">
                                        <?php  if($planinfo->plan_price != 0)
                                        {
                                            echo "R$ ";
                                            echo $planinfo->plan_price; 
                                        } else {
                                            echo "LIVRE";
                                        } ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="product-name product-price-special" style="color: #848079 !important;">
                                        QUANTIDADE <?php echo $planinfo->num_of_service; ?> 
                                    </span>
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    <span class="product-name product-price-special" style="color: #848079 !important;">
                                         VALIDADE <?php echo $planinfo->plan_validate; ?> DIAS
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    
                                    <?php if (!empty($userInfo)) 
                                    {
                                        $user_plan = $this->user_helper->getUserSinglePlanInfo($userInfo->user_id);
                                        if (!empty($user_plan) && $planinfo->plan_price == "0") 
                                        { ?>
                                            <a class="mb mt btn btn-custom-6 min-width-md" href="javascript:void(0);" disabled>Selecionar plano</a>
                                        <?php 
                                        } else { 
                                        ?>
                                            <a class="mb mt btn btn-custom-6 min-width-md" href="<?php echo site_url();?>home/Planos_confirmar/<?php echo $planinfo->plan_id;?>/<?php echo $pre_plan_id;?>">Selecionar plano</a>
                                        <?php }
                                    } 
                                    else 
                                    { ?>
                                        <a class="mb mt btn btn-custom-6 min-width-md" href="<?php echo site_url('home/Entrar'); ?>">Selecionar plano</a>
                                    <?php }?>

                                </td>
                            </tr>
                        </table>
                        <?php if (!empty($user_plan) && $i == "0") { ?>
                            <div class="col-md-12 mt" style="padding: 0px;">
                                <span style="color: #004fb1;">
                                    * Você já tem um plano gratuito, por favor, escolha outro planos
                                </span> 
                            </div>   
                        <?php } ?>
                    </div>
                <?php $i++; } } ?>





            </div>
        </div>



        <div class="row text-center" style="margin-top: 17px;">
            <div class="col-md-12" style="padding: 10px 30px;">
                <img src="<?php echo base_url(); ?>assets/payment_images/Paypal.png" class="imagePlanSize">
                &nbsp;&nbsp;->&nbsp;&nbsp;
                <img src="<?php echo base_url(); ?>assets/payment_images/Mercado_pago.png" class="imagePlanSize">
                &nbsp;&nbsp;->&nbsp;&nbsp;
                <img src="<?php echo base_url(); ?>assets/payment_images/boleto.png" class="imagePlanSize">
            </div>
        </div>


    </div>
    <!-- <div class="lg-margin2x"></div> -->
</section>
                


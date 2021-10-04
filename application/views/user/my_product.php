<style type="text/css">
    .btn_w_96p {
        width: 96%;
    }

    .mb_5p {
        margin-bottom: 5% !important;
    }

    .mt_6p {
        margin-top: 6%;
    }

    .mt_2p {
        margin-top: 2%;
    }

    .abc {
        position: absolute;
        top: 45% !important;
        min-width: 45% !important;
        margin-left: 28% !important;
    }

    .img-thumbnail-customer {
        height: 60px !important;
        width: 60px !important;
    }

    #user_product_table_length select {
        border: 1px solid #ccc;
        background: none;
        font-weight: 100;
    }

    #user_product_table_filter input[type=search] {
        border: 1px solid #ccc;
        background: none;
        font-weight: 100;
    }
</style>
<?php
    $userInfo = $this->session->userInfo;
    // $count_user_product = $this->user_helper->countUserProduct($userInfo->user_id);

    $user_plan = $this->user_helper->getUserPlanForAddProductInfo($userInfo->user_id);

    // print_r($user_plan);
    // $count_user_plan = $this->user_helper->countUserPlan($userInfo->user_id);
?>
<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb pull-left">
                        <li><a href="<?php echo site_url('home/index'); ?>" >Casa</a></li>
                        <li class="active">Meus serviços</li>
                    </ul>
                    <?php if (!empty($user_plan)) { ?>

                        <?php if ($user_plan->remaining_service != 0) { ?>
                            <a class="btn btn-custom-4" href="<?php echo site_url('user_controller/addProduct'); ?>"
                               style="color: #fff !important;float: right;margin-top: 1%;">
                              Adicionar serviço
                            </a>
                        <?php } ?>
                    <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover" id="user_product_table">
                    <thead>
                    <tr>
                        <td class="text-center">Imagem</td>
                        <td class="text-left">Nome do Serviço </td>
                        <td class="text-right"> Preço </td>
                        <td class="text-right"> Orçamento </td>
                        <td class="text-left"> Anúncio </td>
                        <td class="text-right">Açao</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($product_lists) and !empty($product_lists))
                            foreach ($product_lists as $product) {
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <?php $product_images = $this->user_helper->getProductImages($product->product_id);
                                            if (isset($product_images) && !empty($product_images)) {
                                                foreach ($product_images as $image) { ?>
                                                    <img src="<?php echo base_url('admin/assets/images/products/'); ?><?php echo $image->product_image_name; ?>"
                                                         class="img-thumbnail img-thumbnail-customer">
                                                <?php }
                                            } else { ?>
                                                <img src="<?php echo base_url('admin/assets/images/products/product1.jpg'); ?>"
                                                     class="img-thumbnail img-thumbnail-customer">
                                            <?php } ?>
                                    </td>

                                    <td class="text-left">
                                        <?php echo $product->product_name; ?>
                                    </td>

                                    <td class="text-right">
                                         <?php 
                                            if ($product->time_price_check == 1)
                                            {
                                                $product_price = 'Á combinar'; 
                                                 echo "R$ ".$product_price ; 
                                            }
                                            else 
                                            {
                                                $product_price = str_replace(".",",", number_format($product->product_price, 2));
                                                echo "R$". $product_price ;
                                            } 
                                            ?>

                                    </td>

                                    <td class="text-right">
                                    <span class="label label-success">
                                    <?php 
                                        if (is_numeric($product->budget) && ($product->time_price_check == 1)) 
                                        {    
                                            $budget = $product->budget; 
                                            echo $budget ; 
                                        }
                                        elseif (is_numeric($product->budget) && ($product->time_price_check == 0)) 
                                        {
                                            $budget = str_replace(".",",", number_format($product->budget, 2)); 
                                            echo $budget; 
                                        }       
                                        elseif (is_string($product->budget)) 
                                        {
                                            $budget = str_replace(".",",", $product->budget); 
                                            echo $budget; 
                                        } 
                                        else
                                        {
                                             echo $budget; 
                                        }
                                    ?>  
                                    </span>
                                    </td>

                                    <td class="text-left" style="text-transform: capitalize;">
                                        <?php 
                                        if($product->expire_date >= date('Y-m-d')) 
                                        {
                                            if($product->product_status == 'enabled') 
                                            {
                                                echo "Ativo";
                                            }
                                            if($product->product_status == 'disabled') 
                                            {
                                                echo  "inativo ";
                                            } 
                                        }
                                        else
                                        {
                                            echo  "<span style='color:red;'>Vencido</span> ";
                                        }
                                        ?>
                                    </td>

                                    <td class="text-right">

                                        <div class="dropdown">
                                            <button class="btn btn-default actionButton dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                                                Ações
                                                <span class="caret"></span>
                                            </button>


                                            <?php if($product->expire_date >= date('Y-m-d')) { ?>

                                                <ul id="contextMenu" class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                    <li>
                                                        <a tabindex="-1" href="<?php echo base_url(); ?>index.php/user_controller/Editar_servicos?product_id=<?php echo($product->product_id); ?>"> Editar
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a tabindex="-1" href="<?php echo base_url(); ?>index.php/user_controller/productStatus/Delete?product_id=<?php echo($product->product_id); ?>" onclick="return confirm('Tem certeza de que deseja excluir este produto');" > Excluir
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a tabindex="-1" href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>" > Ver Serviços
                                                        </a>
                                                    </li>
                                                </ul>

                                            <?php } else { ?>

                                                <ul id="contextMenu" class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                    <li>
                                                        <a tabindex="-1" href="<?php echo site_url(); ?>home/Planos/<?php echo($product->user_plan_id); ?>"> Editar
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a tabindex="-1" href="<?php echo base_url(); ?>index.php/user_controller/productStatus/Delete?product_id=<?php echo($product->product_id); ?>" onclick="return confirm('Tem certeza de que deseja excluir este produto');" > Excluir
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a tabindex="-1" href="<?php echo site_url(); ?>home/Planos/<?php echo($product->user_plan_id); ?>" > Renovar
                                                        </a>
                                                    </li>
                                                </ul>

                                            <?php } ?>

                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
                <div class="md-margin"></div>
            </div>
        </div>
    </div>
    <div class="lg-margin2x"></div>
</section>
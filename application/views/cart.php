<?php
$userInfo = $this->session->userInfo;
$user_id = $userInfo->user_id;
$user_cart_product_count = $this->user_worker->countUserProductCart($user_id);
$user_cart_product_list = $this->user_helper->getCartProductList($user_id);
$total_price = 0;
foreach($user_cart_product_list as $user_cart_product)
{
    $cart_product_info = $this->user_helper->getProductDetail($user_cart_product->user_product_id);
     if($cart_product_info->time_price_check == 0)
    {
        $total_price = $total_price + ($cart_product_info->product_price * $user_cart_product->user_product_quantity);
    }
}
?>
<style>
    .productnamealign{
        margin-left: 40%!important;
    }
    .imagesize{
        width: 10em!important; height: 8em !important;
    }

    @media all and (min-width: 320px) and (max-width: 720px) {
        .productnamealign{
            margin-left: 0%!important;
        }
    }
</style>
<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo site_url();?>home" >Home</a></li>
                        <li class="active">carrinho</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table cart-table">
                    <thead>
                    <tr>
                        <th class="table-title">NOME DO SERVIÇO</th>
                        <th class="table-title">DISPONIBILIDADE DE SERVIÇO</th>
                        <th class="table-title">Preço unitário</th>
                        <th class="table-title">Quantidade</th>
                        <th class="table-title">Subtotal</th>
                        <th><span class="close-button disabled"></span></th>
                    </tr>
                    </thead>
                    <tbody>


                    <?php if(!empty($user_cart_product_list)) { ?>

                        <?php foreach ($user_cart_product_list as $user_cart_product) { ?>

                            <?php $cart_product_info = $this->user_helper->getProductDetail($user_cart_product->user_product_id); ?>



                            <tr>
                                <td class="product-name-col">
                                    <figure >
                                        <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($user_cart_product->user_product_id); ?>">

                                            <?php $product_images = $this->user_helper->getProductFrontImages($user_cart_product->user_product_id); ?>

                                            <?php if(isset($product_images) && !empty($product_images)) { ?>

                                                <?php foreach ($product_images as $image) { ?>

                                                    <img  class="imagesize"  src="<?php echo base_url('admin/assets/images/products/'); ?><?php echo $image->product_image_name; ?>">

                                                    <?php break; } ?>

                                            <?php } else { ?>

                                                <img  class="imagesize"  src="<?php echo base_url('admin/assets/images/products/product1.jpg'); ?>">

                                            <?php } ?>

                                        </a>
                                    </figure>


                                    <h2 class="product-name productnamealign">
                                        <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($user_cart_product->user_product_id); ?>">
                                            <b><?php echo $cart_product_info->product_name; ?></b>
                                        </a>
                                    </h2>
                                    <ul>

                                        <li class="productnamealign">
                                            <?php
                                            if (strlen($cart_product_info->product_description) < 60)
                                                echo $cart_product_info->product_description;
                                            else
                                                echo substr($cart_product_info->product_description, 0, 100);
                                            ?>
                                        </li>
                                    </ul>
                                </td>

                                <td class="product-price-col">
                                    <h2 class="product-name text-center">
                                     ATIVO
                                    </h2>
                                </td>

                                <td class="product-price-col">
                                    <span class="product-price-special">
                                    <?php 
                                        if ($cart_product_info->time_price_check == 1)
                                        {
                                            $product_price = 'Á combinar'; 
                                            echo "R$ ". $product_price ; 
                                        }
                                        else 
                                        {
                                            $product_price = str_replace(".",",", number_format($cart_product_info->product_price, 2));
                                            echo "R$ ". $product_price ;
                                        } 
                                        ?>
<!-- 
                                        <?php $product_price = str_replace(".",",", number_format($cart_product_info->product_price, 2));?>
                                       R$ <?php echo $product_price;?> -->
                                    </span>
                                </td>

                                <td>
                                    <div class="custom-quantity-input">
                                        <input type="text" name="quantity" value="<?php echo $user_cart_product->user_product_quantity;?>">
                                    </div>
                                </td>

                                <td class="product-total-col">
                                    <span class="product-price-special">
                                         <?php
                                            $quantity = $user_cart_product->user_product_quantity;

                                            if($cart_product_info->time_price_check == 0)
                                            {
                                                $price_of_product = $cart_product_info->product_price * $quantity;
                                            }
                                            if ($cart_product_info->time_price_check == 1)
                                            {
                                                $product_price = 'Á combinar'; 
                                                echo  "R$ ".$product_price ; 
                                            }
                                            else 
                                            {
                                                $product_price = str_replace(".",",", number_format($cart_product_info->product_price, 2));   
                                                echo "R$". $product_price ;
                                            } 
                                            ?>
                                    </span>
                                </td>

                                <td>
                                    <a tabindex="-1" href="<?php echo site_url(); ?>/user_controller/userCartDeleteProduct?user_cart_id=<?php echo($user_cart_product->user_cart_id); ?>" class="close-button" onclick="return confirm('Você tem certeza que deseja excluir esse serviço do carrinho?');">
                                    </a>
                                </td>
                            </tr>

                        <?php } } ?>


                    </tbody>
                </table>




                <div class="md-margin"></div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="tab-container left clearfix"></div>
                        <div class="" style="margin-bottom: 15px;"></div>
                        <span style="color: #004fb1;">"Para contratar este serviço, você deve entrar em contato com o trabalhador e combinar o pagamento" </span><br/>
                        <a style="margin-top: 15px;" href="<?php echo site_url(); ?>home/Lista_de_servicos" class="btn btn-custom-5 btn-lger min-width-lg">
                            CONTINUE CONTRATANDO
                        </a>
                    </div>
                    <div class="md-margin visible-sm visible-xs clearfix"></div>
                    <div class="col-md-5">
                        <table class="table total-table">
                            <tbody>
                            <tr>
                                <td class="total-table-title">Subtotal:</td>
                                 <td>R$ <?php echo $total_price; ?></td>
                    
                            </tr>
                            <!-- <tr>
                               <td class="total-table-title">Shipping:</td>
                               <td>$6.00</td>
                            </tr>
                            <tr>
                               <td class="total-table-title">TAX (0%):</td>
                               <td>$0.00</td>
                            </tr> -->
                            </tbody>
                            <tfoot>
                            <tr>
                                <td>Total:</td>
                                <td>R$ <?php echo $total_price; ?></td>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="md-margin"></div>
                        <!--  <div class="text-right">
                                 <a href="<?php echo site_url('user_controller/checkout');?>" class="btn btn-custom-6 btn-lger min-width-sm">Confira</a>
                              </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
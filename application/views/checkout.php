<?php
    $userInfo = $this->session->userInfo;

    $user_id = $userInfo->user_id;
    $user_cart_product_count = $this->user_worker->countUserProductCart($user_id);
    $user_cart_product_list = $this->user_helper->getCartProductList($user_id);
    $total_price = 0;
    foreach ($user_cart_product_list as $user_cart_product) {
        $cart_product_info = $this->user_helper->getProductDetail($user_cart_product->user_product_id);
        $total_price = $total_price + ($cart_product_info->product_price * $user_cart_product->user_product_quantity);
    }
?>
<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo site_url('home/index'); ?>" >Home</a></li>
                        <li class="active">Confirmar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="xs-margin"></div>

    <form action="<?php echo site_url('user_controller/confirmOrder'); ?>" name="checkout_billing_form" method="post">
        <div class="accordion" id="collapse">
            <div class="accordion-group panel darkerbg">
                <div class="container">
                    <h2 class="accordion-title">
                        <span>1. Informações de pagamento</span>
                        <a class="accordion-btn open" data-toggle="collapse" href="#collapse-two"></a>
                    </h2>

                    <div class="accordion-body collapse in" id="collapse-two">
                        <div class="row accordion-body-wrapper">
                            <div class="md-margin visible-xs clearfix"></div>
                            <div class="col-sm-12 padding-left-md">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address1" class="form-label">Endereço
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" name="address1" id="address1" class="form-control input-lg" required="required">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city" class="form-label">Cidade
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" name="city" id="city" class="form-control input-lg" required="required">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="postcode" class="form-label">Código postal
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" name="postcode" id="postcode" class="form-control input-lg"
                                               required="required">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country" class="form-label">País
                                            <span class="required">*</span>
                                        </label>
                                        <div class="large-selectbox clearfix">
                                            <select id="country" name="country" class="form-control geo__country"
                                                    style="font-size: 16px;height: 46px !important;margin-bottom: 0;">

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
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="region" class="form-label">Região / Estado
                                            <span class="required">*</span>
                                        </label>
                                        <div class="large-selectbox clearfix">
                                            <select id="region" name="region" class="form-control geo__state"
                                                    style="font-size: 16px;height: 46px !important;">
                                                <option value="">Selecione o país primeiro</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

<!--                                <div class="col-md-6">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="mobile_number" class="form-label">Mobile Number-->
<!--                                            <span class="required">*</span>-->
<!--                                        </label>-->
<!--                                        <input type="text" name="mobile" id="mobile_number" class="form-control input-lg">-->
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!--                                <div class="col-md-6">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="email_address" class="form-label">Email Address-->
<!--                                            <span class="required">*</span>-->
<!--                                        </label>-->
<!--                                        <input type="text" name="email" id="email_address" class="form-control input-lg">-->
<!--                                    </div>-->
<!--                                </div>-->

                                <div class="top-5px"></div>
                                <!-- <div class="form-group custom-checkbox-wrapper">
                                   <label>
                                     <input type="checkbox" name="privacy" value="privacy" checked>
                                     I have reed and agree to the Privacy Policy.
                                    </label>
                                </div> -->
                                <div class="xs-margin"></div>
                                <!-- <input type="submit" class="btn btn-custom btn-lg min-width-md" value="Continue"> -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-group panel">
                <div class="container">
                    <h2 class="accordion-title">
                        <span>2. Confirmar pedido</span>
                        <a class="accordion-btn open" data-toggle="collapse" href="#collapse-five"></a></h2>
                    <div class="accordion-body collapse in" id="collapse-five">
                        <div class="row accordion-body-wrapper">
                            <div class="col-md-12">
                                <table class="table checkout-table" id="example001">
                                    <thead>
                                    <tr>
                                        <th class="table-title">Nome do Serviço</th>
                                        <th class="table-title">Preço unitário</th>
                                        <th class="table-title">Quantidade</th>
                                        <th class="table-title">SubTotal</th>
                                        <th><span class="close-button disabled"></span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (!empty($user_cart_product_list)) {
                                            foreach ($user_cart_product_list as $user_cart_product) {
                                                $cart_product_info = $this->user_helper->getProductDetail($user_cart_product->user_product_id);

                                                ?>
                                                <tr id="<?php echo $cart_product_info->product_id; ?>"
                                                    data="<?php echo $cart_product_info->product_id; ?>">
                                                    <input type="hidden" id="user_product_id" name="user_product_id[]"
                                                           value="<?php echo $cart_product_info->product_id; ?>">
                                                    <td class="product-name-col">
                                                        <figure>

                                                                <?php
                                                                    $product_image = $this->user_helper->getOneProductImage($user_cart_product->user_product_id);
                                                                    if(isset($product_image->product_image_name)) {
                                                                ?>
                                                                        <a href="<?php echo site_url('home/Servicos?product_id='.$user_cart_product->user_product_id); ?>">
                                                                            <img src="<?php echo base_url('admin/assets/images/products/'); ?><?php echo $product_image->product_image_name; ?>"
                                                                        </a>
                                                                <?php } else { ?>
                                                                    <a href="#">
                                                                        <img src="<?php echo base_url('admin/assets/images/no-image-found.jpg'); ?>"
                                                                             alt="White linen sheer dress">
                                                                    </a>
                                                                <?php
                                                                    }
                                                                ?>

                                                        </figure>
                                                        <h2 class="product-name">
                                                            <a href="<?php echo site_url('home/Servicos?product_id='.$user_cart_product->user_product_id); ?>">
                                                                <?php echo $cart_product_info->product_name; ?>
                                                            </a>
                                                        </h2>
                                                    </td>
                                                    <td class="product-price-col">
                                                        <span class="product-price-special">
                                                           $<?php echo $cart_product_info->product_price; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="custom-quantity-input">
                                                            <span class="product-price-special">
                                                                <?php echo $user_cart_product->user_product_quantity; ?>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td class="product-total-col">
                                                        <span class="product-price-special">
                                                           $<?php
                                                                $quantity = $user_cart_product->user_product_quantity;
                                                                $price_of_product = $cart_product_info->product_price * $quantity;
                                                                echo $price_of_product;
                                                            ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" id="unit_price" name="unit_price"
                                                               value="<?php echo $price_of_product; ?>">
                                                        <a tabindex="-1" href="#" class="close-button"
                                                           onclick="disableProduct(<?php echo $cart_product_info->product_id; ?> , <?php echo $price_of_product; ?>);"
                                                           style="text-align: center;"></a>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } ?>
                                    <tr class="merged">
                                        <td class="checkout-table-title" colspan="4"><span>Subtotal:</span></td>
                                        <td class="checkout-table-price" colspan="2">
                                            <div style="display: inline">$</div>
                                            <div class="total_price"
                                                 style="display: inline"><?php echo $total_price; ?></div>
                                        </td>
                                    </tr>
                                    </tbody>

                                    <tfoot>
                                    <tr>
                                        <td class="checkout-total-title" colspan="4"><span>TOTAL:</span></td>
                                        <td class="checkout-total-price cart-total " colspan="2">
                                            <div style="display: inline">$</div>
                                            <div class="total_price"
                                                 style="display: inline"><?php echo $total_price; ?></div>
                                        </td>
                                        <input type="hidden" id="total_price" name="total_price"
                                               value="<?php echo $total_price; ?>">
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="md-margin half"></div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-custom-4 btn-lger min-width-slg">
                                        Confirmar pedido
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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

<script type="text/javascript">

    function disableProduct(product_id, product_price) {
        data = {};

        data['unit_price'] = product_price;
        data['total_price'] = $('#total_price').val();
        data['product_id'] = product_id;

        $.ajax({
            url: '<?php echo site_url(); ?>/user_controller/ajaxProductRemove',
            type: 'POST',
            data: data,
            success: function (data) {
                $('.total_price').html("");

                $('.total_price').append(data);
                $('#total_price').val(data);

                // $('#'+product_id).css('display','none');
                $('#' + product_id).remove();
            }
        });

    }
</script>

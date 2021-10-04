<?php $userInfo = $this->session->userInfo; ?>
<style type="text/css">
    .search_container_new.clearfix {
    display: flex;
    float: left;
    margin: 12px 0 12px 113px;
    }
    input.form-control {
    height: 34px!important;
    padding: 9px 70px 9px 9px!important;
    }
    .input-group {
    margin-bottom: 0!important;
    }
    @media only screen and (max-width: 768px){
    .input-group {
    display: none!important;
    }
    }
    .thumbnail{
    margin-bottom: 0px;
    border: 1px solid #fff;
    }
    .glyphicon-shopping-cart:before {
    color: #6f6f6f;
    }
    .header1 :hover>.dropdown-menu55 {
    float: left !important;
    }
    .dropdown-menu55 {
    left: -300px !important;
    }
    .user-dropdown .dropdown-menu33 {
    margin-left: -160px !important;
    margin-top: 27px !important;
    }
    .img-reponse{
    height:38px;
    }
    @media only screen and (max-width: 760px) {
    .header1 :hover>.dropdown-menu55 {
    float: right;
    }
    .dropdown-menu55 {
    left: 0px !important;
    }
    }
    .menu11 li a {
    padding-right: 10px;
    }
    @media only screen and (max-width: 766px) {
    .user-dropdown .dropdown-menu33 {
    margin-left: 0px !important; 
    margin-top: 0px !important;  
    }
    }
    .imagesizenavbar{
    height: 5em !important;
    width:5em !important;
    }
    .custom_search_bar{
    display:flex;
    }

    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
      color: #6f6f6f !important;
    }

    :-ms-input-placeholder { /* Internet Explorer 10-11 */
      color: #6f6f6f !important;
    }

    ::-ms-input-placeholder { /* Microsoft Edge */
      color: #6f6f6f !important;
    }
</style>

<div id="wrapper">
<div id="sticky-header" class="fullwidth-menu header1" data-fixed="fixed"></div>

<header id="header" class="fullwidth-menu header1">
    <div class="container" data-clone="sticky">
        <div class="row">
            <div class="col-sm-12 clearfix">
                <div class="logo-container">
                    <!-- <h1 class="logo clearfix">
                        </h1> -->
                    <a href="<?php echo site_url(); ?>">
                    <img class="thumbnail img-reponse" src="<?php echo base_url();?>assets/logo2.png">
                    </a>
                </div>
                <div class="search_container_new clearfix" style="max-width: 400px">
                    <form action="<?php echo site_url('home/Lista_de_servicos'); ?>"> 
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Procurar serviços" style="color: #6f6f6f;">
                            <div class="input-group-btn">
                                <a href="<?php echo site_url('home/Lista_de_servicos'); ?>" class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="right-side">
                    <div class="search-container">
                        <form action="#" class="search-form">
                            <input type="search" name="s" class="s" placeholder="Procurar serviços" style="color: #6f6f6f;">
                            <a href="<?php echo site_url('home/Lista_de_servicos'); ?>" class="search-submit-btn" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </a>
                        </form>
                    </div>
                    <div class="right-side-wrapper">
                        <?php if (!empty($userInfo)) { ?>
                        <div class="user-dropdown dropdown" style="margin-right: 0;">
                            <a  class="dropdown-toggle" data-toggle="dropdown"><span
                                class="dropdown-icon"></span> <span class="dropdown-text">do utilizador</span></a>
                            <ul class="dropdown-menu dropdown-menu33" role="menu">
                                <li><a href="<?php echo site_url('user_controller/Minha_conta'); ?>">Minha conta</a></li>
                                <li><a href="<?php echo site_url('user_controller/Meus_servicos'); ?>">Meus serviços</a></li>
                                <li><a href="<?php echo site_url('authentication/logout'); ?>">Sair</a></li>
                            </ul>
                        </div>
                        <?php } ?>
                        <?php if (!empty($userInfo)) { ?>
                        <div id="user_card_box" class="cart-dropdown dropdown pull-right">
                            <div id="appendAddToCart">
                                <?php
                                    $user_id = $userInfo->user_id;
                                    $user_cart_product_count = $this->user_worker->countUserProductCart($user_id);
                                    $user_cart_product_list = $this->user_helper->getCartProductList($user_id);
                                    $total_price = 0;
                                    $price_of_product = 0;
                                    foreach ($user_cart_product_list as $user_cart_product) 
                                    {
                                        $cart_product_info = $this->user_helper->getProductDetail($user_cart_product->user_product_id);
                                            
                                        if($cart_product_info->time_price_check == 0)
                                        {
                                            $total_price = $total_price + ($cart_product_info->product_price * $user_cart_product->user_product_quantity);
                                        }
                                    }
                                    ?>
                                <a  class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-shopping-cart mobile_bucket"></span>
                                <span class="badge">
                                <?php echo $user_cart_product_count; ?>                                          
                                </span>
                                <span class="dropdown-text">Carrinho de compras</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu55">
                                    <p class="cart-desc">
                                        <?php echo $user_cart_product_count; ?> item(s) em seu carrinho - R$ <?php echo $total_price; ?>
                                    </p>
                                    <?php
                                        if (!empty($user_cart_product_list)) 
                                        {
                                            foreach ($user_cart_product_list as $user_cart_product) 
                                            {
                                                $cart_product_info = $this->user_helper->getProductDetail($user_cart_product->user_product_id);
                                                ?>
                                            <div class="product clearfix">
                                            <a href="javascript:void(0);" class="delete-btn"  onclick="deleteCartItem(<?php echo($user_cart_product->user_cart_id); ?>)">
                                            </a>
                                            <figure class="product-image-container">
                                                <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($user_cart_product->user_product_id); ?>">
                                                <?php $product_images = $this->user_helper->getProductFrontImages($user_cart_product->user_product_id); ?>
                                                <?php if (isset($product_images) && !empty($product_images)) { ?>
                                                <?php foreach ($product_images as $image) { ?>
                                                <img class="imagesizenavbar" src="<?php echo base_url('admin/assets/images/products/'); ?><?php echo $image->product_image_name; ?>"
                                                    class="product-image">
                                                <?php break;
                                                    } ?>
                                                <?php } else { ?>
                                                <img class="imagesizenavbar" src="<?php echo base_url('admin/assets/images/products/product1.jpg'); ?>"
                                                    class="product-image">
                                                <?php } ?>
                                                </a>
                                            </figure>
                                            <div class="product-content">
                                            <h3 class="product-name">
                                                <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($user_cart_product->user_product_id); ?>">
                                                <?php echo $cart_product_info->product_name; ?>
                                                </a>
                                            </h3>
                                            <div class="product-price-container">
                                                <?php
                                                    $quantity = $user_cart_product->user_product_quantity;

                                                    if($cart_product_info->time_price_check == 0)
                                                    {
                                                        $price_of_product = $cart_product_info->product_price * $quantity;
                                                    }
                                                    ?>
                                                <span class="product-price">
                                                    <?php
                                                        if ($cart_product_info->time_price_check == 1)
                                                        {
                                                            $product_price = 'Á combinar'; 
                                                            echo "R$ ".$product_price ; 
                                                        }
                                                        else 
                                                        {
                                                            $product_price = str_replace(".",",", number_format($cart_product_info->product_price, 2));   
                                                            echo "R$". $product_price ;
                                                        } 
                                                        ?>
                                                </span><br>
                                                <span class="product-price" style="color: #848079;">
                                                Quantidade:
                                                <?php echo $user_cart_product->user_product_quantity; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }
                                        } ?>
                                    <div class="clearfix">
                                        <ul class="pull-left action-info-container">
                                            <li>Total:
                                                <span class="first-color">
                                                R$ <?php echo $total_price; ?>
                                                </span>
                                            </li>
                                        </ul>
                                        <br>
                                        <br>
                                        <ul class="pull-right action-btn-container">
                                            <li>
                                                <a href="<?php echo site_url('user_controller/carrinho'); ?>"
                                                    class="btn btn-custom-5">carrinho</a>
                                                <!--  <a href="<?php echo site_url('user_controller/checkout'); ?>"
                                                    class="btn btn-custom">Checkout</a> -->
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <nav id="main-nav" role="navigation">
                        <div id="responsive-nav">
                            <a id="responsive-btn" class="hoverAnchorColor" href="#"><span class="responsive-btn-icon"><span
                                class="responsive-btn-block"></span> <span
                                class="responsive-btn-block"></span> <span
                                class="responsive-btn-block last"></span></span> <span
                                class="responsive-btn-text">Menu</span></a>
                            <div id="responsive-menu-container"></div>
                        </div>
                        <ul class="menu menu11 clearfix">
                            <li>
                                <a  href="<?php echo site_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home </a>
                            </li>
                            <?php if (empty($userInfo)) { ?>
                            <li>
                                <a  href="<?php echo site_url('home/Planos'); ?>"><i class="fa fa-usd" aria-hidden="true"></i> Planos</a>
                            </li>
                            <?php } ?>
                            <li>
                                <?php if (!empty($userInfo)) { ?>
                                <a  href="<?php echo site_url('home/Planos'); ?>"><i class="fa fa-pencil-square-o " aria-hidden="true"></i> Anuncie grátis </a>
                                <?php } else { ?>
                                <a  href="<?php echo site_url('home/Entrar'); ?>"><i class="fa fa-pencil-square-o " aria-hidden="true"></i> Anuncie grátis </a>
                                <?php } ?>
                            </li>
                            <!-- <li>
                                <a  href="<?php echo site_url('home/wantedList'); ?>"><i class="fa fa-search " aria-hidden="true"></i>Procurar</a>    
                            </li> -->
                            <?php if (empty($userInfo)) { ?>
                            <li>
                                <a  href="<?php echo site_url('home/Entrar'); ?>">
                                <i class="fa fa-user " aria-hidden="true"></i> Entrar
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (!empty($userInfo)) { ?>
                            <li id="chat-header">
                                <a href="<?php echo site_url('home/Favoritos');?>">
                                    <i class="fa fa-heart"></i> Favoritos
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>


<script type="text/javascript">
    function deleteCartItem(user_cart_id) {
        var url="<?php echo site_url();?>";
        data = {};
        data['user_cart_id'] = user_cart_id;
    
        $.ajax({ 
            type: "POST",  
            url: "<?php echo base_url(); ?>index.php/user_controller/userCartProductStatus",  
            data: data,
            dataType: "json",       
            success: function(response)  
            {
                window.location.href = url;
                $("#sticky-header .cart-dropdown").html("");
                $("#header .cart-dropdown").html("");
                var row = appendAddtoCart(response);
                $("#sticky-header .cart-dropdown").append(row);
                $("#header .cart-dropdown").append(row);
                toastr.success('Item excluido do carrinho com sucesso');
            //    $("#header").load(location.href + " #header");
            }   
        });
    }
</script>
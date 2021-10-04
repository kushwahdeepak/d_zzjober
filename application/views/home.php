<style type="text/css">
    @media all and (max-width: 736px) and (min-width: 414px)  {
    .owl-carousel.new-arrivals-carousel.owl-theme .owl-item {
    width: 201px !important;
    }
    .owl-carousel.new-arrivals-carousel.owl-theme img.product-image {
    height: 170px !important;
    }
    }
    /*
    @media all and (max-width: 640px) and (min-width: 360px)  {
    .owl-carousel.new-arrivals-carousel.owl-theme .owl-item {
    width: 174px !important;
    }
    .owl-carousel.new-arrivals-carousel.owl-theme img.product-image {
    height: 170px !important;
    }
    }*/
    .container111 {
    position: relative;
    text-align: center;
    color: white;
    }
    .aligncontent{
    margin-left: -8%;
    margin-top: -1%!important;
    }
    .aligncontent22 {
    margin-left: -11% !important;
    margin-top: -1%!important;
    }
    .aligncontent1 { 
    margin-left: -4% !important;
    }
    @media only screen and (max-width: 500px) {
    .aligncontent1 {
    margin-left: -10% !important;
    } 
    .aligncontent22 {
    margin-left: -18% !important;
    margin-top: -1%!important;
    }
    } 
    .alignbutton{
    margin-left: -6%;
    margin-top: 10px;
    }
    .marginalign {
    margin-top: -19px;
    }
    .checked{
    color: #ffa500;
    }
    div#revslider {
    padding-right: 15px!important;
    padding-left: 15px!important;
    margin-right: auto!important;
    margin-left: auto!important;
    }
    .bg-image {
    /*background: url(https://www.snoopyjob.com/assets/images/6.1-Banner.jpg);*/
    background: url(<?php echo base_url(); ?>assets/images/6.1-Banner.jpg);
    background-position: center !important;
    background-size: cover;
    background-repeat: no-repeat; 
    padding: 31px 0;
    }
    .inner_content {
    text-align: center;
    padding: 20px 0;
    }
    a.btn_new {
    border: 2px solid gray;
    padding: 5px 16px;
    color: gray;
    }
    .btn_new:hover {
    background-color: #004fb1;;
    color: white;
    border-color: #004fb1;;
    }
    .inner_contents{
    float:right;
    }
    p.ptext {margin-left: -75px;}
    img.new-icon {
    float: left;
    width: 90px !important;
    margin: -6px 00px 0 0;
    }
    /* Carousel Fading slide */
    .carousel-fade .carousel-inner { background: #000; }
    .carousel-fade .carousel-control { z-index: 2; }  
    .carousel-fade .item {
    opacity: 0;
    -webkit-transition-property: opacity;
    -moz-transition-property: opacity;
    -o-transition-property: opacity;
    transition-property: opacity;
    }
    .carousel-fade .next.left,
    .carousel-fade .prev.right,
    .carousel-fade .item.active { opacity: 1; }
    .carousel-fade .active.left,
    .carousel-fade .active.right {
    left: 0;
    opacity: 0;
    z-index: 1;
    }
    /* Safari Fix */
    @media all and (transform-3d), (-webkit-transform-3d) {
    .carousel-fade .carousel-inner > .item.next,
    .carousel-fade .carousel-inner > .item.active.right {
    opacity: 0;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    }
    .carousel-fade .carousel-inner > .item.prev,
    .carousel-fade .carousel-inner > .item.active.left {
    opacity: 0;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    }
    .carousel-fade .carousel-inner > .item.next.left,
    .carousel-fade .carousel-inner > .item.prev.right,
    .carousel-fade .carousel-inner > .item.active {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    }
    }
    /* Carousel Control custom */
    .carousel-control .control-icon {
    font-size: 48px;
    height: 30px;
    margin-top: -15px;
    width: 30px;
    display: inline-block;
    position: absolute;
    top: 50%;
    z-index: 5;
    }
    .carousel-control .prev { margin-left:  -15px;  left: 50%; } /* Prev */
    .carousel-control .next { margin-right: -15px; right: 50%; } /* Next */
    /* Removing BS background */
    .carousel .control-box { opacity: 0; }
    a.carousel-control.left  { left: 0; background: none; border: 0;}
    a.carousel-control.right { right: 0; background: none; border: 0;}
    /* Animation */
    .control-box, a.carousel-control, .carousel-indicators li {
    -webkit-transition: all 250ms ease;
    -moz-transition: all 250ms ease;
    -ms-transition: all 250ms ease;
    -o-transition: all 250ms ease;
    transition: all 250ms ease;   
    /* hardware acceleration causes Bootstrap carousel controlbox margin error in webkit */
    /* Assigning animation to indicator li will make slides flicker */
    } 
    /* Hover animation */
    .carousel:hover .control-box { opacity: 1; }
    .carousel:hover a.carousel-control.left { left: 15px; }
    .carousel:hover a.carousel-control.right { right: 15px; }  
    /* Carouse Indicator */
    .carousel-indicators li.active,
    .carousel-indicators li { border: 0; }
    .carousel-indicators li {
    background: #666;
    margin: 0 3px;
    width: 12px;
    height: 12px;
    }
    .carousel-indicators li.active {
    background: #e8e8e8;
    margin: 0 3px;
    }
</style>
<section class="main-slider">
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
        </ol>
        <!-- Carousel items -->
        <div class="carousel-inner">
            <!-- Slide 1 : Active -->
            <div class="item active">
                <img src="<?php echo base_url(); ?>assets/main_banners/1.jpg" style="width: 100%;">
            </div>
            <!-- /Slide1 -->
            <!-- Slide 2 -->
            <div class="item ">
                <img src="<?php echo base_url(); ?>assets/main_banners/2.jpg" style="width: 100%;">
            </div>
            <!-- /Slide2 -->
            <!-- Slide 3 -->
            <div class="item ">
                <img src="<?php echo base_url(); ?>assets/main_banners/3.jpg" style="width: 100%;">
            </div>
            <!-- /Slide3 -->
            <!-- Slide 4 -->
            <div class="item ">
                <img src="<?php echo base_url(); ?>assets/main_banners/4.jpg" style="width: 100%;">
            </div>
            <!-- /Slide4 -->
            <!-- Slide 5 -->
            <div class="item ">
                <img src="<?php echo base_url(); ?>assets/main_banners/5.jpg" style="width: 100%;">
            </div>
            <!-- /Slide4 -->
            <!-- Slide 6 -->
            <div class="item ">
                <img src="<?php echo base_url(); ?>assets/main_banners/6.jpg" style="width: 100%;">
            </div>
            <!-- /Slide4 -->
        </div>
        <!-- /.carousel-inner -->
        <!-- Controls -->
        <!-- <div class="control-box">
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="control-icon prev fa fa-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="control-icon next fa fa-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div> -->
        <!-- /.control-box -->
    </div>
    <!-- /#myCarousel -->
</section>
<!-- /.main-slider -->
<br>
<section id="content" role="main" style="padding-bottom: 0px;">
    <div class="container">
        <!-- Featured Category 
            <div class="container">
                <h2 class="carousel-title small">PRINCIPAIS CATEGORIAS</h2>
            
                <div class="row">
                    <?php $categories = $this->user_helper->getFeaturedCategoryList(); ?>
                    <?php 
                foreach ($categories as $category) { ?>
                            <div class="col-md-4">
                                <div class="banner banner-sm text-right">
                                 <img src="<?php echo base_url(); ?>admin/images/category/<?php echo $category->category_img; ?>"
                                         style="width: 480px;height: 240px;">
                                    <div class="banner-container">
                                        <div class="vcenter-container">
                                            <div class="vcenter">
                                                <div class="banner-content small">
                                                    <h3 style="font-sizac eqwe: 25px; color: #000"><?php echo $category->category_title; ?></h3>
                                                    <a href="<?php echo base_url();?>index.php/home/Lista_de_servicos/<?php echo $category->category_id; ?>" class="btn btn-custom-7 min-width-md"
                                                       style="font-size: 13px;line-height: 20px;padding: 7px 15px;min-width: 90px; color: #fff;background-color: #3296d4;border-color: #3296d4">Buscar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                </div>
            </div>
             Featured category -->
        <!-- <h2 class="carousel-title text-center">PRINCIPAIS CATEGORIAS</h2> -->
        <!-- Featured Category -->
        <div class="banner banner-sm">
            <div class="container1">
                <div class="row">
                    <div class="col-md-6"> </div>
                    <div class="col-md-6">
                        <div style="text-align:center;padding:0;">
                            <h4>ONGs & Ajuda</h4>
                            <h5 style="color:gray;padding-bottom: 6px;">Ajude o próximo e doe o quanto puder!</h5>
                            <a href="<?php echo site_url();?>home/Lista_de_servicos/<?php echo $category->category_id; ?>" class="btn_new">Saiba mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>







        <div class="xlg-margin"></div>







        <?php $user_information = $this->session->userdata('userInfo');  if (isset($history_product_list) && !empty($history_product_list)) { ?>
        <div class="row container">
            <div class="carousel-container">
                <div class="carousel-title">
                    Histórico de Busca
                    <a href="<?php echo site_url('home/clear_all_history'); ?>" class="btn btn-warning hs ">limpar</a>
                </div>                
                <div class="row">
                    <div class="owl-carousel new-arrivals-carousel">
                        <?php foreach ($history_product_list as $products) { $i = 0; ?>
                        <div class="product product2">
                            <div class="product-top">
                                <figure class="product-image-container  product_banner_size">
                                    <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($products->product_id); ?>">
                                    <?php 
                                        $product_images = $this->user_helper->getProductFrontImages($products->product_id); 
                                        // echo "<pre>";print_r($product_images);
                                        ?>
                                    <?php if (isset($product_images) && !empty($product_images)) {
                                        $i = 0; ?>
                                    <?php foreach ($product_images as $image) { ?>
                                    <img src="<?php echo base_url('admin/assets/images/products/'); ?><?php echo $image->product_image_name; ?>"
                                        alt="Product image" style=""
                                        class="<?php if ($i == 0) echo "product-image"; else echo "product-image-hover"; ?> product_banner_img">
                                    <?php $i++;
                                        } ?>
                                    <?php } else { ?>
                                    <img src="<?php echo base_url('admin/assets/images/products/product1.jpg'); ?>"
                                        alt="Product image" class="product-image product_banner_img">
                                    <?php } ?>
                                    </a>
                                </figure>
                            </div>
                            <div class="product-price-container text-left">
                                <span class="product-price price">
                                        <?php 
                                            if ($products->time_price_check == 1)
                                            {
                                                $product_price = 'Á combinar';
                                                echo "R$ ".$product_price ; 
                                            }
                                            else 
                                            {
                                                $product_price = str_replace(".",",", number_format($products->product_price, 2));    
                                                echo "R$ ".$product_price ;
                                            }   
                                        ?>
                                </span>
                            </div>
                            <h3 class="product-name text-left product-name-custom" style="margin-bottom: 0px;">
                                <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($products->product_id); ?>">
                                <?php
                                    if (strlen($products->product_name) < 5)
                                        echo $products->product_name;
                                    else
                                        echo substr($products->product_name, 0, 22);
                                    ?>
                                </a>
                            </h3>
                            <div class="ratings-container">
                                <?php
                                    $product_ratting=$this->user_helper->getProductRatting($products->product_id);?>
                                <?php if ($product_ratting->rat >= 1) { ?>
                                <span class="fa fa-star checked"></span>
                                <?php } else{ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                                <?php if ($product_ratting->rat >= 2) { ?>
                                <span class="fa fa-star checked"></span>
                                <?php } else{ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                                <?php if ($product_ratting->rat >= 3) { ?>
                                <span class="fa fa-star checked"></span>
                                <?php } else{ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                                <?php if ($product_ratting->rat >= 4) { ?>
                                <span class="fa fa-star checked"></span>
                                <?php } else{ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                                <?php if ($product_ratting->rat >= 5) { ?>
                                <span class="fa fa-star checked"></span>
                                <?php } else{ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                                <span class="ratings-amount"> <?php echo $product_ratting->cnt; ?> Avaliações</span>
                            </div>
                            <div class="product-action-container clearfix">

                                <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($products->product_id); ?>"  class="product-add-btn product-add-btn-custom">Contratar
                                </a>

                                <?php if(!empty($this->session->userdata('userInfo'))) { ?>

                                <a href="javascript:void(0);" class="product-add-btn product-add-btn-custom add-fav" onclick="add_fav(<?php echo $products->product_id; ?>);">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <a href="javascript:void(0);" class="product-add-btn product-add-btn-custom" onclick="add_quick_cart(<?php echo $products->product_id; ?>);">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>

                                <?php } else {?>

                                <a href="<?php echo site_url('home/Entrar'); ?>"  class="product-add-btn product-add-btn-custom add-fav">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <a href="<?php echo site_url('home/Entrar'); ?>"  class="product-add-btn product-add-btn-custom">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>

                                <?php }?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="xlg-margin"></div>
        <?php } ?>




        <div class="row container">
            <div class="carousel-container">
                <!-- <h2 class="carousel-title">NOVOS SERVIÇOS</h2> -->
                <div class="carousel-title">
                    Novos Serviços
                    <?php $user_information = $this->session->userdata('userInfo'); 
                        if(isset($user_information)){ ?>
                    <a href="<?php echo site_url('home/Lista_de_servicos/new_services'); ?>" class="btn btn-warning hs ">Todos</a>
                    <?php }else{ ?>
                    <a href="<?php echo site_url('home/Lista_de_servicos/new_services'); ?>" class="btn btn-warning hs ">Todos</a>
                    <?php } ?>  
                    <!-- <button class="btn btn-warning hs ">Todos</button> -->
                </div>
                <div class="row">
                    <div class="owl-carousel new-arrivals-carousel">
                        <?php 
                            if (isset($new_product_list) && !empty($new_product_list)) { ?>
                        <?php foreach ($new_product_list as $product) { ?>
                        <div class="product product2">
                            <div class="product-top">
                                <figure class="product-image-container product_banner_size">
                                    <?php 
                                        if(!empty($user_information)){
                                            $userid = $user_information->user_id; 
                                        }else{
                                            $userid = "0"; 
                                        }
                                        ?>
                                    <a onclick="change_status(<?=$product->product_id.','.$userid?>)" class="change_status1" href="javascript:void(0)">
                                    <?php $product_images = $this->user_helper->getProductFrontImages($product->product_id); ?>
                                    <?php if (isset($product_images) && !empty($product_images)) {
                                        $i = 0; ?>
                                    <?php foreach ($product_images as $image) { ?>
                                    <img src="<?php echo base_url('admin/assets/images/products/'); ?><?php echo $image->product_image_name; ?>"
                                        alt="Product image"
                                        class="<?php if ($i == 0) echo "product-image"; else echo "product-image-hover"; ?> product_banner_img">
                                    <?php $i++;
                                        } ?>
                                    <?php } else { ?>
                                    <img src="<?php echo base_url('admin/assets/images/products/product1.jpg'); ?>"
                                        alt="Product image" class="product-image product_banner_img">
                                    <?php } ?>
                                    </a>
                                    <a class="change_status1" onclick="change_status(<?=$product->product_id.','.$userid?>)" class="change_status1" href="javascript:void(0)"></a>
                                </figure>
                            </div>
                            <div class="product-price-container text-left">
                                <span class="product-price price">
                                        <?php 
                                            if ($product->time_price_check == 1)
                                            {
                                                $product_price = 'Á combinar';
                                                echo "R$ ". $product_price ; 
                                            }
                                            else 
                                            {
                                                $product_price = str_replace(".",",", number_format($product->product_price, 2));    
                                                echo "R$ ".$product_price ;
                                            }   
                                        ?>
                                </span>
                            </div>
                            <h3 class="product-name text-left product-name-custom" style="margin-bottom: 0px;">
                                <a onclick="change_status(<?=$product->product_id.','.$userid?>)" class="change_status1" href="javascript:void(0)">
                                <?php
                                    if (strlen($product->product_name) < 5)
                                        echo $product->product_name;
                                    else
                                        echo substr($product->product_name, 0, 22);
                                    ?>
                                </a>
                            </h3>
                            <div class="ratings-container">
                                <?php
                                    $product_ratting=$this->user_helper->getProductRatting($product->product_id);?>
                                <?php if ($product_ratting->rat >= 1) { ?>
                                <span class="fa fa-star checked"></span>
                                <?php } else{ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                                <?php if ($product_ratting->rat >= 2) { ?>
                                <span class="fa fa-star checked"></span>
                                <?php } else{ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                                <?php if ($product_ratting->rat >= 3) { ?>
                                <span class="fa fa-star checked"></span>
                                <?php } else{ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                                <?php if ($product_ratting->rat >= 4) { ?>
                                <span class="fa fa-star checked"></span>
                                <?php } else{ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                                <?php if ($product_ratting->rat >= 5) { ?>
                                <span class="fa fa-star checked"></span>
                                <?php } else{ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                                <span class="ratings-amount"> <?php echo $product_ratting->cnt; ?> Avaliações</span>
                            </div>
                            <div class="product-action-container clearfix">
                                <!-- <a onclick="change_status(<?=$product->product_id.','.$userid?>)" href="javascript:void(0)"  class="product-add-btn product-add-btn-custom change_status1">Contratar
                                </a>
 -->                            <?php if(!empty($this->session->userdata('userInfo'))) { ?>

                                <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>"  class="product-add-btn product-add-btn-custom">Contratar
                                </a>
                                <a href="javascript:void(0);"  class="product-add-btn product-add-btn-custom add-fav" onclick="add_fav(<?php echo $product->product_id; ?>);">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <a href="javascript:void(0);" class="product-add-btn product-add-btn-custom" onclick="add_quick_cart(<?php echo $product->product_id; ?>);">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>

                                <?php } else {?>

                                <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>"  class="product-add-btn product-add-btn-custom">
                                    Contratar
                                </a>
                                <a href="<?php echo site_url('home/Entrar'); ?>"  class="product-add-btn product-add-btn-custom add-fav">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <a href="<?php echo site_url('home/Entrar'); ?>"  class="product-add-btn product-add-btn-custom">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>

                                <?php }?>
                            </div>
                        </div>
                        <?php }
                            } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="xlg-margin"></div>



        <div class="row container">
            <?php $user_information = $this->session->userdata('userInfo'); 
                if(isset($user_information)){ ?>
            <div class="bg-image img-responsive" data-stellar-background-ratio="0.4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div style="text-align:center;padding:0;">
                                <h4 style="color:gray" >Ofereça um serviço!</h4>
                                <h5 style="color:gray;padding-bottom: 6px;">Descubra no que você é bom e anuncie</h5>
                                <a href="<?php echo site_url('home/Planos'); ?>" class="btn_new">Anunciar</a>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
                <?php   }else{ ?>
                <div class="bg-image img-responsive" data-stellar-background-ratio="0.4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div style="text-align:center;padding:0;">
                                    <h4 style="color:gray" >Ofereça um serviço!</h4>
                                    <h5 style="color:gray">Descubra no que você é bom e anuncie</h5>
                                    <a href="<?php echo site_url('home/Entrar'); ?>" class="btn_new">Anunciar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php   } ?>
                </div>
            </div>
        </div>





        <div class="xlg-margin"></div>
        <div class="container">
            <div class="carousel-container">
                <div class="carousel-title">
                    Mais Procurados
                    <?php $user_information = $this->session->userdata('userInfo'); 
                        if(isset($user_information)){ ?>
                    <a href="<?php echo site_url('home/Lista_de_servicos/most_wanted_services'); ?>" class="btn btn-warning hs ">Todos</a>
                    <?php }else{ ?>
                    <a href="<?php echo site_url('home/Lista_de_servicos/most_wanted_services'); ?>" class="btn btn-warning hs ">Todos</a>
                    <?php } ?>  
                    <!-- <button class="btn btn-warning hs ">Todos</button> -->
                </div>
                <div class="row">
                    <div class="owl-carousel new-arrivals-carousel">
                        <?php 
                            if (isset($wanted_services) && !empty($wanted_services)) { ?>
                        <?php foreach ($wanted_services as $product) { ?>
                        <div class="product product2">
                            <div class="product-top">
                                <figure class="product-image-container product_banner_size">
                                    <?php 
                                        if(!empty($user_information)){
                                            $userid = $user_information->user_id; 
                                        }else{
                                            $userid = "0"; 
                                        }
                                        ?>
                                    <a onclick="change_status(<?=$product->product_id.','.$userid?>)" class="change_status1" href="javascript:void(0)">
                                    <?php $product_images = $this->user_helper->getProductFrontImages($product->product_id); ?>
                                    <?php if (isset($product_images) && !empty($product_images)) {
                                        $i = 0; ?>
                                    <?php foreach ($product_images as $image) { ?>
                                    <img src="<?php echo base_url('admin/assets/images/products/'); ?><?php echo $image->product_image_name; ?>"
                                        alt="Product image"
                                        class="<?php if ($i == 0) echo "product-image"; else echo "product-image-hover"; ?> product_banner_img">
                                    <?php $i++;
                                        } ?>
                                    <?php } else { ?>
                                    <img src="<?php echo base_url('admin/assets/images/products/product1.jpg'); ?>"
                                        alt="Product image" class="product-image product_banner_img">
                                    <?php } ?>
                                    </a>
                                    <a class="change_status1" onclick="change_status(<?=$product->product_id.','.$userid?>)" class="change_status1" href="javascript:void(0)"></a>
                                </figure>
                            </div>
                            <div class="product-price-container text-left">
                                <span class="product-price price">
                                        <?php 
                                            if ($product->time_price_check == 1)
                                            {
                                                $product_price = 'Á combinar';
                                                echo "R$ ". $product_price ; 
                                            }
                                            else 
                                            {
                                                $product_price = str_replace(".",",", number_format($product->product_price, 2));    
                                                echo "R$ ".$product_price ;
                                            }   
                                        ?>
                                </span>
                            </div>
                            <h3 class="product-name text-left product-name-custom" style="margin-bottom: 0px;">
                                <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>">
                                <?php
                                    if (strlen($product->product_name) < 5)
                                        echo $product->product_name;
                                    else
                                        echo substr($product->product_name, 0, 22);
                                    ?>
                                </a>
                            </h3>
                            <div class="ratings-container">
                                <?php
                                    $product_ratting=$this->user_helper->getProductRatting($product->product_id);?>
                                <?php if ($product_ratting->rat >= 1) { ?>
                                <span class="fa fa-star checked"></span>
                                <?php } else{ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                                <?php if ($product_ratting->rat >= 2) { ?>
                                <span class="fa fa-star checked"></span>
                                <?php } else{ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                                <?php if ($product_ratting->rat >= 3) { ?>
                                <span class="fa fa-star checked"></span>
                                <?php } else{ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                                <?php if ($product_ratting->rat >= 4) { ?>
                                <span class="fa fa-star checked"></span>
                                <?php } else{ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                                <?php if ($product_ratting->rat >= 5) { ?>
                                <span class="fa fa-star checked"></span>
                                <?php } else{ ?>
                                <span class="fa fa-star-o"></span>
                                <?php } ?>
                                <span class="ratings-amount"> <?php echo $product_ratting->cnt; ?> Avaliações</span>
                            </div>
                            <div class="product-action-container clearfix">
                                <!-- <a onclick="change_status(<?=$product->product_id.','.$userid?>)" href="javascript:void(0)"  class="product-add-btn product-add-btn-custom change_status1">Contratar
                                </a> -->
                                <?php if(!empty($this->session->userdata('userInfo'))) { ?>

                                <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>"  class="product-add-btn product-add-btn-custom">Contratar
                                </a>
                                <a href="javascript:void(0);"  class="product-add-btn product-add-btn-custom add-fav" onclick="add_fav(<?php echo $product->product_id; ?>);">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <a href="javascript:void(0);"  class="product-add-btn product-add-btn-custom" onclick="add_quick_cart(<?php echo $product->product_id; ?>);">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>

                                <?php } else {?>

                                <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>"  class="product-add-btn product-add-btn-custom">
                                    Contratar
                                </a>
                                <a href="<?php echo site_url('home/Entrar'); ?>"  class="product-add-btn product-add-btn-custom add-fav">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <a href="<?php echo site_url('home/Entrar'); ?>"  class="product-add-btn product-add-btn-custom">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>

                                <?php }?>
                            </div>
                        </div>
                        <?php }
                            } ?>
                    </div>
                </div>
            </div>
        </div>




        
        <div class="mb_50"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="feature-box feature-box-inline clearfix">
                        <span class="feature-icon icon-delivery"></span>
                        <div class="feature-content">
                            <h3> Orçamento grátis </h3>
                            <p>Peça um orçamento grátis, é livre e sem compromisso. Combine o dia da visita e negocie a contratação.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="feature-box feature-box-inline clearfix">
                        <img class="new-icon" src="<?php echo base_url('assets/images/email.png'); ?>" alt="ok" >
                        <div class="feature-content">
                            <h3> Atendimento 24hs </h3>
                            <p>Nosso site está online 24 horas, 7 dias da semana, nosso atendimento é 100% online.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="feature-box feature-box-inline clearfix">
                        <img class="new-icon" src="<?php echo base_url('assets/images/lock1.png'); ?>" alt="oks" >
                        <div class="feature-content">
                            <h3> Combine pagamentos </h3>
                            <p>Você tem liberdade, combine pagamentos e recebimentos fora do site e Contrate.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb_50 hidden-xs"></div>




        <div class="xlg-margin visible-xs"></div>
        <div class="container">
            <div class="carousel-container">
                <h2 class="carousel-title">Nossas Categorias</h2>
                <div class="row">
                    <div class="owl-carousel brands-carousel">
                        <?php $categories = $this->user_helper->getCategory(); ?>
                        <?php foreach ($categories as $category) { ?>
                        <div class="brand container111">
                            <a href="<?php echo site_url('home/Lista_de_servicos'); ?>">
                            <img src="<?php echo base_url(); ?>admin/images/category/<?php echo $category->category_img; ?>"
                                style="width: 180px;height: 110px;">
                            </a>
                            <div class="centered" style="color: #888779"> <span style="font-size: 15px;"> <?php echo $category->category_title; ?> </span> </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden-xs" style="padding-bottom: 50px;"></div>
        <div class="lg-margin visible-xs"></div>



    </div>
</section>
<!-- <script type="text/javascript">
    ction add_quick_cart(product_id) {
        data = {};
        data['user_product_id'] = product_id;
        data['user_product_quantity'] = 1;
    
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/user_controller/addToCart",
            cache:false,
            data: data,
            success: function(response)
            {
                console.log(location.href + " #header");
    
                if(response === 'success') {
                    toastr.success('Serviço adicionado ao carrinho com sucesso');
                    $("#header").load(location.href + " #header");
                }
            },
            error: function() {
                toastr.error('An error occured while adding product to the cart');
            }
        });
    }
    </script> -->
<script>
    // $().ready(function(){
    // $('.hs').click(function(){
    // $('.hsk').hide();
    // $('.hs').hide();   
    // });
    // });
</script>
<script type="text/javascript">
        function change_status(product_id,users_id){
          if(product_id !=0 && users_id !=0){
         
            $.ajax({
                  url : "<?php echo site_url();?>home/count_services",
                  data : {product_id : product_id},
                  method: "POST",
                  success:function(res){
                    // alert(res);return false;
                    // window.location.href = "<?php echo site_url(); ?>home/Servicos?product_id="+product_id;
    
                    $.ajax({
                      url : "<?php echo site_url('home/history_product');?>",
                      data : {product_id : product_id,users_id : users_id},
                      method: "POST",
                      success:function(resa){
                        // alert(res);return false;
                        window.location.href = "<?php echo site_url(); ?>home/Servicos?product_id="+product_id;
                      }
                  }); 
    
                  }
              }); 
    
            
           } else{
              window.location.href = "<?php echo site_url(); ?>home/Servicos?product_id="+product_id;
            }
        }   
</script>
<script type="text/javascript">
    $(document).ready(function() {
      $('.carousel').carousel({
        interval: 10000
      })
    });
    
</script>
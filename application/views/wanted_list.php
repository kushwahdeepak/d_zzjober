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
    background: url(../images/6.1-Banner.jpg);
    background-position: center !important;
    background-size: cover;
    background-repeat: no-repeat;
  }
.inner_content {
    text-align: center;
    padding: 20px 0;
}

a.btn_new {
    border: 2px solid #000;
    padding: 5px 16px;
}
.inner_contents{
  float:right;
}
p.ptext {margin-left: -75px;}

img.new-icon {
    float: left;
    width: 90px !important;
    margin: -6px 20px 0 0;
}



</style>

<!-- Revolution slider -->
<section id="content" role="main">
    <div id="revslider-containe">
        <div id="revslider">
            <ul>
                <li data-transition="cube" data-slotamount="8" data-masterspeed="800" data-title="Trends">
                    <img src="<?php echo base_url(); ?>assets/images/revslider/dummy.png" alt="slidebg1"
                         data-lazyload="<?php echo base_url(); ?>assets/images/banners/NewBanners/1 - Banner principal.jpg"
                         data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="img-responsive" >               
                </li>
                <li data-transition="incube" data-slotamount="8" data-masterspeed="800" data-title="Season Sale">
                    <img src="<?php echo base_url(); ?>assets/images/revslider/dummy.png"
                         alt="slidebg1"
                         data-lazyload="<?php echo base_url(); ?>assets/images/banners/NewBanners/2 - Banner construç¦o.jpg"
                         data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="img-responsive">
                </li>
                   <li data-transition="incube" data-slotamount="8" data-masterspeed="800" data-title="Season Sale">
                    <img src="<?php echo base_url(); ?>assets/images/revslider/dummy.png"
                         alt="slidebg1"
                         data-lazyload="<?php echo base_url(); ?>assets/images/banners/NewBanners/3 - Banner mecânica.jpg"
                         data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="img-responsive">
                </li>
                   <li data-transition="incube" data-slotamount="8" data-masterspeed="800" data-title="Season Sale">
                    <img src="<?php echo base_url(); ?>assets/images/revslider/dummy.png"
                         alt="slidebg1"
                         data-lazyload="<?php echo base_url(); ?>assets/images/banners/NewBanners/4 - Banner estética & beleza.jpg"
                         data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="img-responsive">
                </li>
                   <li data-transition="incube" data-slotamount="8" data-masterspeed="800" data-title="Season Sale">
                    <img src="<?php echo base_url(); ?>assets/images/revslider/dummy.png"
                         alt="slidebg1"
                         data-lazyload="<?php echo base_url(); ?>assets/images/banners/NewBanners/5 - Banner artesanato.jpg"
                         data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="img-responsive">
                </li>
                   <li data-transition="incube" data-slotamount="8" data-masterspeed="800" data-title="Season Sale">
                    <img src="<?php echo base_url(); ?>assets/images/revslider/dummy.png"
                         alt="slidebg1"
                         data-lazyload="<?php echo base_url(); ?>assets/images/banners/NewBanners/6 - Banner divers¦o & eventos.jpg"
                         data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="img-responsive">
                </li>
            </ul>
        </div>
    </div>
</section>
<!--./ Revolution slider -->

<section id="content" role="main" style="padding-bottom: 0px;">
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
     
                <h2 class="carousel-title text-center">PRINCIPAIS CATEGORIAS</h2>

         <!-- Featured Category -->
    <div class="banner banner-sm">
    <div class="container">
        <div class="row">
        <div class="col-md-6"> </div>
                  <div class="col-md-6">
                <div class="inner_contents">
                  <h4>ONGs & Ajuda</h4>
                  <p class="ptext">Ajude o próximo e doe o quanto puder!</p>
                  <a href="<?php echo site_url();?>home/Lista_de_servicos/<?php echo $category->category_id; ?>" class="btn_new">Saiba mais</a>
                </div>
            </div>                        
           </div>   
        </div>
    </div>
   <!--  Featured category -->

    <div class="xlg-margin"></div>


    <div class="container">
        <div class="carousel-container">
            <!-- <h2 class="carousel-title">NOVOS SERVIÇOS</h2> -->
            <div class="carousel-title">NOVOS SERVIÇOS

            	<?php $user_information = $this->session->userdata('userInfo'); 
               if(isset($user_information)){ ?>
	           	<a href="<?php echo site_url('user_controller/addProduct'); ?>" class="btn btn-warning hs ">Todos</a>
	           	<?php }else{ ?>
	           	<a href="<?php echo site_url('home/Registrar_Conta'); ?>" class="btn btn-warning hs ">Todos</a>
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
                                    
                                            <a onclick="change_status(<?=$product->product_id.','.$userid?>)" class="change_status1" href="#">
                                            <?php $product_images = $this->user_helper->getProductFrontImages($product->product_id); ?>

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
                                                     alt="Product image" class="product-image">
                                            <?php } ?>

                                        </a>
                                        <a class="change_status1" href="<?php echo site_url(); ?>home/Servicos?product_id=<?=$product->product_id?>"></a>
                                    </figure>
                                </div>
                                <div class="product-price-container text-left">
                                                    <span class="product-price price">
                                                    R$ <?php echo $product->product_price; ?>
                                                    </span>
                                </div>

                                <h3 class="product-name text-left" style="margin-bottom: 0px;">

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

                                <div class="product-action-container clearfix" style="display:none">
                                    <?php if(!empty($userInfo)) { ?>
                                        <a href="javascript:void(0);"  class="product-add-btn product-add-btn-custom" onclick="add_quick_cart(<?php echo $product->product_id; ?>);">Add to Cart
                                        </a>
                                    <?php } else {?>
                                        <a href="<?php echo site_url('home/Entrar'); ?>"  class="product-add-btn product-add-btn-custom">Add to Cart
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
 
      <!-- user services  -->
           <div class="container hsk">
        <div class="carousel-container">
            <div class="carousel-title">HISTÓRICO DE BUSCA  <a href="<?php echo site_url('home/clear_all_history'); ?>" class="btn btn-warning hs ">limpar</a></div> 
            <div class="row">
                <div class="owl-carousel new-arrivals-carousel">

                    <?php if (isset($history_product_list) && !empty($history_product_list)) { ?>
                        <?php foreach ($history_product_list as $products) { $i = 0; ?>
                    
                            <div class="product product2">
                                <div class="product-top">
                                    <figure class="product-image-container product_banner_size">
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
                                                     alt="Product image" class="product-image">
                                            <?php } ?>

                                        </a>
                                    </figure>
                                </div>
                                <div class="product-price-container text-left">
                                                    <span class="product-price price">
                                                    R$ <?php echo $products->product_price; ?>
                                                    </span>
                                </div>

                                <h3 class="product-name text-left" style="margin-bottom: 0px;">

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

                                <div class="product-action-container clearfix" style="display:none">
                                    <?php if(!empty($userInfo)) { ?>
                                        <a href="javascript:void(0);"  class="product-add-btn product-add-btn-custom" onclick="add_quick_cart(<?php echo $products->product_id; ?>);">Add to Cart
                                        </a>
                                    <?php } else {?>
                                        <a href="<?php echo site_url('home/Entrar'); ?>"  class="product-add-btn product-add-btn-custom">Add to Cart
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
       <!-- end  -->

    <div class="lg-margin3x xs-margin2x"></div>
    <?php $user_information = $this->session->userdata('userInfo'); 

           if(isset($user_information)){ ?>
           <div class="bg-image img-responsive" data-stellar-background-ratio="0.4">
        <div class="container">
            <div class="row">
            <div class="col-md-4">
            </div>
              <div class="col-md-4">
                <div class="inner_content">
                  <h4>Ofereça um serviço!</h4>
                  <p>Descubra no que você é bom e anuncie</p>
                  <a href="<?php echo site_url('home/Planos'); ?>" class="btn_new">Anunciar</a>
                </div>
              </div>
              <div class="col-md-4">
            </div>

            </div>
        </div>
        </div>
            
           <?php   }else{ ?>
           <div class="bg-image img-responsive" data-stellar-background-ratio="0.4">
        <div class="container">
            <div class="row">
            <div class="col-md-4">
            </div>
              <div class="col-md-4">
                <div class="inner_content">
                  <h4>Ofereça um serviço!</h4>
                  <p>Descubra no que você é bom e anuncie</p>
                  <a href="<?php echo site_url('home/Registrar_Conta'); ?>" class="btn_new">Anunciar</a>
                </div>
              </div>
              <div class="col-md-4">
            </div>

            </div>
        </div>
        </div>
           
           <?php   } ?>
    
<!-- new wanted list -->


    <div class="xlg-margin"></div>


    <div class="container">
        <div class="carousel-container">
            
            <div class="carousel-title">MAIS PROCURADOS

            	<?php $user_information = $this->session->userdata('userInfo'); 
               if(isset($user_information)){ ?>
	           	<a href="<?php echo site_url('user_controller/addProduct'); ?>" class="btn btn-warning hs ">Todos</a>
	           	<?php }else{ ?>
	           	<a href="<?php echo site_url('home/Registrar_Conta'); ?>" class="btn btn-warning hs ">Todos</a>
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
                                      <a class="change_status1" href="#">
                                            <?php $product_images = $this->user_helper->getProductFrontImages($product->product_id); ?>

                                            <?php if (isset($product) && !empty($product)) {
                                                $i = 0; ?>
                                                

                                                    <img src="<?php echo base_url('admin/assets/images/products/'); ?><?php echo $product->product_image_name; ?>"
                                                         alt="Product image" style=""
                                                         class="<?php if ($i == 0) echo "product-image"; else echo "product-image-hover"; ?> product_banner_img">

                                                    <?php $i++;
                                                }  else { ?>

                                                <img src="<?php echo base_url('admin/assets/images/products/product1.jpg'); ?>"
                                                     alt="Product image" class="product-image">
                                            <?php } ?>

                                        </a>
                                        <a class="change_status1" href="<?php echo site_url(); ?>home/Servicos?product_id=<?=$product->product_id?>"></a>
                                    </figure>
                                </div>
                                <div class="product-price-container text-left">
                                                    <span class="product-price price">
                                                    R$ <?php echo $product->product_price; ?>
                                                    </span>
                                </div>

                                <h3 class="product-name text-left" style="margin-bottom: 0px;">

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

                                <div class="product-action-container clearfix" style="display:none">
                                    <?php if(!empty($userInfo)) { ?>
                                        <a href="javascript:void(0);"  class="product-add-btn product-add-btn-custom" onclick="add_quick_cart(<?php echo $product->product_id; ?>);">Add to Cart
                                        </a>
                                    <?php } else {?>
                                        <a href="<?php echo site_url('home/Entrar'); ?>"  class="product-add-btn product-add-btn-custom">Add to Cart
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
<!-- end -->


    <div class="lg-margin3x xs-margin2x"></div>
    <div class="container">
        <div class="carousel-container">
            <h2 class="carousel-title" style="white-space: nowrap;"> MAIS CONTRATADOS </h2>
            <div class="row">
                <div class="owl-carousel top-bestsellers-carousel">

                    <?php if (isset($bestseller_list) && !empty($bestseller_list)) { ?>
                        <?php foreach ($bestseller_list as $product) { ?>
                            <div class="product product2">

                                <div class="product-top">
                                    <figure class="product-image-container product_banner_size">
                                        <a id="demo" href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id);  ?>">
                                            <?php $product_images = $this->user_helper->getProductFrontImages($product->product_id); ?>
                                            <?php if (isset($product_images) && !empty($product_images)) {
                                                $i = 0; ?>
                                                <?php foreach ($product_images as $image) { ?>

                                                    <img src="<?php echo base_url('admin/assets/images/products/'); ?><?php echo $image->product_image_name; ?>" alt="Product image" style="" class="<?php if ($i == 0) echo "product-image"; else echo "product-image-hover"; ?> product_banner_img">

                                                    <?php $i++;
                                                } ?>
                                            <?php } else { ?>
                                                <img src="<?php echo base_url('admin/assets/images/products/product1.jpg'); ?>"
                                                     alt="Product image" class="product-image">
                                            <?php } ?>
                                        </a>
                                    </figure>
                                </div>
                                <div class="product-price-container text-left">
                                                    <span class="product-price price">
                                                    R$ <?php echo $product->product_price; ?>
                                                    </span>
                                </div>
                                <h3 class="product-name text-left" style="margin-bottom: 0px;">

                                    <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>">
<!--                                        --><?php //echo $product->product_name; ?>
                                        <?php
                                        if (strlen($product->product_name) < 5)
                                            echo $product->product_name;
                                        else
                                            echo substr($product->product_name, 0, 23);
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

                                <div class="product-action-container clearfix" style="display:none">
                                    <?php if(!empty($userInfo)) { ?>
                                        <a href="javascript:void(0);"  class="product-add-btn product-add-btn-custom" onclick="add_quick_cart(<?php echo $product->product_id; ?>);">Add to Cart
                                        </a>
                                    <?php } else {?>
                                        <a href="<?php echo site_url('home/Entrar'); ?>"  class="product-add-btn product-add-btn-custom">Add to Cart
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


    <div class="lg-margin3x xs-margin2x"></div>
    <div class="sm-margin visible-xs"></div>
    <div class="container">
        <div class="row">
       <div class="col-sm-4">
                <div class="feature-box feature-box-inline clearfix">
                    <span class="feature-icon icon-delivery"></span>
                    <div class="feature-content">
                        <h3> ORÇAMENTO GRÁTIS </h3>
                        <p>Peça um orçamento grátis, é livre e sem compromisso. Combine o dia da visita e negocie a contratação.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature-box feature-box-inline clearfix">
                    <img class="new-icon" src="<?php echo base_url('assets/images/email.png'); ?>" alt="ok" >
                    <div class="feature-content">
                        <h3> ATENDIMENTO 24Hs </h3>
                        <p>Nosso site está online 24 horas, 7 dias da semana, nosso atendimento é 100% online.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature-box feature-box-inline clearfix">
                    <img class="new-icon" src="<?php echo base_url('assets/images/lock1.png'); ?>" alt="oks" >
                    <div class="feature-content">
                        <h3> COMBINE PAGAMENTOS </h3>
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
            <h2 class="carousel-title">NOSSAS CATEGORIAS</h2>
            <div class="row">
                <div class="owl-carousel brands-carousel">
                    <?php $categories = $this->user_helper->getCategory(); ?>
                    <?php foreach ($categories as $category) { ?>
                        <div class="brand container111">
                            <a href="<?php echo site_url('home/Lista_de_servicos'); ?>">
                                <img src="<?php echo base_url(); ?>admin/images/category/<?php echo $category->category_img; ?>"
                                     style="width: 170px;height: 100px;">
                            </a>
                            <div class="centered" style="color: #000"> <span style="font-size: 16px;"> <?php echo $category->category_title; ?> </span> </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


                        
                    

    <div class="mb_50 hidden-xs"></div>
    <div class="lg-margin visible-xs"></div>
</section>

<!-- <script type="text/javascript">
    function add_quick_cart(product_id) {
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

<script>
   // $().ready(function() {
         // $(".product-top, a.change_status").click(function(){
        function change_status(product_id,users_id){
          if(product_id !=0){
         
            $.ajax({
                  url : "<?php echo site_url();?>/home/count_services",
                  data : {product_id : product_id},
                  method: "POST",
                  success:function(res){
                    // alert(res);return false;
                    window.location.href = "<?php echo site_url(); ?>home/Servicos?product_id="+product_id;
                  }
              }); 
           }
        
           else if(users_id=="0"){
                window.location.href = "<?php echo site_url(); ?>home/Servicos?product_id="+product_id;
            }else{
              $.ajax({
                  url : "<?php echo site_url('home/history_product');?>",
                  data : {product_id : product_id,users_id : users_id},
                  method: "POST",
                  success:function(res){
                    // alert(res);return false;
                    window.location.href = "<?php echo site_url(); ?>home/Servicos?product_id="+product_id;
                  }
              }); 
            }


           
        } 	
        // });
    // });
</script>
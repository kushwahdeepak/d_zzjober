
<?php $userInfo = $this->session->userInfo; ?>

<style type="text/css">
.service_margin{
      margin-bottom: 25px !important;
    }
.price {
    font-size: 12px !important;
    line-height: 15px !important;
}
.checked {
    color: orange;
}
label.star {
    float: right !important;
}
.review-comment-content {
    margin-left: 0px !important;
}
.product-overview-image {
    height: 600px;
}
.imagesize1{
    height: 35em !important;
    margin-top: 12%;
}
@media only screen and (max-width: 450px) {
    .product-overview-image {
        height: 380px;
    }
    .bx-wrapper .bx-controls-direction a {
        display: block;
        position: absolute;
        top: 50%;
    }
    .imagesize1{
        height: 26em !important;
        margin-top: 12%;
    }

}
.marginalign{
    margin-top: -19px;
}


@media only screen and (max-width: 720px) {
    .imagesize1{
        margin-top: 50px!important;
    }
}
    .datatopmargin{
        margin-top: 31px!important;

    }
</style>
    <?php $userInfo = $this->session->userInfo; ?>
        <section id="content" role="main">
    <div id="product-single-container" class="light">
        <div class="breadcrumb-container absolute">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo site_url('home/'); ?>" >Home</a></li>
                            <li class="active">Serviços</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebg left"></div>
        <div class="sidebg middle visible-sm"></div>
        <div class="sidebg right"></div>
        <div class="carousel-container">
            <div class="container">
                <div class="row">

                    <?php $product_user_img = $this->user_helper->getProductRegisterName($product_info->user_id); ?>
                    <img src="<?php echo base_url(); ?>admin/images/users/<?php echo $product_user_img->user_img; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/favicon.png'); ?>'" class="profile_on_ad_overview">

                    <div class="col-sm-6">
                        <div class="product-single-carousel">
                            <?php $product_images = $this->user_helper->getProductImages($product_info->product_id); ?>

                            <?php if (isset($product_images) && !empty($product_images)) {
                                $i = 1; ?>

                                <?php foreach ($product_images as $image) { ?>

                                    <div class="slide">
                                        <img src="<?php echo base_url('admin/assets/images/products/'); ?><?php echo $image->product_image_name; ?>" alt="product <?php echo $i; ?>" class="imagesize1 img-responsive product-overview-image">
                                    </div>
                                    <?php $i++;
                                } ?>

                            <?php } else { ?>

                                <div class="slide">
                                    <img src="<?php echo base_url('admin/assets/images/products/product1.jpg'); ?>" alt="product 1" class="img-responsive imagesize1 product-overview-image">
                                </div>

                            <?php } ?>
                        </div>
                        <img src="<?php echo base_url('admin/assets/images/products/product1.jpg'); ?>" alt="product 1" class="img-responsive imagesize1 product-overview-image">
                    </div>
                </div>
            </div>
        </div>
        
        

        <div class="product-single-meta-container">
            <div class="container">
                <div class="col-md-6 col-md-push-6 product-single-meta datatopmargin">
                    <h2 class="product-name">
                        <?php echo $product_info->product_name; ?>
                    </h2>
                    
                    <?php $product_RegisterName = $this->user_helper->getProductRegisterName($product_info->user_id); ?>
                    <p> Por: 
                        <?php if (!empty($product_RegisterName->username)) echo $product_RegisterName->username; ?>
                    </p>

                    <div class="clearfix">
                        <div class="product-price-container pull-left">
                                 <span class="product-price">
                                    <?php
                                        if ($product_info->time_price_check == 1)
                                        {
                                            $product_price = 'Á combinar'; 
                                             echo "R$ ". $product_price ;    
                                        }
                                        else 
                                        {
                                            $product_price = str_replace(".",",", number_format($product_info->product_price, 2));  
                                            echo "R$ ". $product_price;
                                        }
                                        ?>
                                 </span>
                        </div>
                        <div class="ratings-container pull-right">
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
                    </div>
                    <div class="xs-margin"></div>
                    <ul>
                        <li>
                            <span><strong>Anúncio :</strong>  </span>
                            <?php if($product_info->product_status == 'enabled'){?>
                                        <?php echo "Ativo"; }?>
                              <?php if($product_info->product_status == 'disabled')  {
                                    echo  "inativo ";
                                } ?>
                        </li>
                        <li>
                            <span><strong> Orçamento :</strong> </span>
                            <?php
                                if ($product_info->time_price_check == 1)
                                {
                                    $budget =$product_info->budget;
                                    echo $budget ;   
                                }
                                else 
                                {
                                    $budget =str_replace(".",",",$product_info->budget);     
                                    echo $budget;
                                } 
                                ?>
                        </li>
                        <li>
                            <span><strong> Endereço :</strong> </span>
                            <?php
                            if (strlen($product_info->address) < 60)
                                echo $product_info->address;
                            else
                                echo substr($product_info->address, 0, 100);
                            ?>
                        </li>
                        <li>
                            <span><strong> Contato :</strong> </span>
                            <?php echo $product_info->contact_number; ?>
                        </li>
                        <li>
                            <span><strong>Pagamento :</strong> </span>
                            <?php if ($product_info->payment_method == "money") { ?>
                                Dinheiro
                            <?php } else if ($product_info->payment_method == "card") { ?>
                                cartão
                            <?php } else if ($product_info->payment_method == "moneycard") { ?>
                                Dinheiro & cartão
                            <?php } ?>
                        </li>
                        <li>
                            <span><strong>Desconto :</strong> </span>
                           <?php echo $product_info->discount; ?>%
                        </li>
                        <li>
                            <?php if(!empty($product_info->facebook_link)) { ?>
                                <span><strong><img src="<?php echo base_url(); ?>admin/images/facebook.png" style="width:25px;"></strong> </span>
                                <a href="<?php echo $product_info->facebook_link; ?>" target="_blank"><?php echo $product_info->facebook_link; ?></a>
                            <?php } ?>
                        </li>
                        <li>
                            <?php if(!empty($product_info->instagram_link)) { ?>
                                <span><strong><img src="<?php echo base_url(); ?>admin/images/insta.png" style="width:25px;"></strong> </span>
                                <a href="<?php echo $product_info->instagram_link; ?>" target="_blank"><?php echo $product_info->instagram_link; ?></a>
                            <?php } ?>
                        </li>
                    </ul>
                    <!-- <p class="hidden-md">
                        <span><strong> Descrição:</strong></span><br/>
                        <?php
                            if (strlen($product_info->product_description) < 60)
                                echo $product_info->product_description;
                            else
                                echo substr($product_info->product_description, 0, 1000);
                        ?>
                    </p> -->
                   
                    <div class="product-absolute-action-container clearfix">
                        <?php if(!empty($userInfo)) { ?>
                        <a href="javascript:void(0);"  class="btn btn-custom-6 min-width-md product-add-btn product-add-btn-custom "  onclick="add_quick_cart(<?php echo $product_info->product_id; ?>);"><i class="fa fa-shopping-cart"></i> Carrinho
                        </a>
                        <?php } else {?>
                        <a href="<?php echo site_url('home/Entrar'); ?>"  class="btn btn-custom-6 min-width-md product-add-btn product-add-btn-custom"><i class="fa fa-shopping-cart"></i> Carrinho
                        </a>
                        <?php }?>
                         <?php if(!empty($userInfo)) { 
                            ?>
                        <a href="javascript:void(0);"  class="product-add-btn product-add-btn-custom product-add-btn-custom" onclick="add_fav(<?php echo $product_info->product_id; ?>);">
                            <i class="fa fa-heart"></i>  Favoritos
                        </a>
                        <?php } else {?>
                        <a href="<?php echo site_url('home/Entrar'); ?>"  class="product-add-btn product-add-btn-custom product-add-btn-custom">
                            <i class="fa fa-heart"></i>  Favoritos
                        </a>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <ul class="nav nav-pills" role="tablist">
            <li class=""><a href="#description" role="tab" data-toggle="tab">Descrição</a></li>
            <li class="active" style="margin-left: 0;"><a href="#comments" role="tab" data-toggle="tab"><i class="fa fa-star" style="color: #fd4;"></i> AVALIAÇÕES</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade" id="description">
                <div class="col-md-12" style="background: white;padding: 15px;">
                    <label for="description" class="form-label" data-toggle="collapse" data-target="#demo_description" style="text-transform: none;background: #ececec;width: 100%;padding: 8px;margin: 0;color: #808080;">Descrição
                    </label>
                    <div id="demo_description" class="collapse in">
                        <p name="description" id="description" class="form-control input-lg" maxlength="160" style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"><?php echo $product_info->product_description; ?></p>
                    </div>
                </div>

                <div class="col-md-12" style="background: white;padding: 15px;">
                    <label for="description" class="form-label" data-toggle="collapse" data-target="#demo_description1" style="text-transform: none;background: #ececec;width: 100%;padding: 8px;margin: 0;color: #808080;">Empresa, Autônomo ou Freelancer
                    </label>
                    <div id="demo_description1" class="collapse">
                        <p name="description" id="description1" class="form-control input-lg" maxlength="160" style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"><?php echo $product_info->product_description1; ?></p>
                    </div>
                </div>

                <div class="col-md-12" style="background: white;padding: 15px;">
                    <label for="description" class="form-label" data-toggle="collapse" data-target="#demo_description2" style="text-transform: none;background: #ececec;width: 100%;padding: 8px;margin: 0;color: #808080;">Serviços já realizados
                    </label>
                    <div id="demo_description2" class="collapse">
                        <p name="description" id="description2" class="form-control input-lg" maxlength="160" style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"><?php echo $product_info->product_description2; ?></p>
                    </div>
                </div>

                <div class="col-md-12" style="background: white;padding: 15px;">
                    <label for="description" class="form-label" data-toggle="collapse" data-target="#demo_description3" style="text-transform: none;background: #ececec;width: 100%;padding: 8px;margin: 0;color: #808080;">Horários de atendimento
                    </label>
                    <div id="demo_description3" class="collapse">
                        <p name="description" id="description3" class="form-control input-lg" maxlength="160" style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"><?php echo $product_info->product_description3; ?></p>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade in active" id="comments">
                <div class="row">
                    <div class="col-sm-7 padding-right-md review-comments">
                        <h3>  <?php echo $product_ratting->cnt; ?> Avaliação para “<?php echo $product_info->product_name; ?>”</h3>
                        <ul class="review-comments">
                            <?php foreach ($productall_review as $product_review) { 
                                $username = $this->user_helper->getUserName($product_review->client_user_id);
                                ?>
                                <li>
                                    <div class="review-comment">
                                        <div class="ratings-container ">
                                            <?php if ($product_review->rating >= 1) { ?>
                                                <span class="fa fa-star checked"></span>    
                                            <?php } else{ ?>
                                                <span class="fa fa-star-o"></span>
                                            <?php } ?>
                                            <?php if ($product_review->rating >= 2) { ?>
                                                <span class="fa fa-star checked"></span>    
                                            <?php } else{ ?>
                                                <span class="fa fa-star-o"></span>
                                            <?php } ?>
                                            <?php if ($product_review->rating >= 3) { ?>
                                                <span class="fa fa-star checked"></span>    
                                            <?php } else{ ?>
                                                <span class="fa fa-star-o"></span>
                                            <?php } ?>
                                            <?php if ($product_review->rating >= 4) { ?>
                                                <span class="fa fa-star checked"></span>    
                                            <?php } else{ ?>
                                                <span class="fa fa-star-o"></span>
                                            <?php } ?>
                                            <?php if ($product_review->rating >= 5) { ?>
                                                <span class="fa fa-star checked"></span>    
                                            <?php } else{ ?>
                                                <span class="fa fa-star-o"></span>
                                            <?php } ?>
                                        </div>
                                       
                                        <div class="review-comment-content">
                                            <h4> <?php echo $product_review->subject; ?> </h4>
                                            <?php $Date = date('d-m-Y', strtotime($product_review->feedback_created_date)); ?>
                                            <div class="review-comment-meta">Por <a href="#"> <?php echo $product_review->name; ?> </a> em <?php echo $Date ?>
                                            </div>
                                            <p> <?php echo $product_review->simple_message; ?> </p>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul> 
                    </div> 
                    <div class="lg-margin clearfix visible-xs"></div>

                    <?php  if (!empty( $userInfo) && $product_info->user_id != $userInfo->user_id) { ?>
                       <div class="col-sm-5 padding-left-md review-comment-form">
                            <h3>Escreva sua Avaliação</h3>
                              
                            <form action="<?php echo site_url('user_controller/customerFeedback'); ?>" name="review_form1" method="post">
                                <?php if (!empty($userInfo)) { ?>

                                    <input type="hidden" name="feedback_product_id" id="feed_product_id" value="<?php echo $product_info->product_id; ?>">
                                    <input type="hidden" name="feedback_user_id" id="feed_user_id" value="<?php echo $userInfo->user_id; ?>">
                                    <input type="hidden" name="name" id="feed_name" type="text" class="form-control input-lg" value="<?php echo $userInfo->username; ?>" placeholder="Entre com seu apelido *" required>
                                <?php } ?>

                                <div class="form-group">
                                    <?php if (!empty($userInfo)) { ?>
                                        <input name="username" id="feed_name" type="text" class="form-control input-lg" value="<?php echo $userInfo->username; ?>" placeholder="Entre com seu apelido *" required disabled>
                                    <?php } else { ?>
                                        <input name="name" id="feed_name" type="text" class="form-control input-lg" placeholder="Entre com seu nome de usuário *" required>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <input name="subject" id="feed_subject" type="text" class="form-control input-lg" placeholder="Título de sua avaliação *" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="simple_message" id="feed_msg" class="form-control input-lg min-height" cols="30" rows="6" placeholder="Descreva seu comentário *"></textarea>
                                </div>
                                <?php if (!empty($userInfo)) {   
                                    if ($product_info->user_id == $userInfo->user_id) { ?>
                                    <p style="margin-top: -25px;color: #3297d2;font-weight: bold;">*Você não pode avaliar seu próprio serviço*</p>
                                <?php } } ?>
                                <div class="form-group abc">
                                    <input class="star star-5" id="star-5" name="star" value="5" type="radio" required>
                                    <label class="star star-5" for="star-5"></label>

                                    <input class="star star-4" id="star-4" name="star" value="4" type="radio" required>
                                    <label class="star star-4" for="star-4"></label>

                                    <input class="star star-3" id="star-3" name="star" value="3" type="radio" required>
                                    <label class="star star-3" for="star-3"></label>

                                     <input class="star star-2" id="star-2" name="star" value="2" type="radio" required>
                                    <label class="star star-2" for="star-2"></label>

                                    <input class="star star-1" id="star-1" name="star" value="1" type="radio" required>
                                    <label class="star star-1" for="star-1"></label>
                                </div>
                                <div class="xs-margin"></div>

                                <?php if (!empty($userInfo)) { ?>

                                    <?php if ($product_info->user_id == $userInfo->user_id) { ?>
                                        <input type="button" class="btn btn-custom-5 btn-lg min-width" value="AVALIAR">
                                    <?php } else { ?>
                                        <input type="Submit" class="btn btn-custom-5 btn-lg min-width" value="AVALIAR">
                                    <?php } ?>

                                <?php } else { ?>
                                    <a href="<?php echo site_url('home/Entrar'); ?>">
                                        <input type="button" class="btn btn-custom-5 btn-lg min-width" value="AVALIAR">
                                    </a>
                                <?php } ?>
                            </form>
                        </div> 
                    <?php } else if (empty( $userInfo)) { ?>
                        <div class="col-sm-5 padding-left-md review-comment-form">
                            <h3>Escreva sua Avaliação</h3>
                              
                            <form action="<?php echo site_url('user_controller/customerFeedback'); ?>" name="review_form1" method="post">
                                <?php if (!empty($userInfo)) { ?>

                                    <input type="hidden" name="feedback_product_id" id="feed_product_id" value="<?php echo $product_info->product_id; ?>">
                                    <input type="hidden" name="feedback_user_id" id="feed_user_id" value="<?php echo $userInfo->user_id; ?>">
                                    <input type="hidden" name="name" id="feed_name" type="text" class="form-control input-lg" value="<?php echo $userInfo->username; ?>">
                                <?php } ?>

                                <div class="form-group">
                                    <?php if (!empty($userInfo)) { ?>
                                        <input name="username" id="feed_name" type="text" class="form-control input-lg" value="<?php echo $userInfo->username; ?>" placeholder="Entre com seu apelido *" required disabled>
                                    <?php } else { ?>
                                        <input name="name" id="feed_name" type="text" class="form-control input-lg" placeholder="Entre com seu nome de usuário *" required>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <input name="subject" id="feed_subject" type="text" class="form-control input-lg" placeholder="Título de sua avaliação *" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="simple_message" id="feed_msg" class="form-control input-lg min-height" cols="30" rows="6" placeholder="Descreva seu comentário *"></textarea>
                                </div>
                                <?php if (!empty($userInfo)) {   
                                    if ($product_info->user_id == $userInfo->user_id) { ?>
                                    <p style="margin-top: -25px;color: #3297d2;font-weight: bold;">*Você não pode avaliar seu próprio serviço*</p>
                                <?php } } ?>
                                <div class="form-group abc">
                                    <input class="star star-5" id="star-5" name="star" value="5" type="radio" required>
                                    <label class="star star-5" for="star-5"></label>

                                    <input class="star star-4" id="star-4" name="star" value="4" type="radio" required>
                                    <label class="star star-4" for="star-4"></label>

                                    <input class="star star-3" id="star-3" name="star" value="3" type="radio" required>
                                    <label class="star star-3" for="star-3"></label>

                                     <input class="star star-2" id="star-2" name="star" value="2" type="radio" required>
                                    <label class="star star-2" for="star-2"></label>

                                    <input class="star star-1" id="star-1" name="star" value="1" type="radio" required>
                                    <label class="star star-1" for="star-1"></label>
                                </div>
                                <div class="xs-margin"></div>

                                <?php if (!empty($userInfo)) { ?>

                                    <?php if ($product_info->user_id == $userInfo->user_id) { ?>
                                        <input type="button" class="btn btn-custom-5 btn-lg min-width" value="AVALIAR">
                                    <?php } else { ?>
                                        <input type="Submit" class="btn btn-custom-5 btn-lg min-width" value="AVALIAR">
                                    <?php } ?>

                                <?php } else { ?>
                                    <a href="<?php echo site_url('home/Entrar'); ?>">
                                        <input type="button" class="btn btn-custom-5 btn-lg min-width" value="AVALIAR">
                                    </a>
                                <?php } ?>
                            </form>
                        </div> 
                    <?php } ?>

                        

                   

                </div>
            </div>
        </div>
    </div>
    <div class="lg-margin2x service_margin "></div>


    <div class="container">
        <div class="carousel-container">
            <h2 class="carousel-title">SERVIÇOS SIMILARES
            </h2>
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
                                            echo "R$ ".$product_price ; 
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
                            <a onclick="change_status(<?=$product->product_id.','.$userid?>)" href="javascript:void(0)"  class="product-add-btn product-add-btn-custom change_status1">Contratar
                            </a>
                            <?php if(!empty($userInfo)) { ?>

                            <!-- <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>"  class="product-add-btn product-add-btn-custom">Contratar
                            </a> -->
                            <a href="javascript:void(0);"  class="product-add-btn product-add-btn-custom add-fav" onclick="add_fav(<?php echo $product->product_id; ?>);">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a href="javascript:void(0);"  class="product-add-btn product-add-btn-custom" onclick="add_quick_cart(<?php echo $product->product_id; ?>);">
                                <i class="fa fa-shopping-cart"></i>
                            </a>

                            <?php } else {?>

                            <!-- <a href="<?php echo site_url('home/Entrar'); ?>"  class="product-add-btn product-add-btn-custom">
                                Contratar
                            </a> -->
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
        </section>


<script>
    function SubmitReview() {
        var feedback_product_id = document.getElementById('feed_product_id').value;
        var feedback_user_id = document.getElementById('feed_user_id').value;
        var name = document.getElementById('feed_name').value;
        var subject = document.getElementById('feed_subject').value;
        var simple_message = document.getElementById('feed_msg').value;

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url(); ?>/user_controller/customerFeedback',
            data: {
                'feedback_user_id': feedback_user_id,
                'feedback_product_id': feedback_product_id,
                'subject': subject,
                'simple_message': simple_message,
                'name': name,
                'star': create_time,
            },
            success: function (data) {
                toastr.success('<strong>Successfully!</strong> Payment Complete!');
            }
        });
        
    }
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
<style type="text/css">
    .mb {
    margin-bottom: 15px;
    }
    .mt {
    margin-top: 15px;
    }
    select.form-control.select2 {
    margin: 0 0 0 20px!important;
    width: 260px;
    }
</style>
<?php $userInfo = $this->session->userInfo; ?>
<style type="text/css">
    .mb {
    margin-bottom: 15px;
    }
    .mt {
    margin-top: 15px;
    }
</style>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">
<?php $userInfo = $this->session->userInfo; ?>
<div style="margin-bottom: 30px;"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline" action="<?php echo site_url();?>/home/searchData" method="post">
                Selecione Serviços &nbsp;&nbsp;&nbsp;
                <select class="form-control" name="name" style="width:200px; margin-bottom: 0px;">
                    <option>escolher...</option>
                    <option value="All">Todos os Serviços</option>
                    <?php 
                        if (isset($all_productList) && !empty($all_productList)) { ?>
                    <?php foreach ($all_productList as $service) { ?>
                    <option value="<?php echo $service->product_id;?>"><?php echo $service->product_name;?></option>
                    <?php } } ?>
                </select>
                &nbsp;&nbsp;&nbsp;
                <select class="form-control" name="names" style="width:200px; margin-bottom: 0px;">
                    <option>escolher...</option>
                    <option value="New">Novos Serviços</option>
                    <option value="All">Serviços Procurados</option>
                </select>
                &nbsp;&nbsp;&nbsp;
                <input type="submit" value="procurar" class="btn btn-warning">
            </form>
        </div>
    </div>
    <br><br>
    <div class="carousel-title">MAIS PROCURADOS</div>
    <div class="row">











        <?php 
            //echo "<pre>"; print_r($single_service); exit;
            if (isset($wanted_services) && !empty($wanted_services)) { ?>
        <?php foreach ($wanted_services as $product) { ?>
        <div class="col-md-3">
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
                    <a href="javascript:void(0);" title="Add to Cart" class="product-add-btn product-add-btn-custom" onclick="add_quick_cart(<?php echo $product->product_id; ?>);">Add to Cart
                    </a>
                    <?php } else {?>
                    <a href="<?php echo site_url('home/Entrar'); ?>" title="Add to Cart" class="product-add-btn product-add-btn-custom">Add to Cart
                    </a>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php }
                ?>




        <?php } else if (isset($single_service) && !empty($single_service)) { ?>










        <?php foreach ($single_service as $product) { ?>
        <div class="col-md-3">
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
                    <a href="javascript:void(0);" title="Add to Cart" class="product-add-btn product-add-btn-custom" onclick="add_quick_cart(<?php echo $product->product_id; ?>);">Add to Cart
                    </a>
                    <?php } else {?>
                    <a href="<?php echo site_url('home/Entrar'); ?>" title="Add to Cart" class="product-add-btn product-add-btn-custom">Add to Cart
                    </a>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php }
            ?>








        <?php } else if (isset($new_services) && !empty($new_services)) { ?>












    <?php foreach ($new_services as $product) { ?>
    <div class="col-md-3">
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
                <a href="javascript:void(0);" title="Add to Cart" class="product-add-btn product-add-btn-custom" onclick="add_quick_cart(<?php echo $product->product_id; ?>);">Add to Cart
                </a>
                <?php } else {?>
                <a href="<?php echo site_url('home/Entrar'); ?>" title="Add to Cart" class="product-add-btn product-add-btn-custom">Add to Cart
                </a>
                <?php }?>
            </div>
        </div>
    </div>
    <?php }
        }   ?>









</div>
<br>
</div>
</div>
<div class="lg-margin3x xs-margin2x"></div>
<!-- end -->
<!-- JS -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
     $(".chosen").chosen({
     max_selected_options: 5
     });
     
    });
     
</script>
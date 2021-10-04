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
<div class="lg-margin3x xs-margin2x"></div>
    <div class="container">
    <?php     $product_data = $this->user_helper->getAllProductListByCategoryID('30');?>
    <?php if (isset($product_data) && !empty($product_data)) { ?>
            <!-- <div class="carousel-title">MAIS PROCURADOS</div>  -->
<div class="row">
  <div class="">
                        <?php foreach ($product_data as $product) { ?>
    <div class="col-md-3">
       
                            <div class="product product2">
                                <div class="product-top">
                                    <figure class="product-image-container product_banner_size">
                                      <a class="change_status1" href="#">
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
                     
    </div>
       <?php }
                    ?>
                   
  </div>
                   
  </div>
          <?php } else { echo "No product found!"; }    ?>
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



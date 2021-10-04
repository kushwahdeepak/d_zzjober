<?php $userInfo = $this->session->userInfo; ?>
<style type="text/css">

.product-name-custom {
    line-height: 19px;
    font-size: 13px !important;
}
.price {
    font-size: 12px !important;
    line-height: 15px !important;
}
.easyPaginateNav{
    margin-top: 4%;
    margin-bottom: 2%;
    padding-left: 1%;
    width: 100% !important;
    text-align: right;
}
.easyPaginateNav .first{
    background-color: #e9e9e9 !important;
    color: #000 !important;
    padding: 15px 16px !important;
    border-radius: 50% !important;
    margin: 1px !important;
}
.easyPaginateNav .last{
    background-color: #e9e9e9 !important;
    color: #000 !important;
    padding: 15px 16px !important;
    border-radius: 50% !important;
    margin: 1px !important;
}
.easyPaginateNav .page{
    background-color: #e9e9e9 !important;
    color: #000 !important;
    padding: 15px 18px !important;
    border-radius: 50% !important;
    margin: 1px !important;
}
.easyPaginateNav .current{
    background-color: #1fbdbd !important;
    color: #000 !important;
    padding: 15px 18px !important;
    border-radius: 50% !important;
    margin: 1px !important;
}
.easyPaginateNav .prev{
    display: none;
}
.easyPaginateNav .next{
    display: none;
}
/*.product-image-height {
    min-height: 333.4px;
    max-height: 333.4px;
}*/

.ipad-view{
    display: none;
}
.mobile-desktop-view {
    display: block;
}
@media only screen and (max-width: 1200px) {
    .ipad-view{
        display: block;
    }
    .mobile-desktop-view {
        display: none;
    }
}

@media only screen and (max-width: 767px) {
    .ipad-view{
        display: none;
    }
    .mobile-desktop-view {
        display: block;
    }
}


@media only screen and (max-width: 450px) {
    /*.product-image-height {
        min-height: 200px;
        max-height: 200px;
    }*/
    ./*product-add-btn-custom {
        font: 12px/16px open_sansregular, sans-serif;
        padding: 4px 6px !important;
        min-width: 20px !important;
        border: 1px solid #cbc6b5 !important;
    }*/
    .md-margin2x {
        margin-bottom: 25px !important;
    }
}
@media only screen and (max-width: 400px) {
    .product-name-custom {
        line-height: 19px;
        font-size: 12px !important;
    }
}
    .marginalign{
        margin-top: -19px;
    }
.checked{
    color: #ffa500;
}
</style>

<script type="text/javascript">

    function ajaxSearchFilterByMutipleValue() 
    {
        data = {};
        data['categoryValue'] = $("#categoryValue").val(); 
        data['subcategoryValue'] = $("#subcategoryValue").val();
        data['stateValue'] = $("#stateValue").val();
        data['cityValue'] = $("#cityValue").val();
    
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/search/ajaxSearchFilterByMutipleValue",
            data: data,
            dataType: "json",
            success: function(data)
            {
                appendServiceGrid(data)
            }
        });
    }

    function resetajaxSearchFilter() 
    {
        $("#categoryValue option[selected]").removeAttr("selected");    
        $("#subcategoryValue option[selected]").removeAttr("selected"); 
        $("#stateValue option[selected]").removeAttr("selected");    
        $("#cityValue option[selected]").removeAttr("selected");    
        $("#categoryValue option:first").attr("selected","selected");    
        $("#subcategoryValue option:first").attr("selected","selected");    
        $("#stateValue option:first").attr("selected","selected");    
        $("#cityValue option:first").attr("selected","selected");  
        ajaxSearchFilterByMutipleValue();
    }





    function ajaxSearchBySubcategory(subcategory_id) 
    {
        data = {};
        data['subcategory_id'] = subcategory_id;
    
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/search/ajaxSearchBySubcategory",
            cache:false,
            data: data,
            dataType: "json",
            success: function(data)
            {
                appendServiceGrid(data)
            }
        });
    }
    
    function ajaxSearchByPriceFilter() 
    {
        data = {};
        data['price-range-low'] = $("#price-range-low").val();
        data['price-range-high'] = $("#price-range-high").val();
    
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/search/ajaxSearchByPriceFilter",
            data: data,
            dataType: "json",
            success: function(data)
            {
                appendServiceGrid(data)
            }
        });
    }
    
    function clearSearchByPriceFilter() 
    {
        $("#price-range-low").val("0.00");
        $("#price-range-high").val("0.00");
    }
    
    function ajaxSearchByNameFilter() 
    {
        data = {};
        data['service_name'] = $("#service_name").val();
    
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/search/ajaxSearchByServiceName",
            cache:false,
            data: data,
            dataType: "json",
            success: function(data)
            {
                appendServiceGrid(data)
            }
        });
    }
    
    function ajaxSearchBySorting() 
    {
        var sp = $("#sort_filter").attr('sb');
    
        data = {};
        data['sort_filter'] = $("#sbSelector_"+sp).text();
    
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/search/ajaxSearchBySorting",
            cache:false,
            data: data,
            dataType: "json",
            success: function(data)
            {
                appendServiceGrid(data)
            }
        });
    }
    
    function appendServiceGrid(product)
    {
        if (product.products.length == 0)
        {
            $("#ias-service-list").html("");
            $("#ias-service-list").append("<div class='col-sm-4 md-margin2x'>No Search Result</div>");
        }
        else
        {
            $("#ias-service-list").html("");
            $("#ias-service-list").append(product.products);
        }
    }
    
</script>
<style>
    .alignmargin{
        margin-left: -27px;
    }
    .buttonalign{
        margin-left:-23px;
    }

</style>
<section id="content" role="main">
    

    <div class="container" style="min-height: 530px;">

                <div class="">
                        <div id="product_list" class="category-grid">
                            <div class="row" id="ias-service-list" style="margin-top: 35px;"> 
                               
                                <?php
                                 if(isset($product_list) && !empty($product_list)) { ?>

                                <?php foreach($product_list as $product) {  ?>
                               
                                <div class="col-md-3 col-sm-4 col-xs-6 md-margin2x">
                                    <div class="product">
                                        <div class="product-top">
                                            <a href="<?php echo site_url('home/clear_favroite/'.$product->product_id); ?>" class="close_fav_button"><i class="fa fa-close"></i></a>
                                            <figure class="product-image-container product_banner_size">
                                                <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>">
                                                <?php $product_images = $this->user_helper->getProductFrontImages($product->product_id); ?>
                                                <?php if(isset($product_images) && !empty($product_images)) { $i=0; ?>
                                                <?php foreach ($product_images as $image) { ?>
                                                <img src="<?php echo base_url(); ?>admin/assets/images/products/<?php echo $image->product_image_name; ?>" alt="Product image" class="<?php if($i==0) echo "product-image"; else echo "product-image-hover"; ?> product_banner_img">
                                                <?php $i++; } ?>
                                                <?php } else { ?>
                                                <img src="<?php echo base_url('admin/assets/images/products/product2.jpg'); ?>" alt="Product image" class="product-image product_banner_img">
                                                <?php } ?>
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="product-meta">
                                            <div class="product-meta-top clearfix">
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
                                                             echo "R$". $product_price ;
                                                        }    
                                                        ?>
                                                    </span>
                                                </div>

                                                <h5 class="product-name product-name-custom text-left">
                                                    <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>" class="mobile-desktop-view">
                                                        <?php
                                                        if (strlen($product->product_name) < 5)
                                                            echo $product->product_name;
                                                        else
                                                            echo substr($product->product_name, 0, 22);
                                                        ?>
                                                    </a>

                                                    <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>" class="ipad-view">
                                                        <?php
                                                        if (strlen($product->product_name) < 5)
                                                            echo $product->product_name;
                                                        else
                                                            echo substr($product->product_name, 0, 18);
                                                        ?>
                                                    </a>

                                                </h5>
                                            </div>
                                            <div class="review-comment product-meta-top clearfix ratings-container marginalign" >
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
                                            <div class="product-absolute-action-container clearfix">
                                               <?php if(!empty($userInfo)) { ?>

                                                <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>" class="product-add-btn product-add-btn-custom">Contratar
                                                </a>
                                                <a href="javascript:void(0);" class="product-add-btn product-add-btn-custom add-fav" onclick="add_fav(<?php echo $product->product_id; ?>);">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="product-add-btn product-add-btn-custom" onclick="add_quick_cart(<?php echo $product->product_id; ?>);">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>

                                                <?php } else {?>

                                                <a href="<?php echo site_url('home/Entrar'); ?>" class="product-add-btn product-add-btn-custom">
                                                    Contratar
                                                </a>
                                                <a href="<?php echo site_url('home/Entrar'); ?>" class="product-add-btn product-add-btn-custom add-fav">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <a href="<?php echo site_url('home/Entrar'); ?>" class="product-add-btn product-add-btn-custom">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>

                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } }  ?>
                            </div>
                        </div>

                </div>
    </div>

    
</section>




<script>
    $(document).ready(function () {
        $(document).on('change', '.categories', function () {
            var category_id = $(this).val();

            $.ajax({
                url: '<?php echo site_url(); ?>home/getSubcategoryOfCategory',
                type: 'GET',
                data: {
                    category_id: category_id
                },
                success: function (data) {
                    $('.sub_categories').html(data);
                },
                error: function () {
                    alert('An error has occurred');
                }
            });
        });
    });

    $(document).ready(function () {
        $(document).on('change', '.state_change', function () {
            var state_id = $(this).val();

            $.ajax({
                url: '<?php echo site_url(); ?>home/getCityOfState',
                type: 'GET',
                data: {
                    state_id: state_id
                },
                success: function (data) {
                    $('.state_city').html(data);
                },
                error: function () {
                    alert('An error has occurred');
                }
            });
        });
    });
</script>
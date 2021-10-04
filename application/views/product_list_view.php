<?php $userInfo = $this->session->userInfo; ?>
<style type="text/css">
    .product-add-btn-custom {
    font: 12px/16px open_sansregular, sans-serif;
    padding: 4px 6px !important;
    min-width: 20px !important;
    }
    .product-name-custom {
    margin-right: 75px;
    line-height: 19px;
    margin-bottom: 6px;
    font-size: 13px !important;
    }
    .price {
    font-size: 12px !important;
    line-height: 15px !important;
    }
    .category-list .product .product-top {
    width: 135px;
    }
</style>
<script type="text/javascript">
    function ajaxSearchBySubcategory(subcategory_id) 
    {
      data = {};
      data['subcategory_id'] = subcategory_id;
    
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>index.php/search/ajaxSearchBySubcategoryList",
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
        url: "<?php echo base_url(); ?>index.php/search/ajaxSearchByPriceFilterList",
        cache:false,
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
        url: "<?php echo base_url(); ?>index.php/search/ajaxSearchByServiceNameList",
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
        url: "<?php echo base_url(); ?>index.php/search/ajaxSearchBySortingList",
        cache:false,
        data: data,
        dataType: "json",
        success: function(data)
        {
          console.log(data);
          appendServiceGrid(data)
       }
    });
    }
    
    function appendServiceGrid(product)
    {
      if (product.products.length == 0)
      {
        $("#ias-service-list").html("");
        $("#ias-service-list").append("<div class='col-sm-3 md-margin'>Desculpe, por enquanto não temos serviços desse tipo cadastrado!</div>");
     }
     else
     {
        $("#ias-service-list").html("");
        $("#ias-service-list").append(product.products);
     }
    }
    
</script>
<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo site_url('home/index');?>" >Home</a></li>
                        <li class="active">Service List</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-9 padding-right-lg">
                        <div id="category-filter-bar" class="clearfix">
                            <div class="pull-left clearfix">
                                <div class="pull-left sort-filter">
                                    <div class="normal-selectbox clearfix">
                                        <select id="sort_filter" name="sort-filter" class="selectbox" onchange="ajaxSearchBySorting();">
                                            <option value="Default">Sort By: Default</option>
                                            <option value="Price">Sort By: Price</option>
                                            <option value="Rating">Sort By: Rating</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="pull-left show-filter">
                                    <div class="normal-selectbox clearfix">
                                       <select id="show-filter" name="show-filter" class="selectbox">
                                          <option value="15">Show: 15</option>
                                          <option value="20">Show: 20</option>
                                          <option value="25">Show: 25</option>
                                          <option value="30">Show: 30</option>
                                          <option value="40">Show: 40</option>
                                       </select>
                                    </div>
                                    </div> -->
                            </div>
                            <div class="sm-margin visible-xs clearfix"></div>
                            <div class="pull-right clearfix">
                                <!-- <a href="compare.html" class="btn btn-custom-8 btn-compare pull-right">Compare</a> -->
                                <div class="view-btn-group pull-right">
                                    <a href="<?php echo site_url('home/Lista_de_servicos'); ?>" class="btn btn-view btn-view-grid">Grid View</a> 
                                    <a href="<?php echo site_url('home/productList'); ?>" class="btn btn-view btn-view-list active">List View</a>
                                </div>
                            </div>
                        </div>
                        <div class="category-list">
                            <div id="ias-service-list">
                                <?php if(isset($product_list) && !empty($product_list)) { 
                                    foreach($product_list as $product) { ?>
                                <div class="row product">
                                    <div class="col-sm-9 clearfix">
                                        <div class="product-top">
                                            <figure class="product-image-container">
                                                <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>" >
                                                <?php $product_images = $this->user_helper->getProductFrontImages($product->product_id); ?>
                                                <?php if(isset($product_images) && !empty($product_images)) { $i=0; ?>
                                                <?php foreach ($product_images as $image) { ?>
                                                <img src="<?php echo base_url('admin/assets/images/products/'); ?><?php echo $image->product_image_name; ?>" alt="Product image" class="<?php if($i==0) echo "product-image"; else echo "product-image-hover"; ?>">
                                                <?php $i++; } ?>
                                                <?php } else { ?>
                                                <img src="<?php echo base_url('admin/assets/images/products/product1.jpg'); ?>" alt="Product image" class="product-image">
                                                <?php } ?>
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="product-list-content">
                                            <h3 class="product-name">
                                                <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>" >
                                                <?php echo $product->product_name; ?>
                                                </a>
                                            </h3>
                                            <p>
                                                <?php 
                                                    if (strlen($product->product_description) < 60)
                                                       echo $product->product_description;
                                                    else
                                                       echo substr($product->product_description, 0, 350);
                                                    ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 product-list-meta">
                                        <div class="product-price-container">
                                            <span class="product-price">
                                                 <?php $product_price = str_replace('.',',',$products->product_price); ?>
                                                
                                            $<?php echo $product->product_price; ?>
                                            </span>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-result" data-result="80"></div>
                                            </div>
                                            <span class="ratings-amount">2 Avaliações</span>
                                        </div>
                                        <div class="product-action-container">
                                            <?php if(!empty($userInfo)) { ?>
                                            <a href="javascript:void(0);"  class="product-add-btn pull-right" onclick="add_quick_cart(<?php echo $product->product_id; ?>);">Add to Cart
                                            </a>
                                            <?php } else { ?>
                                            <a href="<?php echo site_url('home/Entrar'); ?>"  class="btn btn-custom btn-block">
                                            <span class="add-btn-text">Add to Cart</span>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } }?>
                            </div>
                            <!-- <div class="pagination-container clear-margin clearfix">
                                <span class="pagination-info">Items 1 to 18 of 120 total</span>
                                <ul class="pagination pull-right">
                                   <li class="active"><span>1</span></li>
                                   <li><a href="#">2</a></li>
                                   <li><a href="#">3</a></li>
                                   <li><a href="#">4</a></li>
                                   <li><a href="#">5</a></li>
                                   <li><a class="next-page" href="#">Next</a></li>
                                </ul>
                                </div> -->
                        </div>
                        <div class="md-margin2x visible-sm visible-xs"></div>
                    </div>
                    <aside class="col-md-3 sidebar" role="complementary">
                        <div class="widget">
                            <div class="accordion" id="sidebar-collapse-filter">
                                <div class="accordion-group panel">
                                    <div class="accordion-title">Name Filter 
                                        <a class="accordion-btn open" data-toggle="collapse" href="#name-filter"></a>
                                    </div>
                                    <div class="accordion-body collapse in" id="name-filter">
                                        <div class="filter-price">
                                            <div id="filter-range-details" class="row">
                                                <div class="col-xs-12">
                                                    <div class="filter-price-label">Service Name</div>
                                                    <input type="text" id="service_name" class="form-control" onkeyup="ajaxSearchByNameFilter();">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="accordion" id="sidebar-collapse-filter">
                                <div class="accordion-group panel">
                                    <div class="accordion-title">Categories 
                                        <a class="accordion-btn open" data-toggle="collapse" href="#category-filter"></a>
                                    </div>
                                    <div class="accordion-body collapse in" id="category-filter">
                                        <div class="accordion-body-wrapper">
                                            <ul id="category-widget" style="padding: 0px;">
                                                <?php 
                                                    $category_list = $this->user_helper->getCategory(); 
                                                    if(!empty($category_list)) {
                                                        foreach ($category_list as $category) 
                                                        {
                                                            $subcategory_list = $this->user_helper->getSubCategory($category->category_id); 
                                                            if(!empty($subcategory_list)) 
                                                            {
                                                                ?>
                                                <li>
                                                    <a href="javascript:void(0);"><?php echo $category->category_title ?>
                                                    <span class="category-widget-btn"></span>
                                                    </a>
                                                    <ul>
                                                        <?php 
                                                            foreach ($subcategory_list as $subcategory) {
                                                                ?>
                                                        <li>
                                                            <a href="javascript:void(0);" onclick="ajaxSearchBySubcategory(<?php echo $subcategory->subcategory_id ?>);"><?php echo $subcategory->subcategory_title ?></a>
                                                        </li>
                                                        <?php } ?>
                                                    </ul>
                                                </li>
                                                <?php } } } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="accordion" id="sidebar-collapse-filter">
                                <div class="accordion-group panel">
                                    <div class="accordion-title">Price Filter <a class="accordion-btn open" data-toggle="collapse" href="#price-filter"></a></div>
                                    <div class="accordion-body collapse in" id="price-filter">
                                        <div class="accordion-body-wrapper">
                                            <div class="filter-price">
                                                <div id="price-range"></div>
                                                <div id="filter-range-details" class="row">
                                                    <div class="col-xs-6">
                                                        <div class="filter-price-label">from</div>
                                                        <input type="text" id="price-range-low" class="form-control">
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="filter-price-label">to</div>
                                                        <input type="text" id="price-range-high" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="filter-price-action">
                                                    <a href="javascript:void(0);" onclick="ajaxSearchByPriceFilter();" class="btn btn-custom min-width-xss">Ok</a> 
                                                    <a href="javascript:void(0);" onclick="clearSearchByPriceFilter();" class="btn btn-custom-7 min-width-xs">Clear</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h3>BestSellers</h3>
                            <div class="owl-carousel bestsellers-slider">
                                <?php if(isset($product_list) && !empty($product_list)) { ?>
                                <?php $j=0; ?>
                                <?php foreach($product_list as $product) { ?>
                                <?php if($j==0) { ?>
                                <div class="product-group">
                                    <?php } ?>
                                    <div class="product clearfix">
                                        <figure class="product-image-container">
                                            <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>">
                                            <?php $product_images = $this->user_helper->getProductFrontImages($product->product_id); ?>
                                            <?php if(isset($product_images) && !empty($product_images)) { $i=0; ?>
                                            <?php foreach ($product_images as $image) { ?>
                                            <img src="<?php echo base_url('assets/images/products/'); ?><?php echo $image->product_image_name; ?>" alt="Product image" class="<?php if($i==0) echo "product-image"; else echo "product-image-hover"; ?>">
                                            <?php $i++; } ?>
                                            <?php } else { ?>
                                            <img src="<?php echo base_url('admin/assets/images/products/product1.jpg'); ?>" alt="Product image" class="product-image">
                                            <?php } ?>
                                            </a>
                                        </figure>
                                        <div class="product-content">
                                            <h3 class="product-name">
                                                <a href="<?php echo site_url(); ?>home/Servicos?product_id=<?php echo($product->product_id); ?>">
                                                <?php echo $product->product_name; ?>
                                                </a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-result" data-result="80"></div>
                                                </div>
                                            </div>
                                            <div class="product-price-container">
                                                <span class="product-price">$<?php echo $product->product_price; ?>  </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($j==2) { $j=0; ?>
                                </div>
                                <?php } else { $j++; ?>
                                <?php } } } ?>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div class="lg-margin3x hidden-xs"></div>
    <div class="md-margin2x visible-xs"></div>
</section>
<script type="text/javascript">
    function add_quick_cart(product_id) {
    
      data = {};
      data['user_product_id'] = product_id;
      data['user_product_quantity'] = 1;
    
      $.ajax({ 
        type: "POST",  
        url: "<?php echo base_url(); ?>index.php/user_controller/addToCart",  
        cache:false,  
        data: data,
        dataType: "json",       
        success: function(response)  
        {  
            toastr.success('Serviço adicionado ao carrinho com sucesso');
            $("#header").load(location.href + " #header");
        }   
    });
    }
</script>
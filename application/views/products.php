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
    .product-image-height {
        min-height: 333.4px;
        max-height: 333.4px;
    }

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
        .product-image-height {
            min-height: 200px;
            max-height: 200px;
        }
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
        location.reload();
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
        var serviceTypeValue = $("#service_type").val();

        if(serviceTypeValue == "")
        {
            if (product.new_products.length == 0)
            {
                $("#new-service-list").html("");
                $("#new-service-list").append("<div class='col-sm-4 md-margin2x'>Desculpe, por enquanto não temos serviços desse tipo cadastrado!</div>");
            }
            else
            {
                $("#new-service-list").html("");
                $("#new-service-list").append(product.new_products);
            }

            // if (product.most_wanted_products.length == 0)
            // {
            //     $("#most-wanted-service-list").html("");
            //     $("#most-wanted-service-list").append("<div class='col-sm-4 md-margin2x'>No Search Result</div>");
            // }
            // else
            // {
            //     $("#most-wanted-service-list").html("");
            //     $("#most-wanted-service-list").append(product.most_wanted_products);
            // }

            $("#new-service-list-div").css("display", "block");
            // $("#most-wanted-service-list-div").css("display", "block");
        }
        else if(serviceTypeValue == "new_services")
        {
            if (product.new_products.length == 0)
            {
                $("#new-service-list").html("");
                $("#new-service-list").append("<div class='col-sm-4 md-margin2x'>No Search Result</div>");
            }
            else
            {
                $("#new-service-list").html("");
                $("#new-service-list").append(product.new_products);
            }

            $("#new-service-list-div").css("display", "block");
            $("#most-wanted-service-list-div").css("display", "none");
        }

        else if(serviceTypeValue == "most_wanted_services")
        {
            if (product.most_wanted_products.length == 0)
            {
                $("#most-wanted-service-list").html("");
                $("#most-wanted-service-list").append("<div class='col-sm-4 md-margin2x'>Desculpe, por enquanto não temos serviços desse tipo cadastrado!</div>");
            }
            else
            {
                $("#most-wanted-service-list").html("");
                $("#most-wanted-service-list").append(product.most_wanted_products);
            }

            $("#new-service-list-div").css("display", "none");
            $("#most-wanted-service-list-div").css("display", "block");
        }
    }
    
</script>
<style>
    /*.alignmargin{
        margin-left: -27px;
    }
    .buttonalign{
        margin-left:-23px;
    }*/

</style>
<section id="content" style="padding-bottom: 0px;" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo site_url('home/index'); ?>" >Home</a></li>
                        <li class="active">Lista de serviços</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>




    <div class="container" style="min-height: 530px;">
        <div class="row">
            <div class="col-md-12 padding-right-lg">
                <div id="category-filter-bar" class="clearfix">
                    <div class="col-sm-12" style="padding: 0">
                        <div class="col-md-3 col-sm-3 col-xs-6" style="padding: 0">
                            <select id="categoryValue" name="category" class="form-control categories">
                                <option value=""> Selecionar categoria </option>
                                <?php foreach ($categoryList as $category ) { ?>
                                    <option value="<?php echo $category->category_id ?>"> <?php echo $category->category_title ?>  </option>    
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6" style="padding: 0">
                            <select id="subcategoryValue" class="form-control sub_categories" name="subcategory">
                                <option value=""> Selecionar categoria primeiro  </option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6" style="padding: 0">
                            <select id="stateValue" class="form-control state_change" name="state">
                                <option value=""> Selecionar estado </option>
                                <?php foreach ($statelist as $state ) { ?>
                                    <option value="<?php echo $state->state_id ?>"> <?php echo $state->state_name ?>  </option>    
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6" style="padding: 0">
                            <select id="cityValue" class="form-control state_city" name="city"> 
                                <option value=""> Selecionar estado primeiro </option>
                            </select>
                        </div>
                        <select id="service_type" class="form-control" name="service_type" style="display: none;"> 
                            <option value="">Serviços Procurados</option>
                            <option value="new_services" <?php if($services_type == 'new_services') echo 'selected'; ?>>Novos Serviços</option>
                            <option value="most_wanted_services" <?php if($services_type == 'most_wanted_services') echo 'selected'; ?>>Mais Procurados</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttonalign" style="padding-right: 0">
                        <div class="filter-price-action" style="float: right;">
                            <a href="javascript:void(0);" onclick="ajaxSearchFilterByMutipleValue()" class="btn btn-custom min-width-xss">BUSCAR</a> 
                            <a href="<?php echo site_url('home/Lista_de_servicos'); ?>" class="btn btn-custom-7 min-width-xs" style="margin-right: 0px;">Limpar</a> 
                        </div>
                    </div>
                    <div class="sm-margin visible-xs clearfix"></div>
                </div>




                <div id="new-service-list-div" class="category-grid">
                    <!-- <div class="carousel-title">Novos Serviços</div> -->
                    <div class="row" id="new-service-list"></div>
                </div>



            
                <div id="most-wanted-service-list-div" class="category-grid">  
                    <!-- <div class="carousel-title">Mais Procurados</div> -->
                    <div class="row" id="most-wanted-service-list"></div>
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


<script type="text/javascript">
    ajaxSearchFilterByMutipleValue();
</script>
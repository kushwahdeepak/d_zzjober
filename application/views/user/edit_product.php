<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo site_url('home/index'); ?>" >Home</a></li>
                        <li class="active">Editar serviços</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="xs-margin"></div>

    <div class="accordion" id="collapse">
        <form name="edit_product_form" id="edit_product_form" method="post"
              action="<?php echo site_url('user_controller/updateProduct'); ?>" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <input type="hidden" name="status" value="<?php echo $product_info->product_status; ?>">
            <div class="accordion-group panel">
                <div class="container">

                    <h2 class="accordion-title ">
                        <span>1. Informação básica</span>
                        <a class="accordion-btn open" data-toggle="collapse" href="#collapse-one"></a>
                    </h2>

                    <div class="accordion-body collapse in" id="collapse-one">
                        <div>
                            <div class="xs-margin half"></div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label for="product_name" class="form-label">Nome do serviço
                                    <span class="required">*</span>
                                </label>
                                <input type="text" name="product_name" value="<?php echo $product_info->product_name; ?>" id="product_name"
                                       class="form-control input-lg" required>
                            </div>
                             <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label class="form-label"> Precisa de orçamento?
                                    <span class="required">*</span>
                                </label>
                                <input type="text" name="budget" id="budget" class="form-control input-lg" value="<?php echo $product_info->budget; ?>" required>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label for="product_category" class="form-label">Categoria
                                    <span class="required">*</span>
                                </label>
                                <select id="product_category" class="form-control categories" name="product_category"
                                        style="font-size: 16px;height: 34px !important;" required>
                                    <option value="">Selecionar Categoria</option>
                                    <?php
                                        if (isset($product_info->product_category) && !empty($product_info->product_category))
                                            $product_cat_id = $product_info->product_category;
                                        else
                                            $country_geo_id = "";
                                    ?>
                                    <?php
                                        if (!empty($category_lists)) {
                                            foreach ($category_lists as $category_list) {
                                                ?>
                                                <option value="<?php echo $category_list->category_id; ?>" <?php if ($category_list->category_id == $product_cat_id) echo "selected"; ?>>
                                                    <?php echo $category_list->category_title; ?>
                                                </option>
                                            <?php }
                                        } ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label for="product_subcategory" class="form-label">Sub-categoria
                                    <span class="required">*</span>
                                </label>
                                <select id="sub_cat" class="form-control sub_categories" name="product_subcategory"
                                        style="font-size: 16px;height: 34px !important;" required>
                                    <?php
                                        if (isset($product_info->product_subcategory) && !empty($product_info->product_subcategory)) {
                                            $product_subcat_id = $product_info->product_subcategory;
                                            $product_cat_id = $product_info->product_category;

                                            $subcat = $this->user_helper->getSubCategory($product_cat_id);

                                            if (!empty($subcat)) {
                                                foreach ($subcat as $subcat) {
                                                    ?>
                                                    <option value="<?php echo $subcat->subcategory_id; ?>" <?php if ($subcat->subcategory_id == $product_subcat_id) echo "selected"; ?> >
                                                        <?php echo $subcat->subcategory_title; ?>
                                                    </option>
                                                <?php }
                                            } else { ?>
                                                <option value="">None</option>
                                            <?php }
                                        } ?>
                                    <option value="">Select Category First</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label class="form-label" name="contact_number"> Número de contato 
                                    <span class="required">*</span>
                                </label>
                                <input type="text" name="contact_number" id="contact_number" class="form-control input-lg" value="<?php echo $product_info->contact_number; ?>" required>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label class="form-label" name="payment_method">Método de pagamento
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control" name="payment_method" style="font-size: 16px;height: 34px !important;" required>
                                    <option value="">Select Method Of Payment</option>
                                    <option value="money" <?php if ($product_info->payment_method == "money") echo "selected"; ?>>Dinheiro</option>
                                    <option value="card" <?php if ($product_info->payment_method == "card") echo "selected"; ?>>cartão</option>
                                    <option value="moneycard" <?php if ($product_info->payment_method == "moneycard") echo "selected"; ?>>Dinheiro & cartão</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label class="form-label">Estado
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control state_change" name="state" style="font-size: 16px;height: 34px !important;" required>
                                    <option value="">Select State</option>
                                    <?php
                                        if (!empty($statelist)) {
                                            foreach ($statelist as $state) {
                                                ?>
                                                <option value="<?php echo $state->state_id; ?>" <?php if ($state->state_id == $product_info->state) echo "selected"; ?>>
                                                    <?php echo $state->state_name; ?>
                                                </option>
                                            <?php }
                                        } ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label class="form-label">Cidade
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control state_city" name="city" style="font-size: 16px;height: 34px !important;" required>
                                    <?php
                                        if (isset($product_info->city) && !empty($product_info->city)) {
                                            $city_id = $product_info->city;
                                            $state_id = $product_info->state;

                                            $cityList = $this->user_helper->getStateOfCityList($state_id);

                                            if (!empty($cityList)) {
                                                foreach ($cityList as $city) {
                                                    ?>
                                                    <option value="<?php echo $city->city_id; ?>" <?php if ($city->city_id == $city_id) echo "selected"; ?> >
                                                        <?php echo $city->city_name; ?>
                                                    </option>
                                                <?php }
                                            } else { ?>
                                                <option value="">None</option>
                                            <?php }
                                        } ?>
                                    <option value="">Select State First</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label class="form-label"> Facebook <img src="<?php echo base_url(); ?>admin/images/facebook.png" style="width:25px;"></label>
                                <input type="url" name="facebook_link" class="form-control input-lg" value="<?php echo $product_info->facebook_link; ?>">
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label class="form-label"> Instagram <img src="<?php echo base_url(); ?>admin/images/insta.png" style="width:25px;"></label>
                                <input type="url" name="instagram_link" class="form-control input-lg" value="<?php echo $product_info->instagram_link; ?>">
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12 form-group">
                                <label class="form-label" name="address">Endereço
                                    <span class="required">*</span>
                                </label>
                                <textarea name="address" id="address" class="form-control input-lg" required><?php echo $product_info->address; ?></textarea>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12 form-group">
                                <label for="description" class="form-label">Descrição
                                    <span class="required">*</span>
                                </label>
                                <br>

                                <div class="col-md-12" style="background: white;padding: 15px;">
                                    <label for="description" class="form-label" style="text-transform: none;background: #ececec;width: 100%;padding: 8px;margin: 0;color: #808080;">Descrição
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <textarea name="description" id="description" class="form-control input-lg" style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"><?php echo $product_info->product_description; ?></textarea>
                                </div>

                                <div class="col-md-12" style="background: white;padding: 15px;">
                                    <label for="description1" class="form-label" style="text-transform: none;background: #ececec;width: 100%;padding: 8px;margin: 0;color: #808080;">Empresa, Autônomo ou Freelancer
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <textarea name="description1" id="description1" class="form-control input-lg" style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"><?php echo $product_info->product_description1; ?></textarea>
                                </div>

                                <div class="col-md-12" style="background: white;padding: 15px;">
                                    <label for="description2" class="form-label" style="text-transform: none;background: #ececec;width: 100%;padding: 8px;margin: 0;color: #808080;">Serviços já realizados
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <textarea name="description2" id="description2" class="form-control input-lg" style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"><?php echo $product_info->product_description2; ?></textarea>
                                </div>

                                <div class="col-md-12" style="background: white;padding: 15px;">
                                    <label for="description3" class="form-label" style="text-transform: none;background: #ececec;width: 100%;padding: 8px;margin: 0;color: #808080;">Horários de atendimento
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <textarea name="description3" id="description3" class="form-control input-lg" style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"><?php echo $product_info->product_description3; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-group panel darkerbg">
                <div class="container">
                    <h2 class="accordion-title">
                        <span>2. Detalhes de preços</span>
                        <a id="collapse-two-a" class="accordion-btn" data-toggle="collapse" href="#collapse-two"></a>
                    </h2>
                    <div class="accordion-body collapse" id="collapse-two">
                        <div class="row accordion-body-wrapper">
                            <div class="col-sm-12 padding-right-md">
                                <div>
                                    <div class="xs-margin half"></div>
                                    <div class="form-group">
                                        <label for="price" class="form-label">Preço do serviço
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" name="price"
                                               value="<?php echo $product_info->product_price; ?>" id="priceUpdate"
                                               class="form-control input-lg" required>
                                        <?php if ($product_info->time_price_check == 1) {?>

                                            <span> Á combinar </span><input type="checkbox" onclick="price_check()" name="time_price_check" value="yes"<?php echo ($product_info->time_price_check  ? 'checked' : '');?> id="checkAction"  >

                                        <?php } else { ?> 

                                            <span> Á combinar </span><input type="checkbox" name="time_price_check" value="1" id="checkAction"  onclick="price_check()" >     

                                        <?php }?>
                                      
                                     </div>
                   
                                    <div class="form-group">
                                        <label for="discount" class="form-label">Desconto %</label>
                                        <input type="number" name="discount" id="discount" value="<?php echo $product_info->discount; ?>" class="form-control input-lg">
                                    </div>
                                   <!--  <div class="form-group">
                                        <label for="quantity" class="form-label">Work Complete (in Day's)
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" name="quantity"
                                               value="<?php echo $product_info->work_complete_time; ?>" id="quantity"
                                               class="form-control input-lg" required>
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <label for="status" class="form-label">Status
                                            <span class="required">*</span>
                                        </label>
                                        <select id="status" class="form-control" name="status"
                                                style="font-size: 16px;height: 34px !important;" required>
                                            <option value=""> Select status</option>
                                            <option value="enabled" <?php if ($product_info->product_status == "enabled") echo "selected"; ?> >
                                                Ativar
                                            </option>
                                            <option value="disabled" <?php if ($product_info->product_status == "disabled") echo "selected"; ?>>
                                                Desativar
                                            </option>
                                        </select>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="accordion-group panel">
            <div class="container">
                <h2 class="accordion-title"><span>3. Imagens</span>
                    <a id="collapse-three-a" class="accordion-btn" data-toggle="collapse" href="#collapse-three"></a>
                </h2>
                <div class="accordion-body collapse" id="collapse-three">
                    <div class="row accordion-body-wrapper">
                        <div class="col-md-12">
                            <span class="note" style="color:red;">
                                <small>(Tamanho das imagens deve ser 670×670 pixel para melhor visualização* )</small>
                            </span>
                            <div class="image_upload_div" style="margin-bottom: 15px;">
                                <form action="<?php echo site_url('user_controller/uploadProductImage') ?>"
                                      class="dropzone">
                                    <div class="dz-message">
                                        Solte os arquivos aqui ou clique para fazer o upload.<br>
                                        <span class="note" style="color:red;"><small>( Por favor, escolha uma imagem de serviço* )</small></span>
                                    </div>
                                </form>
                            </div>

                            <?php
                                $product_images = $this->user_helper->getProductImages($product_id);
                                if (isset($product_images) && !empty($product_images)) {
                                    foreach ($product_images as $image) { ?>

                                        <div id="image_<?php echo $image->product_image_id ?>"
                                             style="float: left; margin-top: 30px; margin-right: 30px; ">
                                            <a href="javascript:void(0);"
                                               onclick="delete_product_image(<?php echo $image->product_image_id ?>);">
                                                <i class="fa fa-times" aria-hidden="true"
                                                   style="position: absolute;color: #e51d27;margin-top: 10px;margin-left: 10px;z-index: 999;"></i>
                                            </a>
                                            <img src="<?php echo base_url('admin/assets/images/products/'); ?><?php echo $image->product_image_name; ?>"
                                                 style="border-radius: 20px;width: 120px;height: 120px;border:1px solid;position: relative;display: block;z-index: 10;">
                                        </div>

                                    <?php }
                                }
                            ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-group panel">
                <div class="container">
                    <div class="accordion-body collapse in" id="collapse-five">
                        <div class="row accordion-body-wrapper">
                            <div class="col-md-12">
                                <div class="md-margin half"></div>
                                <div class="text-right">
                                    <input type="submit" onclick="$('#edit_product_form').submit();"
                                           class="btn btn-custom btn-lger min-width-slg" value="Editar serviços">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="xlg-margin"></div>
</section>
<script type="text/javascript">

        function price_check()
        { 
            if ($("#checkAction").is(':checked')) 
            {
               $('#priceUpdate').val(0);             
            }
           else 
            {
                $('#priceUpdate').val(<?php echo $product_info->product_price; ?>);               
            }
        }

</script>

</script>


<script>
    function delete_product_image(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/user_controller/deleteProductImage/" + id,
            cache: false,
            dataType: "json",
            success: function (response) {
                toastr.success('Imagem do serviço excluída com sucesso!');
                $("#image_" + id).hide();
            }
        });
    }
</script>

<script>
    $("#edit_product_form").submit(function () {
        $('#collapse-three').addClass('in');
        $('#collapse-three-a').addClass('open');

        $('#collapse-two').addClass('in');
        $('#collapse-two-a').addClass('open');
    });
</script>

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
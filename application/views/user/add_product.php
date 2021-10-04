<?php
    $userInfo = $this->session->userInfo;
    // $count_user_product = $this->user_helper->countUserProduct($userInfo->user_id);

    $user_plan = $this->user_helper->getUserPlanInfo($userInfo->user_id);
    $statelist = $this->user_helper->getStateList();
    // $count_user_plan = $this->user_helper->countUserPlan($userInfo->user_id);
    if(isset($user_plan->plan_id)) {
        $plan_id = $user_plan->plan_id;
    }
?>
<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo site_url('home/index'); ?>" >Home</a></li>
                        <li class="active">Adicionar serviço</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="xs-margin"></div>

    <div class="accordion" id="collapse">
        <form name="add_product_form" id="add_product_form" method="post"
              action="<?php echo site_url('user_controller/createProduct'); ?>" enctype="multipart/form-data">
            <input type="hidden" name="plan_id" value="<?php if(isset($plan_id)) echo $plan_id; ?>">
            <input type="hidden" name="status" value="enabled">
            <div class="accordion-group panel">
                <div class="container">
                    <h2 class="accordion-title">
                        <span>1. Informação básica</span>
                        <a class="accordion-btn open" data-toggle="collapse" href="#collapse-one"></a>
                    </h2>
                    <div class="accordion-body collapse in" id="collapse-one">
                        <div>
                            <div class="xs-margin half"></div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label for="product_name" class="form-label">Nome do serviço<span class="required">*</span></label>
                                <input type="text" name="product_name" id="product_name" class="form-control input-lg"
                                       required>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label for="need_budget" class="form-label" name="budget"> Precisa de orçamento?
                                    <span class="required">*</span>
                                </label>
                                <input type="text" name="budget" id="need_budget" class="form-control input-lg" required>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label for="product_category" class="form-label">Categoria<span class="required">*</span></label>
                                <select id="product_category" class="form-control categories" name="product_category"
                                        style="font-size: 16px;height: 34px !important;" required>
                                    <option value="">Selecionar Categoria</option>
                                    <?php
                                        if (isset($category_list) && !empty($category_list)) {
                                            foreach ($category_list as $category) {
                                                ?>
                                                <option value="<?php echo $category->category_id; ?>"> <?php echo $category->category_title; ?> </option>
                                            <?php }
                                        } ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label for="product_subcategory" class="form-label" name="product_subcategory">Sub-categoria
                                    <span class="required">*</span>
                                </label>
                                <select id="sub_cat" class="form-control sub_categories" name="product_subcategory"
                                        style="font-size: 16px;height: 34px !important;" required>
                                    <option value="">Selecionar primeiro o categoria</option>
                                </select>
                            </div>
                           
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label class="form-label" name="contact_number"> Número de contato 

                                    <span class="required">*</span>
                                </label>
                                <input type="text" name="contact_number" id="contact_number" class="form-control input-lg" required>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label class="form-label" name="payment_method">Método de pagamento
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control" name="payment_method" style="font-size: 16px;height: 34px !important;" required>
                                    <option value="">Selecionar Método de Pagamento </option>
                                    <option value="money">Dinheiro</option>
                                    <option value="card">cartão</option>
                                    <option value="moneycard">Dinheiro & cartão</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label class="form-label">Estado
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control state_change" name="state" style="font-size: 16px;height: 34px !important;" required>
                                    <option value="">Selecionar Estado </option>
                                    <?php if (isset($statelist) && !empty($statelist)) {
                                        foreach ($statelist as $state) { ?>
                                            <option value="<?php echo $state->state_id; ?>"> <?php echo $state->state_name; ?> </option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label class="form-label">Cidade
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control state_city" name="city" style="font-size: 16px;height: 34px !important;" required>
                                    <option value="">Selecionar Estado Primeiro </option>
                                   
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label class="form-label"> Facebook <img src="<?php echo base_url(); ?>admin/images/facebook.png" style="width:25px;"></label>
                                <input type="link" name="facebook_link" class="form-control input-lg">
                            </div>
                            <div class="col-sm-6 col-md-6 col-xs-12 form-group">
                                <label class="form-label"> Instagram <img src="<?php echo base_url(); ?>admin/images/insta.png" style="width:25px;"></label>
                                <input type="link" name="instagram_link" class="form-control input-lg">
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12 form-group">
                                <label class="form-label" name="address">Endereço
                                    <span class="required">*</span>
                                </label>
                                <textarea name="address" id="address" class="form-control input-lg" required></textarea>
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
                                    <textarea name="description" id="description" class="form-control input-lg"  style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"></textarea>
                                </div>

                                <div class="col-md-12" style="background: white;padding: 15px;">
                                    <label for="description1" class="form-label" style="text-transform: none;background: #ececec;width: 100%;padding: 8px;margin: 0;color: #808080;">Empresa, Autônomo ou Freelancer
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <textarea name="description1" id="description1" class="form-control input-lg"  style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"></textarea>
                                </div>

                                <div class="col-md-12" style="background: white;padding: 15px;">
                                    <label for="description2" class="form-label" style="text-transform: none;background: #ececec;width: 100%;padding: 8px;margin: 0;color: #808080;">Serviços já realizados
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <textarea name="description2" id="description2" class="form-control input-lg"  style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"></textarea>
                                </div>

                                <div class="col-md-12" style="background: white;padding: 15px;">
                                    <label for="description3" class="form-label" style="text-transform: none;background: #ececec;width: 100%;padding: 8px;margin: 0;color: #808080;">Horários de atendimento
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <textarea name="description3" id="description3" class="form-control input-lg"  style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="lg-margin2x"></div>
                    </div>
                </div>

                <div class="accordion-group panel darkerbg">
                    <div class="container">
                        <h2 class="accordion-title"><span>2. Detalhes de preços</span>
                            <a id="collapse-two-a" class="accordion-btn" data-toggle="collapse"
                               href="#collapse-two"></a>
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
                                            <input type="text" name="price" id="price" class="form-control input-lg"
                                                   required>
                                            <span> Á combinar </span><input type="checkbox" name="time_price_check" value="1" id="checkAction"  onclick="price_check()">     
                                        </div>

                                        <div class="form-group">
                                            <label for="discount" class="form-label">Desconto %</label>
                                            <input type="number" name="discount" id="discount" class="form-control input-lg">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="quantity" class="form-label">Work Complete (in Day's)
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" name="quantity" id="quantity"
                                                   class="form-control input-lg" required>
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <label for="status" class="form-label">Status<span class="required">*</span></label>
                                            <select id="status" class="form-control" name="status"
                                                    style="font-size: 16px;height: 34px !important;" required>
                                                <option value="enabled"> Ativar</option>
                                                <option value="disabled"> Desativar</option>
                                            </select>
                                        </div> -->
                                    </div>
                                    <!-- <div class="lg-margin2x"></div> -->
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
                            <div class="image_upload_div">
                                <form action="<?php echo site_url('user_controller/uploadProductImage') ?>" id="add_product_image_form"
                                      class="dropzone">
                                    <div class="dz-message">
                                        Solte os arquivos aqui ou clique para fazer o upload.<br>
                                        <span class="note" style="color:red;"><small>( Por favor, escolha uma imagem de serviço* )</small></span>
                                    </div>
                                </form>
                            </div>
                            <span class="note" style="color:red;">
                                <small>( É necessário no mínimo duas imagens de serviços* )</small>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="lg-margin2x"></div>
            </div>
        </div>

        <div class="accordion-group panel">
            <div class="container">
                <div class="accordion-body collapse in" id="collapse-five">
                    <div class="row accordion-body-wrapper">
                        <div class="col-md-12">
                            <div class="md-margin half"></div>
                            <div class="text-right">
                                <input type="submit" onclick="$('#add_product_form').submit();" class="btn btn-custom btn-lger min-width-slg" value="Adicionar serviços ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="xlg-margin"></div>

    </div>
</section>


<script>
    $(".file_delete").click(function () {
        var id = $(this).data("id");
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/VendorController/delete_image/" + id,
            success: function (data) {
                var response = JSON.parse(data);
                if (response.status === 'done') {
                    $("#image_block" + id).hide();
                }
            }
        });
    });
</script>


<script>
    $("#add_product_form").submit(function () {
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

<script>
    // function AddServices(){

    //     $.ajax({
    //         type: "POST",
    //         url: "<?php echo site_url(); ?>/user_controller/createProduct",  
    //         data: $("#add_product_form").serialize(),
    //         dataType: "json",
    //         success: function (data) {
    //             if (data.success == "success") {
    //                 window.location.href = "<?php echo site_url(); ?>/user_controller/Meus_servicos";
    //                 toastr.success('Serviço cadastrado com sucesso!');
    //             } else {
    //                 toastr.error('Minimum two service images are required');
    //             }
    //         },
    //         error: function () {
    //             alert('Ocorreu um erro, Preencha todos os campos e tente novamente');
    //         }
    //     });
    // }

    function price_check()
    {
        if ($("#checkAction").is(':checked')) 
            {
               $('#price').val(0);             
            }
        else 
            {
                $('#price').val("");               
            }
    }
      
</script>
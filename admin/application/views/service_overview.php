<!--
  
  KARYON SOLUTIONS CONFidENTIAL
  __________________
  
    Author : Sudeep Gandhi
    Url - http://www.karyonsolutions.com  
    [2016] - [2017] Karyon Solutions 
    All Rights Reserved.
  
  NOTICE:  All information contained herein is, and remains
  the property of Karyon Solutions and its suppliers,
  if any.  The intellectual and technical concepts contained
  herein are proprietary to Karyon Solutions
  and its suppliers and may be covered by Indian and Foreign Patents,
  patents in process, and are protected by trade secret or copyright law.
  Dissemination of this information or reproduction of this material
  is strictly forbidden unless prior written permission is obtained
 from Karyon Solutions.
-->

<style type="text/css">

    .service-inactive-status {
        background-color: #D8534F;
        border-color: #D8534F;
        font-size: 15px;
    }
    .service-status {
        background-color: #049600;
        border-color: #049600;
        font-size: 15px;
    }
    .service-status-icon {
        border: 1px solid;
        color: #fff;
        text-align: center;
        padding-top: 2px;
        padding-left: 5px;
        padding-right: 5px;
    }
    .td-center {
        vertical-align: middle !important;
        text-align: center;
    }
    .th-center {
        vertical-align: middle !important;
        text-align: center;
    }
    .product-detail-wrap .product-price {
        font-size: 18px;
        color: #4aa23c;
    }
    .mb-20 {
        margin-bottom: 20px;
    }
    .mb-15 {
        margin-bottom: 15px;
    }
    .weight-500 {
        font-weight: 700;
        margin-top: 0px;
    }
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<div class="content-wrapper">
    
    <section class="content-header">
        <h1>Service Overview </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url();?>index.php/admin"><i class="fa fa-dashboard"></i>Admin</a></li>
                <li class="active">Service Overview </li>
            </ol>
    </section>

  <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <h2 class="box-title floatalign_text_left"> Service Overview </h2>
                            </div>
                            <div class="col-sm-6 col-md-6">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-sm-12" style="padding: 20px;background: #eee;">
                        

                                    <div class="col-md-3">
                                        <div class="item-big">
                                            <!-- START carousel-->
                                            <div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
                                                <ol class="carousel-indicators">
                                                   <?php  $i = 0;
                                                        foreach ($data['ProductImages'] as $ProductImage) { 
                                                        if($i == 0) { ?>
                                                            <li data-target="#carousel-example-captions-1" data-slide-to="<?php echo $i ?>" class="active"></li>
                                                        <?php } else { ?>
                                                            <li data-target="#carousel-example-captions-1" data-slide-to="<?php echo $i ?>" class=""></li>
                                                        <?php  } ?>
                                                    <?php $i++; } ?>
                                                </ol>
                                                <div role="listbox" class="carousel-inner">

                                                    <?php  $i = 0;
                                                        foreach ($data['ProductImages'] as $ProductImage) { 
                                                        if($i == 0) { ?>
                                                            <div class="item active">
                                                        <?php } else { ?>
                                                            <div class="item">
                                                        <?php  } ?>
                                                            <img src="<?php echo base_url();?>/assets/images/products/<?php echo $ProductImage->product_image_name ?>" alt="First slide image" class="center"> 
                                                        </div>
                                                    <?php $i++; } ?>
                                                </div>
                                            </div>
                                            <!-- END carousel-->
                                        </div>
                                    </div>
                                            
                                    <div class="col-md-9">
                                        <div class="product-detail-wrap">
                                            <!-- <div class="product-rating inline-block mb-10">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>

                                                &nbsp;(<span class="review-count">5</span> customer review)
                                            </div> -->

                                            <h2 class="mb-20 weight-500"> <?php echo $data['SingleProductInfo']->product_name ?> </h2>
                                            
                                            <div class="head-font mb-15"> <strong> Price : </strong> $ <?php echo $data['SingleProductInfo']->product_price ?> </div>

                                            <div class="head-font mb-15"> <strong> Category : </strong> <?php echo $data['SingleProductInfo']->category_title ?> </div>

                                            <div class="head-font mb-15"> <strong> Sub Category : </strong>  <?php echo $data['SingleProductInfo']->subcategory_title ?>  </div>

                                            <div class="head-font mb-15"> <strong> Contact : </strong>  <?php echo $data['SingleProductInfo']->contact_number ?>  </div>

                                            <div class="head-font mb-15"> <strong> Budget : </strong>  <?php echo $data['SingleProductInfo']->budget ?>  </div>
                                            <?php
                                                $state = $this->adminmodel->getStateName($data['SingleProductInfo']->state);
                                                $city = $this->adminmodel->geCityName($data['SingleProductInfo']->city);    
                                            ?>

                                            <div class="head-font mb-15"> <strong> City : </strong>  <?php echo $city->city_name ?>  </div>

                                            <div class="head-font mb-15"> <strong> State : </strong>  <?php echo $state->state_name ?>  </div>

                                            <div class="head-font mb-15"> <strong> Address : </strong>  <?php echo $data['SingleProductInfo']->address ?>  </div>

                                            <div class="head-font mb-15"> <strong> Service Status : </strong>
                                                <?php if ($data['SingleProductInfo']->product_status == "enabled") { ?>
                                                    <span class="service-status service-status-icon"> Enable </span>
                                                <?php }  else { ?>
                                                    <span class="service-inactive-status service-status-icon"> Disable </span>    
                                                <?php } ?>  
                                            </div>
                                           
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#about_us" data-toggle="tab"> Description </a>
                        </li>
                       <!--  <li class="">
                            <a href="#privacy_policy" data-toggle="tab"> Review(0) </a>
                        </li> -->
                        
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="about_us">
                            <div class="row mb-50" style="margin: 0px;">
                                <div class="col-md-12" style="background: white;padding: 15px;">
                                    <label for="description" class="form-label" style="text-transform: none;background: #ececec;width: 100%;padding: 8px;margin: 0;color: #808080;">Descrição
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <textarea name="description" id="description" class="form-control input-lg" maxlength="160" style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"><?php echo $data['SingleProductInfo']->product_description; ?></textarea>
                                </div>

                                <div class="col-md-12" style="background: white;padding: 15px;">
                                    <label for="description" class="form-label" style="text-transform: none;background: #ececec;width: 100%;padding: 8px;margin: 0;color: #808080;">Empresa, Autônomo ou Freelancer
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <textarea name="description" id="description1" class="form-control input-lg" maxlength="160" style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"><?php echo $data['SingleProductInfo']->product_description1; ?></textarea>
                                </div>

                                <div class="col-md-12" style="background: white;padding: 15px;">
                                    <label for="description" class="form-label" style="text-transform: none;background: #ececec;width: 100%;padding: 8px;margin: 0;color: #808080;">Serviços já realizados
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <textarea name="description" id="description2" class="form-control input-lg" maxlength="160" style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"><?php echo $data['SingleProductInfo']->product_description2; ?></textarea>
                                </div>

                                <div class="col-md-12" style="background: white;padding: 15px;">
                                    <label for="description" class="form-label" style="text-transform: none;background: #ececec;width: 100%;padding: 8px;margin: 0;color: #808080;">Horários de atendimento
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <textarea name="description" id="description3" class="form-control input-lg" maxlength="160" style="border: none;font-size: 16px;padding-left: 0;margin-bottom: 0;padding-bottom: 0;"><?php echo $data['SingleProductInfo']->product_description3; ?></textarea>
                                </div>
                            </p>
                        </div>
                        <div class="tab-pane" id="privacy_policy">

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>    

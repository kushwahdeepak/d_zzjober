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
        font-size: 12px;
    }
    .service-status {
        background-color: #049600;
        border-color: #049600;
        font-size: 12px;
    }
    .service-status-icon {
        border: 1px solid;
        color: #fff;
        text-align: center;
        padding-top: 2px;
        padding-left: 10px;
        padding-right: 10px;
    }
    .td-center {
        vertical-align: middle !important;
        text-align: center;
    }
    .th-center {
        vertical-align: middle !important;
        text-align: center;
    }
    .fa-eye::before {
        font-size: 18px;
    }
</style>

<div class="content-wrapper">
    
    <section class="content-header">
        <h1>Services List </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url();?>index.php/admin"><i class="fa fa-dashboard"></i>Admin</a></li>
                <li class="active">Services List</li>
            </ol>
    </section>

  <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- <div class="box box-primary"> -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="<?php if ($data['active'] == "active_serivce") echo "active"; ?>">
                            <a href="#active_serivce" data-toggle="tab"> Active Service List </a>
                        </li>
                        <li class="<?php if ($data['active'] == "expire_serivce") echo "active"; ?>">
                            <a href="#expire_serivce" data-toggle="tab"> Expire Service List </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane <?php if ($data['active'] == "active_serivce") echo "active"; ?>"
                             id="active_serivce">
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th> Service Provider Name </th>
                                            <th> Service Name </th>
                                            <th> Category Name </th>
                                            <th> Sub Category </th>
                                            <th> Price </th>
                                            <th> State  </th>
                                            <th> City  </th> 
                                            <th class="text-center"> Service Status </th>
                                            <th class="text-center"> Status </th>
                                            <th class="text-center" style="width: 14%;"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['productList'] as $product) {
                                            $state = $this->adminmodel->getStateName($product->state);
                                            $city = $this->adminmodel->geCityName($product->city);
                                         ?>
                                            <tr>
                                                <td> <?php echo $product->first_name ?> </td>
                                                <td> <?php echo $product->product_name ?> </td>
                                                <td> <?php echo $product->category_title ?> </td>
                                                <td> <?php echo $product->subcategory_title ?> </td>
                                                <td> <?php echo $product->product_price ?>  </td>
                                                <td> <?php echo $state->state_name ?> </td>
                                                <td> <?php echo $city->city_name ?> </td>
                                                <td class="text-center"> 
                                                    <?php if ($product->product_status == "enabled") { ?>
                                                        <span class="service-status service-status-icon"> Enabled </span>
                                                    <?php } else { ?>
                                                        <span class="service-inactive-status service-status-icon"> Disable </span>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center"> 
                                                    <span class="service-status service-status-icon"> Active </span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url(); ?>index.php/admin/service_overview?product_id=<?php echo $product->product_id ?>" class="btn btn-info"><i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                       
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane <?php if ($data['active'] == "expire_serivce") echo "active"; ?>"
                             id="expire_serivce">
                            <div class="box-body table-responsive">
                                <table id="example3" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th> Service Provider Name </th>
                                            <th> Service Name </th>
                                            <th> Category Name </th>
                                            <th> Sub Category </th>
                                            <th> Price </th>
                                            <th> State  </th>
                                            <th> City  </th> 
                                            <th class="th-center"> Service Status </th>
                                            <th class="th-center"> Status </th>
                                            <th class="th-center" style="width: 14%;"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['allExpireProductList'] as $product) {
                                            $state = $this->adminmodel->getStateName($product->state);
                                            $city = $this->adminmodel->geCityName($product->city);
                                         ?>
                                            <tr>
                                                <td> <?php echo $product->first_name ?> </td>
                                                <td> <?php echo $product->product_name ?> </td>
                                                <td> <?php echo $product->category_title ?> </td>
                                                <td> <?php echo $product->subcategory_title ?> </td>
                                                <td> <?php echo $product->product_price ?>  </td>
                                                <td> <?php echo $state->state_name ?> </td>
                                                <td> <?php echo $city->city_name ?> </td>
                                                <td> 
                                                    <?php if ($product->product_status == "enabled") { ?>
                                                        <span class="service-status service-status-icon"> Enabled </span>
                                                    <?php } else { ?>
                                                        <span class="service-inactive-status service-status-icon"> Disable </span>
                                                    <?php } ?>
                                                </td>
                                                <td> 
                                                    <span class="service-inactive-status service-status-icon"> Expire </span> 
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>index.php/admin/service_overview?product_id=<?php echo $product->product_id ?>" class="btn btn-info"><i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                       
                                </tbody>
                            </table>
                        </div>
                    </div>




                </div>




            </div>
           <!--  </div> -->
        </div>
    </div>
  </section>
</div>    

<!-- KARYON SOLUTIONS CONFIDENTIAL
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


<!-- <div class="content-wrapper">

    <section class="content-header">
        <h1>Customer Overview</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/admin/vendor"><i class="fa fa-dashboard"></i> Home </a></li>
            <li class="active">Customer Overview</li>
        </ol>
    </section>
   

    <!-- Main content 
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="<?php if ($data['active'] == "basicinfo") echo "active"; ?>">
                            <a href="#basicinfo" data-toggle="tab"> User Basic Info </a>
                        </li>
                        <li class="<?php if ($data['active'] == "user_plan") echo "active"; ?>">
                            <a href="#user_plan" data-toggle="tab"> User Plan Info </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane <?php if ($data['active'] == "basicinfo") echo "active"; ?>"
                             id="basicinfo">
                            <br>
                            <form class="form-horizontal" id="updatecustomerInfos" action="javascript:void(0);"
                                  method="POST" accept-charset="utf-8">
                                <input type="hidden" name="id"
                                       value="<?php if (!empty($data['customerinfo'])) echo $data['customerinfo']->user_id; ?>">
                                <input type="hidden" class="form-control" name="email"
                                       value="<?php if (!empty($data['customerinfo']->email)) echo $data['customerinfo']->email; ?>">
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-3 control-label asterisk"> First Name </label>
                                        <div class="col-md-9">
                                            <?php if (isset($data['customerinfo']->first_name)) { ?>
                                                <input type="text" class="form-control" name="fname"
                                                       placeholder="First Name"
                                                       value="<?php if (!empty($data['customerinfo']->first_name)) echo $data['customerinfo']->first_name; ?>"
                                                       required="required">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="fname"
                                                       placeholder="First Name" required="required">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-3 control-label asterisk"> Last Name </label>
                                        <div class="col-md-9">
                                            <?php if (isset($data['customerinfo']->last_name)) { ?>
                                                <input type="text" class="form-control" name="lname"
                                                       placeholder="Last Name"
                                                       value="<?php if (!empty($data['customerinfo']->last_name)) echo $data['customerinfo']->last_name; ?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="lname"
                                                       placeholder="Last Name">
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-3 control-label asterisk"> Mobile </label>
                                        <div class="col-md-9">
                                            <?php if (isset($data['customerinfo']->mobile)) { ?>
                                                <input type="number" class="form-control" name="mobile"
                                                       placeholder="Mobile"
                                                       value="<?php if (!empty($data['customerinfo']->mobile)) echo $data['customerinfo']->mobile; ?>">
                                            <?php } else { ?>
                                                <input type="number" class="form-control" name="mobile"
                                                       placeholder="Mobile">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-3 control-label asterisk"> Email </label>
                                        <div class="col-md-9">
                                            <?php if (isset($data['customerinfo']->email)) { ?>
                                                <input type="email" class="form-control" name="email"
                                                       placeholder="Email"
                                                       value="<?php if (!empty($data['customerinfo']->email)) echo $data['customerinfo']->email; ?>"
                                                       disabled>
                                            <?php } else { ?>
                                                <input type="email" class="form-control" name="email"
                                                       placeholder="Email" disabled>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-3 control-label asterisk"> City </label>
                                        <div class="col-md-9">
                                            <?php if (isset($data['customerinfo']->city)) { ?>
                                                <input type="text" class="form-control" name="city" placeholder="City"
                                                       value="<?php if (!empty($data['customerinfo']->city)) echo $data['customerinfo']->city; ?>"
                                                       required="required">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="city" placeholder="City"
                                                       required="required">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-3 control-label asterisk"> State </label>
                                        <div class="col-md-9">
                                            <?php if (isset($data['customerinfo']->state)) { ?>
                                                <input type="text" class="form-control" name="state" placeholder="State"
                                                       value="<?php if (!empty($data['customerinfo']->state)) echo $data['customerinfo']->state; ?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="state"
                                                       placeholder="State">
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-3 control-label asterisk"> Zip </label>
                                        <div class="col-md-9">
                                            <?php if (isset($data['customerinfo']->zip)) { ?>
                                                <input type="number" class="form-control" name="zip" placeholder="Zip"
                                                       value="<?php if (!empty($data['customerinfo']->zip)) echo $data['customerinfo']->zip; ?>">
                                            <?php } else { ?>
                                                <input type="number" class="form-control" name="zip" placeholder="Zip">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-3 control-label asterisk"> Country </label>
                                        <div class="col-md-9">
                                            <?php if (isset($data['customerinfo']->zip)) { ?>
                                                <input type="text" class="form-control" name="country"
                                                       placeholder="Country"
                                                       value="<?php if (!empty($data['customerinfo']->country)) echo $data['customerinfo']->country; ?>">
                                            <?php } else { ?>
                                                <input type="number" class="form-control" name="zip" placeholder="Zip">
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-3 control-label asterisk"> Address </label>
                                        <div class="col-md-9">
                                            <?php if (isset($data['customerinfo']->address)) { ?>
                                                <textarea type="text" class="form-control" name="address"
                                                          placeholder="Address"><?php if (!empty($data['customerinfo']->address)) echo $data['customerinfo']->address; ?>  </textarea>
                                            <?php } else { ?>
                                                <textarea type="text" class="form-control" name="address"
                                                          placeholder="Address">  </textarea>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" onclick="history.back();" value="Back">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                <div id="div1" style="width:80px;height:80px;display:none;background-color:red;"></div>
                            </form>
                        </div>

                        <div class="tab-pane <?php if ($data['active'] == "user_plan") echo "active"; ?>"
                             id="user_plan">
                            <br>
                            <form class="form-horizontal"
                                  action="<?php echo base_url(); ?>index.php/admin/updateUserPictureInfo" method="POST"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="user_id"
                                       value="<?php if (!empty($data['customerinfo'])) echo $data['customerinfo']->user_id; ?>">
                                <div class="form-group">
                                    <label class="col-md-2 control-label asterisk" for="file-7"> Profile Image </label>
                                    <div class="col-md-6">
                                        <input type="file" name="image" id="file-7" class="inputfile inputfile-6"
                                               data-multiple-caption="{count} files selected" required="required"
                                               style="display: none;">
                                        <label for="file-7"><span></span>
                                            <strong>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                                     viewBox="0 0 20 17">
                                                    <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                                </svg>
                                                Upload Image&hellip;
                                            </strong>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <img class="customer_profile_img" src="<?php echo base_url(); ?>images/users/<?php echo $data['customerinfo']->user_img; ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" onclick='' class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> -->

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
        <h1>Customer Overview</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/admin/customers"><i class="fa fa-dashboard"></i> Home </a></li>
            <li class="active">Customer Overview</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Basic Information</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo base_url(); ?>index.php/admin/customers" class="btn btn-default">
                        <i class="fa fa-reply"></i>
                    </a>
                </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-3">
                            <label> Name : </label>
                        </div>
                        <div class="col-md-9">
                            <?php if (!empty($data['customerinfo']->first_name)) echo $data['customerinfo']->first_name; ?> &nbsp; <?php if (!empty($data['customerinfo']->middle_name)) echo $data['customerinfo']->middle_name; ?> &nbsp; <?php if (!empty($data['customerinfo']->last_name)) echo $data['customerinfo']->last_name; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-3">
                            <label> Email Id : </label>
                        </div>
                        <div class="col-md-9">
                            <?php if (!empty($data['customerinfo']->email)) echo $data['customerinfo']->email; ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-3">
                            <label> Contact Number : </label>
                        </div>
                        <div class="col-md-9">
                            <?php if (!empty($data['customerinfo']->mobile)) echo $data['customerinfo']->mobile; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-3">
                            <label> Post Code : </label>
                        </div>
                        <div class="col-md-9">
                            <?php if (!empty($data['customerinfo']->zip)) echo $data['customerinfo']->zip; ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-3">
                            <label> City : </label>
                        </div>
                        <div class="col-md-9">
                            <?php if (!empty($data['customerinfo']->city)) echo $data['customerinfo']->city; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-3">
                            <label> State : </label>
                        </div>
                        <div class="col-md-9">
                            <?php if (!empty($data['customerinfo']->state)) echo $data['customerinfo']->state; ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-3">
                            <label> Country : </label>
                        </div>
                        <div class="col-md-9">
                            <?php if (!empty($data['customerinfo']->country)) echo $data['customerinfo']->country; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-3">
                            <label> Address : </label>
                        </div>
                        <div class="col-md-9">
                            <?php if (!empty($data['customerinfo']->address)) echo $data['customerinfo']->address; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Customer Plan Info</h3> 
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-3">
                            <label> user_plan Name : </label>
                        </div>
                        <div class="col-md-9">
                            <?php if (!empty($data['plan_info']->plan_title)) echo $data['plan_info']->plan_title; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-3">
                            <label> Plan Price : </label>
                        </div>
                        <div class="col-md-9">
                            <?php if (!empty($data['plan_info']->plan_price))
                            {
                              echo $data['plan_info']->plan_price;   
                            } else if (!empty($data['plan_info']->plan_price) && $data['plan_info']->plan_price == 0) { ?>
                                Free
                            <?php }  ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-3">
                            <label> Plan Purchase Date : </label>
                        </div>
                        <div class="col-md-9">
                            <?php if (!empty($data['plan_info']->purchase_date)) { ?>
                                <?php $purchase_date = date('d M, Y', strtotime($data['plan_info']->purchase_date)); ?>
                                <?php if (!empty($purchase_date)) echo $purchase_date ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-3">
                            <label> Plan Expire Date : </label>
                        </div>
                        <div class="col-md-9">
                            <?php if (!empty($data['plan_info']->expire_date)) { ?>
                                <?php $expire_date = date('d M, Y', strtotime($data['plan_info']->expire_date)); ?>
                                <?php if (!empty($expire_date)) echo $expire_date ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-3">
                            <label> Number of Remainig Service : </label>
                        </div>
                        <div class="col-md-9">
                            <?php if (!empty($data['plan_info']->remaining_service)) echo $data['plan_info']->remaining_service; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-3">
                            <label> Description : </label>
                        </div>
                        <div class="col-md-9">
                            <?php if (!empty($data['plan_info']->plan_description)) echo $data['plan_info']->plan_description; ?>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- <div class="box box-primary"> -->
                    <div class="box-header with-border">
                        <h4 class="box-title">service List</h4> 
                    </div>
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





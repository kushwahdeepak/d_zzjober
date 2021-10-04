<style type="text/css">
    .select2-container--default .select2-selection--multiple {
        border: 1px solid #d2d6de !important;
        border-radius: 0 !important;
    }
</style>

<div class="box-body table-responsive">
    <div class="box-header" style="padding: 0px;">
        <div class="col-sm-6 col-md-6" style="padding: 0px;">
            <h2 class="box-title floatalign_text_left">
                <b> 
                 Primary Service - " <?php if (!empty($data['vendorinfo']->service_title)) echo $data['vendorinfo']->service_title; ?> "
             </b>
         </h2>
     </div>
 </div>
 <br>
 <div class="row">
  
    <div class="form-group col-md-3">

        <div class="bootstrap-timepicker">
            <div class="input-group">    
                <input type="time" class="form-control editable-change timepicker" col-index="6" data-id="<?php echo $data['vendorinfo']->ups_id;?>" value="<?php if (!empty($data['vendorinfo']->ups_from_time)) echo $data['vendorinfo']->ups_from_time; ?>" name="ups_from_time">
                <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                </div>
            </div> 
            <div style="color: red;"><div class="icon-data"></div>* shop open time</div>
        </div>

    </div>
    <div class="form-group col-md-3">

        <div class="bootstrap-timepicker">
            <div class="input-group">
                <input type="time" class="form-control editable-change timepicker" col-index="7" data-id="<?php echo $data['vendorinfo']->ups_id;?>" value="<?php if (!empty($data['vendorinfo']->ups_to_time)) echo $data['vendorinfo']->ups_to_time; ?>" required="required">
                <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                </div>
            </div>
            <div style="color: red;"><div class="icon-data"></div>* shop close time</div>
        </div> 
    </div>

    <div class="form-group col-md-6">

        <?php 
        $vendor_off_days = explode(",",$data['vendorinfo']->ups_off_days);
        ?>

        <select class="form-control editable-change select2" col-index="8"  multiple="multiple" data-placeholder="<?php echo $this->lang->line('select_service'); ?>" data-id="<?php echo $data['vendorinfo']->ups_id;?>" name="off_days[]" required="required" style="width: 100%">

            <option value="0" <?php if(!empty($data['vendorinfo']->ups_off_days) && in_array(0,$vendor_off_days))  echo "selected"; ?> >Sunday</option>
            <option value="1" <?php if(!empty($data['vendorinfo']->ups_off_days) && in_array(1,$vendor_off_days))  echo "selected"; ?> >Monday</option>
            <option value="2" <?php if(!empty($data['vendorinfo']->ups_off_days) && in_array(2,$vendor_off_days))  echo "selected"; ?> >Tuesday</option>  
            <option value="3" <?php if(!empty($data['vendorinfo']->ups_off_days) && in_array(3,$vendor_off_days))  echo "selected"; ?> >Wednesday</option>
            <option value="4" <?php if(!empty($data['vendorinfo']->ups_off_days) && in_array(4,$vendor_off_days))  echo "selected"; ?> >Thursday</option>
            <option value="5" <?php if(!empty($data['vendorinfo']->ups_off_days) && in_array(5,$vendor_off_days))  echo "selected"; ?> >Friday</option>
            <option value="6" <?php if(!empty($data['vendorinfo']->ups_off_days) && in_array(6,$vendor_off_days))  echo "selected"; ?> >Saturday</option>
        </select>

        <div style="color: red;"><div class="icon-data"></div>* off days in week ( monday to sunday )</div>
    </div>



    <div class="form-group col-md-3">

        <div class="bootstrap-timepicker">
            <div class="input-group">    
                <input type="time" class="form-control editable-change timepicker" col-index="9" data-id="<?php echo $data['vendorinfo']->ups_id;?>" value="<?php if (!empty($data['vendorinfo']->ups_lunch_from_time)) echo $data['vendorinfo']->ups_lunch_from_time; ?>" name="ups_lunch_from_time">
                <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                </div>
            </div> 
            <div style="color: red;"><div class="icon-data"></div>* lunch start time</div>
        </div>

    </div>
    <div class="form-group col-md-3">

        <div class="bootstrap-timepicker">
            <div class="input-group">
                <input type="time" class="form-control editable-change timepicker" col-index="10" data-id="<?php echo $data['vendorinfo']->ups_id;?>" value="<?php if (!empty($data['vendorinfo']->ups_lunch_to_time)) echo $data['vendorinfo']->ups_lunch_to_time; ?>" required="required">
                <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                </div>
            </div>
            <div style="color: red;"><div class="icon-data"></div>* lunch end time</div>
        </div> 
    </div>
</div>


<hr><br>


<div class="box-header" style="padding: 0px;">
    <div class="col-sm-6 col-md-6" style="padding: 0px;">
        <h2 class="box-title floatalign_text_left"><b> Sub Services </b></h2>
    </div>
    <div class="col-sm-6 col-md-6" style="padding: 0px;">
        <a href="" data-toggle="modal" data-target="#addvendorserviceDialog" class="btn btn-primary floatalign_text_right">
            <i class="fa fa-plus"></i>
        </a>
    </div>
</div>


<table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th> Name </th>
            <th> Charge  </th> 
            <th> Duration </th>
            <th class="th-center"> Status </th>
            <th class="th-center"> Action </th>
        </tr>
    </thead>
    <tbody>
        <?php if(isset($data['vendorsubservicelist']) and !empty($data['vendorsubservicelist'])) 
        foreach ($data['vendorsubservicelist'] as $vendorsubservice) {  
            ?>
            <tr data-row-id="<?php echo $vendorsubservice->usc_id;?>"  id="vendorsubserviceAction<?php echo $vendorsubservice->usc_id;?>">


                <td> 
                    <input type="text" class="editable-col bb-none" col-index='1' value="<?php if (!empty($vendorsubservice->usc_title)) echo $vendorsubservice->usc_title; ?>"> 
                </td>
                <td> 
                    <input type="text" class="editable-col bb-none" col-index='2' value="<?php if (!empty($vendorsubservice->usc_charge)) echo $vendorsubservice->usc_charge; ?>"> 
                </td>
                <td> 
                    <div class="bootstrap-timepicker">
                        <input type="text" class="editable-change bb-none timepicker" col-index='3' value="<?php if (!empty($vendorsubservice->appointment_duration)) echo $vendorsubservice->appointment_duration; ?>"> 
                    </div>
                </td>
                <td class="td-center"> 
                    <?php if($vendorsubservice->usc_status == 'active') { ?> 
                    <span class="service-status service-status-icon">   
                        <?php if (!empty($vendorsubservice->usc_status)) echo $vendorsubservice->usc_status; ?> 
                    </span>
                    <?php } else { ?>
                    <span class="service-inactive-status service-status-icon">   
                        <?php if (!empty($vendorsubservice->usc_status)) echo $vendorsubservice->usc_status; ?> 
                    </span>
                    <?php } ?>
                </td>
                <td class="td-center">
                    <?php if($vendorsubservice->usc_status == 'active') { ?>
                    <a href="javascript:void(0)" class="btn btn-primary editable-action" col-index='8' data="deactive"><i class="fa fa-thumbs-up"></i></a>
                    <?php } else { ?>                          
                    <a href="javascript:void(0)" class="btn btn-default editable-action" col-index='8' data="active"><i class="fa fa-thumbs-down"></i></a>
                    <?php } ?> 

                    <a href="javascript:void(0)" class="btn btn-danger editable-action" col-index='9' data="0" ><i class="fa fa-trash"></i></a> 
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
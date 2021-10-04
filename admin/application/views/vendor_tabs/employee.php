<style type="text/css">
    .select2-container--default .select2-selection--multiple {
        border: none;
        background-color: unset;
    }
</style>

<div class="box-header" style="padding: 0px;">
    <div class="col-sm-6 col-md-6" style="padding: 0px;">
        <h2 class="box-title floatalign_text_left"><b> Employees </b><span id="error_employee_msg" style="color: red;font-size: 12px;"></span></h2>
    </div>
    <div class="col-sm-6 col-md-6" style="padding: 0px;">
        <a href="" data-toggle="modal" data-target="#addemployeesDialog" class="btn btn-primary floatalign_text_right">
            <i class="fa fa-plus"></i>
        </a>
    </div>
</div>


<table id="example3" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th> Image </th>
            <th> Name </th>
            <th> Mobile  </th> 
            <th> Services </th>
            <th class="th-center"> Status </th>
            <th class="th-center"> Action </th>
        </tr>
    </thead>
    <tbody>
        <?php if(isset($data['employeeslist']) and !empty($data['employeeslist'])) 
        foreach ($data['employeeslist'] as $employees) {  


            ?>
            <tr data-row-id="<?php echo $employees->ue_id;?>"  id="employeesAction<?php echo $employees->ue_id;?>">

                <td>
                    <?php if ($employees->employee_img == 'NULL' || $employees->employee_img == '') { ?>
                    <img class="profile-user-img img-responsive img-circle user__img" src="<?php echo base_url(); ?>images/profile_img.jpg">
                    <?php } else { ?>
                    <img class="profile-user-img img-responsive img-circle user__img" src='<?php echo base_url(); ?>images/<?php echo $employees->employee_img; ?>'/>
                    <?php } ?>
                </td>

                <td> 
                    <input type="text" class="editable-employee-col bb-none" col-index='1' value="<?php if (!empty($employees->employee_name)) echo $employees->employee_name; ?>"> 
                </td>
                <td> 
                    <input type="text" class="editable-employee-col bb-none" col-index='2' value="<?php if (!empty($employees->employee_mobile)) echo $employees->employee_mobile; ?>"> 
                </td>
                <td> 
                    <?php $employeeServiceList = $this->adminmodel->getemployeeservicelist($employees->ue_id); ?>

                    <select id="employee_services_change" class="form-control select2 bb-none" multiple="multiple" data-placeholder="<?php echo $this->lang->line('select_service'); ?>" col-index="5" name="service[]" required="required" style="width: 100%;">>

                        <?php foreach ($data['vendorserviceList']  as $service) { 
                            foreach ($employeeServiceList as $employee_service) { 
                                $str_flag = "";
                                if(isset($employee_service->usc_id)) 
                                {
                                    if($employee_service->usc_id == $service->usc_id ) 
                                    {
                                        $str_flag = "selected"; 
                                        break;
                                    }
                                }
                                else $str_flag="";
                            }
                        ?>
                        <option value="<?php echo $service->usc_id ?>" <?php echo $str_flag; ?>  ><?php echo $service->usc_title ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td class="td-center"> 
                    <?php if($employees->ue_status == 'active') { ?> 
                    <span class="service-status service-status-icon">   
                        <?php if (!empty($employees->ue_status)) echo $employees->ue_status; ?> </span>
                        <?php } else { ?>
                        <span class="service-inactive-status service-status-icon">   
                            <?php if (!empty($employees->ue_status)) echo $employees->ue_status; ?> </span>
                            <?php } ?>
                        </td>
                        <td class="td-center">

                            <?php if($employees->ue_status == 'active') { ?>
                            <a href="javascript:void(0)" class="btn btn-primary editable-employee-action" col-index='3' data="deactive"><i class="fa fa-thumbs-up"></i></a>
                            <?php } else { ?>                          
                            <a href="javascript:void(0)" class="btn btn-default editable-employee-action" col-index='3' data="active"><i class="fa fa-thumbs-down"></i></a>
                            <?php } ?> 
                            <a href="javascript:void(0)" class="btn btn-danger editable-employee-action" col-index='4' data="0"><i class="fa fa-trash"></i></a> 

                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

<?php $customerData = $this->adminmodel->getCustomerData($appointment->customer_id); ?>

<tr data-row-id="<?php echo $appointment->a_id;?>">
    <td> 
        #<?php echo $appointment->a_id; ?> 
    </td>                         
    <td> 
        <a href="<?php echo base_url(); ?>index.php/admin/customerOverview?user_id=<?php echo $customerData->user_id ?>" style="color:#15659e;">
            <?php if (!empty($customerData->first_name)) echo $customerData->first_name; ?> 
            <?php if (!empty($customerData->last_name)) echo $customerData->last_name; ?>
        </a>
    </td>                      
    <td> 
        <a href="<?php echo base_url(); ?>index.php/admin/vendorOverview?user_id=<?php echo $appointment->user_id ?>">
            <?php if(!empty($appointment->first_name)) echo $appointment->first_name; ?>
            <?php if(!empty($appointment->last_name)) echo $appointment->last_name; ?>
        </a>
    </td>
    <td> 
        <?php if(!empty($appointment->service_title)) echo $appointment->service_title; ?> 
    </td>
    <td> 
        <?php if(!empty($appointment->usc_title)) echo $appointment->usc_title; ?> 
    </td>
    <td> 
        <?php if(!empty($appointment->employee_name)) echo $appointment->employee_name; ?> 
    </td>
    <td> 
        <?php 
        echo date('d M Y',strtotime($appointment->date)); 
        echo " - [".date('H:i',strtotime($appointment->time))."]"; 
        echo " - [".date('D',strtotime($appointment->date))."]"; 
        ?>
    </td>
    <td> 
        $<?php if(!empty($appointment->usc_charge)) echo $appointment->usc_charge; ?> 
    </td>
    <td>N/A</td>
    <td style="width: 80px;"> 
        <?php if($appointment->appointment_status_id != 8) { ?>
        <div class="fix_size">
            N/A
        </div>
        <?php } else { ?>
        <div class="fix_size">
            <input class="star star-5" id="star-5" type="radio" disabled="disabled" 
            <?php if($appointment->no_of_rating == 5) echo "checked"; ?>/>
            <label class="star star-5" for="star-5"></label>
            <input class="star star-4" id="star-4" type="radio" disabled="disabled" 
            <?php if($appointment->no_of_rating == 4) echo "checked"; ?>/>
            <label class="star star-4" for="star-4"></label>
            <input class="star star-3" id="star-3" type="radio" disabled="disabled" 
            <?php if($appointment->no_of_rating == 3) echo "checked"; ?>/>
            <label class="star star-3" for="star-3"></label>
            <input class="star star-2" id="star-2" type="radio" disabled="disabled" 
            <?php if($appointment->no_of_rating == 2) echo "checked"; ?>/>
            <label class="star star-2" for="star-2"></label>
            <input class="star star-1" id="star-1" type="radio" disabled="disabled" 
            <?php if($appointment->no_of_rating == 1) echo "checked"; ?>/>
            <label class="star star-1" for="star-1"></label>
        </div>
        <?php } ?>
    </td>
    <td class="td-center"> 
        <?php 
        $color_class = "";
        if($appointment->appointment_status_id == 2 || $appointment->appointment_status_id == 3) {
            $color_class = "service-red";
        } else {
            $color_class = "service-green";
        }
        ?>
        <span class="service-status-icon <?php echo $color_class; ?> ">
            <?php echo $appointment->title; ?>
        </span> 
    </td>
    <td style="text-align: center;"> 
        <a href="javascript:void(0)" class="btn btn-info editable" col-index='1' data="0" class="btn btn-info">
            <i class="fa fa-eye"></i>
        </a>                                        
    </td>
</tr>  
<form name="address_info_form" action="<?php echo site_url('user_controller/updateAddressInfo'); ?>" method="post">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="address1" class="form-label">Endereço </label>
                <input type="text" name="address1" value="<?php echo($basic_info->address)?>" id="address1" class="form-control input-lg">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="city" class="form-label">Cidade<span class="required">*</span></label>
                <input type="text" name="city" id="city" value="<?php echo($basic_info->city)?>" class="form-control input-lg" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="postcode" class="form-label">Código postal<span class="required">*</span></label>
                <input type="text" name="postcode" value="<?php echo($basic_info->zip)?>" id="postcode" class="form-control input-lg" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="country" class="form-label">País<span class="required">*</span></label>
                <select id="country" name="country" class="form-control geo__country"  style="font-size: 16px;height: 34px !important;" required>
                    <option value="">Selecionar país </option>
                    <?php                     
                        if (isset($basic_info->country) && !empty($basic_info->country))
                         $country_geo_id = $basic_info->country;
                        else 
                         $country_geo_id = "";
                        ?> 
                    <?php
                        if (!empty($country_list)) {
                          foreach ($country_list as $country) { 
                            ?>
                    <option value="<?php echo $country->geo_id;?>" <?php if($country->geo_id == $country_geo_id) echo "selected";?>>
                        <?php echo $country->geo_name; ?>
                    </option>
                    <?php } } ?> 
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="country" class="form-label">Estado<span class="required">*</span></label>
                <select id="region" name="region" class="form-control geo__state" style="font-size: 16px;height: 34px !important;margin-bottom: 25px;" required>
                    <?php                    
                        if (isset($basic_info->state) && !empty($basic_info->state)) {
                          $this->load->model('geo/geo_helper');
                          $state_geo_id = $basic_info->state;
                          $country_geo_id = $basic_info->country;
                          $states = $this->geo_helper->getCountryStates($country_geo_id);
                        
                          if (!empty($states)) {
                            foreach ($states as $state) { 
                              ?>
                    <option value="<?php echo $state->geo_id; ?>" <?php if($state->geo_id == $state_geo_id) echo "selected"; ?>  >
                        <?php echo $state->geo_name; ?>
                    </option>
                    <?php } } else { ?>
                    <option value="">Nenhum</option>
                    <?php } } ?>
                    <option value="">Selecionar primeiro o país </option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <input type="submit" class="btn btn-custom btn-lg" value="Atualizar">
        </div>
    </div>
</form>
<style type="text/css">
.checkbox-custom input[type="checkbox"] {
    position: absolute;
    margin-left: -30px !important;
    width: 15px !important;
    height: 27px !important;
}
</style>


<div class="">
    <h4> Se você desativar sua conta, não poderá mais acessá-la e nem anúncios ativos se você tiver.</h4>

<form name="deactive_confirm_form" action="<?php echo site_url('user_controller/deactivatedAccount'); ?>" method="post">
    <div class="col-md-12">
        <div class="form-group col-md-12">
            <label class="checkbox checkbox-custom">
                <input type="checkbox" class="checkbox-timeperiod" name="check" value="deactived" required style="margin-top: -1px;"> Desativar conta
            </label>
            <label id="check-error" class="error" for="check"></label>
        </div>
    </div>

    <div class="">
        <input type="submit" class="btn btn-custom btn-lg" value="DESATIVAR">
    </div>

</form>
    

</div>
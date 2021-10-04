
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">NOME DO PLANO </label>
                <input type="text" value="<?php echo $plan_info->plan_title ?>"  class="form-control input-lg" disabled>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label"> PREÇO DO PLANO </label>
                <input type="text" value="R$ <?php echo $plan_info->plan_price ?>.00" class="form-control input-lg" disabled>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label"> QUANTIDADE DE SERVIÇO </label>
                <input type="text" value="<?php echo $plan_info->remaining_service ?>" class="form-control input-lg" disabled>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label"> DATA DE VENCIMENTO DO PLANO </label>
                <input type="text" value="<?php echo $plan_info->expire_date ?>" class="form-control input-lg" disabled>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label"> DATA DE ATIVAÇÃO DO PLANO </label>
                <?php $Date = date('d M, Y', strtotime($plan_info->purchase_date)); ?>
                <input type="text" value="<?php echo $Date ?>" class="form-control input-lg" disabled>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label"> DESCRIÇÃO </label>
                <textarea type="text" class="form-control input-lg" disabled> <?php echo $plan_info->plan_description ?> </textarea>
            </div>
        </div>
    </div>
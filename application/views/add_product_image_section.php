<?php
    $userInfo = $this->session->userInfo;
    // $count_user_product = $this->user_helper->countUserProduct($userInfo->user_id);

    $user_plan = $this->user_helper->getUserPlanInfo($userInfo->user_id);
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
                        <li class="active">Add Product</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="xs-margin"></div>

    <div class="accordion" id="collapse">
        <div class="accordion-group panel">
            <div class="container">
                <h2 class="accordion-title"><span>3. Images</span>
                    <a id="collapse-three-a" class="accordion-btn" data-toggle="collapse" href="#collapse-three"></a>
                </h2>
                <div class="accordion-body collapse" id="collapse-three">
                    <div class="row accordion-body-wrapper">
                        <div class="col-md-12">
                            <span class="note" style="color:red;">
                                <small>(Service image size should be 670 x 844 for best view* )</small>
                            </span>
                            <div class="image_upload_div">
                                <form action="<?php echo site_url('user_controller/uploadProductImage/'.$product_id) ?>" id="add_product_image_form"
                                      class="dropzone">
                                    <div class="dz-message">
                                        Drop files here or click to upload.<br>
                                        <span class="note" style="color:red;"><small>( Please choose a service image* )</small></span>
                                    </div>
                                </form>
                            </div>
                            <span class="note" style="color:red;">
                                <small>( Minimum two service images are required* )</small>
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
                                <input type="submit" class="btn btn-custom btn-lger min-width-slg" value="Add Product">
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
    $("#add_product_form").submit(function () {
        $('#collapse-three').addClass('in');
        $('#collapse-three-a').addClass('open');
    });
</script>
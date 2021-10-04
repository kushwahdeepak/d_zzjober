<style type="text/css">
.nav-justified li.active {
    background: #3296d4;
    color: #fff !important;
}
.nav-justified li.active a {
    color: #fff !important;
}
</style>


<section id="content" role="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('home'); ?>" >Home</a></li>
                    <li class="active">Testimonial</li>
                </ul>
                <ul class="nav nav-tabs nav-justified" role="tablist" style="margin-top: 20px;">
                    <li class="active">
                        <a href="#tetimonial_info" role="tab" data-toggle="tab"> Testimonial </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tetimonial_info">

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label"> Testimonial <span class="required">*</span></label>
                                        <?php if (!empty($TestimonialInfo)) { ?>
                                            <textarea type="text" name="description" id="WYSIHTML" value="" class="form-control input-lg" required><?php echo $TestimonialInfo->description;?> </textarea>
                                        <?php } else { ?>
                                            <textarea type="text" name="description" id="WYSIHTML" value="" class="form-control input-lg" required> </textarea>    
                                        <?php } ?>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input onclick="OnclickTestimonial()" type="button" class="btn btn-custom btn-lg" value="Update Testimonial">
                                </div>
                            </div> 
                        </form>


                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function OnclickTestimonial(argument) {
        var description = $("#WYSIHTML").val();
        if (description != "") {

            $.ajax({ 
                type: "POST",  
                url: "<?php echo base_url(); ?>index.php/user_controller/CreateAndUpdateTestimonial",  
                data: {
                    'description': description,
                },
                dataType: "json",       
                success: function(response)  
                {
                    if (response.success == "add") {
                        toastr.success('<strong>Successfully!</strong> Testimonial added');    
                    } else {
                        toastr.success('<strong>Successfully!</strong> Updated Testimonial');
                    }
                    
                }   
            });

        }    
    } 
</script>

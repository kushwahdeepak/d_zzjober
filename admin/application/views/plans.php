

<!-- admin_customers.php starts -->

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
</style>

<div class="content-wrapper">
    
    <section class="content-header">
        <h1>Plans</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo base_url();?>index.php/admin">
                        <i class="fa fa-dashboard">                            
                        </i>admin
                    </a>
                </li>
                <li class="active">Plans</li>
            </ol>
    </section>

  <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <h2 class="box-title floatalign_text_left">Plan List</h2>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#addPlanModal" class="btn btn-primary text__align__right floatalign_text_right">
                                    <i class="fa fa-plus"></i>
                                </a> -->

                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> Plan Title </th>
                                    <th> Plan Price </th>
                                    <th> Number of Service </th>
                                    <th> Plan validate(Day's) </th>
                                    <th> Plan Description </th>
                                    <th class="th-center"> Status </th>
                                    <th class="th-center" style="width: 14%;"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data['planinfolist'] as $planinfo) { ?>                           
                                <tr data-row-id="<?php echo $planinfo->plan_id;?>"  id="servicesAction<?php echo $planinfo->plan_id;?>">
                                    <td >  <?php if (!empty($planinfo->plan_title)) echo $planinfo->plan_title; ?>  </td>
                                    <td > <?php if (!empty($planinfo->plan_price)) echo $planinfo->plan_price; else echo "Free"; ?> </td>
                                    <td > <?php if (!empty($planinfo->num_of_service)) echo $planinfo->num_of_service; ?> </td>
                                    <td > <?php if (!empty($planinfo->plan_validate)) echo $planinfo->plan_validate; ?> </td>
                                    <td > <?php if (!empty($planinfo->plan_description)) echo $planinfo->plan_description; ?> </td>
                                    <td class="td-center"> 
                                        <?php if($planinfo->plan_status == 'Active') { ?> 
                                            <span class="service-status service-status-icon"> <?php if (!empty($planinfo->plan_status)) echo $planinfo->plan_status; ?> </span>
                                        <?php } else { ?>
                                            <span class="service-inactive-status service-status-icon"> <?php if (!empty($planinfo->plan_status)) echo $planinfo->plan_status; ?> </span>
                                        <?php } ?>        
                                    </td>
                                    <td class="td-center">
                                        <?php if($planinfo->plan_status == 'Active') { ?>                          
                                            <a href="javascript:void(0)" class="btn btn-primary editable-action" col-index='1' data="Deactive"><i class="fa fa-thumbs-up"></i></a>
                                        <?php } else { ?>                          
                                            <a href="javascript:void(0)" class="btn btn-default editable-action" col-index='1' data="Active"><i class="fa fa-thumbs-down"></i></a>
                                        <?php } ?> 
                                            <a href="javascript:void(0)" class="btn btn-info editable-model-id" col-index='3' data="0" class="btn btn-info">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                           <!--  <a href="javascript:void(0)" col-index='2' data="0"  href="#" class="btn btn-danger editable-action">
                                                <i class="fa fa-trash"></i>
                                            </a>  -->
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </section>
</div>    


    <!-- Modal for creating customer starts -->
    <div class="modal fade" id="addPlanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">                        
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Add Plan</h4>
                </div>                        
                <form  name="addPlanModal" method="post" action="<?php echo base_url();?>index.php/admin/addplan" enctype="multipart/form-data"> 
                    <input type="hidden" name="status" value="Active">
                    <div class="modal-body">

                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-md-3 control-label asterisk"> Title </label>
                                <div class="col-md-9">
                                    <input type="text" id="plan_name" name="title" class="form-control" placeholder="Title" required="required"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-md-3 control-label asterisk"> Plan Price </label>
                                <div class="col-md-9">
                                    <input type="text"  name="plan_price" class="form-control" placeholder="Plan Price" required="required"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-md-3 control-label asterisk"> Number of Service </label>
                                <div class="col-md-9">
                                    <input type="number"  name="num_of_service" class="form-control" placeholder="Number of Service" required="required"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-md-3 control-label asterisk"> Plan validate(Day's) </label>
                                <div class="col-md-9">
                                    <input type="number"  name="plan_validate" class="form-control" placeholder="Plan Validate" required="required"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-sm-3 control-label"> Description </label>
                                <div class="col-md-9">
                                    <textarea type="text" class="form-control" name="description" placeholder="Description"></textarea>
                                </div>
                            </div>
                        </div>

<!-- 
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-md-3 control-label asterisk">Category Image</label>
                                <div class="col-md-9">
                                    <input type="file" name="image" id="file-7" class="inputfile inputfile-6" required="required" data-multiple-caption="{count} files selected" style="display: none;"/>
                                    <label for="file-7"><span></span>
                                        <strong>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"> <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                            </svg>
                                            Upload Image&hellip;
                                        </strong>
                                    </label>
                                </div>
                            </div>
                        </div> -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" onclick='' class="btn btn-primary">Add</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- create customer modal ends -->




    <!-- Modal for creating customer starts -->
    <div class="modal fade" id="your-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">                        
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Update Plan</h4>
                </div>                        
                <form name="editPlanModal" method="post" action="<?php echo base_url();?>index.php/admin/updateplan" enctype="multipart/form-data"> 
                    <input type="hidden" name="id" id="hidden_plan_id" value="">
                    <div class="modal-body">

                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-md-3 control-label asterisk"> Title </label>
                                <div class="col-md-9">
                                    <input id="plan_title" type="text" value="" name="title" class="form-control" placeholder="Title" required="required"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-md-3 control-label asterisk"> Plan Price </label>
                                <div class="col-md-9">
                                    <input type="text" id="plan_price" name="plan_price" class="form-control" placeholder="Plan Price" required="required"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-md-3 control-label asterisk"> Number of Service </label>
                                <div class="col-md-9">
                                    <input type="number" id="num_of_service" name="num_of_service" class="form-control" placeholder="Number of Service" required="required"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-md-3 control-label asterisk"> Plan validate(Day's) </label>
                                <div class="col-md-9">
                                    <input type="number" id="plan_validate" name="plan_validate" class="form-control" placeholder="Plan Validate" required="required"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-sm-3 control-label"> Description </label>
                                <div class="col-md-9">
                                    <textarea type="text" id="your-text" class="form-control" name="description" placeholder="Description"> </textarea>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-md-3 control-label asterisk">Category Image</label>
                                <div class="col-md-9">
                                    <input type="file" name="image" id="file-8" class="inputfile inputfile-6" required="required" data-multiple-caption="{count} files selected" style="display: none;"/>
                                    <label for="file-8"><span></span>
                                        <strong>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"> <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                            </svg>
                                            Upload Image&hellip;
                                        </strong>
                                    </label>
                                </div>
                            </div>
                        </div> -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" onclick='' class="btn btn-primary"> Update </button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <!-- create customer modal ends -->


 
<script type="text/javascript">
    $(document).ready(function(){      
        $(document).on('click','.editable-action', function() {
            data = {};
            data['val'] = $(this).attr('data');
            data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');
            
            if(data['index'] == "2") {
                if(confirm('Are you sure you want to delete this plan?')) {
                    $.ajax({ 
                        type: "POST",  
                        url: "<?php echo site_url(); ?>/admin/updateInline/planstatus",  
                        cache:false,  
                        data: data,
                        dataType: "json",       
                        success: function(response)  
                        {   
                            if(response.msg == "success") {
                                if (data['index'] == 1) {
                                    toastr.success('Plan Status Updated');
                                    $(window).load(setTimeout(function(){
                                    location.reload();
                                    }, 400));
                                }
                                if (data['index'] == 2) {
                                    toastr.success('Plan Deleted');
                                    $(window).load(setTimeout(function(){
                                    location.reload();
                                    }, 400));
                                }    
                            } else {
                                toastr.success('Plan Status Updated');
                            } 
                        }   
                    });
            }   } else {
                $.ajax({ 
                    type: "POST",  
                    url: "<?php echo site_url(); ?>/admin/updateInline/planstatus",  
                    cache:false,  
                    data: data,
                    dataType: "json",       
                    success: function(response)  
                    {   
                        if(response.msg == "success") {
                            if (data['index'] == 1) {
                                toastr.success('Plan Status Updated');
                                $(window).load(setTimeout(function(){
                                location.reload();
                                }, 400));
                            }
                            if (data['index'] == 2) {
                                toastr.success('Plan Deleted');
                                $(window).load(setTimeout(function(){
                                location.reload();
                                }, 400));
                            }    
                        } else {
                            toastr.success('Plan Status Updated');
                        } 
                    }   
                });
            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function(){      
        $(document).on('click','.editable-model-id', function() {
            data = {};
            data['val'] = $(this).attr('data');
            data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');
            
            $.ajax({   

                type: "POST",  
                url: "<?php echo base_url(); ?>/index.php/admin/updatePlanInlinemodel",  
                cache:false,  
                data: data,
                dataType: "json",       
                success: function(response)  
                {   


                    $('#plan_title').html("");
                    $('#your-text').html("");
                    $('#plan_price').html("");
                    $('#num_of_service').html("");
                    $('#plan_validate').html("");

                    $('#hidden_plan_id').val(response.plan_id);
                    $('#plan_title').val(response.plan_title);
                    $('#plan_price').val(response.plan_price);
                    $('#num_of_service').val(response.num_of_service);
                    $('#plan_validate').val(response.plan_validate);
                    $('#your-text').append(response.plan_description); 
                    // $("#serviceimg").attr('src',"<?php echo base_url();?>images/category/"+response.category_img) 
                    $('#your-modal').modal({'show' : true});
                }   
            
            });
        });
    });
</script>  
<!--
  
  KARYON SOLUTIONS CONFidENTIAL
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
        <h1>Sub Categories</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url();?>index.php/admin"><i class="fa fa-dashboard"></i>admin</a></li>
                <li class="active">Sub Categories</li>
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
                                <h2 class="box-title floatalign_text_left">Category List with Subcategory</h2>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th > Category </th>
                                    <th > Sub Category </th>
                                    <th class="td-center"> Sub Category Count</th>
                                    <th class="th-center" style="width: 14%;"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data['categoriesinfolist'] as $categoryinfo) { ?>                           
                                <tr data-row-id="<?php echo $categoryinfo->category_id;?>"  id="servicesAction<?php echo $categoryinfo->category_id;?>">

                                    <td> <?php if (!empty($categoryinfo->category_title)) echo $categoryinfo->category_title; ?>  </td>
                                    <td>
                                        <?php 
                                            $subCategoryList = $this->adminmodel->getSubCategoryListOfCategory($categoryinfo->category_id);
                                            if(isset($subCategoryList) && !empty($subCategoryList))
                                            {
                                                foreach ($subCategoryList as $subCategory) 
                                                {

                                                ?>
                                                <span style="background-color: #3c8dbc; border-color: #367fa9; padding: 1px 10px; color: #fff;    border: 1px solid #aaa;border-radius: 4px;cursor: default;float: left;margin-right: 5px;margin-top: 5px;">
                                                    <?php echo $subCategory->subcategory_title; ?> 
                                                </span>
                                                <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "No subcategory available";
                                            }
                                        ?> 
                                    </td>                                    
                                    <td class="td-center">                                         
                                        <span class="pull-right-container">
                                            <small class="label bg-green">
                                                <?php echo $this->adminmodel->getSubCategoryCountOfCategory($categoryinfo->category_id); ?>
                                            </small>
                                        </span>  
                                    </td>
                                    <td class="td-center"> 
                                        <?php 
                                                $noOfCategory = $this->adminmodel->getSubCategoryCountOfCategory($categoryinfo->category_id);
                                                if($noOfCategory < 25) {  
                                            ?>
                                            <a href="javascript:void(0)" onclick="addSubCategory('<?php echo $categoryinfo->category_id; ?>', '<?php echo $categoryinfo->category_title; ?>')" class="btn btn-primary">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            
                                        <?php } ?>
                                        <a href="<?php echo base_url(); ?>index.php/admin/subcategorylistoverview?category_id=<?php echo $categoryinfo->category_id; ?>" class="btn btn-info editable-model-id" class="btn btn-info">
                                            <i class="fa fa-pencil"></i>
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
  </section>
</div>    


    <!-- Modal for creating customer starts -->
    <div class="modal fade" id="addSubCategorympdal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">                        
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Add Sub Category of "<span id="category_title"></span>"</h4>
                </div>                        
                <form name="addSubCategoryModal" method="post" action="<?php echo base_url();?>index.php/admin/addsubcategory" enctype="multipart/form-data"> 
                    <input type="hidden" name="status" value="Active">
                    <input type="hidden" name="category_id" id="category_id" value="">
                    <div class="modal-body">

                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-md-3 control-label asterisk"> Title </label>
                                <div class="col-md-9">
                                    <input id="subcategory_name" type="text" name="title" class="form-control" placeholder="Title" required="required"/>
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


                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-md-3 control-label asterisk">Sub Category Image</label>
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
                        </div>

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





<script type="text/javascript">    
        function addSubCategory(category_id, category_title) 
        {
            $('#category_id').val(category_id);
            $('#category_title').html("");
            $('#category_title').append(category_title);
            $('#addSubCategorympdal').modal({'show' : true});
        }
</script> 
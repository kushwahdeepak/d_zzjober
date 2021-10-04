<!-- KARYON SOLUTIONS CONFidENTIAL
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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php
        $category_data = $this->adminmodel->getcategorytinfo($data['category_id']);
    ?>
    <section class="content-header">
        <h1>Subcategory of "<?php echo $category_data->category_title ?>"</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/admin/vendor"><i class="fa fa-dashboard"></i> Home </a></li>
            <li class="active">Subcategory</li>
        </ol>
    </section>
    <!-- Main content -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <h2 class="box-title floatalign_text_left">Sub Category List</h2>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <?php $noOfCategory = $this->adminmodel->getSubCategoryCountOfCategory($data['category_id']);
                                    if ($noOfCategory < 25) {
                                        ?>
                                        <a href="javascript:void(0)" data-toggle="modal"
                                           data-target="#addsubcategoryofcategory" class="btn btn-primary pull-right">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th> Image</th>
                                <th> Title</th>
                                <th> Description</th>
                                <th class="th-center"> Status</th>
                                <th class="th-center" style="width: 14%;"> Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($data['subcategorylist']) and !empty($data['subcategorylist'])) {
                                foreach ($data['subcategorylist'] as $subcategoryinfo) {
                                    ?>
                                    <tr data-row-id="<?php echo $subcategoryinfo->subcategory_id; ?>"
                                        id="servicesAction<?php echo $subcategoryinfo->subcategory_id; ?>">

                                        <td>
                                            <?php if ($subcategoryinfo->subcategory_img == 'NULL' || $subcategoryinfo->subcategory_img == '') { ?>
                                                <img class="profile-user-img img-responsive user__img"
                                                     src="<?php echo base_url(); ?>assets/images/no-image-found.jpg">
                                            <?php } else { ?>
                                                <img class="profile-user-img img-responsive user__img"
                                                     src='<?php echo base_url(); ?>images/subcategory/<?php echo $subcategoryinfo->subcategory_img; ?>'/>
                                            <?php } ?>
                                        </td>

                                        <td> <?php if (!empty($subcategoryinfo->subcategory_title)) echo $subcategoryinfo->subcategory_title; ?> </td>
                                        <td> <?php if (!empty($subcategoryinfo->subcategory_des)) echo $subcategoryinfo->subcategory_des; ?> </td>

                                        <td class="td-center">
                                            <?php if ($subcategoryinfo->subcategory_status == 'Active') { ?>
                                                <span class="service-status service-status-icon"> <?php if (!empty($subcategoryinfo->subcategory_status)) echo $subcategoryinfo->subcategory_status; ?> </span>
                                            <?php } else { ?>
                                                <span class="service-inactive-status service-status-icon"> <?php if (!empty($subcategoryinfo->subcategory_status)) echo $subcategoryinfo->subcategory_status; ?> </span>
                                            <?php } ?>
                                        </td>
                                        <td class="td-center">
                                            <?php if ($subcategoryinfo->subcategory_status == 'Active') { ?>
                                                <a href="javascript:void(0)" class="btn btn-primary editable-action"
                                                   col-index='1' data="Deactive"><i class="fa fa-thumbs-up"></i></a>
                                            <?php } else { ?>
                                                <a href="javascript:void(0)" class="btn btn-default editable-action"
                                                   col-index='1' data="Active"><i class="fa fa-thumbs-down"></i></a>
                                            <?php } ?>
                                            <a href="javascript:void(0)" class="btn btn-info editable-model-id"
                                               col-index='3' data="0" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" col-index='2' data="0" href="#"
                                               class="btn btn-danger editable-action"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal for creating customer starts -->
    <div class="modal fade" id="addsubcategoryofcategory" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Add Sub Category of
                        "<?php echo $category_data->category_title ?>"</h4>
                </div>

                <form name="addSubCategoryModal" method="post"
                      action="<?php echo base_url(); ?>index.php/admin/addsubcategory/active"
                      enctype="multipart/form-data">
                    <input type="hidden" name="status" value="Active">
                    <input type="hidden" name="category_id" id="category_id"
                           value="<?php echo $data['category_id']; ?>">

                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-md-3 control-label asterisk"> Title </label>
                                <div class="col-md-9">
                                    <input id="subcategory_name" type="text" name="title" class="form-control"
                                           placeholder="Title" required="required"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-sm-3 control-label asterisk"> Description </label>
                                <div class="col-md-9">
                                    <textarea type="text" class="form-control" name="description"
                                              placeholder="Description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="col-md-3 control-label asterisk">Sub Category Image</label>
                                <div class="col-md-9">
                                    <input type="file" name="image" id="file-9" class="inputfile inputfile-6"
                                           required="required" data-multiple-caption="{count} files selected"
                                           style="display: none;"/>
                                    <label for="file-9"><span></span>
                                        <strong>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                                 viewBox="0 0 20 17">
                                                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                            </svg>
                                            Upload Image&hellip;
                                        </strong>
                                    </label>
                                </div>
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


<!-- Modal for creating customer starts -->
<div class="modal fade" id="subcategory_update_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">Update Sub Category of
                    "<?php echo $category_data->category_title ?>"</h4>
            </div>

            <form method="post" action="<?php echo base_url(); ?>index.php/admin/updatesubcategory/active"
                  enctype="multipart/form-data">
                <input type="hidden" name="id" id="subcategory_id" value="">
                <input type="hidden" name="category_id" id="Updatecategory_id" value="">

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Title </label>
                            <div class="col-md-9">
                                <input id="subcategory_title" type="text" value="" name="title" class="form-control"
                                       placeholder="Title" required="required"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-sm-3 control-label asterisk"> Description </label>
                            <div class="col-md-9">
                                <textarea type="text" id="subcategory_des" class="form-control" name="description"
                                          placeholder="Description"> </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk">Sub category Image</label>
                            <div class="col-md-9">
                                <input type="file" name="image" id="file-10" class="inputfile inputfile-6"
                                       required="required" data-multiple-caption="{count} files selected"
                                       style="display: none;"/>
                                <label for="file-10"><span></span>
                                    <strong>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                             viewBox="0 0 20 17">
                                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                        </svg>
                                        Upload Image&hellip;
                                    </strong>
                                </label>
                            </div>
<!--                            <div class="col-md-12 col-sm-12" style="text-align: center">-->
<!--                                <img id="subcategoryimg" src="" class="img-responsive">-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" onclick='' class="btn btn-primary"> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- create customer modal ends -->


<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.editable-action', function () {
            data = {};
            data['val'] = $(this).attr('data');
            data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');

            if (data['index'] === "2") {
                if (confirm('Are you sure you want to delete this sub category?')) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url(); ?>/admin/updateInline/subcategorystatus",
                        cache: false,
                        data: data,
                        dataType: "json",
                        success: function (response) {
                            if (response.msg === "success") {
                                if (data['index'] === 1) {
                                    toastr.success('Sub Category Status Updated');
                                    $(window).load(setTimeout(function () {
                                        location.reload();
                                    }, 400));
                                }
                                if (data['index'] === 2) {
                                    toastr.success('Sub Category Deleted');
                                    $(window).load(setTimeout(function () {
                                        location.reload();
                                    }, 400));
                                }
                            } else {
                                toastr.success('Sub Category Status Updated');
                            }
                        }
                    });
                }
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url(); ?>/admin/updateInline/subcategorystatus",
                    cache: false,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if (response.msg === "success") {
                            if (data['index'] === 1) {
                                toastr.success('Sub Category Status Updated');
                                $(window).load(setTimeout(function () {
                                    location.reload();
                                }, 400));
                            }
                            if (data['index'] === 2) {
                                toastr.success('Sub Category Deleted');
                                $(window).load(setTimeout(function () {
                                    location.reload();
                                }, 400));
                            }
                        } else {
                            toastr.success('Sub Category Status Updated');
                        }
                    }
                });
            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.editable-model-id', function () {
            data = {};
            data['val'] = $(this).attr('data');
            data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');

            var sub_cat_title = $('#subcategory_title');
            var sub_des = $('#subcategory_des');

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>/index.php/admin/updatesubcategoryInlinemodel",
                cache: false,
                data: data,
                dataType: "json",
                success: function (response) {
                    sub_cat_title.html("");
                    sub_des.html("");

                    $('#subcategory_id').val(response.subcategory_id);
                    $('#Updatecategory_id').val(response.category_id);
                    sub_cat_title.val(response.subcategory_title);
                    sub_des.append(response.subcategory_des);
                    $("#subcategoryimg").attr('src', "<?php echo base_url();?>images/subcategory/" + response.subcategory_img);
                    $('#subcategory_update_modal').modal({'show': true});
                }

            });
        });
    });
</script> 
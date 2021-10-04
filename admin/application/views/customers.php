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

<style type="text/css">  

    td {

      vertical-align: middle !important;

      text-align: center;

    }

    th {

      vertical-align: middle !important;

      text-align: center;

    }

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
    .chat{
        padding: 1px 10px; border-radius: 5px; text-transform: uppercase;
    }
    .chat .online, .popup-head-left .online{
        width: 10px; 
        height: 10px; 
        background: green; 
        display: inline-block; 
        border-radius: 10px; 
        margin-right: 10px; 
        border: 1px solid #fff;
    }
    .chat .offline,.popup-head-left .offline{
        width: 10px; 
        height: 10px; 
        background: orange; 
        display: inline-block; 
        border-radius: 10px; 
        margin-right: 10px; 
        border: 1px solid #fff;
    }

</style>

<!-- admin_customers.php starts -->

<div class="content-wrapper">





    <section class="content-header">

        <h1>Customers</h1>

        <ol class="breadcrumb">

            <li><a href="<?php echo base_url();?>index.php/admin"><i class="fa fa-dashboard"></i>admin</a></li>

            <li class="active">Customers</li>

        </ol>

    </section>



    <!-- Main content -->

    <section class="content">

        <div class="row">

            <div class="col-xs-12">

                <div class="box box-primary">

                    <!-- <div class="box-header">

                        <div class="row">

                            <div class="col-sm-6 col-md-6">

                                <h2 class="box-title floatalign_text_left">Customer List</h2>

                            </div>

                            <div class="col-sm-6 col-md-6">

                                <a href="<?php echo base_url(); ?>index.php/admin/addcustomer" class="btn btn-primary text__align__right floatalign_text_right"><i class="fa fa-plus"></i></a>

                            </div>

                        </div>

                    </div> -->

                    <!-- /.box-header -->

                    <div class="box-body table-responsive">

                        <table id="example1" class="table table-bordered table-hover">

                            <thead>

                                <tr>

                                    <th> Image </th>

                                    <th> Name </th>

                                    <th> Username </th>

                                    <th> Email </th>

                                    <th> Mobile </th>

                                    <th> City </th>

                                    <th> Chat </th>

                                    <th> Status </th>

                                    <th> Action </th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php foreach ($data['customerinfolist'] as $key=>$customerinfo) {  ?>

                                    <tr data-row-id="<?php echo $customerinfo->user_id;?>"  id="customerAction<?php echo $customerinfo->user_id;?>">

                                        <td>
                                            <?php if (!empty($customerinfo->user_img)) { ?>
                                                <img class="profile-user-img img-responsive img-circle user__img" src="<?php echo base_url()?>/images/users/<?php echo $customerinfo->user_img; ?>">
                                            <?php } else { ?>
                                                <img class="profile-user-img img-responsive img-circle user__img" src="<?php echo base_url(); ?>images/users/profile_img.jpg">
                                            <?php } ?>
                                        </td>

                                        <td>

                                            <a href="<?php echo base_url(); ?>index.php/admin/customerOverview?user_id=<?php echo $customerinfo->user_id ?>" style="color:#15659e;">

                                                <?php if (!empty($customerinfo->first_name)) echo $customerinfo->first_name; ?> 

                                                <?php if (!empty($customerinfo->last_name)) echo $customerinfo->last_name; ?>

                                            </a>
                                            

                                        </td>

                                        

                                        <td> <?php if (!empty($customerinfo->username)) echo $customerinfo->username; else echo "N/A"; ?> </td>

                                        <td> <?php if (!empty($customerinfo->email)) echo $customerinfo->email; else echo "N/A"; ?> </td>

                                        <td> <?php if (!empty($customerinfo->mobile)) echo $customerinfo->mobile; else echo "N/A"; ?> </td>



                                        <td> <?php if (!empty($customerinfo->city)) echo $customerinfo->city; else echo "N/A"; ?> </td>
                                        <td>
                                            
                                            <a href="javascript:register_popup('<?=$customerinfo->first_name?>-<?=$customerinfo->last_name?>', '<?=$customerinfo->user_id?>');" data-id="<?=$customerinfo->user_id?>" class="chat">
                                               <span class="offline"></span>
                                                Chat</a>
                                                
                                        </td>

                                        <td> 

                                            <?php if($customerinfo->user_status == 'Active') { ?> 

                                                <span class="service-status service-status-icon">   <?php if (!empty($customerinfo->user_status)) echo $customerinfo->user_status; ?> </span>

                                            <?php } else if($customerinfo->user_status == 'Deactive') { ?>

                                                <span class="service-inactive-status service-status-icon">   <?php if (!empty($customerinfo->user_status)) echo $customerinfo->user_status; ?> </span>

                                            <?php } else if ($customerinfo->user_status == 'Deleted') { ?>

                                                <span class="service-inactive-status service-status-icon">   <?php if (!empty($customerinfo->user_status)) echo $customerinfo->user_status; ?> </span>
                                            <?php } ?>    

                                        </td>



                                        <td>

                                            <?php if($customerinfo->user_status == 'Active') { ?>                          

                                                <a href="javascript:void(0)" class="btn btn-primary editable-action" col-index='2' data="Deactive"><i class="fa fa-thumbs-up"></i></a>

                                            <?php } else if($customerinfo->user_status == 'Deactive') { ?>                          

                                                <a href="javascript:void(0)" class="btn btn-default editable-action" col-index='2' data="Active"><i class="fa fa-thumbs-down"></i></a>

                                            <?php } ?>

                                                <a href="<?php echo base_url(); ?>index.php/admin/customerOverview?user_id=<?php echo $customerinfo->user_id ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>

                                            <?php if ($customerinfo->user_status != 'Deleted') { ?>

                                                <a href="javascript:void(0)" col-index='1' data="0" class="btn btn-danger editable-action"><i class="fa fa-trash"></i></a>
                                            <?php } ?> 

                                        </td>

                                    </tr>

                                <?php } ?>

                            </tbody>

                        </table>

                    </div>

                </div>

                <!-- <div class="box box-primary"> -->
               
            </div>

        </div>

    </section>

</div>    





 <script type="text/javascript">

    $(document).ready(function(){      

        $(document).on('click','.editable-action', function() {



        data = {};

        data['val'] = $(this).attr('data');

        data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');

        data['index'] = $(this).attr('col-index');



        if(data['index'] === 1) {

            if(confirm('Are you sure you want to delete this Customer?')) {

               

                $.ajax({  

                    type: "POST",  

                    url: "<?php echo base_url(); ?>/index.php/admin/updateInline/customerdelete",  

                    cache:false,  

                    data: data,

                    dataType: "json",       

                    success: function(response)  

                    {   

                        location.reload();

                    }   

                });

            }

        } 

        else

        {

            $.ajax({  

                    type: "POST",  

                    url: "<?php echo base_url(); ?>/index.php/admin/updateInline/customerdelete",  

                    cache:false,  

                    data: data,

                    dataType: "json",       

                    success: function(response)  

                    {   

                        location.reload();

                    }   

                });

        }

    });

  });

</script>


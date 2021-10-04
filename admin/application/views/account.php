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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <section class="content-header">
        <h1>Admin Profile</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i> admin</a></li>
            <li class="active">Admin profile</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <?php if (empty($data['adminInfo']->user_img)) { ?>
                            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>images/profile_img.jpg" alt="User profile picture" width="300px" height="300px">
                        <?php } else { ?>
                            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>images/users/<?php echo $data['adminInfo']->user_img; ?>" alt="User profile picture" width="300px" height="300px">
                        <?php } ?>
                        <h3 class="profile-username text-center"><?php echo $data['adminInfo']->first_name; ?> <?php echo $data['adminInfo']->last_name; ?></h3>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b> User </b> <a class="pull-right"><?php echo $data['noOfUser']; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b> Categories </b> <a class="pull-right"><?php echo $data['noOfCategory']; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b> Sub Categories </b> <a class="pull-right"><?php echo $data['noOfSubCategory']; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="<?php if ($data['active'] == "setting") echo "active"; ?>"><a href="#settings" data-toggle="tab">Basic Info</a></li>
                        <li class="<?php if ($data['active'] == "password") echo "active"; ?>"><a href="#password" data-toggle="tab">Change Password</a></li>
                        <li class="<?php if ($data['active'] == "profilepicture") echo "active"; ?>"><a href="#editprofilepicture" data-toggle="tab">Edit Profile picture</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane <?php if ($data['active'] == "password") echo "active"; ?>" id="password">
                            <br>
                            <?php include('account_tabs/password.php'); ?>
                        </div>

                        <div class="tab-pane <?php if ($data['active'] == "setting") echo "active"; ?>" id="settings">
                            <br>
                            <?php include('account_tabs/basicInfo.php'); ?>
                        </div>

                        <div class="tab-pane <?php if ($data['active'] == "profilepicture") echo "active"; ?>" id="editprofilepicture">
                            <br>
                            <?php include('account_tabs/profile_img.php'); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>  
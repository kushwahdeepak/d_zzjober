<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url('admin'); ?>" class="logo" style="padding: 0px;">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>ZZ</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"> <img class="thumbnail" src="<?php echo base_url();?>/assets/images/snoopyjob.png" style="height: 60px;width: 230px;"> </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="<?php echo site_url('login/logout'); ?>">Sign out</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="height: auto;">
            <div class="user-panel">
                <div class="pull-left image">
                    <?php if (empty($data['adminInfo']->user_img)) { ?>
                        <img class="profile-user-img img-responsive"
                             src="<?php echo base_url(); ?>images/profile_img.jpg" alt="User profile picture"
                             height="45px;">
                    <?php } else { ?>
                        <img class="profile-user-img img-responsive"
                             src="<?php echo base_url(); ?>images/users/<?php echo $data['adminInfo']->user_img; ?>"
                             alt="User profile picture" height="45px;">
                    <?php } ?>
                </div>
                <div class="pull-left info">
                    <p><?php echo $data['adminInfo']->first_name; ?><?php echo $data['adminInfo']->last_name; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- Sidebar user panel -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>

                <li<?php echo($data['pageName'] == "ACCOUNT" ? " class='active'" : ""); ?>>
                    <a href="<?php echo base_url(); ?>index.php/admin/account">
                        <i class="fa fa-user"></i> <span>My Profile</span>
                    </a>
                </li>

             <!--    <li<?php echo($data['pageName'] == "NOTIFICATIONS" ? " class='active'" : ""); ?>>
                    <a href="<?php echo base_url(); ?>index.php/admin/notifications">
                        <i class="fa fa-bell-o"></i> <span>Notifications</span>
                    </a>
                </li> -->

                <li<?php echo($data['pageName'] == "CUSTOMERS" ? " class='active'" : ""); ?>>
                    <a href="<?php echo base_url(); ?>index.php/admin/customers">
                        <i class="fa fa-users"></i>
                        <span> Users </span>
                        <span class="pull-right-container">
                                    <small class="label pull-right bg-green">
                                        <?php echo $this->adminmodel->getNoOfCustomer(); ?>
                                    </small>
                                </span>
                    </a>
                </li>

                <li<?php echo($data['pageName'] == "CATEGORY" ? " class='active'" : ""); ?>>
                    <a href="<?php echo base_url(); ?>index.php/admin/category">
                        <i class="fa fa-cogs"></i>
                        <span> Category </span>
                        <span class="pull-right-container">
                                    <small class="label pull-right bg-green">
                                        <?php echo $this->adminmodel->getNoOfCategory(); ?>
                                    </small>
                                </span>
                    </a>
                </li>

                <li<?php echo($data['pageName'] == "SUBCATEGORY" ? " class='active'" : ""); ?>>
                    <a href="<?php echo base_url(); ?>index.php/admin/subcategory">
                        <i class="fa fa-cogs"></i>
                        <span> Sub Category </span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">
                                <?php echo $this->adminmodel->getNoOfSubCategory(); ?>
                            </small>
                        </span>
                    </a>
                </li>

                <li<?php echo($data['pageName'] == "PLANS" ? " class='active'" : ""); ?>>
                    <a href="<?php echo base_url(); ?>index.php/admin/plans">
                        <i class="fa fa-cog"></i> <span>Plans</span>
                    </a>
                </li> 

                <li<?php echo($data['pageName'] == "SERVICESLIST" ? " class='active'" : ""); ?>>
                    <a href="<?php echo base_url(); ?>index.php/admin/servicesList">
                        <i class="fa fa-cog"></i> <span> Services List </span>
                    </a>
                </li>

             <!--    <li<?php echo($data['pageName'] == "ORDERLIST" ? " class='active'" : ""); ?>>
                    <a href="<?php echo base_url(); ?>index.php/admin/orderList">
                        <i class="fa fa-cog"></i> <span> Order List </span>
                    </a>
                </li> -->

                <li<?php echo($data['pageName'] == "CONTACTUS" ? " class='active'" : ""); ?>>
                    <a href="<?php echo base_url(); ?>index.php/admin/contactus">
                        <i class="fa fa-cog"></i> <span>Contact us</span>
                    </a>
                </li>

                <li<?php echo($data['pageName'] == "SETTINGS" ? " class='active'" : ""); ?>>
                    <a href="<?php echo base_url(); ?>index.php/admin/settings">
                        <i class="fa fa-cog"></i> <span>Settings</span>
                    </a>
                </li>


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
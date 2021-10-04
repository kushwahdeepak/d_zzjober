<!DOCTYPE html>
<html class="ie9">
<head>
    <meta charset="utf-8">
    <title>ZZjober</title>
    <meta name="description" content="ZZjober">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="site_url" content="<?php echo site_url(); ?>">

    <link rel="icon" href="<?php echo base_url('assets/favicon.png'); ?>" type="image/png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

    <!-- for multiple select img -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/select_multiple_img/dropzone.css">
    <script src="<?php echo base_url(); ?>assets/select_multiple_img/dropzone.js"></script>

    <!-- data table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <!-- notifications upload -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/notification.css'); ?>">

    <!-- image upload -->
    <link rel="stylesheet" href="<?php echo base_url('assets/select_file/select_file.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.selectbox.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/revslider2.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/toastr.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/crop_img/imgareaselect.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugin.css'); ?>">
    
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.css'); ?>">
    <link rel="stylesheet" href="<?=base_url()?>/admin/assets/css/emoji.css">

    <script src="<?php echo base_url('assets/ajax/libs/jquery/2.1.1/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.easyPaginate.js"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="<?php echo base_url('assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js'); ?>"></script>

    <style>

        @media only screen and (max-width : 540px) {
            .chat-sidebar {
                display: none !important;
            }
            .chat-popup {
                display: none !important;
            }
        }
        body {
            background-color: #e9eaed;
        }
        .chat-sidebar {
            width: 200px;
            position: fixed;
            height: 100%;
            right: 0px;
            top: 0px;
            padding-top: 10px;
            padding-bottom: 10px;
            border: 1px solid rgba(29, 49, 91, .3);
        }
        .sidebar-name {
            padding-left: 10px;
            padding-right: 10px;
            margin-bottom: 4px;
            font-size: 12px;
        }
        .sidebar-name span {
            padding-left: 5px;
        }
        .sidebar-name a {
            display: block;
            height: 100%;
            text-decoration: none;
            color: inherit;
        }
        .sidebar-name:hover {
            background-color:#e1e2e5;
        }
        
        .sidebar-name img {
            width: 32px;
            height: 32px;
            vertical-align:middle;
        }
        .popup-box {
            display: none;
            position: fixed;
            bottom: 0px;
            right: 220px;
            height: 285px;
            background-color: rgb(237, 239, 244);
            width: 300px;
            border: 1px solid rgba(29, 49, 91, .3);
            z-index: 9999;
        }
        .popup-box .popup-head {
            background-color: #6d84b4;
            padding: 5px;
            color: white;
            font-weight: bold;
            font-size: 14px;
            clear: both;
        }
        .popup-box .popup-head .popup-head-left {
            float: left;
        }
        .popup-box .popup-head .popup-head-right {
            float: right;
            opacity: 0.5;
        }
        .popup-box .popup-head .popup-head-right a {
            text-decoration: none;
            color: inherit;
        }
        .popup-box .popup-messages {
            height: 100%;
            overflow-y: scroll;
            height: 200px;
        }
        .popup-box .popup-messages .loadMore {
            color: #999;
            text-align: center;
            margin: 0 auto;
            display: block;
        }
        .popup-box .popup-footer {
            position: absolute;
            bottom: 0px;
            width: 100%;
        }
        .popup-box .popup-footer #sendmessage {
            width: 100%;
            padding: 0px;
            margin: 0px;
        }
        .sent {
            list-style: none;
            width: 50%;
            float: right;
            background: #ccc;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin: 4px 0px;
            display: block;
            clear: both;
        }
        .received {
            list-style: none;
            width: 50%;
            float: left;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin: 4px 0px;
            display: block;
            clear: both;
        }
        .chat {
            padding: 1px 10px; border-radius: 5px; text-transform: uppercase;
        }
        .chat .online, .popup-head-left .online {
            width: 10px; 
            height: 10px; 
            background: green; 
            display: inline-block; 
            border-radius: 10px; 
            margin-right: 10px; 
            border: 1px solid #fff;
        }
        .chat .offline,.popup-head-left .offline {
            width: 10px; 
            height: 10px; 
            background: orange; 
            display: inline-block; 
            border-radius: 10px; 
            margin-right: 10px; 
            border: 1px solid #fff;
        }
        .fa {
            /*margin-right: 3px;*/
        }
        .product_banner_size {
            height: 267px;
        }
        .product_banner_img {
            height: 265px;
        }
        .close_fav_button {
            position: fixed;
            z-index: 99;
            font-size: 16px;
            padding: 1px 8px;
            right: 0;
            background: white;
            border-radius: 38px;
            margin: 8px;
        }
        .close_fav_button i {
            margin-right: 0;
        }
        @media only screen  and (min-width: 320px)  and (max-width: 549px) {
            .chat-input {
                width: 280px!important;    padding: 15px !important;
                padding-bottom: 0px !important;
            } 
            .mm-menu.mm-right {
                left: auto;
                top: 40px;
                right: 0px;
                width: 280px;
            }
            .mm-menu.mm-right {
                left: auto;
                top: 40px;
                right: 0px;
                width: 280px;
            }
        }
        .float-right {
            float: right !important;
        }
        .profile_on_ad_overview {
            z-index: 9;
            width: 70px !important;
            height: 70px !important;
            position: absolute;
            border-radius: 105px;
            top: 85%;
            left: 19%;
        }
        @media only screen and (max-width: 500px) {
            .float-right {
                float: left !important;
            }   
        }
        @media only screen and (max-width: 1600px) {
            .profile_on_ad_overview {
                top: 84%;
                left: 14%;
            }
        }
        @media only screen and (max-width: 1500px) {
            .profile_on_ad_overview {
                top: 84%;
                left: 12%;
            }
        }
        @media only screen and (max-width: 1400px) {
            .profile_on_ad_overview {
                top: 84%;
                left: 10%;
            }
        }
        @media only screen and (max-width: 1250px) {
            .product_banner_size {
                height: 257px;
            }  
            .product_banner_img {
                height: 254px;
            } 
            .profile_on_ad_overview {
                top: 84%;
                left: 6%;
            }
            .product-add-btn, .product-view-btn {
                padding: 6px 12px;
            }
        }
        @media only screen and (max-width: 1199px) {
            .product_banner_size {
                height: 206px;
            }  
            .product_banner_img {
                height: 203px;
            } 
            .profile_on_ad_overview {
                left: 9.5%;
            }
        }
        @media only screen and (max-width: 991px) {
            .product_banner_size {
                height: 156px;
            }  
            .product_banner_img {
                height: 153px;
            } 
            .profile_on_ad_overview {
                left: 15.5%;
            }
        }
        @media only screen and (max-width: 979px) {
            .product_banner_size {
                height: 217px;
            }  
            .product_banner_img {
                height: 214px;
            }
        }
        @media only screen and (max-width: 769px) {
            .carousel-title {
                font-size: 15px;
            }
            .product-name {
                font-size: 13px;
            } 
            .xlg-margin {
                margin-bottom: 25px;
            }
            .feature-box.feature-box-inline h3 {
                font-size: 14px;
            }
            .lg-margin3x.xs-margin2x {
                margin-bottom: 10px;
            }
            .widget {
                margin-bottom: 15px !important;
            }
            .mobile_bucket {
                line-height: 1;
                font-size: 14px;
                margin-right: 10px;
            }
            .profile_on_ad_overview {
                left: 5.5%;
            }
            .product-add-btn, .product-view-btn {
                padding: 6px 12px;
            }
        }
        @media only screen and (max-width: 736px) {
            .product-add-btn, .product-view-btn {
                padding: 6px 8px;
                font-size: 12px;
            }
        }
        @media only screen and (max-width: 479px) {
            .product_banner_size {
                height: 172px;
            }  
            .product_banner_img {
                height: 169px;
            } 
            .product2 {
                margin-bottom: 10px;
            } 
            .xlg-margin {
                margin-bottom: 15px;
            }
            .feature-box.feature-box-inline {
                margin-bottom: 30px;
            }
            #footer #footer-inner {
                padding: 30px 0 2px;
            }
            #footer-bottom .copyright-text {
                margin: 12px 0;
            }
            .footer_social {
                text-align: center;
                float: none !important;
            }
            .widget .links a {
                display: block;
                line-height: 25px;
            }
            #responsive-nav {
                margin-top: 3px;
            }
            .img-reponse {
                height: 39px;
            }
            .logo-container {
                padding: 6px 0 0 0;
            }
            .imagePlanSize {
                width: 24%
            }
            .product-add-btn, .product-view-btn {
                padding: 6px 7px;
                font-size: 12px;
            }
            .add-fav {
                padding-right: 5px;
            }
            .profile_on_ad_overview {
                top: 80%;
                left: 8.5%;
            }
        }
        @media only screen and (max-width: 400px) {
            .product_banner_size {
                height: 158px;
            }  
            .product_banner_img {
                height: 155px;
            } 
            .product-name-custom {
                height: 45px;
                overflow: hidden;
            }
        }
        @media only screen and (max-width: 350px) {
            .product_banner_size {
                height: 128px;
            } 
            .product_banner_img {
                height: 125px;
            } 
            .xlg-margin {
                margin-bottom: 25px;
            } 
            .carousel-container .carousel-title {
                margin-bottom: 77px;
            }
            .product-add-btn, .product-view-btn {
                padding: 4px 5px;
                font-size: 9px;
            }
            .add-fav {
                padding-right: 3px;
            }
            .profile_on_ad_overview {
                width: 45px !important;
                height: 45px !important;
                top: 86%;
                left: 10%;
            }
        }
        .btn-default:hover{
            color: #fff;
            background-color: #004fb1;
            border-color: #004fb1;
        }
        .product-single-meta p {
            margin-bottom: 10px;
        }
    </style>

</head>
<input type="hidden" id="site_url_path_for_external_js" value="<?php echo site_url(); ?>">
<body>
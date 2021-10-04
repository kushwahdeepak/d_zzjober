<!DOCTYPE html>

<html lang="en" class="no-js">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <base href="<?php echo base_url(); ?>"/>

    <link rel="icon" href="<?php echo base_url('assets/favicon.png'); ?>" type="image/png" sizes="16x16">

    <title>ZZjober</title>

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"

            integrity="sha256-VAvG3sHdS5LqTT+5A/aeq/bZGa/Uj04xKxY8KM/w9EE=" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/css/emoji.css" rel="stylesheet">
    
    <style>

         @media only screen and (max-width : 540px) 
            {
                .chat-sidebar
                {
                    display: none !important;
                }
                
                .chat-popup
                {
                    display: none !important;
                }
            }
            
            body
            {
                background-color: #e9eaed;
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
            
            .chat-sidebar
            {
                width: 200px;
                position: fixed;
                height: 100%;
                right: 0px;
                top: 0px;
                padding-top: 10px;
                padding-bottom: 10px;
                border: 1px solid rgba(29, 49, 91, .3);
            }
            
            .sidebar-name 
            {
                padding-left: 10px;
                padding-right: 10px;
                margin-bottom: 4px;
                font-size: 12px;
            }
            
            .sidebar-name span
            {
                padding-left: 5px;
            }
            
            .sidebar-name a
            {
                display: block;
                height: 100%;
                text-decoration: none;
                color: inherit;
            }
            
            .sidebar-name:hover
            {
                background-color:#e1e2e5;
            }
            
            .sidebar-name img
            {
                width: 32px;
                height: 32px;
                vertical-align:middle;
            }
            
            .popup-box
            {
                display: none;
                position: fixed;
                bottom: 0px;
                right: 220px;
                height: 285px;
                background-color: rgb(237, 239, 244);
                width: 300px;
                border: 1px solid rgba(29, 49, 91, .3);
                z-index: 9;
            }
            
            .popup-box .popup-head
            {
                background-color: #6d84b4;
                padding: 5px;
                color: white;
                font-weight: bold;
                font-size: 14px;
                clear: both;
            }
            
            .popup-box .popup-head .popup-head-left
            {
                float: left;
            }
            
            .popup-box .popup-head .popup-head-right
            {
                float: right;
                opacity: 0.5;
            }
            
            .popup-box .popup-head .popup-head-right a
            {
                text-decoration: none;
                color: inherit;
            }
            
            .popup-box .popup-messages
            {
                height: 100%;
                overflow-y: scroll;
                height: 200px;
            }
            .popup-box .popup-messages .loadMore{
                color: #999;
                text-align: center;
                margin: 0 auto;
                display: block;
                font-size:12px;
            }
            .popup-box .popup-footer{
                position: absolute;
                bottom: 0px;
                width: 100%;
            }
            .popup-box .popup-footer #sendmessage{
                width: 100%;
                padding: 0px;
                margin: 0px;
            }
            .sent{
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
                word-wrap: break-word;
            }
            .received{
                list-style: none;
                width: 50%;
                float: left;
                padding: 5px 10px;
                border: 1px solid #ccc;
                border-radius: 10px;
                margin: 4px 0px;
                display: block;
                clear: both;
                word-wrap: break-word;
            }
            .blocked{
                width: 100%;
                display: block;
                list-style: none;
             }
            
    </style>


    <?php

        /* getting this meta data from karyon_config.php file which is under application > config folder */

        foreach ($meta_data as $name => $content) {

            if (!empty($content))

                echo "<meta name='$name' content='$content'>";

        }



        /* getting this stylesheets from karyon_config.php file which is under application > config folder */

        foreach ($stylesheets as $media => $files) {

            foreach ($files as $file) {

                echo "<link href='$file' rel='stylesheet'>";

            }

        }



        /* getting this scripts from karyon_config.php file which is under application > config folder */

        foreach ($scripts['head'] as $file) {

            echo "<script src='$file'></script>";

        }

    ?>



    <style type="text/css">

        .modal-dialog {

            width: 760px;

            margin: 30px auto;

        }



        .service-red {

            background-color: #D8534F;

            border-color: #D8534F;

        }



        .service-green {

            background-color: #049600;

            border-color: #049600;

        }



        .service-status-icon {

            border: 1px solid;

            color: #fff;

            text-align: center;

            padding-top: 3px;

            padding-left: 10px;

            padding-right: 10px;

            padding-bottom: 3px;

            font-size: 12px;

        }



        .label {

            font-size: 85%;

        }



        .error {

            color: red;

        }

    </style>



    <input type="hidden" id="site_url_path_for_external_js" value="<?php echo site_url(); ?>">

</head>


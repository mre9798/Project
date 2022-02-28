<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="zxx">

    <head>
        <title>MediHelp</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keywords"
              content="Medick Responsive web template, Bootstrap Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
      
        <link href="//fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap"
              rel="stylesheet">
        <!-- Template CSS -->
        <link rel="stylesheet" href="assets/css/style-starter.css">
        <style>
            #customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #514A9D;
                color: white;
            }
        </style>
        <style>

            /*the container must be positioned relative:*/
            .custom-select1 {

                position: relative;
                font-family: Arial;
            }

            .custom-select1 select {

                display: none; /*hide original SELECT element:*/
            }

            .select-selected {
                border-radius: 8px;
                background-color: #BD1F14;
            }

            /*style the arrow inside the select element:*/
            .select-selected:after {
                border-radius: 8px;
                position: absolute;
                content: "";
                top: 14px;
                right: 10px;
                width: 0;
                height: 0;
                border: 6px solid transparent;
                border-color: #fff transparent transparent transparent;
            }

            /*point the arrow upwards when the select box is open (active):*/
            .select-selected.select-arrow-active:after {

                border-color: transparent transparent #fff transparent;
                top: 7px;
            }

            /*style the items (options), including the selected item:*/
            .select-items div,.select-selected {

                color: #ffffff;
                padding: 8px 16px;
                border: 1px solid transparent;
                border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
                cursor: pointer;
                user-select: none;
            }

            /*style items (options):*/
            .select-items {
                border-radius: 8px;
                position: absolute;
                background-color: #F54748;
                top: 100%;
                left: 0;
                right: 0;
                z-index: 99;
            }

            /*hide the items when the select box is closed:*/
            .select-hide {
                display: none;
            }

            .select-items div:hover, .same-as-selected {
                background-color: rgba(0, 0, 0, 0.1);
            }
            /* The file upload */
            .file-upload-wrapper{
                position:relative;
                width:100%;
                height:100px;
                cursor: pointer;
            }
            .file-upload-wrapper::after{
                content:attr(data-text);
                font-size: 18px;
                position:absolute;
                top:0;
                left:0;
                background:#fff;
                padding:5px 15px;
                display: block;
                width:calc(100% - 40px);
                pointer-events:none;
                z-index: 20;
                height:40px;
                line-height: 40px;
                color:#999;
                border-radius: 5px 10px 10px 5px;
                font-weight: 300;
            }
            .file-upload-wrapper::before{
                content:"Upload";
                position:absolute;
                top:0;
                right:0;
                display: inline-block;
                height:40px;
                background: -webkit-linear-gradient(to right, #24C6DC, #514A9D);
                background: linear-gradient(to right, #24C6DC, #514A9D);
                color:#fff;
                font-weight: 700;
                z-index: 25;
                font-size: 16px;
                line-height: 50px;
                padding:0 15px;
                text-transform: uppercase;
                pointer-events: none;
                border-radius: 0 5px 5px 0;
                transition: 0.5s ease-in-out;
            }
            .file-upload-wrapper:hover::before{
                background: -webkit-linear-gradient(to right, #514A9D, #24C6DC);
                background: linear-gradient(to right, #514A9D, #24C6DC);
            }
            .file-upload-wrapper input{
                opacity: 0;
                position:absolute;
                top:0;
                right:0;
                bottom:0;
                left:0;
                z-index: 99;
                height:40px;
                margin:0;
                padding:0;
                display:block;
                cursor: pointer;
                width:100%;
            }

            /* The container */
            .container1 {
                display: block;
                position: relative;
                padding-left: 35px;
                margin-bottom: 12px;
                cursor: pointer;
                font-size: 22px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            /* Hide the browser's default radio button */
            .container1 input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
            }

            /* Create a custom radio button */
            .checkmark {
                position: absolute;
                top: 0;
                left: 0;
                height: 25px;
                width: 25px;
                background-color: #eee;
                border-radius: 50%;
            }

            /* On mouse-over, add a grey background color */
            .container1:hover input ~ .checkmark {
                background-color: #ccc;
            }

            /* When the radio button is checked, add a blue background */
            .container1 input:checked ~ .checkmark {
                background-color: #f5473f;
            }

            /* Create the indicator (the dot/circle - hidden when not checked) */
            .checkmark:after {
                content: "";
                position: absolute;
                display: none;
            }

            /* Show the indicator (dot/circle) when checked */
            .container1 input:checked ~ .checkmark:after {
                display: block;
            }

            /* Style the indicator (dot/circle) */
            .container1 .checkmark:after {
                top: 9px;
                left: 9px;
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: white;
            }


        </style>
    </head>

    <body>
        <!--header-->
        <div class="header-w3l">
            <!-- header -->
            <header id="site-header" class="fixed-top">
                <div class="container">
                    <nav class="navbar navbar-expand-lg stroke">
                        <a class="navbar-brand" href="index.html">
                            MED<span class="sub-logo">i</span>HE<span class="sub-logo">l</span>P
                        </a>
                        <!-- if logo is image enable this   
                          <a class="navbar-brand" href="#index.html">
                              <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                          </a> -->
                        <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                                data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                            <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                            </span>
                        </button>

                        <?php
                        include './Head.php';
                        ?>

                        <!-- toggle switch for light and dark theme -->
                        <div class="mobile-position">
                            <nav class="navigation">
                                <div class="theme-switch-wrapper">
                                    <label class="theme-switch" for="checkbox">
                                        <input type="checkbox" id="checkbox">
                                        <div class="mode-container">
                                            <i class="gg-sun"></i>
                                            <i class="gg-moon"></i>
                                        </div>
                                    </label>
                                </div>
                            </nav>
                        </div>
                        <!-- //toggle switch for light and dark theme -->
                    </nav>
                </div>
            </header>
        </div>
        <!-- //header -->
        <!--/breadcrumb-bg-->
        <div class="breadcrumb-bg py-5  w3l-inner-page-breadcrumb">

        </div>

        <!--//breadcrumb-bg-->
        <!-- banner bottom shape -->
        <div class="position-relative">
            <div class="shape overflow-hidden">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>

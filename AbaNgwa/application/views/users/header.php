<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?=$title; ?> </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=base_url()?>assest2/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>assest2/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url()?>assest2/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url()?>assest2/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?=base_url()?>assest2/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?=base_url()?>assest2/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?=base_url()?>assest2/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=base_url()?>assest2/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?=base_url()?>assest2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Chosen CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
    <!-- jQuery 2.2.0 -->
    <script src="<?=base_url()?>assest2/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?=base_url()?>assest2/plugins/timedropper/timedropper.min.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>assest2/plugins/datedropper/datedropper.min.css" type="text/css" />
    <link href="<?=base_url()?>assest2/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">

    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="<?=base_url()?>assets/css/animate.css">


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition  sidebar-mini">
<div class="wrapper">

    <header class="main-header navbar-default navbar-fixed-top bg-green" >
        <!-- Logo -->
        <a href="~/Admin" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini" title="" style="color: #ffffff !important;"> Nwa<b>Aba</b> </span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg" title="" style="color: #ffffff !important;">Nwa<b>Aba </b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" style="color: #ffffff !important;" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            foreach($logo as $mylogo):

                                if(!$mylogo==NULL){
                                    ?>
                                    <img src="<?=base_url()?>assets/uploads/profile/<?=$mylogo['Logo'];?>" class="user-image" />
                                    <?php
                                }else { ?>
                                    <img src="<?=base_url()?>assets/uploads/profile/defaultlogo.png" class="user-image" alt="User Image">


                                    <?php
                                }
                            endforeach;
                            ?>                            <span class="hidden-xs"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <?php
                                foreach($logo as $mylogo):

                                    if(!$mylogo==NULL){
                                        ?>
                                        <img src="<?=base_url()?>assets/uploads/profile/<?=$mylogo['Logo'];?>" class="user-image" />
                                        <?php
                                    }else { ?>
                                        <img src="<?=base_url()?>assets/uploads/defaultlogo.png" class="user-image" alt="User Image">


                                        <?php
                                    }
                                endforeach;
                                ?>                                      <p  style="color: #bd4147 !important;" >
                                    <?=$companyName?>
                                    <small style="color: #bd4147 !important;">Member since <?=$signUpDate?></small>
                                    <a href="#" style="color: #bd4147 !important;"><small>Preview Your page</small></a>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?=base_url()?>/index.php/User/Logout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar" style="background-color: #000000 !important; color: #47ffda !important; margin-top: 50px !important;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <?php
                    foreach($logo as $mylogo):

                        if(!$mylogo==NULL){
                            ?>
                            <img src="<?=base_url()?>assets/uploads/profile/<?=$mylogo['Logo'];?>" class="img-circle" />
                            <?php
                        }else { ?>
                            <img src="<?=base_url()?>assets/uploads/profile/defaultlogo.png" class="user-image" alt="User Image">


                            <?php
                        }
                    endforeach;
                    ?>                      </div>
                <div class="pull-left info">
                       <h5><?=$companyName?></h5>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">


                <li class="" >
                    <a href="Index" style="color: #ffffff !important;">
                        <i class="fa fa-briefcase"></i>
                        <span style="color: #ffffff !important;">Dashboard</span>
                       <!-- <i class="fa fa-circle-o pull-right"></i>-->
                    </a>

                </li>
                <li class="">
                    <a href="<?=base_url()?>index.php/User/ProfilePhoto" style="color: #ffffff !important;">
                        <i class="fa fa-upload"></i>
                        <span style="color: #ffffff !important;">Profile Photo </span>

                    </a>

                </li>


                <li class="treeview">
                    <a href="#" style="color: #ffffff !important;">
                        <i class="fa fa-home"></i>
                        <span style="color: #ffffff !important;">Properties</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url()?>index.php/User/AddProperty" style="color: #ffffff !important;"> <i class="fa fa-circle-o text-red"></i>Add</a></li>
                        <li><a href="<?=base_url()?>index.php/User/ManageProperty" style="color: #ffffff !important;"> <i class="fa fa-circle-o text-red"></i>Manage</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#" style="color: #ffffff !important;">
                        <i class="fa fa-university"></i>
                        <span style="color: #ffffff !important;">Company</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url()?>index.php/User/AddCompany" style="color: #ffffff !important;"> <i class="fa fa-circle-o text-red"></i>Add</a></li>
                        <li><a href="<?=base_url()?>index.php/User/ManageCompany" style="color: #ffffff !important;"> <i class="fa fa-circle-o text-red"></i>Manage</a></li>

                    </ul>
                </li>


                <li class="treeview">
                    <a href="#" style="color: #ffffff !important;">
                        <i class="fa fa-cube"></i>
                        <span style="color: #ffffff !important;">Products</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url()?>index.php/User/Products" style="color: #ffffff !important;"> <i class="fa fa-circle-o text-red"></i>Add</a></li>
                        <li><a href="<?=base_url()?>index.php/User/ManageProducts" style="color: #ffffff !important;"> <i class="fa fa-circle-o text-red"></i>Manage</a></li>

                    </ul>
                </li>


                <li class="treeview">
                    <a href="#" style="color: #ffffff !important;">
                        <i class="fa fa-paste"></i>
                        <span style="color: #ffffff !important;">Jobs</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url()?>index.php/User/AddJob" style="color: #ffffff !important;"> <i class="fa fa-circle-o text-red"></i>Add</a></li>
                        <li><a href="<?=base_url()?>index.php/User/ManageJobs" style="color: #ffffff !important;"> <i class="fa fa-circle-o text-red"></i>Manage</a></li>

                    </ul>
                </li>


                <!--<li class="treeview">
                    <a href="#" style="color: #ffffff !important;">
                        <i class="fa fa-square-o"></i>
                        <span style="color: #ffffff !important;">News</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url()?>index.php/User/AddNews" style="color: #ffffff !important;"> <i class="fa fa-circle-o text-red"></i>Add</a></li>
                        <li><a href="<?=base_url()?>index.php/User/ManageNews" style="color: #ffffff !important;"> <i class="fa fa-circle-o text-red"></i>Manage</a></li>

                    </ul>
                </li>-->


<!--
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Bookings</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="~/User/CompanyBooking/"> <i class="fa fa-bookmark-o text-red"></i>View Bookings</a></li>
                        <li><a href="~/User/CompanyBooking/"> <i class="fa fa-bookmark-o text-red"></i>Manage Bookings</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>invoices</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="~/User/CompanyBooking/ApplicationInvoices"> <i class="fa fa-bookmark-o text-red"></i>Application Invoice</a></li>
                        <li><a href="~/User/CompanyBooking/PryBookInvoices"> <i class="fa fa-bookmark-o text-red"></i>Pry Booking Invoice</a></li>
                        <li><a href="~/User/CompanyBooking/LeaseBookInvoice"> <i class="fa fa-bookmark-o text-red"></i>Lease Booking Invoice</a></li>
                        <li><a href="~/User/CompanyBooking/LeaseBookInvoice"> <i class="fa fa-bookmark-o text-red"></i>CPR Invoice</a></li>
                    </ul>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart"></i>
                        <span>Reports</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="~/User/Report/Criteria"> <i class="fa fa-circle-o text-red"></i>Qualifications</a></li>
                        <li><a href="~/User/Report/DynamicReport"> <i class="fa fa-circle-o text-red"></i>Dynamic Report</a></li>
                        <li><a href="~/User/Report/TechnicalBids"> <i class="fa fa-circle-o text-red"></i>Technical Bids</a></li>
                    </ul>
                </li>






                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Fields</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="~/User/Fields/Create"> <i class="fa fa-circle-o text-red"></i>Add</a></li>
                        <li><a href="~/User/Fields"> <i class="fa fa-circle-o text-red"></i>Manage</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i>
                        <span>Settings</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="~/User/User/Experiences"> <i class="fa fa-circle-o text-red"></i>Experiences</a></li>

                        <li><a href="~/User/Booking"> <i class="fa fa-circle-o text-red"></i>Manage Bookings</a></li>
                        @*<li><a href="~/@SystemGlobal.GetName()/User/Booking"> <i class="fa fa-circle-o text-red"></i>Manage Bookings</a></li>*@

                        <li class="treeview">
                            <a href="#"> <i class="fa fa-circle-o text-red"></i>Book to pry</a>
                            <ul class="treeview-menu">
                                <li><a href="~/User/Booking/BookPryDate"> <i class="fa fa-circle-o text-red"></i>Booking Date</a></li>
                                <li><a href="~/User/Booking/BookPry"> <i class="fa fa-circle-o text-red"></i>Booking Time</a></li>

                            </ul>
                        </li>

                        <li><a href="~/User/Booking/BookPresentation"> <i class="fa fa-circle-o text-red"></i>Book for presentation</a></li>

                    </ul>
                </li>

                <li>
                    <a href="~/Activity/Log"><i class="fa fa-circle-o text-red"></i> <span>Activities</span></a>
                </li>
-->


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside><?php
/**
 * Created by PhpStorm.
 * User: franc_001
 * Date: 9/26/2017
 * Time: 10:49 PM
 */
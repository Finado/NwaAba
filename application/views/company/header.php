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
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition  sidebar-mini">
<div class="wrapper">

    <header class="main-header" style="background: violet !important;">
        <!-- Logo -->
        <a href="~/Admin" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini" title="" style="color: #ffffff !important;"> Ikota<b> Shops</b> </span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg" title="" style="color: #ffffff !important;">Ikota<b> Shops </b></span>
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
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="<?=base_url()?>assest2/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="<?=base_url()?>assest2/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                AdminLTE Design Team
                                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="assest2/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Developers
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="assest2/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Sales Department
                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="assest2/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Reviewers
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">

                            <li class="header">You have  notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                            page and may cause design problems
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li>
                                        <!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Create a nice theme
                                                <small class="pull-right">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li>
                                        <!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Some task I need to do
                                                <small class="pull-right">60%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li>
                                        <!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Make beautiful transitions
                                                <small class="pull-right">80%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
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
                                        <img src="<?=base_url()?>assets/uploads/profile/defaultlogo.png" class="user-image" alt="User Image">


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
                                    <a href="<?=base_url()?>/index.php/Company/Logout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar" style="background-color: #bd4147 !important; color: #ffffff !important;">
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
                        <i class="fa fa-circle-o pull-right"></i>
                    </a>

                </li>

                <li class="treeview">
                    <a href="#" style="color: #ffffff !important;">
                        <i class="fa fa-info-circle"></i>
                        <span style="color: #ffffff !important;">Basic Info</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url()?>index.php/Company/BasicInfo" style="color: #ffffff !important;"> <i class="fa fa-circle-o text-red"></i>Add</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#" style="color: #ffffff !important;">
                        <i class="fa fa-square-o"></i>
                        <span style="color: #ffffff !important;">Products</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url()?>index.php/Company/Products" style="color: #ffffff !important;"> <i class="fa fa-circle-o text-red"></i>Manage</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#" style="color: #ffffff !important;">
                        <i class="fa fa-book"></i>
                        <span style="color: #ffffff !important;">Orders</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url()?>index.php/Company/Orders" style="color: #ffffff !important;"> <i class="fa fa-circle-o text-red"></i>Manage</a></li>

                    </ul>
                </li>


                <li class="">
                    <a href="<?=base_url()?>index.php/Company/CompanyLogo" style="color: #ffffff !important;">
                        <i class="fa fa-upload"></i>
                        <span style="color: #ffffff !important;">Upload Logo</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>

                </li>


<!--
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Bookings</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="~/Admin/CompanyBooking/"> <i class="fa fa-bookmark-o text-red"></i>View Bookings</a></li>
                        <li><a href="~/Admin/CompanyBooking/"> <i class="fa fa-bookmark-o text-red"></i>Manage Bookings</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>invoices</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="~/Admin/CompanyBooking/ApplicationInvoices"> <i class="fa fa-bookmark-o text-red"></i>Application Invoice</a></li>
                        <li><a href="~/Admin/CompanyBooking/PryBookInvoices"> <i class="fa fa-bookmark-o text-red"></i>Pry Booking Invoice</a></li>
                        <li><a href="~/Admin/CompanyBooking/LeaseBookInvoice"> <i class="fa fa-bookmark-o text-red"></i>Lease Booking Invoice</a></li>
                        <li><a href="~/Admin/CompanyBooking/LeaseBookInvoice"> <i class="fa fa-bookmark-o text-red"></i>CPR Invoice</a></li>
                    </ul>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart"></i>
                        <span>Reports</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="~/Admin/Report/Criteria"> <i class="fa fa-circle-o text-red"></i>Qualifications</a></li>
                        <li><a href="~/Admin/Report/DynamicReport"> <i class="fa fa-circle-o text-red"></i>Dynamic Report</a></li>
                        <li><a href="~/Admin/Report/TechnicalBids"> <i class="fa fa-circle-o text-red"></i>Technical Bids</a></li>
                    </ul>
                </li>






                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Fields</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="~/Admin/Fields/Create"> <i class="fa fa-circle-o text-red"></i>Add</a></li>
                        <li><a href="~/Admin/Fields"> <i class="fa fa-circle-o text-red"></i>Manage</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i>
                        <span>Settings</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="~/Admin/Admin/Experiences"> <i class="fa fa-circle-o text-red"></i>Experiences</a></li>

                        <li><a href="~/Admin/Booking"> <i class="fa fa-circle-o text-red"></i>Manage Bookings</a></li>
                        @*<li><a href="~/@SystemGlobal.GetName()/Admin/Booking"> <i class="fa fa-circle-o text-red"></i>Manage Bookings</a></li>*@

                        <li class="treeview">
                            <a href="#"> <i class="fa fa-circle-o text-red"></i>Book to pry</a>
                            <ul class="treeview-menu">
                                <li><a href="~/Admin/Booking/BookPryDate"> <i class="fa fa-circle-o text-red"></i>Booking Date</a></li>
                                <li><a href="~/Admin/Booking/BookPry"> <i class="fa fa-circle-o text-red"></i>Booking Time</a></li>

                            </ul>
                        </li>

                        <li><a href="~/Admin/Booking/BookPresentation"> <i class="fa fa-circle-o text-red"></i>Book for presentation</a></li>

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
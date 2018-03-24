<!DOCTYPE html>
    <!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
    <head>

        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <title> <?=$title; ?> </title>

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS
        ================================================== -->
        <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/colors/green.css" id="colors">
        <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="<?=base_url()?>assets/css/animate.css">


        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>


    </head>

    <body>
    <div id="wrapper">


        <!-- Header
        ================================================== -->
        <header class="transparent sticky-header full-width">
            <div class="container">
                <div class="sixteen columns">

                    <!-- Logo -->
                    <div id="logo">
                        <h1><a href="<?=base_url()?>index.php/Home/Index"><img src="<?=base_url()?>assets/images/nwaabalogo.png" alt="NwaAba" /></a></h1>
                    </div>

                    <!-- Menu -->
                    <nav id="navigation" class="menu">
                        <ul id="responsive">

                            <li><a href="<?=base_url()?>index.php/Home/Index" id="current">Home</a>
                                <!--<ul>
                                    <li><a href="index.html">Home #1</a></li>
                                    <li><a href="index-2.html">Home #2</a></li>
                                    <li><a href="index-3.html">Home #3</a></li>
                                    <li><a href="index-4.html">Home #4</a></li>
                                    <li><a href="index-5.html">Home #5</a></li>
                                </ul>-->
                            </li>

                            <li><a href="<?=base_url()?>index.php/Home/Companies" id="com">Companies</a>
                               <!-- <ul>
                                    <li><a href="job-page.html">Job Page</a></li>
                                    <li><a href="job-page-alt.html">Job Page Alternative</a></li>
                                    <li><a href="resume-page.html">Resume Page</a></li>
                                    <li><a href="shortcodes.html">Shortcodes</a></li>
                                    <li><a href="icons.html">Icons</a></li>
                                    <li><a href="pricing-tables.html">Pricing Tables</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>-->
                            </li>

                            <li><a href="<?=base_url()?>index.php/Home/Products" id="pro">Products</a>
                                <!--<ul>
                                    <li><a href="browse-jobs.html">Browse Jobs</a></li>
                                    <li><a href="browse-categories.html">Browse Categories</a></li>
                                    <li><a href="add-resume.html">Add Resume</a></li>
                                    <li><a href="manage-resumes.html">Manage Resumes</a></li>
                                    <li><a href="job-alerts.html">Job Alerts</a></li>
                                </ul>-->
                            </li>

                            <li><a href="<?=base_url()?>index.php/Home/Jobs" id="job">Jobs</a>
                                <!--<ul>
                                    <li><a href="add-job.html">Add Job</a></li>
                                    <li><a href="manage-jobs.html">Manage Jobs</a></li>
                                    <li><a href="manage-applications.html">Manage Applications</a></li>
                                    <li><a href="browse-resumes.html">Browse Resumes</a></li>
                                </ul>-->
                            </li>

                            <li><a href="<?=base_url()?>index.php/Home/Properties" id="prop">Properties</a></li>

                           <!-- <li><a href="<?=base_url()?>index.php/Home/News" id="news">News</a></li> -->
                        </ul>


                        <ul class="float-right">
                            

                            <li><a href="<?=base_url()?>index.php/Account/Register" class="active" ><i
                            # class="fa
                            fa-user"></i> Register</a></li>

                            <li><a href="<?=base_url()?>index.php/Account/Login" class="active" id="current"><i
                                        # class="fa
                            fa-lock"></i> Login</a></li>
                            <!-- <li><a href="#"  class="active" data-toggle="modal" data-target="#reg"><i class="fa
                            fa-user"></i> Sign Up</a></li>
                             <li><a href="#" data-toggle="modal" data-target="#login" id="current"><i class="fa
                             fa-lock"></i> Log In</a></li>-->
                        </ul>

                    </nav>

                    <!-- Navigation -->
                    <div id="mobile-navigation">
                        <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
                    </div>

                </div>
            </div>
        </header>
        <div class="clearfix"></div>


        <!-- Banner
        ================================================== -->
        <div id="banner" class="with-transparent-header parallax background" style="background-image: url(<?=base_url()?>assets/images/banner.jpg)" data-img-width="2000" data-img-height="1330" data-diff="300">
            <div class="container">
                <div class="sixteen columns">

                    <div class="search-container">

                        <!-- Form -->
                        <form method="post" action="<?=base_url()?>index.php/home/search">
                        <h2>Find Everything in Aba</h2>
                            <div class="six columns">
                                <!-- Select -->
                                <select placeholder="Filter by status" class="chosen-select-no-single" name="category" required>
                                    <option value=""></option>
                                    <option value="companies">Company</option>
                                    <option value="properties">Property</option>
                                    <option value="jobs">Job</option>


                                </select>
                                <div class="margin-bottom-15"></div>
                            </div>

                            <div class="six columns">
                                <!-- Select -->
                                <input type="text" class="six columns ico-02" name="keyword" placeholder="Search by Location, Title, Company Name" style="height: 50px !important;" required>
                                <div class="margin-bottom-35"></div>
                            </div>
                        <button style="height: 50px !important;" type="submit" name="search"><i class="fa fa-search"></i></button>
                        </form>

                        <!-- Browse Jobs -->
                        <!--<div class="browse-jobs">
                            Browse job offers by <a href="browse-categories.html"> category</a> or <a href="#">location</a>
                        </div>-->

                        <!-- Announce -->
                        <!--<div class="announce">
                            We’ve over <strong>15 000</strong> job offers for you!
                        </div>-->

                    </div>

                </div>
            </div>
        </div>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 50px !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-plus-circle"></i> Jobs
            <small>Jobs Details </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Jobs Details</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row" id="addProduct">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-arrow-circle-o-down"></i>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>

                    <div class="box-body">


                        <div class="row">

                            <div class="col-md-6">
                                <div class="padding-left">

                                    <div class="container">

                                        <!-- Recent Jobs -->
                                        <div class="col-md-5">
                                            <div class="padding-right">

                                                <!-- Company Info -->
                                                <div class="company-info">
                                                    <img src="<?=base_url()?>assets/images/company-logo.png" alt="">
                                                    <div class="content">
                                                        <h4><?=$companyName;?></h4>
                                                        <span><a href="#"><i class="fa fa-link"></i> <?=$website;?></a></span>
                                                        <span><a href="#"><i class="fa fa-twitter"></i> <?=$appemail;?></a></span>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                    <p class="margin-reset">
                                                        <?=$tags;?>
                                                    </p>

                                                    <br>


                                                    <ul class="list-1">
                                                        <li>
                                                            <?=$description;?>
                                                        </li>

                                                    </ul>


                                                </div>

                                            </div>
                                        </div>


                                        <!-- Widgets -->
                                        <div class="five columns">

                                            <!-- Sort by -->
                                            <div class="widget">
                                                <h4>Job Overview</h4>

                                                <div class="job-overview">

                                                    <ul>
                                                        <li>
                                                            <i class="fa fa-map-marker"></i>
                                                            <div>
                                                                <strong>Location:</strong>
                                                                <span><?=$location?></span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-user"></i>
                                                            <div>
                                                                <strong>Job Title:</strong>
                                                                <span><?=$title?></span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>
                                                            <div>
                                                                <strong>Hours:</strong>
                                                                <span>40h / week</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-money"></i>
                                                            <div>
                                                                <strong>Rate:</strong>
                                                                <span>N20,000 - N35,000 / monthly</span>
                                                            </div>
                                                        </li>
                                                    </ul>

                                                    <a href="<?=base_url();?>index.php/Admin/Approve_Jobs/<?=$id;?>"
                                                       class="btn btn-success" title="Approve Property">Approve</a>



                                                </div>

                                            </div>

                                        </div>
                                        <!-- Widgets / End -->


                                    </div>

                                </div>


                            </div>


                        </div>

                    </div>

                </div>
            </section>

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


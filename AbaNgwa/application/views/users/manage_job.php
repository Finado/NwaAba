
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 50px !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-plus-circle"></i>My Jobs
            <small>Manage Jobs </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Jobs</li>
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


                        <?php
                        foreach($jobs as $job):
                            ?>

                            <div class="row wow fadeInDown" data-wow-offset="300">



                                <div class="col-md-6 wow fadeInDown">
                                    <div class="text-center">
                                        <i class="fa fa-5x fa-briefcase"></i>
                                    </div>

                                </div>



                                <div class="col-md-6 wow fadeInDown">

                                    <p><b>Title:</b> <?=$job['Title'];?></p>
                                    <p><b>Location:</b> <?=$job['Location'];?></p>
                                    <p><b>Job Type:</b>  <?=$job['JobType'];?></p>
                                    <p><b>Description:</b>  <?=$job['Description'];?></p>
                                    <p><b>Salary:</b>  <?=$job['salary'];?></p>
                                    <p><b>Job Tags:</b>  <?=$job['JobTags'];?></p>



                                    <p> <b>Status:</b> <?php
                                        $status = $job['Approved'];
                                        ?>

                                        <?php
                                        if( $status ==1){
                                            echo "<span class='btn btn-success'>" ."Approved" ."</span>";
                                        } else{
                                            echo  "<span class='btn btn-danger'>" ."Pending" ."</span>";
                                        }
                                        ?>  | <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a></p>


                                </div>
                            </div>

                            <hr>

                            <?php
                        endforeach;
                        ?>


                    </div>

                </div>
            </section>
            <!-- /.Left col -->


            <!-- right col (We are only adding the ID to make the widgets sortable)-->

            <!-- right col -->
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


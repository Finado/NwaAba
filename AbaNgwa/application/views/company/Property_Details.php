
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 50px !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-plus-circle"></i> Property
            <small>Property Details </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Property</li>
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


                                    <?php
                                    foreach($property as $pro):
                                        ?>



                                        <a href="#"><img src="<?=base_url()
                                            ?>assets/uploads/property/<?=$pro['Image'];?>" alt="" style="height: 400px !important; width: 600px
                !important;"></a>

                                        <ul class="list-1">

                                        </ul>
                                        <?php
                                    endforeach
                                    ?>

                                </div>


                            </div>


                            <div class="col-md-6">
                                <div class="padding-right">

                                    <h3 class="margin-bottom-15">Property Details</h3>
                                    <?php
                                    foreach($property as $pro):
                                        ?>
                                        <p class="margin-reset">
                                            <?=$pro['Name']?>
                                        </p>
                                        <small class="date">Location: <?=$pro['Location'];?></small>
                                        <strong><?=$pro['Date'];?></strong>
                                        <p>
                                            <?=$pro['Description']?>
                                        </p>
                                        <ul class="list-1">
                                            <li> Amount <?=$pro['Amount']?></li>
                                        </ul>
                                        <?php
                                    endforeach
                                    ?>


                                    <a href="<?=base_url();?>index.php/Admin/Approve_Property/<?=$pro['Id'];?>"
                                       class="btn btn-success" title="Approve Property">Approve</a>

                                </div>

                            </div>

                        </div>

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


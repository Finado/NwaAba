
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 50px !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-plus-circle"></i> Company
            <small>Manage Company </small>
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

                        <?php
                        foreach($pros as $pro):
                            ?>

                            <div class="row wow fadeInDown" data-wow-offset="300">



                                <div class="col-md-6 wow fadeInDown">

                                    <?php
                                    if($pro['Logo'] == 0){
                                        echo '<div class="text-center">
                        <i class="fa fa-5x fa-university"></i>
                    </div>';
                                    }else{
                                        ?>


                                    <a href="#"><img src="<?=base_url()?>assets/uploads/logo/<?=$pro['Logo'];?>"
                                                     class="img-thumbnail" alt="" style="height: 200px !important; width: 400px
                !important;"></a>

                                    <?php
                                    };
                                    ?>

                                </div>



                                <div class="col-md-6 wow fadeInDown">

                                    <p><b>Company Name:</b> <?=$pro['Name'];?></p>
                                    <p><b>Email:</b> <?=$pro['Email'];?></p>
                                    <p><b>Phone:</b>  <?=$pro['Phone'];?></p>
                                    <p><b>Address:</b>  <?=$pro['Address'];?></p>
                                    <p><b>Website:</b>  <?=$pro['Website'];?></p>



                                    <p> <b>Status:</b> <?php
                                        $status = $pro['Approved'];
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


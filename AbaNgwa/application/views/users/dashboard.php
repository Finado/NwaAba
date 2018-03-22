
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 50px !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6 wow fadeInDown">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?=count($products)?></h3>
                        <p><a href="#" style="color: #fff">Products</a></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" style="color: #fff" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6 wow fadeInDown">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?=count($jobs);?></h3>
                        <p><a href="#" style="color: #fff">Jobs</a></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-briefcase"></i>
                    </div>
                    <a href="#" style="color: #fff" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6 wow bounceInLeft">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?=count($properties);?></h3>
                        <p><a href="#" style="color: #fff">Properties</a></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-university"></i>
                    </div>
                    <a href="#" style="color: #fff" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6 wow bounceInRight">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?=count($com)?></h3>
                        <p>Company</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable wow fadeInDown">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-arrow-circle-o-down"></i>
                        <h3 class="box-title">Recent Product(s) you upload</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>

                    <div class="box-body" style="overflow-y: scroll; height: 240px">
                        <table class="table tables">
                            <thead>
                            <tr>

                                <th>Title</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($products as $product):
                            ?>

                            <tr>

                                <td><?=$product['Title'];?></td>
                                <td>
                                    <?=$product['Category'];?>
                                </td>
                                <td><?=$product['Description'];?></td>
                                <td><img src="<?=base_url()?>assets/uploads/<?=$product['Image'];?>" class="img-thumbnail img-responsive" width="100px" height="100px"/></td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable wow fadeInDown">
                <!-- quick email widget -->
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-plus-square-o"></i>
                        <h3 class="box-title"> Recent Property you upload</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>

                    <div class="box-body" style="overflow-y: scroll; height: 240px">
                        <table class="table tables">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Location</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($properties as $pro):
                                ?>

                                <tr>

                                    <td><?=$pro['Name'];?></td>
                                    <?php
                                    $cat = $pro['Category'];
                                    ?>
                                    <td>
                                        <?php
                                        if($cat ==1){
                                            echo 'For Sale';
                                        }else{
                                            echo 'For Rent';
                                        }
                                        ?>

                                    </td>
                                    <td><?=$pro['Location'];?></td>
                                    <td><img src="<?=base_url()?>assets/uploads/property/<?=$pro['Image'];?>"
                                             class="img-thumbnail img-responsive" width="100px" height="100px"/></td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="box-footer clearfix">

                    </div>
                </div>
            </section>
            <!-- right col -->


        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
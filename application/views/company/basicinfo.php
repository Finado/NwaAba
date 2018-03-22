
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Basic Info
            <small>Manage Basic Info</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Basic Info</li>
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
                        if(isset($msg)){
                            echo $msg;
                        }
                        ?>
                        <form method="post" action="" >
                            <div class="form-group">
                                <label>Company Address:</label>
                                <textarea  name="address" class="form-control"  placeholder="Company Full Address"></textarea>
                            </div>


                            <div class="form-group">
                                <label>Services:</label>
                                <textarea  name="services" class="form-control" placeholder="List your services"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Website:</label>
                                <input type="text" class="form-control" placeholder="Optional" name="website">
                            </div>

                            <div class="form-group">
                               <input type="submit" name="addbasic" class="btn btn-success" value="Save" />
                            </div>
                        </form>
                    </div>

                </div>
            </section>
            <!-- /.Left col -->


            <!-- right col (We are only adding the ID to make the widgets sortable)-->

            <!-- right col -->
     </div>
        <!-- Main row -->
        <?php
        foreach($logo as $mylogo):

            if(!$mylogo==NULL){
                ?>
                <div class="row" id="displayProduct">
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
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th> Address</th>
                                        <th>Services</th>
                                        <th>Wesite</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?=$mylogo['CompanyAddress'] ?></td>
                                        <td><?=$mylogo['Services'] ?></td>
                                        <td><?=$mylogo['Website'] ?></td>
                                        <td><h3 class="box-title"><button class="btn btn-success" id="showAddProducts">Edit</button></h3></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </section>
                    <!-- /.Left col -->



                </div>

                <?php
            }else { ?>

                <?php echo ''; ?>

                <?php
            }
        endforeach;
        ?>



        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


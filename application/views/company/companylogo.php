
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Company Logo
            <small>Upload Logo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Company Logo</li>
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
                        <div class="col-md-3"></div>
                        <form method="post" action="" enctype="multipart/form-data" class="col-md-6">

                            <div class="form-group">
                                <label>Company Logo:</label>
                                <input type="file" class="form-control success" name="image">
                            </div>

                            <div class="form-group">
                               <input type="submit" name="adder" class="btn btn-success text-center" value="Upload" />
                            </div>
                        </form>
                        <div class="col-md-3"></div>
                    </div>

                </div>
            </section>
            <!-- /.Left col -->


            <!-- right col (We are only adding the ID to make the widgets sortable)-->

            <!-- right col -->
     </div>
        <!-- Main row -->
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
                        <div class="col-md-3"></div>

                        <div class="col-md-6">
                        <?php
                        foreach($logo as $mylogo):

                            if(!$mylogo==NULL){
                        ?>
                          <img src="<?=base_url()?>assets/uploads/profile/<?=$mylogo['Logo'];?>" class="img-thumbnail" />
                        <?php
                            }else { ?>
                                <img src="<?=base_url()?>assets/uploads/profile/defaultlogo.png" class="user-image" alt="User Image">


                                <?php
                            }
                            endforeach;
                        ?>

                        </div>


                        <div class="col-md-3"></div>
                    </div>

                </div>
            </section>
            <!-- /.Left col -->



        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

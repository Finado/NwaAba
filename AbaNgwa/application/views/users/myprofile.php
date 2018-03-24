
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 50px !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-plus-circle"></i> Profile
            <small>My Profile </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">My Profile</li>
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
                        foreach($profile as $pro):
                            ?>

                            <div class="row wow fadeInDown" data-wow-offset="300">



                                <div class="col-md-6 wow fadeInDown">

                                    <?php
                                    if(empty($pro['Logo'])){
                                        echo '<div class="text-center">
                        <i class="fa fa-5x fa-university"></i>
                    </div>';
                                    }else{
                                        ?>


                                    <a href="#"><img src="<?=base_url()?>assets/uploads/profile/<?=$pro['Logo'];?>"
                                                     class="img-circle" alt="" style="height: 200px !important; width:
                                                     200px
                !important;"></a>

                                    <?php
                                    };
                                    ?>

                                </div>



                                <div class="col-md-6 wow fadeInDown">

                                    <p><b>Name:</b> <?=$pro['CompanyName'];?></p>
                                    <p><b>Email:</b> <?=$pro['Email'];?></p>
                                    <p><b>Phone:</b>  <?=$pro['Phone'];?></p>
                                    <p><b>SignUp Date:</b>  <?=$pro['SignUpDate'];?></p>


                                    <hr/>
                                    <h4>Change your Password</h4>

                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input type="text" class="search-field"  name="emails"
                                                   placeholder="Password" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="search-field"   name="cpasswords"
                                                   placeholder="Confirm Password">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="changepass" class="button big margin-top-5"
                                                    style="background-color:
                            green !important; color: #ffffff !important;">Save</button>
                                        </div>
                                    </form>






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


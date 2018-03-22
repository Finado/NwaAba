
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 50px !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-plus-circle"></i> Users
            <small>Manage users </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
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

                        <table class="table tables">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>SignupDate</th>
                                <th>LastLogin</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php
                            foreach($users as $user):
                                ?>

                                <tr>
                                    <td><?=$user['Id'];?></td>
                                    <td><?=$user['CompanyName'];?></td>
                                    <td><?=$user['Email'];?></td>
                                    <td><?=$user['Phone'];?></td>
                                    <td><?=$user['SignUpDate'];?></td>
                                    <td><?=$user['LastLogin'];?></td>

                                    <td>
                                        <a href="<?=base_url();?>index.php/Admin/User_Edit/<?=$user['Id'];?>"
                                           class="btn btn-success" title="Edit Job"><i class="fa fa-pencil"></i></a> |

                                        <a href="<?=base_url();?>index.php/Admin/User_Details/<?=$user['Id'];?>"
                                           class="btn btn-success" title="View User Details"><i class="fa
                                           fa-eye"></i></a> |



                                        <a href="<?=base_url();?>index.php/Admin/Suspend_User/<?=$user['Id'];?>"
                                           class="btn btn-success" title="Suspend this User"><i class="fa
                                           fa-clipboard"></i></a> |

                                        <a href="<?=base_url();?>index.php/Admin/Delete_User/<?=$user['Id'];?>"
                                           class="btn btn-danger" title="Delete this User"><i class="fa
                                           fa-trash"></i></a>
                                    </td>
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

            <!-- right col -->
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


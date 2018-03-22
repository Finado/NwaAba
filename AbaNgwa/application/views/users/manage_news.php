
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 50px !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-plus-circle"></i> News
            <small>Manage News </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Products</li>
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
                                <th>Headline</th>
                                <th>News Tag</th>

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php
                            foreach($news as $new):
                                ?>

                                <tr>
                                    <td><?=$new['Id'];?></td>
                                    <td><?=$new['Headline'];?></td>
                                    <td><?=$new['NewsTag'];?></td>

                                    <td>
                                        <a href="" class="btn btn-success"><i class="fa fa-pencil"></i></a> |
                                        <a href="" class="btn btn-success"><i class="fa fa-eye"></i></a> |
                                        <a href="" class="btn btn-primary"><i class="fa fa-check-circle"></i></a> |
                                        <a href="" class="btn btn-success"><i class="fa fa-clipboard"></i></a> |
                                        <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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


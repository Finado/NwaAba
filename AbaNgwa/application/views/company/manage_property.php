
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 50px !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-plus-circle"></i> Property
            <small> Manage Property  </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Property</li>
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
                                <th>Title</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php
                            foreach($properties as $property):
                                ?>

                                <tr>
                                    <td><?=$property['Id'];?></td>
                                    <td><?=$property['Name'];?></td>
                                    <td><?=$property['Location'];?></td>
                                    <?php
                                    $approve = $property['Approved'];
                                    $featured = $property['Featured'];
                                    ?>
                                    <td>
                                        <?php
                                        if($approve ==1){
                                            echo "<span class='text-green'>" ."Approved" ."</span>";
                                        } else{
                                            echo  "<span class='text-danger'>" ."Pending" ."</span>";
                                        }

                                       echo "&nbsp;&nbsp" . "|" ."&nbsp;&nbsp";


                                        if($featured ==1){
                                            echo "<span class='text-green'>" ."Featured" ."</span>";
                                        } else{
                                            echo  "<span class='text-danger'>" ."Not Featured" ."</span>";
                                        }

                                        ?>
                                    </td>

                                    <td>

                                        <a href="<?=base_url();?>index.php/Admin/Property_Details/<?=$property['Id'];?>"
                                           class="btn btn-success" title="View Property Details"><i class="fa
                                           fa-eye"></i></a> |
                                        <a href="<?=base_url();?>index.php/Admin/Approve_Property/<?=$property['Id'];?>"
                                           class="btn btn-primary" title="Approve Property"><i class="fa
                                           fa-check-circle"></i></a> |
                                        <a href="<?=base_url();?>index.php/Admin/Featured_Property/<?=$property['Id'];?>"
                                           class="btn btn-success" title="Feature Property"><i class="fa
                                           fa-clipboard"></i></a> |
                                        <a href="<?=base_url();?>index.php/Admin/Delete/<?=$property['Id'];?>" class="btn
                                        btn-danger" title="Delete Property"><i class="fa fa-trash"></i></a>
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


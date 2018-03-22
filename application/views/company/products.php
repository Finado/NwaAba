
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Products
            <small>Manage Products </small>
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
                        <?php
                        if(isset($msg)){
                            echo $msg;
                        }
                        ?>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Category:</label>
                                <select name="category" class="form-control">
                                    <option>Select</option>
                                    <option>Phone</option>
                                    <option>Computer</option>
                                    <option>Cloth</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Price:</label>
                                <input type="number" name="price" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label>Description:</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Product Image:</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                               <input type="submit" name="add" class="btn btn-success" value="Save" />
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
        <div class="row" id="displayProduct">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-arrow-circle-o-down"></i>
                        <h3 class="box-title"><button class="btn btn-success" id="showAddProducts">Add Products</button></h3>
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
                                    <td><?=$product['Id'];?></td>
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



        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


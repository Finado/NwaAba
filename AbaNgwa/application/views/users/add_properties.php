
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 50px !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-plus-circle"></i> Add Property
            <small>Manage Property </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Properties</li>
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

                        <div class="container-fluid">

                            <!-- Submit Page -->
                            <div class="sixteen columns">
                                <div class="submit-page">

                                    <!-- Success message -->
                                    <?php
                                    if(isset($msg)){
                                        echo $msg;
                                    }
                                    ?>

                                    <form method="post" action="" enctype="multipart/form-data">

                                        <!-- Email -->
                                        <div class="form">
                                            <h5>Title</h5>
                                            <input class="search-field" type="text" placeholder="Property Title" name="title"/>
                                        </div>

                                        <!-- Title -->
                                        <div class="form">
                                            <h5>Location</h5>
                                            <input class="search-field" type="text" placeholder="Location" name="location"/>
                                        </div>


                                        <!-- Choose Category -->
                                        <div class="form">
                                            <div class="select">
                                                <h5>Category</h5>
                                                <select data-placeholder="Choose Categories" name="category" class="search-field form-control" >
                                                    <option value="1">Sale</option>
                                                    <option value="2">Rent</option>
                                                </select>
                                            </div>
                                        </div>


                                        <!-- Title -->
                                        <div class="form">
                                            <h5>Price</h5>
                                            <input class="search-field" type="number" placeholder="Price"
                                                   name="amount"/>
                                        </div>

                                        <!-- Description -->
                                        <div class="form">
                                            <h5>Description</h5>
                                            <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
                                        </div>


                                        <!-- image -->
                                        <div class="form">
                                            <h5>Image <span></span></h5>
                                            <label class="upload-btn">
                                                <input type="file" name="image" required="required" />
                                                <i class="fa fa-upload"></i> Browse
                                            </label>
                                            <span class="fake-input">No file selected</span>
                                        </div>


                                        <div class="divider margin-top-0"></div>
                                        <input class="button big margin-top-5" type="submit" name="add" value="Submit">


                                    </form>
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


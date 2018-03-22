
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 50px !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-plus-circle"></i> Add Company
            <small>Manage Company </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Company</li>
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

                                        <!-- Company Name -->
                                        <div class="form">
                                            <h5>Company Name:</h5>
                                            <input class="search-field" type="text" placeholder="Company Name" name="name"/>
                                        </div>

                                        <!-- Email -->
                                        <div class="form">
                                            <h5>Email:</h5>
                                            <input class="search-field" type="text" placeholder="Email" name="email"/>
                                        </div>

                                        <!-- Phone -->
                                        <div class="form">
                                            <h5>Phone:</h5>
                                            <input class="search-field" type="text" placeholder="Phone" name="phone"/>
                                        </div>

                                        <!-- Website -->
                                        <div class="form">
                                            <h5>Website:</h5>
                                            <input class="search-field" type="text" placeholder="Website" name="website"/>
                                        </div>


                                        <!-- Choose Category -->
                                        <div class="form">
                                            <div class="select">
                                                <h5>Category</h5>
                                                <select data-placeholder="Choose Categories" name="category" class="search-field form-control" >
                                                    <option value="1">----Select----</option>
                                                    <option value="1">Service Providing</option>
                                                    <option value="2">Products</option>
                                                </select>
                                            </div>
                                        </div>




                                        <!-- Address -->
                                        <div class="form">
                                            <h5>Address</h5>
                                            <textarea class="WYSIWYG" name="address" cols="20" rows="3" id="summary" spellcheck="true"></textarea>
                                        </div>


                                        <!-- image -->
                                        <div class="form">
                                            <h5>Logo <span>(optional)</span></h5>
                                            <label class="upload-btn">
                                                <input type="file" name="image" />
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


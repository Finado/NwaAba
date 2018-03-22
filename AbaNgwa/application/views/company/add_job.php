
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 50px !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <i class="fa fa-plus-circle"></i> Add Job
            <small>Manage Jobs </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Jobs</li>
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

                                    <form method="post" action="">

                                    <!-- Email -->
                                    <div class="form">
                                        <h5>Company Email</h5>
                                        <input class="search-field" type="text" placeholder="mail@company.com" name="email"/>
                                    </div>

                                    <!-- Title -->
                                    <div class="form">
                                        <h5>Job Title</h5>
                                        <input class="search-field" type="text" placeholder="Job Title" name="title"/>
                                    </div>

                                    <!-- Location -->
                                    <div class="form">
                                        <h5>Location <span>(optional)</span></h5>
                                        <input class="search-field" type="text" placeholder="e.g. Umungasi, Aba" name="location"/>
                                        <p class="note">Leave this blank if the location is not important</p>
                                    </div>

                                    <!-- Job Type -->
                                    <div class="form">
                                        <h5>Job Type</h5>
                                        <select data-placeholder="Full-Time" name="jobtype" class="form-control search-field">
                                            <option value="Full-Time">Full-Time</option>
                                            <option value="Part-Time">Part-Time</option>
                                            <option value="Internship">Internship</option>
                                            <option value="Freelance">Freelance</option>
                                        </select>
                                    </div>


                                    <!-- Choose Category -->
                                    <div class="form">
                                        <div class="select">
                                            <h5>Category</h5>
                                            <select data-placeholder="Choose Categories" name="category" class="form-control search-field">
                                                <option value="Sales Representative">Sales Rep</option>
                                                <option value="Web Developers">Web Developers</option>
                                                <option value="Mobile Developers">Mobile Developers</option>
                                                <option value="Designers & Creatives">Designers & Creatives</option>
                                                <option value="Writers">Writers</option>
                                                <option value="Customer Service Agents">Customer Service Agents</option>
                                                <option value="Sales & Marketing Experts">Sales & Marketing Experts</option>
                                                <option value="Accountants & Consultants">Accountants & Consultants</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Tags -->
                                    <div class="form">
                                        <h5>Job Tags <span>(optional)</span></h5>
                                        <input class="search-field" type="text" placeholder="e.g. Sale Rep, Marketer, Management" name="jobtags"/>
                                        <p class="note">Comma separate tags, such as required skills or technologies, for this job.</p>
                                    </div>


                                    <!-- Description -->
                                    <div class="form">
                                        <h5>Description</h5>
                                        <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
                                    </div>

                                        <!-- Application email/url -->
                                        <div class="form">
                                            <h5>Salary</h5>
                                            <input type="number" name="salary" placeholder="Enter Salary">
                                        </div>

                                    <!-- Application email/url -->
                                    <div class="form">
                                        <h5>Application email / URL</h5>
                                        <input type="text" name="appemail" placeholder="Enter an email address or website URL">
                                    </div>

                                    <!-- TClosing Date -->
                                    <div class="form">
                                        <h5>Closing Date <span>(optional)</span></h5>
                                        <input data-role="date" name="closedate" type="text" placeholder="yyyy-mm-dd">
                                        <p class="note">Deadline for new applicants.</p>
                                    </div>


                                    <!-- Company Details -->
                                    <div class="divider"><h3>Company Details</h3></div>

                                    <!-- Company Name -->
                                    <div class="form">
                                        <h5>Company Name</h5>
                                        <input type="text" name="companyname" placeholder="Enter the name of the company">
                                    </div>

                                    <!-- Website -->
                                    <div class="form">
                                        <h5>Website <span>(optional)</span></h5>
                                        <input type="text" name="website" placeholder="http://">
                                    </div>

                                    <!-- Teagline -->
                                    <div class="form">
                                        <h5>Tagline <span>(optional)</span></h5>
                                        <input type="text" name="tagline" placeholder="Briefly describe your company">
                                    </div>

                                    <!-- Video -->
                                    <div class="form">
                                        <h5>Video <span>(optional)</span></h5>
                                        <input type="text" name="video" placeholder="A link to a video about your company">
                                    </div>

                                    <!-- Twitter -->
                                    <div class="form">
                                        <h5>Twitter Username <span>(optional)</span></h5>
                                        <input type="text" name="twitter" placeholder="@yourcompany">
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


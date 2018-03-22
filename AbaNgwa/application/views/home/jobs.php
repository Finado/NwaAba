<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="ten columns wow fadeInDown">
            <span style="color: #ffffff">We found <?=count($numjob);?> jobs </span>
            <h2 style="color: #ffffff">Jobs, in Aba</h2>
        </div>

        <div class="six columns">
            <a href="<?=base_url()?>index.php/User/AddJob" class="button">Post a Job, It's Free!</a>
        </div>

    </div>
</div>



<!-- Content
================================================== -->
<div class="container">
    <!-- Recent Jobs -->
    <div class="fifteen columns">
        <div class="padding-right">

            <form action="<?=base_url()?>index.php/home/search" method="post" class="list-search">
                <button type="submit" name="search"><i class="fa fa-search"></i></button>
                <input type="hidden" name="category" value="jobs">
                <input type="text" name="keyword" placeholder="Find Job by title, location" />
                <div class="clearfix"></div>
            </form>

            <ul class="job-list full wow fadeInDown">

                <?php
                foreach($jobs as $job):
                    ?>
                    <li><a href="<?=base_url()?>index.php/Home/Jobdetails/<?=$job['Id'];?>">
                            <img src="<?=base_url()?>assets/images/job-list-logo-03.png" alt="">
                            <div class="job-list-content">
                                <h4><?=$job['Title'];?>  <span class="full-time">Apply</span></h4>
                                <div class="job-icons">
                                    <span><i class="fa fa-briefcase"></i> <?=$job['CompanyName'];?></span>
                                    <span><i class="fa fa-map-marker"></i> <?=$job['Location'];?></span>
                                    <span><i class="fa fa-money"></i> &#8358;<?=$job['salary'];?> / Monthly</span>
                                </div>
                                <p> <?=$job['Description'];?></p>

                            </div>
                        </a>
                        <div class="clearfix"></div>
                    </li>

                    <?php
                endforeach;
                ?>


            </ul>
            <div class="clearfix"></div>

            <div class="pagination-container-fluid">
                <nav class="pagination">
                    <ul>
                        <!-- Show pagination links -->
                        <?php foreach ($links as $link) {
                            echo "<li class='current-page'>". $link."</li>";
                        } ?>

                        <!--<li><a href="#" class="current-page">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li class="blank">...</li>
                        <li><a href="#">22</a></li>-->
                    </ul>
                </nav>

                <nav class="pagination-next-prev">
                    <!--<ul>
                        <li><a href="#" class="prev">Previous</a></li>
                        <li><a href="#" class="next">Next</a></li>
                    </ul>-->
                </nav>
            </div>

        </div>
    </div>


    <!-- Widgets -->

    <!-- Widgets / End -->


</div>



<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-aqua" style="background-color: green !important; color: #ffffff !important;">
                <button style="color: #ffffff !important;" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Login</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-3"></div>

                <div class="col-sm-6">
                    <div><img src="<?=base_url()?>assets/images/nwaabalogoblack.png" alt="NwaAba" /></div>

                    <div class="logmessages"></div>
                    <form action="<?=base_url()?>index.php/Home/login" method="post" id="loginForm">
                        <div class="form-group">
                            <input type="text" class="search-field" id="emails" name="emails" placeholder="Username or Email" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="search-field" id="passwords" name="passwords" placeholder="Password">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="button big margin-top-5" style="background-color: green !important; color: #ffffff !important;">Sign-In</button>
                        </div>
                    </form>

                    <a href="#">Forgot Password?</a>
                </div>

                <div class="col-sm-3"></div>
            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
                <!--        <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>


<!--Register Modal starts here -->

<div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-aqua" style="background-color: green !important; color: #ffffff !important;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="background-color: #ffffff !important;">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Sign Up</h4>
            </div>
            <div class="modal-body">

                <div class="" style="margin-left: 150px !important;"><img src="<?=base_url()?>assets/images/nwaabalogoblack.png" alt="NwaAba" /></div>
                <hr/>

                <div class="messages"></div>

                <form action="<?=base_url()?>index.php/Home/register" method="post" id="registerForm">

                    <div class="form-group">
                        <label for="name" class="col-md-4 hidden-xs">Name</label>
                        <div class="col-md-8">
                            <input type="text" class="search-field" id="name" name="name" placeholder="Name">
                        </div>
                    </div>
                    <br>
                    <br>



                    <div class="form-group">
                        <label for="phone" class="col-md-4 hidden-xs">Phone</label>
                        <div class="col-md-8">
                            <input type="text" class="search-field" id="phone" name="phone" placeholder="Phone Number">
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="form-group">
                        <label for="email" class="col-md-4 hidden-xs">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="search-field" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="form-group">
                        <label for="password" class="col-md-4 hidden-xs">Password</label>
                        <div class="col-md-8">
                            <input type="password" class="search-field" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <br>
                    <br>


                    <div class="text-center">
                        <button type="submit"  class="button big margin-top-5" style="background-color: green !important; color: #ffffff !important;">Sign-Up</button>
                    </div>
                </form>
                <div class="messages"></div>

            </div>
            <div class="modal-footer">
                <!--        <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>


    </div>
</div>

<!--Register Modal Ends here -->
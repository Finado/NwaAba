<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="ten columns">
            <span ><a href="#" style="color: #ffffff"><?=$tagline?></a></span>
            <h2 style="color: #ffffff"><?=$title?> <span class="full-time"><?=$type?></span></h2>
        </div>

        <div class="six columns">
            <a href="#" class="button dark"><i class="fa fa-star"></i> Bookmark This Job</a>
        </div>

    </div>
</div>


<!-- Content
================================================== -->
<div class="container">

    <!-- Recent Jobs -->
    <div class="ten columns">
        <div class="padding-right">

            <!-- Company Info -->
            <div class="company-info">
                <img src="<?=base_url()?>assets/images/company-logo.png" alt="">
                <div class="content">
                    <h4><?=$companyName;?></h4>
                    <span><a href="#"><i class="fa fa-link"></i> <?=$website;?></a></span>
                    <span><a href="#"><i class="fa fa-twitter"></i> <?=$appemail;?></a></span>
                </div>
                <div class="clearfix"></div>
            </div>

            <p class="margin-reset">
                <?=$tags;?>
            </p>

            <br>


            <ul class="list-1">
                <li>
                    <?=$description;?>
                </li>

            </ul>

            <br>

           <!-- <h4 class="margin-bottom-10">Job Requirment</h4>

            <ul class="list-1">
                <li>Excellent customer service skills, communication skills, and a happy, smiling attitude are essential.</li>
                <li>Must be available to work required shifts including weekends, evenings and holidays.</li>
                <li>Must be able to perform repeated bending, standing and reaching.</li>
                <li> Must be able to occasionally lift up to 50 pounds</li>
            </ul>-->

        </div>
    </div>


    <!-- Widgets -->
    <div class="five columns">

        <!-- Sort by -->
        <div class="widget">
            <h4>Overview</h4>

            <div class="job-overview">

                <ul>
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <div>
                            <strong>Location:</strong>
                            <span><?=$location?></span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-user"></i>
                        <div>
                            <strong>Job Title:</strong>
                            <span><?=$title?></span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-clock-o"></i>
                        <div>
                            <strong>Job Type:</strong>
                            <span><?=$type?></span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-money"></i>
                        <div>
                            <strong>Rate:</strong>
                            <span>N<?=$salary?> / monthly</span>
                        </div>
                    </li>
                </ul>


                <a href="#small-dialog" class="popup-with-zoom-anim button">Apply For This Job</a>

                <div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
                    <div class="small-dialog-headline">
                        <h2>Apply For This Job</h2>
                    </div>

                    <div class="small-dialog-content">
                        <form action="#" method="get" >
                            <input type="text" placeholder="Full Name" value=""/>
                            <input type="text" placeholder="Email Address" value=""/>
                            <textarea placeholder="Your message / cover letter sent to the employer"></textarea>

                            <!-- Upload CV -->
                            <div class="upload-info"><strong>Upload your CV (optional)</strong> <span>Max. file size: 5MB</span></div>
                            <div class="clearfix"></div>

                            <label class="upload-btn">
                                <input type="file" multiple />
                                <i class="fa fa-upload"></i> Browse
                            </label>
                            <span class="fake-input">No file selected</span>

                            <div class="divider"></div>

                            <button class="send">Send Application</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>
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
<!-- Content
================================================== -->


<!-- Categories -->
<div class="container">
    <div class="sixteen columns">
        <h3 class="margin-bottom-25">Featured Company</h3>
        <ul id="popular-categories">

            <?php foreach($featuredCompany as $fcom) {?>

            <li  class="wow bounceInLeft" data-wow-offset="300"><a href="<?=base_url()?>index.php/Home/companydetails/<?=$fcom['Id']?>"><i class="ln
            ln-icon-Bar-Chart"></i> <?=$fcom['Name'];?><?= ' --> ' . $fcom['Phone'];?></a>
                <small href="#"> </small>
            </li>


            <?php } ?>



        </ul>

        <div class="clearfix"></div>
        <div class="margin-top-30"></div>

        <a href="<?=base_url()?>index.php/Home/Companies" class="button centered">Browse All Company</a>
        <div class="margin-bottom-50"></div>
    </div>
</div>



<div class="container">

    <!-- Recent Jobs -->
    <div class="eleven columns">
        <div class="padding-right">
            <h3 class="margin-bottom-25">Recent Jobs</h3>
            <ul class="job-list">



                <?php
                foreach($jobs as $job):
                ?>
                <li class="wow bounceInLeft" data-wow-offset="300"><a href="<?=base_url()?>index.php/Home/Jobdetails/<?=$job['Id'];?>">
                        <img src="<?=base_url()?>assets/images/job-list-logo-03.png" alt="">
                        <div class="job-list-content">
                            <h4><?=$job['Title'];?> - franconet <span class="full-time">View Details</span></h4>
                            <div class="job-icons">
                                <span><i class="fa fa-briefcase"></i> <?=$job['CompanyName'];?></span>
                                <span><i class="fa fa-map-marker"></i> <?=$job['Location'];?></span>
                                <span><i class="fa fa-money"></i> &#8358;<?=$job['salary'];?> / Monthly</span>
                            </div>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                </li>

                    <?php
                endforeach;
                ?>


            </ul>

            <a href="<?=base_url()?>index.php/Home/Jobs" class="button centered" id="loadMore"><i class="fa
            fa-plus-circle"></i> Show More Jobs</a>
            <div class="margin-bottom-55"></div>
        </div>
    </div>

    <!-- Job Spotlight -->
    <div class="four columns">
        <h3 class="margin-bottom-5">Made in Aba Spotlight</h3>

        <!-- Navigation -->
        <div class="showbiz-navigation">
            <div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
            <div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
        </div>
        <div class="clearfix"></div>

        <!-- Showbiz Container -->
        <div id="job-spotlight" class="showbiz-container">
            <div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1" >
                <div class="overflowholder testimonials-slider">

                    <ul class="slides">
                        <li>
                            <div class="job-spotlight">
                                <a href="#"><h4>Male Cloth <span class="part-time"></span></h4></a>
                                <!--<span><i class="fa fa-briefcase"></i> Mates</span>
                                <span><i class="fa fa-map-marker"></i> New York</span>
                                <span><i class="fa fa-money"></i> $20 / hour</span>-->
                                <span><img src="<?=base_url()?>assets/images/abamade/aba2.png" alt=""/>  </span>

                            </div>
                        </li>



                        <li>
                            <div class="job-spotlight">
                                <a href="#"><h4>Male Cloth <span class="freelance"></span></h4></a>
                               <!-- <span><i class="fa fa-briefcase"></i> King</span>
                                <span><i class="fa fa-map-marker"></i> London</span>
                                <span><i class="fa fa-money"></i> $25 / hour</span>-->
                                <span><img src="<?=base_url()?>assets/images/abamade/aba3.png" alt=""/></span>

                            </div>
                        </li>

                        <li>
                            <div class="job-spotlight">
                                <a href="#"><h4>Male Cloth <span class="freelance"></span></h4></a>
                               <!-- <span><i class="fa fa-briefcase"></i> Hexagon</span>
                                <span><i class="fa fa-map-marker"></i> Sydney</span>
                                <span><i class="fa fa-money"></i> $10 / hour</span>-->
                                <span><img src="<?=base_url()?>assets/images/abamade/aba4.png" alt=""/></span>

                            </div>
                        </li>

                        <li>
                            <div class="job-spotlight">
                                <a href="#"><h4>Aba Shoes <span class="freelance"></span></h4></a>
                               <!-- <span><i class="fa fa-briefcase"></i> Hexagon</span>
                                <span><i class="fa fa-map-marker"></i> Sydney</span>
                                <span><i class="fa fa-money"></i> $10 / hour</span>-->
                                <span><img src="<?=base_url()?>assets/images/abamade/abashoes.png" alt=""/></span>

                            </div>
                        </li>


                    </ul>

                    <div class="clearfix"></div>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</div>


<!-- Testimonials -->
<div id="testimonials">
    <!-- Slider -->
    <div class="container">
        <div class="sixteen columns">
            <div class="testimonials-slider">
                <ul class="slides wow bounceInLeft" data-wow-delay="2s">
                    <li>
                        <p>I was able to find job within Aba, I thank those that built this amazing platform
                            <span>Uche Jay</span></p>
                    </li>

                    <li>
                        <p>Using this app, I was able to find my desirable home
                            <span>Emeka Essien</span></p>
                    </li>

                    <li>
                        <p>As a new visitor to Aba, navigating around aba was made easy using this app.
                            <span>Johnson Uba</span></p>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>


<!-- Infobox -->
<div class="infobox">
    <div class="container">
        <div class="sixteen columns">Find everything in Aba <a href="#">Get Started</a></div>
    </div>
</div>


<!-- Recent Posts -->
<div class="container">
    <div class="row">
    <div class="sixteen columns">
        <h3 class="margin-bottom-25">Featured Properties</h3>
    </div>

    <?php
    foreach($properties as $property):
    ?>

    <div class="one-third column wow fadeInDown" style="margin-left: -2px !important;"  >

        <!-- Post #1 -->
        <div class="recent-post">
            <div class="recent-post-img"><a href="../Home/PropertyDetails/<?=$property['Id'];?>"><img src="<?=base_url()?>assets/uploads/property/<?=$property['Image'];?>" alt="" style="height: 250px !important; width: 400px !important;"></a><div class="hover-icon"></div></div>
            <a href="../Home/PropertyDetails/<?=$property['Id'];?>"><h4><?=$property['Name'];?></h4></a>
            <div class="meta-tags">
                <!--<span>October 10, 2015</span>-->
                <span><a href="../Home/PropertyDetails/<?=$property['Id'];?>"><?=$property['Location'];?></a></span>
            </div>
            <p><?=$property['Description'];?></p>
            <a href="<?=base_url()?>index.php/Home/PropertyDetails/<?=$property['Id'];?>" class="button">View
                Details</a>
        </div>

    </div>

        <?php
    endforeach;
    ?>
</div>
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
<!-- Titlebar
================================================== -->
<div id="titlebar" class="resume">
    <div class="container">
        <div class="ten columns">
            <div class="resume-titlebar">
                <img src="<?=base_url()?>assets/images/resumes-list-avatar-01.png" alt="">
                <div class="resumes-list-content">
                    <h4 style="color: #ffffff"> <span style="color: #ffffff"><?=$user?></span></h4>
                    <span class="icons" style="color: #ffffff"><i class="fa fa-map-marker"></i> <?=$loco?></span>
                    <span class="icons" style="color: #ffffff"><a href="#" style="color: #ffffff"><i class="fa fa-phone"></i> <?=$phone?></a></span>
                    <span class="icons" style="color: #ffffff"><a href="#" style="color: #ffffff"><i class="fa fa-link"></i> <?=$website?></a></span>
                    <span class="icons" style="color: #ffffff"><a href="#" style="color: #ffffff"><i class="fa fa-envelope"></i> <?=$mail?></a></span>

                    <div class="skills" style="color: #ffffff">
                        <!--<span>JavaScript</span>
                        <span>PHP</span>
                        <span>WordPress</span>-->
                    </div>

                    <div class="clearfix"></div>

                </div>
            </div>
        </div>

        <div class="six columns">
            <div class="two-buttons">

                <a href="#small-dialog" class="popup-with-zoom-anim button"><i class="fa fa-envelope"></i> Send Message</a>

                <div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
                    <div class="small-dialog-headline">
                        <h2>Send Message to <br> <?=$user?></h2>
                    </div>

                    <div class="small-dialog-content">
                        <form action="#" method="get" >
                            <input type="text" placeholder="Full Name" value=""/>
                            <input type="text" placeholder="Email Address" value=""/>
                            <textarea placeholder="Message"></textarea>

                            <button class="send">Send Application</button>
                        </form>
                    </div>

                </div>
                <!--<a href="#" class="button dark"><i class="fa fa-star"></i> Bookmark This Resume</a>-->


            </div>
        </div>

    </div>
</div>


<!-- Content
================================================== -->
<div class="container">
    <!-- Recent Jobs -->
    <div class="eight columns">
        <div class="padding-right">

            <h3 class="margin-bottom-15">About Us</h3>

            <p class="margin-reset">
               <?=$about?>
            </p>

            <br>

            <p><strong>List of Services</strong> </p>

            <ul class="list-1">
                <li><?=$service?></li>
            </ul>

        </div>
        <div>
            <style>
                #map {
                    height: 400px;
                    width: 100%;
                }
            </style>

            <div id="map"></div>
            <script>
                function initMap() {
                    var uluru = {lat: 7.9833333, lng: 3.1333333};
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 4,
                        center: uluru
                    });
                    var marker = new google.maps.Marker({
                        position: uluru,
                        map: map
                    });
                }
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmkelo6XV53M-o-fuGYurO0WT_RVcnZe0&callback=initMap">
            </script>




        </div>

    </div>


    <!-- Widgets -->
    <div class="seven columns">

        <h3 class="margin-bottom-20">Products</h3>
        <!-- Resume Table -->
        <dl class="resume-table">

            <?php
            foreach($products as $pro):
            ?>
            <dt>
                <small class="date">N<?=$pro['Price'];?></small>
                <strong><?=$pro['Title'];?></strong>
            </dt>
            <dd>
                <p>
                    <a href="#"><img src="<?=base_url()?>assets/uploads/<?=$pro['Image'];?>" alt="" style="height: 100px !important; width: 200px !important;"></a>

                </p>
            </dd>
                <hr/>

                <?php
            endforeach;
            ?>

        </dl>

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
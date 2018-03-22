<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="ten columns wow fadeInDown">

            <?php
            $num  = count($properties);
            if($num == 1){

                echo '<span style="color: #ffffff">We found ' . $num .' property </span>';


            }elseif($num > 1){
                echo '<span style="color: #ffffff">We found ' . $num .' properties </span>';
            }else{
                echo '<span style="color: #ffffff">We found ' . $num .' property </span>';
            }
            ?>


            <h2 style="color: #ffffff">Properties, in Aba</h2>
        </div>

        <div class="six columns">
            <a href="<?=base_url()?>index.php/User/AddProperty" class="button">Post a Property, It's Free!</a>

        </div>

    </div>
</div>



<!-- Content
================================================== -->
<div class="container-fluid">
    <!-- Recent Jobs -->

    <div class="eleven columns">
        <div class="padding-right">

            <form action="<?=base_url()?>index.php/home/search" method="post" class="list-search">
                <button type="submit" name="search"><i class="fa fa-search"></i></button>
                <input type="hidden" name="category" value="properties">
                <input type="text" name="keyword" placeholder="Find Property by title, location" />
                <div class="clearfix"></div>
            </form>



            <div class="container">
                <div class="row">
                    <div class="sixteen columns wow fadeInDown">
                        <h3 class="margin-bottom-25">Featured Properties</h3>
                    </div>

                    <?php
                    foreach($properties as $property):
                        ?>

                        <div class="one-third column" style="margin-left: -2px !important;">

                            <!-- Post #1 -->
                            <div class="recent-post">
                                <div class="recent-post-img"><a href="../Home/PropertyDetails/<?=$property['Id'];?>"><img src="<?=base_url()?>assets/uploads/property/<?=$property['Image'];?>" alt="" style="height: 250px !important; width: 400px !important;"></a><div class="hover-icon"></div></div>
                                <a href=""><h4><?=$property['Name'];?></h4></a>
                                <div class="meta-tags">
                                    <!--<span>October 10, 2015</span>-->
                                    <span><a href="#"><?=$property['Location'];?></a></span>
                                </div>
                                <p><?=$property['Description'];?></p>
                                <a href="../Home/PropertyDetails/<?=$property['Id'];?>" class="button">View Details</a>
                            </div>

                        </div>

                        <?php
                    endforeach;
                    ?>
                </div>
            </div>



            <div class="clearfix"></div>

            <div class="pagination-container-fluid">
                <nav class="pagination">
                    <ul>
                      <!--  <li><a href="#" class="current-page">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li class="blank">...</li>
                        <li><a href="#">22</a></li>-->
                    </ul>
                </nav>

                <nav class="pagination-next-prev">
                    <ul>
                        <!--<li><a href="#" class="prev">Previous</a></li>
                        <li><a href="#" class="next">Next</a></li>-->
                    </ul>
                </nav>
            </div>

        </div>
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
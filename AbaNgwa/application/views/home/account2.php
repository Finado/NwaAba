<!-- Titlebar
================================================== -->
<div  class="single">
    <div class="container">

        <div class="sixteen columns">
            <h2>Account / Register</h2>
            <nav id="breadcrumbs">
                <ul>
                    <li>You are here:</li>
                    <li><a href="#">Home</a></li>
                    <li>Account / Register</li>
                </ul>
            </nav>
        </div>

    </div>
</div>


<!-- Content
================================================== -->

<!-- Container -->
<div class="container">

    <div class="my-account">

        <ul class="tabs-nav">

            <li><a href="#tab2">Register</a></li>
        </ul>

        <div class="tabs-container">


            <!-- Register -->
            <div class="tab-content" id="tab2" style="display: none;">


                <div class="messages"></div>
                <h4>
                    <?php echo validation_errors(); ?>
                    <?= $this->session->flashdata('msg')?>
                </h4>

                <form action="" method="post">

                    <div class="form-group">


                            <input type="text" class="search-field"  name="name" placeholder="Name">

                    </div>
                    <br>
                    <br>



                    <div class="form-group">


                            <input type="text" class="search-field"  name="phone" placeholder="Phone Number">

                    </div>
                    <br>
                    <br>

                    <div class="form-group">


                            <input type="email" class="search-field"  name="email" placeholder="Email">

                    </div>
                    <br>
                    <br>

                    <div class="form-group">


                            <input type="password" class="search-field"  name="password" placeholder="Password">

                    </div>
                    <br>
                    <br>


                    <div class="text-center">
                        <button type="submit" name="register"  class="button big margin-top-5" style="background-color: green !important; color: #ffffff !important;
                        ">Sign-Up</button>
                    </div>
                </form>
                

            </div>
        </div>
    </div>
</div>

<!-- Titlebar
================================================== -->
<div  class="single">
    <div class="container">

        <div class="sixteen columns">
            <h2>Account</h2>
            <nav id="breadcrumbs">
                <ul>
                    <li>You are here:</li>
                    <li><a href="#">Home</a></li>
                    <li> Account / Login</li>
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
            <li class=""><a href="#tab1">Login</a></li>

        </ul>

        <div class="tabs-container">
            <!-- Login -->
            <div class="tab-content" id="tab1" style="display: none;">
                <div class="col-md-8">


                    <div class="logmessages"></div>
                    <h4>
                        <?php echo validation_errors(); ?>
                        <?= $this->session->flashdata('msg_login')?>
                    </h4>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" class="search-field"  name="emails" placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="search-field"   name="passwords"
                                   placeholder="Password">
                        </div>

                        <div class="text-center">
                            <button type="submit" name="login" class="button big margin-top-5" style="background-color:
                            green !important; color: #ffffff !important;">Sign-In</button>
                        </div>
                    </form>

                    <a href="#">Forgot Password?</a>
                </div>
            </div>


        </div>
    </div>
</div>

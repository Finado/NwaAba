<!-- Content
================================================== -->

<!-- Container -->
<div class="container" style="margin-top: 90px">



    <div class="my-account">


        <ul class="tabs-nav">
            <li class=""><a href="#tab1">Login</a></li>
            <li><a href="#tab2">Register</a></li>
        </ul>

        <div class="tabs-container">

            <!-- Login -->
            <div class="tab-content" id="tab1" style="display: none;">
                <div class="logmessages"></div>

                <form method="post" action="login" class="login" id="login">

                    <p class="form-row form-row-wide">
                        <label for="email">Email:
                            <i class="ln ln-icon-Male"></i>
                            <input type="text" class="input-text" name="email" id="email" value="" />
                        </label>
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="passwords">Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="password" id="password"/>
                        </label>
                    </p>

                    <p class="form-row">
                        <input type="submit" class="button border fw margin-top-10" name="login" value="Login" />

                        <label for="rememberme" class="rememberme">
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember Me</label>
                    </p>

                    <p class="lost_password">
                        <a href="#" >Lost Your Password?</a>
                    </p>

                </form>
            </div>

            <!-- Register -->
            <div class="tab-content" id="tab2" style="display: none;">

                <form method="post" action="register" id="registerForm" class="register">
                    <div class="messages"></div>

                   <!-- <p class="form-row form-row-wide">
                        <label for="username2">Account Type:
                            <i class="ln ln-icon-Male"></i>
                            <select class="chosen-select" data-placeholder="Choose Categories" style="display: none;" id="selectedItem">
                                <option>-----Select------</option>
                                <option value="Individual">Individual</option>
                                <option value="Company">Company</option>
                            </select>

                        </label>
                    </p>-->

                    <p class="form-row form-row-wide" id="forCompany">
                        <label for="companyName">Company Name:
                            <i class="ln ln-icon-Male"></i>
                            <input type="text" class="input-text" name="name" id="companyname" value="" />
                        </label>
                    </p>

                    <!--<p class="form-row form-row-wide" id="forIndividual">
                        <label for="username2"> Name:
                            <i class="ln ln-icon-Male"></i>
                            <input type="text" class="input-text" name="name" id="username2" value="" />
                        </label>
                    </p>-->

                    <p class="form-row form-row-wide">
                        <label for="email">Email:
                            <i class="ln ln-icon-Mail"></i>
                            <input type="text" class="input-text" name="email" id="email"  />
                        </label>
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="phone">Phone:
                            <i class="ln ln-icon-Phone"></i>
                            <input type="text" class="input-text" name="phone" id="phone"  />
                        </label>
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="password">Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="password" id="password"/>
                        </label>
                    </p>

                   <!-- <p class="form-row form-row-wide">
                        <label for="password2">Repeat Password:
                            <i class="ln ln-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="password2" id="password2"/>
                        </label>
                    </p>-->

                    <p class="form-row">
                        <input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
                    </p>

                </form>
            </div>
        </div>
    </div>
</div>

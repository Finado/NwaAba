<!-- Footer
================================================== -->
<div class="margin-top-15"></div>

<div id="footer">
    <!-- Main -->
    <div class="container">

        <div class="five columns wow fadeInDown">
            <h4>Contacts</h4>
            <ul>
                <li><i class="fa fa-phone"></i> Phone: 08030419922, 09031366126</li>
                <li><i class="fa fa-globe"></i> Email: info@nwaba.com.ng</li>
            </ul>

        </div>

        <div class="three columns wow fadeInDown">
            <h4>Company</h4>
            <ul class="footer-links">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Our Blog</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </div>

        <div class="three columns wow fadeInDown">
            <h4>Press</h4>
            <ul class="footer-links">
                <li><a href="#">In the News</a></li>



            </ul>
        </div>

        <div class="three columns wow fadeInDown">
            <h4>Browse</h4>
            <ul class="footer-links">
                <li><a href="#">Find Properties</a></li>
                <li><a href="#">Find Products</a></li>
                <li><a href="#">Find Companies</a></li>
                <li><a href="#">Find Jobs</a></li>

            </ul>
        </div>

    </div>

    <!-- Bottom -->
    <div class="container">
        <div class="footer-bottom">
            <div class="sixteen columns wow fadeInDown">
                <h4>Follow Us</h4>
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                    <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
                </ul>
                <div class="copyrights">&copy;  Copyright 2018 by <a href="#">NwaAba</a>. All Rights Reserved. <i>Powered by: <a href="www.codinglab.com.ng">Coding Lab</a></i></div>
            </div>
        </div>
    </div>

</div>

<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>

</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script src="<?=base_url()?>assets/scripts/jquery-2.1.3.min.js"></script>
<script src="<?=base_url()?>assets/scripts/custom.js"></script>
<script src="<?=base_url()?>assets/scripts/jquery.superfish.js"></script>
<script src="<?=base_url()?>assets/scripts/jquery.themepunch.tools.min.js"></script>
<script src="<?=base_url()?>assets/scripts/jquery.themepunch.revolution.min.js"></script>
<script src="<?=base_url()?>assets/scripts/jquery.themepunch.showbizpro.min.js"></script>
<script src="<?=base_url()?>assets/scripts/jquery.flexslider-min.js"></script>
<script src="<?=base_url()?>assets/scripts/chosen.jquery.min.js"></script>
<script src="<?=base_url()?>assets/scripts/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>assets/scripts/waypoints.min.js"></script>
<script src="<?=base_url()?>assets/scripts/jquery.counterup.min.js"></script>
<script src="<?=base_url()?>assets/scripts/jquery.jpanelmenu.js"></script>
<script src="<?=base_url()?>assets/scripts/stacktable.js"></script>
<script src="<?=base_url()?>assets/scripts/headroom.min.js"></script>
<script src="<?php echo base_url()?>assets/css/bootstrap.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/wow.min.js"></script>

<script type="text/javascript">
    $("#table").dataTable();
    $("#datepicker").datepicker();
    $.datepicker.formatDate('yy-mm-dd');



    $(function () {
        $("#forCompany").hide();
        $("#forIndividual").hide();
        $('#selectedItem').change(function () {
            if ($('#selectedItem').val() == 'Company') {
                $('#forCompany').show(1000);
            } else if($('#selectedItem').val() == 'Individual') {
                $("#forIndividual").show();
            }else{
                $("#forCompany").hide();
                $("#forIndividual").hide();
            }
        });
    });


    $('#com').click(function(){
       // $('a.menu').removeClass("active");
        $('#com').addClass("current");
    });



</script>

<script>
    wow = new WOW(
        {
            animateClass: 'animated',
            offset:       100,
            callback:     function(box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        }
    );
    wow.init();

</script>


<script type="text/javascript" src="<?=base_url()?>assets/custom/js/login.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/custom/js/register.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/custom/js/forgotpass.js"></script>





<!-- Style Switcher
================================================== -->
<script src="<?=base_url()?>assets/scripts/switcher.js"></script>




</body>
</html>
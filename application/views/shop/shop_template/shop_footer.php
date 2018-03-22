<div class="footer">
		<div class="container">
			<div class="col-md-4 footer-top wow rotateInDownRight" data-wow-duration="2s" data-wow-delay="1s">
				<h3>Quick Contact</h3>
				<form>
						
						<input type="text" value="ENTER YOUR NAME*" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='ENTER YOUR NAME*';}">
						
						<input type="text" value="ENTER YOUR EMAIL*" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='ENTER YOUR EMAIL*';}">
						
						<input type="text" value="ENTER YOUR PHONE" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='ENTER YOUR PHONE';}">
					
						<textarea cols="77" rows="6" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'ENTER YOUR MESSAGE*';}">ENTER YOUR MESSAGE*</textarea>
						
							<input type="submit" value="SEND MESSAGE" >
						
					</form>

			</div>
			<div class="col-md-4 footer-middle wow rotateInDownRight" data-wow-duration="2s" data-wow-delay="1s">
				<h3>Most Searched Company</h3>
					<div class="product-go">
							<div class="grid-product">
								<h6><a href="#" >Cassa Bella</a></h6>
								<div class="rating">
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
								</div>
								<span class=" price-in"><small>$70.00</small> $40.00</span>
							</div>
								<div class="fashion">
									<a href="#"><img class="img-responsive " src="<?php echo img_url();?>f1.jpg" alt="">
									<p>SALE</p></a>
								</div>
							<div class="clearfix"> </div>
							</div>
								<div class="product-go">
							<div class="grid-product">
								<h6><a href="#" >Classic Combo Goggles</a></h6>
								<div class="rating">
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
								</div>
								<span class=" price-in"><small>$70.00</small> $40.00</span>
							</div>
								<div class="fashion">
									<a href="#"><img class="img-responsive " src="<?php echo img_url();?>f2.jpg" alt="">
									<p class="new1">NEW</p></a>
								</div>
							<div class="clearfix"> </div>
							</div>
								<div class="product-go">
							<div class="grid-product">
								<h6><a href="#" >sun Combo Goggles</a></h6>
								<div class="rating">
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
								</div>
								<span class=" price-in"><small>$70.00</small> $40.00</span>
							</div>
								<div class="fashion">
									<a href="#"><img class="img-responsive " src="<?php echo img_url();?>f3.jpg" alt="">
									<p class="new1">NEW</p></a>
								</div>
							<div class="clearfix"> </div>
							</div>

			</div>
			<div class="col-md-4 footer-bottom wow rotateInDownRight" data-wow-duration="2s" data-wow-delay="1s">
				<h3>Get In Touch</h3>
				<div class="logo-footer">
					<ul class="social">
		                    <li><a href="#"><i class="fb"> </i> </a></li>
		                    <li><a href="#"><i class="rss"> </i></a></li>
		                    <li><a href="#"><i class="twitter"> </i></a></li>
		                    <li><a href="#"><i class="dribble"> </i></a></li>
		                    <div class="clearfix"> </div>
		                </ul>
					<div class="clearfix"> </div>
				</div>
				<div class="indo">
					<ul class="social-footer ">
						<li><span><i class="glyphicon glyphicon-earphone"> </i>+234 8131342549 </span></li>
						<li><a href="mailto:info@example.com"><i class="glyphicon glyphicon-envelope" class="mes"> </i>info@ikotashops.com.ng</a></li>
					</ul>
					<!--<a href="#"><img src="<?php // echo //img_url();?>pa.png" alt=""></a>-->
				</div>
			</div>
			<div class="clearfix"> </div>
			<p class="footer-class">Copyrights © 2018 NwaAba. All rights Reserved</p>
		</div>
	</div>

<script type="text/javascript" src="<?=base_url()?>assets/custom/js/login.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/custom/js/register.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/custom/js/forgotpass.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/dist/vegas.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/wow.js"></script>
<script>
	$(function() {
		$('.jumbotron').vegas({
			slides: [
				{ src: '<?=base_url()?>assets/images/1.jpg' },
				{ src: '<?=base_url()?>assets/images/pixels.png' }
				//{ src: 'images/bgship2.png' }

			]
		});
	});

	var wow = new WOW(
		{
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       true,       // trigger animations on mobile devices (default is true)
			live:         true,       // act on asynchronously loaded content (default is true)
			callback:     function(box) {
				// the callback is fired every time an animation is started
				// the argument that is passed in is the DOM node being animated
			},
			scrollContainer: null,    // optional scroll container selector, otherwise use window,
			resetAnimation: true,     // reset animation on end (default is true)
		}
	);
	wow.init();



</script>




			 <!---->
<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!----> 

<!---->
</body>
</html>
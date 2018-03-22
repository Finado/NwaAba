
	<div class="banner">
		<div class="banner-top">



	<form class="form-inline" method="get" action="<?=base_url()?>index.php/home/company">
		<div class="input-group mb-2 mr-sm-2 mb-sm-0">

			<input type="text" class="form-control input-lg" id="inlineFormInputGroup" placeholder="Search Everything in Aba" name="search" type="search">
			<div class="input-group-addon" style="background-color: violet !important;">
				<button style="background-color: violet !important; border: none !important; color: #fff !important;" type="submit"><i class="fa fa-search fa-2x"></i></button>
			</div>
		</div>


	</form>

</div>
	<div class="now">

	         <div class="clearfix"> </div>
	         </div>
 	</div>	
 				<div class="clearfix"> </div>
			</div>
<!---->
		<!---->
		<div class="sap_tabs">
			<div class="container">
			<label class="line"> </label>
			<h2><span style="color: violet !important;">Featured</span> Products</h2>
				<div class="product-one">
					<div class="col-md-3 product-left wow rotateInDownRight" data-wow-duration="2s" data-wow-delay="0s">
						<div class="p-one simpleCart_shelfItem">

							<a href="single.html">
								<img src="<?php echo img_url();?>n5.jpg" alt="" />
								<div class="mask">
									<span>Quick View</span>
								</div>
							</a>
							<h4>Aenean placerat</h4>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">$18</span></a></p>

						</div>
					</div>
					<div class="col-md-3 product-left wow rotateInDownRight" data-wow-duration="2s" data-wow-delay="0s">
						<div class="p-one simpleCart_shelfItem">

							<a href="single.html">
								<img src="<?php echo img_url();?>n6.jpg" alt="" />
								<div class="mask">
									<span>Quick View</span>
								</div>
							</a>
							<h4>Aenean placerat</h4>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">$19</span></a></p>

						</div>
					</div>
					<div class="col-md-3 product-left wow rotateInDownRight" data-wow-duration="2s" data-wow-delay="0s">
						<div class="p-one simpleCart_shelfItem">

							<a href="single.html">
								<img src="<?php echo img_url();?>n7.jpg" alt="" />
								<div class="mask">
									<span>Quick View</span>
								</div>
							</a>
							<h4>Aenean placerat</h4>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">$21</span></a></p>

						</div>
					</div>
					<div class="col-md-3 product-left wow rotateInDownRight" data-wow-duration="2s" data-wow-delay="0s">
						<div class="p-one simpleCart_shelfItem">

							<a href="single.html">
								<img src="<?php echo img_url();?>n8.jpg" alt="" />
								<div class="mask">
									<span>Quick View</span>
								</div>
							</a>
							<h4>Aenean placerat</h4>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">$40</span></a></p>

						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
         </div>
	</div>
	<!--start-shoes--> 
	<div class="goggles"> 
		<div class="container"> 
			<h2><span style="color: violet !important;">Featured</span> Companies</h2>
			<div class="product-one">
				<?php foreach($featuredCompany as $fcom) {?>
				<div class="col-md-3 product-left"> 
					<div class="p-one simpleCart_shelfItem wow rotateInDownRight" data-wow-duration="2s" data-wow-delay="0s">
							<a href="<?= base_url() ?>index.php/Home/companydetails/<?= $fcom['Id']; ?>">
								<img src="<?=base_url()?>assets/uploads/profile/<?=$fcom['Logo'];?>" alt="" class="img-responsive"/>
								<div class="mask">
									<a href="<?= base_url() ?>index.php/Home/companydetails/<?= $fcom['Id']; ?>"></a><span>Quick View</span></a>
								</div>
							</a>
						<h4><?=$fcom['CompanyName'];?></h4>

					
					</div>
				</div>
				<?php } ?>
				<div class="clearfix"> </div>
			</div>

		</div>
	</div>
	<!--end-shoes-->
	<!---->


	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-aqua" style="background-color: violet !important; color: #ffffff !important;">
					<button style="color: #ffffff !important;" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="myModalLabel">Login</h4>
				</div>
				<div class="modal-body">
					<div class="col-sm-3"></div>

					<div class="col-sm-6">
					<div class="logmessages"></div>
					<form action="Home/login" method="post" id="loginForm">
						<div class="form-group">
							<input type="text" class="form-control" id="email" name="email" placeholder="Username or Email" />
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="passwords" name="passwords" placeholder="Password">
						</div>

						<div class="text-center">
							<button type="submit" class="btn log" style="background-color: violet !important; color: #ffffff !important;">Sign-In</button>
						</div>
					</form>
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

	<!--Login Modal ends here -->


	<!--Register Modal starts here -->

	<div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-aqua" style="background-color: violet !important; color: #ffffff !important;">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="myModalLabel">Sign Up</h4>
				</div>
				<div class="modal-body">

					<div class="messages"></div>

					<form action="Home/register" method="post" id="registerForm">

						<div class="form-group">
							<label for="companyName" class="col-md-4 hidden-xs">Company Name</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="companyName" name="companyName" placeholder="Company Name">
							</div>
						</div>
						<br>
						<br>

						<div class="form-group">
							<label for="email" class="col-md-4 hidden-xs">Email</label>
							<div class="col-md-8">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email">
							</div>
						</div>
						<br>
						<br>

						<div class="form-group">
							<label for="phone" class="col-md-4 hidden-xs">Phone</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
							</div>
						</div>
						<br>
						<br>


						<div class="form-group">
							<label for="category" class="col-md-4 hidden-xs">Category</label>
							<div class="col-md-8">
								<select class="form-control" name="category" id="category" >
									<option>Select</option>
									<option value="1">Service providing</option>
									<option value="2">Product Sales</option>
								</select>

							</div>
						</div>
						<br>
						<br>


						<div class="form-group">
							<label for="passwords" class="col-md-4 hidden-xs">Password</label>
							<div class="col-md-8">
								<input type="password" class="form-control" id="passwords" name="passwords" placeholder="Password">
							</div>
						</div>
						<br>
						<br>


						<div class="text-center">
							<button type="submit"  class="btn btn-default log" style="background-color: violet !important; color: #ffffff !important;">Sign-Up</button>
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

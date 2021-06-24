<?php  
require('db.php');
// include('function/functions.php');
// get_client_ip(); die;

session_start();
// @$username = $_SESSION["username"];




// $current_file_name = basename($_SERVER['PHP_SELF']);
// echo $current_file_name."\n"; die;

   

?>
<!doctype html>
<html lang="en">

<head>

<!-- Basic Page Needs
================================================== -->
<title>HireForCare</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" href="assets/images/botel.png" type="image/gif" sizes="64x64">

<!-- CSS
================================================== -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&amp;display=swap&amp;subset=latin-ext" rel="stylesheet">
<link rel="stylesheet" href="assets/css/all.min.css">
<link href="assets/css/aos.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link href="assets/css/select2.min.css" rel="stylesheet" />
<link href="assets/css/owl.carousel.min.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/color-1.css">
<style>
</style>
</head>
<body>

<!-- Header 01
================================================== -->

<div class="header_01">
	<div class="header_main">
		<?php include ("includes/header.php") ?>	
		<div class="header_btm ">
			<!-- <div class="bg-v" >
				<div class="bg-v-2 bg-b-r">
				</div>
			</div> -->
			<div class="container">
			   
			   	<div class="banner_slider ">
					<div class="">	
						<div class="row align-items-center">
							<div style="margin-top:-30px;" class="col-lg-4" data-aos="fade-down" data-aos-delay="200">
							<img  src="assets/images/baby.png"></img>
							</div>
							<div class="col-lg-8" >
								<div class="banner_form_cont" >
									<form action="find-staff.php">
										<div class="banerSearch" data-aos="fade-up" data-aos-delay="200">
											<div class="fild-wrap fw-job-title">
												<i class="fas fa-briefcase"></i>
												<select class="js-example-basic-multiple" name="state">
												  <option value="AL">Baby Care</option>
												  <option value="3">Cleaning</option>
												  <option value="2">Cooking</option>
												  <option value="2">Japa Nanny</option>
												  <option value="2">Baby Care+Cleaning</option>
												  <option value="2">Baby Care+Cooking</option>
												  <option value="2">Cooking+Cleaning</option>
												  <option value="2">Baby Care+Cooking+Cleaning</option>
												  
												   <!-- <option value="4">Home Cook</option>
												   <option value="1">Chif</option>
												  <option value="2">Japa Maid</option>
												  <option value="3">Caregiver</option>
												   <option value="4">Driver</option> -->

												</select>
											</div>
											<div class="fild-wrap fw-job-location">
												<i class="fas fa-map-marker-alt"></i>
												<select class="js-example-basic-single" name="state">
												<option value=""  disabled selected>Select Location</option>
												  <option value="AL">Mumbai</option>
												  <?php
                                        
                                        $sql ="SELECT DISTINCT places from location";
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>

<option ><?php echo $row['places']  ?></option>
<?php } ?>
												</select>
											</div>
											<div class="fild-wrap fw-job-location">
												<i class="fas fa-clock"></i>
												<select class="js-example-basic-single" name="state">
												  <option value="AL">Full Day (max 12 hours)</option>
												  <option value="WY">Live-in (24 hrs)</option>
												  <option value="WY">Part Time (1-4 hrs)</option>
												  <option value="WY">Night Shift</option>
												</select>
											</div>
											<div class="fild-wrap fw-submit">
												<button type="submit" class="btn btn-primary" value="">
													 <i class="material-icons">search</i> Search
													 
													 
												</button>
											</div>
										</div>
									</form>
									<div class="user_type">
										<div class="row">
											<div class="col-md-8" >
												<div class="user_type_inner  user_type_seeker" >
													<a href="find-staff.php">
														
														<div>							
															<h2>Find Most Reliable Helpers</h2>
															<h6>Verified Profiles Available Around you</h6>
														
														</div>
													</a>
												</div>
											</div>
											<div class="col-md-4">
												<a class="btn btn-primary" href="contact_us.php">Contact Us
									<i class="material-icons">arrow_right_alt</i>
								</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
					
			</div> 	
		</div>
	</div> 
</div>


<!-- End Header 02
================================================== -->



<!-- Main 
================================================== -->
<main>
	<!-- <div class="section category-section ">
		<div class="bg-v">
			<div class="bg-v-1 bg-t-l" data-aos="zoom-in">
			</div>
			<div class="bg-v-2 bg-b-r" data-aos="zoom-in">
			</div>
			<div class="bg-v-4">
			</div>
			<div class="bg-v-5">
			</div>
			<div class="bg-v-6">
			</div>
			<div class="bg-v-7">
			</div>
			<div class="bg-v-8">
			</div>
			<div class="bg-v-9">
			</div>
			<div class="bg-v-10">
			</div>
			<div class="bg-v-11">
			</div>
		</div>
		<div class="container">
			<h2 data-aos="fade-up" data-aos-delay="400" class="section_h">Popular Categories</h2>
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6" >
					<div class="category_box" >
						<div class="cb_header">
							<img alt=""  src="assets/images/maid.png">
							<span class="job_count">363</span>
						</div>
						<div class="cb_bottom">
							<h3>Maid</h3>
							<p>Home Maid, Japa Maid, caretaker Maid &amp; More</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6" >
					<div class="category_box" >
						<div class="cb_header">
							<img alt=""  src="assets/images/malemaid.png">
							<span class="job_count">572</span>
						</div>
						<div class="cb_bottom">
							<h3>Male Maid</h3>
							<p>Home Caretaker / Service, Gardner & More</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6" >
					<div class="category_box" >
						<div class="cb_header">
							<img alt=""  src="assets/images/cookforhome.png">
							<span class="job_count">252</span>
						</div>
						<div class="cb_bottom">
							<h3>Home Cook</h3>
							<p>Chif, South/North Indian, Vegetarian & More</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6" >
					<div class="category_box" >
						<div class="cb_header">
							<img alt=""  src="assets/images/HomeDriver.png">
							<span class="job_count">523</span>
						</div>
						<div class="cb_bottom">
							<h3>Driver</h3>
							<p>Cab Driver, Personal Driver, Truck Driver & More</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6" >
					<div class="category_box" >
						<div class="cb_header">
							<img alt=""  src="assets/images/caregiver.png">
							<span class="job_count">98</span>
						</div>
						<div class="cb_bottom">
							<h3>Caregiver</h3>
							<p>Shop Helper, Office Boy, Other Helping Staff & More</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6" >
					<div class="category_box" >
						<div class="cb_header">
							<img alt=""  src="assets/images/shop_staff.png">
							<span class="job_count">53</span>
						</div>
						<div class="cb_bottom">
							<h3>Shop Staff</h3>
							<p>Shop Helper, Showroom Staff & Helpers & More</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6" >
					<div class="category_box" >
						<div class="cb_header">
							<img alt=""  src="assets/images/Office_boy.png">
							<span class="job_count">75</span>
						</div>
						<div class="cb_bottom">
							<h3>Office Boy</h3>
							<p>Office Boy, Other Helping Staff & More</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6" >
					<div class="category_box" >
						<div class="cb_header">
							<img alt=""  src="assets/images/Security_Guard.png">
							<span class="job_count">366</span>
						</div>
						<div class="cb_bottom">
							<h3>Security Guard</h3>
							<p>Advisor, Coach, Education Coordinator & More</p>
						</div>
					</div>
				</div>
			</div>   
		</div>
	</div> -->
	<!-- Start Featured Profiles ================================================== -->
	<div class="section dark-section featured_section">
		<div class="bg-v">
			<div class="bg-v-3 bg-t-r">
			</div>
			<div class="bg-v-3 bg-b-l">
			</div>
		</div>
		<div class="container">
			<h2 data-aos="fade-up" data-aos-delay="400" class="section_h">Featured Profiles</h2>
			<div class="row two_col featured_box_outer">
			    
			    
				<div class="col-lg-4 col-sm-6">
					<div class="staffBox">
					  <div class="staff_img">
						<img alt="" src="assets/images/Pf2.jpeg">
					  </div>
					  <div class="staff_detail">
						<h3>Sheetal Savant <img alt="" src="assets/images/hindu1.png"></h3>
						<p>Nanny for 24hr (Hindi)</p>
						<ul>
						  <li>
							<h6>Location</h6>
							<i class="fas fa-map-marker-alt"></i>
							<span>kurla</span>
						  </li>
						  <li>
							<h6>Experience</h6>
							<i class="fas fa-calendar-check"></i>
							<span>5 Years</span>
						  </li>
						  <li>
							<h6>Age</h6>
							<i class="fas fa-user"></i>
							<span>29</span>
						  </li>
						</ul>
						<div class="staffBox_action">
						  <a  class="btn btn-third" href="http://hireforcare.com/view_profile.php?emp_id=emp_19">View profile</a>
						</div>
					  </div>
					</div>
				  </div>
				  
				  
				  
				  <div class="col-lg-4 col-sm-6">
					<div class="staffBox">
					  <div class="staff_img">
						<img alt="" src="http://hireforcare.com/employee/images/main609cf23e7ce8a.jpg">
					  </div>
					  <div class="staff_detail">
						<h3>Surekha <img alt="" src="assets/images/hindu1.png"></h3>
						<p>Available for 24hr</p>
						<ul>
						  <li>
							<h6>Location</h6>
							<i class="fas fa-map-marker-alt"></i>
							<span>diva</span>
						  </li>
						  <li>
							<h6>Experience</h6>
							<i class="fas fa-calendar-check"></i>
							<span>8 Years</span>
						  </li>
						  <li>
							<h6>Age</h6>
							<i class="fas fa-user"></i>
							<span>32</span>
						  </li>
						</ul>
						<div class="staffBox_action">
						  <a  class="btn btn-third" href="http://hireforcare.com/view_profile.php?emp_id=emp_25">View profile</a>
						</div>
					  </div>
					</div>
				  </div>
				  <div class="col-lg-4 col-sm-6">
					<div class="staffBox">
					  <div class="staff_img">
						<img alt="" src="http://hireforcare.com/employee/images/main60a74e5a2493f.jpg">
					  </div>
					  <div class="staff_detail">
						<h3>Sheetal Santosh <img alt="" src="assets/images/hindu1.png"></h3>
						<p>New born baby Care & cooking</p>
						<ul>
						  <li>
							<h6>Location</h6>
							<i class="fas fa-map-marker-alt"></i>
							<span>Andheri</span>
						  </li>
						  <li>
							<h6>Experience</h6>
							<i class="fas fa-calendar-check"></i>
							<span>1-3 years</span>
						  </li>
						  <li>
							<h6>Age</h6>
							<i class="fas fa-user"></i>
							<span>22</span>
						  </li>
						</ul>
						<div class="staffBox_action">
						  <a  class="btn btn-third" href="http://hireforcare.com/view_profile.php?emp_id=emp_771">View profile</a>
						</div>
					  </div>
					</div>
				  </div>
				  <div class="col-lg-4 col-sm-6">
					<div class="staffBox">
					  <div class="staff_img">
						<img alt="" src="assets/images/Pf5.jpeg">
					  </div>
					  <div class="staff_detail">
						<h3>Jyoti Bhima <img alt="" src="assets/images/hindu1.png"></h3>
						<p>Baby Caretaker</p>
						<ul>
						  <li>
							<h6>Location</h6>
							<i class="fas fa-map-marker-alt"></i>
							<span>Thane</span>
						  </li>
						  <li>
							<h6>Experience</h6>
							<i class="fas fa-calendar-check"></i>
							<span>2 Years</span>
						  </li>
						  <li>
							<h6>Age</h6>
							<i class="fas fa-user"></i>
							<span>27</span>
						  </li>
						</ul>
						<div class="staffBox_action">
						  <a  class="btn btn-third" href="http://hireforcare.com/view_profile.php?emp_id=emp_15">View profile</a>
						</div>
					  </div>
					</div>
				  </div>
				  <div class="col-lg-4 col-sm-6">
					<div class="staffBox">
					  <div class="staff_img">
						<img alt="" src="assets/images/Pf1.jpeg">
					  </div>
					  <div class="staff_detail">
						<h3>Shabeena Banu <img alt="" src="assets/images/islam.jpg"></h3>
						<p>Cleaning+ Cooking+ Baby Care</p>
						<ul>
						  <li>
							<h6>Location</h6>
							<i class="fas fa-map-marker-alt"></i>
							<span>Mulund</span>
						  </li>
						  <li>
							<h6>Experience</h6>
							<i class="fas fa-calendar-check"></i>
							<span>1 Years</span>
						  </li>
						  <li>
							<h6>Age</h6>
							<i class="fas fa-user"></i>
							<span>19</span>
						  </li>
						</ul>
						<div class="staffBox_action">
						  <a  class="btn btn-third" href="http://hireforcare.com/view_profile.php?emp_id=emp_20">View profile</a>
						</div>
					  </div>
					</div>
				  </div>
				  <div class="col-lg-4 col-sm-6">
					<div class="staffBox">
					  <div class="staff_img">
						<img alt="" src="http://hireforcare.com/employee/images/main609cf22aedda4.jpg">
					  </div>
					  <div class="staff_detail">
						<h3>Rajashree <img alt="" src="assets/images/christian.jpg"></h3>
						<p>Cooking+ cleaning+ baby care</p>
						<ul>
						  <li>
							<h6>Location</h6>
							<i class="fas fa-map-marker-alt"></i>
							<span>Borivali East</span>
						  </li>
						  <li>
							<h6>Experience</h6>
							<i class="fas fa-calendar-check"></i>
							<span>13 Years</span>
						  </li>
						  <li>
							<h6>Age</h6>
							<i class="fas fa-user"></i>
							<span>46</span>
						  </li>
						</ul>
						<div class="staffBox_action">
						  <a  class="btn btn-third" href="http://hireforcare.com/view_profile.php?emp_id=emp_23">View profile</a>
						</div>
					  </div>
					</div>
				  </div>
				<div class="col-md-12 text-center" > 
					<a data-aos="fade-down" data-aos-delay="400" class="btn btn-primary" href="find-staff.php">Browse All Profiles<i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
			</div>
		</div>
	</div>
		<!-- End Featured Profiles ================================================== -->
		<!-- Start paln_section ================================================== -->
	<div id="services" class="section  paln_section">
		<div class="bg-v">
			<div class="bg-v-1 bg-t-l">
			</div>
			<div class="bg-v-2 bg-b-l">
			</div>
		</div>
		<div class="container">
			<h2 data-aos="fade-up" data-aos-delay="400" class="section_h">Nannies Membership Plans</h2>
			<!--<div class="planduration" data-aos="fade-in" data-aos-delay="400">-->
			<!--	<div class="custom-control custom-switch text-center">-->
			<!--	  <label class="before-custom-control-label" for="customSwitch1"> <span>Billed Monthly</span></label>-->
			<!--	  <input type="checkbox" class="custom-control-input" id="customSwitch1">-->
			<!--	  <label class="custom-control-label" for="customSwitch1"> <span>Billed Quarterly</span> </label>-->
			<!--	 <div class="small-alert alert-success"> Save 21%  </div>-->
				<!--</div>-->
			<!--</div>-->
			<div class="row">
			    <div class="col-md-12 mb-3">
					<div class="plan_box plan_box_hoverd">
						<div class="populer_plan">
							Premium Service <span class="badge badge-success">Most Popular</span>
						</div>
					
						
						<h5 class="">We will partner you during the entire journey:</h5>
						<div class="mt-5 ">
						<div class="row">
						    <div class="col-md-6">
						        <ul>
							<li><i class="fas fa-check"></i>100% verified helpers</li>
							<li><i class="fas fa-check"></i>UNLIMITED FREE Replacements</li>
							<li><i class="fas fa-check"></i>2 days trial as per your comfort</li>
							
						</ul>
						    </div>
						    <div class="col-md-6">
						        <ul>
							
							<li><i class="fas fa-check"></i>Customized trainings as per your requirement</li>
          					<li><i class="fas fa-check"></i>Dedicated Relationship Manager</li>
          					<li><i class="fas fa-check"></i>Medically insured & Doctor on call facility</li>
						</ul>
						    </div>
						    
						    
						</div>
						</div>
						<div><a class="btn btn-third" href="services/premium_service.php">View More</a></div>
						
					</div>
				</div>
			    
				<div class="col-md-4" data-aos="fade-left" data-aos-delay="600">
					<div class="plan_box">
					    <div class="populer_plan">
							Verify your existing staff
						</div>
						
						
						<!--<div class="plan_price pl-monthly">-->
						<!--	<h4><strong>₹8000</strong>/ monthly</h4>-->
						<!--</div>-->
						
						<h6> Verify your employees/helpers with highest accuracy & speed. At lowest pricing
</h6>
						<ul>
							<li><i class="fas fa-check"></i>Criminal Background Check</li>
							<li><i class="fas fa-check"></i>Documents checked</li>
							<li><i class="fas fa-check"></i>Cost Effective, starting from Rs. 99 onwards</li>
							<li><i class="fas fa-check"></i>Online- Easy & Convenient</li>
          					<li><i class="fas fa-check"></i>Quick Turnaround Time [within 4 working days]</li>
						</ul>
						<a class="btn btn-third" href="services/verify_helper.php">View More</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="plan_box plan_box_hoverd">
						<div class="populer_plan">
						Health Insurance for your staff
						</div>
						
						<!--<p>One time fee for one listing or task highlighted in search results.</p>-->
						<!--<div class="plan_price">-->
						<!--	<h4><strong>₹19000</strong>/ monthly</h4>-->
						<!--</div>-->
						<div class="plan_price pl-yearly hide">
							<h4><strong>₹45000</strong>/ Quarterly</h4>
						</div>
						<h6> Buy affordable Medical Insurance Now</h6>
						<ul>
							<li><i class="fas fa-check"></i>24*7 Doctor On Call Facility</li>
							<li><i class="fas fa-check"></i>Health Insurance Benefit [Cashless]</li>
							<li><i class="fas fa-check"></i>Comprehensive Health Insurance @ Rs.299/Month</li>
							<li><i class="fas fa-check"></i>24*7 Personal Helpline</li>
          					<li><i class="fas fa-check"></i>20% discount on Medicine & Lab Tests</li>
						</ul>
						<a class="btn btn-third" href="services/health_insurance.php">View More</a>
					</div>
				</div>
				<div class="col-md-4" data-aos="fade-right" data-aos-delay="600">
					<div class="plan_box">
                        <div class="populer_plan">
						Contact Helpers Directly

						</div>
						
						<!--<p>One time fee for one listing or task highlighted in search results.</p>-->
						<!--<div class="plan_price">-->
						<!--	<h4><strong>₹25000</strong>/ monthly</h4>-->
						<!--</div>-->
						<div class="plan_price pl-yearly hide">
							<h4><strong>₹60000</strong>/ Quarterly</h4>
						</div>
						<h5>Hire Staff for your requirement</h5>
						<ul >
							<li><i class="fas fa-check"></i>Search helpers competency</li>
							<li><i class="fas fa-check"></i>Buy hiring package at Rs. 1999</li>
							<li><i class="fas fa-check"></i>Get an direct access of numbers</li>
							<li><i class="fas fa-check"></i>Contact us for replacement</li>
							<li><i class="fas fa-check"></i>Guaranteed </li>
          				
						</ul>
						<a class="btn btn-third" href="services/subscription-charges.php">View More</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section post_section">
		<div class="bg-v">
			<div class="bg-v-2 bg-t-l">
			</div>
			<div class="bg-v-2 bg-b-r">
			</div>
		</div>
		<div class="container">
			<h2 data-aos="fade-up" data-aos-delay="400" class="section_h">Services</h2>
			<div class="row">
				<div class="col-md-4" >
					<div class="post_box">
						<img  alt="" src="assets/images/blog1_babysitter.jpg" class="img-responsive">
						<div class="post_content">
							<h6>
								<a href="blog-single.html">Child Care Babysitter, Nanny services</a>
							</h6>
							<p>Child Care Services - List of part time, full time babysitters, nanny, baby care, child caretaker and baby sitting services at your place</p>
							<!-- <a class="btn btn-secondary btn-rounded" href="blog-single.html">Continue reading</a> -->
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="post_box">
						<img   alt="" src="assets/images/blog3_maid-service1.jpg" class="img-responsive">
						<div class="post_content">
							<h6>
								<a href="blog-single.html">Full Time Maid House services</a>
							</h6>
							<p>Just hand of a professional Maid can make house tidy and neat. Our Maids have full experienced, 100% satisfaction from all clients</p>
							<!-- <a class="btn btn-secondary btn-rounded" href="blog-single.html">Continue reading</a> -->
						</div>
					</div>
				</div>
				<div class="col-md-4" >
					<div class="post_box">
						<img  alt="" src="assets/images/blog2_indian-old-age-care.jpg" class="img-responsive">
						<div class="post_content">	
							<h6>
								<a href="#"> Old Age Homes Support for Elderly and Senior Citizens</a>
							</h6>
							<p>Empowering elders to live a simplified & comfortable life and combating their loneliness </p>
							<!---<a class="btn btn-secondary btn-rounded" href="contact_us.php">Contact Us</a>-->
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>
	<div class="section status_section">
		<div class="bg-v">
			<div class="bg-v-1 bg-t-r">
			</div>
			<div class="bg-v-2 bg-b-l">
			</div>
		</div>

		
</main>

<!-- Main End -->

	<!--Footer  -->


		<?php include $_SERVER['DOCUMENT_ROOT']."/includes/footer.php" ?>
	
<!-- Footer -->
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/aos.js"></script>
<script src="assets/js/custom.js"></script>
<script src="script.js"></script>
</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:47:37 GMT -->
</html>

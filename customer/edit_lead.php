
<?php
require('../db.php');
session_start();
  
include('../function/functions.php');
admin_manager_customer();

// include('../includes/header.php') ;
$cust_id=$_GET['cust_id'];
// session_start();

// echo $username;
$select_query = "SELECT * FROM cust_tab where cust_id='$cust_id'";
// echo $select_query; die;
$result=mysqli_query($databaseConnection, $select_query);
$data=mysqli_fetch_assoc($result);
// echo $data['type'];
// exit;



?>




<!doctype html>
<html lang="en">

<!-- Mirrored from veepixel.com/tf/html/jodice/registration.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>JoDice</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" href="assets/images/fav.png" type="image/gif" sizes="64x64">

<!-- CSS
================================================== -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&amp;display=swap&amp;subset=latin-ext" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/all.min.css">
<link href="../assets/css/aos.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link href="../assets/css/select2.min.css" rel="stylesheet" />
<link href="../assets/css/owl.carousel.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/color-1.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<!-- Header 01
================================================== -->
<header class="header_01 header_inner">
	<div class="header_main">
	    <?php

include('../includes/header.php') ;
  ?>
		<div class="header_btm">
      <h2>Edit Leads</h2>
    </div>
	</div> 
  </header>

<?php 

$username = $_SESSION["username"];  


?>


<!-- End Header 02
================================================== -->

<!-- Main 
================================================== -->
<main>
  <div class="only-form-pages">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        	<div class="only-form-box">		
            <div class="welcome-text text-center mb-5">
              
              
            </div>
				
					<div class="com_class_form">
						<div class="form-group user_type_cont">
              <label class="user_type" for="usertype-1">
                <input type="radio" checked="" name="usertype" id="usertype-1" value="job seeker" >
                <span><i class="far fa-user"></i><?= $data['first_name'];  ?> <?= $data['last_name']; ?></span>
                <p>Customer_id : <?= $data['cust_id'];   ?></p>
              </label>
              <!-- <label class="user_type" for="usertype-2">
                <input type="radio" name="usertype" id="usertype-2" value="employer" >
                <span><i class="fas fa-landmark"></i> Employer</span>
              </label> -->
            </div>
            <form action="edit_lead_save.php" method="post">

<!-- Only Admin anager Access Area -->
            
           
               <?php if($_SESSION['role_id']==1) {?>
            <div class="form-group">
                <label>Customer ID </label>
							<input value="<?php echo $data['cust_id'] ?>" name="new_cust_id" class="form-control" type="text" size="40" placeholder="">
							<input value="<?php echo $data['cust_id'] ?>" name="cust_id" class="form-control" type="hidden" size="40" placeholder="Location ">
							<span class="text-danger"> only admin can access </span>
						</div>
						
						<?php  } ?>
						
						
						
				

							
				
						
						
						
						
<!-- Only Manager Access Area -->
            <?php if($_SESSION['role_id']<3) {?>
                
            <div class="form-group">  
							 <select class="form-control"   name="agent_name">
                <option value="" <?php if($data['agent'] == ''){echo 'selected="selected"';}?> >Select Manager</option>
                
                <option value="Ranjana" <?php if($data['agent'] == 'Ranjana'){echo 'selected="selected"';}?>>Ranjana</option>
                <option value="Rupali" <?php if($data['agent'] == 'Rupali'){echo 'selected="selected"';}?>>Rupali</option>
                <option value="Madhvi" <?php if($data['agent'] == 'Madhvi'){echo 'selected="selected"';}?>>Madhvi</option>
                <option value="Rajat" <?php if($data['agent'] == 'Rajat'){echo 'selected="selected"';}?>>Rajat</option>
                <option value="Ram" <?php if($data['agent'] == 'Ram'){echo 'selected="selected"';}?>>Ram</option>
                
</select>
						</div>
            <div class="form-group">  
							 <select class="form-control"   name="status">
                <option value="" disabled>Select status</option>
                
                <option value="New" <?php if($data['status'] == 'New'){echo 'selected="selected"';}?>>New</option>
                <option value="Live" <?php if($data['status'] == 'Live'){echo 'selected="selected"';}?>>Live</option>
                <option value="Re-Open" <?php if($data['status'] == 'Re-Open'){echo 'selected="selected"';}?>>Re-Open</option>
                <option value="On Hold" <?php if($data['status'] == 'On Hold'){echo 'selected="selected"';}?>>On Hold</option>
                <option value="Under Rep" <?php if($data['status'] == 'Under Rep'){echo 'selected="selected"';}?>>Under Rep</option>
                <option value="Not Live" <?php if($data['status'] == 'Not Live'){echo 'selected="selected"';}?>>Not Live</option>
                <option value="Not Conv" <?php if($data['status'] == 'Not Conv'){echo 'selected="selected"';}?>>Not Conv</option>
</select>
						</div>

            <div class="form-group">
            <label class="text-ligth" for="birthday">Call Back</label>
              <input name="call_back" class="form-control" type="datetime-local"  size="40" placeholder="Call Back">
            </div>
						<div class="form-group">
							<textarea  class="form-control" name="remark" id="" cols="30" rows="5" placeholder="Remark"></textarea>
						</div>


<!-- Only Manager Access Area -->





<?php  }?>
<label for="">Account Details *</label>
<div class="form-group">
							<input value="<?php echo $data['first_name'] ?>" name="f_name" class="form-control" type="text" size="40" placeholder="First Name ">
						</div>
            <div class="form-group">
							<input value="<?php echo $data['last_name'] ?>" name="l_name" class="form-control" type="text" size="40" placeholder="Last Name ">
						</div>
            <div class="form-group">
							<input value="<?php echo $data['mobile'] ?>" name="mobiles" class="form-control" type="number" size="40" placeholder="Mobile No ">
						</div>
            <div class="form-group">
							<input value="<?php echo $data['email'] ?>" name="emails" class="form-control" type="email" size="40" placeholder="Email">
						</div>
            <a data-target="#demo"  data-toggle="collapse" >Requirements Details <i class="fas fa-chevron-down"></i> </a>
            
  <div id="demo" class="collapse">
    <div class="form-group">  
							 <select class="form-control"   name="type">
                             
                <option value="" disabled>Select Type</option>
                <option value="BabyCare" <?php if($data['type'] == 'BabyCare'){echo 'selected="selected"';}?>>BabyCare</option>
                <option value="Cooking" <?php if($data['type'] == 'Cooking'){echo 'selected="selected"';}?>>Cooking</option>
                <option value="Cleaning" <?php if($data['type'] == 'Cleaning'){echo 'selected="selected"';}?>>Cleaning</option>
                <option value="All" <?php if($data['type'] == 'All'){echo 'selected="selected"';}?>>All</option>
</select>

						</div>
            <div class="form-group">
							<input value="<?php echo $data['location'] ?>" name="location" class="form-control" type="text" size="40" placeholder="Location ">
						</div>
            <!-- Hidden Inputes -->
                        <div class="form-group">
							<input value="<?php echo $data['id'] ?>" name="id" class="form-control" type="hidden" size="40" placeholder="Location ">
						</div>
            
            
            <!-- Hidden Inputes -->
            <div class="form-group">
							<select name="duration" class="form-control">
                <option  disabled >Select Duration</option>
  <option value="8hr" <?php if($data['duration'] == '8hr'){echo 'selected="selected"';}?>>8hr</option>
  <option value="12hr" <?php if($data['duration'] == '12hr'){echo 'selected="selected"';}?>>12hr</option>
  <option value="24hr" <?php if($data['duration'] == '24hr'){echo 'selected="selected"';}?>>24hr</option>
  
</select>
						</div>
            <div class="form-group">
						<select class="form-control" name="age">
                <option value="" disabled >Select Age</option>
  <option value=">18yr" <?php if($data['age'] == '>18yr'){echo 'selected="selected"';}?>>>18yr</option>
  <option value=">25yr" <?php if($data['age'] == '>25yr'){echo 'selected="selected"';}?>>>25yr</option>
  <option value=">35yr" <?php if($data['age'] == '>35yr'){echo 'selected="selected"';}?>>>35yr</option>
  
</select>
						</div>
            <div class="form-group">
							<input <?php if ($_SESSION['role_id']>1){echo 'readonly';}?>  value="<?php  echo $data['monthly_pay']; ?>" name="month_pay" class="form-control" type="text" size="40" placeholder="Monthly Pay ">
					</div>

          <div class="form-group">
							<textarea value="<?php echo $data['message'];  ?>" class="form-control" name="message" id="" cols="30" rows="10" placeholder="Message "></textarea>
						</div>
                        <div class="form-group">
							<input readonly  value="<?php  echo $username; ?>" name="username" class="form-control" type="text" size="40" placeholder="username ">
					</div>
  </div>
						
						<div class="form-group">
							<input class="btn btn-primary" type="submit" value="Update" >
						</div>
            <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember me
              </label>
            </div>
            
					</div>
				</form>
        <div class="social_login">
              <p class="or_span"><span>or</span></p>
              <button class="btn btn-facebook"><i class="fab fa-facebook-f"></i> Log In via Facebook</button>
              <button class="btn btn-google"><i class="fab fa-google-plus-g"></i> Register via Google+</button>
            </div>
			</div>
        </div>
      </div>
    </div>
  </div>
</main>


<!-- Footer Container
================================================== -->
<footer id="colophon" class="site-footer custom_footer dark_footer">
  <div class="container">
    <div class="row footer_widget">
        <div class="col-md-3">
          <div class="footer_widget_box">
            <h2>Job seekers</h2>
            <ul>
              <li>
                <a href="browse-jobs.html">Browse jobs</a>
              </li>
              <li>
                <a href="job-single.html">Job single</a>
              </li>
              <li>
                <a href="my-stared-jobs.html">My stared jobs</a>
              </li>
              <li>
                <a href="edit-profile.html">Update my profile</a>
              </li>
              <li>
                <a href="edit-password.html">Change password</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="footer_widget_box">
            <h2>Employers</h2>
            <ul>
              <li>
                <a href="emp-registration.html">Get a FREE Employer Account</a> 
              </li>
              <li>
                <a href="post-a-job.html">Post a job</a>
              </li>
              <li>
                <a href="find-staff.html">Find staff</a>
              </li>
              <li>
                <a href="job-dashboard.html">Job dashboard</a>
              </li>
              <li>
                <a href="emp-edit-profile.html">Update profile</a>
              </li>
              <li>
                <a href="emp-edit-password.html">Change password</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="footer_widget_box">
            <h2>Community</h2>
            <ul>
              <li> <a href="contact-us.html">Help / Contact Us</a> 
              </li>
              <li> <a href="content-page.html">Guidelines</a> 
              </li>
              <li> <a href="content-page.html">Terms of Use</a> 
              </li>
              <li> <a href="content-page.html">Privacy &amp; Cookies </a> 
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="footer_widget_box">
            <h2>Get In Touch</h2>
            <ul class="social_list">
              <li> <a href="#"><i class="fab fa-twitter"></i></a> 
              </li>
              <li> <a href="#"><i class="fab fa-facebook"></i></a> 
              </li>
              <li> <a href="#"><i class="fab fa-linkedin"></i></a> 
              </li>
              <li> <a href="#"><i class="fab fa-youtube"></i></a> 
              </li>
            </ul>
          </div>
          <div class="footer_widget_box">
						<form class="newsletter">
			                  <h2>Newsletter</h2>
			                  <div class="d-flex">

			                    <input class="form-control" type="email" placeholder="Enter your email ">
			                    <button class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
			                   
			                  </div>
		                   
		                </form>
		            </div>
        </div>
        <div class="col-md-12">
          <div class="footer_widget_box">
            <p class="copyright-text">© Copyright 2020 by JoDice. All rights reserved.
            </p>
          </div>
        </div>
      </div>
    <!-- .site-info -->
  </div>
</footer>


<!-- End Footer Container
================================================== -->

<!-- Scripts
================================================== -->
<script src="../assets/js/jquery-3.4.1.min.js"></script>
<script src="../assets/js/select2.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/aos.js"></script>
<script src="../assets/js/custom.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->

</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/registration.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
</html>

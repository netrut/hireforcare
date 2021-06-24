<?php
session_start();
include('../function/functions.php');
$hidden_pass = uniqid();

// We need to use sessions, so you should always start sessions using the below code.

// $name = $_SESSION["username"]; 

// print_r($name); die;
// If the user is not logged in redirect to the login page...
// if (!isset($_SESSION['loggedin'])) {
// 	header('Location: Registration/login.php');
// // 	exit;
// }

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
<?php  include('../includes/header.php'); ?>
		<div class="header_btm">
      <h2>Candidate Registration</h2>
    </div>
	</div> 
  </header>

  


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
              <h5 class="mb-0">Create an account!</h5>
              <span>Already have an account? <a href="../registration/login.php">Log In!</a></span>
              <?php if(@$_GET['s']==1){ ?>
                      <div class="alert alert-success" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Successfully!</strong>
   Account Created, Login Now
</div>
<?php } ?>
            </div>
				
					<div class="com_class_form">
						<div class="form-group user_type_cont">
              <label class="user_type" for="usertype-1">
                <input type="radio" checked="" name="usertype" id="usertype-1" value="job seeker" >
                <span><i class="far fa-user"></i>Candidate</span>
              </label>
              <!-- <label class="user_type" for="usertype-2">
                <input type="radio" name="usertype" id="usertype-2" value="employer" >
                <span><i class="fas fa-landmark"></i> Employer</span>
              </label> -->
            </div>
            <form action="backend.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label for="">Name <span class="text-danger">*</span></label>
							<input type="text" name="first_name"  class="form-control"  placeholder="Enter Name">
						</div>
            <div class="form-group">
            <label for="">Last Name <span class="text-danger">*</span></label>
							<input type="text" name="last_name"  class="form-control "  placeholder="Enter Last Name" >
							<div class="invalid-feedback">
                                 Email Already Registerd
                              </div>
						</div>
            <div class="form-group">
            <label for="">Email</label>
							<input type="email"  name="email"  class="form-control <?php if($_GET['email']==f){echo "is-invalid";} ?>" id="inputMobile" placeholder="Email" >
							<div class="invalid-feedback">
                                 Email Already Registerd
                              </div>
						</div>
            <div class="form-group">
            <label for="">Mobile No <span class="text-danger">*</span></label>
							<input type="number"  name="mobile_no"  class="form-control <?php if($_GET['m']==f){echo "is-invalid";} ?>" id="inputMobile" placeholder="Enter Contact" required>
							<div class="invalid-feedback">
                                 Mobile No Already Registerd
                              </div>
						</div>
						<div class="form-group">
							<input <?php if($_SESSION['role_id']==2 || $_SESSION['role_id']==1){echo "hidden";} ?> name="password" class="form-control" value="<?php if($_SESSION['role_id']==2 || $_SESSION['role_id']==1){echo $hidden_pass;} ?>" type="password" size="40" placeholder="Password* " required> 
						</div>
						
						
						
            
            <div class="form-group">
            <label for="">Main Photo</label>
              <input type="file"  name="photo"  class="form-control" >
            </div>
						<div class="form-group">
							<label for="inputAddress">Address</label>
    <input type="text"  name="address"  class="form-control"  placeholder="Enter Address" >
						</div>
            <a data-target="#demo"  data-toggle="collapse" >Additional Details <i class="fas fa-chevron-down"></i> </a>
  <div id="demo" class="collapse">
    <div class="form-group">  
							 <label for="inputAddress">Area</label>
    <input type="text"  name="current_location"  class="form-control"  placeholder="Enter Current Location">
						</div>
            <div class="form-group">
							<label for="inputAddress">City</label>
    <input type="text"  name="city"  class="form-control"  placeholder="Enter City Name">
						</div>
            <div class="form-group">
							<label for="inputAddress">PIN Code</label>
    <input type="text"  name="pin_no"  class="form-control"  placeholder="Enter PIN No">
						</div>
<!--            <div class="form-group">-->
<!--						<label for="inputCallStatus">Call Status</label>-->
<!--      <select name="call_status"  class="form-control">-->
<!--          <option value="" selected disabled> Choose Option </option>-->
<!--<option>Picked, Interested</option>-->
<!--<option>Picked, Misbehaved</option>-->
<!--<option>Picked, Not Interested</option>-->
<!--<option>Picked, Call me later</option>-->
<!--<option>Not Reachable</option>-->
<!--<option>Number Busy/Waiting</option>-->
<!--<option>Ringing</option>-->
<!--<option>Invalid Number</option>-->

<!--<option>Service not applicable</option>-->

<!--</select> -->
<!--						</div>-->
            <div class="form-group">
							<label for="inputduration">Working Hours</label>
      <select name="duration"  class="form-control">
<option selected disabled> Choose Option </option>
<option>Full Day (max 12 hours)</option>
<option>Live-in (24 hrs)</option>
<option>Part Time (1-4 hrs)</option>
<option>Night Shift</option>

</select>
					</div>

          <div class="form-group">
							<label for="inputRemarks">Remarks</label>
      <input type="text"  name="remarks"  class="form-control" id="inputRemarks" placeholder="Enter Remark">
						</div>

            <div class="form-group">
							<label for="inputexperience">Experience</label>
      <select name="experience"  class="form-control">
<option selected disabled> Choose Option </option>
<option value="0">Fresher</option>
<option value="0-2">less 2 Years</option>
<option value="2-5">2-5 Years</option>
<option value="5-30">>5 Years</option>





</select> 
						</div>

            <div class="form-group">
							 <label for="inputTasks">Tasks</label>
      <select name="tasks"  class="form-control">
<option selected disabled> Choose Option </option>
<option>Cleaning</option>
<option>Cooking</option>
<option>Baby Care</option>
<option>Japa Nanny</option>
<option>Baby Care+Cooking</option>
<option>Baby Care+Cleaning</option>
<option>Cooking+Cleaning </option>
<option>Baby Care+Cooking+Cleaning</option>


</select> 
						</div>

            <div class="form-group">
							 <label for="inputRefrenceCheck">Refrence Check</label>
    <select name="reference_check"   class="form-control">
<option selected disabled>Choose Option</option>
<option>Yes</option>
<option>No</option>


</select> 
						</div>

            <div class="form-group">
							 <label for="inputFNFname">Relative Name</label>
      <input type="text" name="fnf_name"  class="form-control"  placeholder="Enter FNF Name">
						</div>

            <div class="form-group">
							 <label for="inputFNFnumber">Relative Number</label>
      <input type="text"  name="fnf_number"  class="form-control"  placeholder="Enter FNF Number">
						</div>

<div class="form-group">
							 <label for="inputTasks">Age</label>
      <select name="age"  class="form-control">
<option selected disabled> Choose Option </option>
<option>18-25</option>
<option>26-35</option>
<option>36-45</option>
<option>46-55</option>
<option>56+</option>


</select> 
						</div>
    <!--        <div class="form-group">-->
				<!--			 <label for="inputAge">Age</label>-->
    <!--<input type="text"  name="age"  class="form-control"  placeholder="Enter Age">-->
				<!--		</div>-->

            <div class="form-group">
							 <label for="inputAge">Religion</label>
							 <select name="religion"  class="form-control">
          <option disabled>Choose Option</option>
          <option>Hindu</option>
          <option>Muslim</option>
          <option>Bengali</option>
          <option>Others</option>
          
          
</select> 
    
						</div>


<div class="form-group">
							 <label for="inputIdCardName">Id Card Name</label>
    <input type="text"  name="id_card_name"  class="form-control"  placeholder="Enter Id Card Name">
						</div>

<div class="form-group">
							 <label for="inputIdCardNumber">Id Card Number</label>
    <input type="number"  name="id_card_number"  class="form-control"  placeholder="Enter Id Card Number">
						</div>
            <div class="form-group">
							 <label for="inputIdCardFron">Id Card Front Photo</label>
    <input type="file"  name="id_card_front_photo"  class="form-control" >
						</div>
						
            <div class="form-group">
							 <label for="inputIdCardBack">Id Card Back Photo</label>
    <input type="file"  name="id_card_back_photo"  class="form-control">
						</div>
						
						<div class="form-group">
							 <label for="inputIdCardBack">Upload Verification Report</label>
    <input type="file"  name="upload_verification_report"  class="form-control">
						</div>
						
						<div class="form-group">
							 <label for="inputIdCardBack">Upload Covid Test Report</label>
    <input  type="file"  name="upload_covid_report"  class="form-control">
						</div>

            <div class="form-group">
    <label for="inputReferredChannel">Referred Channel</label>
    <select name="referred_channel"  class="form-control">
<option class="disabled">Choose</option>
<option selected disabled> Choose Option </option>
<option>Workindia</option>
<option>Helper4You</option>
<option>By Reference</option>
<option>Cold Calling</option>
<option>Others</option>





</select>

    <!-- <input type="text"  name="referred_channel"  class="form-control" placeholder="Enter Referred Channel"> -->
  </div>

   <div class="form-group">
							   <label for="inputReferreedName">Referred By Name</label>
      <input type="text" name="referred_by_name"  class="form-control"  placeholder="Referred By Name">
    
						</div>


             <div class="form-group">
							 <label for="inputReferredNumber">Referred By Number</label>
      <input type="text"  name="referred_by_number"  class="form-control"  placeholder="Enter Referred By Number">
						</div>

             <div class="form-group">
							 <label for="inputFormFilled">Form Filled Up By</label>
    <input type="text" readonly  name="form_filled_up_by"  class="form-control" value="<?php   echo $name; ?>">
						</div>
             
						
						
            
					</div>
					
					<?php if(!$_SESSION['role_id']==1 || !$_SESSION['role_id']==2){ ?>
					
					<div class="form-group form-check">
                     <label class="form-check-label">
                    <input name="tnc" class="form-check-input" type="checkbox" value="agree" id="invalidCheck" required> Agree to <a href="helper_T&C.php">terms & conditions</a> and <a href="helper_privacy_policy.php">Privacy-policy</a>
                    </label>
                        
                    </div>
                    
                    <?php  } ?>
          <div class="form-group">
							<input class="btn btn-primary" type="submit" value="Register" >
						</div>
            <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember me
              </label>
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
<?php include('../includes/footer.php'); ?>

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
<script src="../assets/js/custom.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->

</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/registration.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
</html>

<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.php");
    exit;
}
 
// Include config file
require_once "db.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 $username = trim($_POST["mobile"]);
 $password = trim($_POST["password"]);
 $tnc = trim($_POST['tnc']);
    // // Check if username is empty
    // if(empty(trim($_POST["mobile"]))){
    //     $username_err = "Please enter username.";
    // } else{
    //     $username = trim($_POST["mobile"]);
    // }
    
    // // Check if password is empty
    // if(empty(trim($_POST["password"]))){
    //     $password_err = "Please enter your password.";
    // } else{
    //     $password = trim($_POST["password"]);
    // }
    if(!empty($_POST['tnc'])){
        $update_tnc  = "UPDATE user SET tnc='$tnc' where phone='$username'";
        
        $run_user=mysqli_query($link,$update_tnc);
        if($run_user){
            $update_cust_tab = "UPDATE cust_tab SET tnc='$tnc' where mobile='$username'";
            $run_update_cust_tab=mysqli_query($link,$update_cust_tab);
        }
        else{
            echo "error accured in update user tnc";
        }
        
    }
    
    // Validate credentials
    if(!empty($_POST["mobile"]) && !empty($_POST["password"])){
        // Prepare a select statement
        $sql = "SELECT id, username, password, phone,email , role_id , user_id, active,tnc FROM user WHERE phone = '$username' OR email = '$username'";
        // echo $sql; die;


        // echo $sql; die;
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $phone,$email,$role_id,$user_id,$active,$tnc);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            if($role_id==3 || $role_id==4){
                               
                                if($active==0 && $tnc==""){
                                    
                                       echo "<script>
                                                        window.location.href = 'login.php?e=nv&email=$email&hash=$password&tnc=notagreed';
                                            </script>"; 
                                            exit();
                                    }elseif($active==0){
                                    echo "<script>
                                                        window.location.href = 'login.php?e=nv&email=$email&hash=$password';
                                            </script>";
                                            exit();
                                            

                                }elseif($tnc==""){
                                    echo "<script>
                                                        window.location.href = 'login.php?tnc=notagreed';
                                            </script>"; 
                                            exit();
                                }
                            }
                            

                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username; 
                            $_SESSION["phone"] = $phone; 
                            $_SESSION["email"] = $email;
                            $_SESSION["role_id"] = $role_id;
                            $_SESSION['user_id'] = $user_id;
                           
                           if($role_id==1){
                             header("location: ../dashboard/admin_dashboard.php");
                           } elseif($role_id==2){
                             header("location: ../dashboard/manager_dashboard.php");
                           }
                           elseif($role_id==3){
                             header("location: ../dashboard/dashboard3.php");
                           }elseif($role_id==4){
                            //   echo $role_id;
                            //  header("location: ../dashboard/dashboard4.php");
                          echo '<script>window.location.href = "../dashboard/dashboard4.php";</script>';
                           }
                            
                        } else{
                            // Display an error message if password is not valid
                            echo "<script>
  window.location.href = 'login.php?password=f';
</script>";
exit();
    
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                   echo "<script>
  window.location.href = 'login.php?mobile=f';
</script>";
exit();
    
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>



<!doctype html>
<html lang="en">

<!-- Mirrored from veepixel.com/tf/html/jodice/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:52:17 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>HireFOrCare</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" href="../assets/images/fav.png" type="image/gif" sizes="64x64">

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
</head>
<body>

<!-- Header 01
================================================== -->
<header class="header_01 header_inner">
	<div class="header_main">
		<?php include('../includes/header.php') ?>	
		
		
		<div class="header_btm">
      <h2>Login</h2>
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
        	
        	
        	<?php if($_GET['email']==resend) { ?> 
			    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong> Mail Set</strong> ! Successfully
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>	
			    <?php } ?>
        	
        	<?php if($_GET['ac']==s) { ?> 
			    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong> Thanks for registration!</strong> <br> <span class="text-danger">Check your inbox and verify email</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>	
			    <?php } ?>
			   
<!--        	<?php if($_GET['tnc']==notagreed) { ?> -->
<!--			    <div class="alert alert-danger alert-dismissible fade show" role="alert">-->
<!--   Please Agree below Terms and conditions-->
<!--  <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
<!--    <span aria-hidden="true">&times;</span>-->
<!--  </button>-->
<!--</div>	-->
<!--			    <?php } ?>-->
			    
			    
			    
        	<!--Email verify Error-->
        	<?php if($_GET['e']==nv) { ?> 
			    <div class="alert alert-danger alert-dismissible fade show" role="alert">
   Please Verify Your Email<a href="../mail.php?custresend=1&email=<?=$_GET['email'];?>&hash=<?=$_GET['hash'];?>" class="alert-link"> resend email</a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>	
			    <?php } ?>
			    <!-------------------Email verified massage------->
			    <?php if($_GET['e']==v) { ?> 
			    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Well Done!</strong> Email Verified Login Now
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>	
			    <?php } ?>
    				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    					<div class="com_class_form">
    						<div class="form-group" <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>>
    					
    							<input class="form-control <?php if($_GET['mobile']==f){echo "is-invalid";} ?>" type="text" name="mobile" size="40" placeholder="Mobile No / Email" required>
    							<div class="invalid-feedback">
                                 Invalid Mobile Number
                              </div>
    						</div>
    						<div class="form-group" <?php echo (!empty($password_err)) ? 'has-error' : ''; ?> >
    							
    							<input class="form-control <?php if($_GET['password']==f){echo "is-invalid";} ?>" type="password" name="password" placeholder=" Password " required>
    							<div class="invalid-feedback">
                                 Invalid Password
                              </div>
    						</div>
    						
    						<?php if($_GET['tnc']=="notagreed"){?>
    						
    						<div class="form-group form-check">
                     <label class="form-check-label">
                    <input name="tnc" class="form-check-input" type="checkbox" value="agree" id="invalidCheck" required> Agree to <a href="../customer/terms-condition.php">terms & conditions</a> and <a href="../customer/privacy-policy.php">Privacy-policy</a>
                    </label>
                        
                    </div>
                    <?php } ?>
    						
    						
    						<div class="form-group">
    							<input class="btn btn-primary" type="submit" value="Login">
                 
    						</div>
                
                <!--<div class="form-group form-check">-->
                <!--  <label class="form-check-label">-->
                <!--    <input class="form-check-input" type="checkbox"> Remember me-->
                <!--  </label>-->
                <!--</div>-->
                <div>
                    <a class="../lost_password.php" href="../lost_password.php"> Lost your password?</a>
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
<script src="../assets/js/custom.js"></script>
</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:52:17 GMT -->
</html>

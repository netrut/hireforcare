<?php
require('db.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email  = $_POST['email'];
    // echo $email; die;
    $find_email = "Select email from user where email='$email'";
    // echo $find_email; die;
    $run_find_mail = mysqli_query($databaseConnection,$find_email);
    $result = mysqli_num_rows( $run_find_mail );
    // echo $result; die;
    if($result<=0){
        echo "<script>
  window.location.href = 'lost_password.php?email=f';
</script>";
exit();
    }else{
echo "<script>
  window.location.href = 'mail.php?lost_p=f&email=$email';
</script>";
    }
    
    
}

// print_r($_POST);
// die;




?>


<!doctype html>
<html lang="en">

<!-- Mirrored from veepixel.com/tf/html/jodice/lost-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:52:17 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>HireForCare</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" href="assets/images/fav.png" type="image/gif" sizes="64x64">

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
</head>
<body>

<!-- Header 01
================================================== -->
<header class="header_01 header_inner">
	<div class="header_main">
		<?php include('includes/header.php') ?>	
		<div class="header_btm">
      <h2>Lost Password</h2>
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
				<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<div class="com_class_form">
						<div class="form-group">
					   <label><span class="normal-font-w">Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.</span></label>
							<input class="form-control <?php if($_GET['email']==f){echo "is-invalid";} ?>" type="text" name="email" size="40" placeholder=" Username or email address * ">
							<div class="invalid-feedback">
                                 Email Not Registerd
                              </div>
						</div>
						<div class="form-group">
							<input class="btn btn-primary" type="submit" value="Reset Password" >
						</div>
					</div>
				</form>
			</div>
        </div>
      </div>
    </div>
  </div>
</main>


<!--Footer  -->

	<?php include('includes/footer.php') ?>
<!-- Footer -->
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/aos.js"></script>
<script src="assets/js/custom.js"></script>
</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/lost-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:52:17 GMT -->
</html>

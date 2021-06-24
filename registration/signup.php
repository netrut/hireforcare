<?php
// Include config file
session_start();
require_once "db.php";
 include('../function/functions.php');

 admin();
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $mobile=$_POST["mobile"];
  $email=$_POST["email"];
  $last_name=$_POST["last_name"];
  $username = trim($_POST["username"]);

//Check Mobile NO
$check_mob="SELECT count(phone) FROM user where phone='$mobile'";
$runcheck_mob=mysqli_query($link,$check_mob);
while($response=mysqli_fetch_assoc($runcheck_mob)){
    $data[]=$response;
}

foreach($data as $value){
    $mob= $value['count(phone)'];
    // echo $mob;  die;
}

if($mob>0){ 
  echo "<script>
  window.location.href = 'signup.php?m=f';
 

</script>"; 
// echo "yes"; die;

}
else{
// echo "no"; die;
// Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if( empty($password_err)){
      if(empty($confirm_password_err)){

      
        
        // Prepare an insert statement
        $sql = "INSERT INTO user (username, password,role_id,last_name,phone,email) VALUES (?, ?,2,'$last_name','$mobile','$email')";
        //  echo $sql; die;
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            // $param_role_id = $role_id;
            // Attempt to execute the prepared statement
            // echo $stmt; die;
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later."; die;
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }else{echo 'eror'; die;}

        }else{
        echo "<script>
        window.location.href = 'signup.php?cp=f';
  
 

</script>"; 
    
      }
    }else{
      echo "<script>
  window.location.href = 'signup.php?p=f';
 

</script>"; 
    }

}

     
   
    
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Animated Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css" /> -->
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap"
      rel="stylesheet"
    />
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

    <style  type="text/css">
        

        .help-block{color:red;}
        #username{
        }
    </style>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  </head>
  <body>

<!-- Header 01
================================================== -->
<header class="header_01 header_inner">
	<div class="header_main">
		<?php include('../includes/header.php');
    admin();
    ?>	
		<div class="header_btm">
      <h2>Manager registration</h2>
    </div>
	</div> 
  </header>


  
  
  <div class="only-form-pages">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        	<div class="only-form-box">		
    				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    					<div class="com_class_form">
    						<div class="form-group">
    					<label for=""><i class="fas fa-user"></i> First Name</label>
    							<input type="text" name="username" value="" class="form-control" placeholder="First Name" required/>
                  <div class="valid-feedback">
        Looks good!
      </div>
    						</div>
                

                <div class="form-group">
    					<label for=""><i class="fas fa-user"></i> Last Name</label>
    							<input type="text" name="last_name" value="" class="form-control" placeholder="Last Name" required/> 
    						</div>

                <div class="form-group">
    					          <label for=""><i class="fas fa-user"></i> Mobile No</label>
    							        <input type="number" name="mobile" value="" class="form-control <?php if($_GET['m']==f){echo "is-invalid";} ?>" placeholder="Mobile no"  required/>  
                              <div class="invalid-feedback">
                                 Mobile No Already Register
                              </div>
    						</div>
                <div class="form-group">
    					          <label for=""><i class="fas fa-user"></i> Email</label>
    							       <input type="email" name="email" value="" class="form-control" placeholder="Email"  required/>  
                              <div class="valid-feedback">
                                  Looks good!
                              </div>
    						</div>
                <div class="form-group">
    					          <label for=""><i class="fas fa-user"></i> Password </label>
    							        <input type="password" name="password"  value=""class="form-control <?php if($_GET['p']==f){echo "is-invalid";} ?>"  placeholder="Password"/> 
                              <div class="invalid-feedback">
                                  Password must be 6 character
                              </div>
    						</div>
                <div class="form-group">
    					          <label for=""><i class="fas fa-user"></i>Confirm Password</label>
    							        <input type="password" name="confirm_password" value="" class="form-control <?php if($_GET['cp']==f){echo "is-invalid";} ?>" placeholder="confirm Password" />   
                              <div class="invalid-feedback">
                                  confirm Password don't match
                              </div>
    						</div>
    						
    						 

    						
    						
    						<div class="form-group">
    							<input class="btn btn-primary" type="submit" value="Sign Up">
                 
    						</div>
                
                
                <div>
                    <a class="" href=""> Already have a account?</a>
                </div>
                
    					</div>
    				</form>
            <div class="social_login">
              <p class="or_span"><span>or</span></p>
              <button class="btn btn-facebook"><i class="fab fa-facebook-f "></i> Log In via Facebook</button>
              <button class="btn btn-google"><i class="fab fa-google-plus-g"></i> Register via Google+</button>
            </div>
			     </div>
        </div>
      </div>
    </div>
  </div>


   
 
    <!-- Footer Container
================================================== -->
<?php include('../includes/footer.php') ?>

<!-- End Footer Container
================================================== -->



<!-- Scripts
================================================== -->
<script>
function myFunction() {
  document.getElementById("confirm_pass").className += " bg-info";
}
</script>
<script src="index.js"></script>
<script src="../assets/js/jquery-3.4.1.min.js"></script>
<script src="../assets/js/select2.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/aos.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/custom.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>

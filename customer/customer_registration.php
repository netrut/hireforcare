<?php
require('../db.php');
include('../user_info/UserInformation.php');

session_start();

$username = $_SESSION["username"];
$hidden_pass  = uniqid();
// print_r($_POST); die;

if($_POST){
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $number = $_POST['number'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  @$type = $_POST['type'];
  $location = $_POST['location'];
  @$duration = $_POST['duration'];

  @$age = $_POST['age'];
  $religion = $_POST['religion'];
  $month_pay = $_POST['month_pay'];
  $message = $_POST['message'];
  $created_by = $_POST['created_by'];
  $tnc = $_POST['tnc'];
  
  //---------------Check Mobile NO--------------------
$check_mob="SELECT count(phone) FROM user where phone='$number'";
$runcheck_mob=mysqli_query($databaseConnection,$check_mob);
while($response=mysqli_fetch_assoc($runcheck_mob)){
    $data[]=$response;
}

foreach($data as $value){
    $mob= $value['count(phone)'];
    // echo $mob;  die;
}

if($mob>0){ 
  echo "<script>
  window.location.href = 'customer_registration.php?m=f';
</script>";
exit();
}


if(!empty($email)){
    
$check_mail = "SELECT email from user where email='$email'";


$run_check_mail = mysqli_query($databaseConnection,$check_mail);

    $result = mysqli_num_rows( $run_check_mail );
    // echo $result; die;
    
    if($result>0){
        echo "<script>
  window.location.href = 'customer_registration.php?email=f';
</script>";
exit();
    }
    
}
  

  
  
  

  // $query="INSERT INTO  employeedata(name, mobile_no, call_status, remarks, duration, tasks, experience,reference_check,  fnf_name, fnf_number, age, current_location, address, city, pin_no, religion, id_card_name, id_card_number, id_card_front_photo, id_card_back_photo,dob, photo, referred_channel, referred_by_name, referred_by_number, form_filled_up_by  ) VALUES('$first_name','$mobile_no','$call_status', '$remarks', '$duration', '$tasks', '$experience', '$reference_check', '$fnf_name', '$fnf_number', '$age', '$current_location', '$address', '$city', '$pin_no', '$religion', '$id_card_name', '$id_card_number', '$filename','$backphoto', '$dob', '$photo', '$referred_channel', '$referred_by_name','$referred_by_number', '$form_filled_up_by')";

  $insert_query = "INSERT INTO cust_tab(first_name, last_name,email,mobile,type,location,duration,age,religion,monthly_pay,message,created_by,tnc ) Values('$first_name','$last_name' ,'$email','$number' ,'$type','$location','$duration','$age','$religion','$month_pay','$message','$created_by','$tnc')";
//   echo $insert_query; exit;
  $res=mysqli_query($databaseConnection,$insert_query);

  
try {
    // run your code here
    if($res){
        // echo"success";die;
        // header("location: search.php");
        
        // echo "<h6 align='center' style = 'color:green'><br>Successful Submitted<br></h6>";

         $select_id= "SELECT id FROM cust_tab where cust_id=''";
         $result=mysqli_query($databaseConnection,$select_id);
try {
         if($result){
$id =implode ("",mysqli_fetch_assoc($result));
        //  echo $id;
        //  echo $id;
        //  exit;

        $update_query = "UPDATE `cust_tab` SET `cust_id` = CONCAT('pro_',id) WHERE `cust_tab`.`id` = '$id'";
        $run=mysqli_query($databaseConnection,$update_query);
         
   try {
         if($run){
        //  echo $id;
        //  echo $id;
        //  exit

        
       $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

        $insert_user = "INSERT INTO user(user_id,username,last_name,email,phone,password,role_id,tnc) SELECT cust_id,first_name,last_name,email,mobile,'$param_password',3,tnc FROM cust_tab where id='$id'";
        
        // echo $insert_user; die;
        $run_user=mysqli_query($databaseConnection,$insert_user);

        try{
          if($run_user){
              $select_info = "select * from user where phone=$number";
            $run_select_info=mysqli_query($databaseConnection,$select_info);
            $response_info=mysqli_fetch_assoc($run_select_info);
            $user_id = $response_info['user_id'];
            
            $ip = UserInfo::get_ip();
            $os= UserInfo::get_os();
            $browser = UserInfo::get_browser();
            $device  =UserInfo::get_device();

            $insert_ip = "Insert into user_info(user_id,ip_address,os,browser,device,phone) values('$user_id','$ip','$os','$browser','$device','$number')";
            $run_insert_ip= mysqli_query($databaseConnection,$insert_ip);
            
              if($email==""){

            
                
                            // Password is correct, so start a new session
                            
                            // Check if the user is already logged in, if yes then redirect him to welcome page
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            echo "<script>window.location.href = 'customer_registration.php?s=1';</script>";
            exit;
            }

                           
                            
                    
              }else{
              echo"<script type='text/javascript'> 
          window.location.href = '../mail.php?cust=1&email=$email&pass=$password&mobile=$number';</script>";
                  
              }
            
            
            }
            
          else{
            echo "user query not run";
          }
        } catch (Exception $run_user) {
    echo "Exception:" . $exception->getMessage();
}
        
         }
         
        // echo $insert_user; die;




         else{
           echo "Id not Found ";
       }
      }  catch (Exception $run) {
    echo "Exception:" . $exception->getMessage();
}
    }     
         

// 
         else{
           echo "Id not Found ";
       }
      }
         catch (Exception $result) {
    echo "Exception:" . $exception->getMessage();
}

         
       }
       else{
           echo "error";
       }
}
catch (Exception $res) {
    echo "Exception:" . $exception->getMessage();
}



}





?>




<!doctype html>
<html lang="en">

<!-- Mirrored from veepixel.com/tf/html/jodice/registration.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>HireForCare</title>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>

<!-- Header 01
================================================== -->
<!-- Header 01
================================================== -->
<header class="header_01 header_inner">
	<div class="header_main">
		<?php include('../includes/header.php') ?>	
		<div class="header_btm">
      <h2>Customer Registration</h2>
    </div>
	</div> 
  </header>


<!-- End Header 02
================================================== -->


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
            <div class="welcome-text text-center">
              <h5 class="mb-0">Create an account!</h5>
              <span>Already have an account? <a href="../Registration/login.php">Log In!</a></span>
              <?php if(@$_GET['s']==1){ ?>
                      <div class="alert alert-success" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Confimation  </strong>
   link has been shared (from hfc@hireforcare.com) to your email id, kindly confirm for account creation
</div>
<?php } ?>
            </div>
            
				
					<div class="com_class_form">
						<div class="form-group user_type_cont">
              <label class="user_type" for="usertype-1">
                <input type="radio" checked="" name="usertype" id="usertype-1" value="job seeker" >
                <!--<span><i class="far fa-user"></i>Cutomer</span>-->
              </label>
              <!-- <label class="user_type" for="usertype-2">
                <input type="radio" name="usertype" id="usertype-2" value="employer" >
                <span><i class="fas fa-landmark"></i> Employer</span>
              </label> -->
            </div>
            <form action="" method="post">
            <div class="form-group">
							<input name="first_name" class="form-control" type="text" size="40" placeholder="First Name*" required>
						</div>
            <div class="form-group">
							<input name="last_name" class="form-control" type="text" size="40" placeholder="Last Name*" >
						</div>
            <div class="form-group">
              <input name="number" class="form-control <?php if($_GET['m']==f){echo "is-invalid";} ?>" type="number"  size="40" placeholder="Mobile*" required>
              <div class="invalid-feedback">
                                 Mobile No Already Register
                              </div>
            </div>
						<div class="form-group">
							<input name="email" class="form-control <?php if($_GET['email']==f){echo "is-invalid";} ?>" type="email" size="40" placeholder="Email* ">
							<div class="invalid-feedback">
                                 Email Already Registerd
                              </div>
							
						</div>
						
						
            <div class="form-group">
							<input <?php if($_SESSION['role_id']==2 || $_SESSION['role_id']==1){echo "hidden";} ?> name="password" class="form-control" value="<?php if($_SESSION['role_id']==2 || $_SESSION['role_id']==1){echo $hidden_pass;} ?>" type="password" size="40" placeholder="Password* " required> 
						</div>
            <a data-target="#demo"  data-toggle="collapse" >Additional Details <i class="fas fa-chevron-down"></i> </a>
  <div id="demo" class="collapse">
    <div class="form-group">  
    <select name="type"  class="form-control">
<option value="blank" selected disabled> Choose Option </option>
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
                
                <div class="field">
                    <i class="fas fa-map-marker-alt"></i>
                    <select id="name_dropdown" class="js-example-basic-single" name="location">
                    <option value=""  disabled selected>Select Location</option>
                        <?php
                                        
                                        $sql ="SELECT DISTINCT places from location";
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>

<option ><?php echo $row['places']  ?></option>
<?php } ?>
                      
                    </select>
                </div>
              </div>  
              
              
      
            <div class="form-group">
							<select name="duration"  class="form-control">
                <option  disabled selected>Select Working Hours</option>
  <option>Full Day (max 12 hours)</option>
  <option>Live-in (24 hrs)</option>
  <option >Part Time (1-4 hrs)</option>
  <option >Night Shift</option>
  
</select>
						</div>
            <div class="form-group">
						<select class="form-control" name="age">
                <option value="" disabled selected>Select Age</option>
  <option value="18-25">18-25</option>
  <option value="26-35">26-35</option>
  <option value="26-35">36-45</option>
  <option value="46-55">46-55</option>
  <option value=" 56+"> 56+</option>
  
</select>
						</div>
						
						
						<div class="form-group">
							 
							 <select name="religion"  class="form-control">
          <option value="" disabled>Choose Option</option>
          <option>Hindu</option>
          <option>Muslim</option>
          <option>Bengali</option>
          <option>Others</option>
          
          
</select> 
    
						</div>
            <div class="form-group">
							<input name="month_pay" class="form-control" type="hidden" size="40" placeholder="commercial Pay">
					</div>

          <div class="form-group">
							<textarea  class="form-control" name="message" id="" cols="30" rows="10" placeholder="Message "></textarea>
						</div>

<?php 
if (isset($_SESSION['loggedin'])) { ?>

<div class="form-group">
							<input readonly name="created_by" class="form-control" value="<?= $username; ?>" type="text" size="40">
					</div>
<?php } else {  ?>
<div class="form-group">
							<input hidden name="created_by" class="form-control" value="customer" type="text" size="40">
					</div>

<?php }?>


 
          
            
            
  </div>
  
  <?php if(!$_SESSION['role_id']==1 || !$_SESSION['role_id']==2){ ?>
  
                    <div class="form-group form-check">
                     <label class="form-check-label">
                    <input name="tnc" class="form-check-input" type="checkbox" value="agree" id="invalidCheck" required> Agree to <a href="terms-condition.php">terms & conditions</a> and <a href="privacy-policy.php">Privacy-policy</a>
                    </label>
                        
                    </div>
                    
                    <?php } ?>
                    
						<div class="form-group">
							<input class="btn btn-primary" type="submit" value="Register" >
						</div>
            <!--<div class="form-group form-check">-->
            <!--  <label class="form-check-label">-->
            <!--    <input class="form-check-input" type="checkbox"> Remember me-->
            <!--  </label>-->
            <!--</div>-->
            <a href="../registration/login.php">Already have a account.?</a>
            
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
<?php include('../includes/footer.php') ?>

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

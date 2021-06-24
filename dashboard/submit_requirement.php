<?php  
session_start();
require('../db.php');
include('../function/functions.php');
admin_customer();



if($_SERVER["REQUEST_METHOD"] == "POST"){
     
    $uid = $_SESSION['user_id'];
    $type= $_POST['type'];
    $location = $_POST['location'];
    $duration = $_POST['duration'];
    $age  = $_POST['age'];
    $message = $_POST['message'];

    $query ="UPDATE cust_tab SET type='$type', location='$location', age='$age', duration='$duration',message='$message' WHERE cust_id='$uid'";
    // echo $query; die;    
    $response=mysqli_query($databaseConnection,$query);
try{
    if($response){
    echo '<script>
                window.location.href = "submit_requirement.php?sr=s";
                </script>';
        
    }   
}
catch (Exception $response){

    print_r($response);

}

}
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from veepixel.com/tf/html/jodice/job-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
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
</head>
<body>

<!-- Header 01
================================================== -->
<header class="header_01 header_inner">
	<div class="header_main">
		<?php include('../includes/header.php');
    
    ?>	
		<div class="header_btm">
      <h2>Dashboard</h2>
    </div>
	</div> 
  </header>
<?php $userid=$_SESSION['user_id'];  ?>
  

<!-- End Header 02
================================================== -->



<!-- Main 
================================================== -->
<main>
  <div class="job_container">
    <div class="container">
      <div class="row job_main">
        <div class="sidebar">

          
          <h5>Organize and Manage</h5>
          <ul class="user_navigation">
            
              
              <li>
                <a href="../find-staff.php"><i class="far fa-list-alt"></i>Find Helper</a>
              </li>
              <li>
                <a href="../contact_us.php"><i class="far fa-list-alt"></i>Contact Us</a>
              </li>
              <li>
                <a href="../customer/payment/pay_history.php?cust_id=<?php echo $userid;?>"><i class="far fa-list-alt"></i>Payment Details</a>
              </li>

              
              
          </ul>
          <h5>Account</h5>
          <ul class="user_navigation">
            <li>
                <a href="../customer/edit_lead.php?cust_id=<?php echo $userid;?>"><i class=""></i> Update My Profile</a>
              </li>
              <li >
                <a href="password_change.php"><i class="fas fa-key"></i>Change Password</a>
              </li>
              <li>
                <a href="../Registration/logout.php"><i class="fas fa-power-off"></i> Logout</a>
              </li>
          </ul>
        </div>
        <div class=" job_main_right">
          <div class="row job_section">
          <div class="col-sm-12">
            <div class="jm_headings">
                <h5>Submit Requirement</h5>
                <a class="btn btn-primary mypbtn" href="<?= $data['role_id']==2 ?  "manager_dashboard.php"  : "admin_dashboard.php"?>">Dashboard</a>
              </div>
              <div class="section-divider">
              </div>

              

              <?php if($_GET['sr']==s){ ?>
          <div class="alert alert-success" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Submitted</strong>
   , Requirement Successfully
</div>
        <?php   } ?>
        
               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="big_form_group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">  
							 <select class="form-control"   name="type">
                <option value="" disabled selected>Select Type</option>
                <option value="Baby Care">BabyCare</option>
                <option value="Cooking">Cooking</option>
                <option value="Cleaning">Cleaning</option>
                <option value="Cleaning">Eldery Care</option>
                <option value="All">All</option>
                
                            </select>
						</div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
							<input name="location" class="form-control" type="text" size="40" placeholder="Location ">
						</div>
                    </div> 
                    <div class="col-md-6">
                      <div class="form-group">
							<select name="duration" class="form-control">
                <option  disabled selected>Select Working Hours</option>
  <option>Full Day (max 12 hours)</option>
  <option>Live-in (24 hrs)</option>
  <option >Part Time (1-4 hrs)</option>
  <option >Night Shift</option>
  
</select>
						</div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
						<select class="form-control" name="age">
                <option value="" disabled selected>Select Age</option>
  <option value="18-25">18-25</option>
  <option value="26-35">>26-35</option>
  <option value="46-55">46-55</option>
  <option value=" 56+"> 56+</option>
  
</select>
						</div>
                    </div>
                  </div>
                </div>
                

                <div class="big_form_group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
							<input name="month_pay" class="form-control" type="hidden" size="40" placeholder="Monthly Pay ">
					</div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
							<textarea  class="form-control" name="message" id=""  placeholder="Message "></textarea>
						</div>
                    </div> 
                    
                    
                  </div>
                </div>

                <div class="form-group row">
                  <div  class="col-md-9 ">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
                
              </form>   
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
<script src="../assets/js/custom.js"></script>
</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/job-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
</html>

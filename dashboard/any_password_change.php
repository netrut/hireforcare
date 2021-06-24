<?php 
session_start();
require('../db.php');
include('functions.php')
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from veepixel.com/tf/html/jodice/edit-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
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
		<?php include('../includes/header.php') ?>	
		<div class="header_btm">
      <h2>Password Change</h2>
    </div>
	</div> 
  </header>


  

<!-- End Header 02
================================================== -->

<?php
// echo $_SESSION['user_id']; die;
if($_SERVER["REQUEST_METHOD"] == "POST"){
            $current_password=  $_POST['current_password'];
            $new_password = $_POST['new-password'];
            $confirm_password = $_POST['confirm-password'];

            // echo $current_password; die;
        // $user_id = $_SESSION['user_id'];
        $user_id = $current_password;
        // Prepare a select statement
        $sql = "SELECT  username, password FROM user WHERE phone = '$user_id'";
        // echo $sql;
        $result1 = mysqli_query($databaseConnection,$sql);
        $response=mysqli_fetch_assoc($result1);

        $hashed_password=$response['password'];
        // if(password_verify($current_password, $current_password)){
        // echo "h1"; die;
            if($new_password == $confirm_password){
                // Set parameters
                
                $param_password = password_hash($confirm_password, PASSWORD_DEFAULT); // Creates a password hash
                    $update ="UPDATE user SET password='$param_password' where phone='$user_id'";
                    // echo $update; die;
                    $run  = mysqli_query($databaseConnection,$update);

                try{
                        if($run){
                            echo '<script>
                            $(document).ready(function(){
                            $(".toast").toast("show");
                            });
                            </script>
                                        

                            <div style="color: #155724; background-color: #d4edda; border-color: #c3e6cb;" class="toast  text-center p-2 m-auto" role="alert" aria-live="polite" aria-atomic="true" data-delay="5000">
                            <strong>Success!</strong> Password Successfully Changed.
                            </div>'; 
                        }
                    }
                    catch (Exception $run){

                        print_r($run);

                    }

            }
            else {    echo '<script>
                $(document).ready(function(){
                $(".toast").toast("show");
                });
                </script>
                            

                <div style="color: #721c24;
                    background-color: #f8d7da;
                    border-color: #f5c6cb;" class="toast  text-center p-2 m-auto" role="alert" aria-live="polite" aria-atomic="true" data-delay="5000">
                <strong>Success!</strong> Confirm Password Not Match.
                </div>';
            }
             
        // }
        // else {
        //         echo '<script>
        //         $(document).ready(function(){
        //         $(".toast").toast("show");
        //         });
        //         </script>
                            

        //         <div style="color: #721c24;
        //             background-color: #f8d7da;
        //             border-color: #f5c6cb;" class="toast  text-center p-2 m-auto" role="alert" aria-live="polite" aria-atomic="true" data-delay="5000">
        //         <strong>Success!</strong> Previous Password Not Correct.
        //         </div>';
        // }
    }
?>

<!-- Main 
================================================== -->


<main>
  <div class="job_container">
    <div class="container">
      <div class="row job_main">
       <div class="sidebar">
          
        <h5>Organize and Manage</h5>
        <?php sidebar_sec(); ?>
        

        <div class=" job_main_right">
          <div class="row job_section">
          <div class="col-sm-12">
            <div class="jm_headings">
                <h5>Change Password</h5>
              </div>
              <div class="section-divider">
          </div>
               <form action="" method="post">
                <div class="form-group row">
                  <div class="col-md-3">
                      <label for="current-password">Phone No <span class="text-danger">*</span></label>
                  </div>
                  <div class="col-md-9">
                    <input required type="number" name="current_password" class="form-control" placeholder="" id="current-password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-3">
                    <label for="new-password">New password <span class="text-danger">*</span></label>
                  </div>
                  <div class="col-md-9">
                    <input required name="new-password" type="password" class="form-control" placeholder="" id="new-password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-3">
                    <label for="confirm-new-password">Confirm new password <span class="text-danger">*</span></label>
                  </div>
                  <div class="col-md-9">
                    <input required name="confirm-password" type="password" class="form-control" placeholder="" id="confirm-new-password">
                  </div>
                </div>
                <div class="form-group row">
                  <div  class="col-md-9 offset-md-3">
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    <input name="submit" class="btn btn-primary " type="submit" value="Submit">
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
</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/edit-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
</html>

<?php 
session_start();
include('../db.php');
include('../function/functions.php');
include('functions.php');
admin_manager();

if(@$_POST['submit']){
    $uid = $_POST['id'];
    $username = $_POST['username'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone  = $_POST['phone'];

    $query ="UPDATE user SET username='$username', last_name='$last_name', email='$email', phone='$phone' WHERE id='$uid'";
    echo $query;
    $response=mysqli_query($databaseConnection,$query);
try{
    if($response){
    
        // echo "sucess";  
        // header("location:View.php?emp_id=$emp_id");
    }   
}
catch (Exception $response){

    print_r($response);

}

}


 


    


?>	

<!doctype html>
<html lang="en">

<!-- Mirrored from veepixel.com/tf/html/jodice/edit-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
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
      <h2><?= $_SESSION['username']; ?></h2>
    </div>
	</div> 
  </header>

  <?php $id =$_SESSION["id"] ;

$select_query = "SELECT * from user where id='$id'";
// echo $select_query;
$result = mysqli_query($databaseConnection,$select_query);

$data=mysqli_fetch_assoc($result); ?>
  
  
  


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
         <?php sidebar_sec(); ?>
        </div>
        <div class=" job_main_right">
          <div class="row job_section">
          <div class="col-sm-12">
            <div class="jm_headings">
                <h5>Update My Profile</h5>
                <a class="btn btn-primary mypbtn" href="<?= $data['role_id']==2 ?  "manager_dashboard.php"  : "admin_dashboard.php"?>">Dashboard</a>
              </div>
              <div class="section-divider">
              </div>

              

              <?php  if(@$_GET['success']==1){?>
              

              <script>
$(document).ready(function(){
  $('.toast').toast('show');
});
</script>
             

<div style="color: #155724; background-color: #d4edda; border-color: #c3e6cb;" class="toast  text-center p-2 m-auto" role="alert" aria-live="polite" aria-atomic="true" data-delay="5000">
   <strong>Success!</strong> Profile  has been saved.
</div>
                
                
              

              
              <?php } ?>
               <form action="profile_save.php" method="post" enctype="multipart/form-data">
                <div class="big_form_group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >First Name</label>
                        <input type="text" class="form-control" name="username" placeholder="" value="<?= $data['username'];?> ">
                        <input type="hidden" class="form-control" name="id" placeholder="" value="<?= $data['id'];?> ">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Last Name</label>
                        <input type="text" class="form-control" name="last_name" placeholder="" value="<?= $data['last_name'];?> ">
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Email</label>
                        <input type="text" class="form-control" name="email" placeholder="" value="<?= $data['email'];?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Phone no</label>
                        <input type="text" class="form-control" name="phone" placeholder="" value="<?= $data['phone'];?>">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="big_form_group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Location</label>
                        <input type="text" class="form-control" placeholder="" value="London, United Kingdom ">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Job Type</label>
                        <input type="text" class="form-control" placeholder="" value="Full time ">
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Expected Salary</label>
                        <input type="text" class="form-control" placeholder="" value="$35k - $38k">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Total experience</label>
                        <input type="text" class="form-control" placeholder="" value="5 Years ">
                      </div>
                    </div>
                  </div>
                </div> -->

                <div class="big_form_group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Role</label>
                        <input type="text" value="<?= $data['role_id']==2 ? 'Agent' :'Admin' ; ?>" class="form-control" readonly>
                        
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Progile Image</label>
                        <input type="file" class="form-control"  >
                        
                      </div>
                    </div> 
                    <div class="col-md-12">
                      <div class="form-group ">
                        <label  > Description</label>
                        <textarea class="form-control" >
                        </textarea>
                        
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

<!-- Mirrored from veepixel.com/tf/html/jodice/edit-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
</html>

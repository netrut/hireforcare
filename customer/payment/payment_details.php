<?php

require('../../db.php');
session_start();
include('../../function/functions.php');
include('../../dashboard/functions.php');
admin();    

// session_start();

// print_r($name); die;
// If the user is not logged in redirect to the login page...
// if (!isset($_SESSION['loggedin'])) {
// 	header('Location: ../../Registration/login.php');
// // 	exit;
// }

$select_query = "SELECT * FROM cust_tab WHERE status='Live' OR status='Not Live' OR status='Re-Open' ORDER BY pay_last_date DESC";
$result = mysqli_query($databaseConnection,$select_query);
//  print_r($result); die;
$data=[];
while($response=mysqli_fetch_assoc($result)){
    $data[]=$response;
}

?>

<!doctype html>
<html lang="en">

<!-- Mirrored from veepixel.com/tf/html/jodice/my-job-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>HireForcare</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" href="../../assets/images/fav.png" type="image/gif" sizes="64x64">

<!-- CSS
================================================== -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&amp;display=swap&amp;subset=latin-ext" rel="stylesheet">
<link rel="stylesheet" href="../../assets/css/all.min.css">
<link href="../../assets/css/aos.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<link href="../../assets/css/select2.min.css" rel="stylesheet" />
<link href="../../assets/css/owl.carousel.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../../assets/css/style.css">
<link rel="stylesheet" href="../../assets/css/color-1.css">
</head>
<body>

<!-- Header 01
================================================== -->
<header class="header_01 header_inner">
	<div class="header_main">
  <?php

include('../../includes/header.php') ;
  ?>
		<div class="header_btm">
      <h2>Payment Details</h2>
    </div>
	</div> 
  </header>

<!-- $name = $_SESSION["username"]; -->

<!-- End Header 02
================================================== -->



<!-- Main 
================================================== -->
<main>
  <div class="job_container">
    <div class="container">
      <div class="row job_main">
        <div class="sidebar">

          <ul class="user_navigation">
            <li  >
              <a href="find-staff.html"><i class="fas fa-search"></i> Find Staff </a>
              <a class="filter_btn" href="#sidebar_filter_option"> 
                <i class="fas fa-filter"></i>
                <i class="fas fa-times"></i>
              </a>
            </li>
            <li>
            <form id="#sidebar_filter_option" class="filter_option">
              <form id="#sidebar_filter_option" class="filter_option">


            

            


               
                
                
              <div class="form-group">
                <label>Name</label>
                <div class="field">
                    <i class="fas fa-map-marker-alt"></i>
                    <select id="name_dropdown" class="js-example-basic-single" name="state">
                        <option value="" >All</option>
                        <?php
                                        
                                        $sql ="SELECT DISTINCT first_name from cust_tab";
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>

<option ><?php echo $row['first_name']  ?></option>
<?php } ?>
                      
                    </select>
                </div>
              </div>  
              <div class="form-group">
                <label>Number</label>
                <div class="field">
                    <i class="fas fa-user"></i>
                    <select id="number_dropdown" class="js-example-basic-single" name="state">
                        <option value="" >All</option>
                        
                       <?php
                                        
                                        $sql ="SELECT DISTINCT mobile from cust_tab";
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>

<option ><?php echo $row['mobile']  ?></option>
<?php } ?>
                      
                    </select>
                </div>
              </div>

              <div class="form-group">
                <label>Status</label>
                <div class="field">
                    <i class="fas fa-user"></i>
                    <select id="status_dropdown" class="js-example-basic-single" name="state">
                        <option value="" >All</option>
                        
                       <?php
                                        
                                        $sql ="SELECT DISTINCT status from cust_tab";
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>

<option ><?php echo $row['status']  ?></option>
<?php } ?>
                      
                    </select>
                </div>
              </div>

              <div class="form-group">
                <label>Payment</label>
                <div class="field">
                    <i class="fas fa-user"></i>
                    <select id="pending_dropdown" class="js-example-basic-single" name="state">
                        <option value="" >All</option>
                        <option value="1">Pending</option>
                        <option value="0">Paid</option>
                        
                       
                      
                    </select>
                </div>
              </div>

              

              

              <!-- <div class="form-group">
                <label></label>
                <div class="field">
                  <input type="hidden" placeholder="e.g. 10k" class="form-control">
                </div>
              </div> -->

              <div class="form-group">
                <!-- <label>Tags</label> -->
                <div class="field">
                  <div class="form-group custom_checkboxes">
                    <label class="custom_checkbox" for="tag-1">
                      <input type="checkbox" name="usertype" id="tag-1" value="job seeker">
                      <span><i class="fas fa-check"></i>Select Customer Payment Details Filters</span>
                    </label>
                    
                  </div>
                </div>  
              </div>

            </form>
            </li>
            
          </ul>
          
         <p>
  <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    <h5>Organize and Manage</h5>
  </a>

</p>
<div class="collapse" id="collapseExample">
  <!-- <div class="card card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div> -->
  
           <?php sidebar_sec(); ?>
        
</div>
        </div>

        <div class=" job_main_right">
          <table class="table">
            	
                 <div id="ajaxdata" class="row findstaf_section ">
            
            <!-- <p>hello</p> -->
          </div>  
          
          </table>	
           
                    
        </div>
      </div>
    </div>
  </div>
</main>


<!-- Footer Container
================================================== -->


<?php include('../../includes/footer.php') ?>

<!-- End Footer Container
================================================== -->

<!-- Scripts
================================================== -->
<script src="../../assets/js/jquery-3.4.1.min.js"></script>
<script src="../../assets/js/select2.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/owl.carousel.min.js"></script>
<script src="../../assets/js/aos.js"></script>
<script src="../../assets/js/custom.js"></script>
<script src="pay.js"></script>
</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/my-job-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
</html>

<?php
require('../db.php');
session_start();
include('../../function/functions.php');
include('../../dashboard/functions.php');
admin_manager_candidate();
$emp_id = $_GET['emp_id'];


// // print_r($name); die;
// // If the user is not logged in redirect to the login page...
// if (!isset($_SESSION['loggedin'])) {
// 	header('Location: ../Registration/login.php');
// // 	exit;
// }

$select_query = "SELECT * FROM salary_history where emp_id='$emp_id' ORDER BY salary_last_date DESC";
// echo $select_query; exit;
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
<title>HireFOrCare</title>
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
<header class="header_01 header_inner">
	<div class="header_main">
		<?php include('../../includes/header.php');
    
    ?>	
		<!-- Header 2 -->
    <div class="header_btm header_job_single">
	<div class="header_job_single_inner container">
		<!-- <div class="poster_company">
			<img  alt="brand logo" src="../../assets/images/demologo.png">
		</div>  -->
        <?php  $select_query = "SELECT * FROM employeedata where emp_id='$emp_id'";
        // echo $select_query; exit;
$res=mysqli_query($databaseConnection, $select_query);
$empdata=mysqli_fetch_assoc($res); ?>
		<div class="poster_details">
			<h2> <i class="fas fa-user"></i> <?php echo $empdata['name'];?>  <br> 
            
            <a href=""><span class="varified"><i class="fas fa-check"></i>Verified</span></a> 
            

            <a href="../edit.php?emp_id=<?php echo $emp_id;?>"><span style="background: #FF0B0B;" class="varified"><i style="background: #ff6158;" class="fas fa-pencil-alt"></i>Edit</span></a>
            <a style="color: white;" href=""><i class="fas fa-share-alt"></i></a>
            
        
        </h2>
			<h5>Monthly Pay:  <?=$empdata['monthly_salary']; ?>  <br> <span>Paid: <?=   $empdata['salary_paid']; ?> </span><br>
      <span> Pending: <?=$empdata['salary_pending']; ?> </span></h5>
            <!-- <h5><?=   $empdata['email']; ?></h5> -->
			<ul>
				
				<li>
					<a href="#">
						<i class="fas fa-map-marker-alt"></i>
						<?=   $empdata['current_location']; ?>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="far fa-clock"></i>
						<?=   $empdata['duration']; ?>
					</a>
				</li>
                <li>
					<a href="#">
						<i class="fas fa-id-card"></i>
						<?=   $empdata['emp_id']; ?>
					</a>
				</li>

                
			</ul>		
		</div>
		<!-- <div class="poster_action">
			<a class="addtofav" title="add to favourite" href="#"><i class="far fa-heart"></i></a>
			<a class="btn btn-third" href="#">Apply Now</a>
			
		</div> -->
	</div>

    <!-- header 2 -->

    	
    
	</div> 
  </header>





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
              <div class="form-group">
                <label>From</label>
                
                <div class="field">
                  <input type="date" placeholder="e.g. 10k" class="form-control">
                </div>
              </div>  
              
              
             

              <div class="form-group">
                <label>To</label>
                <div class="field">
                  <input type="date"  class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label>Tags</label>
                <div class="field">
                  <div class="form-group custom_checkboxes">
                    <label class="custom_checkbox" for="tag-1">
                      <input type="checkbox" name="usertype" id="tag-1" value="job seeker">
                      <span><i class="fas fa-check"></i>Salary History Filters</span>
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
<div class="collapse " id="collapseExample">
  <!-- <div class="card card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div> -->
   <?php sidebar_sec(); ?>
</div>
        </div>

        <div class=" job_main_right">
          <div class="row job_section">
      		<div class="col-sm-12">
      			<div class="jm_headings">
	              <h6>Your listings are shown in the table below.</h6>
	          	</div>

              <?php 
              $month_query = "SELECT date_format(salary_last_date,'%M %Y') as month, emp_id,name, MAX(monthly_salary) as monthly_salary, SUM(salary_paid) as paid, MAX(salary_last_mode) paid_mode, MAX(salary_last_date) paid_date FROM salary_history where emp_id= '$emp_id' Group BY emp_id ,name,monthly_salary";

              $res = mysqli_query($databaseConnection,$month_query);
//  print_r($result); die;  
$monthly_data=[];
while($response=mysqli_fetch_assoc($res)){
    $monthly_data[]=$response;
}

              // echo $select_query; exit;

              ?>
              <div class="table-cont">
              
          		 <table class="table">
      					<thead>
                   
      						<tr>
                  <th>Month</th>
                    <th>Emp Id</th>
      							<th>Name</th>
                    <th>Monthly</th>
      							<th>Paid</th>
                    <th>Pending</th>
      							
      							
                    
                    
                    
      						</tr>
      					</thead>
                
      					<tbody>
                  <?php foreach($monthly_data as $value) { ?>
                  
                    
      						<tr><td>
      								 
                       <?php echo $value['month']; ?>
                       
      							</td>
                    	<td>
      								 <?php echo $value['emp_id']; ?>
                       
                       
      							</td>
      							<td>
      								<h6><a href="post-a-job.html"><?php echo $value['name']; ?></a></h6>	
                      
      							</td>
      							
      							<td>
      								 <?php echo $value['monthly_salary']; ?>
                       
      							</td>
      							<td>
      								<?php echo $value['paid']; ?>
      							</td>
      							<td>    
      								<?php echo $value['monthly_salary']- $value['paid']; ?>
      							</td>
      							
                   
                    
 
      						</tr>

                  

                  

                  
                  
                  
      						
      												
      				
                 
                  <?php   } ?>
                </tbody>
                
      				</table>
              </div>
              <div class="table-cont">
              
          		 <table class="table">
      					<thead>
                   
      						<tr>
                    <th>Emp Id</th>
      							<th>Name</th>
      							<th>paid</th>
      							<th>Mode</th>
                    <th>Remark</th>
      							<th>Last Date</th>
      							
                    
                    
                    
      						</tr>
      					</thead>
                
      					<tbody>
                  <?php foreach($data as $value) { ?>
                  
                    
      						<tr>
                    	<td>
      								 <?php echo $value['emp_id']; ?>
                       
                       
      							</td>
      							<td>
      								<h6><a href="post-a-job.html"><?php echo $value['name']; ?></a></h6>	
                      
      							</td>
      							
      							<td>
      								 <?php echo $value['salary_paid']; ?>
                       
      							</td>
      							<td>
      								<?php echo $value['salary_last_mode']; ?>
      							</td>
                    <td>
      								<?php echo $value['remark']; ?>
      							</td>
                    
                    
      							<td>    
      								<?php echo $value['salary_last_date']; ?>
      							</td>
      							
                   
                    
 
      						</tr>

                  

                  

                  
                  
                  
      						
      												
      				
                 
                  <?php   } ?>
                </tbody>
                
      				</table>
              </div>


      		</div>
          </div>	
           
                    
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
</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/my-job-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
</html>

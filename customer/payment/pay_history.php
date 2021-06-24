<?php
session_start();
require('../../db.php');
include('../../function/functions.php');
include('../../dashboard/functions.php');
admin_customer();   


$cust_id = $_GET['cust_id'];


$select_query = "SELECT * FROM pay_history where cust_id='$cust_id' ORDER BY pay_last_date DESC";
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
<title>HireForCare</title>
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
		<?php include('../../includes/header.php');
    

    
    ?>	
		<!-- Header 2 -->
    <div class="header_btm header_job_single">
	<div class="header_job_single_inner container">
		<!-- <div class="poster_company">
			<img  alt="brand logo" src="../../assets/images/demologo.png">
		</div>  -->
        <?php  $select_query = "SELECT * FROM cust_tab where cust_id='$cust_id'";
        // echo $select_query; exit;
$res=mysqli_query($databaseConnection, $select_query);
$custdata=mysqli_fetch_assoc($res); ?>
		<div class="poster_details">
			<h2> <i class="fas fa-user"></i> <?php echo $custdata['first_name'];?> <?= $custdata['last_name'];?>  <br> 
            
            <a href=""><span class="varified"><i class="fas fa-check"></i>Verified</span></a> 
            

            <a href="edit_lead.php?cust_id=<?php echo $custdata['cust_id']?>"><span style="background: #FF0B0B;" class="varified"><i style="background: #ff6158;" class="fas fa-pencil-alt"></i>Edit</span></a>
            <a style="color: white;" href=""><i class="fas fa-share-alt"></i></a>
            
        
        </h2>
			<h5>Monthly Pay:  <?=$custdata['monthly_pay']; ?>  <br> <span>Received: <?=   $custdata['payment_receive']; ?> </span><br>
      <span> Pending: <?=$custdata['pay_pending']; ?> </span></h5>
            <!-- <h5><?=   $custdata['email']; ?></h5> -->
			<ul>
				
				<li>
					<a href="#">
						<i class="fas fa-map-marker-alt"></i>
						<?=   $custdata['location']; ?>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="far fa-clock"></i>
						<?=   $custdata['duration']; ?>
					</a>
				</li>
                <li>
					<a href="#">
						<i class="fas fa-id-card"></i>
						<?=   $custdata['cust_id']; ?>
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

          <!-- <ul class="user_navigation">
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
                <label>Location</label>
                <div class="field">
                    <i class="fas fa-map-marker-alt"></i>
                    <select class="js-example-basic-single" name="state">
                      <option value="AL">ALABAMA</option>
                      <option value="WY">WYOMING</option>
                    </select>
                </div>
              </div>  
              <div class="form-group">
                <label>Keywords</label>
                <div class="field">
                    <i class="fas fa-briefcase"></i>
                    <select class="js-example-basic-single" name="state">
                      <option value="AL">e.g. job title</option>
                      <option value="WY">Title 1</option>
                      <option value="WY">Title 2</option>
                      <option value="WY">Title 3</option>
                    </select>
                </div>
              </div>
              
              <div class="form-group">
                <label>Category</label>
                <div class="field">
                    <i class="fas fa-briefcase"></i>
                    <select class="js-example-basic-single" name="state">
                      <option>Admin Support</option>
                      <option>Customer Service</option>
                      <option>Data Analytics</option>
                      <option>Design &amp; Creative</option>
                      <option>Legal</option>
                      <option>Software Developing</option>
                      <option>IT &amp; Networking</option>
                      <option>Writing</option>
                      <option>Translation</option>
                      <option>Sales &amp; Marketing</option>
                    </select>
                </div>
              </div>

              <div class="form-group">
                <label>Salary</label>
                <div class="field">
                  <input type="text" placeholder="e.g. 10k" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label>Tags</label>
                <div class="field">
                  <div class="form-group custom_checkboxes">
                    <label class="custom_checkbox" for="tag-1">
                      <input type="checkbox" name="usertype" id="tag-1" value="job seeker">
                      <span><i class="fas fa-check"></i>PHP</span>
                    </label>
                    <label class="custom_checkbox" for="tag-2">
                      <input type="checkbox" name="usertype" id="tag-2" value="employer">
                      <span><i class="fas fa-check"></i> MySQL</span>
                    </label>
                    <label class="custom_checkbox" for="tag-3">
                      <input type="checkbox" name="usertype" id="tag-3" value="employer">
                      <span><i class="fas fa-check"></i> API</span>
                    </label>
                    <label class="custom_checkbox" for="tag-4">
                      <input type="checkbox" name="usertype" id="tag-4" value="employer">
                      <span><i class="fas fa-check"></i> react</span>
                    </label>
                    <label class="custom_checkbox" for="tag-5">
                      <input type="checkbox" name="usertype" id="tag-5" value="employer">
                      <span><i class="fas fa-check"></i> design</span>
                    </label>
                  </div>
                </div>
              </div>

            </form>
            </li>
            <li  >
              <a href="job-dashboard.html">
                <i class="fas fa-border-all"></i> Job Dashboard </a>
              </li>
          </ul> -->
          <h5>Organize and Manage</h5>
           <?php sidebar_sec(); ?>
        </div>

        <div class=" job_main_right">
          <div class="row job_section">
      		<div class="col-sm-12">
      			<div class="jm_headings">
	              <h6>Your listings are shown in the table below.</h6>
	          	</div>

              <?php 
              $month_query = "SELECT date_format(pay_last_date,'%M %y') as month, cust_id,first_name, MAX(monthly_pay) as monthly_pay, SUM(payment_receive) as pay_receive, MAX(pay_last_mode) pay_mode, MAX(pay_last_date) pay_date FROM pay_history where cust_id= '$cust_id' Group BY cust_id ,first_name,monthly_pay";

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
                    <th>Cust Id</th>
      							<th>Name</th>
                    <th>Monthly</th>
      							<th>Received</th>
                    <th>Pending</th>
      							
      							
                    
                    
                    
      						</tr>
      					</thead>
                
      					<tbody>
                  <?php foreach($monthly_data as $value) { ?>
                  
                    
      						<tr><td>
      								 
                       <?php echo $value['month']; ?>
                       
      							</td>
                    	<td>
      								 <?php echo $value['cust_id']; ?>
                       
                       
      							</td>
      							<td>
      								<h6><a href="javascript:void(0)"><?php echo $value['first_name']; ?></a></h6>	
                      
      							</td>
      							
      							<td>
      								 <?php echo $value['monthly_pay']; ?>
                       
      							</td>
      							<td>
      								<?php echo $value['pay_receive']; ?>
      							</td>
      							<td>    
      								<?php echo $value['monthly_pay']- $value['pay_receive']; ?>
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
                    <th>Cust Id</th>
      							<th>Name</th>
      							<th>Received</th>
      							<th>Mode</th>
      							<th>Last Date</th>
      							
                    
                    
                    
      						</tr>
      					</thead>
                
      					<tbody>
                  <?php foreach($data as $value) { ?>
                  
                    
      						<tr>
                    	<td>
      								 <?php echo $value['cust_id']; ?>
                       
                       
      							</td>
      							<td>
      								<h6><a href="post-a-job.html"><?php echo $value['first_name']; ?></a></h6>	
                      
      							</td>
      							
      							<td>
      								 <?php echo $value['payment_receive']; ?>
                       
      							</td>
      							<td>
      								<?php echo $value['pay_last_mode']; ?>
      							</td>
      							<td>    
      								<?php echo $value['pay_last_date']; ?>
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

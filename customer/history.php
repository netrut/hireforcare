<?php
require('../db.php');
session_start();
   	
include('../function/functions.php');
include('../dashboard/functions.php');
admin_manager();
$cust_id = $_GET['cust_id'];
$select_query = "SELECT * FROM cust_hist_tab where cust_id='$cust_id' ORDER BY date DESC";
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
<title>JoDice</title>
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
	    <?php include('../includes/header.php');  ?>
    
		
    
	<!-- Header 2 -->
    <div class="header_btm header_job_single">
	<div class="header_job_single_inner container">
		<!-- <div class="poster_company">
			<img  alt="brand logo" src="../assets/images/demologo.png">
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
			<h5><i class="fas fa-phone-square"></i> <?=   $custdata['mobile']; ?> <br> <span> <i class="fas fa-envelope-square"></i> <?=$custdata['email']; ?></span></h5>
            <!-- <h5><?=   $custdata['email']; ?></h5> -->
			<ul>
				<li>
					<a href="#">
						<i class="fas fa-rupee-sign"></i>
						<?=   $custdata['monthly_pay']; ?>
					</a>
				</li>
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
                <label>Number</label>
                <div class="field">
                    
                   <input id="el" type="date" class="form-control"><span onclick="javascript:el.value=''" style="cursor:pointer">x</span>
                    <!--<button onclick="javascript:el.value=''"></button>-->
                </div>
              </div>
            
              <div class="form-group">
                <label>From</label>
                
                <div class="field">
                  <input type="date" placeholder="e.g. 10k" class="form-control datepicker">
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
          <div class="row job_section">
      		<div class="col-sm-12">
      			<div class="jm_headings">
	              <h6>History are shown in the table below.</h6>
	          	</div>
              <div class="table-cont">
              
          		 <table class="table">
      					<thead>
                   
      						<tr>
                    <th>Manager</th>
      							<th>Status</th>
      							<th>Type</th>
      							<th>Call Back</th>
      							<th>Remark</th>
      							<th>Changed</th>
                    <th>Date</th>
                    
                    
                    
      						</tr>
      					</thead>
                
      					<tbody>
                  <?php foreach($data as $value) { ?>
                  
                    
      						<tr>
                    	<td>
      								 <?php echo $value['agent']; ?>
                       
                       
      							</td>
      							<td>
      								<h6><a href="javascript:void(0)"><?php echo $value['status']; ?></a></h6>	
                      
      							</td>
      							
      							<td>
      								 <?php echo $value['type']; ?>
                       
      							</td>
      							<td>
      								<?php echo $value['call_back']; ?>
      							</td>
      							<td>    
      								<?php echo $value['remark']; ?>
      							</td>
      							<td>
      							<?php echo $value['username']; ?>
      							</td>
                    <td>
      							<?php echo $value['date']; ?>
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
<script src="form-date-time-pickes.js"> </script>
</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/my-job-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
</html>

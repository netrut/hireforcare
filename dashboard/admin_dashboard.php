<?php
session_start();
include('../function/functions.php');
admin();
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


<!-- End Header 02
================================================== -->

 <?php  
require('../db.php');
$username = $_SESSION['username'];
 $sql = "SELECT * from cust_tab Where cust_id IS NOT NULL And status='New' OR status='Re-Open'";
  $result = mysqli_query($databaseConnection,$sql);
     
    $data=[];
while($response=mysqli_fetch_assoc($result)){
    $data[]=$response;
    
}
  ?>



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
            <li class="is-active" >
              <a href="job-dashboard.html">
                <i class="fas fa-border-all"></i> Job Dashboard </a>
              </li>
          </ul> -->
          <h5>Organize and Manage</h5>
          <ul class="user_navigation">
              <li >
              <a href="../customer/payment/payment_details.php"><i class="fas fa-paper-plane"></i> Payment Details</a>
              </li>
              <li>
                <a href="../employee/salary/salary_details.php"><i class="far fa-list-alt"></i>Salary Details</a>
              </li>
              
              <li>
                <a href="../customer/leads.php"><i class="far fa-list-alt"></i>Customer Leads</a>
              </li>

              <li>
                <a href="../employee/candidates.php"><i class="far fa-list-alt"></i>Candidates</a>
              </li>
              <li>
                <a href="../registration/signup.php"><i class="far fa-list-alt"></i>Add new Manager</a>
              </li>
              <li>
                <a href="../customer/customer_registration.php"><i class="far fa-list-alt"></i>Add new customer</a>
              </li>
              <li>
                <a href="../employee/registration.php"><i class="far fa-list-alt"></i>Add new candidate</a>
              </li>
              
          </ul>
          <h5>Account</h5>
          <ul class="user_navigation">
            <li>
                <a href="profile_edit.php"><i class="fas fa-user"></i> Update My Profile</a>
              </li>
              <li >
                <a href="password_change.php"><i class="fas fa-key"></i>Change Password</a>
              </li>
              <li>
                <a href="../Registration.php"><i class="fas fa-power-off"></i> Logout</a>
              </li>
          </ul>
        </div>
        <div class=" job_main_right">
          <div class="row job_section">
      		<div class="col-sm-12">
      			<div class="jm_headings">
	              <h4>Live Dashboard</h4>
	          	</div>
          	 	 <div class="dashboard_boxes row">
                <div class="col-md-4">
                  <div class="dashboard_box ">
                    <i class="fas fa-paper-plane"></i>
                    <h2><span>18</span>Agents</h2>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="dashboard_box ">
                    <i class="fas fa-user-check"></i>
                    <h2><span>68</span>Customers </h2>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="dashboard_box ">
                    <i class="fas fa-comments"></i>
                    <h2><span>28</span>Candidates </h2>
                  </div>
                </div>    
               </div>
               <div class="section-divider">
              </div>

              
              
              <h4> Your Leads Views</h4>
              <table class="table table-responsive">
  <thead>
                   
      						<tr>
                    <th>Id</th> 
      							<th>Name</th>
      							<th>Type</th>
      							<th>Location</th>
      							<th>Duty</th>
      							<th>Age</th>
                    <th>pay</th>
                    <th>Agent</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    
      						</tr>
      					</thead>
      					</thead>
      				
                <?php 

foreach($data as $value){
?>
      					<tbody>
                  
                  
                    
      						<tr>
                    	<td>
      								 <?php echo $value['cust_id']; ?>
                       
                       
      							</td>
      							<td>
      								<h6><a href="post-a-job.html"><?php echo $value['first_name']; ?></a></h6>	
                      
      							</td>
      							
      							<td>
      								 <?php echo $value['type']; ?>
                       
      							</td>
      							<td>
      								<?php echo $value['location']; ?>
      							</td>
      							<td>
      								<?php echo $value['duration']; ?>
      							</td>
      							<td>
      							<?php echo $value['age']; ?>
      							</td>
                    <td>
      							<?php echo $value['monthly_pay']; ?>
      							</td>
                    <td>
                      <?php echo $value['agent']; ?>
                    </td>
                    <td>
                      <?php echo $value['status']; ?>
                    </td>
                    <td><a href='tel:<?= $value['mobile'] ?>' onclick='window.open("callingapi.php?custno=<?php echo $value["mobile_no"]?>&agentno=<?php echo $agentno; ?>&name=<?php echo $value["name"];?>","","width=300,height=500%");'><i class="fas fa-phone-volume"></i></a></td>

<!--<td><a class="" href="tel:<?php echo $value['mobile_no']; ?>"><i class="fas fa-phone-volume"></i></a></td>-->

<td><a class="" href="
#"><i class="fas fa-eye"></i></a></td>
<td><a class="" href="../customer/history.php?cust_id=<?php echo $value['cust_id']?>"><i class="fas fa-history"></i></a></td>
<td><a style="color:green"; class="" href="https://wa.me/?text=<?php echo 'Name:'. $value['name'].'%0A'.'Age: '.$value['age'].'%0A'.'Area: '.$value['current_location']; ?>"><i class="fab fa-whatsapp"></i></a></td>
<td><a  class="" href="mailto:<?= $value['email'] ?>?subject=HireForCare%20Profile&body=Hi%20<?= $value['first_name']?>,%0AWe%20Have%20Received%20your%20below%20request%0AType:%20<?=$value['type']?>%0ALocation:%20<?=$value['location']?>%0ADuty:%20<?=$value['duration']?>%0AAge:%20<?=$value['age']?>%0Apay:%20<?=$value['monthly_pay']?>%0A%0A%0ABest%20%20Regards%0AHireForCare"><i class="far fa-envelope"></i></a></td>

<td><a href="../customer/edit_lead.php?cust_id=<?php echo $value['cust_id']?>" class="text-primary">
      											Edit
      										</a></td>
 
      						</tr>

                  

                  

                  
                  
                  
      						
      												
      				
                 
                  
                </tbody>
                <?php  } ?>
                
      				</table>
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

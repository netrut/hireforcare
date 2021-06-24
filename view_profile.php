<?php
include('function/functions.php');
session_start();
// // If the user is not logged in redirect to the login page...
// if (!isset($_SESSION['loggedin'])) {
// 	header('Location: Registration/login.php');
// // 	exit;
// }
// include('Element/header.php');

$emp_id=$_GET['emp_id'];
require('db.php');
$query="SELECT * FROM employeedata WHERE emp_id='$emp_id'";
// echo $query; die;

// $quer2="INSERT INTO  employeedata(emp_id, comment) va"
$result=mysqli_query($databaseConnection, $query);
$data=mysqli_fetch_assoc($result);

// $id= $data['id'];
?>


<!doctype html>
<html lang="en">

<!-- Mirrored from veepixel.com/tf/html/jodice/staff-profile-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>HireForCare</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" href="assets/images/fav.png" type="image/gif" sizes="64x64">

<!-- CSS
================================================== -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&amp;display=swap&amp;subset=latin-ext" rel="stylesheet">
<link rel="stylesheet" href="assets/css/all.min.css">
<link href="assets/css/aos.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link href="assets/css/select2.min.css" rel="stylesheet" />
<link href="assets/css/owl.carousel.min.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/color-1.css">
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script type="text/javascript">

        function downloadimage() {
            //var container = document.getElementById("image-wrap"); //specific element on page
            var container = document.getElementById("jk");; // full page 
            html2canvas(container, { allowTaint: true }).then(function (canvas) {

                var link = document.createElement("a");
                document.body.appendChild(link);
                link.download = "html_image.jpg";
                link.href = canvas.toDataURL();
                link.target = '_blank';
                link.click();
            });
        }

    </script>
</head>
<body>

<!-- Header 01
================================================== -->
<header class="header_01 header_inner">
	<div  class="header_main">
		<?php include('includes/header.php') ;
		
		?>	
    		<div id="jk"  class="header_btm header_job_single">
	<div class="header_job_single_inner container">
		<div class="poster_staff">
		    <?php if($data['photo']==""){ ?>
                    
                    <img alt="" src="assets/images/S-logo.jpg">
                    <?php
                    
                    } else{?> 
                    <img  alt="brand logo" src="employee/images/<?php echo $data['photo']?>" width="150px" height="150px">
                    
                    <?php } ?>
			
		</div> 
		<div class="poster_details">
			<h2><?php echo $data['name'].$data['last_name'];?></h2>
			<?php if($data['tnc']=='agree'){echo '<span class="varified"><i class="fas fa-check"></i>Verified</span>';} ?>
			<h5><?php echo $data['tasks']?></h5>
			<div class="staff_rating">
        <span><?php if($data['star']==1){echo   'Star candidate <i class="fas fa-star"></i>';} ?></span>
        
      </div>		
		</div>
		<div class="poster_action">
			
			<a class="btn btn-third" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" href="#">Hire me</a>
			<a class="addtofav" title="add to favourite" href="#"><i class="far fa-heart"></i></a>
			
			
			
		</div>
	</div>
    	
    
	</div> 
  </header>




<!-- End Header 02
================================================== -->



<!-- Main 
================================================== -->
<main>
  <div class="single_job">
    <div class="container">
      <div class="row">
          <div class="col-md-3 ">
      		<div class="single-job-sidebar">
				<div class="sjs_box">
					<h3>Employee Summary</h3>
	      			<ul class="single-job-sidebar-features">
	      			    <li>
	      					<i class="fas fa-map-marker-alt"></i>
	      					<h6>Task</h6>
	      					<p><?= $data['tasks']; ?></p>
	      				</li>
	      				<li>
	      					<i class="fas fa-map-marker-alt"></i>
	      					<h6>Experience</h6>
	      					<p><?= $data['experience']; ?></p>
	      				</li>
	      				<li>
	      					<i class="fas fa-briefcase"></i>
	      					<h6>Age</h6>
	      					<p><?= $data['age']; ?></p>
	      				</li>
	      				<li>
	      					<i class="fas fa-briefcase"></i>
	      					<h6>Working Time</h6>
	      					<p><?= $data['duration']; ?></p>
	      				</li>
	      				<li>
	      					<i class="fas fa-money-bill-alt"></i>
	      					<h6>Religion</h6>
	      					<p><?= $data['religion']; ?></p>
	      				</li>
	      				<li>
	      					<i class="far fa-clock"></i>
	      					<h6>Location</h6>
	      					<p><?= $data['current_location'].",".$data['city']; ?></p>
	      				</li>
	      			</ul>
				</div>      			
      			<!-- <div class="sjs_box">
      				<h3>Skills</h3>
      				<ul class="tags">
    						<li>PHP</li>
    						<li>MySQL </li>
    						<li>API Development</li>
    						<li>PHP</li>
    						<li>MySQL </li>
    						<li>API Development</li>
    					</ul>
      			</div> -->
              
      			
      		</div>
          <div class="">
              <h3>Download Resume</h3>
              
              <a   class="download-cv" href="resume/emp_cv.php?emp_id=<?=$emp_id;?>"><i class="fas fa-file-download sjs_box sjs_box_action dis"></i><span>Resume Download</span></a>

              
              <!-- <a class="btn btn-primary" href="#">Hire me</a> -->
              

			 
            
			 <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Hire Me</button>

<div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog mt-5" role="document">
    <div class="modal-content mt-5">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php 
          // // If the user is not logged in redirect to the login page...
 if (!isset($_SESSION['loggedin'])) {  ?>
 	<form action="mail.php?h=1" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" name="rec" value=""  class="form-control" id="recipient-name">
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mobile No:</label>
            <input type="number" name="mobile"  class="form-control" id="recipient-name">
			<input type="hidden" name="emp_id" value="<?= $data['name'];?>(empployee id:-<?=$data['emp_id'];?>)">
          </div>
		  
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="message"id="message-text" value="Hello, I want to Hire  Please Contact Me Back as soon as possible" ></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Send message</button>
        </form>
	
 <?php  }else{?> 
 
 	<form action="mail.php?h=1" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" name="rec" value="<?= $_SESSION["username"]; ?>"  class="form-control" id="recipient-name">
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mobile No:</label>
            <input type="number" value="<?= $_SESSION["phone"]; ?>" name="mobile"  class="form-control" id="recipient-name">
			<input type="hidden" name="emp_id" value="<?= $data['name'];?>(empployee id:-<?=$data['emp_id'];?>)">
          </div>
		  
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="message"id="message-text" value="Hello, I want to Hire  Please Contact Me Back as soon as possible" ></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Send message</button>
        </form>
 
 
 <?php  } ?>
          
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</div>

      		
      	</div>
		  
      



    
      	<div class="col-md-9">
      		<div class="row ">
		        <div class="col-md-12 single_job_main">
		        	<h2><?= $data['name']; ?> Description</h2>
		        	<?php if($data['experience']=="" || $data['experience']=="Fresher") {  ?>
		        	<p>I want a job as Fresher</p>
		        	<?php  }  ?>
		        
		        	<p>I have <?= $data['experience'];  ?> years of experience as a babysitter. I can take care of baby & can also contribute on household work as well</p>
		          <ul>
		              <?php if($data['tasks']=="Cleaning"){ ?>
		              
		              <li>Floor cleaning, Utensil cleaning, Dusting, Helping hand on food preparation, adhoc work</li>
		              <?php }elseif($data['tasks']=="Cooking"){?>  
		              <li>Vegeterian/Non-Veg</li>
		              <?php }elseif($data['tasks']=="Baby Sitting"){?>
		               <li>End to end baby care management [cooking/maintaining hygiene/giving bath/feeding] & can handle a baby with an age group of >x years</li>
		              
		              
		              <?php }elseif($data['tasks']=="Eldery Care"){ ?>
		              
		              
		              <?php }elseif($data['tasks']=="All"){ ?>
		              
		              
		              <?php }elseif($data['tasks']==""){ ?>  
		              
		              
		              <?php }else{?>
		              
		              <?php } ?>
		              
		              
              </ul>
            </div>
		        
		        <div class="section-divider"></div>
		        <div  class="col-md-12 single_job_main">
		        	<h2>Similar Employee </h2>
		        	
		        	<div class="row two_col featured_box_outer">
						<div class="col-sm-6">
							<div class="featured_box ">
								<div class="fb_image">
								    <?php 
								    $id1=$data['id'] +1;

							$query="SELECT * FROM employeedata WHERE id=".$id1;
							// echo $query; die;

								// $quer2="INSERT INTO  employeedata(emp_id, comment) va"
								$result1=mysqli_query($databaseConnection, $query);
								$data1=mysqli_fetch_assoc($result1);
								    if($data1['photo']==""){ ?>
                    
                    <img alt="" src="assets/images/S-logo.jpg" height=40px" width="40px">
                    <?php
                    
                    } else{?> 
                    <img alt="" src=employee/images/<?php echo $data1['photo']?> height="50px" width="50px">
                    
                    <?php } ?>
								    
								
								</div>
								<?php  
								
								?>
								<div class="fb_content">
									<h4><?= $data1['name'];?></h4>
									<ul class="tags">
                <li><?= $data1['tasks'];?></li>
                <!-- <li>Cooking </li>
                <li>Cleaning</li> -->
                
              </ul>
								</div>
								<div class="fb_action">
									<a title="add to favourite" href="#"><i class="far fa-heart"></i></a>
									<a class="btn btn-third" href="view_profile.php?emp_id=<?= $data1['emp_id']?>">View Profile</a>
									
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="featured_box ">
								<div class="fb_image">
								    <?php 
								   	$id2=$data['id'] +2;

							$query2="SELECT * FROM employeedata WHERE id=".$id2;
							// echo $query2; die;

								// $quer2="INSERT INTO  employeedata(emp_id, comment) va"
								$result2=mysqli_query($databaseConnection, $query2);
								$data2=mysqli_fetch_assoc($result2);
								    if($data2['photo']==""){ ?>
                    
                    <img alt="" src="assets/images/S-logo.jpg" height="40px" width="40px">
                    <?php
                    
                    } else{?> 
                    <img alt="" src=employee/images/<?php echo $data2['photo']?> height="50px" width="50px">
                    
                    <?php } ?>
									
								</div>
								<?php  
							
								?>
		
								<div class="fb_content">
									<h4><?= $data2['name'];?></h4>
									<ul class="tags">
                <li><?= $data2['tasks'];?></li>
                <!-- <li>Cooking </li>
                <li>Cleaning</li> -->
                
              </ul>
								</div>
								<div class="fb_action">
									<a title="add to favourite" href="#"><i class="fas fa-heart"></i></a>
									<a class="btn btn-third" href="view_profile.php?emp_id=<?= $data2['emp_id']?>">View Profile</a>
									
								</div>
							</div>
						</div>				
						<div class="col-md-12 text-center">
							<a class="btn btn-primary" href="find-staff.php">Browse All job seekers <i class="fas fa-long-arrow-alt-right"></i></a>
						</div>
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



<!--Footer  -->

	<?php include('includes/footer.php') ?>
<!-- Footer -->
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/aos.js"></script>
<script src="assets/js/custom.js"></script>
</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/staff-profile-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
</html>

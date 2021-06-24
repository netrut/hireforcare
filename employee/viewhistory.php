<?php
session_start();
// print_r($emp_id); die;
require('db.php');
include('../function/functions.php');
admin_manager();
$name = $_SESSION["username"];
$emp_id=$_GET['emp_id'];


 



// print_r($comment); die;
$query= "SELECT * from comment where emp_id='$emp_id' ORDER BY date_time DESC";
// print_r($query); die;
$res=mysqli_query($databaseConnection,$query);
$data=[];
while($response=mysqli_fetch_assoc($res)){
    $data[]=$response;
}
// print_r($_POST)  ;



?>
<!doctype html>
<html lang="en">

<!-- Mirrored from veepixel.com/tf/html/jodice/compnay-profile-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:52:12 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>HireForcare</title>
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
<header class="header_01 header_inner">
	<div class="header_main">
		<?php include('../includes/header.php');
		
		?>	
	<div class="header_btm header_job_single">
	<div class="header_job_single_inner container">
		<div class="">
      <?php $select_query = "SELECT * FROM employeedata WHERE emp_id='$emp_id'"; 
    //   print_r($select_query); die;
      $result=mysqli_query($databaseConnection, $select_query);
    $data1=mysqli_fetch_assoc($result);
      // echo implode($response);

      ?>  
      <!-- <img  alt="brand logo" src="images/<?php echo $data['photo']?>" width="150px" height="150px"> -->
			<img class="mr-2 mt-2 float-left"  alt="Candidate Image" src="images/<?php echo $data1['photo']?> " width="110px" height="190px">
		</div> 
		<div class="poster_details">
      
			<h2> <?php echo $data1['name'];  ?> <br> <?php if($data1['star'] == 1){echo '<span class="varified"><i class="fas fa-check"></i>Verified</span>';} ?>
      <span style="background-color:orangered" class="varified"><i style="background-color:#fd6a02" class="fas fa-user-graduate"></i><?=  $data1['call_status'];?></span>
      <?php if($data1['star'] == 1){echo '<span class="staff_rating"><i class="fas fa-star"></i></span>';} ?>
            
            
            
          
            
            
            
           </h2>
      
			<h5><span><i class="fas fa-phone-square-alt"></i></span> <?=  $data1['mobile_no'];?> <span class="ml-2"> <i class="far fa-clock"></i> <?= $data1['tasks']; ?></span></h5>
      <p></p>
    
			<ul>
				
				<li>
						<i class="fas fa-map-marker-alt"></i>
						<?=  $data1['current_location'];?> 
				</li>
				<li>
						<i class="far fa-clock"></i>
						<?=  $data1['duration'];?>
				</li>
        <li>
						Exp: 
						<?=  $data1['experience'];?>
				</li>
        <li>
						Age: 
						<?=  $data1['age'];?>
				</li>
			</ul>		
      
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
      	<div class="col-md-12">
      		<div class="row ">
		        <div class="col-md-12 single_job_main">
		        	<div class="table-cont">
              
          		 <table class="table">
      					<thead>
                   
      						<tr>
                    <th>Id</th>
      							<th>Remark</th>
      							<th>Reference Check</th>
      							<th>FNF Name</th>
      							<th>FNF Number</th>
      							<th>Id card</th>
                    
                    <th>DOB</th>
                    <th>Referred Channel</th>
                    <th>Referred By Name</th>
                    <th>Referred By Number</th>
                    <th>Created By</th>
                    <th>Comment Status</th>
                    
                    
      						</tr>
      					</thead>
                
      					<tbody>
                  
                  
                    
      						<tr>
                    	<td>
      								 <?php echo $data1['emp_id']; ?>
                       
                       
      							</td>
      							<td>
      								<h6><a href="post-a-job.html"><?=  $data1['remarks'];?></a></h6>	
                      
      							</td>
      							
      							<td>
      								 <?=  $data1['reference_check'];?>
                       
      							</td>
      							<td>
      								<?php echo $data1['fnf_name']; ?>
      							</td>
      							<td>
      								<?php echo $data1['fnf_number']; ?>
      							</td>
      							<td>
      							<?php echo $data1['id_card_number']; ?>
      							</td>
                    <td>
      							<?php echo $data1['dob']; ?>
      							</td>
                    <td>
      							<?php echo $data1['referred_channel']; ?>
      							</td>
                    <td>
      							<?php echo $data1['referred_by_name']; ?>
      							</td>
                    <td>
      							<?php echo $data1['referred_by_number']; ?>
      							</td>
                    <td>
      							<?php echo $data1['form_filled_up_by']; ?>
      							</td>
                    <td>
      							<?php echo $data1['comment_status']; ?>
      							</td>
                    
    

    
</td>

 
      						</tr>

                  

                  

                  
                  
                  
      						
      												
      				
                 
                  
                </tbody>
                
      				</table>
              </div>
              
              </div>
		        <div class="section-divider"></div>
		        <div class="col-md-12 single_job_main">
		        <div class="table-cont">
              
          		 <table class="table">
      					<thead>
                   
      						<tr>
                    <th>Emp Id</th>
      							<th>Name</th>
      							<th>Comment</th>
      							<th>Status</th>
      							<th>Time</th>
      							<th>Comment By</th>
                    
                   
                    
                    
      						</tr>
      					</thead>
                
      					<tbody>
                <?php foreach($data as $value) { ?>
                  
                  
                    
      						<tr>
                    	<td>
      								 <?php echo $value['emp_id']; ?>
                       
                       
      							</td>
      							<td>
      								<h6><a href="post-a-job.html"><?=  $value['name'];?></a></h6>	
                      
      							</td>
      							
      							<td>
      								 <?=  $value['comment'];?>
                       
      							</td>
      							<td>
      								<?=  $value['status'];?>
      							</td>
      							<td>
      								<?=  $value['date_time'];?>
      							</td>
      							<td>
      							<?php echo $value['username']; ?>
      							</td>
                    
                   
    

    
</td>

 
      						</tr>

                  

                  

                  
                  
                  
      						
      												
      				
                 
                  <?php } ?>
                </tbody>
                
      				</table>
              </div></div>
		        <div class="section-divider"></div>
		       				
						
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
</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/compnay-profile-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:52:15 GMT -->
</html>


<?php 
session_start();
include('../../function/functions.php');
include('../../dashboard/functions.php');
$cust_id= $_GET['cust_id'];

require('../../db.php');


// $name = $_SESSION["username"];
// // print_r($name); die;
// // If the user is not logged in redirect to the login page...
// if (!isset($_SESSION['loggedin'])) {
// 	header('Location: ../Registration/login.php');
// // 	exit;
// }
// $select_query = "SELECT * FROM cust_tab where id=".$id;
$select_query = "SELECT * FROM cust_tab Where cust_id='$cust_id'";
// echo $select_query; die;
$result = mysqli_query($databaseConnection,$select_query);

$data=mysqli_fetch_assoc($result);
//  print_r($result); die;





?>



<!doctype html>
<html lang="en">

<!-- Mirrored from veepixel.com/tf/html/jodice/post-a-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
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
    admin();
    ?>	
		<div class="header_btm">
      <h2>Payment Form</h2>
    </div>
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
                <h5>Post a job</h5>
                <a class="btn btn-primary mypbtn" href="compnay-profile-single.html">Company profile</a>
              </div>
              <div class="section-divider">
              </div>
               <form action="insert_payment_detail.php" method="post">
                <div class="big_form_group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Customer Id</label>
                        <input readonly type="text" name="cust_id" class="form-control" value="<?= $cust_id;  ?> ">
                      </div>
                    </div>
                     
                    
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Name</label>
                        <input readonly name="name" type="text" class="form-control" placeholder="" value="<?= $data['first_name']; ?> <?=  $data['last_name'] ?>">
                         <input  readonly name="first_name" type="hidden" class="form-control" placeholder="" value="<?= $data['first_name']; ?> ">
                      
                          <input readonly name="last_name" type="hidden" class="form-control" placeholder="" value=" <?=  $data['last_name'] ?>">
                      
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="big_form_group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Date</label>
                        <input type="date" name="date" class="form-control" placeholder="" value="<?php echo date('Y-m-d'); ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"> 
                          <label  >Payment Mode</label> 
							 <select class="form-control"   name="payment_mode">
                <option value="" disabled selected >Select Payment Mode</option>
                
                <option value="Cash deposit">Cash deposit</option>
                <option value="Account transfer">Account transfer</option>
                <option value="Pay to nanny">Pay to nanny</option>
                <option value="Google pay">Google pay</option>
                <option value="Phone pay">Phone pay</option>
                <option value="Paytm">Paytm</option>
                <option value="UPI">UPI</option>
                <option value="Adjustment">Adjustment</option>
                <option value="Other">Other</option>
                
</select>
						</div>
                    </div> 
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Amount</label>
                        <input type="text" name="amount" class="form-control" placeholder="">
                      </div>
                      <div class="form-group ">
                        <label  >Monthly Fix Pay</label>
                        
                          <input readonly name="monthly_pay" type="text" class="form-control" placeholder="" value=" <?=  $data['monthly_pay'] ?>">
                      
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Remark</label>
                        <textarea name="remark" id="" cols="30" rows="5"></textarea>
                        <!-- <input type="text" class="form-control" placeholder="" value="5 Years "> -->
                      </div>
                    </div>
                  </div>
                </div>

                

                <div class="form-group row">
                  <div  class="col-md-9 ">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
>

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

<!-- Mirrored from veepixel.com/tf/html/jodice/post-a-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
</html>

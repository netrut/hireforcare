<?php
require('../db.php');
session_start();
include('../dashboard/functions.php');

include('../function/functions.php');
admin_manager();

// session_start();

// print_r($name); die;
// If the user is not logged in redirect to the login page...
// if (!isset($_SESSION['loggedin'])) {
// 	header('Location: ../Registration/login.php');
// // 	exit;
// }
$limit = 4;

$select_query = "SELECT * FROM cust_tab ORDER BY date DESC";
$result = mysqli_query($databaseConnection,$select_query);
$number_of_result = mysqli_num_rows($result);  
    $total_records = $number_of_result; 
    $total_pages = ceil($total_records / $limit);
//  print_r($total_pages); die;
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
  <?php

include('../includes/header.php') ;
  ?>
		<div class="header_btm">
      <h2>Payment Details</h2>
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
                  <input id="from_date"  name="date"  type="date" class="form-control"><span onclick="javascript:from_date.value=''" style="cursor:pointer"></span>
                </div>
              </div>  
              
              
             

              <div class="form-group">
                <label>To</label>
                <div class="field">
                    <input id="to_date"  name="to_date"  type="date" class="form-control"><span onclick="javascript:to_date.value=''" style="cursor:pointer"></span>
                  
                </div>
              </div>
               
                
                
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
                <label>Manager</label>
                <div class="field">
                    <i class="fas fa-briefcase"></i>
                    <select id="agent_dropdown"  class="js-example-basic-single" name="state">
                        <option value="" >All</option>
                                        <?php
                                        
                                        $sql ="SELECT DISTINCT agent from cust_tab";
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>

<option ><?php echo $row['agent']  ?></option>
<?php } ?>
  
                    </select>
                </div>
              </div>
              
              
              <div class="form-group">
                <label>Status</label>
                <div class="field">
                    <i class="fas fa-briefcase"></i>
                    <select id="status_dropdown"  class="js-example-basic-single" name="state">
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
              
              <!----------Religion fid end---------->

              <div class="form-group">
                <label>Salary</label>
                <div class="field">
                
                  <input type="text" placeholder="e.g. 10k" class="form-control">
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
         
          <script>
        
        var i = 0;
        function buttonClick() {
        i++;
        if(i>0){
        $('.cn').show()
    }
        document.getElementById('inc').value = i;
         $.ajax({
      url: "filter.php",
      type: "GET",
      data: {
        next: i,
      },
      
      cache: false,
      success: function (dataResult) {
        $("#ajaxdata").html(dataResult);
      
      },
       
  });
    }
</script>

<button class="btn btn-primary float-right" onclick="buttonClick();">Next<i class="material-icons">arrow_right</i></button>
<input type="hidden" id="inc" value="0"></input>

<script>
    
    function buttonClick1() {
        if(i>0){
           i--;
           
        }
        else{
         i = 0;
         
        }
        if(i<1){
        $('.cn').hide()
    }
        document.getElementById("inc").value = i;
         $.ajax({
      url: "filter.php",
      type: "GET",
      data: {
        next: i,
      },
      
      cache: false,
      success: function (dataResult) {
        $("#ajaxdata").html(dataResult);
      
      },
       
  });
    }

</script>


<button style="display: none;" id="cn" class="btn btn-primary float-left cn" onclick="buttonClick1();"><i class="material-icons">arrow_left</i>Previous</button>
<input type="hidden" id="inc" value="0"></input>
           
                    
        </div>
      </div>
    </div>
  </div>
</main>


<!-- Footer Container
================================================== -->


<?php include('../includes/footer.php') ?>

<!-- End Footer Container
================== -->

<!-- Scripts
================================================== -->
<script src="../assets/js/jquery-3.4.1.min.js"></script>
<script src="../assets/js/select2.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/aos.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="lead.js"></script>
</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/my-job-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
</html>

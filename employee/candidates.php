<?php  
require('db.php');
session_start();
include('../function/functions.php');
include('../dashboard/functions.php');
admin_manager();
$limit = 4;
    $query="SELECT * FROM employeedata";
    $result = mysqli_query($databaseConnection,$query);
    $number_of_result = mysqli_num_rows($result);  
    $total_records = $number_of_result; 
    $total_pages = ceil($total_records / $limit);
    // echo $total_pages;die;
    
//  print_r($result); die;
$data=[];
while($response=mysqli_fetch_assoc($result)){
    $data[]=$response;
}
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from veepixel.com/tf/html/jodice/find-staff.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
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
  <?php

include('../includes/header.php') ;
  ?>
		<div class="header_btm">
      <h2>Employees Details</h2>
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
        <div class="d-flex justify-content-center align-items-center">
            
        <?php if($_GET['c']==s) {  ?> 
        <div class="alert alert-success alert-dismissible fade show col-md-6 text-center" role="alert">
  <strong><?= $_GET['name'];  ?>'s</strong> remark successfully updated
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        <?php }  ?>    
        </div>
        
      <div class="row job_main"> 
          
          
        <div class="sidebar">

          <ul class="user_navigation">
            <li >
              <a href="#sidebar_filter_option"><i class="fas fa-search"></i> Filters</a>
              <a class="filter_btn" href="#sidebar_filter_option"> 
                <i class="fas fa-filter"></i>
                <i class="fas fa-times"></i>
              </a>
            </li>
            <li >
            <form id="#sidebar_filter_option" class="filter_option">
                
                 <div class="form-group">
                <label>From</label>
                
                <div class="field">
                  <input id="from_date"  name="form_date"  type="date" class="form-control">
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
                    <i class="fas fa-user"></i>
                    <select id="name_dropdown" class="js-example-basic-single" name="state">
                        <option value="" >All</option>
                        <?php
                                        
                                        $sql ="SELECT DISTINCT name from employeedata";
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>

<option ><?php echo $row['name']  ?></option>
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
                                        
                                        $sql ="SELECT DISTINCT mobile_no from employeedata";
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>

<option ><?php echo $row['mobile_no']  ?></option>
<?php } ?>
                        
                      
                    </select>
                </div>
              </div>  
              
              
              <div class="form-group">
                <label>Created By</label>
                <div class="field">
                    <i class="fas fa-user"></i>
                    <select id="created_by_dropdown" class="js-example-basic-single" name="state">
                        <option value="" >All</option>
                        <?php
                                        
                                        $sql ="SELECT DISTINCT form_filled_up_by from employeedata";
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>

<option ><?php echo $row['form_filled_up_by']  ?></option>
<?php } ?>
                        

                    </select>
                </div>
              </div> 
                
                
              <div class="form-group">
                <label>Location</label>
                <div class="field">
                    <i class="fas fa-map-marker-alt"></i>
                    <select id="location_dropdown" class="js-example-basic-single" name="state">
                        <option value="" >All</option>
                        <?php
                                        
                                        $sql ="SELECT DISTINCT current_location from employeedata";
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>

<option ><?php echo $row['current_location']  ?></option>
<?php } ?>
                        
            
                    </select>
                </div>
              </div>  
              <div class="form-group">
                <label>Task</label>
                <div class="field">
                    <i class="fas fa-user"></i>
                    <select id="task_dropdown" class="js-example-basic-single" name="state">
                        <option value="" >All</option>
                        
                       <?php
                                        
                                        $sql ="SELECT DISTINCT tasks from employeedata";
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>

<option ><?php echo $row['tasks']  ?></option>
<?php } ?>
                      
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label>Status</label>
                <div class="field">
                    <i class="fas fa-user"></i>
                    <select id="call_status_dropdown" class="js-example-basic-single" name="state">
                        <option value="" >All</option>
                        
                       <?php
                                        
                                        $sql ="SELECT DISTINCT call_status from employeedata";
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>

<option ><?php echo $row['call_status']  ?></option>
<?php } ?>
                      
                    </select>
                </div>
              </div>
              
              <div class="form-group">
                <label>Experience</label>
                <div class="field">
                    <i class="fas fa-briefcase"></i>
                    <select id="experience_dropdown"  class="js-example-basic-single" name="state">
                        <option value="" >All</option>
                                        <?php
                                        
                                        $sql ="SELECT DISTINCT experience from employeedata";
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>

<option ><?php echo $row['experience']  ?></option>
<?php } ?>
  
                    </select>
                </div>
              </div>
              <!--------Age fild satrt----->
              
              <div class="form-group">
                <label>Age</label>
                <div class="field">
                    <i class="fas fa-align-right"></i>
                    <select id="age_dropdown"  class="js-example-basic-single" name="state">
                        <option value="" >All</option>
                                        <?php
                                        
                                        $sql ="SELECT DISTINCT age from employeedata";
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>

<option ><?php echo $row['age']  ?></option>
<?php } ?>
  
                    </select>
                </div>
              </div>
              
              <!----------Age fid end---------->
              <!--------religion fild satrt----->
              
              <div class="form-group">
                <label>Religion</label>
                <div class="field">
                    <i class="fas fa-heart"></i>
                    <select id="religion_dropdown"  class="js-example-basic-single" name="state">
                        <option value="" >All</option>
                                        <?php
                                        
                                        $sql ="SELECT DISTINCT religion from employeedata";
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>

<option ><?php echo $row['religion']  ?></option>
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
        
        
        
        <div class=" job_main_right ">
            
         
            	
                 <div id="ajaxdata" class="row findstaf_section">
            
            <!-- <p>hello</p> -->
          </div>  
          
        
          
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
================================================== -->

<!-- Scripts
================================================== -->
<script src="../assets/js/jquery-3.4.1.min.js"></script>
<script src="../assets/js/select2.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/aos.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="main.js"></script>
<script src="../script.js"></script>

</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/find-staff.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:52:12 GMT -->
</html>

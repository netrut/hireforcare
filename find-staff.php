<?php  
session_start();
require('db.php');
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
<!-- Latest compiled and minified CSS -->


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript">
		$(document).ready(function(){
// 			$("#ajaxdata").load("allrecords.php");
$("#ajaxdata").load("filter.php?page=1");
		$(".page-link").click(function(){
			var id = $(this).attr("data-id");
			var select_id = $(this).parent().attr("id");
			$.ajax({
				url: "filter.php",
				type: "GET",
				data: {
					page : id
				},
				cache: false,
				success: function(dataResult){
					$("#ajaxdata").html(dataResult);
					$(".pageitem").removeClass("active");
					$("#"+select_id).addClass("active");
					
				}
				
				
			});
		});


			                                                                                                    
			
			
			
			$("#location_dropdown").change(function(){
				var selected_location=$('#location_dropdown').val();
				var selected_experience=$('#experience_dropdown').val();
				var selected_task=$('#task_dropdown').val();
				$("#ajaxdata").load("filter.php",{selected_location: selected_location, selected_experience:selected_experience, selected_task:selected_task});
			});
			
			$("#experience_dropdown").change(function(){
			    var selected_location=$('#location_dropdown').val();
				var selected_experience=$('#experience_dropdown').val();
				var selected_task=$('#task_dropdown').val();
				$("#ajaxdata").load("filter.php",{selected_experience: selected_experience, selected_location: selected_location, selected_task:selected_task });
			});
			
			$("#task_dropdown").change(function(){
			    var selected_location=$('#location_dropdown').val();
				var selected_experience=$('#experience_dropdown').val();
				var selected_task=$('#task_dropdown').val();
				$("#ajaxdata").load("filter.php",{selected_experience: selected_experience, selected_location: selected_location, selected_task:selected_task });
			});
			
			
			$("#refresh").click(function(){
				$("#ajaxdata").load("allrecords.php");
			});
		});
	</script>
</head>
<body>

<!-- Header 01
================================================== -->
<header class="header_01 header_inner">
	<div class="header_main">
		<?php include('includes/header.php') ?>	
		<div class="header_btm">
      <h2>Find Helper</h2>
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
            <li class="is-active" >
              <a href="find-staff.php"><i class="fas fa-search"></i> Find Staff </a>
              <a class="filter_btn" href="#sidebar_filter_option"> 
                <i class="fas fa-filter"></i>
                <i class="fas fa-times"></i>
              </a>
            </li>
            <li >
            <form id="#sidebar_filter_option" class="filter_option">
                
                
              <div class="form-group">
                <label>Location</label>
                <div class="field">
                    <i class="fas fa-map-marker-alt"></i>
                    <select id="location_dropdown" class="js-example-basic-single" name="state">
                        <option value="" >All</option>
                        <?php
                                        
                                        $sql ="SELECT DISTINCT current_location from employeedata";
                                        // echo $sql;
                                        $result1 = mysqli_query($databaseConnection,$sql);
                                        while($row = $result1->fetch_assoc()){
                                        
                                        ?>


<option value="<?php echo $row['current_location']  ?>" ><?php echo $row['current_location']  ?></option>
<?php
}
?>
                    </select>
                </div>
              </div>  
              <div class="form-group">
                <label>Title</label>
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

<script> 
$(document).ready(function(){
    if(i<1){
        $('.cn').hide()
    }
    else{
        $('.cn').show()
        
    }
}
</script>

<button style="display: none;" id="cn" class="btn btn-primary float-left cn" onclick="buttonClick1();"><i class="material-icons">arrow_left</i>Previous</button>
<input type="hidden" id="inc" value="0"></input>

                    
        </div>
      </div>
    </div>
  </div>
</main>


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

<!-- Mirrored from veepixel.com/tf/html/jodice/find-staff.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:52:12 GMT -->
</html>

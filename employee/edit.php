<?php
require('db.php');
session_start();
include('../function/functions.php');
admin_manager_candidate();
$emp_id=$_GET['emp_id'];
require('db.php');
$query="SELECT * FROM employeedata WHERE emp_id='$emp_id'";
$result=mysqli_query($databaseConnection, $query);
$data=mysqli_fetch_assoc($result);
//print_r($data);

$select_manager= "SELECT * from user WHERE role_id=2";
$run_manager=mysqli_query($databaseConnection, $select_manager);
$data2=[];
while($response=mysqli_fetch_assoc($run_manager)){
    $data2[]=$response;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $emp_id= $_POST['emp_id'];
    $assign = $_POST['assign'];
    $query2 = "UPDATE  employeedata Set assign ='$assign' where emp_id='$emp_id'";
    // echo $query2; die;
    $response2=mysqli_query($databaseConnection,$query2);
    if($response2){
        header("location:edit.php?emp_id=$emp_id&a=s");
    }
     
    
}




?>
<!doctype html>
<html lang="en">

<!-- Mirrored from veepixel.com/tf/html/jodice/edit-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
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
      <h2>Edit Candidate</h2>
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
         <?php if($_GET['a']==s) {  ?> 
        <div class="alert alert-success alert-dismissible fade show col-md-6 text-center" role="alert">
  <strong>Manager Assigned Successfully</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        <?php }  ?>  
        </div>
      <div class="row job_main">
        
        
          <div class="col-sm-12 ">
              
              
              <div class="float-right"><a class="btn btn-primary mypbtn" data-toggle="modal" data-target="#a<?php echo $emp_id; ?>" data-whatever="@mdo" href="javascript:void(0)">Assign</a>
                <a class="btn btn-primary mypbtn" data-toggle="modal" data-target="#c<?php echo $emp_id; ?>" data-whatever="@mdo" href="javascript:void(0)">Remark</a> </div>
              
            <div class="jm_headings">
                
               
                <div class="modal fade mt-5" id="a<?php echo $emp_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog mt-5" role="document">
    <div class="modal-content mt-5">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asssign Box</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="modal-body">
            <input type="hidden" name="emp_id" value="<?php  echo $emp_id?>"> 
         <div class="form-group">
             
   <select name="assign"  class="form-control">
       <option disabled value="">Choose Manager</option>
       <?php foreach($data2 as $value){  ?>
       
          <option><?php echo $value['username'];  ?></option>
          <!--<?php if(!empty($data['assign'])){?>  value="<?= $data['assign']; ?>" <?php } ?>-->
          
          <?php  } ?>
</select>
    

    
                                              </div>
                                              <div class="text-center"><button type="submit" class="btn btn-primary">Submit</button> </div>
                                              </div>
        
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="c<?php echo $emp_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Comment</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <form  action="commentUpdate.php" method="post">
        <div class="modal-body">
         <div class="form-group">
             <textarea class="form-control"  name="comment" name="" id=""  placeholder="Enter call Comment"></textarea>
                                               <!--<input class="form-control"  name="comment" type="text" placeholder="Enter call Comment">-->
    <input type="hidden" name="emp_id" value="<?php  echo $emp_id?>">   
    <input type="hidden" name="name" value="<?php echo $data['name'] ?>">
    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">


    <select class="form-control" name="status" id="">
        <option >Available</option>
        <option >Not Available</option>
        <option >Already Working</option>
        <option >Not Interested</option>
    </select>
    

    
                                              </div>
                                              <div class="text-center"><button type="submit" class="btn btn-primary">Submit</button> </div>
                                              </div>
        
      </form>
                                                  
                                                
                                                </div>
                                              </div>
                                            </div>
              </div>
              <div class="section-divider">
              </div>
               <form action="editsave.php" method="post" enctype="multipart/form-data">
                <div class="big_form_group">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group ">
                        <label  >Upload Profile</label>
                        <input type="hidden" name="oldphoto" value="<?php echo $data['photo']?>" >
                        <?php if($data['photo']==""){ ?>
                    
                    <img alt="" src="../assets/images/S-logo.jpg" width="150">
                    <?php
                    
                    } else{?> 
                    <img class="mb-2" src="images/<?php echo $data['photo']?>" alt="Admin" class="rounded-circle" width="150">
                    
                    <?php } ?>


<input class="form-control" type="file" name="photo" > 
<input type="hidden" name="emp_id" value="<?php  echo $data['emp_id']?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group ">
                        <label  >Name</label>
                        <input class="form-control" type="name" name="name" value="<?php echo $data['name'] ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group ">
                        <label  >Experience</label>
                        <input type="text" name="experience" class="form-control" placeholder="" value="<?php echo $data['experience'] ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group ">
                        <label  >Age</label>
                        <select name="age"  class="form-control">
          <option value="" <?php if($data['age'] == ''){echo 'selected="selected"';}?> disabled>Choose Option</option>
          <option value="18-25"<?php if($data['age'] == '18-25'){echo 'selected="selected"';}?>>18-25</option>
          <option value="26-35"<?php if($data['age'] == '26-35'){echo 'selected="selected"';}?>>26-35</option>
          <option value="36-45"<?php if($data['age'] == '36-45'){echo 'selected="selected"';}?>>36-45</option>
          <option value="46-55"<?php if($data['age'] == '46-55'){echo 'selected="selected"';}?>>46-55</option>
          <option value="56+"<?php if($data['age'] == '56+'){echo 'selected="selected"';}?>>56+</option>
          
          
</select>
                        
                      </div>
                    </div>
                    <?php if($_SESSION['role_id']!==4){ ?>
                    <div class="col-md-2">
                      <div class="form-group form-inline ">
                        <label  class="mr-2">Star Candidate</label>
                        <input  class="form-control" type="checkbox"  name="star" value="1" <?php if($data['star']==1){echo "checked";} ?>>
                      </div>
                    </div> 

                    <?php } ?>
                    
                    
                  </div>
                </div>
                <div class="big_form_group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Religion</label>
                        <select name="religion"  class="form-control">
          <option value="" <?php if($data['religion'] == ''){echo 'selected="selected"';}?> disabled>Choose Option</option>
          <option value="Hindu"<?php if($data['religion'] == 'Hindu'){echo 'selected="selected"';}?>>Hindu</option>
          <option value="Muslim"<?php if($data['religion'] == 'Muslim'){echo 'selected="selected"';}?>>Muslim</option>
          <option value="Bengali"<?php if($data['religion'] == 'Bengali'){echo 'selected="selected"';}?>>Bengali</option>
          <option value="Others"<?php if($data['religion'] == 'Others'){echo 'selected="selected"';}?>>Others</option>
          
          
</select> 
                        
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Phone</label>
                        <input class="form-control" type="name" name="mobile_no" value="<?php echo $data['mobile_no'] ?>">
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Address</label>
                        <input class="form-control" type="name" name="current_location" value="<?php echo $data['current_location'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Remarks</label>
                        <input class="form-control" type="name" name="remarks" value="<?php echo $data['remarks'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Working Hours</label>
                         <select name="duration"  class="form-control">
          <option value="" <?php if($data['duration'] == ''){echo 'selected="selected"';}?> disabled>Choose Option</option>
          <option value="Full Day (max 12 hours)"<?php if($data['duration'] == 'Full Day (max 12 hours)'){echo 'selected="selected"';}?>>Full Day (max 12 hours)</option>
          <option value="Live-in (24 hrs)"<?php if($data['duration'] == 'Live-in (24 hrs)'){echo 'selected="selected"';}?>>Live-in (24 hrs)</option>
          <option value="Part Time (1-4 hrs)"<?php if($data['duration'] == 'Part Time (1-4 hrs)'){echo 'selected="selected"';}?>>Part Time (1-4 hrs)</option>
          <option value="Any Time"<?php if($data['duration'] == 'Any Time'){echo 'selected="selected"';}?>>Any Time</option>
          
          
</select> 
                        
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Call Status</label>
                        <input class="form-control" type="name" name="call_status" value="<?php echo $data['call_status'] ?>">
                      </div>
                    </div>
                      <div class="col-md-6">
                       <div class="form-group">
							 <label for="inputTasks">Tasks</label>
      <select name="tasks"  class="form-control">
          <option value="" <?php if($data['tasks'] == ''){echo 'selected="selected"';}?> disabled>Choose Option</option>
          <option value="Cleaning" <?php if($data['tasks'] == 'Cleaning'){echo 'selected="selected"';}?>>Cleaning</option>
          <option value="Cooking" <?php if($data['tasks'] == 'Cooking'){echo 'selected="selected"';}?>>Cooking</option>
          <option value="Baby Care" <?php if($data['tasks'] == 'Baby Care'){echo 'selected="selected"';}?>>Baby Care</option>
          <option value="Japa Nanny" <?php if($data['tasks'] == 'Japa Nanny'){echo 'selected="selected"';}?>>Japa Nanny</option>
           <option value="Baby Care+Cooking" <?php if($data['tasks'] == 'Baby Care+Cooking'){echo 'selected="selected"';}?>>Baby Care+Cooking</option>
           <option value="Baby Care+Cleaning" <?php if($data['tasks'] == 'Baby Care+Cleaning'){echo 'selected="selected"';}?>>Baby Care+Cleaning</option>
           <option value="Cooking+Cleaning" <?php if($data['tasks'] == 'Cooking+Cleaning'){echo 'selected="selected"';}?>>Cooking+Cleaning</option>
           <option value="Baby Care+Cooking+Cleaning" <?php if($data['tasks'] == 'Baby Care+Cooking+Cleaning'){echo 'selected="selected"';}?>>Baby Care+Cooking+Cleaning</option>
          
</select> 
						</div>
                    </div>
                    
                   
                    
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Refrence Check</label>
                        <input class="form-control" type="name" name="reference_check" value="<?php echo $data['reference_check'] ?>">
                      
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >FNF Name</label>
                        <input class="form-control" type="name" name="fnf_name" value="<?php echo $data['fnf_name'] ?>">
                      </div>
                    </div>

                     <div class="col-md-6">
                      <div class="form-group ">
                        <label  >FNF Number</label>
                        <input class="form-control" type="name" name="fnf_number" value="<?php echo $data['fnf_number'] ?>">
                      </div>
                    </div>

                     <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Date Of Birth</label>
                        <input class="form-control" type="name" name="dob" value="<?php echo $data['dob'] ?>">
                      </div>
                    </div>

                     <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Referred Channel</label>
                        <input class="form-control" type="name" name="referred_channel" value="<?php echo $data['referred_channel'] ?>">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Referred Number</label>
                        <input class="form-control" type="name" name="referred_by_name" value="<?php echo $data['referred_by_name'] ?>">
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Referred Channel</label>
                        <input class="form-control" type="name" name="referred_by_number" value="<?php echo $data['referred_by_number'] ?>">
                      </div>
                    </div>







                  </div>
                </div>

                <div class="big_form_group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Id Name</label>
                        <input class="form-control" type="name" name="id_card_name" value="<?php echo $data['id_card_name'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Id Number</label>
                        <input class="form-control" type="name" name="id_card_number" value="<?php echo $data['id_card_number'] ?>">
                      </div>
                    </div> 
                    <div class="col-md-6 text-center">
                        <div class="form-group ">
                            <label  >Id Front</label>
                            <input type="hidden" name="oldidfront" value="<?php echo $data['id_card_front_photo']?>" >
                            <img src="images/<?php echo $data['id_card_front_photo']?>" alt="Id Front Photo"  width="150" hight="150">
                            <input class="form-control" type="file" name="id_card_front_photo" > 
                        </div>
                    </div> 
                    <div class="col-md-6 text-center">
                      <div class="form-group ">
                        <label  >Id Back</label>
                        <input type="hidden" name="oldidback" value="<?php echo $data['id_card_back_photo']?>" >
                            <img  src="images/<?php echo $data['id_card_back_photo']?>" alt="Id Back Photo"  width="150" hight="150">

                            <input class="form-control" type="file" name="id_card_back_photo" > 
                      </div>
                    </div> 
                    
                    <div class="col-md-6 text-center">
                      <div class="form-group ">
                        <label  >Self Verfication Report</label>
                        <input type="hidden" name="oldsvr" value="<?php echo $data['sv_report_image']?>" >
                            <img  src="images/verification/self_verification/<?php echo $data['sv_report_image']?>" alt="SV Report"  width="150" hight="150">

                            <input class="form-control" type="file" name="sv_report_image" > 
                      </div>
                    </div> 
                    
                    <div class="col-md-6 text-center">
                      <div class="form-group ">
                        <label  >Covid Verfication Report</label>
                        <input type="hidden" name="oldcvr" value="<?php echo $data['cv_report']?>" >
                            <img  src="images/verification/covid_verification/<?php echo $data['cv_report']?>" alt="CV Report"  width="150" hight="150">

                            <input class="form-control" type="file" name="cv_report" > 
                      </div>
                    </div> 
                    <div class="col-md-12">
                      <div class="form-group ">
                        <label  >Form Filled Up By</label>
                         <input readonly class="form-control" type="name" name="last_edit" value="<?php echo $_SESSION['username'] ?>">
                  
                        
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
<script src="../script.js"></script>

</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/edit-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:51:49 GMT -->
</html>

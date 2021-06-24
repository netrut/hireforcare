<?php  
require('db.php');
@$loc = $_POST['selected_location'];
// print_r($loc);
// die;

$start_from = 10*$_GET['next'];

$limit = 10;
// if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
// $start_from = ($page-1) * $limit;  
// Find out the number of result stored in database

    
    
    
    
    
        
    
    if(isset($_POST)){
        
    //   $sql = "SELECT * from employeedata Where emp_id !=''";
    $sql = "SELECT * from employeedata Where emp_id IS NOT NULL";
       
       
    //   if($_POST['selected_location'] === '*'){
    //       break;
            
               
    //       }
           
           if(isset($_POST['selected_location'] ) && $_POST['selected_location'] !=""){
           $loc = $_POST['selected_location'];
           
           
        
        $sql .= " AND current_location IN('$loc')";
        // print_r($sql); die;
        
         
        
         
    } 
               
           
       
       
    
    if(isset($_POST['selected_experience']) && $_POST['selected_experience'] !=""){
        $exp = $_POST['selected_experience'];
        
        
        $sql .= " AND experience IN('$exp')";
        
        
    } 
    
    if(isset($_POST['selected_task']) && $_POST['selected_task'] !=""){
        $task = $_POST['selected_task'];
        
        
        $sql .= " AND tasks IN('$task')";
        
        
    } 
    
   
    }
    
    $result1 = mysqli_query($databaseConnection,$sql);
    $number_of_result =mysqli_num_rows($result1); 
    
    
    $query="$sql  LIMIT $start_from, $limit";
   
    // $result = mysqli_query($databaseConnection,$query);
    // $number_of_result =mysqli_num_rows($result);  
    //  print_r($query); die;
    // echo $sql; die;
      // echo $query; die;



    
     
    $result = mysqli_query($databaseConnection,$query);
     
    $data=[];
while($response=mysqli_fetch_assoc($result)){
    $data[]=$response;
    
}

?>


<?php 
foreach($data as $value){
?>

<div class="col-sm-6">
              <div class="staffBox">
                <div class="staff_img">
                    <?php if($value['photo']==""){ ?>
                    
                    <img alt="" src="assets/images/S-logo.jpg">
                    <?php
                    
                    } else{?> 
                    <img alt="" src=employee/images/<?php echo $value['photo']?> height="80px" width="80px">
                    
                    <?php } ?>
                  
                </div>
                <div class="staff_detail">
                  <h3><?php echo $value['name'] ?><img alt="" src="assets/images/au.svg"></h3>
                  <p><?php echo $value['tasks'] ?></p>
                  <ul>
                    
                    <li>
                      <h6>Experience</h6>
                      <i class="fas fa-calendar-check"></i>
                      <span><?php echo $value['experience'] ?></span>
                    </li>
                    <li>
                      <h6>Age</h6>
                      <i class="fas fa-user"></i>
                      <span><?php echo $value['age'] ?></span>
                    </li>
                  </ul>
                  <div class="staffBox_action">
                    <a  class="btn btn-third" href="view_profile.php?emp_id=<?php echo $value['emp_id']?>">View profile</a>
                  </div>
                </div>
              </div>
            </div>
            
            <?php  } ?>
            <!--pagination-->
            
            <!--pagination-->
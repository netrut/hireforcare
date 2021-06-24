<?php  
require('db.php');
// $from_date = $_POST['selected_created_by_dropdown'];
// @$loc = $_POST['selected_location'];

// echo($from_date);
// die;
// $counter = $_GET['current_value'] + 1;       //value is increase here
//     echo $counter; //return the value in JSON format

$start_from = 10*$_GET['next'];

$limit = 10;
//  $limit= $limit * $y;
  

  
// if (isset($_GET["next"])) { $page  = $_GET["next"]; } else { $page=1; }; 
// $start_from = ($page-1) * $limit;  


// Find out the number of result stored in database

    // $sql = "SELECT * from employeedata Where emp_id IS NOT NULL ORDER BY update_date DESC";
        
    
    if(isset($_POST)){
        
    //   $sql = "SELECT * from employeedata Where emp_id !=''";
    $sql = "SELECT * from employeedata Where emp_id IS NOT NULL";
       
       
    //   if($_POST['selected_location'] === '*'){
    //       break;
            
               
    //       }
    
    if(isset($_POST['selected_from_date'] ) && $_POST['selected_from_date'] !=""){
           $from_date = $_POST['selected_from_date'];
          //  echo $name; die;
           
           
        
            $sql .= " AND update_date >'$from_date'";
        // print_r($sql); die;
        
         
        
         
    } 
    
    
    if(isset($_POST['selected_to_date'] ) && $_POST['selected_to_date'] !=""){
           $to_date = $_POST['selected_to_date'];
          //  echo $name; die;
           
           
        
            $sql .= " AND update_date <'$to_date'";
        // print_r($sql); die;
        
         
        
         
    }
    
    if(isset($_POST['selected_created_by_dropdown'] ) && $_POST['selected_created_by_dropdown'] !=""){
           $created_by_dropdown = $_POST['selected_created_by_dropdown'];
          //  echo $name; die;
           
           
        
            $sql .= " AND form_filled_up_by IN ('$created_by_dropdown')";
        // print_r($sql); die;
        
         
        
         
    }
           
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

    if(isset($_POST['selected_name']) && $_POST['selected_name'] !=""){
        $name = $_POST['selected_name'];
        
        
        $sql .= " AND name IN('$name')";  
        
        
    } 

     if(isset($_POST['selected_number']) && $_POST['selected_number'] !=""){
        $number = $_POST['selected_number'];
        
        
        $sql .= " AND mobile_no IN('$number')";  
        
        
    } 
    
    
    if(isset($_POST['selected_call_status']) && $_POST['selected_call_status'] !=""){
        $call_status = $_POST['selected_call_status'];
        
        
        $sql .= " AND call_status IN('$call_status')";  
        
        
    } 
    
    if(isset($_POST['selected_age']) && $_POST['selected_age'] !=""){
        $age = $_POST['selected_age'];
        
        
        $sql .= " AND age IN('$age')";  
        
        
    } 
    if(isset($_POST['selected_religion']) && $_POST['selected_religion'] !=""){
        $religion = $_POST['selected_religion'];
        
        
        $sql .= " AND religion IN('$religion')";  
        
        
    } 
    
    $sql .= " ORDER BY update_date DESC";
    
    // if(isset($_POST['button_inc']) && $_POST['button_inc'] !=""){
    //     $start_from = $_POST['button_inc']*10;
        
        
       
    // }
   
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



<table class="table table-responsive ">
  <thead class="thead-dark">
                   
      						<tr>
                    <th>Id</th>
      							<th>Name</th>
      							<th>Mobile No</th>
      							<th>Area</th>
      							<th>Task</th>
      							<th>Age</th>
      							
                    
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    
      						</tr>
      					</thead>
      				
                <?php 

foreach($data as $value){
?>
      					<tbody>
                  
                  
                    
      						<tr>
                    	<td>
      								 <?php echo $value['emp_id']; ?>
                       
                       
      							</td>
      							<td>
      								<h6><a href="javascript:void(0)"><?php echo $value['name']; ?></a> </h6>	
                      
      							</td>
      							
      							<td>
      								 <?php echo $value['mobile_no']; ?>
                       
      							</td>
      							<td>
      								<?php echo $value['current_location']; ?>
      							</td>
      								<td>
      								<?php echo $value['tasks']; ?>
      							</td>
      							<td>
      								<?php echo $value['age']; ?>
      							</td>
      						
                    
                    <td><a href='tel:<?= $value['mobile_no'] ?>'><i class="fas fa-phone-volume"></i></a></td>

<!--<td><a class="" href="tel:<?php echo $value['mobile_no']; ?>"><i class="fas fa-phone-volume"></i></a></td>-->

<td><a class="" href="../view_profile.php?emp_id=<?php echo $value['emp_id']?>"><i class="fas fa-eye"></i></a></td>
<td><a class="" href="viewhistory.php?emp_id=<?php echo $value['emp_id']?>"><i class="fas fa-history"></i></a></td>
<td><a style="color:green"; class="" href="https://wa.me/?text=<?php echo '*Candidate Profile*'.'%0A'.'Name:'. $value['name'].'%0A'.'Age: '.$value['age'].'%0A'.'Area: '.$value['current_location'].'%0A'.'Experience: '.$value['experience'].'%0A'.'Task: '.$value['tasks'].'%0A'.'Duration: '.$value['duration']; ?>"><i class="fab fa-whatsapp"></i></a></td>
<td><a  class="" href="mailto:?subject=HireForCare%20Profile&body=Hi%20<?= $value['name']?>,%0AWe%20Have%20Received%20your%20below%20request%0AType:%20<?=$value['tasks']?>%0ALocation:%20<?=$value['current_location']?>%0ADuty:%20<?=$value['duration']?>%0AAge:%20<?=$value['age']?>%0Apay:%20<?=$value['monthly_salary']?>%0A%0A%0ABest%20%20Regards%0AHireForCare"><i class="far fa-envelope"></i></a></td>

<td><a href="edit.php?emp_id=<?php echo $value['emp_id']?>" class="text-primary">
      											Edit
      										</a></td>
      										<td>
      										    <h6><a href="javascript:void(0)" class="" data-toggle="modal" data-target="#<?php echo $value['emp_id']; ?>">
                                            Remark
                                            </a></h6>
                                            <div class="modal fade" id="<?php echo $value['emp_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
    <input type="hidden" name="emp_id" value="<?php  echo $value['emp_id']?>">
    <input type="hidden" name="name" value="<?php  echo $value['name']?>">
    <input type="hidden" name="id" value="<?php  echo $value['id']?>">


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

                                            </td>
                                            
                                            
      					

 
      						</tr>

                  

                  

                  
                  
                  
      						
      												
      				
                 
                  
                </tbody>
                <?php  } ?>
                
      				</table>
      				
<!-- Modal -->
                                            
            



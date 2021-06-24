<?php  
require('../../db.php');

// $name = $_POST['selected_name'];

// print_r($name);
// die;

  $limit= 10;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
// Find out the number of result stored in database

    
    
    
    
    
        
    
    if(isset($_POST)){


        
    //   $sql = "SELECT * from employeedata Where emp_id !=''";
    $sql = "SELECT * from employeedata Where emp_id IS NOT NULL";
       
       
    //   if($_POST['selected_location'] === '*'){
    //       break;
            
               
    //       }
           
           if(isset($_POST['selected_name'] ) && $_POST['selected_name'] !=""){
           $name = $_POST['selected_name'];
          //  echo $name; die;
           
           
        
        $sql .= " AND name IN('$name')";
        // print_r($sql); die;
        
         
        
         
    } 
               
           
       
       
    
    if(isset($_POST['selected_number']) && $_POST['selected_number'] !=""){
        $number = $_POST['selected_number'];
        
        
        $sql .= " AND mobile_no IN('$number')";
        
        
    } 


    if(isset($_POST['selected_status']) && $_POST['selected_status'] !=""){
        $status = $_POST['selected_status'];
        
        
        $sql .= " AND comment_status IN('$status')";
        
        
    } 
    
    if(isset($_POST['selected_pending']) && $_POST['selected_pending'] !=""){
        $status = $_POST['selected_pending'];
        if($status == 1){
           $sql .= " AND salary_pending > 0";
        }else{
$sql .= " AND salary_pending = 0";
        }
        
        
        
        
        
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



<table class="table table-responsive">
  <thead>
                   
      						<tr>
                    <th>Emp Id</th>
      							<th>Name</th>
      							<th>Monthly Salary</th>
      							<th>Paid</th>
                                <th>Pending</th>      							
      							<th>mode</th>
                                <th>Status</th>
                                <th>Date</th>
                    
                    
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
      								<h6><a href="javascript:void(0)"><?php echo $value['name']; ?></a></h6>	
                      
      							</td>
      							
      							<td>
      								 <?php echo $value['monthly_salary']; ?>
                       
      							</td>
      							
      							<td>
      								<?php echo $value['salary_paid']; ?>
      							</td>
      							<td>
      							<?php echo $value['salary_pending']; ?>
      							</td>
                                  <td>
      							<?php echo $value['salary_last_mode']; ?>
      							</td>
                    <td>
      							<?php echo $value['comment_status']; ?>
      							</td>
                    <td>
                      <?php echo $value['salary_last_date']; ?>
                    </td>
                    <td>
                      <a href="salary_update.php?emp_id=<?php echo $value['emp_id']; ?>">Update</a>
                    </td>
                    <td><a href='#' onclick='window.open("callingapi.php?custno=<?php echo $value['mobile_no'];?>&agentno=<?php echo $agentno; ?>&name=<?php echo $value['name'];?>","","width=300,height=500%");'><i class="fas fa-phone-volume"></i></a></td>

<!--<td><a class="" href="tel:<?php echo $value['mobile_no']; ?>"><i class="fas fa-phone-volume"></i></a></td>-->

<td><a class="" href="salary_history.php?emp_id=<?php echo $value['emp_id']?>"><i class="fas fa-rupee-sign"></i></a></td>
<td><a class="" href="../viewhistory.php?emp_id=<?php echo $value['emp_id']?>"><i class="fas fa-history"></i></a></td>
<td><a style="color:green"; class="" href="https://wa.me/?text=<?php echo '*Candidate Profile*'.'%0A'.'Name:'. $value['name'].'%0A'.'Age: '.$value['age'].'%0A'.'Area: '.$value['current_location'].'%0A'.'Experience: '.$value['experience'].'%0A'.'Task: '.$value['tasks'].'%0A'.'Duration: '.$value['duration']; ?>"><i class="fab fa-whatsapp"></i></a></td>
<td><a  class="" href="mailto:?subject=HireForCare%20Profile&body=Hi%20<?= $value['name']?>,%0AWe%20Have%20Received%20your%20below%20request%0AType:%20<?=$value['tasks']?>%0ALocation:%20<?=$value['current_location']?>%0ADuty:%20<?=$value['duration']?>%0AAge:%20<?=$value['age']?>%0Apay:%20<?=$value['monthly_salary']?>%0A%0A%0ABest%20%20Regards%0AHireForCare"><i class="far fa-envelope"></i></a></td>
<td><a href="../edit.php?emp_id=<?php echo $value['emp_id']?>" class="text-primary">
      											Edit
      										</a></td>
 
      						</tr>

                  

                  

                  
                  
                  
      						
      												
      				
                 
                  
                </tbody>
                <?php  } ?>
                
      				</table>
            
            
            <!--pagination-->
            
            
            <?php
            $totalt_r = ceil($number_of_result/$limit);
            $total_pages = $totalt_r;
            
            ?>
            <div class="clearfix">
               
					<ul class="pagination">
                    <?php 
					if(!empty($total_pages)){
						for($i=1; $i<=$total_pages; $i++){
								if($i == 1){
									?>
								<li class="pageitem active" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" data-id="<?php echo $i;?>" class="page-link" ><?php echo $i;?></a></li>
															
								<?php 
								}
								else{
									?>
								<li class="pageitem" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" class="page-link" data-id="<?php echo $i;?>"><?php echo $i;?></a></li>
								<?php
								}
						}
					}
								?>
					</ul>
               </ul>
            </div>
            <!--pagination-->
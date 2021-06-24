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
    $sql = "SELECT * from cust_tab Where cust_id IS NOT NULL";
       
       
    //   if($_POST['selected_location'] === '*'){
    //       break;
            
               
    //       }
           
           if(isset($_POST['selected_name'] ) && $_POST['selected_name'] !=""){
           $name = $_POST['selected_name'];
          //  echo $name; die;
           
           
        
        $sql .= " AND first_name IN('$name')";
        // print_r($sql); die;
        
         
        
         
    } 
               
           
       
       
    
    if(isset($_POST['selected_number']) && $_POST['selected_number'] !=""){
        $number = $_POST['selected_number'];
        
        
        $sql .= " AND mobile IN('$number')";
        
        
    } 


    if(isset($_POST['selected_status']) && $_POST['selected_status'] !=""){
        $status = $_POST['selected_status'];
        
        
        $sql .= " AND status IN('$status')";
        
        
    } 
    
    if(isset($_POST['selected_pending']) && $_POST['selected_pending'] !=""){
        $status = $_POST['selected_pending'];
        if($status == 1){
           $sql .= " AND pay_pending > 0";
        }else{
$sql .= " AND pay_pending = 0";
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
                    <th>Cust Id</th>
      							<th>Name</th>
      							<th>Monthly</th>
      							<th>Received</th>
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
      								 <?php echo $value['cust_id']; ?>
                       
                       
      							</td>
      							<td>
      								<h6><a href="post-a-job.html"><?php echo $value['first_name']; ?></a></h6>	
                      
      							</td>
      							
      							<td>
      								 <?php echo $value['monthly_pay']; ?>
                       
      							</td>
      							<td>
      								<?php echo $value['payment_receive']; ?>
      							</td>
      							<td>
      								<?php echo $value['pay_pending']; ?>
      							</td>
      							<td>
      							<?php echo $value['pay_last_mode']; ?>
      							</td>
                    <td>
      							<?php echo $value['status']; ?>
      							</td>
                    <td>
                      <?php echo $value['pay_last_date']; ?>
                    </td>
                    <td>
                      <a href="payment_form.php?cust_id=<?php echo $value['cust_id']; ?>">Update</a>
                    </td> 
                    <td><a href='#' onclick='window.open("callingapi.php?custno=<?php echo $value['mobile_no'];?>&agentno=<?php echo $agentno; ?>&name=<?php echo $value['name'];?>","","width=300,height=500%");'><i class="fas fa-phone-volume"></i></a></td>

<!--<td><a class="" href="tel:<?php echo $value['mobile_no']; ?>"><i class="fas fa-phone-volume"></i></a></td>-->

<td><a class="" href="pay_history.php?cust_id=<?php echo $value['cust_id']?>"><i class="fas fa-rupee-sign"></i></a></td>
<td><a class="" href="../history.php?cust_id=<?php echo $value['cust_id']?>"><i class="fas fa-history"></i></a></td>
<td><a style="color:green"; class="" href="https://wa.me/?text=<?php echo 'Name:'. $value['first_name'].'%0A'.'Age: '.$value['age'].'%0A'.'Area: '.$value['location']; ?>"><i class="fab fa-whatsapp"></i></a></td>
<td><a  class="" href="mailto:<?php echo $value['email']?>"><i class="far fa-envelope"></i></a></td>
<td><a href="../edit_lead.php?cust_id=<?php echo $value['cust_id']?>" class="text-primary">
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
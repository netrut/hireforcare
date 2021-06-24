<?php  
require('../db.php');
// echo $_POST['to_date']; die;

// For Email Verified Check


// $name = $_POST['selected_name'];

// print_r($name);
// die;

$start_from = 10*$_GET['next'];

$limit = 10;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
// Find out the number of result stored in database

    
    
    
    
    
        
    
    if(isset($_POST)){


        
    //   $sql = "SELECT * from employeedata Where emp_id !=''";
    $sql = "SELECT * from cust_tab Where cust_id IS NOT NULL";
       
       
    //   if($_POST['selected_location'] === '*'){
    //       break;
            
               
    //       }
           
           if(isset($_POST['from_date'] ) && $_POST['from_date'] !=""){
           $from_date = $_POST['from_date'];
          //  echo $name; die;
           
           
        
            $sql .= " AND date >'$from_date'";
        // print_r($sql); die;
        
         
        
         
    } 
    
    
    if(isset($_POST['to_date'] ) && $_POST['to_date'] !=""){
           $to_date = $_POST['to_date'];
          //  echo $name; die;
           
           
        
            $sql .= " AND date <'$to_date'";
        // print_r($sql); die;
        
         
        
         
    }
           
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
    
    if(isset($_POST['selected_agent']) && $_POST['selected_agent'] !=""){
        $agent = $_POST['selected_agent'];
        
        
        $sql .= " AND agent IN('$agent')";
        
        
    } 

    if(isset($_POST['selected_status']) && $_POST['selected_status'] !=""){
        $status = $_POST['selected_status'];
        
        
        $sql .= " AND status IN('$status')";
        
        
    } 
    
    $sql .= " ORDER BY date DESC";
   
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
                    <th>Id</th>
      							<th>Name</th>
      							<th>Task</th>
      							<th>Location</th>
      							<th>Duty</th>
      							<th>Age</th>
                    <th>pay</th>
                    <th>Manager</th>
                    <th>Status</th>
                    <th>mail</th>
                    <th>TNC</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    
      						</tr>
      					</thead>
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
      								<h6><a href="javascript:void(0)"><?php echo $value['first_name']; ?></a></h6>	
                      
      							</td>
      							
      							<td>
      								 <?php if( $value['type']=='Baby Care+Cleaning'){
      								 echo "All";
      								 }else{
      								 echo $value['type'];
      								 } ?>
                       
      							</td>
      							<td>
      								<?php echo $value['location']; ?>
      							</td>
      							<td>
      								<?php echo $value['duration']; ?>
      							</td>
      							<td>
      							<?php echo $value['age']; ?>
      							</td>
                    <td>
      							<?php echo $value['monthly_pay']; ?>
      							</td>
                    <td>
                      <?php echo $value['agent']; ?>
                    </td>
                    <td>
                      <?php echo $value['status']; ?>
                    </td>
                    
                    <td>
                        <?php if($value['active']==1){  ?>
                      <i class="fas fa-user-check text-success"></i>
                      
                      <?php  }else{ ?>
                      <i class="fas fa-user-times text-danger"></i>
                      
                      <?php } ?>
                    </td>
                    <td>
                        
                        <?php if($value['tnc']=="agree"){  ?>
                      <i class="fas fa-check-circle text-success"></i>
                      
                      <?php  }else{ ?>
                      <i class="fas fa-times-circle text-danger"></i>
                      
                      <?php } ?>
                    </td>
                    <td>
                      
                    </td>
                    <td><a href='tel:<?= $value['mobile'] ?>' onclick='window.open("callingapi.php?custno=<?php echo $value["mobile_no"]?>&agentno=<?php echo $agentno; ?>&name=<?php echo $value["name"];?>","","width=300,height=500%");'><i class="fas fa-phone-volume"></i></a></td>

<!--<td><a class="" href="tel:<?php echo $value['mobile_no']; ?>"><i class="fas fa-phone-volume"></i></a></td>-->

<td><a class="" href="view_profile.php?cust_id=<?php echo $value['cust_id']?>"><i class="fas fa-eye"></i></a></td>
<td><a class="" href="history.php?cust_id=<?php echo $value['cust_id']?>"><i class="fas fa-history"></i></a></td>
<td><a style="color:green"; class="" href="https://wa.me/?text=<?php echo 'Name:'. $value['first_name'].'%0A'.'Age: '.$value['age'].'%0A'.'Area: '.$value['location'].'%0A'.'Task: '.$value['type'].'%0A'.'Duty: '.$value['duration'].'%0A'; ?>"><i class="fab fa-whatsapp"></i></a></td>
<td><a  class="" href="mailto:<?= $value['email'] ?>?subject=HireForCare%20Profile&body=Hi%20<?= $value['first_name']?>,%0AWe%20Have%20Received%20your%20below%20request%0AType:%20<?=$value['type']?>%0ALocation:%20<?=$value['location']?>%0ADuty:%20<?=$value['duration']?>%0AAge:%20<?=$value['age']?>%0Apay:%20<?=$value['monthly_pay']?>%0A%0A%0ABest%20%20Regards%0AHireForCare"><i class="far fa-envelope"></i></a></td>

<td><a href="edit_lead.php?cust_id=<?php echo $value['cust_id']?>" class="text-primary">
      											Edit
      										</a></td>
 
      						</tr>

                  

                  

                  
                  
                  
      						
      												
      				
                 
                  
                </tbody>
                <?php  } ?>
                
      				</table>
            
            
           
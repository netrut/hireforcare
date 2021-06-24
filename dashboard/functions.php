<?php 
function sidebar_sec(){
   if($_SESSION['role_id']==1){?>
          <ul class="user_navigation">

          
              <li >
              <a href="http://hireforcare.com/customer/payment/payment_details.php"><i class="fas fa-paper-plane"></i> Payment Details</a>
              </li>
              <li>
                <a href="http://hireforcare.com/employee/salary/salary_details.php"><i class="far fa-list-alt"></i>Salary Details</a>
              </li>
              
              
              <li>
                <a href="http://hireforcare.com/customer/leads.php"><i class="far fa-list-alt"></i>Customer Leads</a>
              </li>

              <li>
                <a href="http://hireforcare.com/employee/candidates.php"><i class="far fa-list-alt"></i>Candidates</a>
              </li>
              <li>
                <a href="http://hireforcare.com/customer/customer_registration.php"><i class="far fa-list-alt"></i>Add new customer</a>
              </li>
              <li>
                <a href="http://hireforcare.com/employee/registration.php"><i class="far fa-list-alt"></i>Add new candidate</a>
              </li>
              
          </ul>
          <h5>Account</h5>
          <ul class="user_navigation">
            <li>
                <a href="http://hireforcare.com/dashboard/profile_edit.php"><i class="fas fa-user"></i> Update My Profile</a>
              </li>
              <li >
                <a href="http://hireforcare.com/dashboard/password_change.php"><i class="fas fa-key"></i>Change Password</a>
              </li>
              <li>
                <a href="http://hireforcare.com/registration/logout.php"><i class="fas fa-power-off"></i> Logout</a>
              </li>
          </ul>  
            
        
        <?php } ?>
<!-- Manager Sidebar -->

          <?php  if($_SESSION['role_id']==2){?>
              
              
              
              <ul class="user_navigation">
            
              
              <li>
                <a href="http://hireforcare.com/customer/leads.php"><i class="far fa-list-alt"></i>Customer Leads</a>
              </li>

              <li>
                <a href="http://hireforcare.com/employee/candidates.php"><i class="far fa-list-alt"></i>Candidates</a>
              </li>
              <li>
                <a href="http://hireforcare.com/customer/customer_registration.php"><i class="far fa-list-alt"></i>Add new customer</a>
              </li>
              <li>
                <a href="http://hireforcare.com/employee/registration.php"><i class="far fa-list-alt"></i>Add new candidate</a>
              </li>
              
          </ul>
          <h5>Account</h5>
          <ul class="user_navigation">
            <li>
                <a href="http://hireforcare.com/dashboard/profile_edit.php"><i class="fas fa-user"></i> Update My Profile</a>
              </li>
               <li >
                <a href="http://hireforcare.com/dashboard/password_change.php"><i class="fas fa-key"></i>Change Password</a>
              </li>
              <li>
                <a href="http://hireforcare.com/registration/logout.php"><i class="fas fa-power-off"></i> Logout</a>
              </li>
          </ul>
        
        <?php } ?>

        <!-- Customer Sidebar -->
        
          <?php  if($_SESSION['role_id']==3){?>
           <ul class="user_navigation">
            
              
              <li>
                <a href="http://hireforcare.com/find-staff.php"><i class="far fa-list-alt"></i>Find Helper</a>
              </li>
              <li>
                <a href="http://hireforcare.com/contact_us.php"><i class="far fa-list-alt"></i>Contact Us</a>
              </li>
              <li>
                <a href="http://hireforcare.com/customer/payment/pay_history.php?cust_id=<?php echo $_SESSION['user_id'];?>"><i class="far fa-list-alt"></i>Payment Details</a>
              </li>
              <li>
                <a href="http://hireforcare.com/dashboard/submit_requirement.php "><i class="far fa-list-alt"></i>Submit Requirement</a>
              </li>

              
              
          </ul>
          <h5>Account</h5>
          <ul class="user_navigation">
            <li>
                <a href="http://hireforcare.com/customer/edit_lead.php?cust_id=<?php echo $_SESSION['user_id'];?>"><i class=""></i> Update My Profile</a>
              </li>
              <li >
                <a href="http://hireforcare.com/dashboard/password_change.php"><i class="fas fa-key"></i>Change Password</a>
              </li>
              <li>
                <a href="http://hireforcare.com/registration/logout.php"><i class="fas fa-power-off"></i> Logout</a>
              </li>
          </ul>
          
        
        <?php } ?>
        <!-- Candidate Sidebar -->
        
          <?php  if($_SESSION['role_id']==4){?>
               <ul class="user_navigation">
            
              
              <li>
                <a href="http://hireforcare.com/contact_us.php"><i class="far fa-list-alt"></i>Contact Us</a>
              </li>
               <li>
                <a href="http://hireforcare.com/employee/salary/salary_history.php?emp_id=<?=$_SESSION['user_id'] ; ?>"><i class="far fa-list-alt"></i>Salary Details</a>
              </li>


              
              
          </ul>
          <h5>Account</h5>
          <ul class="user_navigation">
            <li>
                <a href="http://hireforcare.com/employee/edit.php?emp_id=<?= $_SESSION['user_id']; ?>"><i class="fas fa-user"></i> Update My Profile</a>
              </li>
               <li >
                <a href="http://hireforcare.com/dashboard/password_change.php"><i class="fas fa-key"></i>Change Password</a>
              </li>
              <li>
                <a href="http://hireforcare.com/registration/logout.php"><i class="fas fa-power-off"></i> Logout</a>
              </li>
          </ul> 
            
        </div>
        <?php } ?>
   <?php 
    
}

?>
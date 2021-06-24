<?php

// $lifetime=600;
//   session_start();
//   setcookie(session_name(),session_id(),time()+$lifetime);

// session_start();
    
 // Store data in session variables
// $_SESSION["loggedin"] = true;
// $_SESSION["id"] = 0;
// $_SESSION["username"] = 'Kamlesh'; 
// $_SESSION["role_id"] = 2;



$name = $_SESSION["username"];
$url=$_SERVER['DOCUMENT_ROOT']
// die;

?>

<!DOCTYPE html>
<html lang="de">

<body>
    <!-- Header 01
================================================== -->
<header class="header_01 header_inner">
  <div class="header_main">
    <div class="header_menu fixed-top">
      <div class="container">
        <div class="header_top">
          <div class="logo">
            <a href="http://hireforcare.com/">
              <img class="mt-2" alt="" class="img-fluid" src="http://hireforcare.com/assets/images/hfc_logo.png">
              
            </a>
            <span class="text-muted text-align-center pl-4 blockquote-footer d-none d-sm-block .d-sm-none .d-md-block">Always there for care</span>
          </div>
          <div class="navigation">
            <nav>
              <div class="hamburger hamburger--spring js-hamburger ">
                    <div class="hamburger-box">
                      <div class="hamburger-inner"></div>
                    </div>
                  </div>
              <ul>
                <li class="has-sub-menu ">
                  <a href="<?php $url;?>/" >Home</a>
                  <!-- <ul class="sub-menu">
                    <li >
                      <a href="index-2.html">Homepage 1</a>
                    </li>
                    
                  </ul> -->
                </li>
                <li class="has-sub-menu">
                  <a href=" <?php $url;?>/about_us.php">About Us</a>
                  <!-- <ul class="sub-menu">
                    
                    
                    
                   
                      <a href="browse-companies.html">Browse companies</a>
                    </li>
                  </ul> -->
                </li>


              
                
                <li class="has-sub-menu">
                  <a href="javascript:void(0)">Services</a>
                   <ul class="sub-menu">
                    
                    <li>
                      <a href="http://hireforcare.com/services/premium_service.php">Premium Service</a>
                    </li>
                    <li>
                      <a href="http://hireforcare.com/services/verify_helper.php">Verify your existing staff</a>
                    </li>
                    <li>
                      <a href="http://hireforcare.com/services/health_insurance.php">Health Insurance for your staff</a>
                    </li>
                    <li>
                      <a href="http://hireforcare.com/services/subscription-charges.php">Contact Jobseekers directly</a>
                    </li>
                  </ul> 
                </li>

                <li class="has-sub-menu ">
                  <a href="<?php $url;?>/find-staff.php">Find Helper</a>
                  <!-- <ul class="sub-menu">

                    <li >
                      <a href="blog.html">blog</a>
                    </li>
                    
                    
                       
                  </ul> -->
                </li>
                
                  <li class="has-sub-menu">
                  <a href=" <?php $url;?> /contact_us.php">Contact Us</a>
                  <!-- <ul class="sub-menu">
                    
                    <li>
                      <a href="emp-registration.html">Employer registration</a>
                    </li>
                  </ul> -->
                </li>
              </ul>
            </nav>
            <div class="ac_nav after_login_ac_nav">

            <?php  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){  ?>

                <!-- logedin-->
                <div class="login_pop after_login">
                  <button style="text-transform: capitalize;" class="btn btn-primary withdp"><img alt="" src="https://res.cloudinary.com/umesh2001/image/upload/v1619598127/IMG-20210412-WA0030_imzlkt.jpg"> <?php echo $name;  ?>  <i class="fas fa-caret-down"></i></button>
                  <div class="login_pop_box login_pop_box_menu">
                    <div class="login_pop_box_head">
                      <div class=" ">
                        <img alt="" src="https://res.cloudinary.com/umesh2001/image/upload/v1619598127/IMG-20210412-WA0030_imzlkt.jpg">
                        <span> HireForCare </span>
                        <h5 style="text-transform: capitalize;" ><?php echo $name;  ?> </h5> 
                        <h6>&nbsp;</h6>
                      </div>
                    </div>
                    <ul class="user_navigation">
                       <li>
                          <a href=<?php if($_SESSION['role_id']==1){echo '/dashboard/admin_dashboard.php';
                          }elseif ($_SESSION['role_id']==2) {
                            echo '/dashboard/manager_dashboard.php';
                          }elseif ($_SESSION['role_id']==3) {
                            echo '/dashboard/dashboard3.php';
                          }else {echo '/dashboard/dashboard4.php';
                          } ?> ><i class="far fa-list-alt"></i> Dashboard</a></li>

                          <?php  if($_SESSION['role_id']==3){ ?>  
                          <li>
                          <a href="<?php $url;?>/find-staff.php"><i class="fas fa-search"></i> Find Helper </a>
                        </li>
                        <li>
                          <a href="<?php $url;?>/contact_us.php"><i class="fas fa-paper-plane"></i>Submit Requirement</a>
                        </li>
                            <?php }  ?>
                        
                       
                        
                        <li>
                          <a href=<?php if($_SESSION['role_id']==1 || $_SESSION['role_id']==2){echo '/dashboard/profile_edit.php';} ?>><i class="fas fa-user"></i> Update My Profile</a>
                        </li>
                    <li >
                <a href="<?php $url;?>/dashboard/password_change.php"><i class="fas fa-key"></i>Change Password</a>
              </li>
                        <li>
                          <a href="<?php $url;?>/registration/logout.php"><i class="fas fa-power-off"></i> Logout</a>
                          
                        </li>
                       
                      </ul>
                  </div>
                </div>
                <div class="login_pop after_login">
                  <button class="btn btn-msg">
                    <i class="fas fa-envelope"></i>
                    <span class="msg-count">2</span>
                   </button>
                  <div class="login_pop_box job_seekernotifi ">
                      <h6>Inbox</h6>
                      <ul>
                        <li><img alt=""  src="https://res.cloudinary.com/umesh2001/image/upload/v1619587301/profile-2_uqqcli.png"><a href="#"> Welcome to hire for care </a> </li>
                        <li><img alt=""  src="https://res.cloudinary.com/umesh2001/image/upload/v1619587301/profile-3_czlmd7.png"><a href="#">Keep connecting with us   </a> </li>
                        <li><img alt=""  src="https://res.cloudinary.com/umesh2001/image/upload/v1619587301/profile-1_clcsly.png"><a href="#">we are here to help you</a> </li>
                      </ul>
                  </div>
                </div>
              <!--end logedin-->


                <?php }  else { ?> 

<!--Not logedin-->
								<div class="login_pop">
									<button class="btn btn-primary">Login / Sign up <i class="fas fa-caret-down"></i></button>
									<div class="login_pop_box">
										<span class="twobtn_cont">
											<a class=" signjs_btn" href="<?php $url;?>/customer/customer_registration.php">				 
											<span>Customer</span> Sign up
											<i class="far fa-user"></i>
											</a>
										<a class=" signrs_btn" href="<?php $url;?>/employee/registration.php">	<span>Employee</span> Sign up
											<i class="fas fa-landmark"></i>
										</a>
										</span>
										<div>
											<span class="member_btn">Already a member?</span>
											<a class="lgin_btn btn btn-primary" href="<?php $url;?>/registration/login.php"> 
											   	Login
											</a>
										</div>
									</div>
								</div>
							<!--end logedin-->
            

                    <?php }?> 

            
              
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div> 
</header>


<!-- End Header 02
================================================== -->

</body>
</html>


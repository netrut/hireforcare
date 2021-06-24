<?php
require('db.php');
if($_GET['c']==1){
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$type = $_POST['type'];
$subject = "Contact us Lead";
$contact_message = $_POST['message'];
$tnc = $_POST['tnc'];

    
}elseif($_GET['h']==1){
    $emp_id = $_POST['emp_id'];
    $recipient = $_POST['rec'];
    $mobile = $_POST['mobile'];
    $message  = $_POST['message'];
   
}elseif($_GET['cust']==1){
   $email = $_GET['email'];
   $password = $_GET['pass'];
   $number = $_GET['mobile'];
    
}
elseif($_GET['custresend']==1){
   $email = $_GET['email'];
   $password = $_GET['hash'];
   $number = $_GET['mobile'];
    
}
elseif($_GET['emp']==1){
   $email1 = $_GET['email'];
   $password = $_GET['pass'];
   $number = $_GET['mobile'];
    
    
}
elseif($_GET['lost_p']==f){
   $email = $_GET['email'];
   $new_pass  = uniqid();
   
    $param_password = password_hash($new_pass, PASSWORD_DEFAULT); // Creates a password hash
                    $update ="UPDATE user SET password='$param_password' where email='$email'";
                    // echo $update; die;
                    $run  = mysqli_query($databaseConnection,$update);
                   
}


// print_r($_POST);
// die;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = false;									
	$mail->isSMTP();		
    // $mail->AddEmbeddedImage(dirname(__FILE__).'\images\search.jpg','image')		;							
	$mail->Host	 = 'mail.hireforcare.com';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'test@hireforcare.com';				
	$mail->Password = 'Jaipur@2018';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;


	
	$mail->isHTML(true);								
	//----------------For Contact UsPage----------------------------------------------------
	if($_GET['c']==1){
	$mail->setFrom('hfc@hireforcare.com', 'HireForCare');		
// 	$mail->addAddress('contact@umeshit.com');
	$mail->addAddress('test@hireforcare.com', 'Name');
	$mail->Subject = 'Contact Us page lead';
	$mail->Body = 'Name'."-".$name."<br>". 'Email'."-".$email."<br>". 'Subject'."-".$subject."<br>".'Massage'."-".$contact_message."<br>".'Type'."-".$type ;
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "<Script>window.location.href = 'contact_us.php?s=1';</Script>";
	//----------------For ViewProfile Page Find Helper Button-------------------------------
	}elseif($_GET['h']==1){
		$mail->setFrom('hfc@hireforcare.com', 'HireForCare');		
// 	$mail->addAddress('contact@umeshit.com');
	$mail->addAddress('test@hireforcare.com', 'Name');    
	$mail->Subject = 'View Profile Page';
	$mail->Body = 'Employee Id'."-".$emp_id."<br>".'Recipient:'."-".$recipient."<br>".'mobile'."-".$mobile."<br>".'Message'."-".$message;
	$mail->send();
	echo "<Script>window.history.back();</Script>";
		//----------------For Customer Registration -------------------------------
	}elseif($_GET['lost_p']==f){
		$mail->setFrom('hfc@hireforcare.com', 'HireForCare');		
// 	$mail->addAddress('contact@umeshit.com');
	$mail->addAddress($email, 'Name');    
	$mail->Subject = 'Your New Password';
	$mail->Body = '<h1>Your New Password is</h1>'."<br>".$new_pass;
	$mail->send();
	echo "<Script>window.history.back();</Script>";
		//----------------For Customer Registration -------------------------------
	}
	elseif($_GET['cust']==1){
	$mail->setFrom('hfc@hireforcare.com', 'HireForCare');		
// 	$mail->addAddress('contact@umeshit.com');
	$mail->addAddress($email, 'Name');
	$mail->Subject = 'Verification Mail';
	$mail->Body = '<h1>Click below link and verify your mail</h1>'."<br>".'http://www.hireforcare.com/verify_email.php?email='.$email.'&hash='.$password.'<h3>Here is Your Login Credential</h3>'."<br>"."Mobile No:".$number."<br>".'Password:'.$password;
	$mail->send();
	echo "<script>window.location.href = 'customer/customer_registration.php?s=1';</script>";
// 	echo "<Script>window.location.href = 'registration/login.php?ac=s';</script>";
    // Check if the user is already logged in, if yes then redirect him to welcome page 
   

	}elseif($_GET['custresend']==1){
	$mail->setFrom('hfc@hireforcare.com', 'HireForCare');		
// 	$mail->addAddress('contact@umeshit.com');
	$mail->addAddress($email, 'Name');
	$mail->Subject = 'Verification Mail';
	$mail->Body = '<h1>Click below link and verify your mail</h1>'."<br>".'http://www.hireforcare.com/verify_email.php?email='.$email.'&hash='.$password;
	$mail->send();
	echo "<Script>window.location.href = 'registration/login.php?email=resend'</Script>";

    // Check if the user is already logged in, if yes then redirect him to welcome page 
   
	}
	elseif($_GET['emp']==1){
	$mail->setFrom('hfc@hireforcare.com', 'HireForCare');		
// 	$mail->addAddress('contact@umeshit.com');
	$mail->addAddress($email1, 'Name');
	$mail->Subject = 'Thanks For Registration';
	$mail->Body = '<h1>Click below link and verify your mail</h1>'."<br>".'http://www.hireforcare.com/verify_email.php?email='.$email1.'&hash='.$password.'<h3>Here is Your Login Credential</h3>'."<br>"."Mobile No:".$number."<br>".'Password:'.$password;
	$mail->send();
	echo "<Script>window.location.href = 'registration/login.php?ac=s';</script>";
// 	 session_start();
//                         if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//                         echo "<script>window.location.href = 'employee/registration.php?s=1';</script>";
//                         exit;
//                         }else{
                            
//                                 $select_info = "select * from user where phone=$number";
                                
                                
                                
//                                 $run_select_info=mysqli_query($databaseConnection,$select_info);
//                                 $response_info=mysqli_fetch_assoc($run_select_info);
                                
//                                 $id= $response_info['id'];
//                                 $user_id = $response_info['user_id'];
//                                 $username = $response_info['username'];
//                                 $phone = $response_info['phone'];
//                                 $email = $response_info['email'];
//                                 $role_id = $response_info['role_id'];
                                
                            
                            
                            
//                             // Store data in session variables
//                             $_SESSION["loggedin"] = true;
//                             $_SESSION["id"] = $id;
//                             $_SESSION["username"] = $username; 
//                             $_SESSION["phone"] = $phone; 
//                             $_SESSION["email"] = $email;
//                             $_SESSION["role_id"] = $role_id;
//                             $_SESSION['user_id'] = $user_id;
                           
//                           if($role_id==1){
//                              header("location: dashboard/admin_dashboard.php");
//                           } elseif($role_id==2){
//                              header("location: dashboard/manager_dashboard.php");
//                           }
//                           elseif($role_id==3){
//                              header("location: dashboard/dashboard3.php");
//                           }elseif($role_id==4){
//                             //   echo $role_id;
//                             //  header("location: ../dashboard/dashboard4.php");
//                           echo '<script>window.location.href = "dashboard/dashboard4.php";</script>';
//                           }
// }
	    
	}
	
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>

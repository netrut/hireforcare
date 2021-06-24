<?php
session_start();
include('../user_info/UserInformation.php');
//  echo "<pre>";
// print_r($_POST);
// die;
// database Connection
// print_r($_FILES); die;
// include('Element/header.php');
require('db.php');
$mobile_no=$_POST['mobile_no'];
$email = $_POST['email'];


// Check mobile no----------------------------------
$check_mob="SELECT count(phone) FROM user where phone='$mobile_no'";

$runcheck_mob=mysqli_query($databaseConnection,$check_mob);

while($response=mysqli_fetch_assoc($runcheck_mob)){
    $data[]=$response;
}

foreach($data as $value){
    $mob= $value['count(phone)'];
    // echo $mob;
}
if($mob>0){ echo "<script>
  window.location.href = 'registration.php?m=f';
</script>";
exit();
}

//---------------------check Email--------------------
if(!empty($email)){
    
$check_mail = "SELECT email from user where email='$email'";
$run_check_mail = mysqli_query($databaseConnection,$check_mail);

    $result = mysqli_num_rows( $run_check_mail );
    
    if($result>0){
        echo "<script>
  window.location.href = 'registration.php?email=f';
</script>";
exit();
    }
    
}






if($_FILES['id_card_front_photo']['name']){
$location=$_FILES['id_card_front_photo']['tmp_name'];
$name='front'.uniqid();
$extension=pathinfo($_FILES['id_card_front_photo']['name'],PATHINFO_EXTENSION);
$filename = $name . '.' . $extension;
$path = 'images/' . $filename;
move_uploaded_file($location, $path);

}else{
    $filename="";
}

if($_FILES['id_card_back_photo']['name']){
$location=$_FILES['id_card_back_photo']['tmp_name'];
$name='back'.uniqid();
$extension=pathinfo($_FILES['id_card_back_photo']['name'],PATHINFO_EXTENSION);
$backphoto = $name . '.' . $extension;
$path = 'images/' . $backphoto;
move_uploaded_file($location, $path);

}else{
    $backphoto="";
}



if($_FILES['photo']['name']){
$location=$_FILES['photo']['tmp_name'];
$name='main'.uniqid();
$extension=pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION);
$photo = $name . '.' . $extension;
$path = 'images/' . $photo;
move_uploaded_file($location, $path);

}


if($_FILES['upload_verification_report']['name']){
$location=$_FILES['upload_verification_report']['tmp_name'];
$name='SVReport'.uniqid();
$extension=pathinfo($_FILES['upload_verification_report']['name'],PATHINFO_EXTENSION);
$SVR = $name . '.' . $extension;
$path = 'images/verification/self_verification/' . $SVR;
move_uploaded_file($location, $path);

}

if($_FILES['upload_covid_report']['name']){
$location=$_FILES['upload_covid_report']['tmp_name'];
$name='CVReport'.uniqid();
$extension=pathinfo($_FILES['upload_covid_report']['name'],PATHINFO_EXTENSION);
$CVR = $name . '.' . $extension;
$path = 'images/verification/covid_verification/' . $CVR;
move_uploaded_file($location, $path);

}



//INSERT INTO table_name(field) VALUES(values);
$first_name=$_POST['first_name'];
$mobile_no=$_POST['mobile_no'];
if(isset($_POST["call_status"])){
    $call_status=$_POST['call_status'];
}else{
    $call_status='';
}



$remarks=$_POST['remarks'];
if(isset($_POST["duration"])){
    $duration=$_POST['duration'];
}else{
    $duration='';
}


if(isset($_POST["tasks"])){
    $tasks=$_POST['tasks'];
}else{
    $tasks='';
}


if(isset($_POST["experience"])){
    $experience=$_POST['experience'];
}else{
    $experience='';
}

if(isset($_POST["reference_check"])){
    $reference_check=$_POST['reference_check'];
}else{
    $reference_check='';
}


$last_name = $_POST['last_name'];
$password = $_POST['password'];
$fnf_name=$_POST['fnf_name'];
$fnf_number=$_POST['fnf_number'];
$age=$_POST['age'];
$current_location=$_POST['current_location'];
$address=$_POST['address'];
$city=$_POST['city'];
$pin_no=$_POST['pin_no'];
$religion=$_POST['religion'];
$id_card_name=$_POST['id_card_name'];
$id_card_number=$_POST['id_card_number'];
$tnc = $_POST['tnc'];
// $id_card_front_photo=$_POST['id_card_front_photo'];
// $id_card_back_photo=$_POST['id_card_back_photo'];
if(isset($_POST["dob"])){
    $dob=$_POST['dob'];
}else{
    $dob='';
}

// $photo=$_POST['photo'];'


if(isset($_POST["referred_channel"])){
    $referred_channel=$_POST['referred_channel'];
}else{
    $referred_channel='';
}

$referred_by_name=$_POST['referred_by_name'];
$referred_by_number=$_POST['referred_by_number'];
$form_filled_up_by=$_POST['form_filled_up_by'];
$query="INSERT INTO  employeedata(name,last_name, mobile_no, email, remarks, duration, tasks, experience,reference_check,  fnf_name, fnf_number, age, current_location, address, city, pin_no, religion, id_card_name, id_card_number, id_card_front_photo, id_card_back_photo,dob, photo,sv_report_image,cv_report, referred_channel, referred_by_name, referred_by_number, form_filled_up_by,tnc  ) VALUES('$first_name','$last_name' ,'$mobile_no', '$email', '$remarks', '$duration', '$tasks', '$experience', '$reference_check', '$fnf_name', '$fnf_number', '$age', '$current_location', '$address', '$city', '$pin_no', '$religion', '$id_card_name', '$id_card_number', '$filename','$backphoto', '$dob', '$photo', '$SVR','$CVR' ,'$referred_channel', '$referred_by_name','$referred_by_number', '$form_filled_up_by','$tnc')";


// print_r($query); die;
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$res=mysqli_query($databaseConnection,$query);
try {
    // run your code here
    if($res){
        // echo"success";

        $empid_update="UPDATE employeedata SET emp_id=CONCAT('emp_',id)where emp_id=''";
        $empid_res=mysqli_query($databaseConnection,$empid_update);

        try{
            if($empid_res){
                 $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

        $insert_user = "INSERT INTO user(user_id,username,last_name,email,phone,password,role_id,tnc) SELECT emp_id,name,last_name,email,mobile_no,'$param_password',4,tnc FROM employeedata where mobile_no='$mobile_no'";
        
        // echo $insert_user; die;
        $run_user=mysqli_query($databaseConnection,$insert_user);

        try{
          if($run_user){
               $select_info = "select * from user where phone=$mobile_no";
            $run_select_info=mysqli_query($databaseConnection,$select_info);
            $response_info=mysqli_fetch_assoc($run_select_info);
            
            
            $user_id = $response_info['user_id'];
           $ip = UserInfo::get_ip();
            $os= UserInfo::get_os();
            $browser = UserInfo::get_browser();
            $device  =UserInfo::get_device();

            $insert_ip = "Insert into user_info(user_id,ip_address,os,browser,device,phone) values('$user_id','$ip','$os','$browser','$device','$number')";
            $run_insert_ip= mysqli_query($databaseConnection,$insert_ip);
              if($email==""){
                //   echo "<Script>window.location.href = 'registration.php?s=1';</script>";
                // Check if the user is already logged in, if yes then redirect him to welcome page
            //     if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            // echo "<script>window.location.href = 'registration.php?s=1';</script>";
            // exit;
                echo "<script>window.location.href = 'registration.php?s=1';</script>";
            
            
              }else{
              echo"<script type='text/javascript'> 
            window.location.href = '../mail.php?emp=1&email=$email&pass=$password&mobile=$mobile_no';</script>";}
            
            
        //   window.location.href = 'registration.php?s=1';</script>";
            }
            
          else{
            echo "Please use a password";
          }
        } catch (Exception $run_user) {
    echo "Exception:" . $exception->getMessage();
}
            }

        }
        catch (Exception $empid_res) {
    echo "Exception:" . $exception->getMessage();
}
        // header("location: search.php");
        
        // echo "<br><br><h6 align='center' style = 'color:green'>Successful Uploaded<br><br><a align='center' class='btn btn-primary mt-5' href='/'>Go Back </a></h6>";
       
        
       }
       else{
           echo "error";
       }
}
catch (Exception $res) {
    echo "Exception:" . $exception->getMessage();
}





?>


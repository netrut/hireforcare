
<?php
require('../db.php');

$id= $_POST['id'];
$cust_id= $_POST['cust_id'];
$new_customer_id = $_POST['new_cust_id'];
// echo $cust_id. $new_customer_id; die;
$first_name=$_POST['f_name'];
$last_name = $_POST['l_name'];
$mobile = $_POST['mobiles'];
$email = $_POST['emails'];
$agent= $_POST['agent_name'];
$status = $_POST['status'];
$call_back  = $_POST['call_back'];
$remark = $_POST['remark'];
// $mobile = $_POST['mobile'];
// $email = $_POST['email'];
$type= $_POST['type'];
$location = $_POST['location'];
$duration = $_POST['duration'];
$age = $_POST['age'];
$pay= $_POST['month_pay'];
$message = $_POST['message'];
$username = $_POST['username']; 

$query ="UPDATE cust_tab SET cust_id='$new_customer_id', first_name='$first_name', last_name='$last_name', mobile='$mobile', email='$email', agent='$agent',status='$status',call_back='$call_back',remark='$remark',type='$type',location='$location',duration='$duration',age='$age', monthly_pay='$pay',message='$message',username='$username' WHERE id = '$id'";
// echo $query; die;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$response=mysqli_query($databaseConnection,$query);
try{
    if($response){
         
        // header("location:View.php?emp_id=$emp_id");
        $insert_query = "INSERT INTO cust_hist_tab(cust_id,first_name, last_name, agent,status,call_back, remark,email,mobile,type,location,duration,age,monthly_pay,message,username ) Values('$new_customer_id','$first_name','$last_name' ,'$agent','$status','$call_back','$remark','$email','$mobile' ,'$type','$location','$duration','$age','$pay','$message','$username')";
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $response=mysqli_query($databaseConnection,$insert_query);
        try{
    if($response){
        

        $user_query ="UPDATE user SET user_id='$new_customer_id', username='$first_name', last_name='$last_name', phone='$mobile', email='$email' WHERE user_id = '$cust_id'";
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $response=mysqli_query($databaseConnection,$user_query);
        try{
            if($response){
header("location:leads.php");
            }
        }
        catch (Exception $response){

    print_r($response);

}
        }   

}

catch (Exception $response){

    print_r($response);

}

  
    }   
}
catch (Exception $response){

    print_r($response);

}

?>



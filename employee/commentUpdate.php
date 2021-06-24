<?php
date_default_timezone_set('Asia/Kolkata');
$date = date("l jS  F Y h:i:s A"); 
session_start();
$username = $_SESSION["username"];
require('db.php');
$comment= $_POST['comment'];

$emp_id= $_POST['emp_id'];
$status=$_POST['status'];

$name=$_POST['name'];
 $id=$_POST['id'];


 
//  echo $emp_id ."<br>"; 
//  echo $id; die;


// print_r($comment); die;
$query= "INSERT INTO  comment(emp_id, comment, status, name, username) VALUES('$emp_id','$comment','$status','$name','$username')";


// print_r($query2); die;
$res=mysqli_query($databaseConnection,$query);
try {
    // run your code here
    if($res){
        //  header("location:commentdisplay.php?emp_id=$emp_id?massage='success'");
        // echo "success";
         header("location:'candidates.php?c=s&name=$name");

       }
}
catch (Exception $res) {
    echo "Exception:" . $exception->getMessage();
}
// print_r($_POST)  ;




//Updae Query
$query2 = "UPDATE  employeedata Set comment_status ='$status',last_call_date='$date' where emp_id='$emp_id'";
$response=mysqli_query($databaseConnection,$query2);
try {
    // run your code here
    if($response){
        
        // header("location:commentdisplay.php?emp_id=$emp_id");
        header("location:candidates.php?c=s&name=$name");
        // echo "success2";
       }
}
catch (Exception $response) {
    echo "Exception:" . $exception->getMessage();
}
?>


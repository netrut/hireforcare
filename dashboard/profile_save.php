<?php
include('../db.php');
// echo implode($_POST);

if($_POST){

    $uid = $_POST['id'];
    $username = $_POST['username'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone  = $_POST['phone'];

    $query ="UPDATE user SET username='$username', last_name='$last_name', email='$email', phone='$phone' WHERE id='$uid'";
    // echo $query; die;
    $response=mysqli_query($databaseConnection,$query);
try{
    if($response){
    
    
        // header("location:View.php?emp_id=$emp_id");
        header("location:profile_edit.php?success=1");
        // header("location:profile_edit.php?success='SuccessFully Updated'");

    }   
}
catch (Exception $response){

    print_r($response);

}

}
?>
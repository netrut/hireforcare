<?php
require('../../db.php');

$cust_id = $_POST['cust_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date = $_POST['date'];
@$payment_mode = $_POST['payment_mode'];
$amount = $_POST['amount'];
$remark = $_POST['remark'];
$monthly_pay = $_POST['monthly_pay'];


// echo $first_name; die;
$query = "INSERT INTO pay_history(cust_id,first_name,last_name,pay_last_date,pay_last_mode,payment_receive,remark,monthly_pay) Values('$cust_id','$first_name','$last_name','$date','$payment_mode','$amount','$remark','$monthly_pay')";

$result = mysqli_query($databaseConnection,$query);
if($result){
    header("location:payment_details.php");
    




}
?>
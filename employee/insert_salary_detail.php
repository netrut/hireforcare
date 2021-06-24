<?php
require('../db.php');

$emp_id = $_POST['emp_id'];
$name = $_POST['name'];
$monthly_salary = $_POST['monthly_salary'];
$salary_paid = $_POST['amount'];
$salary_last_date = $_POST['date'];
$salary_last_mode= $_POST['salary_mode'];
$remark = $_POST['remark'];



// echo $first_name; die;
$query = "INSERT INTO salary_history(emp_id,name,monthly_salary,salary_paid,salary_last_date,salary_last_mode,remark) Values('$emp_id','$name','$monthly_salary','$salary_paid','$salary_last_date','$salary_last_mode','$remark')";

$result = mysqli_query($databaseConnection,$query);
if($result){
    header("location:salary_details.php");
    




}
?>
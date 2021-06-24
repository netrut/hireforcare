<?php

// database Connection
$host="localhost";
$user_name="hire4car_main";
$password="Jaipur@2018";
$database_name="hire4car_main";
$databaseConnection=mysqli_connect($host,$user_name,$password,$database_name);

// Check connection
// if (!$databaseConnection) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

//PDO Database
// $dsn= "mysql:host=localhost; dbname=hireforyou;";
// $db_user = "root";
// $db_password = "";
// try{
//     $databaseConnection = new PDO($dsn, $db_user, $db_password);
//     echo "connected";

// }catch(PDOException $e){
// echo "Connection Failed".$e->getMessage();
// }

?>
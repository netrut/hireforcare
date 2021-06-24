<?php
include('Element/header.php');
require('db.php');
$id=$_GET['emp_id'];

// print_r($_POST); die;

$query="SELECT * FROM employeedata where emp_id='$id'";
// print_r($query);
$result = mysqli_query($databaseConnection,$query);
//  print_r($result); die;
$data=[];
while($response=mysqli_fetch_assoc($result)){
    $data[]=$response;
}
// echo "<pre>";
// print_r($data); die;
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <meta charset="UTF-16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">SN.</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile No</th>
      <th scope="col">Age</th>
      
      <th scope="col">Last Status</th>
      <th scope="col">View</th>
      <th scope="col">History</th>
      <th scope="col">Comment</th>
      
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
    <?php
$sn=1;
foreach($data as $value){?>

<tr>

<td><?php echo $sn; ?></td>
<td><?php echo $value['name']; ?></td>
<td><?php echo $value['mobile_no']; ?></td>
<td><?php echo $value['age']; ?></td>

<td><?php echo $value['comment_status']; ?></td>
<td><a class="  btn btn-primary " href="View.php?emp_id=<?php echo $value['emp_id']?>">View</a></td>
<td><a class="  btn btn-primary " href="viewhistory.php?emp_id=<?php echo $value['emp_id']?>">History</a></td>





<td><form action="commentUpdate.php" method="post">
    <input name="comment" type="text">
    <input type="hidden" name="emp_id" value="<?php  echo $value['emp_id']?>">
    <input type="hidden" name="name" value="<?php  echo $value['name']?>">
    <input type="hidden" name="id" value="<?php  echo $value['id']?>">


    <select name="status" id="">
        <option >Available</option>
        <option >Not Available</option>
        <option >Already Working</option>
        <option >Not Interested</option>
    </select>
    

    <input type="Submit">
</form></td>




</tr>


<?php
$sn++;
}
?>

  </tbody>
</table> 

<h5 class="text-success">Successfully Add Comment</h5>









    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>

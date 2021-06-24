<?php
require('db.php');
// echo "<pre>";
// print_r($_FILES); die;
// print_r($_POST['emp_id']); die;
$emp_id=$_POST['emp_id'];
$first_name=$_POST['name'];
$mobile_no=$_POST['mobile_no'];
$call_status=$_POST['call_status'];
$remarks=$_POST['remarks'];
$duration=$_POST['duration'];   
$tasks=$_POST['tasks'];
$experience=$_POST['experience'];
$reference_check=$_POST['reference_check'];
$fnf_name=$_POST['fnf_name'];
$fnf_number=$_POST['fnf_number'];
$age=$_POST['age'];
$current_location=$_POST['current_location'];
$religion=$_POST['religion'];
$id_card_name=$_POST['id_card_name'];
$id_card_number=$_POST['id_card_number'];
@$star= $_POST['star'];
// print_r($star); die;
if($_FILES['photo']['name']){
    //file uploading 
    $tmp=$_FILES['photo']['tmp_name']; //temp location 
    $name='main'.uniqid();
    $ext=pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION);
    $photo=$name.'.'.$ext;
    $path='images/'.$photo;
      if(move_uploaded_file($tmp,$path) && !empty($_POST['oldphoto'])){
          unlink('C:/xampp/htdocs/php/hireforyou/images/'.$_POST['oldphoto']);
      }
      $newphoto=$photo;
  
    }else{
      $newphoto=$_POST['oldphoto'];
    }  



    if($_FILES['id_card_front_photo']['name']){
    //file uploading 
    $tmp=$_FILES['id_card_front_photo']['tmp_name']; //temp location 
    $name='front'.uniqid();
    $ext=pathinfo($_FILES['id_card_front_photo']['name'],PATHINFO_EXTENSION);
    $id_card_front_photo=$name.'.'.$ext;
    $path='images/'.$id_card_front_photo;
      if(move_uploaded_file($tmp,$path) && !empty($_POST['oldidfront'])){
          unlink('C:/xampp/htdocs/php/hireforyou/images/'.$_POST['oldidfront']);
      }
      $newfront=$id_card_front_photo;
  
    }else{
      $newfront=$_POST['oldidfront'];
    }  


    if($_FILES['id_card_back_photo']['name']){
    //file uploading 
    $tmp=$_FILES['id_card_back_photo']['tmp_name']; //temp location 
    $name='back'.uniqid();
    $ext=pathinfo($_FILES['id_card_back_photo']['name'],PATHINFO_EXTENSION);
    $id_card_back_photo=$name.'.'.$ext;
    $path='images/'.$id_card_back_photo;
      if(move_uploaded_file($tmp,$path) && !empty($_POST['oldidback'])){
          unlink('C:/xampp/htdocs/php/hireforyou/images/'.$_POST['oldidback']);
      }
      $newback=$id_card_back_photo;
  
    }else{
      $newback=$_POST['oldidback'];
    } 
    
    
    
    if($_FILES['sv_report_image']['name']){
    //file uploading 
    $tmp=$_FILES['sv_report_image']['tmp_name']; //temp location 
    $name='back'.uniqid();
    $ext=pathinfo($_FILES['sv_report_image']['name'],PATHINFO_EXTENSION);
    $SVR=$name.'.'.$ext;
    $path = 'images/verification/self_verification/' . $SVR;
      if(move_uploaded_file($tmp,$path) && !empty($_POST['oldsvr'])){
          unlink('http://hireforcare.com/employee/images/verification/self_verification/'.$_POST['oldsvr']);
      }
      $newSVR=$SVR;
  
    }else{
      $newSVR=$_POST['oldsvr'];
    } 
    
    
    
    
    if($_FILES['cv_report']['name']){
    //file uploading 
    $tmp=$_FILES['cv_report']['tmp_name']; //temp location 
    $name='back'.uniqid();
    $ext=pathinfo($_FILES['cv_report']['name'],PATHINFO_EXTENSION);
    $CVR=$name.'.'.$ext;
    $path='images/verification/covid_verification/'.$CVR;
      if(move_uploaded_file($tmp,$path) && !empty($_POST['oldcvr'])){
          unlink('http://hireforcare.com/employee/images/verification/covid_verification/'.$_POST['oldcvr']);
      }
      $newCVR=$CVR;
  
    }else{
      $newCVR=$_POST['oldcvr'];
    } 
    
    
    
    
// $id_card_front_photo=$_POST['id_card_front_photo'];
// $id_card_back_photo=$_POST['id_card_back_photo'];
$dob=$_POST['dob'];
$referred_channel=$_POST['referred_channel'];
$referred_by_name=$_POST['referred_by_name'];
$referred_by_number=$_POST['referred_by_number'];
$last_edit=$_POST['last_edit'];

$query ="UPDATE employeedata SET name='$first_name', mobile_no='$mobile_no', call_status='$call_status', remarks='$remarks', duration='$duration', tasks='$tasks', experience='$experience',reference_check='$reference_check',  fnf_name='$fnf_name', fnf_number='$fnf_number', age='$age', current_location='$current_location', religion='$religion', id_card_name='$id_card_name', id_card_number='$id_card_number', id_card_front_photo='$newfront', id_card_back_photo='$newback',dob='$dob', photo='$newphoto', sv_report_image='$newSVR', cv_report='$newCVR', referred_channel='$referred_channel', referred_by_name='$referred_by_name', referred_by_number='$referred_by_number', last_edit='$last_edit', star='$star' WHERE emp_id='$emp_id'  ";
// echo $query; die;
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$response=mysqli_query($databaseConnection,$query);
try{
    if($response){
        // echo "sucess";  
        echo "<script> window.history.back();
</script>";
        // header("location:../view_profile.php?emp_id=$emp_id");
        // header("location:view_profile.php");
    }   
}
catch (Exception $response){

    print_r($response);

}

?>

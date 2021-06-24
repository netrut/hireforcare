<?php   
require('db.php');
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    
    
    $email = $_GET['email']; // Set email variable
    $hash = $_GET['hash']; // Set hash variable
    $search_query = "SELECT email, password, active From user where email='$email'";
    $run_search =mysqli_query($databaseConnection,$search_query);
    $response=mysqli_fetch_assoc($run_search);
    $match  = mysqli_num_rows($run_search);
    if($match>0){
        $hashed_password = $response['password'];
        // echo $hashed_password; die;
        //password verify
    if(password_verify($hash, $hashed_password)){
        $update_user = "UPDATE user SET active='1' WHERE email='$email' AND password='$hashed_password' AND active='0'";
        
            $run_update= mysqli_query($databaseConnection,$update_user);
            
            if($run_update){
                $update_cust_tab = "UPDATE cust_tab SET active=1 WHERE email='$email' AND active=0";
                
                // echo $update_custdata; die;
                $run_update_cust_tab= mysqli_query($databaseConnection,$update_cust_tab);
                
                if($run_update_cust_tab){
                     echo "<script>window.location.href = 'registration/login.php?e=v';</script>";
                }
                else{
                    echo "not update in custdata";
                }
            }
            else{
                echo "not update in user table";
            }
            

    }else{
    // No match -> invalid url or account has already been activated.
    }
    //password verify

}else{
    // No match -> invalid url or account has already been activated.
}
}else{
    // Invalid approach
}

?>
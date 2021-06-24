<?php  session_start(); 
include('./function/functions.php');
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from veepixel.com/tf/html/jodice/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:52:16 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>HireForCare</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" href="assets/images/fav.png" type="image/gif" sizes="64x64">

<!-- CSS
================================================== -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&amp;display=swap&amp;subset=latin-ext" rel="stylesheet">
<link rel="stylesheet" href="assets/css/all.min.css">
<link href="assets/css/aos.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link href="assets/css/select2.min.css" rel="stylesheet" />
<link href="assets/css/owl.carousel.min.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/color-1.css">
</head>
<body>

<!-- Header 01
================================================== -->
<header class="header_01 header_inner">
	<div class="header_main">
		<?php include('includes/header.php') ?>	
		<div class="header_btm">
      <h2>Contact Us</h2>
    </div>
	</div> 
  </header>


<!-- End Header 02
================================================== -->



<!-- Main 
================================================== -->

<main>
  <div class="only-form-pages">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        	<div class=" contact_us" >	
          <div class="row "   >
            
            <div class="col-md-12 col-lg-6 ">
              <div class="newslatter_outer">
                
                <div>
                    <h5>Address:</h5><br>
                    <ul>
                      <li><i class="fas fa-map-marker-alt"></i>
                        Mumbai, <b>India</b>
                      </li>
                      <li><a href="tel:+919619218826"><i class="fas fa-phone"></i> +917688860000 </a></li>
                      <li><a href="tel:+919828096110 "><i class="fas fa-phone"></i> +919828096110  </a></li>
                      <li><a href="mailto:info@hireforcare.com"><i class="fas fa-envelope"></i> info@hireforcare.com</a></li>
                    </ul>
                    
                  </div>
              </div>
              <form class="newsletter" action="mail.php" method="post" enctype="multipart/form-data"> 
                  
                   
                </form>
            </div>
            
            <div  class="col-md-12 col-lg-6">
              <div class="only-form-box">
                  <?php if($_GET['s']==1){
                  echo '<div id="thanks" class="alert alert-success">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Thanks!</strong> for contacting us, you will receive a call back within 48 Hours
              </div>';
                  } ?>
                  
                <form action="mail.php?c=1" method="post" enctype="multipart/form-data">
                  <div class="com_class_form">
                    <div class="form-group">
                  
                      <input class="form-control" type="text" name="name" size="40" placeholder="Name">
                    </div>
                    <div class="form-group">
                  
                      <input class="form-control" type="text" name="mobile" size="40" placeholder="mobile">
                    </div>
                    <div class="form-group">
                      
                      <input class="form-control" type="email" name="email" placeholder="Email">
                    </div>
                    
                    
                    <div class="form-group">
                      
                      <textarea class="form-control" name="message" cols="40" rows="3" placeholder="Message"></textarea>
                    </div
                    <div class="form-group form-check">
                     
                    <input name="tnc" class="form-check-input form-control" type="checkbox" value="agree" id="invalidCheck">Agree to <a href="">terms & conditions</a> and <a href="">Privacy-policy</a>
                    
                        
                    </div>
                    <div class="form-group">
                      <input class="btn btn-primary" type="submit" value="Send">
                    </div>
                   
                  </div>
                </form>
                
                
                
                
               </div>
            </div>
          </div>	
				
			</div>
        </div>
      </div>
    </div>
  </div>
</main>


<!-- Footer Container
================================================== -->
<!--Footer  -->

	<?php include('includes/footer.php') ?>
<!-- Footer -->


<!-- End Footer Container
================================================== -->

<!-- Scripts
================================================== -->
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/aos.js"></script>
<script src="assets/js/custom.js"></script>
</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:52:16 GMT -->
</html>

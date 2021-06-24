<?php

require('../db.php');
// session_start();
$emp_id=$_GET['emp_id'];

$query="SELECT * FROM employeedata WHERE emp_id='$emp_id'";
$result=mysqli_query($databaseConnection, $query);
$data=mysqli_fetch_assoc($result);

// $id= $data['id'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title>HireForCare</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8 width=device-width, initial-scale=1" />

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="resume.css" media="all" />
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&amp;display=swap&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
<!--<link rel="stylesheet" href="../assets/css/all.min.css">-->
<!--<link href="../assets/css/aos.css" rel="stylesheet">-->
<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
<!-- <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> -->
<!--<link href="../assets/css/select2.min.css" rel="stylesheet" />-->
<!--<link href="../assets/css/owl.carousel.min.css" rel="stylesheet" />-->
<!--<link rel="stylesheet" href="../assets/css/style.css">-->
<!--<link rel="stylesheet" href="../assets/css/color-1.css">-->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script type="text/javascript">

        function downloadimage() {
            //var container = document.getElementById("image-wrap"); //specific element on page
            var container = document.getElementById("doc2"); // full page 
            html2canvas(container, { allowTaint: true }).then(function (canvas) {

                var link = document.createElement("a");
                document.body.appendChild(link);
                link.download = "<?=$data['name']." ".$data['emp_id'];?>.jpg";
                link.href = canvas.toDataURL();
                link.target = '_blank';
                link.click();
            });
        }

    </script>
</head>
<body>
    


<div id="doc2" class="yui-t7">
     
    <div id="inner">
        <h1 style="text-align: center; font-size: 40px; text-decoration: underline;">Resume</h1>
        
        <div id="hd">
		    
			<div class="yui-gc">
			    
				<div class="yui-u first">
					<h1><?= $data['name']; ?></h1>
					<h2><?= $data['tasks']; ?></h2>
					<h3><a style="text-decoration: none;" href="mailto:info@hireforcare.com"><i style="color:#ff6158" class="fas fa-envelope"></i> info@hireforcare.com</a></h3>
						<h3 style="text-decoration: none;"><i style="color:#ff6158" class="fas fa-phone-square-alt"></i> +91 9619218826</h3>
						<h3><i style="color:#ff6158" class="fas fa-globe"></i> www.hireforecare.com</h3>
				</div>

				<div class="yui-u">
					<div  class="contact-info">
					    
					    
						<!--<h3><a id="pdf" href="#">Download PDF</a></h3>-->
						
						
						<?php if($data['photo']==""){ ?>
                    
                    <img alt="" src="../assets/images/S-logo.jpg" width="200px" height="220px">
                    <?php
                    
                    } else{?> 
                    <img style="border-radius: 10%;"  class="profile" src="../employee/images/<?= $data['photo']; ?>" alt="" width="200px" height="220px" > </img>
                    
                    <?php } ?>
					</div><!--// .contact-info -->
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->
        
        <div id="bd">
			<div id="yui-main">
				<div class="yui-b">
				    
				    <!-- Profile Section-->
				    
				    <!-- <div class="yui-gf">
				        <div style="text-align:'center'; " class="second-h2">
							<h2>Profile</h2>
						</div>
				            <div id="main">
                                        <div> <h2>Task: </h2></div>
                                        <div> <h2>:</h2></div>
                                        <div><h3>Baby Care</h3></div>
                            </div> 
                            
                        </div> -->
                        <div align="center"  class="yui-gf">
    					    <div style="text-align:'center'; " class="second-h2">
    							<h2>Profile</h2>
    						</div>
                            <div style="margin-left:50px;">
                                      <div class="column" >
                                        <h3>Task</h3>
                                        
                                        
                                      </div>
                                      <div class="column" >
                                        <h3>:</h3>
                                        
                                        
                                        
                                      </div>
                                      <div class="column">
                                        <h3>BabyCare</h3>
                                        
                                        
                                      </div>
                            </div>
                        </div>
                        
                        <!-- end yui-gf -->
                                			
                            <div align="center"  class="yui-gf">
					            <div style="text-align:'center'; " class="second-h2">
							        <h2>Personal Information</h2>
						        </div>

                                <div style="margin-left:50px; margin-top:10px;">
                                    <div class="column" >
                                    
                                        <h3>Marital Status</h3>
                                        <h3>Age</h3>
                                        <h3>Religion</h3>
                                        <h3>Gender</h3>
                                        <h3>Language Known</h3>
                                        <h3>Duration</h3>
                                        <h3>Location</h3>
                                        <h3>City</h3>
                                        <h3>State</h3>
                                        <h3>Nationality</h3>
    
                                    </div>
                                    <div class="column" >
                                        <h3>:</h3>
                                        <h3>:</h3>
                                        <h3>:</h3>
                                        <h3>:</h3>
                                        <h3>:</h3>
                                        <h3>:</h3>
                                        <h3>:</h3>
                                        <h3>:</h3>
                                        <h3>:</h3>
                                        <h3>:</h3>
                                        
                                        
                                        
                                    </div>
                                    <div class="column">
                                        <h3><?php if($data['marital_status']){echo$data['marital_status'];}else{ echo "-"; }?> </h3>
                                        <h3><?php if($data['agee']){echo$data['age'];}else{ echo "-"; }?> </h3>
                                        <h3><?php if($data['religion']){echo$data['religion'];}else{ echo "-"; }?> </h3>
                                        <h3><?php if($data['gender']){echo$data['gender'];}else{ echo "-"; }?> </h3>
                                        <h3>Hindi</h3>
                                        <h3><?php if($data['duration']){echo$data['duration'];}else{ echo "-"; }?> </h3>
                                        <h3><?php if($data['location']){echo$data['location'];}else{ echo "-"; }?> </h3>
                                        <h3><?php if($data['city']){echo$data['city'];}else{ echo "-"; }?> </h3>
                                        <h3><?php if($data['state']){echo$data['state'];}else{ echo "-"; }?> </h3>
                                        <h3>Indian</h3>
                                        
                                    </div>
                                </div>
 
                            </div>


                    <div class="yui-gf">
				        <div style="text-align:'center'; " class="second-h2">
							<h2>Educational Qualification</h2>
						</div>
				            <div id="main">
                                        <div> <h2><?= $data['education']; ?> Pass</h2></div>
                                        
                            </div> 
                            
                    </div>
                        
                    <div style="text-transform: capitalize" class="yui-gf">
				        <div style="text-align:'center'; " class="second-h2">
							<h2>Work Experience</h2>
						</div>
				            <div  id="main-2">
                                        <div> <h3  Worked experience in <?= $data['tasks']; ?></h2></div>
                                        
                            </div> 
                            <div id="main-2">
                                        <div> <h3> <?= $data['experience']; ?> Worked Experience</h2></div>
                                        
                            </div> 
                            <div id="main-2">
                                        <div> <h3><?= $data['duration']; ?> Working Duration Flexible </h2></div>
                                        
                            </div> 
                            
                    </div>





					

				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->
		
		<div id="ft">
			<p>HireForcare &mdash; <a href="mailto:info@hireforcare.com">info@hireforcare.com</a> &mdash; +919619218826</p>
		</div><!--// footer -->
        
    </div><!-- // inner -->
        <?php 
        
        if($emp_id){ 
        echo "<script>  downloadimage();
        setInterval(function(){
  window.history.back();
}, 500);
        
        
</script>";
        
        }else{
            echo "id not Found";
        //   echo "<script>  downloadimage()</script>";  
        }
        ?>
    


</div><!--// doc -->



<!--<script> window.location.href = 'http://hireforcare.com/view_profile.php?emp_id=emp_6';</script>-->
<!--<script src="../assets/js/select2.min.js"></script>-->
<!--<script src="../assets/js/bootstrap.min.js"></script>-->
<!--<script src="../assets/js/owl.carousel.min.js"></script>-->
<!--<script src="../assets/js/aos.js"></script>-->
<!--<script src="../assets/js/custom.js"></script>-->
</body>
</html>


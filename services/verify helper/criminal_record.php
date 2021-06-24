<?php
require('../../db.php');
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from veepixel.com/tf/html/jodice/compnay-profile-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:52:12 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>HireForCare</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" href="../../assets/images/fav.png" type="image/gif" sizes="64x64">

<!-- CSS
================================================== -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&amp;display=swap&amp;subset=latin-ext" rel="stylesheet">
<link rel="stylesheet" href="../../assets/css/all.min.css">
<link href="../../assets/css/aos.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<link href="../../assets/css/select2.min.css" rel="stylesheet" />
<link href="../../assets/css/owl.carousel.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../../assets/css/style.css">
<link rel="stylesheet" href="../../assets/css/color-1.css">
</head>
<body>

<!-- Header 01
================================================== -->
<header class="header_01 header_inner">
	<div class="header_main">
		<?php include('../../includes/header.php') ?>	
		<div class="header_btm">
		    <h2>Criminal Background Check</h2>
      
      
    </div>
    
	</div> 
	
  </header>


<!-- End Header 02
================================================== -->



<!-- Main 
================================================== -->
<main>
  <div class="single_job">
    <div class="container">
      <div class="row">
      	<div class="col-md-9 mx-auto shadow-lg p-4">
      	    <div class="text-center mb-5">
      	        <div id="success-alert" class="alert alert-success d-none" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Successfully!</strong>
   Account Created, Login Now
</div>
            <h3 class="">Criminal Verification</h3>
      	    <p class="text-muted">Please Enter Correct Details</p>
      	    </div>
      	    
      	    
      	    <form id="forms" onsubmit="return validation()">
                <div class="big_form_group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >First Name <span class="text-danger">*</span></label>
                        <input autocomplete="off" id="fName" name="first-name" type="text" class="form-control" placeholder="Enter first name" >
                        <span class="text-danger font-weight-bold" id="username_err"></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Last Name <span class="text-danger">*</span></label>
                        <input autocomplete="off" id="lName" name="last-name" type="text" class="form-control" placeholder="Enter last name">
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Address <span class="text-danger">*</span></label>
                        <input autocomplete="off" id="address" name="address" type="text" class="form-control" placeholder="Seofls@itsexample.com" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Year of Birth of Can autocomplete="off"didate <span class="text-danger">*</span></label>
                        <input autocomplete="off" id="dob" name="dob" type="date" class="form-control" placeholder="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="big_form_group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >City <span class="text-danger">*</span></label>
                        <input autocomplete="off" id="city" name="city" type="text" class="form-control" placeholder="Enter City" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >State <span class="text-danger">*</span></label>
                        <input autocomplete="off" id="state" name="state" type="text" class="form-control" placeholder="Enter state">
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Pincode <span class="text-danger">*</span></label>
                        <input autocomplete="off" id="pincode" name="pincode" type="text" class="form-control" placeholder="Enter Pincode" >
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="form-group ">
                        <label  >Mobile number <span class="text-danger">*</span></label>
                        <input autocomplete="off" id="mobile_number" name="mobile_number" type="number" class="form-control" placeholder="Enter contact number">
                        <div id="number_err" class="invalid-feedback">
      
    </div>
                        <span class="text-danger font-weight-bold" id="number_err"></span>
                      </div>
                      </div>
                      
                      
                      <div class="col-md-6">
                          <div class="form-group ">
                          <label  >Is above address same as permanent address <span class="text-danger">*</span></label>
                          <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="yes" autocomplete="off" id="inlineRadio1" value="yes">
  <label class="form-check-label" for="inlineRadio1">Yes</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="no" autocomplete="off" id="inlineRadio2" value="no">
  <label class="form-check-label" for="inlineRadio2">No</label>
</div>
                          </div>
                    </div>
                  </div>
                </div>

                <div class="big_form_group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Document for Criminal Verification <span class="text-danger">*</span></label>
                        <select name="document" class="form-control">
                            <option selected disabled value="">
                            Select Document
                          </option>
                          <option>
                            Aadhar Card
                          </option>
                          <option>
                            Pan Card
                          </option>
                          <option>
                            Voter Card
                          </option>

                        </select>
                      </div>
                    </div>
                     
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label  >Document number for Criminal Verification </label>
                        <input autocomplete="off" id="doc_number" name="doc-number"  type="text" class="form-control" placeholder="Document number">
                        <div id="doc_digit_err" class="invalid-feedback">
      
    </div>
                      </div>
                    </div>
                    
                  </div>
                </div>

                <div class="form-group row">
                  <div  class="col-md-9 ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
                
              </form>  
      		
		            </div>
		            </div>
		            </div>
		            
		            </section>
		            
		            
		                        
		        	
		        	
		        
      	</div>
      	
      </div>
    </div>
  </div>
</main>


<!-- Footer Container
================================================== -->
<?php include('../../includes/footer.php') ?>
</footer>


<!-- End Footer Container
================================================== -->

<!-- Scripts
================================================== -->
<script type="text/javascript"> 

function validation() {
    var mobile_number= document.getElementById("mobile_number").value;
    var doc_number = document.getElementById("doc_number").value;

    if(mobile_number.length!=10){
        document.getElementById("mobile_number").className += " is-invalid";
        document.getElementById("number_err").innerHTML = "Mobile number Must Be 10 digit"
        document.getElementById("mobile_number").focus();
        if(doc_number.length == 12 || doc_number.length == 10 ){
            
            document.getElementById("doc_number").classList.remove("is-invalid");
            document.getElementById("doc_number").className += " is-valid";
        }
        return false;
    }
    if(doc_number.length==11 || doc_number.length<10 || doc_number.length>12){
        document.getElementById("doc_number").className += " is-invalid";
        document.getElementById("doc_digit_err").innerHTML = "doc number Must Be 10 and 12 digit"
        document.getElementById("doc_number").focus();
        if(mobile_number.length == 10){
            
            document.getElementById("mobile_number").classList.remove("is-invalid");
            document.getElementById("mobile_number").className += " is-valid";
        }
        return false;
    }
    
    
    else{
        
        $(document).ready(function(){
            
                $.ajax({
            type:"POST",
            url:"criminal_record_save.php",
            data: $('#forms').serialize(),
            // data: {mobile_number}
            success: function(res){
                if(jQuery.trim(res) == 'ok'){
                    $('#forms').trigger('reset');
                    document.getElementById("success-alert").classList.remove("d-none");
                    window.scrollTo(0, 0);
                    window.setTimeout(function() {
    $("#success-alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
                    
                }
            },error: function(){
                alert('error');
            }
        }); 
        
        
         
            
           
        })
        return false;
        
    }
    
}
</script>
<script src="../../assets/js/jquery-3.4.1.min.js"></script>
<script src="../../assets/js/select2.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/owl.carousel.min.js"></script>
<script src="../../assets/js/aos.js"></script>
<script src="../../assets/js/custom.js"></script>
</body>

<!-- Mirrored from veepixel.com/tf/html/jodice/compnay-profile-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2021 05:52:15 GMT -->
</html>

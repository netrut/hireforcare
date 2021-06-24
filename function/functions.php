<?php  
// session_start();
$site = 'http://hireforcare.com/';
function admin(){
    if (!isset($_SESSION['loggedin'])) {
	// header('Location: ../registration/login.php');
  echo "<script>

		window.location.href = 'http://hireforcare.com/registration/login.php';

		</script>";
		
			exit;
		}elseif($_SESSION['role_id']>1) {

			// header('Location: ../');
		echo "<script>

		window.location.href = 'http://hireforcare.com';

		</script>";
  
	exit;
	}
}

// -------------------Admin and manager------------

function admin_manager(){
    if (!isset($_SESSION['loggedin'])) {
	// header('Location: ../registration/login.php');
		echo "<script>

		window.location.href = 'http://hireforcare.com/registration/login.php';

		</script>";
		
			exit;
		}elseif($_SESSION['role_id']>2) {

			// header('Location: ../');
		echo "<script>

		window.location.href = 'http://hireforcare.com';

		</script>";
  
	exit;
	}
}

// ------------------------Admin Manager And Customer--------------
function admin_manager_customer(){
    if (!isset($_SESSION['loggedin'])) {
	// header('Location: ../registration/login.php');
  echo "<script>

 window.location.href = 'http://hireforcare.com/registration/login.php';

	</script>";
  
	exit;
	}elseif($_SESSION['role_id']>3) {

	// header('Location: ../');
   echo "<script>

 window.location.href = 'http://hireforcare.com';</script>";
  
	exit;
	}
}

// ----------------------------Admin Manager And Candidate-----------------
function admin_manager_candidate(){
    if (!isset($_SESSION['loggedin'])) {
	// header('Location: ../registration/login.php');
  echo "<script>

 window.location.href = 'http://hireforcare.com/registration/login.php';

	</script>";
  
	exit;
	}elseif($_SESSION['role_id']==3) {

	// header('Location: ../');
   echo "<script>window.location.href = 'http://hireforcare.com';</script>";
  
	exit;
	}
}

// ----------------------------Admin And Candidate-----------------
function admin_candidate(){
    if (!isset($_SESSION['loggedin'])) {
	// header('Location: ../registration/login.php');
  echo "<script> window.location.href = 'http://hireforcare.com/registration/login.php'; </script>";
  
	exit;
	}elseif($_SESSION['role_id']==2 || $_SESSION['role_id']==3 || $_SESSION['role_id']==1) {

	// header('Location: ../');
   echo "<script> window.location.href = 'http://hireforcare.com';</script>";
  
	exit;
	}
}

// ----------------------------Admin  And Customer-----------------
function admin_customer(){
    if (!isset($_SESSION['loggedin'])) {
	// header('Location: ../registration/login.php');
  echo "<script> window.location.href = 'http://hireforcare.com/registration/login.php';</script>";
  
	exit;
	}elseif($_SESSION['role_id']==2 || $_SESSION['role_id']==4) {

	// header('Location: ../');
   echo "<script>window.location.href = 'http://hireforcare.com';</script>";
  
	exit;
	}
}



?>
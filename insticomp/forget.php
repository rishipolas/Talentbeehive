<?php
	if(!empty($_POST["forgot-password"])){
		$conn = mysqli_connect("166.62.10.54", "roottalent", "beehive@root", "socialuser");
		
		$condition = "";
		if(!empty($_POST["institute_name"])) 
			$condition = " institute_name = '" . $_POST["institute_name"] . "'";
		if(!empty($_POST["email"])) {
			if(!empty($condition)) {
				$condition = " and ";
			}
			$condition = " email = '" . $_POST["email"] . "'";
		}
		
		if(!empty($condition)) {
			$condition = " where " . $condition;
		}

		$sql = "Select * from institute_registration" . $condition;
		$result = mysqli_query($conn,$sql);
		$user = mysqli_fetch_array($result);
		
		if(!empty($user)) {
			require_once("forgot-password-recovery-mailinstitute.php");
		} else {
			$error_message = 'No User Found';
		}
	}
?>

<link href="demo-style.css" rel="stylesheet" type="text/css">
<script>
function validate_forgot() {
	if((document.getElementById("user-login-name").value == "") && (document.getElementById("user-email").value == "")) {
		document.getElementById("validation-message").innerHTML = "Login name and Email is required!"
		return false;
	}
	return true
}
</script>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Talent Beehive</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/login.css" rel="stylesheet">
  <link href="../css/responsive.css" rel="stylesheet">


</head>

<body>
 
  <!--==========================
  Header
  ============================-->
  <header id="header">
  
   <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		Menu </button>
        <a class="navbar-brand" href="index.php"><img src="../img/works/talent.png" height="40px" width="200px" alt=""></a></div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
                       
          <ul class="nav navbar-nav navbar-right othr">
          <li class="line"></li>
          <li> <a href="" ><span>About us</span></a></li>
		  <li> <a href="" ><span>Employers</span></a></li>
		   <li> <a href="" ><span>Blog</span></a></li>
		  <li><div class="dropdown"> <button class="navbar-btn nav-button wow bounceInRight login">Login/Signup</button>
		  <div class="dropdown-content">
    <a href="company-login.php">Company</a><br>
    <a href="institute_login.php">Institute</a>
   
  </div>
  </div>
		  </li>
        </ul>
    
    </div>
	
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
  
    
      <div class="hero-container contOtrBlk row">

          <div class="container">
    	<div class="row mt-10">
    	    <div class="col-xs-12 col-lg-6 col-md-8 col-md-offset-3 mainw3-agileinfo form wow pulse animated">
        	    <div class="form-wrap">
                  
                     <form name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_forgot();">
                     
                     <?php if(!empty($success_message)) { ?>
								<div class="success_message"><?php echo $success_message; ?></div>
								<?php } ?>

								<div id="validation-message">
								<?php if(!empty($error_message)) { ?>
								<?php echo $error_message; ?>
								<?php } ?>
								</div>
                        <div class="form-group">
                           <label> Enter Your Register Email<span class="req">*</span> </label>
                            <input type="email"  name="email" id="email"  class="clr-place"  placeholder="*Enter Your Registered Email" required>
                        </div>
                        <div class="form-group">
                            <label>Institute Name<span class="req">*</span> </label>
                           <input type="user"  class="clr-place" name="institute_name" id="institute_name" placeholder="Institute Name">
                        </div>
                       
                         <input type="submit" name="forgot-password" id="forgot-password" value="Submit"  class="form-submit-button btn btn-info btn-forget text-center btn-lg">
                    </form>
                    
                   
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
			
        </div>
							  
 
	
  </section><!-- #hero -->

 

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>talentbeehive.com</strong>. All Rights Reserved
      </div>
     
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="../lib/easing/easing.min.js"></script>
  <script src="../lib/wow/wow.min.js"></script>
  

  <script src="../lib/waypoints/waypoints.min.js"></script>
  <script src="../lib/counterup/counterup.min.js"></script>
  <script src="../lib/superfish/hoverIntent.js"></script>
  <script src="../lib/superfish/superfish.min.js"></script>

  
  <!-- Template Main Javascript File -->
  <script src="../js/main.js"></script>
  
</body>
</html>

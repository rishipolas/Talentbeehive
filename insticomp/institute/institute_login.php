<?php
require_once '../config1.php';
include('institute_datalog.php');

?>
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
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="../index.php"><img src="../img/works/talent.png" height="45px" width="200px" alt=""></a></div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
                       
          <ul class="nav navbar-nav navbar-right othr">
          <li class="line"></li>
          <!--li> <a href="#about" ><span>About us</span></a></li-->
		  <li> <a href="employers-view.php" ><span>Employers</span></a></li>
		   <li> <a href="" ><span>Blog</span></a></li>
		  <li><div class="dropdown"> <button class="navbar-btn nav-button wow bounceInRight login">Login/Signup</button>
		  <div class="dropdown-content">
    <a href="company-login.php">Company</a><br>   
   <a href="institute/institute_login.php">Institute</a>
   
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
                  
                    <form role="form" action="institute_login.php" method="post" id="login-form" autocomplete="off">
                     <?php include('../errors.php');?>
                     
                      <div>
                      <h2 style="color:#fff">INSTITUTE  &nbsp; LOGIN</h2>
                      </div>
                        <div class="form-group">
                           <label> Enter Your Email<span class="req">*</span> </label>
                            <input type="text" name="email" pattern="[a-zA-Z0-9]+\.?[a-zA-Z0-9]+@[A-Za-z0-9.-]+\.[a-z]{2,3}" id="email"  placeholder="somebody@example.com" required>
                        </div>
                        <div class="form-group">
                            <label>Enter Your Password<span class="req">*</span> </label>
                            <input type="password" name="cpassword" id="key"  placeholder="Password" required>
                        </div>
                        <p class="forgot"><a href="forget.php" >Forgot Password?</a></p> 
                        <button class="button button-block" name="login" />Log In</button> 
                        
                        <?php echo $msg; ?>
                    </form>
                    
                    <div class="register-login">
                                       New User? <span><a href="institute_registration.php"> Register Now</a></span>
                                    </div>
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
        &copy; Copyright <strong> talentbeehive.com</strong>. All Rights Reserved
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>

  <script src="../lib/waypoints/waypoints.min.js"></script>
  <script src="../lib/counterup/counterup.min.js"></script>
  <script src="../lib/superfish/hoverIntent.js"></script>
  <script src="../lib/superfish/superfish.min.js"></script>

  
  <!-- Template Main Javascript File -->
  <script src="../js/main.js"></script>
  
</body>
</html>

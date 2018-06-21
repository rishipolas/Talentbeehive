<?php
  //$con=mysqli_connect('localhost','root','');
  
  
  
  // Database Connection
  
$con=mysqli_connect('localhost', 'roottalent', 'beehive@root');
        mysqli_select_db($con,'socialuser');
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Talentbeehive.com</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../img/favicon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="../https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/login.css" rel="stylesheet">
  <link href="../css/responsive.css" rel="stylesheet">

   <script src="/script.js" defer></script>
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
        <a class="navbar-brand" href="index.php"><img src="../img/works/talent.png" height="45px" width="200px" alt=""></a> </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
                       
          <ul class="nav navbar-nav navbar-right othr">
          <li class="line"></li>
          <!--li> <a href="" ><span>About us</span></a></li-->
		  <li> <a href="employers-view.php" ><span>Employers</span></a></li>
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
      <br> <br> <br> <br> <br> 
     
<section id="portfolio">

 <div class="section-header">
          <h3 class="section-title">Employers</h3>

        </div>
        </br>
      <div class="container wow fadeInUp">
        
       
	   
        <div class="row" id="portfolio-wrapper">
		  <?php
                                 $q3="select * from users ORDER BY id DESC";
$result3=mysqli_query($con,$q3);
$num3=mysqli_num_rows($result3);

	for($i=1;$i<=$num3;$i++)
	{
		$row3=mysqli_fetch_array($result3);
		
			   ?>
		
          <div class="col-lg-3 col-md-6 portfolio-item filter-app">
		  
		  
		
		  
            <a>
              <img src="<?php echo '../uploads/' .$row3['clogo'] ?>" height="180px" width="246px" alt="<?php $row3['cname']; ?>">
              <div class="details">
               <span><?php echo $row3['cname']; ?></span>
              </div>
            </a>
			
          </div>

        <?php
                                    }
                                    ?> 
                                    
        </div>
 

      </div>


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
        &copy; Copyright <strong>Talentbeehive.com</strong>. All Rights Reserved
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
  <script src="../https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>

  <script src="../lib/waypoints/waypoints.min.js"></script>
  <script src="../lib/counterup/counterup.min.js"></script>
  <script src="../lib/superfish/hoverIntent.js"></script>
  <script src="../lib/superfish/superfish.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../js/main.js"></script>
  <script src="../js/read-more.js"></script>
  
</body>
</html>

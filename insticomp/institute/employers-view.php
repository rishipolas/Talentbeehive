<!DOCTYPE html>
<!--[if lt IE 7]>      
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
   <![endif]-->
   <!--[if IE 7]>         
   <html class="no-js lt-ie9 lt-ie8">
      <![endif]-->
      <!--[if IE 8]>         
      <html class="no-js lt-ie9">
         <![endif]-->
         <!--[if gt IE 8]><!--> 
         <html class="no-js">
            <!--<![endif]-->
            

<head>
  <meta charset="utf-8">
  <title>Talent Beehive</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../img/favicon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
<link rel="stylesheet" href="../css/normalize.css">
               <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/fontello.css">
               <link rel="stylesheet" href="../css/animate.css">
               <link rel="stylesheet" href="../css/bootstrap.min.css">
               <link rel="stylesheet" href="../css/owl.carousel.css">
               <link rel="stylesheet" href="../css/owl.theme.css">
               <link rel="stylesheet" href="../css/owl.transitions.css">
             
			     
  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/login.css" rel="stylesheet">
   <link href="../style-home.css" rel="stylesheet">
  <link href="../css/responsive.css" rel="stylesheet">

</head>

<body>

  <!--==========================
  Header
  ============================-->

    
	
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
  
    
      <div class="hero-container contOtrBlk row">

          
    	 <!-- Body content -->
              
		<nav class="navbar navbar-default-comman">
                  <div class="container">
    	 		 <!-- Brand and toggle get grouped for better mobile display -->
                     <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="img/works/talent.png" height="70px" width="200px" alt=""></a>
                     </div>
                     <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                       
                         <ul class="main-nav nav navbar-nav navbar-right">
                           <li class="wow fadeInDown" data-wow-delay="0s"><a  href="index.php">Home</a></li>
                        
                           <li class="wow fadeInDown" data-wow-delay="0.2s"><a class="active" href="employers-view.php">Employers</a></li>
                           
                           <!--<li class="wow fadeInDown" data-wow-delay="0.4s"><a href="blog.html">Blog</a></li>-->
                           <div class="dropdown">
<button onclick="myFunction()" class="dropbtn">LOGIN/SIGNUP</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="company-login.php">COMPANY </a>
    <a href="candidate-login.php">CANDIDATE </a>
  
  </div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

                          
                        </ul>
                     </div>
                     <!-- /.navbar-collapse -->
                  </div>
               </nav>
               
               
               
               
               
    	    
    	    
    	    <div class="bg-image">
                  
                  <div class="container ">
				      
		
			<div class="row">
                <?php
				  
				 
       include('config1.php');
				  
				  $q="select * from users ORDER BY id DESC ";
				  $result=mysqli_query($DB,$q);
				  $num=mysqli_num_rows($result);
				  
				  
				 
				  						
		if($num>0)
		{
				
		
			for($i=1;$i<=$num;$i++)
	        {
		
		          $row=mysqli_fetch_array($result);
		
				  ?>
			<div class="col-md-3 col-sm-6 col-xs-12 gallery-item" style="background: #fff; box-shadow:5px 5px #FAD556;">
			
                                        <div class="employer-item">
                                            <div class="employer-image">
											
											<img alt="  <?php echo $row['cname']; ?>" src="<?php echo '../uploads/' .$row['clogo']; ?>" class="avatar avatar-full photo" width="250" height="250">
											
											</div>
											 <h3 class="employer-title"><a href="#gallery<?php echo $i;?>" data-toggle="modal" data-target="#modalGallery<?php echo $i;?>">
                                            <?php echo $row['cname']; ?></a></h3>
                                            <div class="employer-locations">
											</div>
					
                                        </div>
                                  </div>
    	    <?php
        	   }
        	   }
        	   ?>
    		  
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
  <script src="../https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>

  <script src="../lib/waypoints/waypoints.min.js"></script>
  <script src="../lib/counterup/counterup.min.js"></script>
  <script src="../lib/superfish/hoverIntent.js"></script>
  <script src="../lib/superfish/superfish.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../js/main.js"></script>
  
</body>
</html>

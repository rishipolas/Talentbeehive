<!DOCTYPE html>
<html lang="en">
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
  <link href="../https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../style-home.css" rel="stylesheet">
  <link href="../css/responsive.css" rel="stylesheet">
  
   
  
<style>
a:hover {
    background-color: #ff9900;
}
</style>

</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
  
   <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="index.php"><img src="../img/works/talent.png" height="45px" width="200px" alt=""></a></div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
                       
          <ul class="nav navbar-nav navbar-right othr">
          <li class="line"></li>
          <li> <a href="#about" ><span>About us</span></a></li>
		  <li> <a href="employers-view.php" ><span>Employers</span></a></li>
		   <li> <a href="" ><span>Blog</span></a></li>
		  <li><div class="dropdown"> <button class="navbar-btn nav-button wow bounceInRight login">Login/Signup</button>
		  <div class="dropdown-content">
    <a href="company-login.php">Company</a><br>
    <a href="candidate-login.php">Candidate</a><br>
     <a href="institute_login.php">Institute</a>
   
  </div>
  </div>
		  </li>
        </ul>
           
            
            
             <div class="row">
			<div class="col-lg-3"></div>
         	<div class="col-lg-5">	
            <div class="well-searchbox">
                <form action="walkinsearch.php" class="form-horizontal" method="POST" role="form">
                                   <?php 
					     include_once('../config1.php');
    					$query = $DB->query("SELECT * FROM city");
      
    					$rowCount = $query->num_rows;
   								 ?>	
                    <div class="form-group">
                        
                        <div class="col-md-11">
                         <div class="col-md-6">
                            <select class="form-control" id="city" name="city" >
							     <option value="" disabled selected>----Select City---</option>  
                                 
                                 <?php
                            if($rowCount > 0)
                            {
                                while($getCity = $query->fetch_assoc())
                                {           
                                    echo '<option value="'.$getCity['c_id'].'">'.$getCity['cityname'].'</option>';	
                                }
                            }else
                            {
                                echo '<option value="">city not available</option>';
                            }
                            ?>    		 
								 
                            </select>
                        </div>
                        		 <div class="col-md-5">
                                         
                        <button type="submit" name="submit" id="submit" class="btn btn-success">Search</button>
                    
                    </div>
                    </div>
                    </div
                </form>
            </div>
            </div>
			<div class="col-lg-4"></div>
	        </div>
            
            
    
	   </div>
       
      
            
	
  </header><!-- #header -->
  <?php
    include_once('../config1.php');
    $qr="select *, walkindata.id as fid from walkindata INNER JOIN users ON walkindata.name=users.cname where walkindata.status='active' ORDER BY walkindata.id DESC";
    

        //$q="select DISTINCT from functionality INNER JOIN users ON functionality.name=users.cname ORDER BY 'id' DESC";
                
            $resultr=mysqli_query($DB,$qr);
            $numr=mysqli_num_rows($resultr);

?>
</div>
  <!--==========================
    services Section
  ============================-->

<section id="hero">
      <div class="hero-container wow fadeIn"><br>
      
        <div class="section-header" style="margin-top:100px;">
          <h2 class="section-title" style="color:#fff">Recent Walkins</h2><br><br>
          </div>
          <div class="container" style="margin-top:50px;">
        <div class="row">
         <?php
         
         
       if($numr>0)         
       {                       
            for($i=1;$i<=$numr;$i++)
            {
                $rowr=mysqli_fetch_array($resultr);
         
        
          
         ?>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
            
              <div class="icon"><a href="stud_walkin_23.php?id=<?php echo  $rowr['fid'];?>"><strong>View</strong></a></div>
              <h4 class="title"><?php echo $rowr['title'];?></h4>
              <span class="description"><i class="fa fa-building" aria-hidden="true"></i> <strong style="color:#ffcd01"><?php echo $rowr['cname'];?></strong></span>
                <p class="description index-show-read-more">Skills: <?php echo $rowr['skills'];?></p>
                
               
            </div>
          </div>
          <?php
            }
        }//if
          ?>        
        </div><!--row-->
        </div>
    </div>
</section><!--service-->

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
        &copy; Copyright <strong>taletbeehive.com</strong>. All Rights Reserved
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
  <script src=../"lib/wow/wow.min.js"></script>
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

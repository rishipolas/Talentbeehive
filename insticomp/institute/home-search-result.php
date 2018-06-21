<?php
 
    $con=mysqli_connect('localhost', 'roottalent', 'beehive@root');
   // $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'socialuser');
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
  <link href="../img/favicon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
 <link href="../style-home.css" rel="stylesheet">
  <link href="../css/responsive.css" rel="stylesheet">






  <!-- Google Fonts -->
  <!--link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet"-->

  <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->

  <link href="../style-home.css" rel="stylesheet">
  <link href="../css/responsive.css" rel="stylesheet">


</head>

<body>

 


  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
  
    
      <div class="hero-container contOtrBlk row">
	  
            <nav class="navbar sticky-top nav-search-fix navbar-light">
  <form action="home-search-result.php" method="post" class=" form-inline .nav-form-search" style="margin: 0 auto;">
                                 
                                 <div class="form-group">
                                     <input type="text" id="idlocation" list="listlocation" name="role" class="form-control" placeholder="Functional Role">
			<datalist id="idlocation">  
<?php
$sql2 = mysqli_query($con, "SELECT * From functional_role");
$ro2 = mysqli_num_rows($sql2);
while ($ro2 = mysqli_fetch_array($sql2)){
?>
     <option value="<?php echo $ro2['role'] ?>" >
        
 <?php
}
?>
 </datalist>
                                 </div>
                                 <div class="form-group">
                                   <input type="text" id="idrole" list="listrole" class="form-control" name="title" placeholder="title">  
 <datalist id="idrole">  
 <?php
$sqlr= mysqli_query($con, "SELECT * From functionality");
$ror = mysqli_num_rows($sqlr);
while ($ror = mysqli_fetch_array($sqlr)){
?>
     <option value="<?php echo $ror['title'] ?>"> 
 <?php
}
?>


 </datalist>  
                                
 
                                 </div>
                                 <button type="submit"  name="data" class="btn btn-info-search btn-lg">Search</button>
                              </form>
</nav>
 <?php
	 
		
		
	      if(isset($_POST['data'])){
		         
			  //require('config1.php');
			 
        


			 if ($_REQUEST["title"]<>'') {
	$title = " AND title='".mysqli_real_escape_string($con,$_REQUEST["title"])."'";	
}

if ($_REQUEST["role"]<>'') {
	$role = " AND role='".mysqli_real_escape_string($con,$_REQUEST["role"])."'";	
}


if ($_REQUEST["role"]<>'' and $_REQUEST["location"]<>'') {
	$q = "SELECT atype,openings,type,qualification,title,role,skills,description,date,functionality.name as 'tname',functionality.skills  FROM functionality WHERE role >= '".mysqli_real_escape_string($con,$_REQUEST["role"])."' AND title <= '".($_REQUEST["title"])."' ".$role.$title;
}  else if ($_REQUEST["role"]<>'') {
	$q = "SELECT atype,openings,type,qualification,title,role,skills,description,date,functionality.name as 'tname',functionality.skills  FROM functionality WHERE role >= '".mysqli_real_escape_string($con,$_REQUEST["role"])."'".$role;
} else if ($_REQUEST["title"]<>'') {
	$q = "SELECT atype,openings,type,qualification,title,role,skills,description,date,functionality.name as 'tname',functionality.skills  FROM functionality WHERE title <= '".mysqli_real_escape_string($con,$_REQUEST["title"])."'".$title;
}else if(empty($_REQUEST["title"]) and empty($_REQUEST["role"])) {
	
	$q = "SELECT * FROM functionality where title>0 and role>0 ";

}

			  $result=mysqli_query($con,$q);
			   			
           $row1=mysqli_num_rows($result);
 
				   
				   
		 if($row1==0){
				      echo  "<h3> $row1 records Found</h3>";
					 
				  }	
		    else{	
		    
		      echo  "<h3> $row1 records Found </h3>";  
		      	  
			  while($row = mysqli_fetch_assoc($result) ){
				  
				 
                
					
					  ?>
                    
          <div class="container">
    	<div class="row" style="margin-top:25px">
    	    <div class="col-xs-12 col-lg-7 col-md-offset-2 mainw3-agileinfo form wow pulse animated ">
        	    <div class="row jobpost-row-homesearch">
                                 <div class="col-lg-12">
                                    <div class="post-title jobpost-title">
                                       <a class="text-primary"style="padding:5px 0px; font-size:20px;"><?php echo $row['title'];?></a><small style="color:#ffcd01; margin-left:12px;">(<?php echo $row['type'];?>)</small>
									   
                                    </div>
                                 </div>
                              </div>
                              <div class="row" style="margin-top:18px">
                                
                                 <div class="col-lg-12">
                                    <div class="row" style="text-align:left">
                                       <div class="col-lg-6">
                                          
                                             <span style="color:#fff">Comapny Name:</span><a style="color:#ffcd01" ><?php echo $row['tname'];?></a>
                                        
                                       </div>
                                       <div class="col-lg-6 ">
                                          <div class="post-des ">
                                             <span style="color:#fff">Functional Role:</span><span style="color:#ffcd01"><?php echo $row['role'];?></span>
                                          </div>
                                       </div>
                                    </div>
                                   
                                    <!---row--->
									<div class="row" style="text-align:left; margin-top:15px;" >
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                             <span style="color:#fff" >Skills:</span><span style="color:#ffcd01"><?php echo $row['skills'];?></span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                             <span style="color:#fff">Location:</span><span style="color:#ffcd01"> <?php echo $row['location'];?></span>
                                          </div>
                                       </div>
                                    </div>
                           
									
									
									
                                    <!---row--->
                                 </div>
								 
                                 <!--col-6--->
                              </div>
                              <!---row----->
							  <div class="row jobpost-row-homesearch-footer"style="margin-top:15px;">
                                 <div class="col-lg-12">
                                    <div class="post-title jobpost-title">
                                      <span class="tbl-apply pull-right nav-button"><a href="candidate-login.php">Apply now</a></span>
											<span  class="pull-left" style="font-size:11px; color:#fff;"><?php echo $row['date'];?></span>
									   
                                    </div>
                                 </div>
                              </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
		
		

    </div> <!-- /.container -->
	 <?php
				  }				  
					  
				  
			  }
			  
			  
			  
		  }
		  else{
			  
			  ?>
			  
			  <h3 style="margin-left:47px;">No Search </h3>
			  
			<?php  }
?>	    
	  
			
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

<?php
 include('config1.php');
 
$q="select walkindata.name,walkindata.title,walkindata.role,walkindata.walk1,walkindata.venue,walkindata.time1,walkindata.openings,walkindata.state,walkindata.city,walkindata.qualification,walkindata.course,walkindata.specialization,walkindata.description,walkindata.skills,walkindata.date,walkindata.atype,walkindata.country,users.clogo from walkindata INNER JOIN users ON walkindata.name=users.cname ";



$result=mysqli_query($DB,$q);
$num=mysqli_num_rows($result);  


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
        <a class="navbar-brand" href="index.php"><img src="img/works/talent.png" height="45px" width="200px" alt=""></a> </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
                       
          <ul class="nav navbar-nav navbar-right othr">
          <li class="line"></li>
          <!--li> <a href="" ><span>About us</span></a></li-->
		  <li> <a href="employers-view.php" ><span>Employers</span></a></li>
		   <li> <a href="" ><span>Blog</span></a></li>
		  <li><div class="dropdown"> <button class="navbar-btn nav-button wow bounceInRight login">Login/Signup</button>
		  <div class="dropdown-content">
    <a href="company-login.php">Company</a><br>
    <a href="candidate-login.php">Candidate</a>
   
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
            <br><br><br><br>
    	<div class="row">
		   
    	    <div class="col-xs-12 col-lg-8 col-md-offset-2 mainw3-agileinfo form wow pulse animated ">
        	    <div class="row jobpost-row-homesearch">
        	    <?php
if($num > 0)
{
			 
		$row=mysqli_fetch_array($result);
		
	?>  

                                      
                                 <div class="col-lg-12">
                                    <div class="post-title jobpost-title">
                                       <a class="text-primary"style="padding:5px 0px; font-size:20px;"><?php echo $row['title'] ;?></a><small style="color:#ffcd01; margin-left:12px;">(<?php echo $row['atype'] ;?>)</small>&nbsp;&nbsp;&nbsp;&nbsp;<a class="text-primary"style="padding:5px 0px; font-size:20px;"> Date:</a><a style="color:#ffcd01" ><?php echo $row['walk1'] ;?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="text-primary"style="padding:5px 0px; font-size:20px;"> Time:</a><a style="color:#ffcd01" ><?php echo $row['time1'] ;?></a>
									   
                                    </div>
                                 </div>
                              </div>
                              <div class="row" style="margin-top:18px">
                                 <div class="col-xs-12 col-lg-2">
			 <div class="post-logo">
                                       <img src="<?php echo '../uploads/' .$row['clogo']; ?>" alt="Company-logo">
                                    </div>
			</div>
                                 <div class="col-lg-10">
                                    <div class="row" style="text-align:left">
                                       <div class="col-lg-6">
                                          
                                             <span style="color:#fff">Company Name:  </span><a style="color:#ffcd01" ><?php echo $row['name'] ;?></a>
                                        
                                       </div>
                                       <div class="col-lg-6 ">
                                          <div class="post-des ">
                                             <span style="color:#fff">Functional Role:  </span><span style="color:#ffcd01"><?php echo $row['role'] ;?></span>
                                          </div>
                                       </div>
                                    </div>
                                   
                                    <!---row--->
									<div class="row" style="text-align:left; margin-top:15px;" >
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                             <span style="color:#fff" >Number of Openings:  </span><span style="color:#ffcd01"><?php echo $row['openings'] ;?></span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 ">
                                        <?php 
					     
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$row['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
						
		?>
                                          <div class="post-des mt-3">
                                             <span style="color:#fff">Location:  </span><span style="color:#ffcd01"><?php //echo $row['location'] ;?>
                                            <?php echo $row['country'] ;?> <?php  echo $getstatedetails['statename'];?> , <?php  echo $getcitydetails['cityname']; ?>
                                             </span>
                                          </div>
                                       </div>
                                    </div><!---row--->
				<div class="row" style="text-align:left; margin-top:15px;" >
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                              <span style="color:#fff" >Qualification:  </span><span style="color:#ffcd01"><?php //echo $row['qualification'] ;?>
                                             <?php 
               
                         $str2 = $row['qualification'];	
						    $strs2=explode(",",$str2);
						     $st="";
							  foreach($strs2 as $q2){
							
							 $q1="select qualification from qualification where id='$q2'";
							  $result1=mysqli_query($DB,$q1);
							  $row1=mysqli_fetch_array($result1);
							  $c=$row1['qualification'];
							   $st=$st.$c.", ";
							  }
							 
						echo $st;
                        
                        ?>
                                              
                                              </span>
                                          </div>
                                       </div>
                                        
                                        <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                              <span style="color:#fff" >Course:  </span><span style="color:#ffcd01"><?php //echo $row['qualification'] ;?>
                                              <?php 
              
                        
											 $str3 = $row['course'];	
												$strs3=explode(",",$str3);
												 $st1="";
												  foreach($strs3 as $q3){
												
												 $q1="select course from course where c_id='$q3'";
												  $result1=mysqli_query($DB,$q1);
												  $row1=mysqli_fetch_array($result1);
												  $c=$row1['course'];
												   $st1=$st1.$c.", ";
												  }
												 
											echo $st1;
                        
                        ?>
                                              
                                              </span>
                                          </div>
                                       </div>
                                      </div>
                                      
                                      
                                      
                                <div class="row" style="text-align:left; margin-top:15px;" >        
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                              <span style="color:#fff" >Specialization:  </span><span style="color:#ffcd01"><?php //echo $row['qualification'] ;?>
                                              <?php 
              
              
              $str1 = $row['specialization'];	
						    $strs=explode(",",$str1);
						     $str="";
							  foreach($strs as $b){
							
							 $q1="select specialization from specialization where s_id='$b'";
							  $result1=mysqli_query($DB,$q1);
							  $row1=mysqli_fetch_array($result1);
							  $c=$row1['specialization'];
							   $str=$str.$c.", ";
							  }
							 /*$str="";
							  foreach($str1 as $c){
							  
							 
							  $str=$str.$c.", ";
				               
				        }   */ 
						echo $str;
              
              
                        ?>
                                              
                                              </span>
                                          </div>
                                       </div>
                                      </div>
                                      
                                      
                                      
									
									<div class="row" style="text-align:left; margin-top:15px;" >
                                       <div class="col-lg-12 ">
                                          <div class="post-des mt-3">
                                             <span style="color:#fff" >Job Description:  </span><span style="color:#ffcd01" class="show-read-more"><?php //echo $row['description'] ;
 $str = $row['description'];
$pieces = explode("\n", $str);
foreach($pieces as $element)
{
echo $element."<br/>";
}        
                                             
                                             ?></span>
                                          </div>
                                       </div>
                                      
                                    </div>
                           
                           
                           	<div class="row" style="text-align:left; margin-top:15px;" >
                                       <div class="col-lg-12 ">
                                          <div class="post-des mt-3">
                                             <span style="color:#fff" >Venue:  </span><span style="color:#ffcd01" class="show-read-more"><?php //echo $row['description'] ;
 $str = $row['venue'];
$pieces = explode("\n", $str);
foreach($pieces as $element)
{
echo $element."<br/>";
}        
                                             
                                             ?></span>
                                          </div>
                                       </div>
                                      
                                    </div>
                           
									<div class="row" style="text-align:left; margin-top:15px;" >
                                       <div class="col-lg-12 ">
                                          <div class="post-des mt-3">
                                             <span style="color:#fff" >Skills:  </span><span style="color:#ffcd01"><?php echo $row['skills'] ;?></span>
                                          </div>
                                       </div>
                                      
                                    </div>
                                 </div>
								 
                                 <!--col-6--->
                              </div>
                              <!---row----->
							  <div class="row jobpost-row-homesearch-footer"style="margin-top:15px;">
                                 <div class="col-lg-12">
                                    <div class="post-title jobpost-title">
                                     
											<span  class="pull-left" style="font-size:11px; color:#fff;"><?php echo $row['date'] ;?></span>
									   
                                    </div>
                                 </div>
                              </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
			
        </div>
		 <?php
	}
  ?>					  
 
	
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

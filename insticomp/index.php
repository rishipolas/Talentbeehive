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
  <title>Talent Beehive</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <!--link href="img/favicon.png" rel="icon"-->
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <!--link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet"-->

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->

  <link href="style-home.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">

  </head>

<body>

  <!--==========================
  Header
  ============================-->
    <header id="header">
  
   <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="#"><img src="../img/works/talent.png" height="45px" width="200px" alt=""></a></div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
                       
          <ul class="nav navbar-nav navbar-right othr">
          <li class="line"></li>
          <li> <a href="#about" ><span>About us</span></a></li>
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
               
       
    
	
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
 <section id="hero">
  
    
      <div class="hero-container contOtrBlk row">
            
            <div class="col-xs-12 col-sm-6 col-md-6 mt-10">
                <div class="contBlk">
                    <div class="icnBlk">
                       <img src="../img/employer.png" alt="Jobseeker" height="100px">
                    </div>
                    <h2 class="h2">Company</h2>
                    <div class="clearfix">
                      <div class="btnBlk"> <a href="company-register.php" class="btn witBorBtn"> Employers</a> </div>
                    </div>

                   </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 mt-10">
           
                <div class="contBlk">
                   <div class="icnBlk"> <img src="../img/job-seeker.png" alt="Jobseeker" height="100px" ></div>
              <h2 class="h2">Institute</h2>
                     <div class="clearfix">
                        <div class="btnBlk"> <a id="jobseekerLink" href="institute_registration.php" class="btn witBorBtn"> Register</a> </div>
                     </div>
                </div>
              
            </div>
			<div class="col-xs-12 col-sm-12">
			<h2 style="color:#fff">Talent Beehive is a new trend of searching Jobs and Opportunities,Waiting for you to</h2>
            <h2 style="color:#FFCD01" class="h1">Express yourself through video resume </h2>
			</div>
		
        </div>
							  
 
	
  </section><!-- #hero -->
  
  <main id="main">
  
      <!--==========================
      Services Section
    ============================-->
	
	
	  <!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Job Seekers</h3>
            <p class="cta-text">Show off your personality, professionalism, and enthusiasm, Discuss your qualifications, experience, accomplishments, and goals, Quickly and effectively show employers how you can benefit their company with Your Video Resume </p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="candidate-login.php">Apply Now</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->


    <!--==========================
      About Us Section
    ============================-->
  <section id="about">
      <div class="container">
        <div class="row about-container">

        
            <h2 class="title">About Talent Beehive</h2>
            <p>
            Talent Beehive is a platform which gives you an opportunity to upload video resume about your
convincing candidature which will help to bridge gaps in between requirements from various
industries and jobseekers
            </p>
              <div class="col-lg-6 content order-lg-1 order-2">
        
            <div class="icon-box wow fadeInUp">
              <div class="icon"><i class="fa fa-play fa-2x"></i></div>
              <h4 class="title">Video Resume</h4>
              <p class="description">Video Resume is a New Way to Express your Self in Front of Recruiters.<br>Be a part of digitalization world,By Sharing video Resume. </p>
            </div><br>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-user"></i></div>
              <h4 class="title">Easy Shortlisting</h4>
              <p class="description">Get Shortlisted in easy way, Directly go through company rounds.<br>Get placed on the desired jobs ment for you.</p>
            </div><br>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-bar-chart"></i></div>
             <!-- <h4 class="title"><a href="">Easy JobPost</a></h4>-->
              <h4 class="title">Easy JobPost</h4>
              <p class="description">Get job posted in a easy and safe way. </p>
            </div>

          </div>


              <div class="col-lg-6 content order-lg-1 order-2">
        
            <div class="icon-box wow fadeInUp">
              <div class="icon"><i class="fa fa-shopping-bag"></i></div>
              <h4 class="title">Shared Profile</h4>
              <p class="description">Shared profile is the one option that can create a  database of quality resumes automatically as the interested candidates will post for particular job. </p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-photo"></i></div>
              <h4 class="title">Application Status Udpate</h4>
              <p class="description">Candidates can also view their Status of application.<br>
              Company can also view their status update for the candidates who applied for particular post.</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-bar-chart"></i></div>
              <h4 class="title">candidate Share profile</h4>
              <p class="description">Candidate can Share their profile even if it is out of their box.</p>
            </div>

          </div>

         
        </div>

      </div>
    </section><!-- #about -->
    <!--==========================
     

   
  

    <!--==========================
      Portfolio Section
    ============================-->
	 
    <section id="portfolio">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Employers</h3>

        </div>
       
	   
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
    </section><!-- #portfolio -->

    

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Contact</h3>
         
        </div>
      </div>

    

      <div class="container wow fadeInUp">
        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-4">

            <div class="info">
             

              <div>
                <i class="fa fa-envelope"></i>
                <p>info@talentbeehive.com</p>
              </div>

              <div>
                <i class="fa fa-phone"></i>
                <p>+91-8623804382</p>
              </div>
            </div>

          

          </div>

          <div class="col-lg-6 col-md-8">
		  					<?php
			if(isset($_POST['submit']))
                    {
                       $name=$_POST['name'];
                        $contact=$_POST['contact'];
						$from=$_POST['email'];
						$subject="Mail From '$name  $contact' ";
						$message=$_POST['message'];
						$to='info@talentbeehive.com';
						$header .= "MIME-Version: 1.0"."\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $header="From: <$from> \r\n";
        $header.='Cc: abhijeets@talentbeehive.com'." \r\n";
        $header .= 'Bcc:sushantk6158@gmail.com'." \r\n";
        $header .= 'Bcc:palalok1@gmail.com'." \r\n";
        
        
                       if(mail ($to,$subject,$message,$header))
                       {
                      
                           echo ("<SCRIPT LANGUAGE='JavaScript'>
                             window.alert('Success! Your Message was Sent Successfully.')
	                   window.location.href='index.php';
	                      </SCRIPT>");
                      
                        }
                        else
                        {
                       
                          echo ("<SCRIPT LANGUAGE='JavaScript'>
                             window.alert(' Sorry there was an error sending your form.')
	                   window.location.href='index.php';
	                      </SCRIPT>");
                       
                 
                    }
                   }
                   ?>	
						
            <div class="form">
              <form  action="index.php" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" pattern="[a-z,A-Z\s]{3,50}" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars"  required />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" pattern="[a-zA-Z0-9]+\.?[a-zA-Z0-9]+@[A-Za-z0-9.-]+\.[a-z]{2,3}"  id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required/>
                  <div class="validation"></div>
                </div>
				 <div class="form-group">
                  <input type="number" class="form-control" name="contact" pattern="[6-9]{1}[0-9]{9}" placeholder="Your Contact Number" data-msg="Please enter a valid Number" required />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" required></textarea>
                </div>
                <div class="text-center"><button name="submit" type="submit">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>

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
       Copyright  &copy;talentbeehive.com 2017
      </div>
      <div class="credits">
       
       
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

  <!-- Contact Form JavaScript File -->
  <!--script src="../contactform/contactform.js"></script-->

  <!-- Template Main Javascript File -->
  <script src="../js/main.js"></script>
  <script src="../js/read-more.js"></script>
  
  
</body>
</html>

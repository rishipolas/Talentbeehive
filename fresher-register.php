<?php

require_once './config1.php';
if (isset($_POST["sub"])) {
	 require_once "phpmailer/class.phpmailer.php";
	 
		$name =  $_POST['name'];
		$email =  $_POST['email'];
		$contact=$_POST['mcontact']."-".$_POST['cnum'];
		//$contact=$_POST['contact'];
		$pass =  $_POST['pass'];
		$cpass = $_POST['cpass']; 
		$state=  $_POST['state'];
		$city=  $_POST['city'];
		//$qualification =  $_POST['qualification'];
		
		date_default_timezone_set("Asia/Kolkata");
	     $dt=date("d-m-y")."/".date("h:i:sa");
	     	 
//echo 	$name."-".$email."-".$contact."-".$pass."-".$cpass."-".$location."-".$qualification;
$sql = "SELECT * from candidate where email = '".$email."'";
//$sql = "select count(*) count from candidate where email='".$email."'";
try {
//code to be executed

	$result = mysqli_query($DB, $sql);
	$res = mysqli_num_rows($result);
	
	    
		if ($res == 1) {
		
		echo '<script type="text/javascript">
		alert("Email exist");
		</script>';

		/* echo "
<script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
	 swal(Oops,'Email Exist please try again...!!', 'error') 

</script>"; */
		
	
      $msgType = "warning";
	}
      else
      {
		  	
		if($pass == $cpass)
	     {
			  $insert = "INSERT INTO candidate (id, name, email,contact,pass,cpass,state,city,date_time) 
			  VALUES (null, '$name', '$email', '$contact','$pass', '$cpass', '$state','$city','$dt')";
              
			  
	            if ($DB->query($insert) === TRUE) {
            
    	       /*   echo '<script type="text/javascript">
		       alert("Account Created Successfully!!");
		        </script>'; */
				
			   $to = $email;
         $subject = "Your Registration Verification";
         
          $message = '<!DOCTYPE html>
<html><head></head><body>
<div style="margin:40px;">

                <title><b>Email Verification</b></title>
                </head>
                <body>';
        $message .= '<b>Dear ' . $name . ',</b><br><br>';
               
        $message .= '<p>Welcome to TalentBeehive.com, One stop solution to Search, Find and Apply <br>jobs online.
Where companies and recruiter’s appreciating new ways of easy<br> shortlisting.
Get your profile highlighted by uploading your video profile and <br>convince employer’s about suitability of your profile.
<br><br>
<div style="border:2px solid black;padding:10px;width:400px;height:150px;padding:20px;margin-left:30px;">
<div style="font-size:25px;color:red;"><marquee>Registration Link</marquee></div><a href="www.talentbeehive.com/activatecandidate.php">Click here</a> &nbsp;to complete your registration process on talentbeehive.com and start getting notified for suitable jobs.<br><br>
Best Regards<br>
Team Talent Beehive<br><br>
Have a question? E-mail at <a href="#">info@talentbeehive.com</a><br></div><br><br>
<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;">Recruiters may try to contact you at</div>
<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;"><b></b>Email Address: <a href="#">'.$email.'</a></div>
<div style="border:1px black;padding:10px;width:250px;height:10px;background-color:#EBEDEF;"><b></b>Contact Number:'.$contact.'</div><br><br>



<div style="padding:20px;font-size:12px;width:500px;height:500px;">
This is to acknowledge that you have registered as a candidate with Talent Beehive, have agreed to abide to the terms of use and ourprivacy commitment,<br> </div>

</div>';
        $message .= "</body></html>";
        
         
      
       $header .= "MIME-Version: 1.0"."\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
       $header .= 'From:TALENT BEEHIVE <admin@talentbeehive.com>'."\r\n";
        $header .= 'Cc:info@talentbeehive.com'." \r\n";
        $header .= 'Bcc:sushantk6158@gmail.com'." \r\n";
        $header .= 'Bcc:palalok1@gmail.com'." \r\n";
        $header .= 'Bcc:abhijeets@talentbeehive.com'." \r\n";
          
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
          echo "
<script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
         title: 'Check your email for verification!! Also check your SPAM',
       text: 'Account Created Successfully!!',
       type: 'success',
}, function(isConfirm) {
     document.location.href='candidate-login.php'
});
});

</script>";

           
        

         }else {
            echo "
<script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
	 swal(Oops,'Message could not be sent...!!', 'error') 

</script>";
         }
				}
	  else 
	  {
        $msg = "Failed to create User";
        $msgType = "warning";
       }
    }
    
		else{
	  echo "
<script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
	 swal(Oops,'password couldnt match please try again...!!', 'error') 

</script>"; 
     }
	  }
	  } catch (Exception $ex)
  {
    echo $ex->getMessage();
  }
        
	
	
	
}
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
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
<script src="jquery.min.js"></script>
  <script type="text/javascript">
$(document).ready(function(){


    $('#state').on('change',function(){		
        var stateID = $(this).val();
		
		//alert (qualificationID);
		
        if(stateID){
            $.ajax({
                type:'POST',
                url:'locationData.php',		
                
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                    
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>');
           
        }
    });
 
});

//End script

</script>
  
</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
  
   <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="index.php"><img src="img/works/talent.png" height="45px" width="200px" alt=""></a></div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
                       
          <ul class="nav navbar-nav navbar-right othr">
          <li class="line"></li>
          <!--li> <a href="#about" ><span>About us</span></a></li-->
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
    	<div class="row mt-10">
    	    <div class="col-xs-12 col-lg-8 col-md-offset-2 mainw3-agileinfo form wow pulse animated">
        	    <div class="form-wrap">
                  
                    <form role="form" action="fresher-register.php" method="POST" id="login-form" autocomplete="off">
					<div class="col-md-12 form-group">
					     <label>Candidate Name<span class="req">*</span> </label>
					    <input type="text" name="name" pattern="[a-z,A-Z\s]{3,50}" title="should contain minimum 3 characters and maximum 30 characters, special characters are not allowed" placeholder="Candidate Name" required>
					</div>
                      <div class="col-md-6 form-group">  
					  <label>Contact Email<span class="req">*</span> </label>
						<input type="email" name="email" pattern="[a-zA-Z0-9]+\.?[a-zA-Z0-9]+@[A-Za-z0-9.-]+\.[a-z]{2,3}" title="Must contains characters@characters.domain" placeholder="Contact Email / username" required>
						 <!--pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" -->
						 </div>
						 <div class=" col-md-6 form-group" style="padding:0px;">
						 <label>Contact Number<span class="req">*</span> </label>
						  <div class="col-md-3" style="margin-top:25px;">	
							<input id="exampleInputName" type="text" name="mcontact" value="+91" readonly="" required>
		 				  </div>
		 				  <div class="col-md-9">	
							<input id="exampleInputMobile" type="text" name="cnum" pattern="[6-9]{1}[0-9]{9}" title="should contain exact 10 digit, start with range between 6-9." placeholder="Contact Number" required>
		 				</div>
		 				  
						 
					</div>
				 <?php
    
    
    
    $query = $DB->query("SELECT * FROM state");
    
   
    $rowCount = $query->num_rows;
    ?>	
                      <div class="col-md-6 form-group">
					     <label>State<span class="req">*</span> </label>
					     <select id="state"  name="state" placeholder="state" style="color:#FFCD01;" required>
		 <option value="" disabled selected>Select state</option>
        
 <?php
        if($rowCount > 0){
            while($getState = $query->fetch_assoc()){ 
            
            
            
                echo '<option value="'.$getState['id'].'">'.$getState['statename'].'</option>';	
            }
        }else{
            echo '<option value="">State not available</option>';
        }
        ?>
 </select>
       
					</div>
					
					
					<div class="col-md-6 form-group">
					     <label>City<span class="req">*</span> </label>
					    <select  id="city" name="city" placeholder="city" style="color:#FFCD01;" required>
	  <option value="" disabled selected>Select state first</option>		
 </select>
       
					</div>
                       
						<div class=" col-md-6 form-group">
						<label>Password<span class="req">*</span> </label>
						<input type="Password" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="pass" placeholder="Password" required>
						 
					</div>
					<div class=" col-md-6 form-group">
						<label>Confirm Password<span class="req">*</span> </label>
						<input type="Password" id="cpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="cpass" placeholder="Confirm Password" onchange="checkPasswordMatch();" required>
						 
					</div>
						
					<div class="registrationFormAlert" id="divCheckPasswordMatch"></div>	
                        <button class="button button-block" type="submit" name="sub"/>Register</button> 
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
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>

  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  
  <!-- Password Matching Javascript  -->
     <script>
               function checkPasswordMatch() {
    var pass = $("#pass").val();
    var cpass = $("#cpass").val();

    if (pass != cpass)
        $("#divCheckPasswordMatch").html("Passwords do not match!").css('color', 'red');
    else
        $("#divCheckPasswordMatch").html("Passwords match.").css('color', 'green');
}
$(document).ready(function () {
   $("#cpass").keyup(checkPasswordMatch);
});
	</script>
  
</body>
</html>

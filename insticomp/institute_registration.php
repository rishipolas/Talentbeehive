<?php
include_once("config1.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Talent beehive</title>
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
    <link href="css/bootstrap-multiselect.css" rel="stylesheet">
  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/login.css" rel="stylesheet">
  <link href="../css/responsive.css" rel="stylesheet">
  <script type="text/javascript" src="../javascript.js"></script>
  <script src="../js/jquery.min.js"></script>
<script src="../jquery.min.js"></script>
   <script type="text/javascript">
$(document).ready(function(){
   $('#qualification').multiselect({
          buttonWidth: '350px',
          maxHeight: 300,
         
        });
   
    $('#course').on('change',function(){
       
    });

    $('#state').on('change',function(){   
        var stateID = $(this).val();
    
    //alert (qualificationID);
        if(stateID){
            $.ajax({
                type:'POST',
                url:'../locationData.php',   
                
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
<?php //include_once("institute_header.php"); ?>

<header id="header">
  
   <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="index.php"><img src="../img/works/talent.png" height="45px" width="200px" alt=""></a></div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
                       
          <ul class="nav navbar-nav navbar-right othr">
          <li class="line"></li>
          <!--li> <a href="#about" ><span>About us</span></a></li-->
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
	
  </header>
<!--==========================
    Hero Section
  ============================-->
  <section id="hero">
  
    
      <div class="hero-container contOtrBlk row">

          <div class="container">
    	<div class="row mt-10">
    	    <div class="col-xs-12 col-md-8 col-lg-8 col-md-offset-2 mainw3-agileinfo form wow pulse animated">
        	    <div class="form-wrap">
                  
                    <form name="myForm" role="form" action="institute_email.php"  method="post" id="login-form" autocomplete="off" enctype="multipart/form-data">
                       <div class="col-lg-12 form-group">
					       <label>Institute Name<span class="req">*</span> </label>
                           <input name="name" type="text" pattern="[a-zA-Z]+\.?[a-z,A-Z\s]{3,50}" title="should contain minimum four characters and maximum 50 characters, Numbers are allowed but special characters are not allowed" placeholder="Institute Name" required="">
					</div>
						
						
                        <div class="col-lg-12 field-wrap">
                          <label>Email<span class="req">*</span> </label>
                          <!--<input type="email" name="email" id="email" placeholder="info@talentbeehive.com" onKeyUp="validateemail()" required>-->
                          <input type="email" name="email" pattern="[a-zA-Z0-9]+\.?[a-zA-Z0-9]+@[A-Za-z0-9.-]+\.[a-z]{2,3}" title="Must contains characters@characters.domain" placeholder="info@talentbeehive.com" required>
						  <span style="color:#ffcd01;" id="emailspan"></span> 
						  <script>  
								function validateemail()  
								{  
								var x=document.myForm.email.value;  
								var atposition=x.indexOf("@");  
								var dotposition=x.lastIndexOf(".");  
								if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
								 msg="Please enter a valid e-mail address"; 
								}  
								else{  
								msg="";
								}  
								document.getElementById('emailspan').innerText=msg;  
								}  
						</script>
                        </div>
                        
  			<div class="col-md-6 form-group">
					     <label>Password<span class="req">*</span> </label>
						<input name="password" id="password"  type="password" placeholder="Password" required="" onKeyUp="validate1()">
						 <span style="color:#ffcd01;" id="mylocation1"></span>
						 <script>
							function validate1() {  
							var pass=document.myForm.password.value;
							var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
							if(strongRegex.test(pass)){  
							msg="Pattern Matched"; 
							}  
							else{  
							msg="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
							}  
							document.getElementById('mylocation1').innerText=msg;  
							}
						 </script>				 
						 </div>
						 <div class=" col-md-6 form-group">
						<label>Confirm Password<span class="req">*</span> </label>
						<input name="cpassword" id="cpassword" type="password" placeholder="Confirm Password" required="" onKeyUp="validate1(); validate();">
						<span style="color:#ffcd01;" id="mylocation"></span> 
						 <script>
						 function validate() {  
							var pass=document.myForm.password.value;
							var cpass=document.myForm.cpassword.value; 
							if(pass==cpass){  
							msg="Password Matched";  
							}  
							else{  
							msg="Not Matched";  
							}   
							document.getElementById('mylocation').innerText=msg;
							} 
						 </script>
					</div>
					
                       <!-- <button type="submit" class="button-block col-lg-12" name="btnregister" />Register</button> -->
                       <button class="button button-block" name="btnregister" />Register</button> 
                    </form>
                   
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
    
			
        </div>
							  
 
	
  </section><!-- #hero -->
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
  </footer>
  <script src="../vendor/jquery/jquery.min.js"></script>
      <script src="../vendor/popper/popper.min.js"></script>
      <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <script src="../vendor/chart.js/Chart.min.js"></script>
      <script src="../vendor/datatables/jquery.dataTables.js"></script>
      <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="../js/sb-admin.min.js"></script>
      <!-- Custom scripts for this page-->
      <script src="../js/sb-admin-datatables.min.js"></script>
      <script src="../js/sb-admin-charts.min.js"></script>
      <script src="../js/dropdown1.js"></script>
      <script src="../js/show-hide-collapse.js"></script>
      <script src="../js/bootstrap-multiselect.js"></script>
      
      
      <script>

      
      
 </body>
 </html>
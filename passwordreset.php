<?php
	if(isset($_POST["reset-password"])) {
		$conn = mysqli_connect("166.62.10.54", "roottalent", "beehive@root", "socialuser");
		
		$sql = "UPDATE `socialuser`.`users` SET `password` = '" . md5($_POST["password"]). "' ,`cpassword` = '" . ($_POST["cpassword"]). "' WHERE `users`.`cname` = '" . $_GET["name"] . "'";
		
		$result = mysqli_query($conn,$sql);
		$success_message = "Password is reset successfully.";
		
	}
?>
<link href="demo-style.css" rel="stylesheet" type="text/css">
<script>
function validate_password_reset() {
	if((document.getElementById("password").value == "") && (document.getElementById("cpassword").value == "")) {
		document.getElementById("validation-message").innerHTML = "Please enter new password!"
		return false;
	}
	if(document.getElementById("password").value  != document.getElementById("cpassword").value) {
		document.getElementById("validation-message").innerHTML = "Both password should be same!"
		return false;
	}
	
	return true;
}
</script>
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
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <title>Jonaki | Job Board Template</title>
               <meta name="description" content="company is a free job board template">
               <meta name="author" content="Ohidul">
               <meta name="keyword" content="html, css, bootstrap, job-board">
               <meta name="viewport" content="width=device-width, initial-scale=1">
               <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
               <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
               <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
               <link rel="icon" href="favicon.ico" type="image/x-icon">
               <link rel="stylesheet" href="css/normalize.css">
               <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
               <link rel="stylesheet" href="css/fontello.css">
               <link rel="stylesheet" href="css/animate.css">
               <link rel="stylesheet" href="css/bootstrap.min.css">
               <link rel="stylesheet" href="css/owl.carousel.css">
               <link rel="stylesheet" href="css/owl.theme.css">
               <link rel="stylesheet" href="css/owl.transitions.css">
               <link rel="stylesheet" href="style.css">
               <link rel="stylesheet" href="responsive.css">
               <script src="js/vendor/modernizr-2.6.2.min.js"></script>
            </head>
            <body>
              
               <!-- Body content -->
               <div class="header-connect">
                  <div class="container">
                     <div class="row">
					    <div class="col-lg-3">
                        <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
						</div>
		
                        
                     </div>
                  </div>
               </div>
               
                <div class="bg-image">
                  
                  <div class="container slider-content">
                     <div class="row">
					   
                        <div class="col-lg-6 col-md-offset-3 col-sm-12">
                           <div class="search-form wow pulse" data-wow-delay="0.8s">
                              <h1 class="text-center h1-login text-black">Reset Password</h1>
                              <div class="mainw3-agileinfo form">
							  
                                 <form name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_password_reset();">
								 <?php if(!empty($success_message)) { ?>
							<div class="success_message"><?php echo $success_message; ?></div>
							<?php } ?>

							<div id="validation-message">
						<?php if(!empty($error_message)) { ?>
						<?php echo $error_message; ?>
						<?php } ?>
						</div>
								 
                                    <div class="field-wrap">
                                       <input type="password" name="password" id="password" class="clr-place" placeholder="*Enter Password">
                                    </div>
                                     <div class="field-wrap">
                                       <input type="password" name="cpassword" id="cpassword" class="clr-place" placeholder="*Confirm Password">
                                    </div>
                                   
									
                             
									<div><input type="submit" name="reset-password" id="reset-password" value="Submit" class="btn btn-info btn-login text-center btn-lg form-submit-button"></div>
								
									
                                 </form>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
               <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
               <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
               <script src="js/bootstrap.min.js"></script>
               <script src="js/owl.carousel.min.js"></script>
               <script src="js/wow.js"></script>
               <script src="js/main.js"></script>
            </body>
         </html>
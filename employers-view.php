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
              <title>Talent Beehive</title>
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
			     <link href="css/sb-admin.css" rel="stylesheet">
               <link rel="stylesheet" href="responsive.css">
               <script src="js/vendor/modernizr-2.6.2.min.js"></script>
            </head>
            <style>
.dropbtn {
    background-color:#696969;
    color: #ffcd01;
    padding: 14px;
    font-size: 15px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #696969;
}

.dropdown {
    float: right;
    position: relative;
    display: inline-block;
    
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #696969;
    min-width: 120px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    right: 0;
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}
</style>
            <body style="overflow:scroll">
              
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
                  <div class="row nav-tag" >
				     <h4 class="nav-title">Employers</h4>
				  </div>
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
			<div class="col-md-3 col-sm-6 col-xs-12 gallery-item">
			
                                        <div class="employer-item">
                                            <div class="employer-image">
											
											<img alt="  <?php echo $row['cname']; ?>" src="<?php echo 'uploads/' .$row['clogo']; ?>" class="avatar avatar-full photo" width="250" height="250">
											
											</div>
										<!--<h3 class="employer-title"><a href="#gallery<?php echo $i;?>" data-toggle="modal" data-target="#modalGallery<?php echo $i;?>">	 -->
						<h3 class="employer-title">					
                                            <?php echo $row['cname']; ?></a></h3>
                                            <div class="employer-locations">
											</div>
											
					<?php
				  $q1="select count(*) as maxnum from functionality where name='".$row['cname']."'";
				  $result1=mysqli_query($DB,$q1);
				  $num1=mysqli_num_rows($result1);
				   $row1=mysqli_fetch_array($result1);
				  ?>						
											
                                           <!-- <a class="total-jobs" href="candidate-login.php"><strong class="number"><?php echo $row1['maxnum']; ?></strong> Job Post</a>-->
                                        </div>
                                    </div>
                                    
											
				
                                           
			    
		
			
		  <div class="modal fade" id="modalGallery<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="modalGalleryLabel<?php echo $i;?>" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#FFC107; color:#000; border-bottom:2px solid #000;">
            <h5 class="modal-title" id="exampleModalLabel" >Company Profile</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close" style="margin-top: -21px;">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
		     <div class="card mb-3">
            
			
			
            <div class="card-body">
              <div class="row">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:19px" >
                                <tbody >
								
                                <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Name </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['cname']; ?></td>
                                 
                                </tr>
                              
                                   <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Industry Type</strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['type']; ?></td>
                                 
                                </tr>
								<tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Website</strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['cweb']; ?></td>
                                 
                                </tr>
								<tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Conatact Person </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['person']; ?></td>
                                 
                                </tr>
								
								<tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Contact Email</strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['email']; ?></td>
                                 
                                </tr>
                               <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Location </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['cloc']; ?></td>
                                 
                                </tr>
								
                               
                            
                                
                              </tbody></table>
                              
                              
                    
                              
              </div>
            </div>
           
          </div>
		  </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
           
          </div>
        </div>
      </div>
	</div> <!-- /.modal -->	
			
			
	<?php
		}
		}
		else
		{
		?>
<div>
<h3>No</h3>
</div>
<?php	
		}
		?>  		
			
			
			
			
			
            </div> <!--/.row  -->
		
	

	
                     </div>
					 
               </div>
			   
			   
			 
	 
		
		 <div class="footer-last-allpages">
			     <p>© This is official website of TalentBeehive All rights reserved. <span class="pull-right"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@talentbeehive.com">info@talentbeehive.com</a></span></p>
			   </div>
			   <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#FFCD01;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
       <div class="row">
				   <div class="col-lg-1 " ></div>
                   
				<div class=" animatedParent">
					<div class="col-lg-5 mt-5-edit animated fadeInUp slow" >
				        <div class="home-well " >
						 <div class="animatedParent home-company">
                            
							  
						    </div>
						    <h1 class="visible-xs res-login-home">Company</h1>
						<div class="overlay-home ">
						<div class="home-button ">
					<a class="btn btn-success btn-lg"  href="company-login.php">Login</a>
                    <a class="btn btn-info btn-lg"  href="company-register.php">Signup</a>
						</div>
						</div>
						
						
					
</div>

					</div>
					</div>
					<div class=" animatedParent">
					<div class="col-lg-5 mt-5-edit animated fadeInUp slow" >
				        <div class="home-well " >
						 <div class="animatedParent home-institute">
                            
							  
						    </div>
						    <h1 class="visible-xs ">Candidate</h1>
						<div class="overlay-home">
						<div class="home-button ">
					<a class="btn btn-success btn-lg"  href="candidate-login.php">Login</a>
                    <a class="btn btn-info btn-lg"  href="fresher-register.php">Signup</a>
						</div>
						</div>
						
						
					
</div>

					</div>
					</div>
					<div class="col-lg-1 " ></div>
					
					
					
        </div>
		<div class="row visible-lg">
				   <div class="col-lg-1 " ></div>
					
					 <div class="col-lg-5 " >
					 
					 <h1 class="animated bounceInDown text-center">Company</h1>
					
					 </div>

					 <div class="col-lg-5 " >
					 
					 <h1 class="animated bounceInDown text-center">Candidate</h1>
					
					 </div>
					 <div class="col-lg-1 " ></div>
					
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
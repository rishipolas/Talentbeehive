<?php
session_start();
include ('../config1.php');


if(isset($_POST['login'])){
	
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	$result=mysqli_query($DB,"select * from users where email='$email' and password='$password' ") or die("sorry this is wrong query".mysql_error());
	
	$row=mysqli_fetch_array($result);
	
		if( $row['email']==$email && $row['password']==$password ){
					
				 if($row['status']=='Approved')	{
					 
					  $_SESSION['email']=$email;
					  
					   $name=$row['cname'];  //session start for company name
					   $_SESSION['name']=$name;
					   
					   $id=$row['id'];      // session start for company ID
					   $_SESSION['id']=$id;
					   
					   
					  $result2=mysqli_query($DB,"select * from `users` where email='$email'  ") or die("sorry this is wrong query".mysql_error());
	
	                     $row2=mysqli_fetch_array($result2);	   
					   
					   if($row2['email']==$email){
								   if($row2['type']==NULL && $row2['cinfo']==NULL && $row2['clogo']==NULL ){
											 
											/* echo ("<SCRIPT>
	  										 window.alert('Successful login')
	   											window.location.href='company_profile.php';
	  										 </SCRIPT>");*/
	  										 
echo "	  										 							
<script type='text/javascript' src='../js/jquery-latest.js'></script>
    <script src='../js/sweetalert.min.js'></script>
    <link href='../css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
         title: 'Successful login!',
       text: 'You clicked the Ok button!',
       type: 'success',
}, function(isConfirm) {
     document.location.href='company_profile.php'
});
});

</script>";
							
											
											
											
											   
										   }
										   else{
							   
											/*echo ("<SCRIPT>
	  										 window.alert('Successful login')
	   											window.location.href='company_profile.php';
	  										 </SCRIPT>");*/
	  										 
	  										 							 							echo "
<script type='text/javascript' src='../js/jquery-latest.js'></script>
    <script src='../js/sweetalert.min.js'></script>
    <link href='../css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
         title: 'Successful login!',
       text: 'You clicked the Ok button!',
       type: 'success',
}, function(isConfirm) {
     document.location.href='company_profile.php'
});
});

</script>";
										   }
						   
					   }
					   
					   
					   
					 }
					 else{
						/* echo ("<SCRIPT>
	  					window.alert('Your Account has not  been Activated')
	   					window.location.href='company-login.php';
	  					</SCRIPT>");*/
	  					
	  				echo "
<script type='text/javascript' src='../js/jquery-latest.js'></script>
    <script src='../js/sweetalert.min.js'></script>
    <link href='../css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
      title: 'Oops',
       text: 'Your Account has not  been Activated',
          type: 'error',
}, function(isConfirm) {
     document.location.href='company-login.php'
});
});

</script>";
		
	  					
								 
					 }
		}	
	else{
		/*echo ("<SCRIPT>
	  	window.alert('username and password are incorrect')
	   	window.location.href='company-login.php';
	  	</SCRIPT>");*/
	  	
	  		echo "
<script type='text/javascript' src='../js/jquery-latest.js'></script>
    <script src='../js/sweetalert.min.js'></script>
    <link href='../css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
       title: 'Oops',
       text: 'username and password are incorrect',
         type: 'error',
}, function(isConfirm) {
     document.location.href='company-login.php'
});
});

</script>";
	
	     }
		
		
		
	}
	
	
	
	


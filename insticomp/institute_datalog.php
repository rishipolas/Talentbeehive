<?php
session_start();
include ('config1.php');


if(isset($_POST['login'])){
	
	$email=$_POST['email'];
	$cpassword=$_POST['cpassword'];
	
	$result=mysqli_query($DB,"select * from institute_registration where email='$email' and confirm_password='$cpassword' ") or die("sorry this is wrong query".mysql_error());
	
	$row=mysqli_fetch_array($result);
	
		if( $row['email']==$email && $row['confirm_password']==$cpassword ){
					
				 if($row['status']=='Approved')	{
					 
					  $_SESSION['email']=$email;
					  
					   $name=$row['institute_name'];  //session start for institute name
					   $_SESSION['name']=$name;
					   
					   $id=$row['id'];      // session start for institute ID
					   $_SESSION['id']=$id;
					   
					   
					  $result2=mysqli_query($DB,"select * from `institute_registration` where email='$email' ") or die("sorry this is wrong query".mysql_error());
	
	                     $row2=mysqli_fetch_array($result2);	   
					   
					   if($row2['email']==$email){
								   if($row2['qualification']==NULL || $row2['course']==NULL ){
											 
											
											
										/* 	echo ("<SCRIPT>
	 						  				window.alert('Successful login')
	  										window.location.href='candidate-complete-profile.php';
	   										</SCRIPT>"); */
	   										
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
     document.location.href='complete_instprofile.php'
});
});

</script>";
											
										
											   
										   }
										   else{
							   
											/*echo ("<SCRIPT>
	 						  				window.alert('Successful login')
	  										window.location.href='candidate-fresh_profile.php';
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
     document.location.href='institute_profile.php'
});
});

</script>";
							
										   }
						   
					   }
					   
					   
					   
					 }
					 else{
					 
							 echo ("<SCRIPT>
	 						  window.alert('Your Account has not  been Activated')
	  						window.location.href='institute_login.php';
	   						</SCRIPT>");
						 
								
					 }
		}	
	else{
		
		echo ("<SCRIPT>
	   window.alert('username and password are incorrect')
	   window.location.href='institute_login.php';
	   </SCRIPT>");		
	
	     }
		
		
		
	}
	
	
	
	


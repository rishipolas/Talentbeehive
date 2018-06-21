<?php
session_start();
include ('config1.php');


if(isset($_POST['login'])){
	
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	
	$result=mysqli_query($DB,"select * from candidate where email='$email' and pass='$pass' ") or die("sorry this is wrong query".mysql_error());
	
	$row=mysqli_fetch_array($result);
	
		if( $row['email']==$email && $row['pass']==$pass ){
					
				 if($row['Status']=='Approved')	{
					 
					  $_SESSION['email']=$email;
					  
					   $name=$row['name'];  //session start for company name
					   $_SESSION['name']=$name;
					   
					   $id=$row['id'];      // session start for company ID
					   $_SESSION['id']=$id;
					   
					   
					  $result2=mysqli_query($DB,"select * from `candidate` where email='$email'  ") or die("sorry this is wrong query".mysql_error());
	
	                     $row2=mysqli_fetch_array($result2);	   
					   
					   if($row2['email']==$email){
								   if($row2['qualification']==NULL || $row2['name']==NULL || $row2['state']==NULL ){
											 
											
											
										/* 	echo ("<SCRIPT>
	 						  				window.alert('Successful login')
	  										window.location.href='candidate-complete-profile.php';
	   										</SCRIPT>"); */
	   										
											echo "
<script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
         title: 'Successful login!',
       text: 'You clicked the Ok button!',
       type: 'success',
}, function(isConfirm) {
     document.location.href='candidate-complete-profile.php'
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
<script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
         title: 'Successful login!',
       text: 'You clicked the Ok button!',
       type: 'success',
}, function(isConfirm) {
     document.location.href='candidate-fresh_profile.php'
});
});

</script>";
							
										   }
						   
					   }
					   
					   
					   
					 }
					 else{
					 
							 echo ("<SCRIPT>
	 						  window.alert('Your Account has not  been Activated')
	  						window.location.href='candidate-login.php';
	   						</SCRIPT>");
						 
								
					 }
		}	
	else{
		
		echo ("<SCRIPT>
	   window.alert('username and password are incorrect')
	   window.location.href='candidate-login.php';
	   </SCRIPT>");		
	
	     }
		
		
		
	}
	
	
	
	


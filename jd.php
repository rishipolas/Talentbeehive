<?php


session_start();
/*
if( !isset($_SESSION['name'])){
	
	header("Location: company-login.php");
	
}
*/

$con=mysqli_connect('166.62.10.54','roottalent','beehive@root');
//$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'socialuser');
$q="select * from users where email='{$_SESSION['email']}'";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_array($result);

if($row['jd_status']== 0)
{
	/*echo "<script>alert('your account is not activated by admin, so please wait until your account is authorised ')</script>"  ;
	include "company_profile.php";*/

echo "
<script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
         title: 'your account is not activated by admin, so please wait until your account is authorised ',
      
}, function(isConfirm) {
     document.location.href='company_profile.php'
});
});

</script>";
							
					
}
else
{
	/*echo "<script>alert('Here you Go! Now you Can Post Your Requirements And Get Desired employees')</script>";
	
	
	include "jd1.php";*/
	
	
	echo "
<script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
         title: 'Here you Go! Now you Can Post Your Requirements And Get Desired employees ',
      
}, function(isConfirm) {
     document.location.href='jd1.php'
});
});

</script>";
		
	
	
}
//$num=mysqli_num_rows($result);


?>

<?php

session_start();

if(! isset($_SESSION['email']))			
   header('location: candidate-login.php');
$id=$_SESSION['id']	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style>
  #rish{
  width:80px;
  }
  </style>
</head>
<body>
	
	
	
	
	
	    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>		

<?php
					
if(isset($_POST["id"]))  
 {  
      $output = '';  
     include('config1.php');
	 $q="select * from functionality INNER JOIN users ON functionality.name=users.cname WHERE functionality.id='".$_POST["id"]."'";
	 $result=mysqli_query($DB,$q);
	  while($row = mysqli_fetch_array($result))  
      {  
           	
		$getstate=mysqli_query($DB,"select statename  from state where id=".$row['state']);
		$getstatedetails = mysqli_fetch_array($getstate);
		 
		$getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row['city']);
		$getcitydetails = mysqli_fetch_array($getcity);
		

		  $cweb=$row['cweb'];
		  $output = '  
        <table>
        
		<tr>
		<td><p><label><b>Company Name:</b> '.$row['cname'].'</label></p></td>
		</tr>
		<tr>
		<td><p><label><b>Type: </b></label> '.$row['type'].'</p></td>
		</tr>		
		<tr>
		<td><p><label><b>Website: </b></label><a  target="_blank" href="https://'.$cweb.'" >' . $cweb . '</a></p></td>		 
		</tr>
		<tr>
		<td><p><label><b>Job Location: </b></label> '.$row['country'].','.$getstatedetails['statename'].','.$getcitydetails['cityname'].'</p></td>
		</tr>
		<tr>
		<td><p><label><b>Landline No.: </b></label> '.$row['lnumber'].'</p></td>
		</tr>
		</tr>		
		<tr><td> <a id="rish" class="btn btn-default" href="company-shortlist.php?id='.$_SESSION['id'].'">Close</a></td>
		</tr>
		</table>	
          				
		 ';
		
		}
		echo $output;  
	}
		?>
		
		
	<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
	
	
	
		
		
		
	
	
	    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
 
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	
</body>
</html>			
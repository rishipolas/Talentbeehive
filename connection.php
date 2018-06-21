<?php




    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "codexworld";
   
	
	if ( ! @mysqli_connect($host, $username, $password)) {
    die("Connect failed:". mysqli_connect_error());
    
}
else{
	
	if( @mysqli_select_db( $dbname)){
		
	}
	else{
		echo"not connected";
	}
	
}


?>
<html>
  <head>
  <script src="js/sweetalert.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  </head>
</html>
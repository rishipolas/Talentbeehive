<?php

session_start();	

session_destroy();	

/*echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('successfully logout!! ')
	  window.location.href='candidate-login.php';
	  </SCRIPT>");
	  
	  */
//echo "successfully logout <a href='login.php'>login</a>";
/*if(session_destroy()){
    
	
	echo"<html><body><p>Redirect To....</p></body></html>";
    header("refresh:0; url=company-login.php");
	
}
else{
  echo"plzz try again later";
}*/





echo "
<script type='text/javascript' src='../js/jquery-latest.js'></script>
    <script src='../js/sweetalert.min.js'></script>
    <link href='../css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
         title: 'successfully logout!!',
       text: 'click the Ok button!',
       type: 'success',
}, function(isConfirm) {
     document.location.href='institute_login.php'
});
});

</script>";
		


?>
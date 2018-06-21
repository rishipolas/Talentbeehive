<?php

session_start();

session_destroy();

/*echo ("<SCRIPT LANGUAGE='Javascript'>
     window.alert('successfully logout')
     window.location.href='login.php';
     </SCRIPT>");*/
echo "successfully logout <a href='login.php'>login</a>";
/*if(session_destroy()){
    
	
	echo"<html><body><p>Redirect To....</p></body></html>";
    header("refresh:0; url=company-login.php");
	
}
else{
  echo"plzz try again later";
}*/





?>
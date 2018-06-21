<?php

session_start();

session_destroy();

/*echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('successfully logout!! ')
	  window.location.href='company-login.php';
	  </SCRIPT>");
*/

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
     document.location.href='company-login.php'
});
});

</script>";
		
	






?>
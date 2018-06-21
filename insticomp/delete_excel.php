<?php
	$file = $_GET['fpath'];
if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
   echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('File Deleted Successfully...!!!')
	  window.location.href='Attatch_xcel.php';
	  </SCRIPT>");
  }

?>
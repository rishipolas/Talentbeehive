<?php
require_once '../config1.php';
if(isset($_GET['userInput'])){
$cid=$_GET['cid'];
$instid=$_GET['instid'];
$fname1=$_GET['fname'];
$sfile1=$_GET['sfile'];
$fname=$_GET['fname'];
$fname=(string)$fname;
$fname=str_replace(".xls", ".",$fname);
$fname=trim($fname);
    $sfile=$_GET['sfile'];
    $sfile=str_replace(".xls", ".",$sfile);
$sfile=trim($sfile);
    $id=$_GET['userInput'];
    include 'config1.php';
    
    $query1 ="INSERT into shorlist(jid,cid,iid,sid) VALUES('1','$cid','$instid','$id')";
						      mysqli_query($DB,$query1); 
						      echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('shortlisted');
	  window.location.href='ExcelDLL.php?id=$instid&&fname=$fname&&sfile=$sfile&&cid=$cid';
	  </SCRIPT>");
// Include PHPExcel library and create its object
/*require_once 'Classes/PHPExcel.php';
$fpath="excel/$instid/filter/".$fname."xls";
$spath="excel/$instid/shortlist/".$sfile."xls";

$phpExcel = PHPExcel_IOFactory::load($spath);

$sql = "SELECT * FROM student_registration where id='$id'";
$result = $DB->query($sql);
$row1 = $result->fetch_assoc();


// Get the first sheet
$sheet = $phpExcel ->getActiveSheet();


$lastRow=$sheet->getHighestRow();
  $row=++$lastRow;      
  
 $sheet ->getCell('A'.$row)->setValue($row1['id']);
$sheet ->getCell('B'.$row)->setValue($row1['student_name']);
$sheet ->getCell('C'.$row)->setValue($row1['email']);
$sheet ->getCell('D'.$row)->setValue($row1['contact_number']);
$sheet ->getCell('E'.$row)->setValue('ShortListed');

          
  
  
// Remove 2 rows starting from the row 2
//$sheet ->removeRow(2,2);

// Insert one new row before row 2
//->insertNewRowBefore(2, 1);

// Create the PHPExcel spreadsheet writer object
// We will create xlsx file (Excel 2007 and above)
$writer = PHPExcel_IOFactory::createWriter($phpExcel, 'Excel5');

// Save the spreadsheet
$writer->save ($spath); 


//echo $s;*/

/*echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('shortlisted');
	  window.location.href='ExcelDLL.php?id=$instid&&fname=$fname1&&sfile=$sfile1';
	  </SCRIPT>");*/
//header("Location:");

}

//header("Location:ExcelDLL.php");
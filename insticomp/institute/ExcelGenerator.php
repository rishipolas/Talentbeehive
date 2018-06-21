<?php
include('config1.php');
$instid=$_GET['instid'];
$cid=$_GET['cid'];
require_once 'Classes/PHPExcel.php';

date_default_timezone_set("Asia/Kolkata");
$dt=$cid.",".date("d-m-y");
$sfile=$dt.".xls";
$path="./excel/".$instid."/shortlist/$sfile";
$path = str_replace(' ', '', $path);
$path=trim($path);

$getinstitute=mysqli_query($DB,"select institute_name from institute_registration where id=".$instid);
$getinstitutedetails = mysqli_fetch_array($getinstitute);

$excel=new PHPExcel();
$R=1;

 $excel->setActiveSheetIndex(0);
 $styleArray = array(
    'font'  => array(
        'bold'  => true,
        'size'  => 15,
        'name'  => 'Verdana'
    ));
 
 
 $excel->getActiveSheet()->setCellValue('B'.$R, $getinstitutedetails['institute_name'])->getStyle('A1')->getFont()->setBold(true)->setSize(10);
 $excel->getActiveSheet()->getStyle('B'.$R)->applyFromArray($styleArray);
 
$R=3;
 $excel->setActiveSheetIndex(0);
 
 $excel->getActiveSheet()->getColumnDimension('A')->setWidth('10');
$excel->getActiveSheet()->getColumnDimension('B')->setWidth('20');
$excel->getActiveSheet()->getColumnDimension('C')->setWidth('25');
 $excel->getActiveSheet()->getColumnDimension('D')->setWidth('20');
 


 $excel->getActiveSheet()->setCellValue('A'.$R, "IDs")->getStyle('A1')->getFont()->setBold(true);         
$excel->getActiveSheet()->setCellValue('B'.$R, "Name")->getStyle('B1')->getFont()->setBold(true);
$excel->getActiveSheet()->setCellValue('C'.$R, "qualification")->getStyle('C1')->getFont()->setBold(true);
$excel->getActiveSheet()->setCellValue('D'.$R, "Course")->getStyle('D1')->getFont()->setBold(true);
$excel->getActiveSheet()->setCellValue('E'.$R, "City")->getStyle('E1')->getFont()->setBold(true);


$sql="select * from student_registration where id IN (select sid from shorlist where cid='$cid' AND iid = '$instid')"; 

    
   
    
    $result=$DB->query($sql);
    
    if ($result == TRUE) {
      
        
    $R=4;
       
        while($row = $result->fetch_assoc()) {
            
            	$getqualification=mysqli_query($DB,"select qualification from qualification where id=".$row['qualification']);
		$getqualificationdetails = mysqli_fetch_array($getqualification);
		
		$getcity=mysqli_query($DB,"select cityname from city where c_id=".$row['city']);
		$getcitydetails = mysqli_fetch_array($getcity);
		
		$getcourse=mysqli_query($DB,"select course from course where c_id=".$row['course']);
		$getcoursedetails = mysqli_fetch_array($getcourse);
            
             $excel->getActiveSheet()

          ->setCellValue('A'.$R, $row['id'])
           ->setCellValue('B'.$R, $row['student_name'])
             ->setCellValue('C'.$R, $getqualificationdetails['qualification'])
             ->setCellValue('D'.$R, $getcoursedetails['course'])
             ->setCellValue('E'.$R, $getcitydetails['cityname']);
             
             
             
           
           $R++;
           
            
               
        }
        
        
       
       
    
}

$excel = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
$excel->save($path);

echo ("<SCRIPT LANGUAGE='JavaScript'>			          
	         		window.location.href='shortlist_institute_mail.php?instid=".$instid."&& cid=".$cid."';
	                        </SCRIPT>");
   
    


?>


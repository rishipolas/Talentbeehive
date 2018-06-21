<?php
session_start();
include 'config1.php';
require_once 'Classes/PHPExcel.php';
$fname=$_POST['fname'];
$instiid=$_SESSION['id'];
$email=$_SESSION['email'];
$excel=new PHPExcel();




        $specialization="";
        $index1=$index2=$index3="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    //echo ' In Post Method name: ';
    
    $qualification=$_POST["qualification"];
    
   
    
    
    $qualification1= implode(',', $qualification);
    //echo '<script>alert("'.$qualification1.'")</script>';
    $course=$_POST["course"];
    $course1= implode(',', $course);
   // echo '<script>alert("'.$course1.'")</script>';
    $specialization=$_POST["specialization"];
    $specialization1= implode(',', $specialization);
    //echo '<script>alert("'.$specialization1.'")</script>';
    
    
   
   
}

 
  $R=1;
    
 
 $excel->setActiveSheetIndex(0);
 
$excel->getActiveSheet()->getColumnDimension('A')->setWidth('10');
$excel->getActiveSheet()->getColumnDimension('B')->setWidth('20');
 $excel->getActiveSheet()->getColumnDimension('C')->setWidth('20');
 $excel->getActiveSheet()->getColumnDimension('D')->setWidth('15');
 $excel->getActiveSheet()->getColumnDimension('E')->setWidth('15');
  

 $excel->getActiveSheet()->setCellValue('A'.$R, "IDs")->getStyle('A1')->getFont()->setBold(true);         
$excel->getActiveSheet()->setCellValue('B'.$R, "Name")->getStyle('B1')->getFont()->setBold(true);
$excel->getActiveSheet()->setCellValue('C'.$R, "Qualification")->getStyle('E1')->getFont()->setBold(true); 
$excel->getActiveSheet()->setCellValue('D'.$R, "Course")->getStyle('F1')->getFont()->setBold(true); 
$excel->getActiveSheet()->setCellValue('E'.$R, "Specialization")->getStyle('G1')->getFont()->setBold(true);


 $R=2;
 
 
for ($index1 = 0; $index1 < count($qualification); $index1++) {
   
    for($index2=0; $index2 <count($course); $index2++){
        
     for($index3=0; $index3 < count($specialization); $index3++) {
         
     
  
    $sql="select * from student_registration where institute_id='$instiid' AND (qualification='$qualification[$index1]' AND course='$course[$index2]' AND specialization='$specialization[$index3]')"; 
    
   
    
    $result=$DB->query($sql);
    
    if ($result == TRUE) {
      
        
    
       
        while($row = $result->fetch_assoc()) {
            
            
            
             $excel->getActiveSheet()

          ->setCellValue('A'.$R, $row['id'])
           ->setCellValue('B'.$R, $row['student_name']);
           
             
             $q=$row['qualification'];
          
             $sql1="select * from qualification where id='$q'";
             $result1=$DB->query($sql1);
             $row1 = $result1->fetch_assoc();
             $excel->getActiveSheet()->setCellValue('C'.$R, $row1['qualification']);
             
             
             
             
              $c=$row['course'];
          
             $sql2="select * from course where c_id='$c'";
             $result2=$DB->query($sql2);
             $row2 = $result2->fetch_assoc();
             $excel->getActiveSheet()->setCellValue('D'.$R, $row2['course']);
             
             
             $s=$row['specialization'];
          
             $sql3="select * from specialization where s_id='$s'";
             $result3=$DB->query($sql3);
             $row3 = $result3->fetch_assoc();
             $excel->getActiveSheet()->setCellValue('E'.$R, $row3['specialization']);
             
             
             
           
           $R++;
           
            
               
        }
        
        
       
       
    
} 
  

    }

}

}
    

$filename= date("Y/m/d").".xls";
$na="val";
$sess=$_SESSION['id'];
$excel = PHPExcel_IOFactory::createWriter($excel, 'Excel5');

echo ("<SCRIPT LANGUAGE='JavaScript'>	
			        window.alert('File Generated successfully')   
	         		window.location.href='jd2.php';
	                        </SCRIPT>");

$name = 'excel/'.$instiid.'/filter/'.$fname.'.xls';
$excel->save($name);


   
?>


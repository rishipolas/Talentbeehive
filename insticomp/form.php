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
    $qualification=$_POST["qualification"];
    $count=count($qualification);
		$str1=$str2=$str3=$str4=0;
		
		if($count >= 1)
		{
			$str1=$qualification[0];
			
			
		}
		
		if($count>= 2)
		{
			$str2=$qualification[1];
			
		}
		
		if($count >= 3)
		{
			$str3=$qualification[2];
			
		}
		if($count >= 4)
		{
			$str4=$qualification[3];
			
		}
    
    $course=$_POST["course"];   
    $count1=count($course);
		$strc1=$strc2=$strc3=$strc4=0;
		
		if($count1 >= 1)
		{
			$strc1=$course[0];
			
			
		}
		
		if($count1>= 2)
		{
			$strc2=$course[1];
			
		}
		
		if($count1 >= 3)
		{
			$strc3=$course[2];
			
		}
		if($count1 >= 4)
		{
			$strc4=$course[3];
			
		}
    
    $specialization=$_POST["specialization"];  
    $count2=count($course);
		$strs1=$strs2=$strs3=$strs4=0;
		
		if($count2 >= 1)
		{
			$strs1=$specialization[0];
			
			
		}
		
		if($count2>= 2)
		{
			$strs2=$specialization[1];
			
		}
		
		if($count2 >= 3)
		{
			$strs3=$specialization[2];
			
		}
		if($count2 >= 4)
		{
			$strs4=$specialization[3];
			
		}
   
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
 
     $sql="select * from student_registration where institute_id='$instiid' AND (FIND_IN_SET( '$str1', qualification) OR FIND_IN_SET( '$str2', qualification ) OR FIND_IN_SET( '$str3', qualification ) OR FIND_IN_SET( '$str4', qualification ) OR FIND_IN_SET( '$strc1', course ) OR FIND_IN_SET( '$strc2', course ) OR FIND_IN_SET( '$strc3', course ) OR FIND_IN_SET( '$strc4', course ) OR FIND_IN_SET( '$strs1', specialization ) OR FIND_IN_SET( '$strs2', specialization ) OR FIND_IN_SET( '$strs3', specialization ) OR FIND_IN_SET( '$strs4', specialization ))"; 
    
 
    
   
    
    $result=$DB->query($sql);
    
    if ($result == TRUE) {
      
        
    
       
        while($row = $result->fetch_assoc()) {
            
            
            
             $excel->getActiveSheet()

          ->setCellValue('A'.$R, $row['id'])
           ->setCellValue('B'.$R, $row['student_name']);
           
             //$qualification1= implode(',', $row['qualification']);
            
         
         					 $str12 = $row['qualification'];	
						    $strs12=explode(",",$str12);
						     $st="";
							  foreach($strs12 as $q2){
							
							 $q1="select qualification from qualification where id='$q2'";
							  $result1=mysqli_query($DB,$q1);
							  $row1=mysqli_fetch_array($result1);
							  $c=$row1['qualification'];
							   $st=$st.$c.", ";
							  }
          
             $st=substr(trim($st),0,-1);
             $excel->getActiveSheet()->setCellValue('C'.$R, $st);
             
             
             
             
              
          
           					$course = $row['course'];
           				
						$coursestr=explode(",",$course);
						 $coursest1="";
						  foreach($coursestr as $q3){
						
						 $q1="select course from course where c_id='$q3'";
						  $result1=mysqli_query($DB,$q1);
						  $row1=mysqli_fetch_array($result1);
						  $c=$row1['course'];
						   $coursest1=$coursest1.$c.", ";
						  }	
						   
             $coursest1=substr(trim($coursest1),0,-1);
             $excel->getActiveSheet()->setCellValue('D'.$R, $coursest1);
             
            					 $specialization = $row['specialization'];
           					
						$specializationstr=explode(",",$specialization);
						 $specializationst1="";
						  foreach($specializationstr as $q4){
						
						 $q1="select specialization from specialization where s_id='$q4'";
						  $result1=mysqli_query($DB,$q1);
						  $row1=mysqli_fetch_array($result1);
						  $c=$row1['specialization'];
						   $specializationst1=$specializationst1.$c.", ";
						  }
             
          
           $specializationst1=substr(trim($specializationst1),0,-1);
             $excel->getActiveSheet()->setCellValue('E'.$R, $specializationst1);
             
             
             
           
           $R++;
           
            
               
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


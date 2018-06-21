<?php
include 'config1.php';

//echo 'ukyfrDWAR';
//$Connect = new ConnectionProvider();
//$con=$Connect->getCon();
 
 $index1=$index2=$query1="";
$qualification=$_POST["qualification"];
$qualification= explode(',', $qualification);

    
if(isset($_POST["qualification"]) && !empty($_POST["qualification"])){
    echo '<script>alert("ARE YOU SURE!")</script>';
    
   // echo '<select class="form-control" name="course" id="course" multiple="multiple" >';
	for ($index1 = 0; $index1 < count($qualification); $index1++) {
            
        
    $query = $DB->query("SELECT * FROM course WHERE q_id = '$qualification[$index1]'" );
  
    
    $rowCount = $query->num_rows;
    
   // echo $rowCount;
    //Display qualification list
    if($rowCount > 0){
        //echo '<option value="" disabled selected><input type="checkbox">Select course</option>';
       
        while($getCourse = $query->fetch_assoc()){ 
            echo '<option value="'.$getCourse['c_id'].'"><input type="checkbox">'.$getCourse['course'].'</option>';
        }
    }else{
        echo '<option value="">course not available</option>';
    }
  }
 // echo '</select>';
}
 
$course=$_POST["course"];
$course= explode(',', $course);

if(isset($_POST["course"]) && !empty($_POST["course"])){
    
    //$Connect = new ConnectionProvider();
//$con=$Connect->getCon();
     
    for($index2=0;$index2 < count($course);$index2++){
      
       $query = $DB->query("SELECT * FROM specialization WHERE cc_id = '$course[$index2]'" );
    
       $rowCount = $query->num_rows;
        if($rowCount > 0){
        echo '<option value="" disabled selected><input type="checkbox">Select course</option>';
       
        while($getSpecialization = $query->fetch_assoc()){ 
            echo '<option value="'.$getSpecialization['s_id'].'"><input type="checkbox">'.$getSpecialization['specialization'].'</option>';
        }
    }else{
        echo '<option value="">course not available</option>';
    }
        
        
    }
  //  $query1 = $con->query("SELECT * FROM specialization WHERE cc_id ='$course[$index2]'");
    
    //Count total number of rows
    //$rowCount = $query1->num_rows;
    
    
    

}
?>
<?php
include('config1.php');
 
if(isset($_POST["qualification_id"]) && !empty($_POST["qualification_id"])){
    //Get all qualification data
	
    $query = $DB->query("SELECT * FROM course WHERE q_id = ".$_POST['qualification_id'] );
  
    //Count total number of rows
    $rowCount = $query->num_rows;
    
	
    //Display qualification list
    if($rowCount > 0){
        echo '<option value="" disabled selected>Select course</option>';
        while($getCourse = $query->fetch_assoc()){ 
            echo '<option value="'.$getCourse['c_id'].'">'.$getCourse['course'].'</option>';
        }
    }else{
        echo '<option value="">course not available</option>';
    }
}
 
if(isset($_POST["course_id"]) && !empty($_POST["course_id"])){
    //Get all course data
    $query = $DB->query("SELECT * FROM specialization WHERE cc_id = ".$_POST['course_id']);
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display course list
    if($rowCount > 0){
        echo '<option value="" disabled selected>Select specialization</option>';
        while($getSpecialization= $query->fetch_assoc()){ 
            echo '<option value="'.$getSpecialization['s_id'].'">'.$getSpecialization['specialization'].'</option>';
        }
    }else{
        echo '<option value="">specialization not available</option>';
    }
}
?>
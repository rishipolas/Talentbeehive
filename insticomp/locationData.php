<?php
include('config1.php');
 
if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all qualification data
	
    $query = $DB->query("SELECT * FROM city WHERE s_id = ".$_POST['state_id'] );
  
    //Count total number of rows
    $rowCount = $query->num_rows;
    
	
    //Display qualification list
    if($rowCount > 0){
        echo '<option value="" disabled selected>Select city</option>';
        while($getCity = $query->fetch_assoc()){ 
            echo '<option value="'.$getCity['c_id'].'">'.$getCity['cityname'].'</option>';
        }
    }else{
        echo '<option value="">city not available</option>';
    }
}
 

?>
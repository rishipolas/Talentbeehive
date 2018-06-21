<?php
if(isset($_POST["id"]))  
 {  
      $output = '';  	
     include('config1.php');
                  
	 $q="select * from functionality WHERE id='".$_POST["id"]."'";	
	 $result=mysqli_query($DB,$q);
	  while($row = mysqli_fetch_array($result))  
      {  
      //getting state
      
           	
           	$getstate=mysqli_query($DB,"select statename  from state where id=".$row['state']);
     		 $getstatedetails = mysqli_fetch_array($getstate);
      //getting city
      
           	$getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);

		  $output = '  
		<table>
		<tr>
		<td><p><label><b>Title :</b> '.$row['title'].'</label></p></td>
		</tr>
		<tr>
		<td><p><label><b>Role : </b></label> '.$row['role'].'</p></td>	
		</tr>
		<tr>
		<td><p><label><b>Openings : </b></label>'.$row['openings'].'</p></td>
		</tr>
		<tr>
		<td><p><label><b>Skills : </b></label> '.$row['skills'].'</p></td>
		</tr>
		<tr>
		<td><p><label><b>Type : </b></label> '.$row['atype'].'</p></td>
		</tr>
		<tr>
		<td><p><label><b>Job Location : </b></label> '.$getstatedetails['statename'].','.$getcitydetails['cityname'].'</p></td>
		</tr>
		<tr>
		<td><p><label><b>Months : </b></label><br> '.$row['months'].'</p></td>
		</tr>
		<tr>
		<td><p><label><b>Years : </b></label> '.$row['year'].'</p></td>
		</tr>
		
		</table>				
		 ';
		 
		
		}
		echo $output;  
	}
		?>
		
		
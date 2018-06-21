<?php
require_once '../config1.php';
$email=$_GET['email'];
echo $email;

			$q1="select * from student_registration where email='".$email."'";
			  $result1=mysqli_query($DB,$q1);
			  $row1=mysqli_fetch_array($result1);


$id=$row1['id'];


?>

<!DOCTYPE html>
<html lang="en">
   <head>
  
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Talent Beehive</title>
      <!-- Bootstrap core CSS-->
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Page level plugin CSS-->
      <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="../css/sb-admin.css" rel="stylesheet">
      <link href="css/bootstrap-multiselect.css" rel="stylesheet">
       <script src="../jquery.min.js"></script>
      <script type="text/javascript">
$(document).ready(function(){
  
  
  $('#course').on('change',function(){  
        var courseID = $(this).val();
        if(courseID){
            $.ajax({
                type:'POST',
                url:'../ajaxData.php',    
                data:'course_id='+courseID,
                success:function(html){
                    $('#specialization').html(html);  
                }
            }); 
        }else{
            $('#specialization').html('<option value="">Select course first</option>');     
        }
    });
    


    $('#state').on('change',function(){   
        var stateID = $(this).val();
    
    //alert (qualificationID);
        if(stateID){
            $.ajax({
                type:'POST',
                url:'locationData.php',   
                
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                    
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>');
           
        }
    });
 
});

//End script

</script>
      
   </head>
   
          
   <body id="page-top">
   
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
     <a class="navbar-brand" href="index.php"><img src="../img/works/talent.png" height="40px" width="200px" alt=""></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      
    
    <li class="nav-item">
          <a class="nav-link" >
            <i ></i>About us</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" >
            <i></i>Blog</a>
        </li>
      </ul>
    </div>
  </nav>



      <div class="content-wrapper">
         <div class="container-fluid">
            <!-- Breadcrumbs
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="#">Student Registration Form</a>
               </li>
               <li class="breadcrumb-item active">View</li>
            </ol>-->
             <br><br><br><br><br>
		<div class="container">
    <div class="card card-register">
      <div class="card-header heading1">Student Registration Form Preview</div>
      <?php if(!isset($cnnn)) echo $cnnn=null; 
                if(!isset($institute_id)) echo $institute_id=null; 
                 if(!isset($state)) echo $state=null;?>
      <div class="card-body">
       <form action="edit.php" method="post"  enctype="multipart/form-data">
          <div class="form-group">
            
		
	<div class="form-group">
            <div class="form-row">            	                         
               <div class="col-sm-3" >
		 <label>Photo: </label>
  	       </div> 
  	       <div class="col-sm-9" >
		 <img src="<?php echo 'student_resume/' .$row1['student_photo'] ?>" width="115px" height="65px" >
  	       </div> 
  	     </div>
  	 </div>	
		
	<div class="form-group">
            <div class="form-row">            	                         
               <div class="col-sm-3" >
		 <label>Name of Student: </label>
  	       </div> 
  	       <div class="col-sm-9" >
		 <?php echo $row1['student_name'];?>
  	       </div> 
  	     </div>
  	 </div>     
	
	 <?php 
                $id=$row1['institute_id'];
                $q2="select institute_name from institute_registration where id='".$id."'";
			  $result2=mysqli_query($DB,$q2);
			  $row2=mysqli_fetch_array($result2); ?>	
	<div class="form-group">
            <div class="form-row">            	                         
               <div class="col-sm-3" >
		 <label>College: </label>
  	       </div> 
  	       <div class="col-sm-9" >
		<?php echo $row2['institute_name'];?>
  	       </div> 
  	     </div>
  	 </div> 
			  
	<div class="form-group">
            <div class="form-row">            	                         
               <div class="col-sm-3" >
		 <label>Gender: </label>
  	       </div> 
  	       <div class="col-sm-9" >
		<?php echo $row1['gender'];?>
  	       </div> 
  	     </div>
  	 </div> 
	
	<div class="form-group">
            <div class="form-row">            	                         
               <div class="col-sm-3" >
		 <label>Email: </label>
  	       </div> 
  	       <div class="col-sm-9" >
		<?php echo $row1['email'];?>
  	       </div> 
  	     </div>
  	 </div> 
	                                    		             
           <div class="form-group">
            <div class="form-row">            	                         
               <div class="col-sm-3" >
		 <label>Contact Number: </label>
  	       </div> 
  	       <div class="col-sm-9" >
		<?php echo $row1['contact_number'];?>
  	       </div> 
  	     </div>
  	 </div>    
  	 
  	 <div class="form-group">
            <div class="form-row">            	                         
               <div class="col-sm-3" >
		 <label>Birth Date: </label>
  	       </div> 
  	       <div class="col-sm-9" >
		<?php echo $row1['birth_date'];?> 
  	       </div> 
  	     </div>
  	 </div>            
                                   
                <?php 
                $id=$row1['state'];
                $q3="select statename from state where id='".$id."'";
			  $result3=mysqli_query($DB,$q3);
			  $row3=mysqli_fetch_array($result3); ?><?php 
                $id=$row1['city'];
                $q4="select cityname from city where c_id='".$id."'";
			  $result4=mysqli_query($DB,$q4);
			  $row4=mysqli_fetch_array($result4); ?>
               
               <div class="form-group">
            <div class="form-row">            	                         
               <div class="col-sm-3" >
		 <label>location: </label>
  	       </div> 
  	       <div class="col-sm-9" >
		<?php echo $row3['statename']." , ". $row4['cityname'];?>
  	       </div> 
  	     </div>
  	 </div>   
                                                    
          <div class="form-group">
            <div class="form-row">            	                         
               <div class="col-sm-3" >
		 <label>10th Percentage: </label>
  	       </div> 
  	       <div class="col-sm-9" >
		<?php echo $row1['ssc'];?>
  	       </div> 
  	     </div>
  	 </div>  
              
      <div class="form-group">
            <div class="form-row">            	                         
               <div class="col-sm-3" >
		 <label>12th Percentage: </label>
  	       </div> 
  	       <div class="col-sm-9" >
		<?php echo $row1['hsc'];?>
  	       </div> 
  	     </div>
  	 </div>
            <div class="form-group">
               <div class="form-row">            	                         
                  <div class="col-sm-3" >                        
                        <label>Qualification: </label>
                  </div>
	           <div class="col-sm-9" >
                       <?php 
                         $str2 = $row1['qualification'];	
						    $strs2=explode(",",$str2);
						     $st="";
							  foreach($strs2 as $q2){
							 $q1="select qualification from qualification where id='$q2'";
							  $result1=mysqli_query($DB,$q1);
							  $rowr=mysqli_fetch_array($result1);
							  $c=$rowr['qualification'];
							   $st=$st.$c.", ";
							  }
							 
						echo $st;
                        
                        ?>
		    </div>
		</div>
          </div>
          <div class="form-group">
               <div class="form-row">            	                         
                  <div class="col-sm-3" >                        
                        <label>Course: </label>
                  </div>
	           <div class="col-sm-9" >
                   <?php 
              
                        
					 $str3 =  $row1['course'];	
					 $strs3=explode(",",$str3);
					 $st1="";
						foreach($strs3 as $q3)
						{
							
							$q1="select course from course where c_id='$q3'";
							$result1=mysqli_query($DB,$q1);
							$rowr=mysqli_fetch_array($result1);
							$c=$rowr['course'];
							$st1=$st1.$c.", ";
						}
												 
					echo $st1;
                        
                        	?>    
		    </div>
		</div>
          </div>
			  
                <div class="form-group">
               <div class="form-row">            	                         
                  <div class="col-sm-3" >                        
                        <label>Specialization: </label>
                  </div>
	           <div class="col-sm-9" >
                   <?php 
              
              
              $str1 = $row1['specialization'];
						    $strs=explode(",",$str1);
						     $str="";
							  foreach($strs as $b){
							
							 $q1="select specialization from specialization where s_id='$b'";
							  $result1=mysqli_query($DB,$q1);
							  $rowr=mysqli_fetch_array($result1);
							  $c=$rowr['specialization'];
							   $str=$str.$c.", ";
							  }
							
						echo $str;
           
                        ?>    
		    </div>
		</div>
          </div>
			  
            
            
           <div class="form-group">
            <div class="form-row">            	                         
               <div class="col-sm-3" >
		 <label>Languages known: </label>
  	       </div> 
  	       <div class="col-sm-9" >
		<?php echo $row1['language'];?>
  	       </div> 
  	     </div>
  	 </div>  
          
          <div class="form-group">
            <div class="form-row">            	                         
               <div class="col-sm-3" >
		 <label>Resume: </label>
  	       </div> 
  	       <div class="col-sm-9" >
		<a href="<?php echo 'student_resume/' .$row1['student_profile'];?>">View</a>
  	       </div> 
  	     </div>
  	 </div> 
          
          <div class="form-group">
            <div class="form-row">            	                         
               <div class="col-sm-3" >
		 <label>Video Resume: </label>
  	       </div> 
  	       <div class="col-sm-9" >
		<a href="<?php echo 'student_resume/' .$row1['student_video'];?>">View</a>
  	       </div> 
  	     </div>
  	 </div> 	
        

              
	
          
         
           
          
		             <div class="btn-group-sm pull-right">
                  <a type="button" class="btn btn-danger" href="edit.php?id=<?php echo $row1['id'];?>" onclick="return confirm('Do you want to Edit Your Profile ?');">Edit</a>
                  <a type="button" class="btn btn-danger" href="index.php" onclick="return confirm('Do you want to Submit?');">Submit</a>
                  
                  </div>
        </form>
        
      </div>
     
    </div>
  
  </div>
    
  
  
         </div>
         
      </div>
      
      </div>
      
       <!-- Logout Modal-->
         <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                     </button>
                  </div>
                  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                  <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                     <a class="btn btn-primary" href="institute_login.php">Logout</a>
                  </div>
               </div>
            </div>
         </div>
      
      
      <!-- Bootstrap core JavaScript-->
      <script src="../vendor/jquery/jquery.min.js"></script>
      <script src="../vendor/popper/popper.min.js"></script>
      <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <script src="../vendor/chart.js/Chart.min.js"></script>
      <script src="../vendor/datatables/jquery.dataTables.js"></script>
      <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="../js/sb-admin.min.js"></script>
      <!-- Custom scripts for this page-->
      <script src="../js/sb-admin-datatables.min.js"></script>
      <script src="../js/sb-admin-charts.min.js"></script>
      <script src="../jquery.min.js"></script>
      
 <script src="../js/dropdown1.js"></script>
      <script src="../js/show-hide-collapse.js"></script>
  <script src="../js/bootstrap-multiselect.js"></script>


   </body>
</html>
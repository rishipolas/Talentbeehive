<?php
session_start(); 
  
if(!isset($_SESSION['email']))
	header('location:institute_login.php');

 include('config1.php');
 $idds=$_GET['ids'];

$q="SELECT * FROM student_registration where id='".$idds."'";
$result=mysqli_query($DB,$q);
$num=mysqli_num_rows($result);
//echo $_GET['fid'];
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 <!-- Navigation-->
      <?php
         include('institute_header.php');
         ?>
  

  




   <?php
         if($num==1)
       {
          $row1= mysqli_fetch_array($result) 
      ?>
      


     <div class="content-wrapper">
         <div class="container-fluid">
            <!-- Breadcrumbs-->
             <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="institute_profile.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="#">Student List</a>
        </li>
        <li class="breadcrumb-item">
          <a href="#">Student Profile</a>
        </li>
        <li class="breadcrumb-item active">Student Profile Edit</li>
      </ol>








    <div class="container">
    <div class="card card-register">
      <div class="card-header heading1">Edit Profile</div>
      <div class="card-body">
        <form action="student_edit_db.php?idds=<?php echo $idds; ?>" method="post" enctype="multipart/form-data">
        
        
        <input class="form-control" id="exampleInputName" type="hidden" value="<?php echo $row1['id'];?>">
         <input class="form-control" id="exampleInputName" type="hidden" value="<?php echo $row1['institute_id'];?>">
        
         <div class="form-group">                                              
            <div class="form-row">
              <div class="col-md-12">
                
		                <div>
		                <label for="exampleInputName">Photo</label>
		                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                <img src="<?php echo 'student_resume/' .$row1['student_photo']; ?>" height="100" width="100">
		                </div><br>
                <input type="file" class="form-control-file btn-success" name="photo"  id="exampleInputFile" aria-describedby="fileHelp">
                
    <small id="fileHelp" class="form-text text-muted">.jpg*  .png*  .jpeg*</small>
              </div>
        </div>
        </div>
        
        
          <div class="form-group">                                              
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Student Name</label>
                <input class="form-control" id="exampleInputName" type="text" name="cname" placeholder="Student Name" value="<?php echo $row1['student_name'];?>">
              </div>
        </div>
        </div>
        
        
        <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">Email</label>
                <input class="form-control" id="exampleInputWeb" type="text" name="email2" placeholder="Student Email" value="<?php echo $row1['email'];?>">
              </div>
            </div>
          </div>
          
          
             <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputLastName">SSC</label>
                <input class="form-control" id="exampleInputWeb" type="text" name="ssc" placeholder="Student Email" value="<?php echo $row1['ssc']."%";?>" readonly>
              </div>
              
              
              <div class="col-md-6">
                <label for="exampleInputLastName">HSC</label>
                <input class="form-control" id="exampleInputWeb" type="text" name="hsc" placeholder="Student Email" value="<?php echo $row1['hsc']."%";?>" readonly>
              </div>
              
            </div>
          </div>
          
       <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
       


                <!--   State Code with db -->
<?php
    
    $query = $DB->query("SELECT * FROM state");
    
   
    $rowCount = $query->num_rows;
    ?>  

  <?php 
               
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$row1['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row1['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
            
    ?>  

    <div class="form-group">

              <div class="form-row">
              <div class="col-md-6">

                <label for="exampleInputBranch">State</label>
                <select id="state"  name="state"  class="form-control" required>
                 <option value="" disabled selected>-----select state---</option>
                           <!--<option value="" disabled selected><?php  //echo $getstatedetails['statename'];?></option> -->
                               
                                <?php
        if($rowCount > 0){
            while($getState = $query->fetch_assoc()){ 
            
            
            
                echo '<option value="'.$getState['id'].'">'.$getState['statename'].'</option>'; 
            }
        }else{
            echo '<option value="">State not available</option>';
        }
        ?>
          
                 </select>
              </div>
                                          <!--   City Code with db -->
                <div class="col-md-6">
                <label for="exampleInputBranch">City</label>
                <select id="city" name="city" placeholder="*city"  class="form-control">
                          <!-- <option value="" disabled selected><?php  //echo $getcitydetails['cityname']; ?></option>   -->
                    </select>
              </div>
                </div>

                 

             <br>
             <div class="form-row">
              <!--  Qualification DB -->
               <?php 
					    
                         $str2 = $row1['qualification'];	
						    $strs2=explode(",",$str2);
						     $st="";
							  foreach($strs2 as $q2){
							
							 $q1="select qualification from qualification where id='$q2'";
							  $result1=mysqli_query($DB,$q1);
							  $row2=mysqli_fetch_array($result1);
							  $c=$row2['qualification'];
							   $st=$st.$c.", ";
							  }
							 
						
						?>
              
              <div class="col-md-6">
                 <label for="exampleInputPassword1">Qualification</label>
            <input class="form-control" id="exampleInputPassword1" type="text" placeholder="Qualification" value="<?php echo $st;?>" readonly>
              
              </div> 
              
              			 <!--  Course DB -->
              <?php 
              
                        $str3 = $row1['course'];	
												$strs3=explode(",",$str3);
												 $st1="";
												  foreach($strs3 as $q3){
												
												 $q1="select course from course where c_id='$q3'";
												  $result1=mysqli_query($DB,$q1);
												  $row2=mysqli_fetch_array($result1);
												  $c=$row2['course'];
												   $st1=$st1.$c.", ";
												  }
												 
											
                        
            

             ?>
             
             <div class="col-md-6">
                 <label for="exampleInputPassword1">Course</label>
                 <input class="form-control" id="exampleInputPassword1" type="text" placeholder="Course" value="<?php echo $st1;?>" readonly>
                    </div>
          


             
          </div>
             		<br>
               

          

            <div class="form-row">
            
                                  <!--  Specialization DB -->
               <?php 
              
                        $str1 = $row1['specialization'];	
						    $strs=explode(",",$str1);
						     $str="";
							  foreach($strs as $b){
							
							 $q1="select specialization from specialization where s_id='$b'";
							  $result1=mysqli_query($DB,$q1);
							  $row2=mysqli_fetch_array($result1);
							  $c=$row2['specialization'];
							   $str=$str.$c.", ";
							  }
							
						
             ?>
            
            
              <div class="col-md-6">
                 <label for="exampleInputPassword1">Specialization</label>
            <input class="form-control" id="exampleInputPassword1" type="text" placeholder="Specialization" value="<?php echo $str;?>" readonly>
              
              </div> 
              
              
              <div class="col-md-6">
                <label>Contact Number<span class="req"> *</span> </label>
               	 	 <div class="form-row"> 
               	 	 <div class="col-md-3">
               	 	  <input class="form-control" type="text" name="mnumber" value="+91" readonly="">
               	 	    </div>         		  
              		   <div class="col-md-9">              		                 		                		   
              		 <input class="form-control" type="text" name="num" pattern="[6-9]{1}[0-9]{9}" title="should contain exact 10 digit, start with range between 6-9." placeholder="Mobile Number" value="<?php 
              		 
              		 
              		 $contact=$row1['contact_number'];
              		 $contact=str_replace('+91-', '', $contact);
              		 echo $contact;
              		 ?>" required>
              		  </div>
              		 </div>	
              </div>
              
               </div>
          </div>
               
          <br>
              
      <?php
                if ( $row1['student_profile'] == "")
                {
          
                ?>
                            <div  class="mt-2 text-danger">Resume Not Uploaded</div>

                  <?php
                }
                else
                {
                          ?>
      
       <div class="form-group">
            <div class="form-row">
      <div class="col-md-12">
         <label for="exampleInputFile">Resume: </label>
          <div  class="mt-2 text-primary" style="padding-left: 10%"><a href="<?php echo 'student_resume/' .$row1['student_profile'];?>">Resume</a><i class="fa fa-check" aria-hidden="true"></i></div> <br>
    <input type="file" class="form-control-file btn-success" name="clogo"  id="exampleInputFile" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">.Pdf*  .doc*</small>

    
              </div>

         </div>
         </div>

          <hr> 
<?php 
}
?>
<?php
                
            
                if ( $row1['student_video'] == "")
                {
          
                ?>

                  <a class="btn btn-default" onclick="return confirm('Do You Really want to Request For video ');"  href="request1.php?status=Video&id=<?php echo $_POST['id'];?>&fid=<?php echo $row1['fk_func_id']; ?>">Request Video Profile</a>

                  <?php
                }
                else 
                {
                          ?>

                         
           <div class="form-group">
            <div class="form-row" >
              <div class="col-md-12">
                <label for="exampleInputFile">Video Profile:</label><br><br>
               <!-- <div class="form-group" >
            <div class="form-row">
              <div class="col-md-12" style="padding-left: 50%">
              -->
                        <div class="form-group">
            <div class="form-row" style="padding-left: 20%">
              <div class="col-md-12">
                                <video controls controlsList="nodownload" class="btn btn-default video-profile btn-sm" href="<?php echo 'student_resume/'.$row1['video']?>" height="150px" width="150px" id="bgvideo">
                                                <source src="<?php echo 'student_resume/' .$row1['student_video'];?>" type="video/mp4">
                                             </video>          
                                </div>
                              </div>
                            </div>
    <input type="file" class="form-control-file btn-success" name="video" id="exampleInputFile" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">.mp4*</small>
              </div>
             
            </div>
          </div>


              
             <input class="btn btn-primary btn-block" type="submit" name="update" value="Update"/>
             
           <!--  <a type="submit" href="student_edit_db.php?idds=<?php //echo $idds; ?>"  name="update" class="btn btn-primary  btn-block">Update</a> -->
             
            </div>
          </div>
                                <?php
                }
                ?>
 
         
          

       
        </form>
        



      </div>

    </div>
  </div><br><br>
         </div>
      </div>

    <?php
}
?>

 <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          &copy; Copyright <strong>talentbeehive.com</strong>. All Rights Reserved
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->


      </div>



    



   
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
	 <script src="js/edit.js"></script>


  

  </div>



  <script type="text/javascript">
$(document).ready(function(){


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

</body>

</html>

<?php
   session_start();
   
   if(! isset($_SESSION['email']))
   header('location: institute_profile.php');
   
   $id=$_SESSION['id'];
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
   </head>
   <body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Navigation-->
       <?php
         include('institute_header.php');
         ?>
      <div class="content-wrapper">
         <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="#">Institute Profile</a>
               </li>
               <li class="breadcrumb-item active">View</li>
            </ol>
			<h1> Student Profile</h1>
   
            <div class="container">
               <div class="row">

		     <?php
				  
				 
                                               include('config1.php');
				  
				                                $q="select * from student_registration where institute_id=".$id;
				                                  $result=mysqli_query($DB,$q);
				                                    $num=mysqli_num_rows($result);
				  
				  
				                                if($num>0)
												{
														
												
													for($i=1;$i<=$num;$i++)
													{
												
														  $row=mysqli_fetch_array($result);
												
														  ?>
				  						
		
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
									<tr>
										
										
										<td>
                                         
																						
												
											<div class="media">
												<a href="#" class="pull-left">
												
												
											<img src="<?php echo 'institutelogo/' .$row['student_photo'] ?>" width="100px" height="100px"  class="media-photo">
												</a>
												<div class="media-body" style="padding-left:20px;">
													
													<h4 class="title">
														<?php echo $row['student_name']; ?>
														
													</h4>
													<p class="summary"><?php echo $row['email'] ?></p>
													<div class="btn-group-sm pull-right">
		<!--<a href="<?php //echo $i;?>" type="button" class="btn btn-primary" name="view" data-toggle="modal" data-target="#myModal_viewprofile<?php //echo $i;?>"> View Profile</a>-->
			<a href="student_profile_view.php?id=<?php echo $i; ?>" type="button" class="btn btn-primary" name="view">View Profile</a>										
													
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal_delete<?php echo $i;?>" >Delete</button>

													</div>
												</div>
											</div>
                                            
										</td>
										
									</tr>
									
									
									 
									
									
								</tbody>
                               
							</table>
                          
						</div>
					</div>
				</div>
				
			</div>
            
                       <div class="modal fade" id="myModal_viewprofile<?php echo $i;?>"  role="dialog">
                           <div class="vertical-alignment-helper">
                              <div class="modal-dialog modal-sm vertical-align-center">
                                 <div class="modal-content">
                                
		         
                                    <div class="modal-header bg-primary text-white">
                                       <h4 class="modal-title text-center">Student Profile</h4>
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!--<div class="modal-body" style="padding:8px;" >-->
                                    <div class="modal-body" >
                                
									
									<div class="row">
									<div class="col-md-8 col-lg-8 " align="center">
									<img alt="User Pic" src="<?php echo 'institutelogo/' .$row['student_photo'] ?>" class="img-circle img-responsive" width="150px" height="150px"> </div>
                                       <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td><?php echo  $row['student_name']; ?></td>
                      </tr>
                      <tr>
                        <td>Gender:</td>
                        <td><?php echo $row['gender']; ?></td>
                      </tr>
					   <tr>
                        <td>Email</td>
                        <td><?php echo $row['email']; ?> </td>
                      </tr>
					   
					  <tr>
                        <td>Contact Number</td>
                        <td><?php echo $row['contact_number']; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td><?php echo $row['birth_date']; ?></td>
                      </tr>
                       <tr>
                        <td> Location</td>
                        <td><?php 
					    
                         $getcity=mysqli_query($DB, "select  cityname  from  city where c_id=".$row['city']);
                         $getcoursedetails = mysqli_fetch_array($getcity);
						 echo $getcoursedetails['cityname'];?></td>
                      </tr>
					  <tr>
                        <td> Percentage 10th</td>
                        <td><?php echo $row['ssc']; ?></td>
                      </tr>
                     <tr>
                        <td> Percentage 12th</td>
                        <td><?php echo $row['hsc']; ?></td>
                      </tr>
					   <tr>
                        <td>Qualification</td>
                        <td> <?php 
               
                         $str2 = $row['qualification'];	
						    $strs2=explode(",",$str2);
						     $st="";
							  foreach($strs2 as $q2){
							
							 $q1="select qualification from qualification where id='$q2'";
							  $result1=mysqli_query($DB,$q1);
							  $row1=mysqli_fetch_array($result1);
							  $c=$row1['qualification'];
							   $st=$st.$c.", ";
							  }
							 
						echo $st;
                        
                        ?></td>
                      </tr>
					  <tr>
                        <td> Course  </td>
                        <td>  <?php 
              
                        
											 $str3 = $row['course'];	
												$strs3=explode(",",$str3);
												 $st1="";
												  foreach($strs3 as $q3){
												
												 $q1="select course from course where c_id='$q3'";
												  $result1=mysqli_query($DB,$q1);
												  $row1=mysqli_fetch_array($result1);
												  $c=$row1['course'];
												   $st1=$st1.$c.", ";
												  }
												 
											echo $st1;
                        
                        ?></td>
                      </tr>
                      
                      <tr>
                        <td>Specialization</td>
                        <td>  <?php 
              
              
              $str1 = $row['specialization'];	
						    $strs=explode(",",$str1);
						     $str="";
							  foreach($strs as $b){
							
							 $q1="select specialization from specialization where s_id='$b'";
							  $result1=mysqli_query($DB,$q1);
							  $row1=mysqli_fetch_array($result1);
							  $c=$row1['specialization'];
							   $str=$str.$c.", ";
							  }
							 /*$str="";
							  foreach($str1 as $c){
							  
							 
							  $str=$str.$c.", ";
				               
				        }   */ 
						echo $str;
              
              
                        ?></td>
                      </tr>
					   <tr>
                        <td> Profile</td>
                        <td>
						<div class="btn-group-sm ">
						<a  type="button" class="btn btn-basic" href="<?php echo 'institutelogo/' .$row['student_profile'];?>" >Resume</a>
		                <a type="button" class="btn btn-warning" href="<?php echo 'institutevideo/' .$row['student_video'];?> ">Video Profile</a>
						</div>
                        
						</td>
                      </tr>
                     
                    </tbody>
					
                  </table>
                 
                 
                </div>
				</div>
              </div>
			  <div class="modal-footer">
									 <div class="col-lg-12">
                                       <div class="btn-group-lg pull-right">
													
								
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

													</div>
									   </div>
                                    </div>
			  
                                   
                                   
                                 </div>
                              </div>
                           </div>
                        </div>
						
			<div class="modal fade" id="myModal_delete<?php echo $i;?>" role="dialog">
                           <div class="vertical-alignment-helper">
                              <div class="modal-dialog modal-sm vertical-align-center">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4 class="modal-title text-center">Delete</h4>
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                     <p>Are you sure you want to delete this user?</p>									 
									     
                                    </div>
                                    <div class="modal-footer">
									 <div class="col-lg-12">
                                       <div class="btn-group-sm pull-right">
													
				<a href="student_profile_delete.php?idd=<?php echo $row['id']; ?>" type="button" class="btn btn-danger" onclick="return confirm('do you want to Delete <?php echo $row['student_name']; ?>?');">Delete</a>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

													</div>
                                                      
									   </div>
                                       
                                    </div>
                                    
                                 </div>
                              </div>
                           </div>
                      
                        </div>
                       <?php
													  }
													   }?>
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
	  <script src="../js/bootstrap-confirmation.js"></script>
   </body>
</html>
<?php

session_start();

if(! isset($_SESSION['email']))
   header('location: candidate-login.php');

 include('config1.php');
	 $id=$_GET['id'];
		 $q="SELECT * FROM users INNER JOIN functionality ON users.cname = functionality.name where functionality.id=".$id;  
$result=mysqli_query($DB,$q);
$num=mysqli_num_rows($result);

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
 include("candidate_header.php");
 ?>
      <div class="content-wrapper">
         <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="#">Dashboard</a>
               </li>
               <li class="breadcrumb-item active">My Dashboard</li>
            </ol>
			
			 <?php
	for($i=1;$i<=$num;$i++)
	{
		$row=mysqli_fetch_array($result);
		
	?>	
	
            <div class="container">
			
               <div class="row">
                  <div class="col-md-9 col-md-offset-3">
                     <div class="panel panel-default">
                        <div class="panel-body">
                           <div class="container jobpost-div">
                              <div class="row" style="padding:10px">
                                 <div class="col-lg-12">
                                    <div class="post-title jobpost-title">
                                       <a class="text-primary"style="padding:5px 0px"><?php echo $row['title'];?></a><small> (<?php echo $row['type'];?>)</small><span class="pull-right" style="font-size:11px"><strong>Posted on: </strong><?php echo $row['date'];?></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="row" style="padding:8px">
                                 <div class="col-lg-2">
                                    <div class="post-logo">
                                       <img src="img/student_profile.png" alt="Company-logo">
                                    </div>
                                 </div>
                                 <div class="col-lg-10">
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="post-des ">
                                             <span><strong>Company Name: </strong></span><a class="text-primary" href="view-company-profile.php?cname=<?php echo $row['name'];?>"><?php echo $row['name'];?></a>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 ">
                                          <div class="post-des ">
                                             <span><strong>Functional Role: </strong></span><span><?php echo $row['role'];?></span>
                                          </div>
                                       </div>
                                    </div>
                                    <!---row--->
                                    <div class="row">
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                             <span><strong>Number of Openings: </strong></span><span><?php echo $row['openings'];?></span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                             <span><strong>Qualification: </strong></span><span>
                                             <?php 
					     
                         $getqualification=mysqli_query($DB,"select qualification  from qualification where id=".$row['qualification']);
                         $getqualificationdetails = mysqli_fetch_array($getqualification);
						 echo $getqualificationdetails['qualification'];?>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <!---row--->
                                    <br>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="post-des ">
                                             <span><strong>Course: </strong></span><span>
                                             <?php 
					    
                         $getcourse=mysqli_query($DB, "select course  from course where c_id=".$row['course']);
                         $getcoursedetails = mysqli_fetch_array($getcourse);
						 echo $getcoursedetails['course'];?>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 ">
                                          <div class="post-des ">
                                             <span><strong>Specialization: </strong></span><span>
                                              <?php 
					    
                         $getspecialization=mysqli_query($DB, "select specialization  from specialization where s_id=".$row['specialization']);
                         $getspecializationdetails = mysqli_fetch_array($getspecialization);
						 echo $getspecializationdetails['specialization'];?>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                     <!---row--->  
				<div class="row">
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                             <span><strong>Skills: </strong></span><span><?php echo $row['skills'];?></span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                             <span><strong>Application Type: </strong></span><span><?php echo $row['atype'];?></span>
                                          </div>
                                       </div>
                                    </div>
                                    <!---row--->
									<div class="row">
                                      
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                          <?php 
					     
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$row['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
						
		?>
                                             <span><strong>Location: </strong></span><span><?php  echo $getstatedetails['statename'];?> , <?php  echo $getcitydetails['cityname']; ?></span>
                                          </div>
                                       </div>
                                    </div>
									<div class="row">
									 <div class="col-lg-12 ">
                                          <div class="post-des mt-3">
                                             <span><strong>Job Description: </strong></span><span><?php echo $row['description'];?></span>
                                          </div>
                                       </div>
									</div>
                                    <!---row--->
                                 </div>
                                 <!--col-6--->
                              </div>
                              <!---row----->
                              
                           </div>
					
                        </div>
                     </div>
                  </div>
               </div>

			   <div class="row mt-5">
        <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3 yellow-border">
            
			<h4 style="background-color:#FFC107; color:#000;padding:10px; border-bottom:2px solid #000; border-radius:10px " >Company Profile</h4>
			
            <div class="card-body">
              <div class="row">
			   <div class="col-lg-2">
			     <div class="post-logo">
                                       <img src="img/student_profile.png" alt="Company-logo">
                                    </div>
			   </div>
			  <div class="col-lg-10">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
								
                                <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Company Name </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['cname'];?></td>
                                 
                                </tr>
                              
                                   <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Industry Type</strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['type'];?></td>
                                 
                                </tr>
								<tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Contact Email</strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['email'];?></td>
                                 
                                </tr>
							
								<tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Contact Person </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['person'];?></td>
                                 
                                </tr>
								
								
									<tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Website </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><a href="<?php echo $row['cweb'];?>"><?php echo $row['cweb'];?></a></td>
                                 
                                </tr>
                               <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Location </strong></td>
                                  <?php 
					     
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$row['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
						
		?>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php  echo $getstatedetails['statename'];?> , <?php  echo $getcitydetails['cityname']; ?></td>
                                 
                                </tr>
                              
                            
                                
                              </tbody>
							  </table>
							  </div>
              </div>
            </div>
           
          </div>
   
          </div>
		  
      </div>
            </div>
				<?php
	}
	?>
         </div>
         <!-- /.container-fluid-->
         <!-- /.content-wrapper-->
         <footer class="sticky-footer">
            <div class="container">
               <div class="text-center">
                  <small>Copyright © Your Website 2017</small>
               </div>
            </div>
         </footer>
         <!-- Scroll to Top Button-->
         <a class="scroll-to-top rounded" href="#page-top">
         <i class="fa fa-angle-up"></i>
         </a>
         <!-- Logout Modal-->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                     <a class="btn btn-primary" href=" candidate-logout.php">Logout</a>
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
   </body>
</html>
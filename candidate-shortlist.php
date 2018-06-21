<?php
   session_start(); 
     
   if(!isset($_SESSION['email']))		
   	header('location:company-login.php');
   
   include('config1.php');
   //$q="select * from candidate_job_applied where name='{$_SESSION['name']}' and status='not'";
   
   
   
   $q="SELECT * FROM candidate 
        INNER JOIN candidate_job_applied 
        ON candidate.id=candidate_job_applied.fk_can_id 
         INNER JOIN functionality
          ON candidate_job_applied.fk_func_id =functionality.id 
         where candidate_job_applied.status='shortlisted' and candidate_job_applied.com_name='".$_SESSION['name']."'";
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
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <script>
         (adsbygoogle = window.adsbygoogle || []).push({
           google_ad_client: "ca-pub-2997357690787675",
           enable_page_level_ads: true
         });
      </script>
   </head>
   <body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Navigation-->
      <?php
         include('company_header.php');		
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
            <div class="container">
               <div class="row">
                  <div class="col-md-9 col-md-offset-2">
                     <div class="card">
                     <?php
                     if($num>0)
                              {
                     ?>
                     
                     
                        <div id="accordion" role="tablist" aria-multiselectable="true">
                           	<?php
                              
                              		
                              
                              	for($i=1;$i<=$num;$i++)
                                     {
                              
                              $row=mysqli_fetch_array($result);
                              
                              
                              
                              
                              								$q2="select count(*) as maxnum from candidate_job_applied where com_name='{$_SESSION['name']}' and fk_func_id= ".$row['id']." and status='shortlisted' ";
                              				$result2=mysqli_query($DB,$q2);
                              				$row2= mysqli_fetch_array($result2);
                              				
                              				
                              				
                              				
                              				
                              		  
                              ?>
                           <div class="card-header " role="tab" id="Developement<?php echo $i; ?>">
                              <h5 class="mb-0">
                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapsedevelopment<?php echo $i;?>" aria-expanded="false" aria-controls="collapseOne<?php echo $i;?>">
                                    <span class="badge-shortlist mr-4"><?php echo $row2['maxnum'];?></span><?php echo $row['title'];?>
                                    <!--<span><i class="plus1 fa fa-plus pull-right" aria-hidden="true"></i></span>
                                       <span><i class="minus1 fa fa-minus pull-right" aria-hidden="true"></i></span>-->
                                 </a>
                              </h5>
                           </div>
                           <div id="collapsedevelopment<?php echo $i;?>" class="collapse<?php echo ($i == 0 ? 'collapse in' : 'collapse'); ?>" role="tabpanel" aria-labelledby="Developement<?php echo $i; ?>">
                              <div class="container">
                                 <div class="row">
                                    <div class="col-md-11 col-md-offset-3">
                                       <div class="panel panel-default">
                                          <div class="panel-body">
                                             <?php						  
                                                $q3="SELECT * FROM candidate INNER JOIN candidate_job_applied ON candidate.id=candidate_job_applied.fk_can_id  where candidate_job_applied.status='shortlisted' and candidate_job_applied.fk_func_id= ".$row['id']." and candidate_job_applied.com_name='".$_SESSION['name']."'";
                                                	   $result3=mysqli_query($DB,$q3);
                                                	   $num3=mysqli_num_rows($result3);
                                                	
                                                	 if($num3>0)
                                                	 {
                                                                for($j=1; $j<=$num3; $j++)
                                                                     {	
                                                				    $row3= mysqli_fetch_array($result3) ;
                                                	   
                                                	  ?> 
                                             <div class="container jobpost-shortlist-div mt-3">
                                                <div class="row" style="padding:10px">
                                                   <div class="col-lg-12">
                                                      <div class="post-title jobpost-title">
                                                         <a class="text-primary"style="padding:5px 0px" ><?php echo $row3['role']; ?></a><span class="pull-right" style="font-size:11px"><?php echo $row3['date']; ?></span>
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
                                                               <span class="text-muted">Candidate Name:</span><a class="text-primary" ><?php echo $row3['can_name'];?></a>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <!---row--->
                                                      <div class="row">
                                                         <div class="col-lg-6 ">
                                                            <div class="post-des mt-2">
                                                               <span class="text-muted">Application Type:</span><span><?php echo $row3['application'];?></span>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                         <div class="col-lg-6 ">
                                                            <div class="post-des mt-2">
                                                               <span class="text-muted">Qualification:</span><!--<span><?php //echo $row3['qualification'];?></span>-->
                                                               <?php 
                                                                  $getqualification=mysqli_query($DB,"select qualification  from qualification where id=".$row3['qualification']);
                                                                  $getqualificationdetails = mysqli_fetch_array($getqualification);
                                                                  echo $getqualificationdetails['qualification'];?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                         <div class="col-lg-6 ">
                                                            <div class="post-des mt-2">
                                                               <span class="text-muted">Course:</span><span><!--<?php //echo $row3['qualification'];?></span>-->
                                                               <?php 
                                                                  $getcourse=mysqli_query($DB, "select course  from course where c_id=".$row3['course']);
                                                                  $getcoursedetails = mysqli_fetch_array($getcourse);
                                                                  echo $getcoursedetails['course'];?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                         <div class="col-lg-6 ">
                                                            <div class="post-des mt-2">
                                                               <span class="text-muted">Specialization:</span><!--<?php //echo $row3['qualification'];?></span>-->
                                                               <?php 
                                                                  $getspecialization=mysqli_query($DB, "select specialization  from specialization where s_id=".$row3['specialization']);
                                                                  $getspecializationdetails = mysqli_fetch_array($getspecialization);
                                                                  echo $getspecializationdetails['specialization'];?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <!---row--->
                                                      <!---row--->
                                                      <div class="row">
                                                         <div class="col-lg-3 ">
                                                            <div class="post-des mt-2">
                                                               <span class="text-muted">Video Profile:</span>
                                                            </div>
                                                         </div>
                                                         <div class="col-lg-6 ">
                                                            <div class="post-des mt-2">
                                                               <video controls controlsList="nodownload" class="btn btn-default video-profile btn-sm" href="<?php echo 'video_upload/'.$row3['video']?>" height="100px" width="200px" id="bgvideo">
                                                                  <source src="<?php echo 'video_upload/' .$row3['video'];?>" type="video/mp4">
                                                               </video>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <!---row--->
                                                   </div>
                                                   <!--col-6--->
                                                </div>
                                                <!---row----->
                                                <div class="row" >
                                                   <div class="col-lg-12" >
                                                      <div class="jobpost-apply" >
                                                         <div class="btn-group-sm pull-right">
                                                            <form action="view-candidate-profile.php" method="post"> 
                                                               <input type="hidden" name="id" value="<?php echo $row3['fk_can_id']; ?>">
                                                               <input type="hidden" name="fid" value="<?php echo $row3['fk_func_id']; ?>">
                                                               <button type="submit" class="button-view pull-right" name="submit">View Profile</button>	
                                                            </form>
                                                         </div>
                                                      </div>                                                     
                                                   </div>                                                    
                                                </div>                                               
                                             </div>
                                              <?php
                                                }
                                                 }
                                                else
                                                {
                                                ?>
                                             <div>
                                                <h4>No Record</h4>
                                             </div>
                                             <?php
                                                }	
                                              ?>   		 
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
                            <?php
                             
                              			}
                              			else
                              			{
                              				
                              			
                              ?>
                           <div>
                              <H1>No Records Found</H1>
                           </div>
                           <?php
                              }
                              ?>                      		
                        </div>
                       
                        
                        
                        
                        
                     
                  </div>                   
               </div>              
            </div>           
         </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <!-- /.container-fluid-->
      <!-- /.content-wrapper-->
      <footer class="sticky-footer">
         <div class="container">
            <div class="text-center">
               <small>Copyright ©talentbeehive.com 2017</small>
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
                  <a class="btn btn-primary" href="company-logout.php">Logout</a>
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
      <script src="js/show-hide-collapse.js"></script>
      </div>
   </body>
</html>
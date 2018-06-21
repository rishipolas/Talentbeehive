<?php
session_start();
if(! isset($_SESSION['email']))		
	echo ("<SCRIPT LANGUAGE='JavaScript'>	   
	                        window.location.href('candidate-login.php');
	                        </SCRIPT>");
  
	 
include('config1.php');


	
  $course=$_GET['course'];
  //$qualification=$_GET['qualification'];	
	  $role=$_GET['role'];
	  
	  

	 
$q="select *,functionality.state,functionality.city, functionality.id as fid  from functionality INNER JOIN users ON functionality.name=users.cname where functionality.role ='".mysqli_real_escape_string($DB,$_GET['role'])."' OR functionality.course= '".mysqli_real_escape_string($DB,$_GET['course'])."' ORDER BY fid DESC";
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
include("candidate_header.php");		
?>
 
  <div class="content-wrapper">
         <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
               <li class="breadcrumb-item active"><strong>Jobs For you</strong></li>
            </ol>
            
     
            
<?php
  if($num>0)
   {
    
     
	for($i=1;$i<=$num;$i++)
	{
		$row=mysqli_fetch_array($result);
		//$id=$row['id'];  $job_applied=$row['job_applied'];		
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
		
		
									
                                       <!--<a class="text-primary"style="padding:5px 0px" href="jobpost-profile.php?id=<?php //echo $row['id']; ?>"> <?php //echo $row['title']; ?> (<?php //echo $row['type']; ?>)</a><span class="pull-right" style="font-size:11px">Posted on <?php //echo $row['date']; ?></span>-->
                                       <a class="text-primary"style="padding:5px 0px" > <?php echo $row['title']; ?> (<?php echo $row['type']; ?>)</a><span class="pull-right" style="font-size:11px">Posted on <?php echo $row['date']; ?></span>
                                   
	</div>
                                 </div>
                              </div>
                              <div class="row" style="padding:8px">
                                 <div class="col-lg-2">
                                    <div class="post-logo">
                                       <img src="<?php echo 'uploads/' .$row['clogo'] ?>" height="80px" width="100px" alt="<?php echo $row['name']; ?>">
                                    </div>
                                 </div>
                                 <div class="col-lg-10">
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="post-des ">
                                             <strong>Company Name: </strong><a class="text-primary" href="view-company-profile.php?cname=<?php echo $row['name']; ?>"> <?php echo $row['name']; ?></a>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 ">
                                          <div class="post-des ">
                                             <strong>Role:</span></strong> <?php echo $row['role']; ?></span>
                                          </div>
                                       </div>
                                    </div>
                                    <!---row--->
                                    <div class="row">
                                      <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                             <strong>Qualification:</strong><!--<span> <?php //echo $row['qualification']; ?></span>-->
                                         
           
                                         
                                          <?php 
               
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
                        
                        ?>
										  </div>
                                       </div>
									   <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                             <strong>Course:</strong><!--<span> <?php //echo $row['qualification']; ?></span>-->
											 
            
											 
											 
											 <?php 
              
                        
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
                        
                        ?>
                                          </div>
                                       </div>
									   <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                             <strong>Specialization:</strong><!--<span> <?php //echo $row['qualification']; ?></span>-->
		
											 
            																						 
											  <?php 
              
              
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
              
              
                        ?>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                            <strong>Skills:</strong><span> <?php echo $row['skills']; ?></span>
                                          </div>
                                       </div>
                                      <div class="col-lg-6 ">
                                          <div class="post-des mt-3">
                                             <strong>Application Type:</strong><span> <?php echo $row['atype'];?> <?php echo $row['year']; ?></span>
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
                                       <strong style="margin-left:120px">Job Location: </strong><span>
                                       			   
                    <?php 
					     
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$row['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
						
		?><?php  echo $getstatedetails['statename'];?> , <?php  echo $getcitydetails['cityname']; ?></span>




									<!--   <a class="btn btn-info pull-right"onClick="return confirm('Sure to apply!')" href="candidate_apply1.php?caid=<?php echo $_SESSION['id']; ?>&fid=<?php echo  $row['fid']; ?>">Apply</a>-->
									  <a class="btn btn-info pull-right"onClick="return confirm('Sure to apply!')" href="testmail.php?caid=<?php echo $_SESSION['id']; ?>&fid=<?php echo  $row['fid']; ?>">Apply</a>
                                    </div>
                                 </div>
    
                              </div>

						  
						   			
   
                           </div>
                 </div>
                     </div>
                  </div>
               </div>
            </div>
			<br>
<?php
     }
}
 else
			            {
?>
				   <div>
				   <h2>No Jobs For You</h2>		
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
                     <a class="btn btn-primary" href="candidate-logout.php">Logout</a>
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
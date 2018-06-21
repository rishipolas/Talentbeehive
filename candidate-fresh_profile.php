<?php
session_start();

if(! isset($_SESSION['email']))			
   header('location: candidate-login.php');


include('config1.php');
$q="select * from candidate where email='{$_SESSION['email']}'";
$result=mysqli_query($DB,$q);
$num=mysqli_num_rows($result);

$q1="select * from candidate where email='{$_SESSION['email']}'";
$result1=mysqli_query($DB,$q1);
$num1=mysqli_num_rows($result1);



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
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
	   <div class="row">
	 <div class="container ">
	 
	 <div class="col-lg-9 mb-3 card applied-marque " style="Padding:10px">
	                                           
	
	
	
	<marquee behavior="alternate" direction="left" style="font-size:25px"><a href="candidate-complete-profile.php" >Update Your Profile</a></marquee>
	 </div>
	 </div>
	 </div>
      <!-- Icon Cards-->
      <div class="row">
	    
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card">
            <div class="card-body">
              
              <div class="mr-5">Applied</div>
            </div>
            

            
			<?php
			
			$qu="select count(*) as maxnum from candidate_job_applied where can_name='{$_SESSION['name']}' and status='applied' ";
            $resultu=mysqli_query($DB,$qu);
            $rowu = mysqli_fetch_array($resultu);
 
			?>
            <a class="card-footer text-white clearfix small z-1 bg-info" href="candidate-applied-job.php?id=<?php echo $_SESSION['id']; ?>">
              <span>Total Applied Job<span class="badge pull-right"><?php echo $rowu['maxnum']; ?></span></span>
             
            </a>
          </div>
        </div>
         <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card">
            <div class="card-body">
  
  
   
              
              <div class="mr-5">Shortlist</div>
            </div>
			<?php
			
			$qs="select count(*) as maxnum from candidate_job_applied where can_name='{$_SESSION['name']}' and status='shortlisted'";
            $results=mysqli_query($DB,$qs);
            $rows = mysqli_fetch_array($results);
 
			?>
            <a class="card-footer text-white clearfix small z-1 bg-warning" href="company-shortlist.php?id=<?php echo $_SESSION['id']; ?>">
              <span>Total Shortlist<span class="badge pull-right"><?php echo $rows['maxnum']; ?></span></span>
             
            </a>
          </div>
        </div>
        
        
	<div class="col-xl-3 col-sm-6 mb-3">
          <div class="card">
            <div class="card-body">     
              <div class="mr-5">Jobs</div>
            </div>
<?php
		if($num1>0)
		{
	    $row3= mysqli_fetch_array($result1) 
?>
            <a class="card-footer text-white clearfix small z-1 bg-success" href="candidate-jobs.php?course=<?php echo $row3['course']; ?>&role=<?php echo $row3['role']; ?>" >
<?php
			 $qj="select count(*) as maxid from functionality where course='".$row3['course']."' OR role='".$row3['role']."'  ";
$resultj=mysqli_query($DB,$qj);
$rowj= mysqli_fetch_array($resultj);
//$maxid = $rowj['maxid'];
?>
			 <span>Jobs For you<span class="badge pull-right"><?php echo $rowj['maxid']; ?></span></span>
<?php
					 
						
}
					
?>
             
            </a>
          </div>          
        </div>
        
     </div>
   
   
      
      <div class="row">
        <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
           
            <div class="card-body">
              <div class="row">






<?php
	    
		if($num>0)
		{
	    $row2 = mysqli_fetch_array($result) 
			?>




                <div class="col-sm-11">
                  <div id="editfreshname" class="h4 mb-0"> <?php echo $row2['name'] ;?></div>
                 
				   <div  id="editfreshemail" class="mt-2 text-primary"><i class="fa fa-envelope " style="color:black;" aria-hidden="true"></i>  <?php echo $row2['email'] ;?></a></div>
				   <div id="editfreshno" class="mt-2 text-primary"><i class="fa fa-phone-square" style="color:black;" aria-hidden="true"></i> <?php echo $row2['contact'] ;?></div>
                
				
                </div>
					
              </div>
			  
          </div>
           	    <input type="hidden" name="id" value="<?php echo $row2['id'];?>">
          </div>
		  
   
          </div>
          <!-- /Card Columns-->
        </div>
		
		
		<div class="row">
        <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
           
            <div class="card-body">
              <div class="row">
    
   
    
               
                <div class="col-sm-12">
				    <div class="h4 mb-2"> Personal</div>
					<ul class="personal-profile mb-2">
                      <li >
					  <strong class="personal-strong">Name</strong>
					  <em id="editfrshpname"class="text-primary"><?php echo $row2['name'];?></em>
					  </li>
					   <li>
					  <strong class="personal-strong">Email</strong>
					  <em id="editfrshpemail" class="text-primary"><?php echo $row2['email'];?></em>
					  </li>
					  <li>
					  <strong class="personal-strong">Mobile</strong>
					  <em id="editfrshpno" class="text-primary"><?php echo $row2['contact'];?></em>
					  </li>
					  <li>
					  <strong class="personal-strong">Location</strong>
					   
                    <?php 
					     
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$row2['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row2['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
						
		?>
			
					  <em id="editfrshplocation" class="text-primary"><?php  echo $getstatedetails['statename'];?> , <?php  echo $getcitydetails['cityname']; ?></em>
					  </li>
					 
	              </ul>
				 
				</div>
				
              </div>
			  
            </div>
           
          </div>
   
          </div>
          <!-- /Card Columns-->
        </div>


 
		
		<div class="row">
        <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
           
            <div class="card-body">
              <div class="row">
                
                <div class="col-sm-12">
				    <div class="h4 mb-2">Education</div>
					<ul class="personal-profile">
                      <li>
					  <strong class="personal-strong">Highest Qualification</strong>
					  <em id="highestq"class="text-primary">
					  <?php 
					     
                         $getqualification=mysqli_query($DB,"select qualification  from qualification where id=".$row2['qualification']);
                         $getqualificationdetails = mysqli_fetch_array($getqualification);
						 echo $getqualificationdetails['qualification'];?>
						 </em>
					  </li>
					  
					    <li>
					  <strong class="personal-strong">Course</strong>
					  <em id="highestq"class="text-primary">
					   <?php 
					    
                         $getcourse=mysqli_query($DB, "select course  from course where c_id=".$row2['course']);
                         $getcoursedetails = mysqli_fetch_array($getcourse);
						 echo $getcoursedetails['course'];?>
						 </em>
					  </li>
					  
					  
					    <li>
					  <strong class="personal-strong">Specialization</strong>
					  <em id="highestq"class="text-primary">
					  <?php 
					    
                         $getspecialization=mysqli_query($DB, "select specialization  from specialization where s_id=".$row2['specialization']);
                         $getspecializationdetails = mysqli_fetch_array($getspecialization);
						 echo $getspecializationdetails['specialization'];?></em>
					  </li>
					  
					   <li>
					  <strong class="personal-strong">Marital Status</strong>
					  <em id="specialization"class="text-primary"><?php echo $row2['marital'];?></em>
					  </li>
					   <li>
					  <strong class="personal-strong">Total Experience</strong>
					  <em id="ex"class="text-primary"><?php echo $row2['year'];?> <?php echo $row2['months'];?></em>
					  </li>
					 <li>
					  <strong class="personal-strong">Functional Role</strong>
					  <em id="skill" class="text-primary"><?php echo $row2['role'];?></em>
					  </li>
	              </ul>
				</div>
			
              </div>
			  
            </div>
           
          </div>
   
          </div>
          <!-- /Card Columns-->
        </div>
		<div class="row">
        <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
  
  
 
           
            <div class="card-body">
              <div class="row">
			
                 <?php
							  if ( $row2['video'] == "")
							  {
					
							  ?>
							  
						  
							  
							  
							    <div class="col-sm-3">
                  <div id="editLabel" class="h6 mb-0"> Video Profile</div>
				 </div>
							  <div class="row">
					<div class="col-sm-8">
				   <div  class="mt-2 text-primary" style="align:right">Video Profile Not Uploaded</div>
				   <!--class="fa fa-check"-->
				   </div>	 
				 </div>
				  
				   <?php
							  }
							  else
							  {
		                      ?>
                <div class="col-sm-12">
				 <div class="row">
				  <div class="col-sm-3">
                  <div id="editLabel" class="h6 mb-0"> Video Profile</div>		
				  </div>
				   <div class="col-sm-9">
				    
 
  <button id="uploadvideobtn" type="button" class="btn btn-default btn-sm  pull-right" style="cursor:pointer">View Video</button>
   <button id="cancelvideobtn" type="button" class="btn btn-default btn-sm  pull-right" style="cursor:pointer">Close Video</button>
 

				   </div>
                   </div>
				   
							  
					
				
				    <div class="row">
					<div class="col-sm-3">
				   <div  class="mt-2 text-primary"><a href="<?php echo 'video/' .$row2['video'];?>">Video</a><i class="fa fa-check" aria-hidden="true"></i></div>
				   
				   </div>
				   
				   
	  
			   
					 <div class="col-sm-8">
				   <div id="uploadDiv">
                      <video controls controlsList="nodownload" class="btn btn-default video-profile btn-sm" href="<?php echo 'video_upload/'.$row2['video']?>" height="250px" width="250px" id="bgvideo">
                                                <source src="<?php echo 'video/' .$row2['video'];?>" type="video/mp4">
                                             </video>
                                             
                                             
                                             
<!--<a id="uploadresumebtn"  class="btn  btn-default view-pdf  btn-sm  pull-right" style="cursor:pointer" href="<?php //echo 'resume/' .$row2['res'];?>">View Resume</a>-->

                     </div>
					 </div>
					 
				 </div>
							 
                </div>
				 <?php }
							  ?>
				 
              </div>
			  
            </div>
           
          </div>
   
          </div>
          <!-- /Card Columns-->
        </div>
		<div class="row">
        <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
    
    
   
           
            <div class="card-body">
              <div class="row">
                <?php
							  if ( $row2['res'] == "")
							  {
					
							  ?>
				
				  <div class="col-sm-3">
                  <div id="editLabel" class="h4 mb-0"> Resume</div>
				  </div>
				   <div class="row">
					<div class="col-sm-8">
				   <div  class="mt-2 text-primary" style="align:right">Resume Not Uploaded</div>
				   
				   <!--class="fa fa-check"-->
				   </div>	 
				 </div>
				    <?php
							  }
							  else
							  {
		                      ?>
                <div class="col-sm-12">
				 <div class="row">
				  <div class="col-sm-3">
                  <div id="editLabel" class="h4 mb-0"> Resume</div>
				  </div>
				   <div class="col-sm-9">
	
	
			  

  <a id="uploadresumebtn"  class="btn  btn-default view-pdf  btn-sm  pull-right" style="cursor:pointer" href="<?php echo 'resume/' .$row2['res'];?>">View Resume</a>
   <!--<a class="btn btn-primary view-pdf align-center modal-center" href=" <?php //echo 'docs/' .$row['cpre'] ?>">View PPT</a>-->     

				   </div>
                   </div>
				   
				   <div  class="mt-2 text-primary"><a href="<?php echo 'resume/' .$row2['res'];?>">Resume</a><i  class="fa fa-check" aria-hidden="true"></i></div>
				
                </div>
							  <?php
							  }
							  ?>
              </div>
			  
            </div>
           
          </div>
		   </div>
          	 <?php
					 
						
					}
					
					?>
         
          <!-- /Card Columns-->
        </div>
<!--end res-->
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

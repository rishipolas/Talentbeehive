<?php
   session_start();
   
   if(! isset($_SESSION['email']))
   header('location: institute_profile.php');
   
   
   include('../config1.php');
   
   $q1="select * from  institute_registration where email='{$_SESSION['email']}'";
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
               <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
         </ol>
         <!-- Icon Cards-->
         <div class="row mt-4">
            <div class="col-lg-9">
               <div class="row mt-4">
                  <div class="col-xl-4 col-sm-6 mb-3">
                     <div class="card">
                        <div class="card-body">
                           <div class="mr-5">Applied</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1 bg-info" href="">
                        <span>Total Applied Job<span class="badge pull-right"><?php //echo $row['maxid'];?></span></span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-4 col-sm-6 mb-3">
                     <div class="card">
                        <div class="card-body">
                           <div class="mr-5">Shortlist</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1 bg-warning" href="">
                        <span>Total Shortlist<span class="badge pull-right"><?php //echo $row['maxid'];?></span></span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-4 col-sm-6 mb-3">
                     <div class="card">
                        <div class="card-body">
                           <div class="mr-5">Jobs</div>
                           <?php
		if($num1>0)
		{
	    $row3= mysqli_fetch_array($result1) 
?>
   
                        </div>
                       <a class="card-footer text-white clearfix small z-1 bg-success" href="institute_job_view.php?course=<?php echo $row3['course']; ?>" >
                        
                        <?php
			 $qj="select count(*) as maxid from company_jobinstitute where course='".$row3['course']."' ";
			$resultj=mysqli_query($DB,$qj);
			$rowj= mysqli_fetch_array($resultj);
//$maxid = $rowj['maxid'];
?>
	
                        <span>Jobs For you<span class="badge pull-right"><?php echo $rowj['maxid'];?></span></span>
                        
                        <?php
					 
						
}
					
?>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <!-- Example Bar Chart Card-->
                     <div class="card mb-3">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-sm-2">
                                 <?php
                                    include('../config1.php');
                                    $sql="select * from institute_registration where email='{$_SESSION['email']}'";
                                    
                                    //$sql = "SELECT * FROM institute_registration where id=6";
                                    
                                    $result = mysqli_query($DB, $sql);
                                    
                                    if (mysqli_num_rows($result) > 0) 
                                    {
                                      // output data of each row
                                      while($row = mysqli_fetch_assoc($result))
                                      {
                                    ?>
                                 <img src="<?php echo 'institutelogo/'.$row['institute_logo'] ?>" width="90px" height="90px">
                              </div>
                              <div class='col-sm-10'>
                                 <?php
                                    echo "<div id='editfreshname' class='h4 mb-0'> ".$row["institute_name"]."</div>";
                                    
                                    echo "<div  id='editfreshemail' class='mt-2 text-primary'><i class='fa fa-envelope' style='color:black;' aria-hidden='true'></i>".$row["website_url"]."</a></div>";
                                    echo "<div id='editfreshno' class='mt-2 text-primary'><i class='fa fa-phone-square' style='color:black;' aria-hidden='true'></i>".$row["mobile"]."/".$row["landline"]."</div>";
                                    ?>
                              </div>
                           </div>
                           <!--button id="editsave" type="button" class="btn btn-success btn-sm">Save</button>
                              <button id="editcancel" type="button" class="btn btn-default btn-sm">Cancel</button-->
                        </div>
                     </div>
                     <!--card mb3-->
                  </div>
                  <!-- /Card col-lg-12-->
               </div>
               <!--row-->
               <div class="row">
                  <div class="col-lg-12">
                     <!-- Example Bar Chart Card-->
                     <div class="card mb-3">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-sm-12">
                                 <div class="h4 mb-2"> Personal</div>
                                 <ul class="personal-profile mb-2">
                                    <!--<li >
                                       <strong class="personal-strong">Name</strong>-->
                                    <?php
                                       //echo "<em id='editfrshpname' class='text-primary'>".$row["institute_name"]." </em>";
                                       //echo "</li>";
                                       echo "<li>";
                                       echo "<strong class='personal-strong'>Email</strong>";
                                       echo "<em id='editfrshpemail' class='text-primary'>".$row["email"]."</em>";
                                       echo "</li>";
                                       echo "<li>";
                                       echo "<strong class='personal-strong'>Conatct Person</strong>";
                                       echo "<em  class='text-primary'>".$row["contact_person"]."</em>";
                                       echo "</li>";
                                       echo "<li>";
                                       echo "<strong class='personal-strong'>Contact Mobile</strong>";
                                       echo "<em id='editfrshpno' class='text-primary'>".$row["mobile"]." </em>";
                                       echo "</li>";
                                       echo "<li>";
                                       echo "<strong class='personal-strong'>Landline</strong>";
                                       echo "<em id='editfrshpno' class='text-primary'>".$row["landline"]."</em>";
                                       echo "</li>";
                                       
                                       echo "<li>";
                                       echo "<strong class='personal-strong'>Location</strong>";
                                       
                                       
                                       $getstate=mysqli_query($DB,"select statename from state where id=".$row['state']);
                                       $getstatedetails = mysqli_fetch_array($getstate);
                                       
                                       $getcity=mysqli_query($DB, "select cityname from city where c_id=".$row['city']);
                                       $getcitydetails = mysqli_fetch_array($getcity);
                                       
                                       
                                       
                                       echo "<em id='editfrshplocation' class='text-primary'>".$getstatedetails['statename']." -".$getcitydetails['cityname']."</em>";
                                       
                                       
                                       
                                       
                                       echo "</li>";
                                       
                                       
                        
                        
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
                                       
                                       echo "<li>";
                                       echo "<strong class='personal-strong'>Qualification</strong>";
                                       echo "<em id='editfrshptraining' class='text-primary'>".$st."</em>";                                      							 						
                                       echo "</li>";
                                       
                                       
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
						 
					
                                        echo "<li>";
                                       echo "<strong class='personal-strong'>Course</strong>";
                                       echo "<em id='editfrshptraining' class='text-primary'>".$st1."</em>";
                                       echo "</li>";
                                       
                                       
                                       //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                       } //while
                                       } else 
                                       {
                                       echo "0 results";
                                       }
                                       ?>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /Card Columns-->
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <!-- Example Bar Chart Card-->
                     <div class="card mb-3">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-sm-12">
                                 <div class="row">
                                    <div class="col-sm-3">
                                       <div id="editLabel" class="h4 mb-0"> Presentation</div>
                                    </div>
                                    <?php
                                       if ( $row['video'] == "NULL")
                                       {
                                       
                                       ?>
                                    <div class="row">
                                       <div class="col-sm-5"></div>
                                       <div class="col-sm-7">
                                          <div  class="mt-2 text-primary" style="align:right">Presentation Not Uploaded</div>
                                          <br>
                                          <!--class="fa fa-check"-->
                                       </div>
                                    </div>
                                    <?php
                                       }else
                                       {
                                         ?>                                                              
                                    <div class="col-sm-5">      
                                      <a id="uploadresumebtn"  class="btn  btn-default view-pdf  btn-sm  pull-right" style="cursor:pointer" href="<?php echo '../institutevideo/' .$row['video'];?>">View Presentation</a>                                     
                           
                                                <source src="<?php echo '../institutevideo/' .$row['video'];?>" type="video/mp4">
                                             </video>      
                                      
                                       <?php
                                          }
                                          ?>
                                    </div>
                                 </div>
                                 
                                 
                                 <br>
                                 
                                 
                                 
                                 <div class="col-sm-12">
                                    <div class="row">
                                       <div class="col-sm-3">
                                          <div id="editLabel" class="h4 mb-0"> Import Excelsheet</div>
                                       </div>
                                      
                                       <div class="col-sm-9">
                                          <form action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                             <input type="file" name="file" id="file" class="input-large">
                                             <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
                                         <br>    .csv
                                          </form>
                                      
                                       
                                       </div>
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /Card Columns-->
               </div>
               <div>
                  <!------col-lg-9------>
               </div>
            </div>
         </div>
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
         <script src="../js/edit.js"></script>
         <script src="../js/blink-update.js"></script>
         <script src="../js/js-news.js"></script>
      </div>
   </body>
</html>
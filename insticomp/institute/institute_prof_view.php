<?php
//session_start(); 
  
//if(!isset($_SESSION['email']))
	//header('location:company-login.php');

 include('config1.php');
 $cid=$_GET['cid'];
 $email=$_GET['iid'];
 $ids=$_GET['inid'];
$fname=$_GET['fname'];
$q="SELECT * FROM institute_registration where email='".$email."'";
$result=mysqli_query($DB,$q);
$num=mysqli_num_rows($result);
//echo $_GET['fid'];
$filepath="./excel/$ids/filter/$fname".".xls";
date_default_timezone_set("Asia/Kolkata");
$dt=$cid.",".date("d-m-y");
$sfile=$dt.".xls";
$path="./excel/$ids/shortlist/$sfile";

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

<body id="page-top">
 <!-- Navigation-->
     
     
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
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Institute Profile</a>
        </li>
        <li class="breadcrumb-item active">View</li>
      </ol>

     




                  

   <?php
         if($num==1)
		   {
			    $row= mysqli_fetch_array($result) 
      ?>
      
      <div class="row">
        <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3 yellow-border">
            
			<h4 style="background-color:#FFC107; color:#000;padding:10px; border-bottom:2px solid #000; " >Institute Profile</h4>
			
            <div class="card-body">
              <div class="row">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
								
                                <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Name </strong></td>
                            <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['institute_name'];?></td>
                                 
                                </tr>
                              
                                   <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Email </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['email'];?></td>
                                 
                                </tr>

                              <tr>
                                  
                        <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Contact Person </strong></td>
                         <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['contact_person'];?></td>
                                 
                        </tr>

                          <tr>
                       <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Website URL </strong></td>
                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php
                                  
                   $web=$row['website_url'];
                   echo ('<a  target="_blank" href="https://'.$web.'" >' . $web . '</a>');
                   ?></td>
                     </tr> 


                                <tr>
                                  
                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong> Qualification </strong></td>
                  <td width="52%" align="left" valign="top" style="line-height:30px">
                    <?php 
              
            $getqualificationasd =  $row['qualification'];
               
             
               $gmht=explode(",", $getqualificationasd);
               $str="";
               foreach ($gmht as $y) {
                $q11="select qualification  from qualification where id='$y'";
                $resultt12 = mysqli_query($DB,$q11);
                $row11=mysqli_fetch_array($resultt12);
                $y=$row11['qualification'];
                $str=$str.$y.",";
               }
               echo $str;
               ?>
               
             </td>
                                 
                                </tr>
                              
                               <tr>
                                  
                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Courses</strong></td>
                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php 
              
            $getqualificationasd =  $row['course'];
               
             
               $gmht=explode(",", $getqualificationasd);
               $str="";
               foreach ($gmht as $r) {
                $q11="select course  from course where c_id='$r'";
                $resultt12 = mysqli_query($DB,$q11);
                $row11=mysqli_fetch_array($resultt12);
                $r=$row11['course'];
                $str=$str.$r.",";
               }
               echo $str;
               ?>
                 
               </td>

               </tr>
               
								
								<tr>
                                  
                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Mobile No </strong></td>
                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['mobile'];?></td>
                                 
                                </tr>

                                <tr>
                                  
                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Landline No </strong></td>
                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['landline'];?></td>
                                 
                                </tr>
                              
                             <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Location </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px">
                                           
                    <?php 
               
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$row['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
            
    ?>
    <?php  echo $getstatedetails['statename'];?> , <?php  echo $getcitydetails['cityname']; ?></td>
                                 
                                </tr>    
                                
                                                  <tr>
                                  
                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Video </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><a class="btn btn-default" onclick="return confirm('Do You Really want to Request For video ');"  href="institute_request_video.php?video_status=send&email=<?php echo $row['email'];?>">Request Video Profile/PPT</a>
                
                                </tr>
               <!-- <?php
                }
               // else 
                {
                          ?>-->
                          <tr>
                            <td><br></td>
                          </tr>
               <tr>
                                  
                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Video </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><video controls controlsList="nodownload" class="btn btn-default video-profile btn-sm" href="<?php echo 'institutevideo/'.$row['video']?>" height="150px" width="150px" id="bgvideo">
                                                <source src="<?php echo 'institutevideo/' .$row['video'];?>" type="video/mp4">
                                             </video>
                                           </td>  
                                                
          
      
              
                                              
                              </tr>
                             
                                <?php
                }
                ?>
                  
                                
                              </tbody></table>
              </div>
            </div>
           <a type="button" class="btn btn-success " href="ExcelDLL.php?id=<?php echo $ids;?>&fname=<?php echo $fname;?>&sfile=<?php echo $sfile;?>&cid=<?php echo $cid;?>">Accept</a>
          </div>
   
          </div>



		  <!-- 
		   <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <!-- <div class="card mb-1 yellow-border">
            
			<h4 style="background-color:#FFC107; color:#000;padding:10px; border-bottom:2px solid #000; " >Institute Video</h4>
			
            <div class="card-body">
              <div class="row">
     
				
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
								
                               <!-- <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Resume </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><div  class="mt-2 text-primary"><a href="<?php// echo 'resume/' .$row['student_profile'];?>">Resume</a><i class="fa fa-check" aria-hidden="true"></i></div></td>
                                 
                                </tr>
                                <?php
							 // }
						
							 // if ( $row['student_video'] == "")
							  {
					
							  ?>-->
                                <!--    <tr>
                                  
							    
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Video </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><a class="btn btn-default" onclick="return confirm('Do You Really want to Request For video ');"  href="request1.php?status=Video&id=<?php //echo $_POST['id'];?>&fid=<?php //echo $row['fk_func_id']; ?>">Request Video Profile/PPT</a>
							  
                                </tr>
							 <!-- <?php
							  }
							 // else 
							  {
		                      ?>
                        <!--   <tr>
                            <td><br></td>
                          </tr>
							 <tr>
                                  
							    
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Video </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><video controls controlsList="nodownload" class="btn btn-default video-profile btn-sm" href="<?php //echo 'video/'.$row['video']?>" height="150px" width="150px" id="bgvideo">
                                                <source src="<?php //echo 'video/' .$row['student_video'];?>" type="video/mp4">
                                             </video>
                                           </td>  
                                                
          
      
							
                                         			
                              </tr>
                             
                                <?php
							  }
							  ?>
							    
                     
                              </tbody></table>
							 
              </div>
            </div>
		
            
            <a type="button" class="btn btn-danger " href="ExcelDLL.php?id=<?php echo $ids;?>&fname=<?php echo $fname;?>&sfile=<?php echo $sfile;?> &cid=<?php echo $cid;?>">Accept</a>
          </div>-->

          <!-- /Card Columns-->
        </div>


	<!--<div class="col-lg-9">
		  <div class="card mb-3 yellow-border">
            
			
			
            <div class="card-body">
              <div class="row">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
								
                                 <tr>
                              <td width="62%" align="left" valign="bottom" style="line-height:30px">
           <!--  <div class="btn-group-sm pull-center">
                    <a type="button" class="btn btn-danger" href="#" style="line-height:40px">Accept</a>
                                          
									 
											
                                          </div>-->
         <!--</td>  
                              </tr>
                              
                                   
								
							
                                
                              </tbody></table>
              </div>
            </div>
           
          </div>
	</div>	-->

      </div>
	  <!--<?php
    //}
?>-->
      <br><br>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <!--<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © talentbeehive.com</small>
        </div>
      </div>
    </footer>-->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    
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

<?php
//session_start(); 
  
//if(!isset($_SESSION['email']))
  //header('location:company-login.php');

include 'config1.php';
$cid=$_GET['cid'];
$instid=$_GET['instid'];
$ids=$_GET['id'];
$fname=$_GET['fname'];
$sfile=$_GET['sfile'];
$q="SELECT * FROM student_registration where id='$ids'";
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
            
      <h4 style="background-color:#FFC107; color:#000;padding:10px; border-bottom:2px solid #000; " >Personal</h4>
      
            <div class="card-body">
            
            <div class="row">
                 <?php
                if ( $row['student_photo'] == "")
                {
          
                ?>
                 <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
                   <tr>
                                  
                      <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Photo </strong></td>
        <td width="52%" align="left" valign="top" style="line-height:30px"><div  class="mt-2 text-primary">Photo Not Uploaded</div></td>
                                 
                                </tr>
          <?php
                }
                else
                {
                          ?>
        
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
                
                                <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Photo </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><div  class="mt-2 text-primary"><img src="<?php echo 'student_resume/' .$row['student_photo']; ?>" height="100" width="100"> </div></td>
                                 
                                </tr>
                                <?php
                }
            
               
          
                ?>
                                   
                
               
                        
                  
                                
                              </tbody></table>
                
              </div>
            
            
              <div class="row">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
                
                                <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Name </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['student_name'];?></td>
                                 
                                </tr>
                              
                                   <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Email </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['email'];?></td>
                                 
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
                                  
                                <!--   <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Mobile no </strong></td>
                                 <td width="52%" align="left" valign="top" style="line-height:30px"><?php //echo $row['contact_number'];?></td>-->
                                 
                                </tr>
                               
                              
                            
                                
                              </tbody></table>
              </div>
            </div>
           
          </div>
   
          </div>



       <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3 yellow-border">
            
      <h4 style="background-color:#FFC107; color:#000;padding:10px; border-bottom:2px solid #000; " >Education</h4>
      
            <div class="card-body">
              <div class="row">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
                
                 <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Course </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php //echo $row['qualification'];?>
                  <?php 
              
                         $getcourse=mysqli_query($DB, "select course  from course where c_id=".$row['course']);
                         $getcoursedetails = mysqli_fetch_array($getcourse);
             echo $getcoursedetails['course'];?>
                  </td>
                                 
                                </tr>
                 <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Specialization </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php //echo $row['qualification'];?>
                  <?php 
              
                         $getspecialization=mysqli_query($DB, "select specialization  from specialization where s_id=".$row['specialization']);
                         $getspecializationdetails = mysqli_fetch_array($getspecialization);
             echo $getspecializationdetails['specialization'];?>
                  </td>
                                 
                                </tr>
                              
                       
                               
                              
                            
                                
                              </tbody></table>
              </div>
            </div>
           
          </div>
   
          </div>
       <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <div class="card mb-1 yellow-border">
            
      <h4 style="background-color:#FFC107; color:#000;padding:10px; border-bottom:2px solid #000; " >Resume</h4>
      
            <div class="card-body">
              <div class="row">
                 <?php
                if ( $row['student_profile'] == "")
                {
          
                ?>
                 <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
                   <tr>
                                  
                      <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Resume </strong></td>
        <td width="52%" align="left" valign="top" style="line-height:30px"><div  class="mt-2 text-primary">Resume Not Uploaded</div></td>
                                 
                                </tr>
          <?php
                }
                else
                {
                          ?>
        
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
                
                                <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Resume </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><div  class="mt-2 text-primary"><a href="<?php echo 'student_resume/' .$row['student_profile'];?>">Resume</a><i class="fa fa-check" aria-hidden="true"></i></div></td>
                                 
                                </tr>
                                <?php
                }
            
               
          
                ?>
                                   
                
               
                        
                  
                                
                              </tbody></table>
                
              </div>
              
              
              <div class="row">
                 <?php
                if ( $row['student_video'] == "")
                {
          
                ?>
                 <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
                   <tr>
                                  
                      <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Video </strong></td>
        <td width="52%" align="left" valign="top" style="line-height:30px"><div  class="mt-2 text-primary">Video Not Uploaded</div></td>
                                 
                                </tr>
          <?php
                }
                else
                {
                          ?>
        
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
                
                                <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Video </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><div  class="mt-2 text-primary"><a href="<?php echo 'student_resume/' .$row['student_video'];?>">Video </a><i class="fa fa-check" aria-hidden="true"></i></div></td>
                                 
                                </tr>
                                <?php
                }
            
               
          
                ?>
                                   
                
               
                        
                  
                                
                              </tbody></table>
                
              </div>
              
              
              
            </div>
    
           
          </div>
          <!-- /Card Columns-->
        </div>
  <div class="col-lg-9">
      <div class="card mb-3 yellow-border">
            
      
      
            <div class="card-body">
              <div class="row">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
                
                                 <tr>
                              <td width="62%" align="right" valign="bottom" style="line-height:30px">
             <div class="btn-group-sm pull-right">
                 
                 
                 <?php 
                 
                 if(isset($_GET['rowno']))
                 {
                     $rowno=$_GET['rowno'];
                 }
                 
                 
                 
                 
                 ?>
                 <?php
			$shortlist='ShortList';
			$q="SELECT * FROM shorlist where sid='$ids'";
			$result=mysqli_query($DB,$q);
			
			if($row = $result->fetch_assoc()){?>
			<input class="btn btn-success" type="button" value="ShortListed">
			
			<?php	
			}
			else{
			?><a type="button" class="btn btn-success" href="SortList.php?userInput=<?php  echo $ids;?>&& rowno=<?php echo $rowno;?>&&fname=<?php echo $fname;?>&&sfile=<?php echo $sfile;?>&&instid=<?php echo $instid;?>&&cid=<?php echo $cid;?>">Shortlist</a>
			
			<?php
			}
		
    		 ?>
                 
                 
                                          
                 <a type="button" class="btn btn-primary" href="ExcelDLL.php?id=<?php echo $instid;?>&&fname=<?php echo $fname;?>&&sfile=<?php echo $sfile;?>">Back Page</a>
                                          </div>
         </td>  
                              </tr>
                              
                                   
                
              
                                
                              </tbody></table>
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
   <script src="js/edit.js"></script>
  </div>
 
 <script>
 
 function myFunction(x) {
     var searchInput=x;
     alert(searchInput);
     
     $.ajax({
     type: 'POST',
     url: 'SortList.php',
     data: {userInput: searchInput},
     success: function(data){
         alert(data);
     },
     error: function(){
         alert('something went wrong');
     }
});
     
     
     /*
    var qualificationID  = $('#qualification').val();
    
        if(qualificationID){
             $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'qualification='+qualificationID,
                success:function(html){
                     $('.course_select_parent').html(html);
                    $('.course_select_parent').multiselect({
                    buttonWidth: '350px',
                    maxHeight: 300,
                    
                     });
                    
         
                     
                     
                   $('#specialization').html('<option value="">Select course first</option>'); 
                }
            }); 
        }else{
            $('#course').html('<option value="">Select qualification first</option>');
            $('#specialization').html('<option value="">Select course first</option>'); 
        }
    */
    
}

 
 
 
 </script>
 
 
 
</body>

</html>

<?php 




?>
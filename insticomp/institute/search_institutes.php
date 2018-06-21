<?php
session_start();

if(! isset($_SESSION['email']))
header('location: company-login.php');

 include('../config1.php');
$q="select * from users where email='{$_SESSION['email']}'";
$result=mysqli_query($DB,$q);
$details = mysqli_fetch_array($result);
$company_name=$details['cname'];
$company_id=$details['id'];
$_SESSION['cnames']=$company_name;
$_SESSION['cid']=$company_id;

?>
<?php   include_once("config1.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Talent Beehive</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
   <link href="../css/bootstrap-multiselect.css" rel="stylesheet">
  
  <script src="../vendor/jquery/jquery.min.js"></script>
 
  
  
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
          <a href="#">Search Institute</a>
        </li>
        <li class="breadcrumb-item active">View</li>
      </ol>
       <div class="row">
			<div class="col-lg-3"></div>
         	<div class="col-lg-5">	
            <div class="well-searchbox">
                <form action="search_institutes.php" class="form-horizontal" method="post" role="form">
                 <?php
					     include_once('../config1.php');
    					$query = $DB->query("SELECT * FROM state");
      
    					$rowCount = $query->num_rows;
   								 ?>	
                
                 <div class="form-group">
                        <label class="col-md-1 control-label">state</label>
                        <div class="col-md-11">
                            <select class="form-control" id="state" name="state" placeholder="Country">
                             <span class="span12 error" id="errorlocation"></span>
							     <option value="" disabled selected>Select state</option>
        
							<?php
                            if($rowCount > 0)
                            {
                                while($getState = $query->fetch_assoc())
                                {           
                                    echo '<option value="'.$getState['statename'].'">'.$getState['statename'].'</option>';	
                                }
                            }else
                            {
                                echo '<option value="">State not available</option>';
                            }
                            ?>
                            </select>
                        </div>
                    </div>

                    <?php
					     include_once('../config1.php');
    					$query = $DB->query("SELECT * FROM location");
      
    					$rowCount = $query->num_rows;
   								 ?>	
                    <div class="form-group">
                        <label class="col-md-1 control-label">City</label>
                        <div class="col-md-11">
                            <select class="form-control" id="city" name="city" >
							     <option value="" disabled selected>Select City</option>  
                                 
                                 <?php
                            if($rowCount > 0)
                            {
                                while($getCity = $query->fetch_assoc())
                                {           
                                    echo '<option value="'.$getCity['city'].'">'.$getCity['city'].'</option>';	
                                }
                            }else
                            {
                                echo '<option value="">city not available</option>';
                            }
                            ?>    		 
								 
                            </select>
                        </div>
                    </div>
                      <?php
                           
                          include_once('../config1.php');
						//Get all country data
						$query = $DB->query("SELECT * FROM course");
						
						//Count total number of rows
						$rowCount = $query->num_rows;
						
						?>
                    <div class="form-group">
                        <div class="col-md-11">
                            <label>Courses</label>
                    <select class="form-control" name="course[]" id="courses" multiple > 
                    <option value="" disabled selected >Select courses</option> 
                    
                    <?php
							if($rowCount > 0){
								while($getQualification = $query->fetch_assoc()){ 
									echo '<option value="'.$getQualification['c_id'].'">'.$getQualification['course'].'</option>';
								}
							}else{
								echo '<option value="">qualification not available</option>';
							}
							?>
                     </select>
                            
                        </div>
                    </div>

                     <div class="col-sm-offset-4 col-sm-5">
                        <button type="submit" name="submit" id="submit" class="btn btn-success">Search</button>
                    </div>
                </form>
            </div>
            </div>
			<div class="col-lg-4"></div>
	        </div>
			
			<section class="card mb-3" id="search-result">
        <div class="card-header">
          <i class="fa fa-table"></i> Search Result</div>
          <?php
  
  
   if(!isset($location)) echo $location=null;
    if(!isset($state)) echo $state=null;
   if(!isset($course)) echo $course=null;
    if(!isset($str1)) echo $str1=null;
	 if(!isset($str2)) echo $str2=null;
    if(!isset($str3)) echo $str3=null;
   if(isset($_POST['submit']))
  {
   if(isset($_POST['state'])) {
   $state = $_POST['state'];
   }
   
   if(isset($_POST['city'])) {
    $location = $_POST['city'];
	} 
	$condition='';
   if(isset($_POST['course']))
   {
	    $course = $_POST['course'];
		$count=count($course);
		$str1=$str2=$str3="17";
		
		if($count >= 1)
		{
			$str1=$course[0];
			
			
		}
		
		if($count>= 2)
		{
			$str2=$course[1];
			
		}
		
		if($count >= 3)
		{
			$str3=$course[2];
			
		}
		
		


 }
 
  
  
//

  
   //fetching record from two tables
   $getsearch = mysqli_query($DB,"SELECT a.id,a.institute_name,a.email, a.website_url,b.cityname, a.course,a.invitation FROM course c,city b,institute_registration a ,state s WHERE b.c_id=a.city AND a.state=s.id and a.course=c.c_id AND  b.cityname LIKE '%$location%' and s.statename LIKE '%$state%' and (a.course LIKE '%$str1%' or a.course LIKE '%$str2%' or a.course LIKE '%$str3%')") or die(mysql_error()); 
    
  
  
   
 
	
    $getsearch2 = mysqli_query($DB,"SELECT * FROM invitation_to_institute") or die(mysql_error()); 
      $getsearchdetails2 = mysqli_fetch_array($getsearch2);
	  
  ?>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
              <thead>
                <tr>
                   <tr>
                    <th>Institute Name</th>
                 
                  <th>Location</th>
                  <th>Website</th>
                 
                  <th>Course</th>
                
                 <th>Invite</th>
                  
                </tr>
              </thead>
              <?php   
				  
				 $q="select * from invitation_to_institute";
				 $result=mysqli_query($DB,$q);
                  $num=mysqli_num_rows($result);
				  $row1=mysqli_num_rows($getsearch);
				  if($row1==0){
				      echo "<h3>No records Founds</h3>";
					 
				  }	
                  
				  	if($num>0)
				{
					 
					 for($i=1;$i<=$num;$i++)
				{	
					
				$row=mysqli_fetch_array($result);
				$Status=$row['status'];	
				
	
                 while($getsearchdetails = mysqli_fetch_array($getsearch))
				 {
					 
                  $invite=$getsearchdetails['invitation'];
                  // $status=$getsearchdetails2['status'];
				 $web= $getsearchdetails['website_url'];
				 $ids=$getsearchdetails['id'];
				 $courser=$getsearchdetails['course'];
				 
				 $coursees=explode(",",$courser);
				
				
				 $str="";
				  foreach($coursees as $c){
				  
				  $q1="select course from course where c_id='$c'";
				  $result1=mysqli_query($DB,$q1);
				  $row1=mysqli_fetch_array($result1);
				  $c=$row1['course'];
				  $str=$str.$c.", ";
				 
				  }
				   ?>  
              <tbody>
              
                <tr>
                   <td><?php echo $getsearchdetails['institute_name'];?></td>
			
               <td><?php echo  $getsearchdetails ['cityname'];?></td> 
               
               <td><?php echo ('<a  target="_blank" href="https://'.$web.'" >' . $web . '</a>'); ?> </td>
              
               <td><?php echo $str; ?></td>
              
               
               <td>
			              
                  <a   class="btn btn-info" type="button"  href="invite_institute.php?iid=<?php echo  $ids;?>&instname=<?php echo $getsearchdetails['institute_name'];?>&emails=<?php echo $getsearchdetails['email'];?>&status=<?php echo $row['status'];?>" onclick="return confirm('Do You Really want to inactivate (<?php echo  $getsearchdetails['institute_name']; ?>)');">Invite</a>
                    </td> 
                    
               
           
             <?php } }  ?>
           
               
                </tr>
              
              </tbody>
              
         <?php }} else { echo "no record?"; } ?>
            </table>
             
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </section>
	   
	  
	     
		 
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
    <script src="../js/dropdown1.js"></script>
      <script src="../js/show-hide-collapse.js"></script>
  <script src="../js/bootstrap-multiselect.js"></script>

<script type="text/javascript">
$(document).ready(function(){
   $('#courses').multiselect({
          buttonWidth: '330px',
          maxHeight: 300,
        
        });
   
});
</script>
</body>

</html>

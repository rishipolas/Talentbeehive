<?php


session_start();
	 
if( !isset($_SESSION['email'])){
	
 	header("Location: candidate-login.php");
 	
	
}

 $con=mysqli_connect('166.62.10.54','roottalent','beehive@root');
// $con=mysqli_connect('localhost','root','');
        mysqli_select_db($con,'socialuser');

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
  <script>
function submit() {
	if((document.getElementById("cname").value == "") && (document.getElementById("type").value == "")) {
		document.getElementById("validation-message").innerHTML = "Login name or Email is required!"
		return false;
	}
	return true
}
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
          <a href="#">Shared to company</a>
        </li>
        <li class="breadcrumb-item active">My Search</li>
      </ol>
      <!-- Icon Cards-->
	  <form action="search_company.php" method="post" class="form-horizontal" role="form" onSubmit="return submit();">
	  <div id="validation-message">
								<?php if(!empty($error_message)) { ?>
								<?php echo $error_message; ?>
								<?php } ?>
								</div>
								
	    <div class="form-group">
                        <label class="col-md-6 control-label ">Company Name</label>
                        <div class="col-md-6">
                           <!--<input class="form-control" id="qualification" type="text" aria-describedby="nameHelp"  placeholder="Enter qualification" name="qualification" >-->
             <select class="form-control" id="cname" name="cname">
			<option value="" disabled selected>----Select Company-----------</option>
<?php
$sql1 = mysqli_query($con, "SELECT * From users");
$ro1= mysqli_num_rows($sql1);
while ($ro1 = mysqli_fetch_array($sql1)){
?>
     <option value="<?php echo $ro1['cname'] ?>" ><?php echo $ro1['cname'] ?></option>
        
 <?php
}
?>
          </select>		
                        </div>
                    </div>
					
					
					
					 <div class="form-group">
                        <label class="col-md-3 control-label ">Industry Type</label>
                        <div class="col-md-6">
                         
                             <select class="form-control" id="type"  name="type">
							   <option value="" disabled selected>----Select Industry Type-----------</option>      		 
<?php
$sql2= mysqli_query($con, "SELECT * From industry_type");
$ro2 = mysqli_num_rows($sql2);
while ($ro2  = mysqli_fetch_array($sql2)){
?>
<option value="<?php echo $ro2['type'] ?>"> <?php echo $ro2['type'] ?></option>
            <?php

}
?>	  
          </select>
                        </div>
                    </div>
			    
		  
			   <div class="col-xl-3 col-sm-6 mb-3">
			     <div class="form-group">
                          
                <button type="submit" class="btn btn-info" name="data">Submit</button>
             
             </div>
		     </div>
	     </div>
	  </form>
	   <div class="row" style="padding-left:43px">
	  <?php
	 
	      if(isset($_POST['data'])){
			  require('config1.php');
			  //echo '<script>alert("hey")</script>';
			 // $id=$_POST['quil'];
			//  $qualification=$_POST['qualification'];
			 // $role=$_POST['role'];
			  
//$q=" SELECT functionality.title,functionality.name as 'tname',functionality.skills FROM functionality LEFT JOIN candidate ON functionality.qualification=candidate.qualification WHERE functionality.ID is not null and functionality.qualification='$qualification'" and " SELECT functionality.name as 'tname' FROM functionality LEFT JOIN candidate ON functionlity.role=candidate.role WHERE functionality.ID is not null and functionality.role='$role'";			  

//$q=" SELECT * from (Select functionality.title,functionality.name as 'tname',functionality.skills FROM functionality LEFT JOIN candidate ON functionality.qualification=candidate.qualification WHERE functionality.ID is not null and functionality.qualification='$qualification' )join (SELECT functionality.name as 'tname' FROM functionality LEFT JOIN candidate ON functionality.role=candidate.role WHERE functionality.ID is not null and functionality.role='$role')";			  

//$q=" SELECT functionality.title,functionality.name as 'tname',functionality.skills FROM functionality LEFT JOIN candidate ON functionality.role=candidate.role WHERE functionality.ID is not null and functionality.role='$role' or functionality.qualification='$qualification' or (functionality.role='$role' and functionality.qualification='$qualification')";			  
			  
			  if ($_REQUEST["cname"]<>'') {
	           $cname = mysqli_real_escape_string($con,$_REQUEST["cname"]);
                    //echo '<script>alert("'.$cname.'")</script>';
                   
      }

if ($_REQUEST["type"]<>'') {
	$type = mysqli_real_escape_string($con,$_REQUEST["type"]);
       // echo '<script>alert("'.$role.'")</script>';
}




if ($_REQUEST["cname"]<>'' and $_REQUEST["type"]<>'') {
    			 // echo '<script>alert("if")</script>';

	$q = "SELECT * from users where cname='$cname' and type='$type'";
} 
else if ($_REQUEST["type"]<>'') {
    			 // echo '<script>alert("else if")</script>';

	$q = "SELECT * from users where type='$type'";
} else if ($_REQUEST["cname"]<>'') {
   // echo '<script>alert("else if")</script>';
	$q = "SELECT * from users where cname='$cname'";
} else if(empty($_REQUEST["cname"]<>'') and empty($_REQUEST["type"]<>'')) {
	//echo '<script>alert("else ")</script>';
	$q = "SELECT * from users ";

}

  
//echo '<script>alert("'.$q.'")</script>';
$result=mysqli_query($con,$q);
			       
				
           $row1=mysqli_num_rows($result);

			//echo '<script>alert("'.$row1.'")</script>';	   
				   
		 if($row1==0){
				      echo "<h3>No records Founds</h3>";
					 
				  }	
		    else{		  
			  while($row = mysqli_fetch_assoc($result) ){
				  
				 
                
					  
					  ?>
                    
					
       					<div class="col-xl-8 col-sm-6 mb-4">
					    <div class="container jobpost-div" style="padding:0px;">
						 
							<div class="card-body" style="font-size:16px;">
							<div class="post-title jobpost-title">
                                       <a class="text-primary"style="padding:5px 0px" href="jobpost-profile.php?id=<?php echo $row['id']; ?>"><?php echo $row['cname']; ?></a>				<!--<span class="pull-right" style="font-size:11px">Posted On <?php //echo $row['date']; ?></span>-->
                                    			</div>
                                    			
						<div class="row mt-2">
							   <div class="col-lg-6">
							    <div class="post-des">
                                             <span> <img src="<?php echo 'uploads/' .$row['clogo'] ?>" height="100" width="100"> </span>  
                                                            </div>
							   </div>
							  <div class="col-lg-6">
							  <div class="post-des ">
							  
							   <span class="text-muted">Website : </span><?php 
							   
							   $cweb=$row['cweb'];
							   echo ('<a  target="_blank" href="https://'.$cweb.'" >' . $cweb . '</a>'); ?><br>
							   
                                       <span class="text-muted">Industry Type: </span><span><?php echo $row['type']; ?></span><br>
                                       <span class="text-muted">E-mail: </span><span><?php echo $row['email']; ?></span>
                                              
                                                  
                                                             
                        
						 
                                          </div>
							   </div>
							   </div>
							   
							  
							   
						
							   
							  
							   
							    
							
				<div class="row">
                                 <div class="col-lg-12 jobpost-apply" >
                                    
                                     <?php 
					     
                         $getstate=mysqli_query($con,"select statename  from state where id=".$row['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($con, "select cityname  from city where c_id=".$row['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
						
		?>
		
                                      <span class="text-muted">Location: </span><span><?php  echo $getcitydetails['cityname']; ?>, <?php  echo $getstatedetails['statename'];?></span>
                                   
                                        <a class="btn btn-info pull-right"  href="share-profile-to-company.php?cid=<?php echo $_SESSION['id']; ?>&uid=<?php echo  $row['id']; ?>">Share Profile</a>
                                   
                                 </div>
                              </div>
							 
							</div>
							
						
						 
						  </div>
						</div>
        
			 
						
       
        
                   
				  <?php
				  }				  
					  
				  
			  }
			  
			  
			  
		  }
		  else{
			  
			  ?>
			  
			  <h3>No Search </h3>
			  
			<?php  }
?>	    
	  
	
      </div>
      <!-- Area Chart Example-->
   
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
  </div>
</body>

</html>
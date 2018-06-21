<?php


session_start();
include 'config1.php';	 
if( !isset($_SESSION['email'])){
	
 	header("Location: candidate-login.php");
 	
	
}

$email=$_SESSION['id'];
$dir = 'excel/'.$email.'/filter/';
$files = scandir($dir, 0);
echo $fname;
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
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
<script src="jquery.min.js"></script>
  <script>
function submit() {
	if((document.getElementById("cname").value == "") && (document.getElementById("type").value == "")) {
		document.getElementById("validation-message").innerHTML = "Login name or Email is required!"
		return false;
	}
	return true
}
</script>
<script type="text/javascript">
$(document).ready(function(){


    $('#state').on('change',function(){		
        var stateID = $(this).val();
		
		//alert (qualificationID);
		
        if(stateID){
            $.ajax({
                type:'POST',
                url:'locationData.php',		
                
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                    
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>');
           
        }
    });
 
});

//End script

</script>



</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php
 	include("institute_header.php");
 ?><br>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="institute_profile.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Search & Invite</li>
      </ol>
     
      
      <div class="row">
			<div class="col-lg-3"></div>
         	<div class="col-lg-5">	
            <div class="well-searchbox">
            
            
               <form action="search_company_institute.php" method="post" class="form-horizontal" role="form" onSubmit="return submit();">
               
                 <div id="validation-message">
	         <?php if(!empty($error_message)) { ?>
	         <?php echo $error_message; ?>
		 <?php } ?>
		 </div>
								
	         <?php
    
    
    
                    $query = $DB->query("SELECT * FROM state");
    
   
                    $rowCount = $query->num_rows;
                  ?>	
                    

                    <div class="form-group">
                        <label class="col-md-1 control-label">State</label>
                        <div class="col-md-11">
                            <select class="form-control" id="state"  name="state" placeholder="State">
                             <span class="span12 error" id="errorlocation"></span>
			     <option value="" disabled selected>Select state</option>
        
 <?php
        if($rowCount > 0){
            while($getState = $query->fetch_assoc()){ 
            
            
            
                echo '<option value="'.$getState['id'].'">'.$getState['statename'].'</option>';	
            }
        }else{
            echo '<option value="">State not available</option>';
        }
  ?>
                          </select>
                      </div>
                 </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">City</label>
                        <div class="col-md-11">
                            <select class="form-control" id="city" name="city" placeholder="City">
                            <span class="span12 error" id="errornature"></span>
                            <option value="" disabled selected>Select state first</option>		
                            </select>
                        </div>
                   </div>
                   
                   
                    <div class="form-group">
                        <label class="col-md-5 control-label">Industry Type</label>
                        <div class="col-md-11">
                            <select class="form-control" id="type"  name="type" placeholder="Industry Type">
                            <span class="span12 error" id="errornature"></span>
                             <option value="" disabled selected>Select Industry Type</option>      		 
<?php
$sql2= mysqli_query($DB, "SELECT * From industry_type");
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
                  
                  <br><br>
                  
                   <div class="form-group">
                        <label class="col-md-5 control-label">Attach File</label>
                        <div class="col-md-11">                 
                 <select name="Department" id="Department" class="form-control" required>
                  <option value="" disabled selected>Select File</option>
                                  <?php for($i = 1; $i < count($files); $i++){ ?>
                                   	<option value="<?php echo $files[$i]; ?>"><?php print $files[$i]; ?></option>
                                   <?php } ?>	

                                  </select>
</div>
                  </div>


                     <div class="col-sm-offset-4 col-sm-5">
                         <button type="submit" class="btn btn-success" name="data">Submit</button>
                        
                    </div>
                </form>            </div>
            </div>
			<div class="col-lg-4"></div>
	        
      
  
	   <div class="row" >
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
			  
			  if ($_REQUEST["state"]<>'') {
	           $state = mysqli_real_escape_string($DB,$_REQUEST["state"]);
                    //echo '<script>alert("'.$cname.'")</script>';
                   
      }
	  
	  if ($_REQUEST["city"]<>'') {
	           $city = mysqli_real_escape_string($DB,$_REQUEST["city"]);
                    //echo '<script>alert("'.$cname.'")</script>';
                   
      }

if ($_REQUEST["type"]<>'') {
	$type = mysqli_real_escape_string($DB,$_REQUEST["type"]);
       // echo '<script>alert("'.$role.'")</script>';
}




if ($_REQUEST["state"]<>'' and $_REQUEST["city"]<>'') {
    			 // echo '<script>alert("if")</script>';

	$q = "SELECT * from users where state='$state' and city='$city'";
}

else if ($_REQUEST["city"]<>'' and $_REQUEST["type"]<>'') {
    			 // echo '<script>alert("if")</script>';

	$q = "SELECT * from users where city='$city' and type='$type'";
}

else if ($_REQUEST["type"]<>'' and $_REQUEST["state"]<>'') {
    			 // echo '<script>alert("if")</script>';

	$q = "SELECT * from users where type='$type' and state='$state'";
}
 
else if ($_REQUEST["type"]<>'') {
    			 // echo '<script>alert("else if")</script>';

	$q = "SELECT * from users where type='$type'";
} 

else if ($_REQUEST["state"]<>'') {
   // echo '<script>alert("else if")</script>';
	$q = "SELECT * from users where state='$state'";
} 

else if ($_REQUEST["city"]<>'') {
   // echo '<script>alert("else if")</script>';
	$q = "SELECT * from users where city='$city'";
}

else if(empty($_REQUEST["state"]<>'') and empty($_REQUEST["city"]<>'') and empty($_REQUEST["type"]<>'')) {
	//echo '<script>alert("else ")</script>';
	$q = "SELECT * from users ";

}

  
//echo '<script>alert("'.$q.'")</script>';
$result=mysqli_query($DB,$q);
			       
				
           $row1=mysqli_num_rows($result);

			//echo '<script>alert("'.$row1.'")</script>';	   
				   
		 if($row1==0){
				      echo "<h3>No records Found</h3>";
					 
				  }	
		    else{		  
			  while($row = mysqli_fetch_assoc($result) ){
				  
				 
                
					  
					  ?>
                    <br><br>
                               
       					<div class="col-xl-8 col-sm-6 mb-12">
					    <div class="container jobpost-div" style="padding:0px;">
						 
							<div class="card-body" style="font-size:16px;">
							<div class="post-title jobpost-title">
                                       <a class="text-primary"style="padding:5px 0px" href="jobpost-profile.php?id=<?php echo $row['id']; ?>"><?php echo $row['cname']; ?></a>				<!--<span class="pull-right" style="font-size:11px">Posted On <?php //echo $row['date']; ?></span>-->
                                    			</div>
                                    			
						<div class="row mt-2">
							   <div class="col-lg-6">
							    <div class="post-des">
                                             <span> <img src="<?php echo '../uploads/' .$row['clogo'] ?>" height="100" width="100"> </span>  
                                                            </div>
							   </div>
							  <div class="col-lg-6">
							  <div class="post-des ">
							  
							<!--   <span class="text-muted">Website : </span><a class="text-primary" target="_blank" href="<?php //echo $row['cweb']; ?>"> <?php //echo $row['cweb']; ?></a><br> -->
							   <span class="text-muted">Website : </span><?php 
							   
							   $web=$row['cweb'];
							   
							   echo ('<a  target="_blank" href="https://'.$web.'" >' . $web . '</a>'); 
							   
							   
							   ?><br>
                                       <span class="text-muted">Industry Type: </span><span><?php echo $row['type']; ?></span><br>
                                       
                                              
                                                  
                                                             
                        
						 
                                          </div>
							   </div>
							   </div>
							   
							  
							   
						
							   
							  
							   
							    
							
				<div class="row">
                                 <div class="col-lg-12 jobpost-apply" >
                                    
                                     <?php 
					     
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$row['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
						
		?>
		
		
		<?php 
			$getsearch = mysqli_query($DB,"SELECT * from users where id=".$row['id']) or die(mysqli_error($DB)); 
			$getsearchdetails = mysqli_fetch_array($getsearch);
  
		?>  
		
                                      <span class="text-muted">Location: </span><span><?php  echo $getcitydetails['cityname']; ?>, <?php  echo $getstatedetails['statename'];?></span>
         
           <?php 
			$getsearch1 = mysqli_query($DB,"SELECT cname from users where id=".$row['id']) or die(mysqli_error($DB)); 
			$getsearchdetails1 = mysqli_fetch_array($getsearch1);
  
		?>                            
      <?php $str1= $getsearchdetails['cname'];?>
	<?php $str2= $getsearchdetails['email'];?>	                            
                            
                                  
                               	

                                   <script>
                                 function myFunction(id,cname,email){ 
                                 var id=id;
				var cname=cname;
				var email=email;
                               	
			
                               		var selectedval=document.getElementById("Department").value;
                               		
                               		var a=document.createElement('a');
                               		var linkText=document.createTextNode('Invite');
                               		a.appendChild(linkText);
                               		a.href="invite1.php?iid="+id+"&instname="+cname+"&emails="+email+"&fname="+selectedval;
                               		alert(a.href);
                               		window.location.href=a.href;
                               		
                               		} 
                               		
                                 </script>
                                   
                                   <script type="text/javascript">

					function passData(email,cname,cid) {
					var iid= "<?php echo ($_SESSION['email']);?>";
					var instname="<?php echo $str1;?>";
					var emails="<?php echo $str2;?>";
					var fname="<?php echo $_POST['Department'];?>";					
						if (iid == '' && cname == '' && email == '' && fname == '') {
						alert("Something Went Wrong");
						} else {
						// AJAX code to submit form.
					
						$.ajax({
						type: "POST",
						url: "invite1.php",
						data: {email:email,fname:fname,cname:cname,cid:cid},
						success: function(data) {
						alert(data);
						},
						error: function(err) {
						alert(err);
						}
						});
						}
						return false;
					}
					
				</script>
                                 
                                 
                                  <?php print $fname;?>
                                   
                                         <input type="submit" class="btn btn-info pull-right" name="Submit" value="Invite" onclick="passData('<?php echo $getsearchdetails['email'];?>','<?php echo $getsearchdetails['cname'];?>',<?php echo $getsearchdetails['id'];?>);">
                               <?php
                               $web="www.google.com";
                   echo ('<a  target="_blank" href="https://'.$web.'" >' . $web . '</a>');           
                               ?>    
                                 </div>
                              </div>
							 
							</div>
							
						
						 
						  </div><br><br>
						</div>
        
			 
						
       
        
                   
				  <?php
				  }				  
					  
				  
			  }
			  
			  
			  
		  }
		  else{
			  
			  ?>
			  
			 
			  
			<?php  }
?>	    
	  
	
      </div>
      <!-- Area Chart Example-->
   
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
     
    
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
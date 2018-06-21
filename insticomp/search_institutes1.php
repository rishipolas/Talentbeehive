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
                <form action="search_institutes1.php" class="form-horizontal" method="POST" role="form">
                                   <?php 
					     include_once('../config1.php');
    					$query = $DB->query("SELECT * FROM city");
      
    					$rowCount = $query->num_rows;
   								 ?>	
                    <div class="form-group">
                        <label class="col-md-1 control-label">City</label>
                        <div class="col-md-11">
                            <select class="form-control" id="city" name="city" >
							     <option value="" disabled selected>----Select City---</option>  
                                 
                                 <?php
                            if($rowCount > 0)
                            {
                                while($getCity = $query->fetch_assoc())
                                {           
                                    echo '<option value="'.$getCity['c_id'].'">'.$getCity['cityname'].'</option>';	
                                }
                            }else
                            {
                                echo '<option value="">city not available</option>';
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
    
   if(isset($_POST['city']))
  {
  echo $city=$_POST['city'];
   $getcity=mysqli_query($DB, "select * from walkindata where city=".$city);
                         $getcitydetails = mysqli_fetch_array($getcity);
                         $row1=mysqli_num_rows($getcity);
	}
	  
 
  $q="select * from walkindata where city='".$city."'";
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
                            <tbody>
              
                <tr>
                   <td><?php echo $row['name']?></td>
			
               <td><?php echo  $row['title'];?></td> 
               
               <td><?php echo ('<a  target="_blank" href="https://'.$web.'" >' . $web . '</a>'); ?> </td>
              
               <td><?php echo $str; ?></td>
              
               
              
                    
               
           
             
           
               
                </tr>
              
              </tbody>
              
            </table>
             
          </div>
          <?php
				  }				  
					  
				  
			  }
			  
			  
?>     
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

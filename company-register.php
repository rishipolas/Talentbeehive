<?php
       session_start();
       
      
require_once './config1.php';

function GetImageExtension($imagetype)
{
    if(empty($imagetype)) return false;

    switch($imagetype)
    {
        
        case 'image/jpeg': return '.jpeg';
		case 'image/jpg': return '.jpg';
        case 'image/png': return '.png';
        default: return false;
    }
}
if (isset($_POST["sub"])) {
	 require_once "phpmailer/class.phpmailer.php";
	 
		$cname =  $_POST['cname'];
		$email =  $_POST['email'];
		$password =  $_POST['password'];
		$cpassword = $_POST['cpassword']; 
		$person=$_POST['person'];
		$number=$_POST['mnumber']."-".$_POST['num'];
		$lnumber=$_POST['code']."-".$_POST['lnum'];
		$state=$_POST['state'];
		$city=$_POST['city'];
		//$clogo = $_FILES['clogo'] ;  
		$file_name=$_FILES['clogo']['name'];
		
		// $file_name=$_FILES["uploadedimage"]["name"];
    $temp_name=$_FILES["clogo"]["tmp_name"];
    $imgtype=$_FILES["clogo"]["type"];
    $ext= GetImageExtension($imgtype);
    
    date_default_timezone_set("Asia/Kolkata");
    
   $imagename=$_FILES['clogo']['name']."-".date("d-m-y")."-".date("h:i:sa").$ext;
 // $imagename=$_FILES['clogo']['name'];
    $target_path = "uploads/".$imagename;
	
	
		$cinfo =  $_POST['cinfo'];
		$cweb =  $_POST['cweb'];
		$type=$_POST['type']; 
	   //date_default_timezone_set("Asia/Kolkata");
	    // $dt=date("d-m-y")."/".date("h:i:sa");
	    date_default_timezone_set("Asia/Kolkata");
	     $dt=date("d-m-y")."/".date("h:i:sa");
	     
/*  $name = trim($_POST["uname"]);
  $pass = trim($_POST["pass1"]);
  $email = trim($_POST["uemail"]);*/
  
  	   
$sql = "SELECT * from users where email = '".$email."'";
//$sql = "select count(email) count from users where email='".$email."'";

try {
//code to be executed

	$result = mysqli_query($DB, $sql);
	$res = mysqli_num_rows($result);
	
	    
		if ($res == 1) {
		echo '<script type="text/javascript">
		alert("Email exist");
		</script>';
		
	
      $msgType = "warning";
	}
      else
      {
		  	
		if($password == $cpassword)
	     {
	     
	     if(move_uploaded_file($_FILES["clogo"]["tmp_name"] , "uploads/".$imagename))
	       {
	
			  $insert = "INSERT INTO users (cname,email,password,cpassword,cinfo,cweb,type,state,city,person,clogo,number,lnumber,date_time) 
			            VALUES ( '$cname', '$email', '$password', '$cpassword', '$cinfo', '$cweb','$type','$state', '$city', '$person','$imagename','$number','$lnumber','$dt')";
 //echo $insert;

			  
	            if ($DB->query($insert) === TRUE) {
            
				
				      $to = $email;
				      
         $subject = "Your Registration Verification";
         
          $message = '<!DOCTYPE html>
<html><head>
 <title>Email Verification</title>
</head>
<body>
<div style="margin:40px;"><b>Registration mail,</b><br><br>
';
        $message .= '<b>Dear ' . $cname . ',</b><br>';
        $message .='<p>Welcome to TalentBeehive.com, We focus on making your shortlisting<br> 
easier by introducing our new feature of video profile accompanied with<br> shared resumes, also visit <a href="www.talentbeehive.com">www.talentbeehive.com</a> for fruitful results.
<br><br>
<div style="border:2px solid black;padding:10px;width:400px;height:150px;padding:20px;margin-left:30px;">
<div style="font-size:25px;color:red;"><marquee>Registration Link</marquee></div><a href="www.talentbeehive.com/activate.php?email=".$email>Click here</a> &nbsp;to complete your registration process on <a href="#">talentbeehive.com</a> and start posting your jobs.<br><br>
Best Regards<br>
Team Talent Beehive<br><br>
Have a question? E-mail at <a href="#">info@talentbeehive.com</a><br></div><br><br>


<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;">Connect to us for all your enquiries</div>
<div style="border:1px black;padding:10px;width:500px;height:10px;background-color:#EBEDEF;"><b></b>Email Address: <a href="#">support@talentbeehive.com</a></div>
<div style="border:1px black;padding:10px;width:250px;height:10px;background-color:#EBEDEF;"><b></b>Contact Number: +91-8623804382</div><br><br>



<div style="padding:20px;font-size:12px;width:500px;height:500px;">
This is to acknowledge that you have registered as a company with Talent Beehive, have agreed to abide to the terms of use and our privacy commitment.</div>

</div>';
       $message .= "</body></html>";
        
         
      
         
          $header .= "MIME-Version: 1.0"."\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $header .= 'From:TALENT BEEHIVE <admin@talentbeehive.com>'."\r\n";
        $header .= 'Cc:info@talentbeehive.com'." \r\n";
        $header .= 'Bcc:sushantk6158@gmail.com'." \r\n";
        $header .= 'Bcc:palalok1@gmail.com'." \r\n";
        $header .= 'Bcc:abhijeets@talentbeehive.com'." \r\n";
       

         
         $retval = mail ($to,$subject,$message,$header);
         
         

         if( $retval == true ) {
         
		
echo "
<script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
$( document ).ready(function() {
    swal({
         title: 'Check your email for verification!! Also check your SPAM',
       text: 'Account Created Successfully!!',
       type: 'success',
}, function(isConfirm) {
     document.location.href='company-login.php'
});
});

</script>";
		
           
         

        

         }else {
			/*  echo '<script type="text/javascript">
		       alert("Message could not be sent...!!");
		        </script>';*/
          			
          			echo "
<script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
	 swal(Oops,'Message could not be sent...!!', 'error') 

</script>";

           }
				}
	  else 
	  {
        $msg = "Failed to create User";
        $msgType = "warning";
       }
    }
		else{
			/* echo '<script type="text/javascript">
		       alert("password is couldnt match please try again...!!");
		        </script>'; */
		        
		        
	 echo "
<script type='text/javascript' src='js/jquery-latest.js'></script>
    <script src='js/sweetalert.min.js'></script>
    <link href='css/sweetalert.css' rel='stylesheet' type='text/css'/>
<script>
	 swal(Oops,'Message could not be sent...!!', 'error') 

</script>";
          }
	 }
	 }
	  } catch (Exception $ex)
      {
    echo $ex->getMessage();
      }
          
}	
	
	


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Talent Beehive</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
<script src="jquery.min.js"></script>

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

<body>

  <!--==========================
  Header
  ============================-->
<header id="header">
  
   <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="index.php"><img src="img/works/talent.png" height="45px" width="200px" alt=""></a></div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
                       
          <ul class="nav navbar-nav navbar-right othr">
          <li class="line"></li>
          <!--li> <a href="#about" ><span>About us</span></a></li-->
		  <li> <a href="employers-view.php" ><span>Employers</span></a></li>
		   <li> <a href="" ><span>Blog</span></a></li>
		  <li><div class="dropdown"> <button class="navbar-btn nav-button wow bounceInRight login">Login/Signup</button>
		  <div class="dropdown-content">
    <a href="company-login.php">Company</a><br>
    <a href="candidate-login.php">Candidate</a>
   
  </div>
  </div>
		  </li>
        </ul>
               
       
       
               
    </div>
	
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
  
    
      <div class="hero-container contOtrBlk row">

          <div class="container">
    	<div class="row mt-10">
    	    <div class="col-xs-12 col-lg-8 col-md-offset-2 mainw3-agileinfo form wow pulse animated">
        	    <div class="form-wrap">
                  
                    <form role="form" action="company-register.php" method="post" enctype="multipart/form-data" id="login-form" autocomplete="off">
                       <div class="col-lg-12 form-group">
					       <label>Company Name<span class="req">*</span> </label>
                           <input name="cname" type="text" pattern="^[-a-zA-Z0-9-()+(\s+[-a-zA-Z0-9-()]+)*$" title="should contain minimum four characters and maximum 50 characters, Numbers are allowed but special characters are not allowed" placeholder="Company Name" required>
					</div>
                        <div class="col-lg-12 form-group">
                            <label> Industry Type<span class="req">*</span> </label>
                            <input type="text" id="favCktPlayer" list="CktPlayers" class="keyword" name="type" placeholder="Industry Type" style="color:#FFCD01;" required>  
 <datalist id="CktPlayers">  
 <?php
$sql1 = mysqli_query($DB, "SELECT * From industry_type");
$ro1 = mysqli_num_rows($sql1);
while ($ro1 = mysqli_fetch_array($sql1)){
?>
     <option value="<?php echo $ro1['type'] ?>" >
        
 <?php
}
?>
 </datalist>

     
                        </div>
						<div class="col-lg-12 field-wrap">
				          <label>Website URL<span class="req">*</span> </label>
				<input type="text" name="cweb" placeholder="Website URL eg.www.example.com" pattern="w{3}\.[a-z-\]+\.?[a-z-\]{2,3}(|\.[a-z]{2,3})" title="website URL" >	  
				 
					</div>
					
					 <?php
    
    
    
    $query = $DB->query("SELECT * FROM state");
    
   
    $rowCount = $query->num_rows;
    ?>	
      
						<div class="col-lg-6 form-group">
                           <label>State<span class="req">*</span> </label>
                            <select id="state"  name="state" placeholder="state" style="color:#FFCD01;" required>
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
          
           <div class="col-lg-6 form-group">
                           <label>City<span class="req">*</span> </label>
                            <select  id="city" name="city" placeholder="city" style="color:#FFCD01;" required>
	  <option value="" disabled selected>Select state first</option>		
 </select>
                        </div>
                        
                        
                        <div class="col-lg-6 form-group">
                           <label>Contact Person Name<span class="req">*</span> </label>
                            <input type="text" name="person" id="contact-Person-Name"  pattern="[a-z,A-Z\s]{2,50}" title="should contain minimum 2 characters and maximum 30 characters." placeholder="Contact Person Name" required>
                        </div>
						<div class="col-lg-6 form-group">
                           <label>Email<span class="req">*</span> </label>
                            <input type="email" name="email" title="Must contains characters@characters.domain" id="email"  placeholder="info@talentbeehive.com" required>
                        </div>
                        
						<div class="col-lg-6 form-group" style="padding:0px;">
						<label> Mobile Number<span class="req">*</span> </label>
						<div class="col-lg-3 form-group">
						<label> <span class="req"></span> </label>
						<input type="text" name="mnumber" value="+91" readonly>
						</div>
						<div class="col-lg-9 form-group">
						<input type="number" name="num" pattern="[6-9]{1}[0-9]{9}" title="should contain exact 10 digit, start with range between 6-9." placeholder="Mobile Number">
						
						</div>
						</div>
						<label> Landline Number<span class="req">*</span> </label>
						<div class="col-lg-6 form-group" style="padding:0px;">
						
						<div class="col-lg-4 form-group">
						<input type="number" id="location" list="Code" class="keyword" name="code" placeholder="Code" style="color:#FFCD01;">  
 <datalist id="Code"> 
<option>03669</option>
						<option>01634</option>
						<option>02974</option>
						<option>07223</option>
						<option>08541</option>
						<option>05613</option>
						<option>01669</option>
						<option>06180</option>
						<option>08732</option>
						<option>04864</option>
						<option>08512</option>
						<option>04734</option>
						<option>03251</option>
						<option>08470</option>
						<option>07362</option>
						<option>0381</option>
						<option>04894</option>
						<option>0562</option>
						<option>079</option>
						<option>07133</option>
						<option>0241</option>
						<option>02381</option>
						<option>02978</option>
						<option>02631</option>
						<option>08339</option>
						<option>0389</option>
						<option>03838</option>
						<option>07730</option>
						<option>02323</option>
						<option>0145</option>
						<option>01858</option>
						<option>05111</option>
						<option>05271</option>
						<option>05275</option>
						<option>01924</option>
						<option>02181</option>
						<option>07431</option>
						<option>0724</option>
						<option>02424</option>
						<option>07258</option>
						<option>08502</option>
						<option>08477</option>
						<option>04922</option>
						<option>02141</option>
						<option>05740</option>
						<option>0571</option>
						<option>03564</option>
						<option>07394</option>
						<option>08519</option>
						<option>0532</option>
						<option>0477</option>
						<option>05962</option>
						<option>03783</option>
						<option>07410</option>
						<option>08170</option>
						<option>08523</option>
						<option>0144</option>
						<option>07189</option>
						<option>08856</option>
						<option>02587</option>
						<option>08545</option>
						<option>07675</option>
						<option>06420</option>
						<option>07167</option>
						<option>01976</option>
						<option>02483</option>
						<option>07538</option>
						<option>0171</option>
						<option>03826</option>
						<option>04634</option>
						<option>02446</option>
						<option>01423</option>
						<option>07774</option>
						<option>02908</option>
						<option>05368</option>
						<option>04891</option>
						<option>03227</option>
						<option>03653</option>
						<option>02641</option>
						<option>0721</option>
						<option>02792</option>
						<option>0183</option>
						<option>05922</option>
						<option>08924</option>
						<option>04253</option>
						<option>02692</option>
						<option>06731</option>
						<option>08554</option>
						<option>01932</option>
						<option>03192</option>
						<option>08450</option>
						<option>04893</option>
						<option>08110</option>
						<option>03801</option>
						<option>02836</option>
						<option>02646</option>
						<option>08388</option>
						<option>07847</option>
						<option>06764</option>
						<option>01498</option>
						<option>01506</option>
						<option>05823</option>
						<option>05824</option>
						<option>04153</option>
						<option>08936</option>
						<option>03211</option>
						<option>07720</option>
						<option>04371</option>
						<option>06453</option>
						<option>04320</option>
						<option>06258</option>
						<option>04329</option>
						<option>07196</option>
						<option>01796</option>
						<option>04177</option>
						<option>08463</option>
						<option>04173</option>
						<option>07545</option>
						<option>06182</option>
						<option>08174</option>
						<option>04566</option>
						<option>07157</option>
						<option>06337</option>
						<option>0341</option>
						<option>07543</option>
						<option>07560</option>
						<option>02441</option>
						<option>08733</option>
						<option>01480</option>
						<option>06822</option>
						<option>02967</option>
						<option>01749</option>
						<option>08740</option>
						<option>08289</option>
						<option>06723</option>
						<option>06763</option>
						<option>08627</option>
						<option>08504</option>
						<option>08517</option>
						<option>07144</option>
						<option>02343</option>
						<option>05723</option>
						<option>07451</option>
						<option>06682</option>
						<option>0470</option>
						<option>04282</option>
						<option>08485</option>
						<option>05683</option>
						<option>02432</option>
						<option>06186</option>
						<option>02383</option>
						<option>04296</option>
						<option>05462</option>
						<option>08582</option>
						<option>07790</option>
						<option>05190</option>
						<option>07203</option>
						<option>08355</option>
						<option>02791</option>
						<option>07857</option>
						<option>0496</option>
						<option>07689</option>
						<option>08357</option>
						<option>07495</option>
						<option>05832</option>
						<option>07849</option>
						<option>01951</option>
						<option>07367</option>
						<option>07295</option>
						<option>08569</option>
						<option>07290</option>
						<option>06251</option>
						<option>08354</option>
						<option>07707</option>
						<option>06640</option>
						<option>08150</option>
						<option>05963</option>
						<option>03639</option>
						<option>01234</option>
						<option>07769</option>
						<option>02968</option>
						<option>07271</option>
						<option>06557</option>
						<option>01276</option>
						<option>06594</option>
						<option>05822</option>
						<option>05252</option>
						<option>05250</option>
						<option>07636</option>
						<option>07836</option>
						<option>08288</option>
						<option>03677</option>
						<option>01885</option>
						<option>07632</option>
						<option>06652</option>
						<option>07257</option>
						<option>05263</option>
						<option>05264</option>
						<option>02690</option>
						<option>06782</option>
						<option>07684</option>
						<option>07326</option>
						<option>02933</option>
						<option>02938</option>
						<option>06846</option>
						<option>05498</option>
						<option>05496</option>
						<option>07749</option>
						<option>07727</option>
						<option>07831</option>
						<option>06756</option>
						<option>06568</option>
						<option>03522</option>
						<option>07467</option>
						<option>03785</option>
						<option>07540</option>
						<option>08515</option>
						<option>06626</option>
						<option>07583</option>
						<option>05192</option>
						<option>08672</option>
						<option>07653</option>
						<option>01957</option>
						<option>01487</option>
						<option>080</option>
						<option>08153</option>
						<option>08573</option>
						<option>06791</option>
						<option>01903</option>
						<option>06424</option>
						<option>03242</option>
						<option>06467</option>
						<option>02630</option>
						<option>05494</option>
						<option>05525</option>
						<option>05521</option>
						<option>05545</option>
						<option>01461</option>
						<option>08466</option>
						<option>02962</option>
						<option>08255</option>
						<option>08643</option>
						<option>05248</option>
						<option>06257</option>
						<option>03623</option>
						<option>02112</option>
						<option>01952</option>
						<option>07453</option>
						<option>01731</option>
						<option>06279</option>
						<option>06767</option>
						<option>02622</option>
						<option>0581</option>
						<option>02718</option>
						<option>07486</option>
						<option>06646</option>
						<option>06132</option>
						<option>06543</option>
						<option>05647</option>
						<option>06792</option>
						<option>01473</option>
						<option>06551</option>
						<option>06643</option>
						<option>02983</option>
						<option>02902</option>
						<option>02984</option>
						<option>02986</option>
						<option>02985</option>
						<option>02982</option>
						<option>01679</option>
						<option>07531</option>
						<option>07813</option>
						<option>03666</option>
						<option>07255</option>
						<option>02184</option>
						<option>06451</option>
						<option>06567</option>
						<option>07280</option>
						<option>02711</option>
						<option>01693</option>
						<option>07724</option>
						<option>03795</option>
						<option>08481</option>
						<option>08358</option>
						<option>08180</option>
						<option>05646</option>
						<option>01921</option>
						<option>06533</option>
						<option>03217</option>
						<option>02454</option>
						<option>0250</option>
						<option>01429</option>
						<option>06781</option>
						<option>07862</option>
						<option>05542</option>
						<option>01420</option>
						<option>01871</option>
						<option>07169</option>
						<option>04543</option>
						<option>01284</option>
						<option>01254</option>
						<option>02779</option>
						<option>05648</option>
						<option>01462</option>
						<option>01997</option>
						<option>07487</option>
						<option>01474</option>
						<option>01475</option>
						<option>06243</option>
						<option>01494</option>
						<option>0831</option>
						<option>08735</option>
						<option>08392</option>
						<option>03823</option>
						<option>08256</option>
						<option>08177</option>
						<option>07824</option>
						<option>06271</option>
						<option>06242</option>
						<option>07650</option>
						<option>07565</option>
						<option>07363</option>
						<option>03482</option>
						<option>0680</option>
						<option>07825</option>
						<option>06549</option>
						<option>06793</option>
						<option>03474</option>
						<option>06254</option>
						<option>07141</option>
						<option>06189</option>
						<option>02837</option>
						<option>05414</option>
						<option>01504</option>
						<option>08743</option>
						<option>06784</option>
						<option>08282</option>
						<option>07175</option>
						<option>0641</option>
						<option>08752</option>
						<option>07143</option>
						<option>07789</option>
						<option>08484</option>
						<option>07134</option>
						<option>07184</option>
						<option>06581</option>
						<option>07523</option>
						<option>06821</option>
						<option>07427</option>
						<option>07850</option>
						<option>02896</option>
						<option>07835</option>
						<option>05644</option>
						<option>01895</option>
						<option>05680</option>
						<option>02642</option>
						<option>05331</option>
						<option>07726</option>
						<option>0164</option>
						<option>08385</option>
						<option>01377</option>
						<option>01374</option>
						<option>04256</option>
						<option>0278</option>
						<option>06563</option>
						<option>06670</option>
						<option>08933</option>
						<option>07288</option>
						<option>07729</option>
						<option>02771</option>
						<option>01482</option>
						<option>02951</option>
						<option>02909</option>
						<option>08829</option>
						<option>08816</option>
						<option>07142</option>
						<option>07534</option>
						<option>02969</option>
						<option>02990</option>
						<option>02442</option>
						<option>07525</option>
						<option>02522</option>
						<option>01664</option>
						<option>07106</option>
						<option>05673</option>
						<option>05113</option>
						<option>02467</option>
						<option>02485</option>
						<option>08685</option>
						<option>02478</option>
						<option>08746</option>
						<option>0755</option>
						<option>07851</option>
						<option>02113</option>
						<option>0674</option>
						<option>02599</option>
						<option>02832</option>
						<option>02582</option>
						<option>07374</option>
						<option>08482</option>
						<option>05681</option>
						<option>06229</option>
						<option>06112</option>
						<option>03759</option>
						<option>07643</option>
						<option>08352</option>
						<option>07853</option>
						<option>07608</option>
						<option>07528</option>
						<option>03668</option>
						<option>01342</option>
						<option>01345</option>
						<option>01522</option>
						<option>01520</option>
						<option>0151</option>
						<option>01523</option>
						<option>01521</option>
						<option>05270</option>
						<option>06135</option>
						<option>06185</option>
						<option>02920</option>
						<option>02930</option>
						<option>05921</option>
						<option>03667</option>
						<option>07752</option>
						<option>01978</option>
						<option>05851</option>
						<option>05855</option>
						<option>05112</option>
						<option>08425</option>
						<option>02634</option>
						<option>02465</option>
						<option>07580</option>
						<option>05181</option>
						<option>06651</option>
						<option>03563</option>
						<option>06471</option>
						<option>07637</option>
						<option>07655</option>
						<option>05881</option>
						<option>06863</option>
						<option>05834</option>
						<option>03879</option>
						<option>03244</option>
						<option>06584</option>
						<option>05863</option>
						<option>04890</option>
						<option>08751</option>
						<option>08944</option>
						<option>08467</option>
						<option>07740</option>
						<option>07867</option>
						<option>03675</option>
						<option>03776</option>
						<option>06542</option>
						<option>03621</option>
						<option>03463</option>
						<option>06539</option>
						<option>03215</option>
						<option>07466</option>
						<option>06860</option>
						<option>02696</option>
						<option>02849</option>
						<option>06841</option>
						<option>07177</option>
						<option>03511</option>
						<option>01392</option>
						<option>07564</option>
						<option>06818</option>
						<option>05732</option>
						<option>07262</option>
						<option>0747</option>
						<option>06530</option>
						<option>0342</option>
						<option>07325</option>
						<option>07103</option>
						<option>06183</option>
						<option>07609</option>
						<option>0495</option>
						<option>08346</option>
						<option>0497</option>
						<option>08176</option>
						<option>03218</option>
						<option>05563</option>
						<option>05567</option>
						<option>01735</option>
						<option>07546</option>
						<option>08422</option>
						<option>06582</option>
						<option>06586</option>
						<option>06535</option>
						<option>06347</option>
						<option>06587</option>
						<option>05413</option>
						<option>03878</option>
						<option>01360</option>
						<option>02589</option>
						<option>08195</option>
						<option>01899</option>
						<option>01372</option>
						<option>07135</option>
						<option>03831</option>
						<option>03212</option>
						<option>03830</option>
						<option>05965</option>
						<option>08226</option>
						<option>02734</option>
						<option>05412</option>
						<option>06786</option>
						<option>03872</option>
						<option>07547</option>
						<option>02320</option>
						<option>0172</option>
						<option>06591</option>
						<option>07818</option>
						<option>08681</option>
						<option>07172</option>
						<option>07227</option>
						<option>07222</option>
						<option>03808</option>
						<option>08189</option>
						<option>08113</option>
						<option>02556</option>
						<option>06152</option>
						<option>05283</option>
						<option>01250</option>
						<option>06541</option>
						<option>07166</option>
						<option>08863</option>
						<option>06547</option>
						<option>01743</option>
						<option>08628</option>
						<option>04114</option>
						<option>04188</option>
						<option>044</option>
						<option>08952</option>
						<option>08710</option>
						<option>03637</option>
						<option>04899</option>
						<option>08417</option>
						<option>07452</option>
						<option>07691</option>
						<option>05662</option>
						<option>07682</option>
						<option>06811</option>
						<option>06761</option>
						<option>05691</option>
						<option>07220</option>
						<option>07162</option>
						<option>07454</option>
						<option>02669</option>
						<option>07745</option>
						<option>07145</option>
						<option>04144</option>
						<option>07264</option>
						<option>08156</option>
						<option>08133</option>
						<option>08338</option>
						<option>08262</option>
						<option>08475</option>
						<option>0212</option>
						<option>07863</option>
						<option>07855</option>
						<option>08737</option>
						<option>08823</option>
						<option>08154</option>
						<option>08937</option>
						<option>02355</option>
						<option>08594</option>
						<option>01596</option>
						<option>05170</option>
						<option>08194</option>
						<option>07806</option>
						<option>08474</option>
						<option>08572</option>
						<option>01472</option>
						<option>08934</option>
						<option>02989</option>
						<option>02903</option>
						<option>02586</option>
						<option>02751</option>
						<option>03806</option>
						<option>07743</option>
						<option>07170</option>
						<option>05443</option>
						<option>01896</option>
						<option>03874</option>
						<option>07802</option>
						<option>01562</option>
						<option>0422</option>
						<option>03220</option>
						<option>03582</option>
						<option>08225</option>
						<option>04142</option>
						<option>08562</option>
						<option>08406</option>
						<option>04554</option>
						<option>0671</option>
						<option>07758</option>
						<option>02663</option>
						<option>07524</option>
						<option>01668</option>
						<option>03650</option>
						<option>02528</option>
						<option>02673</option>
						<option>03525</option>
						<option>07748</option>
						<option>05317</option>
						<option>05315</option>
						<option>06278</option>
						<option>06562</option>
						<option>02793</option>
						<option>07638</option>
						<option>07812</option>
						<option>06115</option>
						<option>02749</option>
						<option>03229</option>
						<option>01576</option>
						<option>01577</option>
						<option>07856</option>
						<option>02358</option>
						<option>03792</option>
						<option>06272</option>
						<option>06849</option>
						<option>0354</option>
						<option>08407</option>
						<option>07238</option>
						<option>07224</option>
						<option>02757</option>
						<option>06757</option>
						<option>01883</option>
						<option>05831</option>
						<option>07522</option>
						<option>06328</option>
						<option>02117</option>
						<option>01427</option>
						<option>08192</option>
						<option>05734</option>
						<option>02649</option>
						<option>01580</option>
						<option>05641</option>
						<option>02744</option>
						<option>01587</option>
						<option>02463</option>
						<option>02716</option>
						<option>01970</option>
						<option>0135</option>
						<option>02460</option>
						<option>03834</option>
						<option>04347</option>
						<option>01336</option>
						<option>07704</option>
						<option>02735</option>
						<option>06641</option>
						<option>08531</option>
						<option>02364</option>
						<option>02904</option>
						<option>06432</option>
						<option>07261</option>
						<option>01434</option>
						<option>07158</option>
						<option>01378</option>
						<option>01370</option>
						<option>07199</option>
						<option>07586</option>
						<option>05568</option>
						<option>07801</option>
						<option>07322</option>
						<option>05114</option>
						<option>07137</option>
						<option>02934</option>
						<option>04561</option>
						<option>08424</option>
						<option>08691</option>
						<option>02678</option>
						<option>07272</option>
						<option>02595</option>
						<option>06250</option>
						<option>03758</option>
						<option>07821</option>
						<option>06462</option>
						<option>01344</option>
						<option>07722</option>
						<option>0326</option>
						<option>02713</option>
						<option>02748</option>
						<option>03213</option>
						<option>06725</option>
						<option>07138</option>
						<option>07292</option>
						<option>03822</option>
						<option>06672</option>
						<option>07766</option>
						<option>02633</option>
						<option>04258</option>
						<option>07294</option>
						<option>07226</option>
						<option>05967</option>
						<option>02797</option>
						<option>02950</option>
						<option>04342</option>
						<option>08559</option>
						<option>03753</option>
						<option>06762</option>
						<option>02165</option>
						<option>02714</option>
						<option>05642</option>
						<option>02824</option>
						<option>02754</option>
						<option>02897</option>
						<option>03662</option>
						<option>02562</option>
						<option>03485</option>
						<option>03174</option>
						<option>0373</option>
						<option>08461</option>
						<option>06814</option>
						<option>03751</option>
						<option>07455</option>
						<option>07234</option>
						<option>03862</option>
						<option>01875</option>
						<option>0451</option>
						<option>07644</option>
						<option>02557</option>
						<option>03581</option>
						<option>03671</option>
						<option>03780</option>
						<option>08671</option>
						<option>01996</option>
						<option>08119</option>
						<option>05541</option>
						<option>08408</option>
						<option>07823</option>
						<option>08516</option>
						<option>05447</option>
						<option>05446</option>
						<option>01428</option>
						<option>06434</option>
						<option>06323</option>
						<option>06558</option>
						<option>01371</option>
						<option>02964</option>
						<option>01470</option>
						<option>06653</option>
						<option>0788</option>
						<option>07843</option>
						<option>0343</option>
						<option>02583</option>
						<option>06155</option>
						<option>01698</option>
						<option>08812</option>
						<option>02588</option>
						<option>0484</option>
						<option>0424</option>
						<option>05742</option>
						<option>07136</option>
						<option>05688</option>
						<option>08717</option>
						<option>05278</option>
						<option>0129</option>
						<option>01639</option>
						<option>05692</option>
						<option>05180</option>
						<option>01667</option>
						<option>05240</option>
						<option>01571</option>
						<option>05183</option>
						<option>01638</option>
						<option>01268</option>
						<option>05612</option>
						<option>01632</option>
						<option>06455</option>
						<option>02624</option>
						<option>06847</option>
						<option>08372</option>
						<option>07791</option>
						<option>07132</option>
						<option>02847</option>
						<option>02327</option>
						<option>08546</option>
						<option>02326</option>
						<option>07481</option>
						<option>08965</option>
						<option>08454</option>
						<option>02712</option>
						<option>03241</option>
						<option>02453</option>
						<option>02433</option>
						<option>07463</option>
						<option>03521</option>
						<option>08533</option>
						<option>07435</option>
						<option>03592</option>
						<option>07594</option>
						<option>05171</option>
						<option>01884</option>
						<option>05731</option>
						<option>06561</option>
						<option>07706</option>
						<option>02843</option>
						<option>08551</option>
						<option>07425</option>
						<option>07846</option>
						<option>06569</option>
						<option>03595</option>
						<option>0631</option>
						<option>02963</option>
						<option>02447</option>
						<option>06523</option>
						<option>07693</option>
						<option>01748</option>
						<option>07767</option>
						<option>03225</option>
						<option>05115</option>
						<option>07230</option>
						<option>06733</option>
						<option>07368</option>
						<option>07526</option>
						<option>02961</option>
						<option>06585</option>
						<option>0120</option>
						<option>0548</option>
						<option>07146</option>
						<option>05461</option>
						<option>07647</option>
						<option>08405</option>
						<option>04145</option>
						<option>06532</option>
						<option>0294</option>
						<option>03663</option>
						<option>04285</option>
						<option>06422</option>
						<option>02672</option>
						<option>07287</option>
						<option>02806</option>
						<option>06245</option>
						<option>07865</option>
						<option>02956</option>
						<option>07539</option>
						<option>01263</option>
						<option>07480</option>
						<option>03715</option>
						<option>01859</option>
						<option>08332</option>
						<option>03774</option>
						<option>02439</option>
						<option>06544</option>
						<option>07171</option>
						<option>05262</option>
						<option>02825</option>
						<option>07182</option>
						<option>08552</option>
						<option>07695</option>
						<option>06156</option>
						<option>0551</option>
						<option>07187</option>
						<option>07794</option>
						<option>07688</option>
						<option>06540</option>
						<option>08155</option>
						<option>08131</option>
						<option>04262</option>
						<option>06862</option>
						<option>08674</option>
						<option>04171</option>
						<option>08624</option>
						<option>08525</option>
						<option>02359</option>
						<option>08472</option>
						<option>06524</option>
						<option>07542</option>
						<option>08229</option>
						<option>05836</option>
						<option>07731</option>
						<option>0863</option>
						<option>06857</option>
						<option>01874</option>
						<option>0124</option>
						<option>01685</option>
						<option>03452</option>
						<option>0361</option>
						<option>0751</option>
						<option>07596</option>
						<option>08397</option>
						<option>08228</option>
						<option>06342</option>
						<option>03216</option>
						<option>02468</option>
						<option>03673</option>
						<option>05244</option>
						<option>03844</option>
						<option>06224</option>
						<option>03664</option>
						<option>03224</option>
						<option>05946</option>
						<option>05945</option>
						<option>08284</option>
						<option>02676</option>
						<option>02758</option>
						<option>05282</option>
						<option>01972</option>
						<option>08379</option>
						<option>01663</option>
						<option>07664</option>
						<option>01552</option>
						<option>0122</option>
						<option>08398</option>
						<option>07577</option>
						<option>05852</option>
						<option>05850</option>
						<option>02733</option>
						<option>03524</option>
						<option>03513</option>
						<option>07168</option>
						<option>05546</option>
						<option>07327</option>
						<option>04346</option>
						<option>05143</option>
						<option>05924</option>
						<option>08172</option>
						<option>05722</option>
						<option>06150</option>
						<option>02324</option>
						<option>07604</option>
						<option>08375</option>
						<option>03805</option>
						<option>06546</option>
						<option>08683</option>
						<option>08253</option>
						<option>06621</option>
						<option>06111</option>
						<option>02772</option>
						<option>07469</option>
						<option>06732</option>
						<option>07436</option>
						<option>08556</option>
						<option>07153</option>
						<option>02456</option>
						<option>07104</option>
						<option>08376</option>
						<option>08193</option>
						<option>01662</option>
						<option>03674</option>
						<option>08191</option>
						<option>08175</option>
						<option>08188</option>
						<option>08387</option>
						<option>08199</option>
						<option>08111</option>
						<option>08185</option>
						<option>07574</option>
						<option>01882</option>
						<option>08394</option>
						<option>04344</option>
						<option>03676</option>
						<option>0836</option>
						<option>08333</option>
						<option>08483</option>
						<option>08351</option>
						<option>08444</option>
						<option>08222</option>
						<option>06550</option>
						<option>01483</option>
						<option>03789</option>
						<option>08721</option>
						<option>08399</option>
						<option>08727</option>
						<option>040</option>
						<option>08415</option>
						<option>08413</option>
						<option>08414</option>
						<option>06548</option>
						<option>07561</option>
						<option>02778</option>
						<option>02553</option>
						<option>07854</option>
						<option>06331</option>
						<option>0385</option>
						<option>02111</option>
						<option>08359</option>
						<option>0731</option>
						<option>0480</option>
						<option>07541</option>
						<option>02342</option>
						<option>03481</option>
						<option>03526</option>
						<option>0360</option>
						<option>07572</option>
						<option>06529</option>
						<option>0761</option>
						<option>07606</option>
						<option>01732</option>
						<option>08196</option>
						<option>06588</option>
						<option>03214</option>
						<option>06724</option>
						<option>07782</option>
						<option>08654</option>
						<option>01624</option>
						<option>08724</option>
						<option>06114</option>
						<option>01485</option>
						<option>06246</option>
						<option>0141</option>
						<option>03800</option>
						<option>02991</option>
						<option>03014</option>
						<option>02992</option>
						<option>02993</option>
						<option>03015</option>
						<option>03016</option>
						<option>03018</option>
						<option>02999</option>
						<option>03010</option>
						<option>02998</option>
						<option>03011</option>
						<option>02997</option>
						<option>03012</option>
						<option>03013</option>
						<option>07651</option>
						<option>02939</option>
						<option>07659</option>
						<option>07657</option>
						<option>07671</option>
						<option>06726</option>
						<option>06728</option>
						<option>05843</option>
						<option>05168</option>
						<option>05745</option>
						<option>0257</option>
						<option>07266</option>
						<option>0181</option>
						<option>02482</option>
						<option>02973</option>
						<option>02977</option>
						<option>03561</option>
						<option>03839</option>
						<option>07160</option>
						<option>06649</option>
						<option>02644</option>
						<option>02898</option>
						<option>02891</option>
						<option>08353</option>
						<option>02421</option>
						<option>08560</option>
						<option>0191</option>
						<option>0288</option>
						<option>02580</option>
						<option>0657</option>
						<option>06433</option>
						<option>06345</option>
						<option>01426</option>
						<option>08716</option>
						<option>08821</option>
						<option>07817</option>
						<option>08739</option>
						<option>01396</option>
						<option>07414</option>
						<option>06566</option>
						<option>05614</option>
						<option>07787</option>
						<option>02821</option>
						<option>06797</option>
						<option>07763</option>
						<option>05671</option>
						<option>07681</option>
						<option>02344</option>
						<option>01281</option>
						<option>05452</option>
						<option>07420</option>
						<option>02520</option>
						<option>01583</option>
						<option>04331</option>
						<option>06673</option>
						<option>02823</option>
						<option>08442</option>
						<option>06854</option>
						<option>07392</option>
						<option>02959</option>
						<option>02645</option>
						<option>06349</option>
						<option>06273</option>
						<option>01251</option>
						<option>07432</option>
						<option>03254</option>
						<option>02679</option>
						<option>05174</option>
						<option>03221</option>
						<option>06867</option>
						<option>06431</option>
						<option>06645</option>
						<option>06589</option>
						<option>06534</option>
						<option>01595</option>
						<option>01592</option>
						<option>01681</option>
						<option>02457</option>
						<option>03876</option>
						<option>07393</option>
						<option>0291</option>
						<option>02931</option>
						<option>02893</option>
						<option>01908</option>
						<option>08383</option>
						<option>07537</option>
						<option>0376</option>
						<option>01389</option>
						<option>01381</option>
						<option>03652</option>
						<option>01870</option>
						<option>06681</option>
						<option>01683</option>
						<option>0285</option>
						<option>02132</option>
						<option>08223</option>
						<option>04897</option>
						<option>05364</option>
						<option>08494</option>
						<option>08267</option>
						<option>02325</option>
						<option>06429</option>
						<option>02445</option>
						<option>08677</option>
						<option>03824</option>
						<option>05690</option>
						<option>01398</option>
						<option>05255</option>
						<option>05251</option>
						<option>01746</option>
						<option>07649</option>
						<option>03210</option>
						<option>0884</option>
						<option>01964</option>
						<option>03782</option>
						<option>07201</option>
						<option>02455</option>
						<option>01258</option>
						<option>01696</option>
						<option>02894</option>
						<option>03566</option>
						<option>08370</option>
						<option>06850</option>
						<option>03552</option>
						<option>01733</option>
						<option>02473</option>
						<option>04151</option>
						<option>07118</option>
						<option>03454</option>
						<option>02764</option>
						<option>01786</option>
						<option>04895</option>
						<option>04936</option>
						<option>05164</option>
						<option>08549</option>
						<option>02592</option>
						<option>0251</option>
						<option>08497</option>
						<option>06769</option>
						<option>08478</option>
						<option>08563</option>
						<option>05640</option>
						<option>08468</option>
						<option>08492</option>
						<option>07109</option>
						<option>08491</option>
						<option>08117</option>
						<option>04112</option>
						<option>02466</option>
						<option>03484</option>
						<option>08598</option>
						<option>04257</option>
						<option>01892</option>
						<option>04997</option>
						<option>08402</option>
						<option>04828</option>
						<option>02367</option>
						<option>07868</option>
						<option>02435</option>
						<option>05694</option>
						<option>07273</option>
						<option>07656</option>
						<option>0512</option>
						<option>06657</option>
						<option>06844</option>
						<option>02691</option>
						<option>01476</option>
						<option>01822</option>
						<option>02164</option>
						<option>04368</option>
						<option>04565</option>
						<option>01363</option>
						<option>06796</option>
						<option>07645</option>
						<option>07464</option>
						<option>05333</option>
						<option>07793</option>
						<option>07493</option>
						<option>08186</option>
						<option>01985</option>
						<option>05677</option>
						<option>07533</option>
						<option>03843</option>
						<option>0878</option>
						<option>03471</option>
						<option>02148</option>
						<option>02489</option>
						<option>08258</option>
						<option>02182</option>
						<option>01958</option>
						<option>0184</option>
						<option>07628</option>
						<option>0476</option>
						<option>04324</option>
						<option>05198</option>
						<option>05194</option>
						<option>08382</option>
						<option>04994</option>
						<option>07728</option>
						<option>05744</option>
						<option>05947</option>
						<option>06865</option>
						<option>07285</option>
						<option>07630</option>
						<option>07770</option>
						<option>07815</option>
						<option>06427</option>
						<option>01922</option>
						<option>06452</option>
						<option>07622</option>
						<option>07112</option>
						<option>06425</option>
						<option>03453</option>
						<option>08626</option>
						<option>04896</option>
						<option>02341</option>
						<option>07741</option>
						<option>02119</option>
						<option>04339</option>
						<option>01467</option>
						<option>01466</option>
						<option>06727</option>
						<option>07694</option>
						<option>06766</option>
						<option>05450</option>
						<option>02871</option>
						<option>07438</option>
						<option>07848</option>
						<option>07366</option>
						<option>0230</option>
						<option>05182</option>
						<option>06244</option>
						<option>05724</option>
						<option>07820</option>
						<option>07686</option>
						<option>07329</option>
						<option>06810</option>
						<option>05547</option>
						<option>05548</option>
						<option>07328</option>
						<option>02698</option>
						<option>02833</option>
						<option>07263</option>
						<option>08742</option>
						<option>08336</option>
						<option>08730</option>
						<option>07468</option>
						<option>0733</option>
						<option>07497</option>
						<option>07430</option>
						<option>03222</option>
						<option>0160</option>
						<option>07282</option>
						<option>06583</option>
						<option>07274</option>
						<option>05943</option>
						<option>05948</option>
						<option>03243</option>
						<option>02803</option>
						<option>02356</option>
						<option>02694</option>
						<option>02775</option>
						<option>02761</option>
						<option>05872</option>
						<option>05870</option>
						<option>02907</option>
						<option>07286</option>
						<option>01593</option>
						<option>07370</option>
						<option>07571</option>
						<option>03655</option>
						<option>03786</option>
						<option>02192</option>
						<option>03825</option>
						<option>02437</option>
						<option>06528</option>
						<option>07581</option>
						<option>06755</option>
						<option>05738</option>
						<option>05944</option>
						<option>05949</option>
						<option>04898</option>
						<option>02469</option>
						<option>03863</option>
						<option>06466</option>
						<option>07456</option>
						<option>01497</option>
						<option>01463</option>
						<option>01460</option>
						<option>01995</option>
						<option>04542</option>
						<option>08505</option>
						<option>02795</option>
						<option>04204</option>
						<option>08566</option>
						<option>04923</option>
						<option>0370</option>
						<option>08510</option>
						<option>03661</option>
						<option>08152</option>
						<option>07494</option>
						<option>03788</option>
						<option>03837</option>
						<option>01533</option>
						<option>01534</option>
						<option>01535</option>
						<option>01536</option>
						<option>06527</option>
						<option>0231</option>
						<option>033</option>
						<option>08501</option>
						<option>08224</option>
						<option>06679</option>
						<option>05165</option>
						<option>07786</option>
						<option>07866</option>
						<option>02423</option>
						<option>08265</option>
						<option>08539</option>
						<option>06852</option>
						<option>08138</option>
						<option>07759</option>
						<option>02163</option>
						<option>06457</option>
						<option>01259</option>
						<option>07753</option>
						<option>06848</option>
						<option>04266</option>
						<option>02827</option>
						<option>08744</option>
						<option>01635</option>
						<option>07658</option>
						<option>01421</option>
						<option>02958</option>
						<option>01488</option>
						<option>0481</option>
						<option>04632</option>
						<option>08622</option>
						<option>08813</option>
						<option>07840</option>
						<option>03472</option>
						<option>04343</option>
						<option>08230</option>
						<option>08640</option>
						<option>07858</option>
						<option>06642</option>
						<option>02362</option>
						<option>08391</option>
						<option>07100</option>
						<option>07297</option>
						<option>01931</option>
						<option>04323</option>
						<option>01902</option>
						<option>0435</option>
						<option>02954</option>
						<option>08386</option>
						<option>05341</option>
						<option>07623</option>
						<option>08254</option>
						<option>08304</option>
						<option>08132</option>
						<option>02796</option>
						<option>07764</option>
						<option>04885</option>
						<option>08570</option>
						<option>01955</option>
						<option>07139</option>
						<option>08518</option>
						<option>07705</option>
						<option>08393</option>
						<option>01744</option>
						<option>07593</option>
						<option>02965</option>
						<option>07804</option>
						<option>08536</option>
						<option>02560</option>
						<option>02834</option>
						<option>02804</option>
						<option>04651</option>
						<option>01581</option>
						<option>0744</option>
						<option>07529</option>
						<option>01900</option>
						<option>06625</option>
						<option>07181</option>
						<option>06346</option>
						<option>07690</option>
						<option>02839</option>
						<option>02759</option>
						<option>08567</option>
						<option>05463</option>
						<option>05176</option>
						<option>05175</option>
						<option>02895</option>
						<option>01431</option>
						<option>07634</option>
						<option>02351</option>
						<option>07635</option>
						<option>01386</option>
						<option>01382</option>
						<option>01348</option>
						<option>06565</option>
						<option>07590</option>
						<option>02382</option>
						<option>07687</option>
						<option>01573</option>
						<option>01492</option>
						<option>01570</option>
						<option>06855</option>
						<option>01982</option>
						<option>02753</option>
						<option>02677</option>
						<option>08537</option>
						<option>07859</option>
						<option>06526</option>
						<option>01252</option>
						<option>07260</option>
						<option>02114</option>
						<option>07756</option>
						<option>0522</option>
						<option>07788</option>
						<option>0161</option>
						<option>02674</option>
						<option>0372</option>
						<option>01529</option>
						<option>01526</option>
						<option>01527</option>
						<option>01528</option>
						<option>02629</option>
						<option>06676</option>
						<option>05454</option>
						<option>08493</option>
						<option>08571</option>
						<option>02350</option>
						<option>02183</option>
						<option>06476</option>
						<option>08749</option>
						<option>06276</option>
						<option>06438</option>
						<option>08272</option>
						<option>08464</option>
						<option>08137</option>
						<option>0452</option>
						<option>04115</option>
						<option>02168</option>
						<option>08719</option>
						<option>08542</option>
						<option>02145</option>
						<option>08720</option>
						<option>06437</option>
						<option>05523</option>
						<option>06153</option>
						<option>02149</option>
						<option>07723</option>
						<option>02373</option>
						<option>06423</option>
						<option>07283</option>
						<option>07365</option>
						<option>05281</option>
						<option>01999</option>
						<option>06227</option>
						<option>02844</option>
						<option>07461</option>
						<option>03670</option>
						<option>07674</option>
						<option>05672</option>
						<option>03657</option>
						<option>06157</option>
						<option>07670</option>
						<option>07803</option>
						<option>03775</option>
						<option>07785</option>
						<option>08503</option>
						<option>03562</option>
						<option>01637</option>
						<option>08231</option>
						<option>03512</option>
						<option>02554</option>
						<option>01675</option>
						<option>07254</option>
						<option>02357</option>
						<option>07424</option>
						<option>02870</option>
						<option>05212</option>
						<option>02829</option>
						<option>06861</option>
						<option>07267</option>
						<option>06348</option>
						<option>02773</option>
						<option>01437</option>
						<option>02185</option>
						<option>08151</option>
						<option>02955</option>
						<option>02365</option>
						<option>04574</option>
						<option>04935</option>
						<option>04332</option>
						<option>07421</option>
						<option>02874</option>
						<option>07291</option>
						<option>03253</option>
						<option>02133</option>
						<option>08736</option>
						<option>01486</option>
						<option>01489</option>
						<option>08855</option>
						<option>06531</option>
						<option>01495</option>
						<option>01905</option>
						<option>07642</option>
						<option>07422</option>
						<option>06545</option>
						<option>02623</option>
						<option>08232</option>
						<option>07771</option>
						<option>08645</option>
						<option>03713</option>
						<option>0824</option>
						<option>02188</option>
						<option>02140</option>
						<option>07457</option>
						<option>02878</option>
						<option>07253</option>
						<option>02443</option>
						<option>0483</option>
						<option>02591</option>
						<option>04924</option>
						<option>04367</option>
						<option>06593</option>
						<option>07746</option>
						<option>07703</option>
						<option>07627</option>
						<option>01652</option>
						<option>05664</option>
						<option>08729</option>
						<option>08538</option>
						<option>03871</option>
						<option>07236</option>
						<option>08342</option>
						<option>03771</option>
						<option>07237</option>
						<option>05451</option>
						<option>03798</option>
						<option>08596</option>
						<option>08404</option>
						<option>07750</option>
						<option>02935</option>
						<option>08471</option>
						<option>06159</option>
						<option>03583</option>
						<option>06864</option>
						<option>0565</option>
						<option>05195</option>
						<option>05284</option>
						<option>07663</option>
						<option>05464</option>
						<option>05178</option>
						<option>0479</option>
						<option>07648</option>
						<option>01233</option>
						<option>03656</option>
						<option>04364</option>
						<option>03793</option>
						<option>08452</option>
						<option>08593</option>
						<option>08418</option>
						<option>02378</option>
						<option>0121</option>
						<option>01257</option>
						<option>07527</option>
						<option>05172</option>
						<option>02762</option>
						<option>05334</option>
						<option>07268</option>
						<option>03584</option>
						<option>01590</option>
						<option>01591</option>
						<option>08725</option>
						<option>04254</option>
						<option>04298</option>
						<option>07324</option>
						<option>03807</option>
						<option>04892</option>
						<option>08689</option>
						<option>05442</option>
						<option>05440</option>
						<option>05865</option>
						<option>05861</option>
						<option>02666</option>
						<option>02774</option>
						<option>01232</option>
						<option>01636</option>
						<option>07197</option>
						<option>05493</option>
						<option>05876</option>
						<option>05875</option>
						<option>06816</option>
						<option>06187</option>
						<option>01285</option>
						<option>07747</option>
						<option>02189</option>
						<option>02529</option>
						<option>0369</option>
						<option>08198</option>
						<option>03869</option>
						<option>06344</option>
						<option>0591</option>
						<option>03754</option>
						<option>07532</option>
						<option>03678</option>
						<option>07228</option>
						<option>02822</option>
						<option>06252</option>
						<option>06223</option>
						<option>06859</option>
						<option>07115</option>
						<option>08334</option>
						<option>08356</option>
						<option>08350</option>
						<option>08263</option>
						<option>04576</option>
						<option>02461</option>
						<option>01633</option>
						<option>07174</option>
						<option>04202</option>
						<option>08159</option>
						<option>02756</option>
						<option>07147</option>
						<option>08715</option>
						<option>022</option>
						<option>08301</option>
						<option>08371</option>
						<option>02838</option>
						<option>07548</option>
						<option>07755</option>
						<option>04865</option>
						<option>05961</option>
						<option>02524</option>
						<option>06522</option>
						<option>03483</option>
						<option>07256</option>
						<option>02144</option>
						<option>08337</option>
						<option>05361</option>
						<option>04326</option>
						<option>0485</option>
						<option>0131</option>
						<option>0621</option>
						<option>08659</option>
						<option>0821</option>
						<option>01765</option>
						<option>06332</option>
						<option>05643</option>
						<option>0268</option>
						<option>08234</option>
						<option>03672</option>
						<option>04365</option>
						<option>03565</option>
						<option>08540</option>
						<option>06564</option>
						<option>01584</option>
						<option>01582</option>
						<option>01585</option>
						<option>07179</option>
						<option>04652</option>
						<option>01343</option>
						<option>07673</option>
						<option>0712</option>
						<option>07700</option>
						<option>01702</option>
						<option>02137</option>
						<option>05942</option>
						<option>07646</option>
						<option>07437</option>
						<option>01341</option>
						<option>02835</option>
						<option>01821</option>
						<option>06647</option>
						<option>01331</option>
						<option>06428</option>
						<option>01795</option>
						<option>03624</option>
						<option>08682</option>
						<option>03465</option>
						<option>02831</option>
						<option>08498</option>
						<option>04286</option>
						<option>08692</option>
						<option>06868</option>
						<option>02462</option>
						<option>07221</option>
						<option>02552</option>
						<option>08678</option>
						<option>08513</option>
						<option>07279</option>
						<option>02564</option>
						<option>08514</option>
						<option>01887</option>
						<option>04635</option>
						<option>08221</option>
						<option>05253</option>
						<option>05254</option>
						<option>01734</option>
						<option>05191</option>
						<option>07781</option>
						<option>08718</option>
						<option>08456</option>
						<option>08506</option>
						<option>08377</option>
						<option>06253</option>
						<option>07105</option>
						<option>06677</option>
						<option>01282</option>
						<option>08458</option>
						<option>08814</option>
						<option>08647</option>
						<option>08266</option>
						<option>07375</option>
						<option>06721</option>
						<option>07792</option>
						<option>08932</option>
						<option>01684</option>
						<option>07491</option>
						<option>0253</option>
						<option>01491</option>
						<option>07563</option>
						<option>02661</option>
						<option>07595</option>
						<option>04544</option>
						<option>02953</option>
						<option>06421</option>
						<option>05544</option>
						<option>05543</option>
						<option>08380</option>
						<option>02569</option>
						<option>0215</option>
						<option>02637</option>
						<option>01586</option>
						<option>05825</option>
						<option>06324</option>
						<option>01823</option>
						<option>06753</option>
						<option>03223</option>
						<option>04728</option>
						<option>04868</option>
						<option>01574</option>
						<option>07423</option>
						<option>03784</option>
						<option>08118</option>
						<option>0861</option>
						<option>07721</option>
						<option>02481</option>
						<option>07861</option>
						<option>011</option>
						<option>01438</option>
						<option>02427</option>
						<option>03193</option>
						<option>08680</option>
						<option>05871</option>
						<option>05873</option>
						<option>05874</option>
						<option>04931</option>
						<option>02384</option>
						<option>01745</option>
						<option>06758</option>
						<option>01477</option>
						<option>08440</option>
						<option>02550</option>
						<option>08734</option>
						<option>01904</option>
						<option>07680</option>
						<option>07641</option>
						<option>08462</option>
						<option>02628</option>
						<option>06596</option>
						<option>01980</option>
						<option>01555</option>
						<option>01502</option>
						<option>01537</option>
						<option>01531</option>
						<option>01532</option>
						<option>03638</option>
						<option>03654</option>
						<option>03752</option>
						<option>07685</option>
						<option>06678</option>
						<option>06858</option>
						<option>01960</option>
						<option>08747</option>
						<option>01267</option>
						<option>01893</option>
						<option>08656</option>
						<option>01981</option>
						<option>04553</option>
						<option>07773</option>
						<option>02892</option>
						<option>04290</option>
						<option>02475</option>
						<option>08592</option>
						<option>0423</option>
						<option>05162</option>
						<option>04372</option>
						<option>02927</option>
						<option>02922</option>
						<option>02926</option>
						<option>02472</option>
						<option>08753</option>
						<option>07578</option>
						<option>02596</option>
						<option>02980</option>
						<option>02988</option>
						<option>07433</option>
						<option>07783</option>
						<option>01505</option>
						<option>02820</option>
						<option>08935</option>
						<option>06683</option>
						<option>02662</option>
						<option>05564</option>
						<option>01936</option>
						<option>05733</option>
						<option>06684</option>
						<option>02431</option>
						<option>08585</option>
						<option>07844</option>
						<option>03778</option>
						<option>06325</option>
						<option>06259</option>
						<option>06435</option>
						<option>04348</option>
						<option>04822</option>
						<option>08941</option>
						<option>01894</option>
						<option>04545</option>
						<option>02742</option>
						<option>02525</option>
						<option>0491</option>
						<option>07816</option>
						<option>02142</option>
						<option>02936</option>
						<option>02932</option>
						<option>02848</option>
						<option>06536</option>
						<option>06765</option>
						<option>04255</option>
						<option>08579</option>
						<option>08642</option>
						<option>01275</option>
						<option>08490</option>
						<option>07754</option>
						<option>08236</option>
						<option>07320</option>
						<option>07235</option>
						<option>02186</option>
						<option>07164</option>
						<option>07819</option>
						<option>01897</option>
						<option>03797</option>
						<option>02328</option>
						<option>0180</option>
						<option>0832</option>
						<option>07732</option>
						<option>01704</option>
						<option>06869</option>
						<option>04374</option>
						<option>06768</option>
						<option>04564</option>
						<option>02477</option>
						<option>07784</option>
						<option>07161</option>
						<option>01588</option>
						<option>01589</option>
						<option>02452</option>
						<option>06722</option>
						<option>08412</option>
						<option>08713</option>
						<option>06815</option>
						<option>02488</option>
						<option>02597</option>
						<option>07102</option>
						<option>01379</option>
						<option>02484</option>
						<option>08963</option>
						<option>07811</option>
						<option>0368</option>
						<option>07826</option>
						<option>06560</option>
						<option>07621</option>
						<option>02766</option>
						<option>02372</option>
						<option>07605</option>
						<option>07765</option>
						<option>04733</option>
						<option>0186</option>
						<option>08946</option>
						<option>02428</option>
						<option>02451</option>
						<option>07601</option>
						<option>0175</option>
						<option>0612</option>
						<option>06648</option>
						<option>02444</option>
						<option>06729</option>
						<option>05343</option>
						<option>01851</option>
						<option>08520</option>
						<option>04373</option>
						<option>07185</option>
						<option>01368</option>
						<option>01346</option>
						<option>08136</option>
						<option>02664</option>
						<option>07733</option>
						<option>04985</option>
						<option>08522</option>
						<option>08728</option>
						<option>08852</option>
						<option>04869</option>
						<option>01741</option>
						<option>02558</option>
						<option>02143</option>
						<option>07751</option>
						<option>08555</option>
						<option>04328</option>
						<option>04933</option>
						<option>04294</option>
						<option>07391</option>
						<option>01430</option>
						<option>01824</option>
						<option>02923</option>
						<option>02921</option>
						<option>02925</option>
						<option>02924</option>
						<option>02166</option>
						<option>05522</option>
						<option>05524</option>
						<option>03865</option>
						<option>01826</option>
						<option>06845</option>
						<option>05332</option>
						<option>06842</option>
						<option>01424</option>
						<option>01425</option>
						<option>01651</option>
						<option>06277</option>
						<option>05460</option>
						<option>05465</option>
						<option>07496</option>
						<option>08649</option>
						<option>08584</option>
						<option>05882</option>
						<option>02561</option>
						<option>02971</option>
						<option>07701</option>
						<option>07458</option>
						<option>07576</option>
						<option>02139</option>
						<option>07434</option>
						<option>06181</option>
						<option>05821</option>
						<option>08869</option>
						<option>05964</option>
						<option>08499</option>
						<option>07490</option>
						<option>02995</option>
						<option>03017</option>
						<option>02996</option>
						<option>02994</option>
						<option>03019</option>
						<option>02191</option>
						<option>08811</option>
						<option>04259</option>
						<option>04181</option>
						<option>08343</option>
						<option>0413</option>
						<option>04333</option>
						<option>04119</option>
						<option>01785</option>
						<option>01965</option>
						<option>0286</option>
						<option>05844</option>
						<option>07148</option>
						<option>02770</option>
						<option>05342</option>
						<option>01478</option>
						<option>01479</option>
						<option>07777</option>
						<option>07776</option>
						<option>08564</option>
						<option>04322</option>
						<option>08568</option>
						<option>01933</option>
						<option>0475</option>
						<option>07323</option>
						<option>020</option>
						<option>08581</option>
						<option>06228</option>
						<option>05880</option>
						<option>06752</option>
						<option>06454</option>
						<option>01373</option>
						<option>03252</option>
						<option>06843</option>
						<option>05142</option>
						<option>07233</option>
						<option>02375</option>
						<option>07629</option>
						<option>08251</option>
						<option>08577</option>
						<option>01872</option>
						<option>0474</option>
						<option>03821</option>
						<option>06817</option>
						<option>02321</option>
						<option>02746</option>
						<option>06327</option>
						<option>07544</option>
						<option>07535</option>
						<option>07584</option>
						<option>02830</option>
						<option>02426</option>
						<option>08331</option>
						<option>0535</option>
						<option>08532</option>
						<option>03523</option>
						<option>07762</option>
						<option>01481</option>
						<option>0771</option>
						<option>02937</option>
						<option>06644</option>
						<option>06794</option>
						<option>07482</option>
						<option>01507</option>
						<option>0883</option>
						<option>08565</option>
						<option>07744</option>
						<option>04563</option>
						<option>02353</option>
						<option>06336</option>
						<option>06554</option>
						<option>06624</option>
						<option>01799</option>
						<option>01464</option>
						<option>01559</option>
						<option>07372</option>
						<option>01375</option>
						<option>02135</option>
						<option>06671</option>
						<option>0281</option>
						<option>06426</option>
						<option>01962</option>
						<option>02640</option>
						<option>07284</option>
						<option>07832</option>
						<option>01762</option>
						<option>02952</option>
						<option>02794</option>
						<option>07173</option>
						<option>07202</option>
						<option>08857</option>
						<option>01655</option>
						<option>04567</option>
						<option>08694</option>
						<option>01998</option>
						<option>07779</option>
						<option>08335</option>
						<option>04573</option>
						<option>07459</option>
						<option>01468</option>
						<option>06553</option>
						<option>06256</option>
						<option>01990</option>
						<option>08864</option>
						<option>0595</option>
						<option>01782</option>
						<option>03461</option>
						<option>05241</option>
						<option>07114</option>
						<option>03473</option>
						<option>02801</option>
						<option>0651</option>
						<option>08373</option>
						<option>03714</option>
						<option>06461</option>
						<option>05966</option>
						<option>04172</option>
						<option>04735</option>
						<option>08621</option>
						<option>05491</option>
						<option>01471</option>
						<option>04287</option>
						<option>01567</option>
						<option>05280</option>
						<option>01697</option>
						<option>07412</option>
						<option>02352</option>
						<option>02584</option>
						<option>06255</option>
						<option>08561</option>
						<option>08495</option>
						<option>06856</option>
						<option>01853</option>
						<option>08862</option>
						<option>01991</option>
						<option>07585</option>
						<option>02975</option>
						<option>08648</option>
						<option>03659</option>
						<option>02697</option>
						<option>07662</option>
						<option>01274</option>
						<option>07251</option>
						<option>05445</option>
						<option>05444</option>
						<option>02194</option>
						<option>01781</option>
						<option>01262</option>
						<option>06188</option>
						<option>03803</option>
						<option>03802</option>
						<option>03779</option>
						<option>08381</option>
						<option>01332</option>
						<option>01334</option>
						<option>01881</option>
						<option>06275</option>
						<option>0661</option>
						<option>05645</option>
						<option>06475</option>
						<option>07536</option>
						<option>05661</option>
						<option>03880</option>
						<option>03756</option>
						<option>01503</option>
						<option>01686</option>
						<option>05144</option>
						<option>03809</option>
						<option>08183</option>
						<option>07582</option>
						<option>05466</option>
						<option>02966</option>
						<option>07460</option>
						<option>0132</option>
						<option>06478</option>
						<option>05833</option>
						<option>06436</option>
						<option>05495</option>
						<option>03835</option>
						<option>03836</option>
						<option>07413</option>
						<option>02160</option>
						<option>08173</option>
						<option>07186</option>
						<option>02568</option>
						<option>07180</option>
						<option>0427</option>
						<option>05566</option>
						<option>05561</option>
						<option>08283</option>
						<option>05311</option>
						<option>05313</option>
						<option>02906</option>
						<option>08964</option>
						<option>01764</option>
						<option>06274</option>
						<option>01923</option>
						<option>0663</option>
						<option>05923</option>
						<option>01628</option>
						<option>07151</option>
						<option>02717</option>
						<option>02979</option>
						<option>02970</option>
						<option>05854</option>
						<option>08395</option>
						<option>02425</option>
						<option>02354</option>
						<option>08455</option>
						<option>01499</option>
						<option>0233</option>
						<option>07450</option>
						<option>02187</option>
						<option>01672</option>
						<option>08345</option>
						<option>04283</option>
						<option>04636</option>
						<option>02665</option>
						<option>02738</option>
						<option>02675</option>
						<option>07321</option>
						<option>07113</option>
						<option>07465</option>
						<option>02905</option>
						<option>06597</option>
						<option>07725</option>
						<option>07768</option>
						<option>07371</option>
						<option>07296</option>
						<option>01563</option>
						<option>01564</option>
						<option>01237</option>
						<option>01659</option>
						<option>01763</option>
						<option>07841</option>
						<option>01496</option>
						<option>06184</option>
						<option>02115</option>
						<option>02555</option>
						<option>02162</option>
						<option>04295</option>
						<option>08761</option>
						<option>07672</option>
						<option>08641</option>
						<option>08576</option>
						<option>08330</option>
						<option>07165</option>
						<option>08378</option>
						<option>02845</option>
						<option>02667</option>
						<option>07462</option>
						<option>02363</option>
						<option>02621</option>
						<option>02755</option>
						<option>08441</option>
						<option>03451</option>
						<option>07562</option>
						<option>06341</option>
						<option>07155</option>
						<option>07778</option>
						<option>07281</option>
						<option>07521</option>
						<option>07692</option>
						<option>07570</option>
						<option>03787</option>
						<option>08548</option>
						<option>05960</option>
						<option>05853</option>
						<option>02565</option>
						<option>02527</option>
						<option>08479</option>
						<option>01484</option>
						<option>07652</option>
						<option>05453</option>
						<option>05842</option>
						<option>07734</option>
						<option>07640</option>
						<option>02329</option>
						<option>07364</option>
						<option>07757</option>
						<option>08259</option>
						<option>07265</option>
						<option>02670</option>
						<option>02987</option>
						<option>02981</option>
						<option>02976</option>
						<option>06222</option>
						<option>07530</option>
						<option>02929</option>
						<option>02928</option>
						<option>06326</option>
						<option>0478</option>
						<option>02429</option>
						<option>08187</option>
						<option>05676</option>
						<option>0364</option>
						<option>0177</option>
						<option>08182</option>
						<option>08487</option>
						<option>02345</option>
						<option>02322</option>
						<option>02563</option>
						<option>02138</option>
						<option>02169</option>
						<option>07492</option>
						<option>0217</option>
						<option>04926</option>
						<option>08443</option>
						<option>02422</option>
						<option>02487</option>
						<option>02147</option>
						<option>07360</option>
						<option>03772</option>
						<option>08389</option>
						<option>08589</option>
						<option>08457</option>
						<option>05864</option>
						<option>06151</option>
						<option>07822</option>
						<option>02767</option>
						<option>08158</option>
						<option>02846</option>
						<option>07624</option>
						<option>05721</option>
						<option>05735</option>
						<option>01572</option>
						<option>03842</option>
						<option>08938</option>
						<option>0353</option>
						<option>02430</option>
						<option>07484</option>
						<option>06559</option>
						<option>06525</option>
						<option>08488</option>
						<option>07178</option>
						<option>08535</option>
						<option>02566</option>
						<option>07269</option>
						<option>06247</option>
						<option>07805</option>
						<option>02551</option>
						<option>08135</option>
						<option>08723</option>
						<option>07660</option>
						<option>02972</option>
						<option>07131</option>
						<option>07591</option>
						<option>08738</option>
						<option>01666</option>
						<option>08384</option>
						<option>08396</option>
						<option>06226</option>
						<option>07426</option>
						<option>07834</option>
						<option>05862</option>
						<option>04575</option>
						<option>06154</option>
						<option>02900</option>
						<option>02901</option>
						<option>01255</option>
						<option>05736</option>
						<option>08583</option>
						<option>07575</option>
						<option>06685</option>
						<option>02960</option>
						<option>01792</option>
						<option>08947</option>
						<option>08276</option>
						<option>06654</option>
						<option>07395</option>
						<option>06158</option>
						<option>0130</option>
						<option>07270</option>
						<option>01954</option>
						<option>08184</option>
						<option>05335</option>
						<option>06788</option>
						<option>02438</option>
						<option>01906</option>
						<option>01565</option>
						<option>01566</option>
						<option>0154</option>
						<option>08942</option>
						<option>08578</option>
						<option>01501</option>
						<option>01575</option>
						<option>0194</option>
						<option>08157</option>
						<option>04111</option>
						<option>08524</option>
						<option>04630</option>
						<option>08966</option>
						<option>08741</option>
						<option>01568</option>
						<option>01569</option>
						<option>01560</option>
						<option>07864</option>
						<option>08257</option>
						<option>08623</option>
						<option>05362</option>
						<option>01828</option>
						<option>02808</option>
						<option>06853</option>
						<option>01676</option>
						<option>06622</option>
						<option>01907</option>
						<option>06473</option>
						<option>06819</option>
						<option>07775</option>
						<option>0261</option>
						<option>01508</option>
						<option>01509</option>
						<option>02752</option>
						<option>02593</option>
						<option>03462</option>
						<option>08684</option>
						<option>07361</option>
						<option>08227</option>
						<option>06675</option>
						<option>08818</option>
						<option>08558</option>
						<option>02842</option>
						<option>02877</option>
						<option>02521</option>
						<option>06760</option>
						<option>07156</option>
						<option>03790</option>
						<option>03791</option>
						<option>04982</option>
						<option>08190</option>
						<option>02567</option>
						<option>03877</option>
						<option>07149</option>
						<option>03228</option>
						<option>01886</option>
						<option>05274</option>
						<option>05273</option>
						<option>08411</option>
						<option>08819</option>
						<option>07761</option>
						<option>03665</option>
						<option>05260</option>
						<option>05261</option>
						<option>01852</option>
						<option>07369</option>
						<option>01561</option>
						<option>08261</option>
						<option>02346</option>
						<option>03794</option>
						<option>01376</option>
						<option>08945</option>
						<option>08426</option>
						<option>06735</option>
						<option>0490</option>
						<option>08644</option>
						<option>07603</option>
						<option>04633</option>
						<option>07661</option>
						<option>03712</option>
						<option>03804</option>
						<option>06459</option>
						<option>01465</option>
						<option>07390</option>
						<option>04362</option>
						<option>02747</option>
						<option>02737</option>
						<option>02699</option>
						<option>04546</option>
						<option>01783</option>
						<option>03873</option>
						<option>08181</option>
						<option>04549</option>
						<option>04369</option>
						<option>0471</option>
						<option>04862</option>
						<option>03848</option>
						<option>08693</option>
						<option>04327</option>
						<option>01539</option>
						<option>01493</option>
						<option>01469</option>
						<option>07683</option>
						<option>05841</option>
						<option>07573</option>
						<option>04147</option>
						<option>0374</option>
						<option>08134</option>
						<option>08673</option>
						<option>07198</option>
						<option>04639</option>
						<option>04288</option>
						<option>0462</option>
						<option>0877</option>
						<option>04577</option>
						<option>04179</option>
						<option>0421</option>
						<option>0494</option>
						<option>04118</option>
						<option>0469</option>
						<option>04175</option>
						<option>04366</option>
						<option>04116</option>
						<option>04182</option>
						<option>06556</option>
						<option>06655</option>
						<option>07225</option>
						<option>01433</option>
						<option>01692</option>
						<option>01253</option>
						<option>01435</option>
						<option>01432</option>
						<option>06538</option>
						<option>07852</option>
						<option>0487</option>
						<option>0431</option>
						<option>02594</option>
						<option>06477</option>
						<option>03861</option>
						<option>02471</option>
						<option>0816</option>
						<option>07183</option>
						<option>06840</option>
						<option>08854</option>
						<option>03651</option>
						<option>08139</option>
						<option>0461</option>
						<option>03799</option>
						<option>01909</option>
						<option>07833</option>
						<option>07485</option>
						<option>01594</option>
						<option>06479</option>
						<option>06795</option>
						<option>03711</option>
						<option>08620</option>
						<option>02385</option>
						<option>01992</option>
						<option>04252</option>
						<option>0820</option>
						<option>0734</option>
						<option>01364</option>
						<option>03845</option>
						<option>03870</option>
						<option>04149</option>
						<option>08599</option>
						<option>07625</option>
						<option>07231</option>
						<option>06866</option>
						<option>02598</option>
						<option>07116</option>
						<option>01975</option>
						<option>02875</option>
						<option>01436</option>
						<option>0515</option>
						<option>02826</option>
						<option>04998</option>
						<option>07810</option>
						<option>08496</option>
						<option>01956</option>
						<option>02136</option>
						<option>04552</option>
						<option>04341</option>
						<option>08731</option>
						<option>05265</option>
						<option>08748</option>
						<option>04884</option>
						<option>02739</option>
						<option>0265</option>
						<option>02161</option>
						<option>04829</option>
						<option>08588</option>
						<option>04292</option>
						<option>02643</option>
						<option>02841</option>
						<option>02957</option>
						<option>04637</option>
						<option>02625</option>
						<option>02632</option>
						<option>04174</option>
						<option>02872</option>
						<option>0260</option>
						<option>0542</option>
						<option>02740</option>
						<option>08586</option>
						<option>03841</option>
						<option>04551</option>
						<option>02130</option>
						<option>0416</option>
						<option>04268</option>
						<option>02366</option>
						<option>08625</option>
						<option>08587</option>
						<option>02876</option>
						<option>07592</option>
						<option>02436</option>
						<option>02763</option>
						<option>0866</option>
						<option>07626</option>
						<option>08416</option>
						<option>04638</option>
						<option>04146</option>
						<option>08629</option>
						<option>08646</option>
						<option>08274</option>
						<option>02715</option>
						<option>01422</option>
						<option>04143</option>
						<option>04562</option>
						<option>0891</option>
						<option>02873</option>
						<option>02765</option>
						<option>02347</option>
						<option>08922</option>
						<option>08676</option>
						<option>02626</option>
						<option>02526</option>
						<option>08476</option>
						<option>07772</option>
						<option>02668</option>
						<option>02167</option>
						<option>02118</option>
						<option>08543</option>
						<option>04183</option>
						<option>07239</option>
						<option>02828</option>
						<option>0870</option>
						<option>07633</option>
						<option>07152</option>
						<option>08711</option>
						<option>07229</option>
						<option>07176</option>
						<option>07252</option>
						<option>02371</option>
						<option>06322</option>
						<option>03658</option>
						<option>03860</option>
						<option>08473</option>
						<option>03777</option>
						<option>02585</option>
						<option>08931</option>
						<option>08865</option>
						<option>08534</option>
						<option>08868</option>
						<option>08745</option>
						<option>08550</option>
						<option>08419</option>
						<option>08465</option>
						<option>02559</option>
						<option>07232</option>
						<option>04281</option>
						<option>08403</option>
						<option>08451</option>
						<option>05497</option>
						<option>01983</option>
						<option>07289</option>
						<option>01682</option>
						<option>03867</option>
 
      </datalist>  
						</div>
						
						<div class="col-lg-8 form-group">
						<input type="number" name="lnum" pattern="[0-9]{5,8}" onkeyup="return landlinevalidate()" title="should contain valid Landline number." placeholder="LandLine Number">
						</div>
						
						</div>
						<div class="col-lg-12 form-group">
						<label>Company Information<span class="req">*</span> </label>
						<textarea type="text" name="cinfo" pattern="[a-zA-Z0-9.@_-\s]{10,500}" title="should contain minimum 10 characters" placeholder="Company Information"></textarea>
					</div>
					<div class="col-md-6 form-group">
					     <label>Password<span class="req">*</span> </label>
						<input name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" placeholder="Password" required>
						 
						 </div>
						 <div class=" col-md-6 form-group">
						<label>Confirm Password<span class="req">*</span> </label>
						<input name="cpassword" id="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" placeholder="Confirm Password" onchange="checkPasswordMatch();" required>
						 
					</div>
						<div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
					<div class="col-md-12 form-group">
						
						 <label class="lregister pull-left">Company Logo<span class="req">*</span></label>
					  <input type="file" class="form-control-file" name="clogo" accept="image/jpg, image/JPG,image/JPEG, image/jpeg" id="exampleInputFile" aria-describedby="fileHelp" onchange="load_image(this.id,this.value)" required>
    <small id="fileHelp" class="form-text text-muted pull-left">*.jpeg *.jpg  *.png</small>
						 
					</div>
                        <button class="button button-block" type="submit" name="sub" />Register</button> 
                    </form>
                   
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
			
        </div>
							  
 
	
  </section><!-- #hero -->

 

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Talent Beehive</strong>. All Rights Reserved
      </div>
    
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>

  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>

   <!-- Password Matching Javascript -->
    <script>
               function checkPasswordMatch() {
    var password = $("#password").val();
    var cpassword = $("#cpassword").val();

    if (password != cpassword)
        $("#divCheckPasswordMatch").html("Passwords do not match!").css('color', 'red');
    else
        $("#divCheckPasswordMatch").html("Passwords match.").css('color', 'green');
}
$(document).ready(function () {
   $("#cpassword").keyup(checkPasswordMatch);
});
	</script>
	
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  
 
  
</body>
</html>

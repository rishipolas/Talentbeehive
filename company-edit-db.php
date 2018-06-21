<?php




function GetImageExtension($imagetype)
{
    if(empty($imagetype)) return false;

    switch($imagetype)
    {
        
        case 'image/jpeg': return '.jpg';
        case 'image/png': return '.png';
        default: return false;
    }
}
	
if(isset($_POST['btnSubmit']))
{
	
	
	
include('config1.php');
	
	$cname=$_POST['cname'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$cpassword=md5($_POST['cpassword']);
	

	$clogo=$_FILES['clogo']['name'];
	
    $imagename=$_FILES['clogo']['name']."-".date("d-m-Y")."-".time(). GetImageExtension($_FILES["clogo"]["ctype"]);	
	
	$cinfo=$_POST['cinfo'];
	$cweb=$_POST['cweb'];
	$number=$_POST['mnumber']."-".$_POST['num'];		
	$lnumber=$_POST['code']."-".$_POST['lnum'];		
	$ctype=$_POST['ctype'];
	
	

	
	if(move_uploaded_file($_FILES["clogo"]["tmp_name"] , "uploads/".$imagename))
	{
	

	
			$q= "insert into users(cname,email,password,cpassword,clogo,cinfo,cweb,ctype,number,lnumber) values('$cname','$email','$password','$cpassword','$imagename','$cinfo','$cweb','$ctype','$number','$lnumber')";
			mysqli_query($db,$q);
	
		//echo "hi";
		//echo "".$image;
		//echo " ".$_FILES['image']['tmp_name'];
		//echo "".$target;
	
	
		header("location:admin-display.php");
		//header("location:index.php");
		//echo "success";
		
	
	}	
	else
	{
		echo "fail image";
	}
}
?>

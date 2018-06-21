<?php
session_start();
  require('config1.php');
   $con=mysqli_connect('localhost','root');
        mysqli_select_db($con,'codexworld');
if (isset($_POST['qu_id']))
{
	
	$result=mysqli_query($con,"SELECT * FROM `functionality` WHERE `qualification`=".$_POST['qualification']."") or die("query is worng");

	 $output= '<option value=""> Select Stream</option>';
	 while ($row = mysql_fetch_array($result) ){
		 
		  $output.= ' <option value="'.$row['branch_data'].'">'. $row['branch_data'].'<option>' ;
	 }
	 echo  $output;
	 exit();
	
}
/*
if(isset($_POST['clg_id'])){
	
	$clg=$_POST['clg_id'];

mysql_query("INSERT INTO `company_invite`(`company_id`, `clg_id`,`pending`,date_time) VALUES ('".$_SESSION['id']."','$clg',1,now())");
	 echo mysql_insert_id();
	 echo "success";
	 exit();	
	
}
//code for accept
if(isset($_POST['invit_id'])){
	
	
	$inviteid=$_POST['invit_id'];
	
	
     mysql_query("UPDATE `company_invite` SET `accept`=1,`pending`=0,`date_time`=now() WHERE id='$inviteid'");
	 echo mysql_insert_id();
	 echo "success";
	 exit();
	
	
}
//code for rejection
if(isset($_POST['rej_id'])){
	
	
	$inviteid=$_POST['rej_id'];
	
	
     mysql_query("UPDATE `company_invite` SET `reject`=1,`pending`=0,`date_time`=now() WHERE id='$inviteid'");
	 echo mysql_insert_id();
	 echo "success";
	 exit();
	
	
}
//code for delete
if(isset($_POST['det_id'])){
	
	
	$inviteid=$_POST['det_id'];
	
	
     mysql_query("UPDATE `company_invite` SET `reject`=1,`pending`=0,`date_time`=now() WHERE id='$inviteid'");
	 echo mysql_insert_id();
	 echo "success";
	 exit();
	
	
}
// code for delete post
if(isset($_POST['row_id'])){
	
	
	$id=$_POST['row_id'];
	$name=$_POST['a_val'];
	$email=$_POST['b_val'];
	$pass=$_POST['d_val'];
	
     mysql_query("UPDATE company_login SET `company_name`= '$name',`email`='$email', password='$pass' WHERE Id='$id'");
	 echo mysql_insert_id();
	 echo "success";
	 
	 $re= mysql_query("select * from company_login  WHERE Id='$id'");
	 while($rw=mysql_fetch_assoc($re)){
		 
		 $_SESSION['email']=$rw['email'];
		 $_SESSION['name']=$rw['company_name'];
	 }
	 exit();
	
	
}
// profile edit
if(isset($_POST[''])){
	
	
	$inviteid=$_POST['delete_id'];
	
	
     mysql_query("UPDATE compnay_jobpost SET `del_data`= 1,`date_time`=now() WHERE id='$inviteid'");
	 echo mysql_insert_id();
	 echo "success";
	 exit();
	
	
}


$result=mysql_query(" SELECT * FROM `company_invite` WHERE `pending`=1 and `company_id`='".$_SESSION['id']."'");
	 $count=mysql_num_rows($result);
	 if($count==0){
		 echo "0";
	 }
	 else{
	 echo $count;
	 }*/
?>
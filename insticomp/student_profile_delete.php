<?php
include('config1.php');
if (isset($_GET['idd'])) {
		$idd= $_GET['idd'];
		$result=mysqli_query($DB,"DELETE FROM student_registration where id='$idd'");
		if ($result) {
			?>
			<script>
				alert('successfuly Deleted !');
				window.location.href='student_profile.php';
			</script>
			<?php }
			else{
				?>
			<script>
				alert('faild to Delete !');
				window.location.href='student_profile.php';
			</script>
			<?php
			

		}
	}
	?>
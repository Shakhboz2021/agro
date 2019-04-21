<?php 
session_start();

	$staff_login = ""; // passport_num
	$staff_password = ""; // inn

	include('db_connect.php');
	

	if(isset($_POST['submit'])){
		$staff_login = mysqli_real_escape_string($db, $_POST['staff_login']);
		$staff_password_md = mysqli_real_escape_string($db, $_POST['staff_password']);
		$staff_branch=mysqli_real_escape_string($db, $_POST['filialc']);
		$staff_password=md5($staff_password_md);

		if($staff_login!="" && $staff_password!="" ){
			$sql="CALL `checklogin`('$staff_login','$staff_password','$staff_branch')";
			
			$result = mysqli_query($db, $sql);
			$row = mysqli_fetch_array($result);
			$count = mysqli_num_rows($result);
			if($count==1){
			
				$_SESSION['staff_login'] = $staff_login;
				$_SESSION['staff_id'] = $row['id'];
				$_SESSION['filialc'] =  $row['branch_id'];

				 header("location:index.php");
			}


			else{
				echo "<style>
    body  		{
    background-image:  url('images/404.jpg');
    background-repeat: no-repeat;
    background-size: 100% 100%;
				}

</style>";
				
					echo "<body><br><h1><center><a type='submit' href='login.php'>HOME </a></center></h1><br></body>
					";
				// Failed...
			}
	
		

		}
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="css/changepass.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<!-- php -->
<?php
include('connection.php');
?>


<?php
session_start();

if (isset($_SESSION['loged_email'])) {
    $val2=$_SESSION['loged_email'];

}

else {
	header("location:signuplogin.php");
}

?>

<!-- update -->
<?php
if (isset($_POST['resetpassword'])) {

	$oldpass = mysqli_real_escape_string($con, $_POST['oldpassword']);
	$newpass = mysqli_real_escape_string($con, $_POST['newpassword']);
	$renewpass = mysqli_real_escape_string($con, $_POST['repassword']);

	$query = $con->prepare("SELECT Password FROM login_table WHERE Email = ?");
	$query->bind_param("s", $val2);
	$query->execute();
	$result = $query->get_result();

	if ($result->num_rows != 0) {
		$row = $result->fetch_assoc();
		$columnValue = $row['Password'];

		if($oldpass == $columnValue){
		if ($newpass == $renewpass) {

			$query = $con->prepare("UPDATE login_table set Password = ? where Email = ?");
			$query->bind_param("ss",$newpass,$val2 );
			$query->execute();
			header("location: changepass.php?success=Password Reset!");
			header("location: signuplogin.php");
		} else {
			header("location: changepass.php?error=**Password Does Not Matched");
		}
	}
	else{
		header("location: changepass.php?error=No results found.");
	}
	} else  
	{
		header("location: changepass.php?error=No results found.");
	}
	}
?>

<!-- back -->
<?php
	if(isset($_POST['back'])){
	header("location: index.php");
	}
?>

<body>
	<div class="main">
		<div class="signup" >
			<form action="changepass.php" method="post">
				<label for="chk" >Reset Password</label>
				<?php 
				if(isset($_GET['error'])){ ?>
					<p class="error"><?php echo $_GET['error']; ?> </p>
				<?php }
				?> 
				
				<?php 
				if(isset($_GET['success'])){ ?>
					<p class="success"><?php echo $_GET['success']; ?> </p>
				<?php }
				?> 
				<input type="text" name="oldpassword"  placeholder="Enter Old Password" required="">
				<input type="text" name="newpassword" placeholder="Enter New Password" required>
				<input type="text" name="repassword" placeholder="Enter Re Password"  required="">
                <button id="reset" name="resetpassword">Change Password</button>
				
			</form>
			<a href="profile.php"><button>Back</button></a>
		</div>
	</div>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="css/forget.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<!-- php -->
<?php
include('connection.php');
?>

<!-- CHANGE PASSWORD PHP -->
<?php
if (isset($_POST['Reset'])) {
	$user_email = mysqli_real_escape_string($con, $_POST['email']);

	$user_pass = mysqli_real_escape_string($con, $_POST['newpassword']);

	$confirmuser_pass = mysqli_real_escape_string($con, $_POST['repassword']);


	$query = $con->prepare("SELECT * FROM login_table WHERE Email = ?");
	$query->bind_param("s", $user_email);
	$query->execute();
	$result = $query->get_result();

	if ($result->num_rows != 0) {

		if ($user_pass == $confirmuser_pass) {

			$query = $con->prepare("UPDATE login_table set Password = ? where Email = ?");
			$query->bind_param("ss", $user_pass, $user_email);
			$query->execute();
			$query->close();
			header("location: forget.php?success=Password Reset");
		} else {
			header("location: forget.php?error=Password not matched!");
		}
	} else {
		header("location:forget.php?error=No User Found");
	}
}

?>



<body>
	<div class="main">
		<div class="signup">
			<form action="forget.php" method="post">
				<label for="chk">Reset Password</label>
				<?php
				if (isset($_GET['error'])) { ?>
					<p class="error">
						<?php echo $_GET['error']; ?>
					</p>
				<?php }
				?>

				<?php
				if (isset($_GET['success'])) { ?>
					<p class="success">
						<?php echo $_GET['success']; ?>
					</p>
				<?php }
				?>
				<input type="email" name="email" placeholder="Enter Email Password" required="">
				<input type="password" name="newpassword" placeholder="Enter New Password" required>
				<input type="password" name="repassword" placeholder="Enter Re Password" required="">
				<button id="reset" name="Reset">Reset Password</button>

			</form>
			<a href="signuplogin.php"><button>Login Page</button></a>
		</div>
	</div>
</body>

</html>
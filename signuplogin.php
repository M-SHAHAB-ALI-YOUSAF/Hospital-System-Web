<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<!-- php -->
<?php
include('connection.php');
?>

<!-- sign up -->
<?php
if (isset($_POST['signup'])) {

	$username = mysqli_real_escape_string($con, $_POST['usertxt']);
	$user_email = mysqli_real_escape_string($con, $_POST['email']);

	$user_pass = mysqli_real_escape_string($con, $_POST['pswd']);

	$confirmuser_pass = mysqli_real_escape_string($con, $_POST['cpswd']);


	$query = $con->prepare("SELECT * FROM login_table WHERE Email = ?");
	$query->bind_param("s", $user_email);
	$query->execute();
	$result = $query->get_result();

	if ($result->num_rows === 0) {
		//now check if passwords are matching or not ?
		if ($user_pass == $confirmuser_pass) {

			//now store this data into database
			$query = $con->prepare("INSERT INTO  login_table(Username,Email,Password)values(?,?,?) ");
			$query->bind_param("sss", $username, $user_email, $user_pass);
			$query->execute();
			$query->close();
			header("location: signuplogin.php?success=Account Created");
		} else {
			header("location: signuplogin.php?error=**Passwords do not match !");
		}
	} else // username is not available 
	{
		header("location: signuplogin.php?error=Already Registered");
	}
}
?>


<!-- login -->
<?php
if (isset($_POST['loginbtn'])) {
  $user_email = mysqli_real_escape_string($con, $_POST['email']);
  $user_pass = mysqli_real_escape_string($con, $_POST['pswd']);


  $query = $con->prepare("SELECT * FROM login_table WHERE Email = ? and Password = ?");
  $query->bind_param("ss", $user_email, $user_pass);
  $query->execute();
  $result = $query->get_result();

  if ($result->num_rows === 0)
  header("location: signuplogin.php?errors=Wrong Credentials");
  while ($row = $result->fetch_assoc()) {
    $ids = $row['id'];
    $useremail = $row['Email'];
    $password_db = $row['Password'];
    $query->close();

    // start a session for this current logged in user.
    session_start();
    // starts a session with name loged_user with value from $uname_db
    $_SESSION['loged_email'] = $useremail;
    echo $_SESSION['loged_email'];
    echo '<script language="javascript">';
    echo 'alert("Successfully logged in ' . $_SESSION['loged_user'] . '")';
    echo '</script>';
    header("location: index.php");
  }

}
?>




<body>

	<li> <a href="adminlogin.php">ADMIN</a>
	</li>

	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">
		<div class="signup">
			<form action="signuplogin.php" method="post">
				<label for="chk" aria-hidden="true">Sign up</label>
				<?php
				if (isset($_GET['success'])) { ?>
					<p class="success">
						<?php echo $_GET['success']; ?>
					</p>
				<?php }
				?>

				<?php
				if (isset($_GET['error'])) { ?>
					<p class="error">
						<?php echo $_GET['error']; ?>
					</p>
				<?php }
				?>

				<input type="text" name="usertxt" placeholder="User name" required="">
				<input type="email" name="email" placeholder="Email" required="">
				<input type="password" name="pswd" placeholder="Password" required="">
				<input type="password" name="cpswd" placeholder="Confirm Password" required="">
				<button name="signup">Sign up</button>
			</form>
		</div>

		<div class="login">
			<form action="signuplogin.php" method="post">
				<label for="chk" id="loginpart" aria-hidden="true">Login</label>
				<?php
				if (isset($_GET['errors'])) { ?>
					<p class="error">
						<?php echo $_GET['errors']; ?>
					</p>
				<?php }
				?>
				<input type="email" name="email" placeholder="Email" required="">
				<input type="password" name="pswd" placeholder="Password" required="">
				<a href="forget.php">Forget Password?</a>
				<button name="loginbtn">Login</button>
			</form>
		</div>
	</div>
</body>

</html>
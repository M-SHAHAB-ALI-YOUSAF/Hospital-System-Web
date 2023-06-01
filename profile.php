<!DOCTYPE html>
<html>

<head>
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
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
if (isset($_POST['edit'])) {

	$username = mysqli_real_escape_string($con, $_POST['usertxt']);
	$user_email = mysqli_real_escape_string($con, $_POST['email']);
	$user_pass = mysqli_real_escape_string($con, $_POST['pswd']);


	$query = $con->prepare("UPDATE login_table set Username = ?, Password = ? WHERE Email = ?");
	$query->bind_param("sss",$username, $user_pass,$user_email);
	$query->execute();
	header("location: profile.php?success=User Named Changed");;
	}
?>

<!-- changepass -->
<?php
if (isset($_POST['resetpassword'])) {

	header("location: changepass.php");;
	}
?>

<!-- search -->
<?php

  $query = $con->prepare("SELECT * FROM login_table WHERE Email = ?");
  $query->bind_param("s", $val2);
  $query->execute();
  $result = $query->get_result();

  if ($result->num_rows > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      // Access the data using column names
      $getname = $row['Username'];
      $getEmail = $row['Email'];
      $getpass = $row['Password'];
    }
  } else {
    header("location: profile.php?error=No results found.");
  }

?>

<!-- delete -->
<?php
	if(isset($_POST['delete'])){
	$query = $con->prepare("DELETE FROM login_table WHERE Email = ?");
	$query->bind_param("s", $val2);
	$query->execute();
	header("location: signuplogin.php");
	}
?>

<!-- bacl -->
<?php
	if(isset($_POST['back'])){
	header("location: index.php");
	}
?>

<body>
	<div class="main">
		<div class="signup" >
			<form action="profile.php" method="post">
				<label for="chk" aria-hidden="true">Profile</label>
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
				<input type="text" name="usertxt" value="<?php echo isset($getname) ? $getname : ''; ?>" placeholder="User name" required="">
				<input type="email" name="email" placeholder="Email" value="<?php echo isset($getEmail) ? $getEmail : ''; ?>" readonly>
				<input type="password" name="pswd" placeholder="Password" readonly value="<?php echo isset($getpass) ? $getpass : ''; ?>" required="">
				
				<button name="edit">Edit</button>
                <button id="reset" name="resetpassword">Change Password</button>
				<button  name="delete" >Delete Account</button>
				<button  name="back" >Back</button>
			</form>
		</div>
	</div>
</body>

</html>
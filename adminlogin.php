<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="css/admin_login.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<!-- php -->
<?php
include('connection.php');
?>

<?php
// Stored name and password
$storedName = "admin";
$storedPassword = "numl";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $enteredName = $_POST["username"];
    $enteredPassword = $_POST["password"];

    // Check if name and password match
    if ($enteredName == $storedName && $enteredPassword == $storedPassword) {
        session_start();
        $_SESSION['admin'] = $enteredName;
        header("Location: adminhome.php");
        exit;
    } else {
        header("location: adminlogin.php?error=Invalid name or password");
    }
}


if (isset($_GET['clicked'])) {
    header("location: adminlogin.php?error=Please Contact Admin");
}
?>

<body>
    <li> <a href="signuplogin.php">USER</a>
    </li>

    <div class="main">
        <div class="signup">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <label for="chk">Admin Login</label>
                <?php
                if (isset($_GET['error'])) { ?>
                    <p class="error">
                        <?php echo $_GET['error']; ?>
                    </p>
                <?php }
                ?>

                <input type="text" name="username" placeholder="Enter Username" required>
                <input type="password" name="password" placeholder="Enter Password" required="">
                <a href="?clicked=1">Forget Password?</a>
                <button id="reset" name="login">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
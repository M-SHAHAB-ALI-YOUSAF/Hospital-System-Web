<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    
    <title>Admin-Home</title>
    <?php
    include('connection.php');
    ?>

    <?php
    session_start();

    if (isset($_SESSION['admin'])) {
        $val2 = $_SESSION['admin'];

    } else {
        header("location:signuplogin.php");
    }


    
if (isset($_GET['logout'])) {
	session_destroy();
	header("location:adminlogin.php");
}

    ?>
    <style>
        ul {
            list-style-type: none;
            display: flex;
        }

        li {
            padding-right: 50px;
        }

        li a {
            text-decoration: none;
            background-color: black;
            color: white;
            border-radius: 20px;
            padding: 10px;
        }

        #move {
            margin-left: 400px;
        }

        li a:hover {
            background-color: blue;
            color: white;
            border-radius: 20px;
            box-shadow: 5px 5px black;
        }
    </style>
</head>

<body>
    <ul>
        <li id="move"><a href="adminalldata.php">Appointment Record</a></li>
        <li><a href="adminalluser.php">User Record</a></li>
    </ul>

    <div style="position:absolute;top:5px;right:20px;padding:10px; padding-right : 10px; border:red ; ">
        <form id="logout" method="get">
            <button type="submit" name="logout"><i style="padding-right : 5px;" class="fa-solid fa-right-from-bracket"></i>Log Out</button>
        </form>
    </div>
    <hr>
</body>

</html>
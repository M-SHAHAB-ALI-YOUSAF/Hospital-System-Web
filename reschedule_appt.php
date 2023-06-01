<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment-Change</title>
    <style>
        body {
            display: flex;
            justify-content: center;

        }

        #main {
            height: 450px;
            width: 600px;
            margin-top: 120px;
            background: linear-gradient(to bottom, #195031, #29918b, #175a46);
            box-shadow: 5px 20px 50px #000;
        }

        h1 {
            text-align: center;
            color: white;
            font-weight: bold;
        }

        select {
            margin-left: 50px;
            border: none;
            background-color: #ddd;
            width: 230px;
            height: 50px;
            padding: 10px;
            border-radius: 20px;
        }

        input {
            margin-left: 50px;
            border: none;
            background-color: #ddd;
            width: 210px;
            height: 35px;
            margin-top: 20px;
            padding: 10px;
            border-radius: 20px;
        }

        #appointmentbtn {
            margin: 10px;
            width: 500px;
            margin-left: 60px;
            height: 50px;
            background-color: rgb(17, 13, 59);
            border-radius: 40px;
            color: white;
        }

        #appointmentbtn:hover {
            box-shadow: 5px 3px white;
            background-color: black;
        }
    </style>
</head>

<!-- php -->
<?php
include('connection.php');
?>

<?php
session_start();

if (isset($_SESSION['loged_email'])) {
    $val2 = $_SESSION['loged_email'];

}
//else if(!isset($_SESSION['loged_user'] ))
else {
    header("location:signuplogin.php");
}

?>

<!-- search -->
<?php

$id = $_GET['editid'];
$query = $con->prepare("SELECT * FROM appointment WHERE appt_id = ?");
$query->bind_param("s", $id);
$query->execute();
$result = $query->get_result();

while ($row = mysqli_fetch_assoc($result)) {
    // Access the data using column names
    $department = $row['department'];
    $doctor = $row['doctor'];
    $name = $row['userName'];
    $email = $row['Useremail'];
    $date = $row['Date'];
    $contact = $row['Time'];
}
?>

<!-- update -->
<?php
if (isset($_GET['Update_appt'])) {
    $depart = $_GET['dept'];
    $doc = $_GET['dct'];
    $name = $_GET['nameuser'];
    $email = $_GET['useremail'];
    $date = $_GET['date'];
    $time = $_GET['time'];
    $query = "UPDATE appointment set department = '$depart', doctor = '$doc', userName = '$name', Useremail = '$email', Date = '$date' , Time = '$time' where appt_id = '$id'";
    $data = mysqli_query($con, $query);
    if ($data) {
        header("location:appointment.php");
    }
}
?>

<body>
    <div id="main">
        <h1>Reschedule Appointment</h1>
        <form action="reschedule_appt.php" method="get">
            <input type="hidden" name="editid" value="<?php echo $id ?>">
            <select name="dept" id="" required>
                <option value="Dental Department" <?php if ($department == "Dental Department")
                    echo 'selected="selected"'; ?>>Dental Department</option>

                <option value="Cardiology Department" <?php if ($department == "Cardiology Department")
                    echo 'selected="selected"'; ?>>Cardiology Department</option>

                <option value="Neurology Department" <?php if ($department == "Neurology Department")
                    echo 'selected="selected"'; ?>>Neurology Department</option>


                <option value="Dermatology Department" <?php if ($department == "Dermatology Department")
                    echo 'selected="selected"'; ?>>Dermatology Department</option>


                <option value="General Surgery" <?php if ($department == "General Surgery")
                    echo 'selected="selected"'; ?>>General Surgery</option>
            </select>


            <select name="dct" id="" required>
                <option value="Dr. Iqra" <?php if ($doctor == "Dr. Iqra")
                    echo 'selected="selected"'; ?>>Dr. Iqra
                </option>

                <option value="Dr. Yashfa" <?php if ($doctor == "Dr. Yashfa")
                    echo 'selected="selected"'; ?>>Dr. Yashfa
                </option>

                <option value="Dr. Shahab" <?php if ($doctor == "Dr. Shahab")
                    echo 'selected="selected"'; ?>>Dr. Shahab
                </option>

                <option value="Dr. Asim" <?php if ($doctor == "Dr. Asim")
                    echo 'selected="selected"'; ?>>Dr. Asim</option>

            </select>



            <input type="text" name="nameuser" required placeholder="Name"
                value="<?php echo isset($name) ? $name : ''; ?>">


            <input type="email" name="useremail" required placeholder="Enter Email"
                value="<?php echo isset($email) ? $email : ''; ?>">


            <input type="date" name="date" placeholder="Select Date" required
                value="<?php echo isset($date) ? $date : ''; ?>">


            <input type="number" name="time" placeholder="Enter Contact No" required
                value="<?php echo isset($contact) ? $contact : ''; ?>">


            <button id="appointmentbtn" name="Update_appt">Update Appointment</button>
            <button id="appointmentbtn" name="Back">Back</button>
        </form>

    </div>
</body>

</html>
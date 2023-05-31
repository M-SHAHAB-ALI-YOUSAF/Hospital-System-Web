<?php


include('connection.php');

$ids = $_GET['id'];
$query = $con->prepare("DELETE FROM appointment WHERE appt_id = ?");
	$query->bind_param("s", $ids);
    $query->execute();
	header("location: appointment.php");
?>
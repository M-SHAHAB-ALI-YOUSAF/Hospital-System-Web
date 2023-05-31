<?php
include_once('connection.php');
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



<?php

$query = $con->prepare("SELECT * from appointment where Emailadded = ?");
$query->bind_param("s", $val2);
$query->execute();
$result = $query->get_result();
?>
<!DOCTYPE html>
<html>

<head>
	<title> Appointment Data </title>
	<link rel="stylesheet" href="css/appointment.css">
	<style>
		#btn:hover {
			background-color: black;
			color: white;
		}
	</style>
</head>

<body>
	<table>
		<tr>
			<th colspan="8">
				<h2>Appointment Record</h2>
			</th>
		</tr>
		<th> ID </th>
		<th> DEPARTMENT </th>
		<th> DOCTOR </th>
		<th> NAME </th>
		<th> EMAIL </th>
		<th> DATE </th>
		<th> DAY </th>
		<th>DELETE</th>

		</tr>

		<?php
			while ($rows = $result->fetch_assoc()) {
				?>
				<tr>
					<td>
						<?php echo $rows['appt_id']; ?>
					</td>
					<td>
						<?php echo $rows['department']; ?>
					</td>
					<td>
						<?php echo $rows['doctor']; ?>
					</td>
					<td>
						<?php echo $rows['userName']; ?>
					</td>
					<td>
						<?php echo $rows['Useremail']; ?>
					</td>
					<td>
						<?php echo $rows['Date']; ?>
					</td>
					<td>
						<?php echo $rows['Time']; ?>
					</td>
					<td><a href="delete.php?id=<?php echo $rows['appt_id']; ?>" name="del" id='btn'>Delete</a></td>

				</tr>
			<?php }

		?>

	</table>
	<?php
	if (isset($_GET['error'])) { ?>
		<p>
			<?php echo $_GET['error']; ?>
		</p>
	<?php }
	?>
</body>

</html>
<?php
include('connection.php');
include('adminhome.php');

?>



<?php

$query = $con->prepare("SELECT * from appointment ");
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
		<th> CONTACT </th>
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
                    <td>
						<?php echo $rows['Emailadded']; ?>
					</td>
					

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
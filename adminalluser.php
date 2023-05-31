<?php
include('connection.php');
include('adminhome.php');
?>

<?php

$query = $con->prepare("SELECT * from login_table ");
$query->execute();
$result = $query->get_result();
?>
<!DOCTYPE html>
<html>

<head>
	<title> User Data </title>
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
				<h2>User Record</h2>
			</th>
		</tr>
		<th> ID </th>
		<th> USERNAME </th>
		<th> EMAIL </th>
		
		</tr>

		<?php
			while ($rows = $result->fetch_assoc()) {
				?>
				<tr>
					<td>
						<?php echo $rows['id']; ?>
					</td>
					<td>
						<?php echo $rows['Username']; ?>
					</td>
					<td>
						<?php echo $rows['Email']; ?>
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
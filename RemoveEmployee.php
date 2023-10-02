<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Remove An Employee</title>
		<link rel="stylesheet" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");

		//Create query
		$sqlEmp="SELECT empID, lastName, firstName, salaryPerHour, specialty, street, city, state, phone FROM employee;" ;
		//Execute query
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Employees </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> ID </th>
					<th> Last Name </th>
					<th> First Name </th>
					<th> Salary </th>
					<th> Specialty </th>
					<th> Street </th>
					<th> City </th>
					<th> State </th>
					<th> Phone Number </th>
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["empID"]."</td>
					<td>".$row["lastName"]."</td>
					<td>".$row["firstName"]."</td>
					<td>".$row["salaryPerHour"]."</td>
					<td>".$row["specialty"]."</td>
					<td>".$row["street"]."</td>
					<td>".$row["city"]."</td>
					<td>".$row["state"]."</td>
					<td>".$row["phone"]."</td>
				</tr>";
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		$conn->close();
		?>
	
		<form action="RemoveEmployee2.php" method="POST">
			<h4>Enter the ID of the employee being removed:<br><br>
			ID: <input type="text" name="empID"><br><br>
			<input type="submit">
			<input type="reset">
		</form>
		
	</body>
</html>
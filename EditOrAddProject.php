<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Project</title>
		<link rel="stylesheet" type="text/css" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");

		//Create query
		$sqlProj="SELECT projID, startDate, custID, estEndDate, estCost, street, city, state, description, finalPrice, actualEndDate FROM project;" ;
		//Execute query
		$result = $conn->query($sqlProj) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Projects </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> Project ID </th>
					<th> Start Date </th>
					<th> Customer ID </th>
					<th> Estimated End Date </th>
					<th> Estimated Cost </th>
					<th> Street </th>
					<th> City </th>
					<th> State </th>
					<th> Description </th>
					<th> Final Price </th>
					<th> End Date </th>
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["projID"]. "</td>
					<td>".$row["startDate"]. "</td>
					<td>".$row["custID"]. "</td>
					<td>".$row["estEndDate"]. "</td>
					<td>".$row["estCost"]. "</td>
					<td>".$row["street"]. "</td>
					<td>".$row["city"]. "</td>
					<td>".$row["state"]. "</td>
					<td>".$row["description"]. "</td>
					<td>". $row["finalPrice"]. "</td>
					<td>" . $row["actualEndDate"]."</td>
				</tr>";
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		$conn->close();
		?>
	
		<form action="SelectProjectToEdit.php" method="POST">
			<br>If you would like to edit a project's info, please enter it's Project ID:
			<input type='text' name='projID'>
			<input type='submit' value='EDIT'> <input type='reset'>
		</form>
		<br>
		<form action="InsertNewProject.php" method="POST">
			If you would like to add a project: 
			<input type='submit' value='ADD'>
		</form>


	</body>
</html>

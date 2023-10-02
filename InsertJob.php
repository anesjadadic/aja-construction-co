<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Insert New Job</title>
		<link rel="stylesheet" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");

		//Create query
		$sqlEmp="SELECT jobID, jobType, description FROM job;" ;
		//Execute query
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Jobs </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> Job ID </th>
					<th> Job Type </th>
					<th> Description </th>
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["jobID"]."</td>
					<td>".$row["jobType"]."</td>
					<td>".$row["description"]."</td>
				</tr>";
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		$conn->close();
		?>
	
		<form action="InsertJob2.php" method="POST">
			<h4>Add a job:<br><br>
			Job ID: <input type="text" name="jobID"><br>
			Job Type: <input type="text" name="jobType"><br>
			Description: <input type="text" name="description"><br><br>
			<input type="submit">
			<input type="reset">
		</form>
	
	</body>
</html>
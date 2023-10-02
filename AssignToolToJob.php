<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Assign Tool To Job</title>
		<link rel="stylesheet" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");
		
		// Tools Table
		$sqlTool="SELECT modelNumber, toolName, brand FROM Tool;" ;
		$result = $conn->query($sqlTool) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			echo "<h1> Tools </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> Model Name </th>
					<th> Tool Name </th>
					<th> Brand </th>
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["modelNumber"]."</td>
					<td>".$row["toolName"]."</td>
					<td>".$row["brand"]."</td>
				</tr>";
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		// Jobs Table
		$sqlJob="SELECT jobID, jobType, description FROM Job;" ;
		$result = $conn->query($sqlJob) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
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

		// ToolsToJob Table
		$sqlToolToJob="SELECT jobID, modelNumber FROM ToolToJob;";
				 
		$result = $conn->query($sqlToolToJob) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			echo "<h1> Tools to Jobs </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> jobID </th>
					<th> modelNumber </th>
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["jobID"]."</td>
					<td>".$row["modelNumber"]."</td>
				</tr>";
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		$conn->close();
		?>
	
		<form action="AssignToolToJob2.php" method="POST">
			<h4>Assign an tool to a job:<br><br>
			Model Number: <input type="text" name="modelNumber"><br>
			Job ID: <input type="text" name="jobID"><br>
			<br>
			<input type="submit">
			<input type="reset">
		</form>
	
	</body>
</html>
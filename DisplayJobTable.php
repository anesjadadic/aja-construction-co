<!DOCTYPE html>
<html lang="en">
	<head>
		<title>DisplayJobTable</title>
		<link rel="stylesheet" type="text/css" href="321AStyle.css">
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
			echo "<h1>  Jobs </h1>";
			echo "<table border='1'>";
			echo "<tr>
					<th> JobID </th>
					<th> Job Name </th>
					<th> Job Description </th>
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>".
							"<td>". $row["jobID"]. "</td>".
							"<td>". $row["jobType"]. "</td>".
							"<td>". $row["description"]. "</td>".
				     "</tr>";
			}
			echo "</table>";
		} else {
				echo "0 results";
		}
		$conn->close();

		?>
		
		<br><a href="InsertJob.php"> Add A Job </a><br><br>
		
	</body>
</html>

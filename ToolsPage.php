<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Tools</title>
	<link rel="stylesheet" type="text/css" href="321AStyle.css">
	</head>
	<body>
	<h1> Tools </h1>
	
		<?php

		include ("ConnectCompanyDB.php");

		//Create query
		$sqlEmp="SELECT modelNumber, toolName, brand FROM tool;" ;
		//Execute query
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo " <table border='1'> ";
			echo "<tr>
					<th> Model Number </th>
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
		
		$conn->close();
		?>
	
	<br><a href="RemoveTool.php"> Remove A Tool </a><br><br>
	<a href="InsertNewTool.php"> Add A Tool </a><br><br>
	<a href="AssignToolToJob.php"> Assign A Tool To A Job </a><br><br>
	
	</body>
</html>
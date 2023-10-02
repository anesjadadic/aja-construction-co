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
		$sqlTool="SELECT modelNumber, toolName, brand FROM Tool;" ;
		//Execute query
		$result = $conn->query($sqlTool) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Tools </h1>";
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
	
		<form action="RemoveTool2.php" method="POST">
			<h4>Enter the model number of the tool being removed: (reasons to be removed: tool broken, lost, stolen, or out of service) <br><br>
			Model Number: <input type="text" name="modelNumber"><br><br>
			<input type="submit">
			<input type="reset">
		</form>
		
	</body>
</html>
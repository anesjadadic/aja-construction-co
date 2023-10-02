<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Identity</title>
		<link rel="stylesheet" type="text/css" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php
		// connect to database 
		include ("ConnectCompanyDB.php");

		//Create query
		$sqlEmp="SELECT modelNumber, toolName, brand FROM tool;" ;
		//Execute query
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Tools </h1>";
			echo "<table border='1'> ";
			echo "<tr>
					<th> Model Number </th>
					<th> Tool Name </th>
					<th> Brand </th>
				 </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>".
							"<td>".$row["modelNumber"]."</td>".
							"<td>". $row["toolName"]. "</td>".
							"<td>". $row["brand"]. "</td>".
				     "</tr>";
			}
			echo "</table>";
		} else {
				echo "0 results";
		}
		$conn->close();

		?>

		<form action="InsertTool.php" >
			<br>Enter New Tool Information: 
			<br><br>Model Number: <input type='text' name='modelNumber'> <br>
			Tool Name:<input type='text' name='toolName'> <br>
			Brand <input type='text' name='brand'> <br><br>
			<input type='submit'> <input type='reset'>
		</form>


	</body>
</html>

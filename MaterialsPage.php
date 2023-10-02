<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Materials</title>
	<link rel="stylesheet" type="text/css" href="321AStyle.css">
	</head>
	<body>
	<h1> Materials </h1>
		<?php

		include ("ConnectCompanyDB.php");

		$sqlEmp = "SELECT matName, prodID, supName, matType, price FROM material;";
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo " <table border='1'> ";
			echo "<tr>
					<th> Name </th>
					<th> Product ID </th>
					<th> Supplier </th>
					<th> Material Type </th>
					<th> Price ($) </th>
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["matName"]."</td>
					<td>".$row["prodID"]."</td>
					<td>".$row["supName"]."</td>
					<td>".$row["matType"]."</td>
					<td>".$row["price"]."</td>
				</tr>";
			}
			echo " </table> ";
		} else {
			echo "0 results";
		}
		
		$conn->close();
		?>
		
		<br><a href="InsertMaterial.php"> Add Material To Inventory </a><br><br>
		<a href="SearchMaterials.php"> Search Materials By Type </a><br><br>
		
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Insert New Material</title>
		<link rel="stylesheet" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");

		//Create query
		$sqlEmp="SELECT matName, prodID, supName, matType, price FROM material;" ;
		//Execute query
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Materials </h1>";
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
	
		<form action="InsertMaterial2.php" method="POST">
			<h4>Add Material:<br><br>
			Material Name: <input type="text" name="matName"><br>
			Product ID: <input type="text" name="prodID"><br>
			Supplier Name: <input type="text" name="supName"><br>
			Material Type: <input type="text" name="matType"><br>
			Price ($): <input type="text" name="price"><br><br>
			<input type="submit">
			<input type="reset">
		</form>
	
	</body>
</html>
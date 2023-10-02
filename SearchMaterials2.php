<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Search For Materials</title>
		<link rel="stylesheet" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");
		
		$matType=$_POST["matType"];
		
		$sqlEmp = "SELECT matName, prodID, supName, price FROM material WHERE matType='$matType';";
		
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Materials: ".$matType."</h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> Material Name </th>
					<th> Product ID </th>
					<th> Supplier </th>
					<th> Price($) </th>
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["matName"]."</td>
					<td>".$row["prodID"]."</td>
					<td>".$row["supName"]."</td>
					<td>".$row["price"]."</td>
				</tr>";
			}
			echo " </table> ";
		} else {
			echo "0 results";
		}
		
		exit();
		$conn->close();
		
		?>
		
	</body>
</html>
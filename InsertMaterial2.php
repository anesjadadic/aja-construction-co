<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Insert Material</title>
		<link rel="stylesheet" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");
		
		$matName=$_POST["matName"];
		$prodID=$_POST["prodID"];
		$supName=$_POST["supName"];
		$matType=$_POST["matType"];
		$price=$_POST["price"];
		
		$sql = "INSERT INTO Material VALUES('$matName', '$prodID', '$supName', '$matType', '$price');";

		if ($conn->query($sql) == TRUE) {
			echo "Record updated";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		header("Location:InsertMaterial.php");
		exit();
		
		$conn->close();
		?>
	</body>
</html>
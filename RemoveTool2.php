<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Remove Tool </title>
		<link rel="stylesheet" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");
		
		$modelNumber=$_POST["modelNumber"];
		
		$sql = "DELETE FROM Tool WHERE modelNumber = '$modelNumber';";

		if ($conn->query($sql) == TRUE) {
			echo "Record updated";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		header("Location:RemoveTool.php");
		exit();
		
		$conn->close();
		?>
		
	</body>
</html>
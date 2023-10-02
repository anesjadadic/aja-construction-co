<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Identity</title>
		<link rel="stylesheet" type="text/css" href="myCss.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");
		// retrieve user input
		$modelNumber=$_GET["modelNumber"];
		$toolName=$_GET["toolName"];
		$brand=$_GET["brand"];
		
		$sql = "INSERT INTO tool (modelNumber, toolName, brand) 
		VALUES('$modelNumber','$toolName','$brand');";

		// go back to page insert new tool page showing new employee was inserted
		if ($conn->query($sql) == TRUE) {
		    echo "New record created successfully";
			header("Location:InsertNewTool.php");
			exit();
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

		?>
	</body>
</html>

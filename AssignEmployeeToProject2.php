<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Assign Employee To Project</title>
		<link rel="stylesheet" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");
		
		$empID=$_POST["empID"];
		$projID=$_POST["projID"];
		$hours=$_POST["hours"];
		
		$sql = "INSERT INTO employeetoproject VALUES('$empID','$projID','$hours');";

		if ($conn->query($sql) == TRUE) {
			echo "Record updated";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		header("Location:AssignEmployeeToProject.php");
		exit();
		
		$conn->close();
		?>
	</body>
</html>
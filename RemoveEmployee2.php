<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Remove Employee</title>
		<link rel="stylesheet" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");
		
		$empID=$_POST["empID"];
		
		$sql = "DELETE FROM Employee WHERE empID='$empID';";

		if ($conn->query($sql) == TRUE) {
			echo "Record updated";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		header("Location:RemoveEmployee.php");
		exit();
		
		$conn->close();
		?>
		
	</body>
</html>
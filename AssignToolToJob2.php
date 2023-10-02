<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Assign Tool To Job</title>
		<link rel="stylesheet" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");
		
		$modelNumber=$_POST["modelNumber"];
		$jobID=$_POST["jobID"];
		
		$sql = "INSERT INTO ToolToJob VALUES ('$jobID', '$modelNumber');";

		if ($conn->query($sql) == TRUE) {
			echo "Record updated";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		header("Location:AssignToolToJob.php");
		exit();
		
		$conn->close();
		?>
	</body>
</html>
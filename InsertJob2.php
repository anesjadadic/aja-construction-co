<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Insert Job</title>
		<link rel="stylesheet" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");
		
		$jobID=$_POST["jobID"];
		$jobType=$_POST["jobType"];
		$description=$_POST["description"];
		
		$sql = "INSERT INTO Job VALUES('$jobID', '$jobType', '$description');";

		if ($conn->query($sql) == TRUE) {
			echo "Record updated";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		header("Location:InsertJob.php");
		exit();
		
		$conn->close();
		?>
	</body>
</html>
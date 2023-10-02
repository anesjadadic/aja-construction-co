<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Insert Employee</title>
		<link rel="stylesheet" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");
		
		$empID=$_POST["id"];
		$lastName=$_POST["lname"];
		$firstName=$_POST["fname"];
		$salaryPerHour=$_POST["salary"];
		$specialty=$_POST["specialty"];
		$street=$_POST["street"];
		$city=$_POST["city"];
		$state=$_POST["state"];
		$phone=$_POST["phoneNum"];
		
		$sql = "INSERT INTO Employee VALUES('$empID','$lastName','$firstName','$salaryPerHour','$specialty','$street','$city','$state', '$phone');";

		if ($conn->query($sql) == TRUE) {
			echo "Record updated";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		header("Location:InsertEmployee.php");
		exit();
		
		$conn->close();
		?>
	</body>
</html>
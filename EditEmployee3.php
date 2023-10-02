<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit Employee</title>
		<link rel="stylesheet" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");
		
		$empID=$_GET["empID"];
		$lastName=$_GET["lastName"];
		$firstName=$_GET["firstName"];
		$salaryPerHour=$_GET["salaryPerHour"];
		$specialty=$_GET["specialty"];
		$street=$_GET["street"];
		$city=$_GET["city"];
		$state=$_GET["state"];
		$phone=$_GET["phone"];
		//Create query
		$sqlEmp="UPDATE employee SET firstName='$firstName', lastName='$lastName', salaryPerHour='$salaryPerHour', specialty='$specialty', 
				 street='$street', state='$state', phone='$phone'	
				 WHERE empID='$empID';";
		//Execute query
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);
		echo "Record updated";
		header("Location:EditEmployee.php");
		exit();
		$conn->close();

		?>
		
	</body>
</html>
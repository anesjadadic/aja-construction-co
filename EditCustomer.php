<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit Customer</title>
		<link rel="stylesheet" type="text/css" href="myCss.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");
		
		
		$custID=$_GET["custID"];
		$lastName=$_GET["lastName"];
		$firstName=$_GET["firstName"];
		$street=$_GET["street"];
		$city=$_GET["city"];
		$state=$_GET["state"];
		$phone=$_GET["phone"];
		//Create query
		$sqlProj="UPDATE Customer SET custID='$custID', lastName='$lastName', firstName='$firstName', street='$street', city='$city', state='$state', phone='$phone' WHERE custID= '$custID' ;" ;
		//Execute query
		$result = $conn->query($sqlProj) or die('Could not run query: '.$conn->error);
		echo "Record updated";
		header("Location:EditOrAddCustomer.php");
		exit();
		$conn->close();

		?>
	</body>
</html>
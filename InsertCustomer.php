<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Add Customer</title>
		<link rel="stylesheet" type="text/css" href="myCss.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");
		// retrieve user input
		$custID=$_GET["custID"];
		$lastName=$_GET["lastName"];
		$firstName=$_GET["firstName"];
		$street=$_GET["street"];
		$city=$_GET["city"];
		$state=$_GET["state"];
		$phone=$_GET["phone"];
		
		// insert new values into table
		$sql = "INSERT INTO customer (custID, lastName, firstName, street, city, state, phone) 
		VALUES('$custID','$lastName','$firstName', '$street', '$city', '$state', '$phone');";

		// go back to page insert new tool page showing new employee was inserted
		if ($conn->query($sql) == TRUE) {
		    echo "New record created successfully";
			header("Location:EditOrAddCustomer.php");
			exit();
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

		?>
	</body>
</html>

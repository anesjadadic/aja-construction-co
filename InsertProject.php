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
		$projID=$_GET["projID"];
		$startDate=$_GET["startDate"];
		$custID=$_GET["custID"];
		$estEndDate=$_GET["estEndDate"];
		$estCost=$_GET["estCost"];
		$street=$_GET["street"];
		$city=$_GET["city"];
		$state=$_GET["state"];
		$description=$_GET["description"];
		
		// insert new values into table
		$sql = "INSERT INTO project (projID, startDate, custID, estEndDate, estCost, street, city, state, description) 
		VALUES('$projID','$startDate','$custID', '$estEndDate', '$estCost', '$street', '$city', '$state', '$description');";

		// go back to page insert new tool page showing new project was inserted
		if ($conn->query($sql) == TRUE) {
		    echo "New record created successfully";
			header("Location:EditOrAddProject.php");
			exit();
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

		?>
	</body>
</html>
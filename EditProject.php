<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit Project</title>
		<link rel="stylesheet" type="text/css" href="myCss.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");
		
		
		$projID=$_GET["projID"];
		$startDate=$_GET["startDate"];
		$custID=$_GET["custID"];
		$estEndDate=$_GET["estEndDate"];
		$estCost=$_GET["estCost"];
		$street=$_GET["street"];
		$city=$_GET["city"];
		$state=$_GET["state"];
		$description=$_GET["description"];
		$finalPrice=$_GET["finalPrice"];
		$actualEndDate=$_GET["actualEndDate"];
		//Create query
		$sqlProj="UPDATE Project SET projID='$projID', startDate='$startDate', custID='$custID', estEndDate='$estEndDate', estCost='$estCost', street='$street', city='$city',state='$state', description='$description', finalPrice='$finalPrice',  actualEndDate='$actualEndDate' WHERE projID= '$projID' ;" ;
		//Execute query
		$result = $conn->query($sqlProj) or die('Could not run query: '.$conn->error);
		echo "Record updated";
		header("Location:EditOrAddProject.php");
		exit();
		$conn->close();

		?>
	</body>
</html>

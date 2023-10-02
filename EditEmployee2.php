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

		$empID=$_POST["id"];
		//Create query
		$sqlEmp="SELECT firstName, lastName, salaryPerHour, specialty, street, city, state, phone 
				 FROM employee 
				 WHERE empID='$empID';";
		//Execute query
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h3> Employee ID #".$empID."</h3>";
			while($row = $result->fetch_assoc()) {
				echo '<form action="EditEmployee3.php">';
				echo '<input type="hidden" name="empID" value="'.$empID.'"/><br>';
				echo 'Last Name: <input type="text" name="lastName" value="'.$row["lastName"].'"/> <br>';
				echo 'First Name: <input type="text" name="firstName" value="'.$row["firstName"].'"/> <br>'; 
				echo 'Salary: <input type="text" name="salaryPerHour" value="'.$row["salaryPerHour"].'"/> <br>'; 
				echo 'Specialty: <input type="text" name="specialty" value="'.$row["specialty"].'"/> <br>';
				echo 'Street: <input type="text" name="street" value="'.$row["street"].'"/> <br>'; 
				echo 'City: <input type="text" name="city" value="'.$row["city"].'"/> <br>'; 
				echo 'State: <input type="text" name="state" value="'.$row["state"].'"/> <br>';
				echo 'Phone Number: <input type="text" name="phone" value="'.$row["phone"].'"/> <br><br>'; 
				echo '<input type=submit>';
			    echo '</form>';
			}
		} else {
				echo "0 results";
		}
		$conn->close();

		?>
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Customer</title>
		<link rel="stylesheet" type="text/css" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php
		// connect to database 
		include ("ConnectCompanyDB.php");

		//Create query
		$sqlCust="SELECT custID, lastName, firstName, street, city, state, phone FROM customer;" ;
		//Execute query
		$result = $conn->query($sqlCust) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Customers </h1>";
			echo "<table border='1'> ";
			echo "<tr>
					<th> Customer ID </th>
					<th> Last Name </th>
					<th> First Name </th>
					<th> Street </th>
					<th> City </th>
					<th> State </th>
					<th> Phone </th>
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>".
							"<td>".$row["custID"]."</td>".
							"<td>". $row["lastName"]. "</td>".
							"<td>". $row["firstName"]. "</td>".
							"<td>". $row["street"]. "</td>".
							"<td>". $row["city"]. "</td>".
							"<td>". $row["state"]. "</td>".
							"<td>". $row["phone"]. "</td>".
				     "</tr>";
			}
			echo "</table>";
		} else {
				echo "0 results";
		}
		$conn->close();

		?>
	
		<form action="SelectCustomerToEdit.php" method="POST">
			<br>If you would like to edit a customer's info, please enter their Customer ID: 
			<input type='text' name='custID'>
			<input type='submit' value='EDIT'> <input type='reset'>
		</form>
		<br>
		<form action="InsertNewCustomer.php" method="POST">
			If you would like to Add a Customer: 
			<input type='submit' value='ADD'>
		</form>


	</body>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit Customer</title>
		<link rel="stylesheet" type="text/css" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");

		$custID=$_POST["custID"];
		//Create query
		$sqlProj="SELECT custID, lastName, firstName, street, city, state, phone FROM customer WHERE custID= '$custID' ;" ;
		//Execute query
		$result = $conn->query($sqlProj) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Edit Customer </h1>";
			while($row = $result->fetch_assoc()) {
				echo '<form action="EditCustomer.php">';
				echo '<input type="hidden" name=custID value="'.$custID.'" > <br>';
				echo 'Last Name <input type="text" name=lastName value="'.$row["lastName"]. '" > <br>';
				echo 'First Name <input type="text" name=firstName value="'.$row["firstName"]. '" > <br>';
				echo 'Street <input type="text" name=street value="'.$row["street"]. '" > <br>';
				echo 'City <input type="text" name=city value="'.$row["city"]. '" > <br>';
				echo 'State <input type="text" name=state value="'.$row["state"]. '" > <br>';
				echo 'Phone <input type="text" name=phone value="'.$row["phone"]. '" > <br><br>';
				echo '<input type="submit"> <input type="reset">';
			    echo '</form>';
			}
		} else {
				echo "0 results";
		}
		$conn->close();

		?>
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit Project</title>
		<link rel="stylesheet" type="text/css" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");

		$projID=$_POST["projID"];
		//Create query
		$sqlProj="SELECT projID, startDate, custID, estEndDate, estCost, street, city, state, description, finalPrice, actualEndDate FROM project WHERE projID= '$projID' ;" ;
		//Execute query
		$result = $conn->query($sqlProj) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Edit Project </h1>";
			while($row = $result->fetch_assoc()) {
				echo '<form action="EditProject.php">';
				echo '<input type="hidden" name=projID value="'.$projID.'" > <br>';
				echo 'Project Start Date <input type="text" name=startDate value="'.$row["startDate"]. '" > <br>';
				echo 'Customer ID <input type="text" name=custID value="'.$row["custID"]. '" > <br>';
				echo 'Estimated End Date <input type="text" name=estEndDate value="'.$row["estEndDate"]. '" > <br>';
				echo 'Estimated Cost <input type="text" name=estCost value="'.$row["estCost"]. '" > <br>';
				echo 'Street <input type="text" name=street value="'.$row["street"]. '" > <br>';
				echo 'City <input type="text" name=city value="'.$row["city"]. '" > <br>';
				echo 'State <input type="text" name=state value="'.$row["state"]. '" > <br>';
				echo 'Description <input type="text" name=description value="'.$row["description"].'" > <br>';
				echo 'Project Final Price <input type="text" name=finalPrice value="'.$row["finalPrice"]. '" > <br>'; 
				echo 'Project End Date <input type="text" name=actualEndDate value="'.$row["actualEndDate"]. '" > <br><br>'; 
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

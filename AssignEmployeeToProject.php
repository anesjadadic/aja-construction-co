<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Assign Employee To Project</title>
		<link rel="stylesheet" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectCompanyDB.php");
		
		// Employees Table
		$sqlEmp="SELECT empID, lastName, firstName, salaryPerHour, specialty, street, city, state, phone FROM employee;" ;
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			echo "<h1> All Employees </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> ID </th>
					<th> Last Name </th>
					<th> First Name </th>
					<th> Specialty </th>
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["empID"]."</td>
					<td>".$row["lastName"]."</td>
					<td>".$row["firstName"]."</td>
					<td>".$row["specialty"]."</td>
				</tr>";
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		// Projects Table
		$sqlEmp="SELECT projID, estEndDate, actualEndDate, description FROM project;" ;
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			echo "<h1> All Projects </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> ID </th>
					<th> Estimated End Date </th>
					<th> Actual End Date </th>
					<th> Description </th>
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["projID"]."</td>
					<td>".$row["estEndDate"]."</td>
					<td>".$row["actualEndDate"]."</td>
					<td>".$row["description"]."</td>
				</tr>";
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}

		// Employees On Projects Table
		$sqlEmp="SELECT employeetoproject.empID, employeetoproject.projID, lastName, firstName, specialty, description, hours 
				 FROM employeetoproject, employee, project
				 WHERE employee.empID = employeetoproject.empID AND project.projID = employeetoproject.projID;";
				 
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			echo "<h1> Employees On Projects </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> Employee ID </th>
					<th> Project ID </th>
					<th> First Name </th>
					<th> Last Name </th>
					<th> Project Description </th>
					<th> Employee Specialty </th>
					<th> Hours </th>
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["empID"]."</td>
					<td>".$row["projID"]."</td>
					<td>".$row["firstName"]."</td>
					<td>".$row["lastName"]."</td>
					<td>".$row["description"]."</td>
					<td>".$row["specialty"]."</td>
					<td>".$row["hours"]."</td>
				</tr>";
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		$conn->close();
		?>
	
		<form action="AssignEmployeeToProject2.php" method="POST">
			<h4>Assign an employee to a project:<br><br>
			Employee ID: <input type="text" name="empID"><br>
			Project ID: <input type="text" name="projID"><br>
			Hours: <input type="text" name="hours"><br><br>
			<input type="submit">
			<input type="reset">
		</form>
	
	</body>
</html>
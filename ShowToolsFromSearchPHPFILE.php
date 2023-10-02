<html>
<head>
<title>ShowToolsFromSearch</title>
<link rel="stylesheet" type="text/css" href="myFirstCss.css">

</head>
<body>


<?php
// retrieve from project
$jobName = $_GET["jobName"];
echo "Tools used in ". $jobName."</br>";

include ("ConnectCompanyDB.php");

//Execute query
$sqlTools="SELECT toolName FROM tooltojob, tool, job WHERE job.jobType = '$jobName' AND job.jobID = tooltojob.jobID AND tooltojob.modelNumber = tool.modelNumber;";
$result = $conn->query($sqlTools) or die('Could not run query: '.$conn->error);

echo " <table border='1'> ";
echo "<tr>
		<th> Tool Name </th>
	 </tr>";

while($row = $result->fetch_assoc()) {
 	echo '<tr>';
		echo '<td>'.$row["toolName"].'</td>';
	echo '</tr>';
}
echo '</table>';

//Close conection
$conn->close();


?>

</body>
</html>


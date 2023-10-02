<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Search For Materials</title>
		<link rel="stylesheet" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
	
		<h1> Materials </h1>
		<form action="SearchMaterials2.php" method="POST">
			<h4>Search for materials by type:<br><br>
			Material Type:
			<select name="matType">
			<option value="Framing">Framing</option>
			<option value="Nails">Nails</option>
			<option value="Roofing">Roofing</option>
			<option value="Screws">Screws</option>
			<option value="Drywall">Drywall</option>
			<option value="Gutter">Gutter</option>
			<option value="Paint">Paint</option>
			<option value="Tiling">Tiling</option>
			</select><br><br>
			
			<input type="submit">
			<input type="reset">

		</form>
	
	</body>
</html>
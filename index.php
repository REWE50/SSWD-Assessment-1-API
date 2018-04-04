<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Search Athlone Town Players</title>
	
	<link rel="stylesheet" href="css/myCSS.css" />
  
    <!-- SSWD Assessment 1 -->
    <!-- Ray Egan -->
    <!-- 11/08/17 -->	
</head>
	
<body>

	<div id="forms">
		<h2>SSWD Assessment 1</h2>
		
		<h4>API to return Athlone Town player profiles, searching by position or minimum appearances.</h4>
		
		<p>Please choose a position from 'striker', 'midfielder', 'defender' or 'goalkeeper' and enter it in the field below.</p>
		
		<form action="results.php" method="get">
			<input type="text" name="position" placeholder="Enter Position">
			<input type="submit" value="Search">
		</form>

		<p>Please enter a minimum appearance integer value and enter it in the field below.</p>
		
		<form action="results.php" method="get">
			<input type="text" name="appearances" placeholder="Enter Appearances">
			<input type="submit" value="Search">
		</form>
	</div>
</body>
</html>
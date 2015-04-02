<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
<?php
	echo "<table border='1'>";
	foreach($query as $row)
	{
		echo "<tr>";
		echo "<td>".$row->name."</td>" ;
		echo "<td>".$row->message."</td>" ;echo "<button type="button">Click Me!</button>;";
		echo "</tr>";
	}
	echo "</table>";
	
?>

</body>
</html>
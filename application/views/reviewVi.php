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
		echo "<td>".$row->message."</td>" "<button onclick="myFunction()">delete</button>";
		echo "</tr>";
	}
	echo "</table>";
	
?>
<script> 
function myFunction() {
    document.getElementById("demo").innerHTML = "Hello World";
}
</script>
</body>
</html>
<html>
<head>
	<meta charset="UTF-8">
	<title>tes dropdown</title>
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css"/>
	<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
	<link href="../assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen"/>
	<link href="../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen"/>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.js"></script>
	<script src="../assets/bootstrap/js/jquery-1.11.2.js"></script>
	<script src="../assets/bootstrap/js/bootstrap1.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<?php
	echo "<table border='1'>";
	foreach($query as $row)
	{
		echo "<tr>";
		echo "<td>".$row->username."</td>";
		echo "<td>".$row->email	."</td>";
		echo "</tr>";
	}
	echo "</table>";
	
?>
</body>
</html>
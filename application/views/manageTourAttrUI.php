<html>
	<head>

	</head>
	<body>
		<div id="container">
			<div id="header">
				
			</div>
			<div id="menu">
				
			</div>

			<div id="content">
				<? echo heading('All Posts',1); ?>
				<div id="list">
					<table border="1">
						<tr>
						<th>Title</th>
						<th>Author</th>
						<th>Categories</th>
						<th>Date</th>
						<th>Hits</th>
						<th colspan="2">Action</th>
						</tr>
						<?php
						//$quer = array_combine($query, $query2);
						foreach($query as $row){
							echo "<tr>";
							echo "<td>". $row->place_name ."</td>";
							echo "<td>". $row->author ."</td>";
							echo "<td>". $row->category_name ."</td>";
							echo "<td>". $row->last_modified ."</td>";
							echo "<td>". $row->hits ."</td>";
							echo "<td>". anchor('manageTourAttrCtr/del/' .$row->place_name, 'Delete') ."</td>";
							echo "<td>". anchor('manageTourAttrCtr/edit/' .$row->place_name, 'Edit') ."</td>";
							echo "</tr>";
						}
						?>
					</table>
					
					
					<br><br><br>
			</div></div>
		</div>

		<div id="footer">
			
		</div>

	</body>
</html>
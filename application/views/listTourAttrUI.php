<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
  <title>JAKtrip</title>
  <body>
   
	<form id="your_form1" action="listTourAttrCtr/sortAtoZ" method="post">
		<input type="submit" name="sortAtoZ" value="sort A to Z" />
	</form>
	
	<form id="your_form2" action="listTourAttrCtr/sortZtoA" method="post">
		<input type="submit" name="sortZtoA" value="sort Z to A" />
	</form>
	
	<form id="your_form3" action="listTourAttrCtr/HighToLow" method="post">
		<input type="submit" name="HighToLow" value="high to low" />
	</form>
	
	<form id="your_form4" action="listTourAttrCtr/LowToHigh" method="post">
		<input type="submit" name="LowToHigh" value="low to high" />
	</form>
	
    <h4>Display Records From Database Using Codeigniter</h4>
    <table>
		<tr>
			<th>Place Name</th>
			<th>Weekday Price</th>
			<th>Weekend Price</th>
			<th>Longitude</th>
			<th>Lattitude</th>
			<th>City</th>
			<th>Rate Average</th>
			<th>Description</th>
			<th>Place Info</th>
			<th>Halte Code</th>
			<th>Transport Info</th>
			<th>Transport Price</th>
			<th>Author</th>
		</tr>
		<?php foreach($result  as $r): ?>
		<tr>
			<?php echo 
			"<td>".$r->place_name."</td>".
			"<td>".$r->weekday_price."</td>".
			"<td>".$r->weekend_price."</td>".
			"<td>".$r->longitude."</td>".
			"<td>".$r->lattitude."</td>".
			"<td>".$r->city."</td>".
			"<td>".$r->rate_avg."</td>".
			"<td>".$r->description."</td>".
			"<td>".$r->place_info."</td>".
			"<td>".$r->halte_code."</td>".
			"<td>".$r->transport_info."</td>".
			"<td>".$r->transport_price."</td>".
			"<td>".$r->author."</td>"
			; ?>
		</tr>
		<?php endforeach; ?>
	</table>
	 
 
  </body>
</html>
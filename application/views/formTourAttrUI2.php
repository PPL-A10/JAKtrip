<html>
	<head>
	
		<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var gmarkers = [];
var counter = 0;
var map;
var myCenter=new google.maps.LatLng(-6.190035, 106.838075);
function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:11,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
  
  var recentLat=document.getElementById('lattitude').value;
  var recentLng=document.getElementById('longitude').value;
  var recentLoc = new google.maps.LatLng(recentLat,recentLng);
  var marker=new google.maps.Marker({
	position:recentLoc,
	map:map
  });
	gmarkers.push(marker);
  google.maps.event.addListener(map, 'click', function(event) {
  counter++;
    gmarkers[counter-1].setMap(null);
	
	placeMarker(event.latLng); 
	
  });
}

function placeMarker(location) {
  
   var marker = new google.maps.Marker({
    position: location,
    map: map,
  });
  gmarkers.push(marker);

  var infowindow = new google.maps.InfoWindow({
    content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng() + '<br><button type="button" onclick="addLocation('+location.lng()+', '+location.lat()+')">Add Location</button>'
  });
  
  infowindow.open(map,marker);
}
google.maps.event.addDomListener(window, 'load', initialize);

function addLocation(lng,lat){
 //code....
	document.getElementById('longitude').value=lng;
	document.getElementById('lattitude').value=lat;
}
</script>

	</head>
	<body>
		<div id="container">
			<div id="header">
				
			</div>
			<div id="menu">
				
			</div>
			<div id="content">
			<h1>Add New Post</h1>
			
			<?php
				
				$attributes = array('class' => '', 'id' => '');
				echo form_open_multipart('manageTourAttrCtr/myform', $attributes); 
				$place_name = $place_name['value'];
				$description = $description['value'];
				$place_info = $place_info['value'];
				$weekday_price = $weekday_price['value'];
				$weekend_price = $weekend_price['value'];
				$cat_name = $cat_name['value'];
				$cat_checked = $cat_checked['value'];
				$city = $city['value'];
				//$pic = $pic['value'];
				//$pic_info = $pic_info['value'];
				$longitude = $longitude['value'];
				$lattitude = $lattitude['value'];
				$halte_name = $halte_name['value'];
				$transport_info = $transport_info['value'];
				$transport_price = $transport_price['value'];
				$author = $author['value'];
				
				
				echo form_hidden('key', $place_name).br(); 
				echo form_hidden('rate_avg', $rate_avg).br(); 
				echo form_hidden('hits', $hits).br(); 
				echo "Name ", form_input('place_name', $place_name).br(); 										
				echo "Description ", form_textarea( array( 'name' => 'description', 'rows' => '5', 'cols' => '80', 'value' => $description ) ).br();
				//array_push($place_inf, '');
				echo "Place Info ", form_dropdown('place_info', $place_inf, $place_info).br(); 
				echo "Weekday Price ", form_input('weekday_price', $weekday_price).br(); 
				echo "Weekend Price ", form_input('weekend_price', $weekend_price).br(); 
				//echo "Category ", form_input('category_name',$cat_name, $category_name).br(); 
				
				$i=0;
				foreach ($cat_name as $row){
					$cat = $row->category_name;
					echo form_checkbox('category_list[]',$cat, $cat_checked[$i]).($row->category_name)."<br>"; 
					$i++;
				}
				echo form_checkbox('category_list[]','')."Other ".form_input('category_new',set_value('category_new'))."<br>";
				
				$loc = array('Jakarta Barat' => 'Jakarta Barat', 'Jakarta Pusat' => 'Jakarta Pusat', 'Jakarta Selatan' =>'Jakarta Selatan', 
					'Jakarta Timur' => 'Jakarta Timur', 'Jakarta Utara' =>'Jakarta Utara'); 
				echo "Location ", form_dropdown('city',$loc, $city).br(); 
				//echo "Photos ", form_input('pic', $pic).br(); 
				
				echo
				"<p>
						<label for='pic'>Photos <span class=''></span></label>
						<?php echo form_error('pic'); 

						?>
						<br /><input id='pic' type='file' name='pic[]' size='20'  multiple>
				</p>";
				
				foreach($photo as $apic){
					echo "<img src=".$apic->pic." height='200'><br>";				
				}

				
				echo "Photos Info "; 
				
				
				foreach($photo as $apic){
				$picinfo = array(
						  'name'        => 'pic_info[]',
						  'id'          => 'pic_info',
						  'value'       => $apic->pic_info
						);
					echo form_input($picinfo)."<br>";				
				}

				$lng = array(
						  'name'        => 'longitude',
						  'id'          => 'longitude',
						  'value'       => $longitude
						);
				$lat = array(
				  'name'        => 'lattitude',
				  'id'          => 'lattitude',
				  'value'       => $lattitude
				);

				echo "Longitude ", form_input($lng).br(); 
				echo "Lattitude ", form_input($lat).br(); 
				
				echo "<div id='googleMap' style='width:500px;height:380px;'></div>";
				
				echo "Transport Info ", form_input('transport_info', $transport_info).br(); 
				echo "Transport Price ", form_input('transport_price', $transport_price).br(); 
				echo "Halte ", form_dropdown('halte_name',$hlt_name, $halte_name).br(); 
				
				$auth = array('ahmadibrahim' => 'ahmadibrahim', 'fakhirahdg' => 'fakhirahdg', 'khusnanadia' => 'khusnanadia', 
					'syifakha' => 'syifakha', 'mswildan' => 'mswildan'); 
				echo "Author ", form_dropdown('author',$auth, $author).br(); 
				echo form_submit( 'save', 'Save');
				echo form_submit( 'cancel', 'Cancel');				
				echo form_close(); 
			?>
				<br><br><br>
			</div>
		</div>
		<div id="footer">
		</div>

	</body>
</html>
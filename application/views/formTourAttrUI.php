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

  google.maps.event.addListener(map, 'click', function(event) {
   // map.setMap(null);
    if(counter!=0)
       gmarkers[counter-1].setMap(null);
    counter++;
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
				echo form_open_multipart('tourAttrCtr/myform', $attributes); ?>
	
				<p>
						<label for="place_name">Name <span class="required">*</span></label>
						<?php echo form_error('place_name'); ?>
						<br /><input id="place_name" type="text" name="place_name"  value="<?php echo set_value('place_info'); ?>"  />
				</p>

				<p>
						<label for="description">Description <span class="required">*</span></label>
						<?php echo form_error('description'); ?>
						<br />
											
						<?php echo form_textarea( array( 'name' => 'description', 'rows' => '5', 'cols' => '80', 'value' => set_value('description') ) )?>
				</p>
				<!--
				<p>
						<label for="place_info">Place Info <span class=""></span></label>
						<?php //echo form_error('place_info'); ?>
						<br /><input id="place_info" type="text" name="place_info"  value="<?php //echo set_value('place_info'); ?>"  />
				</p>
				-->
				
				<?php echo "Place Info ", form_dropdown('place_info',$place_info, set_value('place_info')); ?>
				
				<p>
						<label for="weekday_price">Weekday Price <span class="required">*</span></label>
						<?php echo form_error('weekday_price'); ?>
						<br /><input id="weekday_price" type="text" name="weekday_price"  value="<?php echo set_value('weekday_price'); ?>"  />
				</p>

				<p>
						<label for="weekend_price">Weekend Price <span class="required">*</span></label>
						<?php echo form_error('weekend_price'); ?>
						<br /><input id="weekend_price" type="text" name="weekend_price"  value="<?php echo set_value('weekend_price'); ?>"  />
				</p>
				
				
				<?php //echo "Category ", form_input('category_name',set_value('category_name')); ?>
				
				<?php //foreach($cat_name as $row){
						//echo "<input type='checkbox' name='category_list[]' value=".$row->category_name.">".$row->category_name."<br>";
				//}
				//echo "<label><input type='checkbox' name='category_list[]' value='new_cat'>New Category ".form_input('category_name',set_value('category_name'))."</label><br>";
				?>
				
				<?php foreach ($cat_name as $row){
					echo form_checkbox('category_list[]',$row->category_name).($row->category_name)."<br>"; 
				}
				echo form_checkbox('category_list[]','')."Other ".form_input('category_new',set_value('category_new'))."<br>";
				?>
			
				
				<?php $loc = array('Jakarta Barat' => 'Jakarta Barat', 'Jakarta Pusat' => 'Jakarta Pusat', 'Jakarta Selatan' =>'Jakarta Selatan', 
					'Jakarta Timur' => 'Jakarta Timur', 'Jakarta Utara' =>'Jakarta Utara'); 
				echo "Location ", form_dropdown('city',$loc, set_value('city')); ?>
				
				<p>
						<label for="pic">Photos <span class=""></span></label>
						<?php echo form_error('pic'); 

						?>
						<br /><input id="pic" type="file" name="pic[]" size="20"  value="<?php echo set_value('pic'); ?>" multiple>
				</p>
				
				<p>
						<label for="pic_info">Photos Info <span class=""></span></label>
						<?php echo form_error('pic_info'); ?>
						<br /><input id="pic_info" type="text" name="pic_info"  value="<?php echo set_value('pic_info'); ?>"  />
				</p>
				
				<p>
						<label for="longitude">Longitude <span class="required">*</span></label>
						<?php echo form_error('longitude'); ?>
						<br /><input id="longitude" type="text" name="longitude"  value="<?php echo set_value('longitude'); ?>"  />
				</p>
				
				<p>
						<label for="lattitude">Lattitude <span class="required">*</span></label>
						<?php echo form_error('lattitude'); ?>
						<br /><input id="lattitude" type="text" name="lattitude"  value="<?php echo set_value('lattitude'); ?>"  />
				</p>
				<div id="googleMap" style="width:500px;height:380px;"></div>
				

				<?php echo "Halte ", form_dropdown('halte_code',$halte_name, set_value('halte_code')); ?>
				
				<p>
						<label for="transport_info">Transport Info <span class="required">*</span></label>
						<?php echo form_error('transport_info'); ?>
						<br /><input id="transport_info" type="text" name="transport_info"  value="<?php echo set_value('transport_info'); ?>"  />
				</p>
				
				<p>
						<label for="transport_price">Transport Price <span class="required">*</span></label>
						<?php echo form_error('transport_price'); ?>
						<br /><input id="transport_price" type="text" name="transport_price"  value="<?php echo set_value('transport_price'); ?>"  />
				</p>
				

				<?php $author = array('ahmadibrahim' => 'ahmadibrahim', 'fakhirahdg' => 'fakhirahdg', 'khusnanadia' => 'khusnanadia', 
					'syifakha' => 'syifakha', 'mswildan' => 'mswildan'); 
				echo "Author ", form_dropdown('author',$author, set_value('author')); ?>
				
				<p>
						<?php echo form_submit( 'publish', 'Publish'); ?>
				</p>
				
				<p>
						<?php //echo form_submit( 'save', 'Save'); ?>
				</p>
				
				
				
				<?php echo form_close();?>

				<br><br><br>
			</div>
		</div>
		<div id="footer">
		</div>

	</body>
</html>
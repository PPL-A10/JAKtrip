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


			<div class="col-lg-12">
				<!-- if succes
				<div class="col-lg-2"></div>
				<div class="alert alert-dismissible alert-success col-lg-7" style="text-align: center; margin: 15px;">
				<button type="button" class="close" data-dismiss="alert">�</button>
				<strong>Thank you!</strong> You successfully published new places. </div>
				<div class="col-lg-3"></div><br><br><br><br>
				
				if failed
				<div class="col-lg-2"></div>
				<div class="alert alert-dismissible alert-warning col-lg-7" style="text-align: center; margin: 15px;">
				<button type="button" class="close" data-dismiss="alert">�</button>
				<strong>Ooops!</strong> Something went wrong. Please double check the form. </div>
				<div class="col-lg-3"></div><br><br><br><br>
			-->

				<div class="tuffyh2a admintitle">Add New Post</div>

				<?php
				$attributes = array('class' => 'newpost col-lg-8', 'method' => 'post');
					echo form_open('manageTourAttrCtr/myform', $attributes); 
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
				?>
					
					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Title <span class="req">*</span></label>
						<?php echo form_error('place_name'); ?>
  						<input class="form-control" type="text" id="place_name" name="place_name" value="<?php echo $place_name; ?>" >
				      <br></div>
				    </div>
					<br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Description <span class="req">*</span></label>
						<?php echo form_error('description'); 
						echo "Description ", form_textarea( array( 'name' => 'description', 'rows' => '5', 'cols' => '80', 'value' => $description ) )."<br>";
				
						?>
  						<!--<textarea class="form-control" rows="3" id="textArea" id="description" name="description" value="<?php //echo $description; ?>" ></textarea>-->
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Place Information</label><br>
						<?php echo form_error('place_info'); ?>
   					 	<span class="field custom-dropdown ">
						<!--
   					 	<select   class="field form-control" title="Place Information" style="margin-left: -10px;">    
   					     	
							<option value="" selected disabled>Choose place information..</option>
   					     	<?php
			                  //foreach($place_info as $row)
			                  //{
			                   // echo "<option value='".$row->place_name."'>".$row->place_name."</option>";
			                  //}
			                ?>
   					 	</select>-->
						<?php echo form_dropdown('place_info', $place_inf, $place_info)."<br>"; ?>
   					 </span><br>
				      <br></div>
				    </div>
				    <br><br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Weekday Price <span class="req">*</span></label>
						<?php echo form_error('weekday_price'); ?>
  						<input class="form-control" type="text" id="weekday_price" name="weekday_price" value="<?php echo $weekday_price; ?>" >
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Weekend Price <span class="req">*</span></label>
						<?php echo form_error('weekend_price'); ?>
  						<input class="form-control" type="text" id="weekend_price" name="weekend_price" value="<?php echo $weekend_price; ?>" >
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Category <span class="req">*</span></label><br>
						<?php echo form_error('category_name'); ?>
  						<?php 	$i=0;
								foreach ($cat_name as $row){
									$cat = $row->category_name;
									echo form_checkbox('category_list[]',$cat, $cat_checked[$i]).($row->category_name)."<br>"; 
									$i++;
								}
								echo '<br>';
								echo form_checkbox('category_list[]','')."Other ".form_input('category_new',set_value('category_new'))."<br>";
						?>
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Location <span class="req">*</span></label><br>
						<?php echo form_error('city'); 
						$loc = array('Jakarta Barat' => 'Jakarta Barat', 'Jakarta Pusat' => 'Jakarta Pusat', 'Jakarta Selatan' =>'Jakarta Selatan', 
											'Jakarta Timur' => 'Jakarta Timur', 'Jakarta Utara' =>'Jakarta Utara'); 
									echo "Location ", form_dropdown('city',$loc, $city)."<br>"; 
						?>
  						<span class="field custom-dropdown "><!--
   					 	<select   class="field form-control" title="All Location" style="margin-left: -10px;">    
   					     	<option value="" selected disabled>All Location</option>
   					     	<?php	
							
			                  //foreach($query2 as $row)
			                  //{
			                  //  echo "<option value='".$row->city."'>".$row->city."</option>";
			                 // }
			                ?>
   					 	</select> -->
   					 </span><br>
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Photos <span class="req">*</span></label>
						<?php echo form_error('city'); ?>
  						<input class="" type="file" id="pic" name="pic" value="<?php echo set_value('pic'); ?>" multiple>
				      <br></div>
				    </div>
				    <br>
					<div class="form-group">
					  <div class="col-lg-11">
						<div id='googleMap' style='width:500px;height:380px;'></div>
				      <br></div>
				    </div>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Longitude <span class="req">*</span></label>
						<?php echo form_error('longitude'); ?>
  						<input class="form-control" type="text" id="longitude" name="longitude" value="<?php echo $longitude; ?>" >
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Lattitude <span class="req">*</span></label>
						<?php echo form_error('lattitude'); ?>
  						<input class="form-control" type="text" id="lattitude" name="lattitude" value="<?php echo $lattitude; ?>" >
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Nearest Bus Stop <span class="req">*</span></label><br>
						<?php echo form_error('halte_code'); ?>
  						 <span class="field custom-dropdown " >
						 <?php echo form_dropdown('halte_name',$hlt_name, $halte_name)."<br>"; ?>
   					 	<!--<select class="field form-control" title="Nearest bus stop?" >    
   							 <option value="" selected disabled>Nearest bus stop?</option>
   					      	<?php
   				    		//foreach ($query as $row) {
							//		echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							//}  				    		 
   				   			?>
   					 	</select>-->
   					 </span>
				      <br><br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Transportation Info <span class="req">*</span></label>
						<?php echo form_error('transport_info'); ?>
  						<input class="form-control" type="text" id="transport_info" name="transport_info" value="<?php echo $transport_info; ?>" >
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Transportation Fee <span class="req">*</span></label>
						<?php echo form_error('transport_price'); ?>
  						<input class="form-control" type="text" id="transport_price" name="transport_price" value="<?php echo $transport_price; ?>" >
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Author <span class="req">*</span></label>
						 <span class="field custom-dropdown " >
						 <?php
						 $auth = array('ahmadibrahim' => 'ahmadibrahim', 'fakhirahdg' => 'fakhirahdg', 'khusnanadia' => 'khusnanadia', 
										'syifakha' => 'syifakha', 'mswildan' => 'mswildan'); 
							echo form_dropdown('author',$auth, $author)."<br>"; 
						 
						 ?>
   					 	<!--<select class="field form-control" title="Nearest bus stop?" >    
   							 <option value="" selected disabled>Choose Author</option> 
   					      	<?php
							
							
							
   				    		//foreach ($admin as $row) {
							//		echo "<option value=\"".$row->username."\">".$row->username."</option>";
							//}  				    		 
   				   			?>

   					 	</select>-->
   					 </span>
				      <br></div>
				    </div>
				    <br>

				    <button class="btn btn-warning" type="submit">PUBLISH</button>
				    <button class="btn btn-primary" type="submit">SAVE</button>
				    
				<?php echo form_close(); ?>
			</div>


			
		</div>
	</div>



<!--
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
				/*
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
				echo form_close(); */
			?>
				<br><br><br>
			</div>
		</div>
		<div id="footer">
		</div>

	</body>
</html>
-->
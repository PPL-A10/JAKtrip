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
			<h1>Add New Post</h1>
			
				<?php
				
				$attributes = array('class' => '', 'id' => '');
				echo form_open('manageTourAttrCtr/myform', $attributes); 
				$place_name = $place_name['value'];
				$description = $description['value'];
				$place_info = $place_info['value'];
				$weekday_price = $weekday_price['value'];
				$weekend_price = $weekend_price['value'];
				$category_name = $category_name['value'];
				$city = $city['value'];
				$pic = $pic['value'];
				$pic_info = $pic_info['value'];
				$longitude = $longitude['value'];
				$lattitude = $lattitude['value'];
				$halte_name = $halte_name['value'];
				$transport_info = $transport_info['value'];
				$transport_price = $transport_price['value'];
				$author = $author['value'];
				?>

				<p>
						<label for="place_name">Name <span class="required">*</span></label>
						<?php echo form_error('place_name'); ?>
						<br /><input id="place_name" type="text" name="place_name" value="<?php echo $place_name; ?>" />
				</p>

				<p>
						<label for="description">Description <span class="required">*</span></label>
						<?php echo form_error('description'); ?>
						<br />
											
						<?php echo form_textarea( array( 'name' => 'description', 'rows' => '5', 'cols' => '80', 'value' => $description ) )?>
				</p>
				
				<p>
						<label for="place_info">Place Info <span class=""></span></label>
						<?php echo form_error('place_info'); ?>
						<br /><input id="place_info" type="text" name="place_info"  value="<?php echo $place_info; ?>"  />
				</p>
				
				<p>
						<label for="weekday_price">Weekday Price <span class="required">*</span></label>
						<?php echo form_error('weekday_price'); ?>
						<br /><input id="weekday_price" type="text" name="weekday_price"  value="<?php echo $weekday_price; ?>"  />
				</p>

				<p>
						<label for="weekend_price">Weekend Price <span class="required">*</span></label>
						<?php echo form_error('weekend_price'); ?>
						<br /><input id="weekend_price" type="text" name="weekend_price"  value="<?php echo $weekend_price; ?>"  />
				</p>
				

				<?php echo "Category ", form_dropdown('category_name',$cat_name, $category_name); ?>
				
				<!--
				<p>
						<label for="city">Location <span class="required">*</span></label>
						<?php //echo form_error('city'); ?>
						<br /><input id="city" type="text" name="city"  value="<?php //echo $city; ?>"  />
				</p> -->
				
				<?php $loc = array('Jakarta Barat' => 'Jakarta Barat', 'Jakarta Pusat' => 'Jakarta Pusat', 'Jakarta Selatan' =>'Jakarta Selatan', 
					'Jakarta Timur' => 'Jakarta Timur', 'Jakarta Utara' =>'Jakarta Utara'); 
					echo "Location ", form_dropdown('city',$loc, $city); ?>
				
				<p>
						<label for="pic">Photos <span class=""></span></label>
						<?php echo form_error('pic'); ?>
						<br /><input id="pic" type="text" name="pic"  value="<?php echo $pic; ?>"  />
				</p>
				
				<p>
						<label for="pic_info">Photos Info <span class=""></span></label>
						<?php echo form_error('pic_info'); ?>
						<br /><input id="pic_info" type="text" name="pic_info"  value="<?php echo $pic_info; ?>"  />
				</p>
				
				<p>
						<label for="longitude">Longitude <span class="required">*</span></label>
						<?php echo form_error('longitude'); ?>
						<br /><input id="longitude" type="text" name="longitude"  value="<?php echo $longitude; ?>"  />
				</p>
				
				<p>
						<label for="lattitude">Lattitude <span class="required">*</span></label>
						<?php echo form_error('lattitude'); ?>
						<br /><input id="lattitude" type="text" name="lattitude"  value="<?php echo $lattitude; ?>"  />
				</p>
				
				<!--
				<p>
						<label for="halte_code">Halte <span class="required">*</span></label>
						<?php //echo form_error('halte_code'); ?>
						<br /><input id="halte_code" type="text" name="halte_code"  value="<?php// echo $halte_code; ?>"  />
				</p>
				-->
				
				<?php echo "Halte ", form_dropdown('halte_name',$hlt_name, $halte_name); ?>
				
				<p>
						<label for="transport_info">Transport Info <span class="required">*</span></label>
						<?php echo form_error('transport_info'); ?>
						<br /><input id="transport_info" type="text" name="transport_info"  value="<?php echo $transport_info; ?>"  />
				</p>
				
				<p>
						<label for="transport_price">Transport Price <span class="required">*</span></label>
						<?php echo form_error('transport_price'); ?>
						<br /><input id="transport_price" type="text" name="transport_price"  value="<?php echo $transport_price; ?>"  />
				</p>
				<!--
				<p>
						<label for="author">Author <span class="required">*</span></label>
						<?php //echo form_error('author'); ?>
						<br /><input id="author" type="text" name="author"  value="<?php //echo $author; ?>"  />
				</p> -->
				
				<?php $auth = array('ahmadibrahim' => 'ahmadibrahim', 'fakhirahdg' => 'fakhirahdg', 'khusnanadia' => 'khusnanadia', 
					'syifakha' => 'syifakha', 'mswildan' => 'mswildan'); 
				echo "Author ", form_dropdown('author',$auth, $author); ?>
				
				<p>
						<?php //echo form_submit( 'publish', 'Publish'); ?>
				</p>
				
				<p>
						<?php echo form_submit( 'save', 'Save'); ?>
				</p>

				<?php echo form_close(); ?>

				<br><br><br>
			</div>
		</div>
		<div id="footer">
		</div>

	</body>
</html>
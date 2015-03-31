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
				echo form_open('tourAttrCtr/myform', $attributes); 
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
				$halte_code = $halte_code['value'];
				$transport_info = $transport_info['value'];
				$transport_price = $transport_price['value'];
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
				
				<p>
						<label for="category_name">Category <span class="required">*</span></label>
						<?php echo form_error('category_name'); ?>
						<br /><input id="category_name" type="text" name="category_name"  value="<?php echo $category_name; ?>"  />
				</p>
				
				<p>
						<label for="city">Location <span class="required">*</span></label>
						<?php echo form_error('city'); ?>
						<br /><input id="city" type="text" name="city"  value="<?php echo $city; ?>"  />
				</p>
				
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
				
				<p>
						<label for="halte_code">Halte <span class="required">*</span></label>
						<?php echo form_error('halte_code'); ?>
						<br /><input id="halte_code" type="text" name="halte_code"  value="<?php echo $halte_code; ?>"  />
				</p>
				
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
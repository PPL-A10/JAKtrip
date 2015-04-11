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
				$cat_name = $cat_name['value'];
				$cat_checked = $cat_checked['value'];
				$city = $city['value'];
				$pic = $pic['value'];
				$pic_info = $pic_info['value'];
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
				echo "Photos ", form_input('pic', $pic).br(); 
				echo "Photos Info ", form_input('pic_info', $pic_info).br(); 
				echo "Longitude ", form_input('longitude', $longitude).br(); 
				echo "Lattitude ", form_input('lattitude', $lattitude).br(); 
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
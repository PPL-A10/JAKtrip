<div class="col-lg-12">
	<div class="tuffyh2a admintitle">Edit Promo</div>
		<?php
		$attributes = array('class' => 'newpost col-lg-8', 'method' => 'post');
		echo form_open('ManagePromoCtr/myform', $attributes); 
		$title = $title['value'];
		$start_date = $start_date['value'];
		$end_date = $end_date['value'];
		$place_name = $place_name['value'];
		$description = $description['value'];
		$type_name = $type_nam;
		$type_checked = $type_checked['value'];
		$photo = $photoPromo;
	
		echo form_hidden('key', $id_promo); 
		echo form_hidden('photoPromo', $photoPromo);
		// echo form_hidden('hits', $hits);
		// echo form_hidden('author', $author);
		?>
		
		<div class="form-group">
		  <div class="col-lg-11">
			<label class="control-label">Title <span class="req">*</span></label>
			<?php echo form_error('title'); ?>
  				<input class="form-control" type="text" id="title" name="title" value="<?php echo $title; ?>" required>
		      <br></div>
		    </div>
			<br>
		<div class="form-group">
		  <div class="col-lg-11">
			<label class="control-label">Start Date <span class="req">*</span></label>
			<input class="form-control field datepicker" type="text" name="datepicker[]" id="start_date"  value="<?php echo $start_date; ?>" style="background-color: #f0f0f0 !important;" required>
			 <br></div>
	    </div>
		<br>
		<div class="form-group">
		  <div class="col-lg-11">
			<label class="control-label">End Date <span class="req">*</span></label>
			<input class="form-control field datepicker" type="text" name="datepicker[]" id="end_date"  value="<?php echo $end_date; ?>" style="background-color: #f0f0f0 !important;" required>
  			 <br></div>
		   </div>
	    <br>
	   	<!--<div class="form-group">
		  <div class="col-lg-11">
			<label class="control-label">Start Date <span class="req">*</span></label>
			<input class="form-control field datepicker" type="text" name="start_date" id="start_date"  value="<?php echo set_value('start_date'); ?>" style="background-color: #f0f0f0 !important;" required>
	      <br></div>
	    </div>
		<br>
		<div class="form-group">
		  <div class="col-lg-11">
			<label class="control-label">End Date <span class="req">*</span></label>
			<input class="form-control field datepicker" type="text" name="end_date" id="end_date"  value="<?php echo set_value('end_date'); ?>" style="background-color: #f0f0f0 !important;" required>
	      <br></div>
	    </div>
		<br> -->
	    <div class="form-group">
		  <div class="col-lg-11">
			<label class="control-label">Place Name </label><br>
			<?php echo form_error('place_name'); ?>
   		 	<span class="field custom-dropdown ">						
	   		 	<select class="field form-control" title="place_name" id="place_name" name="place_name" style="margin-left: -10px; background-color: #f0f0f0 !important;" required>       					     	
					<option value="" selected disabled>Choose place</option>
	   	     		<?php
		            foreach($lala as $row){
						if(strcmp($row->place_name,$place_name)==0){
							echo "<option value='".$place_name."' selected>".$place_name."</option>";
						}else{
							echo "<option value='".$row->place_name."'>".$row->place_name."</option>";
						}
			        }
		        	?>
	   		 	</select>
			<!--<?php //echo form_dropdown('place_info', $place_inf, $place_info)."<br>"; ?>-->
   			</span><br>
	     <br></div>
	    </div>
	    <br><br>
	    <div class="form-group">
		  <div class="col-lg-11">
			<label class="control-label">Description <span class="req">*</span></label>
			<?php echo form_error('description'); 
			echo form_textarea(array( 'name' => 'description', 'rows' => '3', 'class' => 'form-control', 'value' => $description) )."<br>";
			?>
  			 <br></div>
	    </div>
	    <br>
	    <div class="form-group">
		  <div class="col-lg-11">
			<label class="control-label">Type of Promo <span class="req">*</span></label><br>
			<?php echo form_error('type_name'); ?>
 			<?php $i=0;
				foreach ($type_nam as $row){
					$type = $row->type_name;
					echo form_checkbox('type_list[]', $type, $type_checked[$i]).($row->type_name)."<br>"; 
					$i++;
				}
				echo '<br>';
				echo form_checkbox('type_list[]','')."Other ".form_input('type_new',set_value('type_new'))."<br>";
			?>
	      <br></div>
	    </div>
	    <br>
	    <div class="form-group">
		  <div class="col-lg-11"> <br>
			<label class="control-label">Photos <span class="req">*</span></label>
  			<input type="file" name="userfile" size="20">
		    <?php echo "<img src='".base_url($photo)."'></a>"; ?>
		    <br></div>
		</div>
		<br>
	 	<br>

	 	<br><br>
		    <button class="btn btn-warning" type="submit">PUBLISH</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

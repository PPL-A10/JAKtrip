<div class="tuffyh2a admintitle">Edit Promo</div>
	<?php
		$attributes = array('class' => 'newpost col-lg-8', 'method' => 'post');
		echo form_open('ManagePromoCtr/myForm', $attributes); 
		$start_date = $start_date;
		$end_date = $end_date;
		$place_name = $place_name;
		$photo = $photo;
		$title = $title;
		$description = $description;
		$type_checked = $type_checked['value'];

		echo form_hidden('key', $id_promo);
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
						<input class="form-control field datepicker" type="text" name="datepicker" id="start_date"  value="<?php echo $start_date; ?>" style="background-color: #f0f0f0 !important;" required>
  						 <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">End Date <span class="req">*</span></label>
						<input class="form-control field datepicker" type="text" name="datepicker" id="end_date"  value="<?php echo $end_date; ?>" style="background-color: #f0f0f0 !important;" required>
  						 <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Place Name</label><br>
						<?php echo form_error('place_name'); ?>
   					 	<span class="field custom-dropdown ">						
   					 	<select class="field form-control" title="Inside Of" id="place_name" name="place_name" style="margin-left: -10px; background-color: #f0f0f0 !important;">
							<option value="" selected disabled>Choose place</option>
   					     	<?php
			                 foreach($lala as $row)
			                 {
								if(strcmp($row->place_name,$place_name)==0){
									echo "<option value='".$place_name."' selected>".$place_name."</option>";
								}
								else{
									echo "<option value='".$row->place_name."'>".$row->place_name."</option>";
								}
			                    
			                 }
			                ?>
   					 	</select>
						<!--<?php //echo form_dropdown('place_info', $place_inf, $place_info)."<br>"; ?>-->
   					 </span><br>
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Description <span class="req">*</span></label>
						<?php echo form_error('description'); 
						echo form_textarea( array( 'name' => 'description', 'rows' => '3', 'class' => 'form-control', 'value' => $description) )."<br>";
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
				      <br></div>
				    </div>
				    <br>

				    <br><br>

				    <button class="btn btn-warning" type="submit">PUBLISH</button>
				    
				<?php echo form_close(); ?>
			</div>


			
		</div>
	</div>


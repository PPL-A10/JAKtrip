


			<div class="col-lg-12">
				<!-- if succes
				<div class="col-lg-2"></div>
				<div class="alert alert-dismissible alert-success col-lg-7" style="text-align: center; margin: 15px;">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Thank you!</strong> You successfully published new places. </div>
				<div class="col-lg-3"></div><br><br><br><br>
				
				if failed
				<div class="col-lg-2"></div>
				<div class="alert alert-dismissible alert-warning col-lg-7" style="text-align: center; margin: 15px;">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Ooops!</strong> Something went wrong. Please double check the form. </div>
				<div class="col-lg-3"></div><br><br><br><br>
			-->

				<div class="tuffyh2a admintitle">Add New Post</div>

				<?php
				$attributes = array('class' => 'newpost col-lg-8', 'method' => 'post');
				echo form_open('tourAttrCtr/myform', $attributes); ?>
		
					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Title <span class="req">*</span></label>
						<?php echo form_error('place_name'); ?>
  						<input class="form-control" type="text" id="place_name" name="place_name" value="<?php echo set_value('place_name'); ?>" >
				      <br></div>
				    </div>
					<br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Description <span class="req">*</span></label>
						<?php echo form_error('description'); ?>
  						<textarea class="form-control" rows="3" id="textArea" id="description" name="description" value="<?php echo set_value('description'); ?>" ></textarea>
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Place Information</label><br>
						<?php echo form_error('place_info'); ?>
   					 	<span class="field custom-dropdown ">
   					 	<select   class="field form-control" title="Place Information" id="place_inform" name="place_inform" style="margin-left: -10px;">    
   					     	<option value="" selected disabled>Choose place information..</option>
   					     	<?php
			                  foreach($place as $row)
			                  {
			                    echo "<option value='".$row->place_name."'>".$row->place_name."</option>";
			                  }
			                ?>
   					 	</select>
   					 </span><br>
				      <br></div>
				    </div>
				    <br><br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Weekday Price <span class="req">*</span></label>
						<?php echo form_error('weekday_price'); ?>
  						<input class="form-control" type="text" id="weekday_price" name="weekday_price" value="<?php echo set_value('weekday_price'); ?>" >
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Weekend Price <span class="req">*</span></label>
						<?php echo form_error('weekend_price'); ?>
  						<input class="form-control" type="text" id="weekend_price" name="weekend_price" value="<?php echo set_value('weekend_price'); ?>" >
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Category <span class="req">*</span></label><br>
						<?php echo form_error('category_name'); ?>
  						<?php foreach ($cat_name as $row){
							echo form_checkbox('category_list[]',$row->category_name).($row->category_name)."<br>"; 
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
						<?php echo form_error('city'); ?>
  						<span class="field custom-dropdown ">
   					 	<select   class="field form-control" title="All Location" id="select_location" name="select_location" style="margin-left: -10px;">    
   					     	<option value="" selected disabled>All Location</option>
   					     	<?php
			                  foreach($query2 as $row)
			                  {
			                    echo "<option value='".$row->city."'>".$row->city."</option>";
			                  }
			                ?>
   					 	</select>
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
						<label class="control-label">Longitude <span class="req">*</span></label>
						<?php echo form_error('longitude'); ?>
  						<input class="form-control" type="text" id="longitude" name="longitude" value="<?php echo set_value('longitude'); ?>" >
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Lattitude <span class="req">*</span></label>
						<?php echo form_error('lattitude'); ?>
  						<input class="form-control" type="text" id="lattitude" name="lattitude" value="<?php echo set_value('lattitude'); ?>" >
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Nearest Bus Stop <span class="req">*</span></label><br>
						<?php echo form_error('halte_code'); ?>
  						 <span class="field custom-dropdown " >
   					 	<select class="field form-control" id="select_busstop" name="select_busstop"title="Nearest bus stop?" >    
   							 <option value="" selected disabled>Nearest bus stop?</option>
   					      	<?php
   				    		foreach ($query as $row) {
									echo "<option value='".$row->halte_name."'>".$row->halte_name."</option>";
							}  				    		 
   				   			?>
   					 	</select>
   					 </span>
				      <br><br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Transportation Info <span class="req">*</span></label>
						<?php echo form_error('transport_info'); ?>
  						<input class="form-control" type="text" id="transport_info" name="transport_info" value="<?php echo set_value('transport_info'); ?>" >
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Transportation Fee <span class="req">*</span></label>
						<?php echo form_error('transport_price'); ?>
  						<input class="form-control" type="text" id="transport_price" name="transport_price" value="<?php echo set_value('transport_price'); ?>" >
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Author <span class="req">*</span></label>
						 <span class="field custom-dropdown " >
   					 	<select class="field form-control" id="select_author" name="select_author" title="Nearest bus stop?" >    
   							 <option value="" selected disabled>Choose author..</option>
   					      	<?php
   				    		foreach ($admin as $row) {
									echo "<option value='".$row->username."'>".$row->username."</option>";
							}  				    		 
   				   			?>

   					 	</select>
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

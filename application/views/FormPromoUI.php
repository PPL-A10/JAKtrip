

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

				<div class="tuffyh2a admintitle">Add New Promo</div>

				<?php
				$attributes = array('class' => 'newpost col-lg-8', 'method' => 'post');
				echo form_open('AddPromoCtr/myForm', $attributes); ?>

				<!--<form class="newpost col-lg-8" method="post">-->
					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Title <span class="req">*</span></label>
						<?php echo form_error('title'); ?>
  						<input class="form-control" type="text" id="title" name="title" value="<?php echo set_value('title'); ?>" required>
				      <br></div>
				    </div>
					<br>

					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Start Date <span class="req">*</span></label>
  						<input class="form-control" type="date" id="start_date" name="start_date" value="<?php echo set_value('start_date'); ?>" required>
				      <br></div>
				    </div>
					<br>

					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">End Date <span class="req">*</span></label>
  						<input class="form-control" type="date" id="end_date" name="end_date" value="<?php echo set_value('end_date'); ?>" required>
				      <br></div>
				    </div>
					<br>

					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Place <span class="req">*</span></label><br>
						<?php echo form_error('place_name'); ?> 
   					 	<span class="field custom-dropdown ">
   					 	<select   class="field form-control" id="place_name" name="place_name" style="margin-left: -10px; background-color: #f0f0f0 !important;">    
   					     	<option value="" selected disabled>Choose a place..</option>
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

				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Description <span class="req">*</span></label>
  						<textarea class="form-control" rows="3" id="textArea" id="description" name="description" value="<?php echo set_value('description'); ?>"></textarea>
				      <br></div>
				    </div>
				    <br>
				    
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Type of Promo <span class="req">*</span></label><br>
						<?php echo form_error('type_name'); ?>
  						<?php foreach ($typepromo_name as $row){
							echo form_checkbox('type_list[]',$row->type_name).($row->type_name)."<br>"; 
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
  						<input class="" type="file" id="photo" name="photo" value="<?php echo set_value('photo'); ?>">
				      <br></div>
				    </div>
				    <br>
				    
				    <br><br>

				    <button class="btn btn-warning" type="submit">PUBLISH</button>
				    
				<!--</form>-->
				<?php echo form_close(); ?>
			</div>


			
		</div>
	</div>

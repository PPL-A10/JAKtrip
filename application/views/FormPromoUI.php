

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

				<form class="newpost col-lg-8" method="post">
					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Title <span class="req">*</span></label>
  						<input class="form-control" type="text" id="place_name" name="place_name" value="" required>
				      <br></div>
				    </div>
					<br>
					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Place <span class="req">*</span></label><br>
   					 	<span class="field custom-dropdown ">
   					 	<select   class="field form-control" id="place_inform" name="place_inform" style="margin-left: -10px; background-color: #f0f0f0 !important;">    
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
  						<textarea class="form-control" rows="3" id="textArea" id="description" name="description" value="" required></textarea>
				      <br></div>
				    </div>
				    <br>
				    
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Type <span class="req">*</span></label><br>
						<input type="checkbox">&nbsp;&nbsp;Type 1<br>
						<input type="checkbox">&nbsp;&nbsp;Type 2<br>
						<input type="checkbox">&nbsp;&nbsp;Type 3<br>
						<input type="checkbox">&nbsp;&nbsp;etc
				      <br></div>
				    </div>
				    <br>
				 	
				    <div class="form-group">
					  <div class="col-lg-11"> <br>
						<label class="control-label">Photos <span class="req">*</span></label>
  						<input class="" type="file" id="pic" name="pic" value="" multiple>
				      <br></div>
				    </div>
				    <br>
				    
				    <br><br>

				    <button class="btn btn-warning" type="submit">PUBLISH</button>
				    
				</form>
			</div>


			
		</div>
	</div>

<div class="container">
	<div class="row" style="margin-top: 100px;">

			<div class="col-lg-12">

				<div class="tuffyh2a admintitle">Edit Profile</div>
				<?php
				$attributes = array('class' => 'newpost col-lg-8', 'method' => 'post');
				echo form_open('UsersCtr/editMember', $attributes); 
				echo form_hidden('old_password', $password); ?>
					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Name <span class="req">*</span></label>
  						<input class="form-control" type="text" value="<?php echo $name; ?>" id="name" name="name" required>
				      <br></div>
				    </div>
					<br>

					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Username <span class="req">*</span></label>
  						<input class="form-control" type="text" value="<?php echo $username; ?>" id="username" name="username" readonly>
				      <br></div>
				    </div>
					<br>

					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">E-mail <span class="req">*</span></label>
  						<input class="form-control" type="email"  value="<?php echo $email; ?>" id="email" name="email" required>
				      <br></div>
				    </div>
					<br>

					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Password</label>
  						<input class="form-control" type="password" value="" id="new_password" name="new_password">
				      <br></div>
				    </div>
					<br>
					
					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Password Confirmation</label>
  						<input class="form-control" type="password" value="" id="pass_confirm" name="pass_confirm">
				      <br></div>
				    </div>
					<br>

				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Bio</label>
						<?php echo form_textarea( array( 'name' => 'description', 'rows' => '3', 'class' => 'form-control', 'value' => $description) );?>
					  <br></div>
				    </div>
				    <br>
					
					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Photo</label>
  						<input type="file" name="userfile" size="20">
				      <br></div>
				    </div>
					<br>
					
				    <br><br>
				    <button class="btn btn-warning" type="submit">SUBMIT</button>
				    <button class="btn btn-primary" type="submit">DELETE THIS ACCOUNT</button>
				<?php echo form_close(); ?>
			</div>
		</div>
</div>

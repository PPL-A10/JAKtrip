

	<div class="container-fluid">
		<div class="row">
			<header class="headersmall">
				<div class="title">
					<div class="tuffyh1a">Contact Us</div>
				</div>
				
			</header>

			<?php if($this->form_validation->run() == TRUE){
				echo '<div class="col-lg-3"></div>';
				echo '<div class="alert alert-dismissible alert-success col-lg-6" style="text-align: center; margin: 15px;">';
				echo '<button type="button" class="close" data-dismiss="alert">×</button>';
				echo '<strong>Thank you!</strong> You successfully sent your message. </div>';
				echo '<div class="col-lg-3"></div>';
			}
						
			?>
			
			<ul class="subtitle nav navbar-nav">
				<li><p>Send Us a Message</p></li>
				<li><p>Contact Information</p></li>
			</ul>


			<div class="col-lg-12 even">
				<div class="col-lg-1"></div>

				
				<?php 
				$attributes = array('class' => 'contactus col-lg-5');
				echo form_open('feedbackCtr', $attributes); ?>
					<div class="contact form-group">
					  <div class="col-lg-11">
						<label class="control-label">Name</label>
						<?php echo form_error('name'); ?>
  						<input class="form-control" type="text" id="name" name="name" required>
				      </div>
				    </div>
					<br>
				    <div class="contact form-group">
					  <div class="col-lg-11">
						<label class="control-label">Email</label>
						<?php echo form_error('email'); ?>
  						<input class="form-control" type="email" id="email" name="email" required>
				      </div>
				    </div>
				    <br>
				    <div class="contact form-group">
					  <div class="col-lg-11">
						<label class="control-label">Subject</label>
						 <?php echo form_error('dname'); ?>
  						<input class="form-control" type="text" id="subject" name="subject">
				      </div>
				    </div>
				    <br>
				    <div class="contact form-group">
					  <div class="col-lg-11">
						<label class="control-label">Message</label>
						<?php echo form_error('message'); ?>
  						<textarea class="form-control" rows="3" id="textArea" id="message" name="message"></textarea>
				      </div>
				    </div>
				    <br>
				    <button class="btn btn-warning" type="submit">SEND</button>
				    <?php echo form_close(); ?>
				
			</div>
			
		</div>
	</div>
	

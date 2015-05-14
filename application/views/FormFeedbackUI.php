<!--
author: Syifa Khairunnisa
editor: Khusna Nadia

Menampilkan form isian membuat feedback di halaman Contact Us
-->

<div class="container-fluid">
	<div class="row">
		<header class="headersmall">
			<div class="title">
				<div class="tuffyh1a">Contact Us</div>
			</div>

		</header>

		<ul class="subtitle nav navbar-nav">
			<li><p>Send Us a Message</p></li>
			<li><p>Contact Information</p></li>
		</ul>

		<div class="col-lg-12 even">
			<div class="col-lg-1"></div>
			<div class="contactus col-lg-5">
			<?php 
			$attributes = array('id' => 'formfeedback');
			echo form_open('feedbackCtr', $attributes); ?>
				<div class="contact form-group">
				  <div class="col-lg-11">
					<label class="control-label">Name <span class="req">*</span></label>
					<?php echo form_error('name'); ?>
					<input class="form-control" type="text" id="name" name="name" required>
			      </div>
			    </div>
				<br>
			    <div class="contact form-group">
				  <div class="col-lg-11">
					<label class="control-label">Email <span class="req">*</span></label>
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
					<label class="control-label">Message <span class="req">*</span></label>
					<?php echo form_error('message'); ?>
					<textarea class="form-control" rows="3" id="textArea" id="message" name="message" required></textarea>
			      </div>
			    </div>
			    <br>
			    <button class="btn btn-warning" type="submit">SEND</button>
			    <?php echo form_close(); ?>
			</div>
			</div>
			
	</div>
</div>
	
<?php
	if($this->session->flashdata('form')) {
	  $msg = $this->session->flashdata('form');
	  $message = $msg['message'];
	  echo "<script>$(document).ready(function(){notifSuccess('".$message."');});</script>";
	}
?>
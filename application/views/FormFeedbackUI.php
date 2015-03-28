<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<div id="container">
        <?php echo form_open('feedbackCtr'); ?>
        <h1>Feedback</h1><hr/> 
        
        <?php echo form_label('Name'); ?> <?php echo form_error('name'); ?><br />
		<input type="text" name="name">

		<br>
        <?php echo form_label('Email'); ?> <?php echo form_error('email'); ?><br />
		<input type="text" name="email">
		
		<br>
        <?php echo form_label('Subject'); ?> <?php echo form_error('dname'); ?><br />
		<input type="text" name="subject">

		<br>
		<?php echo form_label('Message'); ?> <?php echo form_error('message'); ?><br />
		<textarea name="message" rows="5" cols="40"></textarea>
		
        <input type="submit" value="Submit">
        
        <?php echo form_close(); ?><br/>
		<!--belum ada notifikasi submitted-->

</body>
</html>


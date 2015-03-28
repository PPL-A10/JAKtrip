<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<div id="container">
        <?php echo form_open('tourAttrCtr'); ?>
        <h1>Rating and Review</h1><hr/> 
        
        <?php echo form_label('Rating'); ?> <?php echo form_error('rate'); ?><br />
		<input type="radio" name="rate" value="1"></option>
		<input type="radio" name="rate" value="2"></option>
		<input type="radio" name="rate" value="3"></option>
		<input type="radio" name="rate" value="4"></option>
		<input type="radio" name="rate" value="5"></option>
		</select>

		<br>
        <?php echo form_label('Title'); ?> <?php echo form_error('title'); ?><br />
        <input type="text" name="title">
		
		<br>
        <?php echo form_label('Review'); ?> <?php echo form_error('review'); ?><br />
        <textarea name="review" rows="5" cols="40"></textarea>

		<br>
        <input type="submit" value="Submit">
        
        <?php echo form_close(); ?><br/>
		<!--belum ada notifikasi submitted-->

</body>
</html>


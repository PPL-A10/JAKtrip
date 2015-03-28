<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link href="css/normalize.css" type="text/css" rel="stylesheet"/>
	<link href="css/bootstrap.sandstone.css" type="text/css" rel="stylesheet"/>
	<link href="css/font-awesome.css" type="text/css" rel="stylesheet"/>
	<link href="css/jaktrip.css" type="text/css" rel="stylesheet"/>-->


	<style>
		header{
			background-image: url('img/header.png');
			height: 530px;
		}

		@font-face { 
			font-family: Tuffy; 
			src: url('fonts/Tuffy.otf');
		}

		@font-face { 
			font-family: TuffyBold; 
			src: url('fonts/Tuffy_Bold.otf');
		}

		@font-face { 
			font-family: Lato; 
			src: url('fonts/lato-regular.ttf');
		}

		@font-face { 
			font-family: LatoBlack; 
			src: url('fonts/lato-black.ttf');
		}
	</style>
</head>
<body>

	<div id="container">
        <?php echo form_open('tourAttrCtr'); ?>
        <h1>Rating and Review</h1><hr/> 
        
        <?php echo form_label('Rating'); ?> <?php echo form_error('rate'); ?><br />
        <?php echo form_input(array('id' => 'rate', 'name' => 'rate')); ?><br />

        <?php echo form_label('Title'); ?> <?php echo form_error('title'); ?><br />
        <?php echo form_input(array('id' => 'title', 'name' => 'title')); ?><br />
		
        <?php echo form_label('Review'); ?> <?php echo form_error('review'); ?><br />
        <?php echo form_input(array('id' => 'review', 'name' => 'review')); ?><br />

        <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit'));?>
        
        <?php echo form_close(); ?><br/>

</body>
</html>


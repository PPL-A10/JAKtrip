<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../assets/css/normalize.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/bootstrap.sandstone.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/font-awesome.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/jaktrip.css" type="text/css" rel="stylesheet"/>

	<style>
		header{
			background-image: url('../assets/img/header.png');
			height: 530px;
		}

		@font-face { 
			font-family: Tuffy; 
			src: url('../assets/fonts/Tuffy.otf');
		}

		@font-face { 
			font-family: TuffyBold; 
			src: url('../assets/fonts/Tuffy_Bold.otf');
		}

		@font-face { 
			font-family: Lato; 
			src: url('../assets/fonts/lato-regular.ttf');
		}

		@font-face { 
			font-family: LatoBlack; 
			src: url('../assets/fonts/lato-black.ttf');
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
	      <a class="navbar-brand" href="index.html" style="background-image: url('../assets/img/logo.png')"></a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">Sign Up</a></li>
	        <li><a href="#">Log In</a></li>
	        <li><a href="#">Trip (0)  <span class="fa fa-bus"></span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<div class="container-fluid">
		<div class="row menuhover">			
			<ul class="submenu nav navbar-nav" style="padding-top: 70px;">
				<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
				<li><a class="submenua" href="#">Posts</a>
				</li>
				<li><a class="submenua" href="#">Members</a></li>
		        <li><a class="submenua" href="#">Suggestions</a>
				</li>
		        <li><a class="submenua" href="#">Feedback</a></li>
		        <li><a class="submenua" href="#">Spam</a></li>
		        <li><a class="submenua" href="#">Statistics</a>
				</li>
			</ul>

			<div class="col-lg-12">
				<div class="tuffyh2a admintitle">Add New Post</div>
				<?php
				$attributes = array('class' => 'newpost col-lg-8');
				echo form_open('tourAttrCtr/myform', $attributes); ?>
		
					<div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Title</label>
						<?php echo form_error('place_name'); ?>
  						<input class="form-control" type="text" id="place_name" name="place_name" value="<?php echo set_value('place_name'); ?>" required>
				      <br></div>
				    </div>
					<br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Description</label>
						<?php echo form_error('description'); ?>
  						<textarea class="form-control" rows="3" id="textArea" id="description" name="description" value="<?php echo set_value('description'); ?>" required></textarea>
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Place Information</label>
						<?php echo form_error('place_info'); ?>
  						<input class="form-control" type="text" id="place_info" name="place_info" value="<?php echo set_value('place_info'); ?>" required>
				      <br></div>
				    </div>
				    <br><br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Weekday Price</label>
						<?php echo form_error('weekday_price'); ?>
  						<input class="form-control" type="text" id="weekday_price" name="weekday_price" value="<?php echo set_value('weekday_price'); ?>" required>
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Weekend Price</label>
						<?php echo form_error('weekend_price'); ?>
  						<input class="form-control" type="text" id="weekend_price" name="weekend_price" value="<?php echo set_value('weekend_price'); ?>" required>
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Category</label>
						<?php echo form_error('category_name'); ?>
  						<input class="form-control" type="text" id="category_name" name="category_name" value="<?php echo set_value('category_name'); ?>" required>
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Location</label>
						<?php echo form_error('city'); ?>
  						<input class="form-control" type="text" id="city" name="city" value="<?php echo set_value('city'); ?>" required>
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Photos</label>
						<?php echo form_error('city'); ?>
  						<input class="" type="file" id="pic" name="pic" value="<?php echo set_value('pic'); ?>" required>
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Longitude</label>
						<?php echo form_error('longitude'); ?>
  						<input class="form-control" type="text" id="longitude" name="longitude" value="<?php echo set_value('longitude'); ?>" required>
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Lattitude</label>
						<?php echo form_error('lattitude'); ?>
  						<input class="form-control" type="text" id="lattitude" name="lattitude" value="<?php echo set_value('lattitude'); ?>" required>
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Nearest Bus Stop</label>
						<?php echo form_error('halte_code'); ?>
  						<input class="form-control" type="text" id="halte_code" name="halte_code" value="<?php echo set_value('halte_code'); ?>" required>
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Transportation Info</label>
						<?php echo form_error('transport_info'); ?>
  						<input class="form-control" type="text" id="transport_info" name="transport_info" value="<?php echo set_value('transport_info'); ?>" required>
				      <br></div>
				    </div>
				    <br>
				    <div class="form-group">
					  <div class="col-lg-11">
						<label class="control-label">Transportation Fee</label>
						<?php echo form_error('transport_price'); ?>
  						<input class="form-control" type="text" id="transport_price" name="transport_price" value="<?php echo set_value('transport_price'); ?>" required>
				      <br></div>
				    </div>
				    <br>

				    <button class="btn btn-warning" type="submit">PUBLISH</button>
				    <button class="btn btn-primary" type="submit">SAVE</button>
				    
				<?php echo form_close(); ?>
			</div>


			
		</div>
	</div>

<footer>
		<div class="container-fluid">
			<div class="col-lg-12">
					<div class="col-md-1"><img src="../assets/img/logo2.png" class="img-responsive" /></div>
					<div class="row">
						<span class="tuffyh3 col-md-6">Explore fun places within your budget in Jakarta</span>
						<ul class="linkfooter nav navbar-nav navbar-left col-md-6">
							<li><a class="linkfooter" href="about.html">About</a></li>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">F.A.Q</a></li>
							<li><a href="#">Terms</a></li>
							<li><a href="#">Privacy</a></li>
							<li><a href="#">Site Map</a></li>
							<li><a href="#">Mobile</a></li>
						</ul>
					</div>
			<div>
		</div>
	</footer>

	<script src="../assets/js/jquery-1.11.0.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/jaktrip.js"></script>
    <script>
    $(document).ready(function () {
            
            $('.submenua').click(function(e){
			    $('.submenua').css("color", "#1c1c1c");
			    $('.submenua').css("padding-bottom", "");
			    $('.submenua').css("border-bottom", "");
			    $(this).css("color", "#db2719");  
			    $(this).css("padding-bottom", "15px");
			    $(this).css("border-bottom", "solid 5px #db2719");
			});
        });
    	
    </script>
</body>
</html>
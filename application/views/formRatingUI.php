<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link href="css/normalize.css" type="text/css" rel="stylesheet"/>
	<link href="css/bootstrap.sandstone.css" type="text/css" rel="stylesheet"/>
	<link href="css/font-awesome.css" type="text/css" rel="stylesheet"/>
	<link href="css/jaktrip.css" type="text/css" rel="stylesheet"/>-->
	<link  rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/normalize.css" />
	<link  rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.sandstone.css" />
	<link  rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.css" />
	<link  rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jaktrip.css" />
	<link  rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/rating.css" />

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
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
	      <a class="navbar-brand" href="index.html" style="background-image: <?php echo base_url(); ?>img/logo.png"></a>
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
				<form class="contactus col-lg-5" data-toggle="validator" role="form">
					<div class="contact form-group">
					  <div class="col-lg-11">
						<!--<?php echo form_label('Rating'); ?> <?php echo form_error('rate'); ?><br />
						<?php echo form_input(array('id' => 'rate', 'name' => 'rate')); ?><br />-->
						<span class="star-rating">
						  <input type="radio" name="rating" value="1"><i></i>
						  <input type="radio" name="rating" value="2"><i></i>
						  <input type="radio" name="rating" value="3"><i></i>
						  <input type="radio" name="rating" value="4"><i></i>
						  <input type="radio" name="rating" value="5"><i></i>
						</span>
						<strong class="choice">Choose a rating</strong>
				      </div>
				    </div>
					<br>
				    <div class="contact form-group">
					  <div class="col-lg-11">
						<?php echo form_label('Title'); ?> <?php echo form_error('title'); ?><br />
						<?php echo form_input(array('id' => 'title', 'name' => 'title')); ?><br />
				      </div>
				    </div>
				    <br>
				    <div class="contact form-group">
					  <div class="col-lg-11">
						<?php echo form_label('Review'); ?> <?php echo form_error('review'); ?><br />
						<?php echo form_input(array('id' => 'review', 'name' => 'review')); ?><br />
				      </div>
				    </div>
				    <br>
				    <div class="contact form-group">
					  <div class="col-lg-11">
						<?php echo form_error('message'); ?><br />
						<?php echo form_input(array('id' => 'message', 'name' => 'message')); ?><br />
				      </div>
				    </div>
				    <br>
				    <button class="btn btn-warning" type="submit" id='submit'></button>
					<button class="btn btn-warning" type="submit">SUBMIT</button>
					
				</form>
			</div>
			
		</div>
	</div>
	
	<footer>
		<div class="container-fluid">
			<div class="col-lg-12">
					<div class="col-md-1"><img src="<?php echo base_url(); ?>img/logo2.png" class="img-responsive" /></div>
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

	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jaktrip.js"></script>
    <script type="text/javascript">
	
        // When the document is ready
        $(document).ready(function () {
            
            $('.contactus').validator();
        
        });
    </script>
</body>
</html>
</html>
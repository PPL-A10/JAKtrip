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
						<!--<label class="control-label">Name</label>
  						<input class="form-control" type="text" required>-->
						<?php echo form_label('Name'); ?> <?php echo form_error('name'); ?><br />
						<?php echo form_input(array('id' => 'name', 'name' => 'name')); ?><br />
				      </div>
				    </div>
					<br>
				    <div class="contact form-group">
					  <div class="col-lg-11">
						<!--<label class="control-label">Email</label>
  						<input class="form-control" type="email" required>-->
						<?php echo form_label('Email'); ?> <?php echo form_error('email'); ?><br />
						<?php echo form_input(array('id' => 'email', 'name' => 'email')); ?><br />
				      </div>
				    </div>
				    <br>
				    <div class="contact form-group">
					  <div class="col-lg-11">
						<!--<label class="control-label">Subject</label>
  						<input class="form-control" type="text">-->
						<?php echo form_label('Subject'); ?> <?php echo form_error('dname'); ?><br />
						<?php echo form_input(array('id' => 'subject', 'name' => 'subject')); ?><br />
				      </div>
				    </div>
				    <br>
				    <div class="contact form-group">
					  <div class="col-lg-11">
						<!--<label class="control-label">Message</label>
  						<textarea class="form-control" rows="3" id="textArea"></textarea>-->
						<?php echo form_error('message'); ?><br />
						<?php echo form_input(array('id' => 'message', 'name' => 'message')); ?><br />
				      </div>
				    </div>
				    <br>
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
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" type="image/x-icon" 
	href="<?php echo base_url('assets/img/logo2.png');?>" />

	<link href="<?php echo base_url('assets/css/normalize.css');?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/bootstrap.sandstone.css'); ?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/bootstrap-datepicker3.css');?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/font-awesome.css');?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/jaktrip.css');?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/ion.rangeSlider.skinFlat.css');?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/ion.rangeSlider.css');?>" type="text/css" rel="stylesheet"/>

	<title> JAKtrip: Explore fun places within your budget in Jakarta</title>

	<style>
		header{
			background-image: url('<?php echo base_url("assets/img/header.png");?>');
			height: 530px;
		}

		@font-face { 
			font-family: Tuffy; 
			src: url('<?php echo base_url("assets/fonts/Tuffy.otf");?>');
		}

		@font-face { 
			font-family: TuffyBold; 
			src: url('<?php echo base_url("assets/fonts/Tuffy_Bold.otf");?>');
		}

		@font-face { 
			font-family: Lato; 
			src: url('<?php echo base_url("assets/fonts/lato-regular.ttf");?>');
		}

		@font-face { 
			font-family: LatoBlack; 
			src: url('<?php echo base_url("assets/fonts/lato-black.ttf");?>');
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
	      <a class="navbar-brand" href="index.html" style="background-image: url(<?php echo base_url('assets/img/logo.png');?>"></a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
        	<li>&nbsp;&nbsp;&nbsp;</li>
        	<li><a href="<?php echo base_url('allPlacesUI');?>">PLACES</a></li>
        	<li><a href="#">PROMO</a></li>
          </ul>

	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">Sign Up</a></li>
	        <!--<?php
				//if(isset($_COOKIE["username"]))
				{

				//	echo "<li><a href='http://localhost/Jaktrip/index.php/searchCtr/logout'>Selamat datang ".$_COOKIE['username']."</a></li>";	
				}
				//else
				{
				//	echo "<li><a href='#openLogin'>Log In</a></li>";
				}
			?>-->
	        <li><a href="#openLogin">Log In</a></li>
		        <div id="openLogin" class="openModal">
		        	<div>
						<a href="#close" title="Close" class="close"><span class="fa fa-times"></span></a>
						<center><div class="tuffyh2a">Log In to JAKtrip</div></center><br>

						<form role="form" class="form-group">
							<input class="form-control form-group" type="email" placeholder="E-mail" required>
							<input class="form-control form-group" type="password" placeholder="Password" required>
							<span class="col-lg-6"><input type="checkbox" name="remember"> Remember me</span>
							<span class="col-lg-6" style="text-align: right;"><a href="#">Forgot password?</a></span><br><br>
							<button class="login btn btn-warning" type="submit">LOG IN</button><br><br>
							<center>Or login with your account below<center><br>
							<div class="iconsocial">
								<a href=""><span class="fa fa-google-plus-square" style="color: #E03F3F;"></span></a>
								<a href=""><span class="fa fa-facebook-square" style="color: #43468C;"></span></a>
								<a href=""><span class="fa fa-twitter-square" style="color: #2EA0F2;"></span></a>
							</div>
							<br>
							<center>Don't have an account? <a href="">Sign Up.</a><center>
						</form>
					</div>
		        </div>
	        <li><a href="#">Trip (0)  <span class="fa fa-bus"></span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
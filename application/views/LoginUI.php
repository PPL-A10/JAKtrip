<!DOCTYPE html>
<html lang="en">
<head>
	<link href="../assets/css/normalize.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/bootstrap.sandstone.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/bootstrap-datepicker3.css" type="text/css" rel="stylesheet"/>
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
	        <li><a href="#openLogin">Log In</a></li>
	        <li><a href="#">Trip (0)  <span class="fa fa-bus"></span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<div class="container-fluid">

		<div class="col-lg-3">
		</div>		
		<div class="row">	
		<div class="alert alert-dismissible alert-danger col-lg-6" style="text-align: center; margin-top: 100px; margin-bottom: -50px;">
				<button type="button" class="close" data-dismiss="alert" style="color: #fff !important">×</button>
				<strong>Ooops!</strong> The username and password you entered did not match our records. Please try again.</div>
				</div>
		<div class="col-lg-4"></div>
		<div class="col-lg-4 formlogin">		
				<center><div class="tuffyh2a">Log In to JAKtrip</div></center><br>
				<form role="form" class="form-group">
					<input class="form-control form-group" type="email" placeholder="E-mail" required>
					<input class="form-control form-group" type="password" placeholder="Password" required>
					<span class="col-lg-5"><input type="checkbox" name="remember"> Remember me</span>
					<span class="col-lg-2"></span>
					<span class="col-lg-5"><a href="#">Forgot password?</a></span><br><br>
					<button class="login btn btn-warning" type="submit">LOG IN</button><br><br>
					<center>Or login with your account below<center><br>
					<div class="iconsocial">
						<span class="fa fa-google-plus-square" style="color: #E03F3F;"></span>
						<span class="fa fa-facebook-square" style="color: #43468C;"></span>
						<span class="fa fa-twitter-square" style="color: #2EA0F2;"></span>
					</div>
					<br>
					<center>Don't have an account? <a href="">Sign Up.</a><center>
				</form>
		</div>
		</div>
		<div class="col-lg-4">
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
			</div>
		</div>
	</footer>

	<script src="../assets/js/jquery-1.11.0.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/jaktrip.js"></script>
	<script src="../assets/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {
            
            $('.datepicker').datepicker({
                format: "dd/mm/yyyy"
            });  
        
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../assets/css/normalize.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/bootstrap.sandstone.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/bootstrap-datepicker3.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/font-awesome.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/jaktrip.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/ion.rangeSlider.skinFlat.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/ion.rangeSlider.css" type="text/css" rel="stylesheet"/>

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
		<div class="col-lg-6" >
			<div class="tuffyh2a viewbox">View Trip</div>
			<div style="margin-left: 40px; margin-bottom: 80px;">
				<table style="margin-bottom: 10px;">
					<tr>
						<td rowspan="5" style="background-color:#db2719; width: 30px; color: #fff; text-align: center; margin-top: 10px"><b>1</b></td>
						<td rowspan="5"><img src="../assets/img/150.jpg"/></td>
						<td height="30px" class="tuffyh3a">Ice Age Arctic Adventure</td>
					</tr>
					<tr>
						<td height="30px">Rp 25000 - 15 min - Indoor Play</td>
					</tr>
					<tr>
						<td valign="top" rowspan="3" height="90px">1. Naik busway dmwdmwd odwdijwqodj <br>2. Jalan kaki 0.4 km ke arah barat</td>
					</tr>
				</table>

				<table style="margin-bottom: 10px;">
					<tr>
						<td rowspan="5" style="background-color:#db2719; width: 30px; color: #fff; text-align: center; margin-top: 10px"><b>2</b></td>
						<td rowspan="5"><img src="../assets/img/150.jpg"/></td>
						<td height="30px" class="tuffyh3a">Ice Age Arctic Adventure</td>
					</tr>
					<tr>
						<td height="30px">Rp 25000 - 15 min - Indoor Play</td>
					</tr>
					<tr>
						<td valign="top" rowspan="3" height="90px">1. Naik busway dmwdmwd odwdijwqodj <br>2. Jalan kaki 0.4 km ke arah barat</td>
					</tr>
				</table>
			</div>
		</div>

		
		<div class="total">
			&nbsp;&nbsp;&nbsp; Total : Rp 25000<br>
			&nbsp;&nbsp;&nbsp; Balance : Rp 20000
		</div>
		
		<div class="col-lg-4"></div>
		<button class="btn btn-warning col-lg-4" type="submit" style="font-size: 14px; ">SAVE TO MY TRIPS</button>
		<div class="col-lg-4"></div>

	<div class="col-lg-6"></div>
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
	<script src="../assets/js/ion.rangeSlider.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/jaktrip.js"></script>
	<script src="../assets/js/bootstrap-datepicker.min.js"></script>
	<script src="../assets/js/gmaps.js"></script>
    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {
            
            $('.datepicker').datepicker({
                format: "dd/mm/yyyy"
            });  

        });

        $(function () {

	        $(".range").ionRangeSlider({
	            hide_min_max: true,
	            keyboard: true,
	            min: 0,
	            max: 500000,
	            from: 10000,
	            to: 75000,
	            type: 'double',
	            step: 500,
	            prefix: "Rp ",
	            grid: true
	        });

	    });
    </script>

  
</body>
</html>
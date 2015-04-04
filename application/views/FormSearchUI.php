<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://localhost/Jaktrip/assets/css/normalize.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/bootstrap.sandstone.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/bootstrap-datepicker3.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/font-awesome.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/jaktrip.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/ion.rangeSlider.skinFlat.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/ion.rangeSlider.css" type="text/css" rel="stylesheet"/>

	<style>
		header{
			background-image: url('http://localhost/Jaktrip/assets/img/header.png');
			height: 530px;
		}

		@font-face { 
			font-family: Tuffy; 
			src: url('http://localhost/Jaktrip/assets/fonts/Tuffy.otf');
		}

		@font-face { 
			font-family: TuffyBold; 
			src: url('http://localhost/Jaktrip/assets/fonts/Tuffy_Bold.otf');
		}

		@font-face { 
			font-family: Lato; 
			src: url('http://localhost/Jaktrip/assets/fonts/lato-regular.ttf');
		}

		@font-face { 
			font-family: LatoBlack; 
			src: url('http://localhost/Jaktrip/assets/fonts/lato-black.ttf');
		}
	</style>
</head>

<div id="openLogin" class="openModal">
	<div>
		<a href="#close" title="Close" class="close"><span class="fa fa-times"></span></a>
		<center><div class="tuffyh2a">Log In to JAKtrip</div></center><br>

		<form role="form" class="form-group" method="POST" action="http://localhost/Jaktrip/index.php/loginCtr/checkLogin">
			<input class="form-control form-group" type="text" placeholder="username/E-mail" name="username" required>
			<input class="form-control form-group" type="password" placeholder="Password" name="password" required>
			<span class="col-lg-6"><input type="checkbox" name="remember"> Remember me</span>
			<span class="col-lg-6"><a href="#">Forgot password?</a></span><br><br>
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

<div id="myModal" class="modal fade" role="dialog"  aria-labelledby="basicModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
        		<div class="modal-header">
	                <h4 class="modal-title">How many budget do you have?</h4>
	            </div>
	            <div class="modal-body">
	                <input id="inputBudget"type="text" class="form-control" placeholder="Your budget" onkeydown="if (event.keyCode == 13) document.getElementById('saveInputBudget').click()">
	            </div>
	            <div class="modal-footer">
	                <button id="saveInputBudget" type="button" class="btn btn-primary">Save changes</button>
	            </div>
        </div>
    </div>
</div>

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
	        <?php
				if(isset($_COOKIE["username"]))
				{

					echo "<li><a href='http://localhost/Jaktrip/index.php/searchCtr/logout'>Selamat datang ".$_COOKIE['username']."</a></li>";	
				}
				else
				{
					echo "<li><a href='#openLogin'>Log In</a></li>";
				}
			?>
	        
	        <li><a href="#">Trip (0)  <span class="fa fa-bus"></span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>


	<div class="col-lg-6">
		<div class="row">

			<div class="searchbox">
				<form class="form-horizontal">
					<div class="form-inline">
						<label class="col-lg-2 control-label">Going from </label>
						<span class="fieldsml custom-dropdown ">
						    <select class="fieldsml form-control" title="Nearest bus stop?">    
						        <option value="" selected disabled>Nearest bus stop?</option>
						        <option value="">Sarinah</option>  
						        <option value="">Gelora Bung Karno</option>
						        <option value="">Atrium</option>
						        <option value="">Bank Indonesia</option>
						    </select>
						</span>

						<span class="input-group col-lg-3">
						    <span class="fieldsml input-group-addon">Rp</span>
						    <input class="fieldsml form-control" type="text" style="width: 93%;" value="200000"placeholder="Budget">
					    </span>

					    <span class="input-group col-lg-3">
					 		<input class="fieldsml small datepicker" id="datepicker" type="text" placeholder="Date" style="margin-left: 2px;">
					    </span>
				    </div>

				    <div class="form-inline">
						<label class="col-lg-2 control-label">Filter by </label>
						<span class="fieldsml custom-dropdown ">
						    <select class="fieldsml form-control" title="All Categories">    
						        <option value="" selected disabled>All Categories</option>
						        <option value="">Sarinah</option>  
						        <option value="">Gelora Bung Karno</option>
						        <option value="">Atrium</option>
						        <option value="">Bank Indonesia</option>
						    </select>
						</span>

						<span class="fieldsml custom-dropdown ">
						    <select class="fieldsml form-control" title="All Location" style="margin-left: -10px;">    
						        <option value="" selected disabled>All Location</option>
						        <option value="">Sarinah</option>  
						        <option value="">Gelora Bung Karno</option>
						        <option value="">Atrium</option>
						        <option value="">Bank Indonesia</option>
						    </select>
						</span>

					    <span class="input-group col-lg-3">
						    <input class="fieldsml form-control" type="text" placeholder="Enter keyword..." style="width:162%;">
						    <span class="input-group-btn">
						      <button class="fieldsml btn btn-default" type="button" style="width:40%; margin-left: 65%; padding-left: 20px; padding-right: 20px;"><span class="fa fa-search"></span></button>
						    </span>
					    </span>
				    </div>

				    <div class="form-inline" style="margin-top: 10px;">
						<label class="col-lg-2 control-label">Price range </label>
						<div style="position: relative; padding-right: 27px; padding-left: 122px;">
							<input type="text" class="col-lg-9 range" name="range" value="" />
							<div class="col-lg-3"></div>
						</div>
					</div>
				</form>
			</div>

			<div class="searchres">
				<div class="row">
					<div class="col-lg-5 result">Show all places in Jakarta</div>
					<div class="col-lg-2"></div>
				
					<div class="col-lg-5 form-inline" style="margin-right: -150px;">
						<label class="control-label">Sort by </label>
						<span class="fieldsml custom-dropdown bordered">
						    <select class="fieldsml form-control" title="Popularity">    
						        <option value="" selected>Popularity</option>  
						        <option value="">Highest Rating</option>
						        <option value="">Name: A-Z</option>
						        <option value="">Name: Z-A</option>
						        <option value="">Price: Low to High</option>
						        <option value="">Price: High to Low</option>
						    </select>
						</span>
					</div>
					<div class="col-lg-11">
						<?php
							echo "<table class='table table-hover'>";

							foreach ($query as $row) {
								# code...
								if($isWeekend==true)
								{
									$priceDet = $row->weekend_price." (weekend price)";
									$price = $row->weekend_price;
								}
								else
								{
									$priceDet = $row->weekday_price." (weekday price)";
									$price = $row->weekday_price;
								}

								if($row->halte_code == $halte_code)
								{
									echo "<tr><td style='width:100px;'><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>".$row->place_name."<br><p>halte ".$row->halte_name."</p><p>".$priceDet."</p><p>rating = ".$row->rate_avg."/5</p><button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\"".$row->place_name."\" onclick=\"addTrip(".$price.",'".$row->place_name."' , '".$row->halte_name."')\"".$row->place_name."\">".$price."</button><br><a class='toZoom' onclick='return setMapLocationZoom(\"".$row->place_name."\")'>see location in map<a></td></tr>";
								}
								else
								{
									echo "<tr><td style='width:100px;'><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>".$row->place_name."<br><p>halte ".$row->halte_name."</p><p>".$priceDet." + 3000 (busway) = ".(intval($price) + 3500 )."</p><p>rating = ".$row->rate_avg."/5</p><button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\"".$row->place_name."\" onclick=\"addTrip(".$price.",'".$row->place_name."')\"".$row->place_name."\">".$price."</button><br><a class='toZoom' onclick='return setMapLocationZoom(\"".$row->place_name."\")'>see location in map<a></td></tr>";
								}
							//	echo "<tr><td style='width:100px;'><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>".$row->place_name."<br>".$row->weekday_price."<br><button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\"".$row->place_name."\" onclick=\"addTrip(".$row->weekday_price.",'".$row->place_name."')\"".$row->place_name."\">".$row->weekday_price."</button><br><a class='toZoom' onclick='return setMapLocationZoom(\"".$row->place_name."\")'>see location in map<a></td></tr>";
							}
							echo "</table>";
						?>
						
					</div>


				</div>
			</div>
		</div>

	</div>

	<div class="col-lg-6" id="mapcanvas">
	</div>
	
	<footer>
		<div class="container-fluid">
			<div class="col-lg-12">
					<div class="col-md-1"><img src="http://localhost/Jaktrip/assets/img/logo2.png" class="img-responsive" /></div>
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

	<script src="http://localhost/Jaktrip/assets/js/jquery-1.11.0.min.js"></script>
	<script src="http://localhost/Jaktrip/assets/js/ion.rangeSlider.min.js"></script>
	<script src="http://localhost/Jaktrip/assets/js/bootstrap.min.js"></script>
	<script src="http://localhost/Jaktrip/assets/js/jaktrip.js"></script>
	<script src="http://localhost/Jaktrip/assets/js/bootstrap-datepicker.min.js"></script>
	<script src="http://localhost/Jaktrip/assets/js/gmaps.js"></script>
   
    
    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {
            
            $('.datepicker').datepicker({
                format: "dd/mm/yyyy"
            });  

         //   $("#myModal").modal('show');

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

    <script>
      function initialize() {
        var mapCanvas = document.getElementById('mapcanvas');
        var mapOptions = {
          center: new google.maps.LatLng(-6.190035, 106.838075),
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <script>
    	function addTrip(x,y){		
			var budget = parseInt(x);
			tripCost = tripCost + budget;
			budget = parseInt($('input#inputBudgetDinamic').val()) - parseInt(x);
			$('input#inputBudgetDinamic').val(budget);
			showTheSuggestionList(budget);
			
			var tempmarker = gmarkers[searchIndexListTourAttr(y)];
			tempmarker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png');
			var ditambahkan = y ;
			arrayTripChoosen.push(ditambahkan);
			arrayTripPriceChoosen.push(parseInt(x));

			showTheItinerary();
			$("#showSuccess").html("you success adding " + y +" to your itinerary");
			$("#alertAddItinerary").modal('show');
			$("#confirmSuccessAddItinerary").unbind().click(function(){
				var popover = $('.buttonAtasToggle').data('popover');
	  			$('[data-toggle="popover"]').popover('show');
			});
		}

		function showTheSuggestionList(budget, halte)
			{
				jQuery.ajax({
			        type: "POST",
			        url: "http://localhost/Jaktrip/index.php/tesController/setVariable/"+budget + "/" +halte,
			        success: function(res) {
			            if (res)
			            {
			            	var obj = jQuery.parseJSON(res);
			         		var hasilPemilihan = "";
			         		hasilPemilihan = "<table class='table'>";
			         		
			            	for(var i = 0; i<obj.query.length; i++)
			            	{
			         				var sudahDipilih = false;
			         				for(var j = 0; j<arrayTripChoosen.length; j++)
			         				{
			         					if(obj.query[i].place_name == arrayTripChoosen[j])
			         					{
			         						sudahDipilih = true;
			         					}
			         				}
			         				if(!sudahDipilih)
			         				{
			         					hasilPemilihan = hasilPemilihan + "<tr><td style='width:100px;'><img src='../assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query[i].place_name+"<br>"+obj.query[i].weekday_price+"<br><button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\""+obj.query[i].place_name+"\" onclick=\"addTrip("+obj.query[i].weekday_price+",'"+obj.query[i].place_name+"')\""+obj.query[i].place_name+"\">"+obj.query[i].weekday_price+"</button><br><a class='toZoom' onclick='return setMapLocationZoom(\""+obj.query[i].place_name+"\")'>see location in map<a></td></tr>";
			         				}
			            	}
			            	hasilPemilihan = hasilPemilihan + "</table>";
			            	$("#blogMain").html(hasilPemilihan);

			            }
	                }
	            });
			}
    </script>
  
</body>
</html>
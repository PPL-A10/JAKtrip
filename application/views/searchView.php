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


	<div class="col-lg-6">
		<div class="row">

			<div class="searchbox">
				<form class="form-horizontal">
					<div class="form-inline">
						<label class="col-lg-2 control-label">Going from </label>
						<span class="fieldsml custom-dropdown " id="ddcontainer">
						    <select class="fieldsml form-control" id="ddbus" title="Nearest bus stop?">    
						        <option value="" selected disabled>Nearest bus stop?</option>
								<?php
									foreach($query3 as $row)
									{
										echo "<option value='".halte_name."'>".$row->halte_name."</option>";
									}
								?>
						    </select>
						</span>

						<span class="input-group col-lg-3">
						    <span class="fieldsml input-group-addon">Rp</span>
						    <input class="fieldsml form-control" type="text" style="width: 83%;" placeholder="Budget">
					    </span>

					    <span class="input-group col-lg-3">
					 		<input class="fieldsml small datepicker" type="text" placeholder="Date" style="margin-left: 2px;">
					    </span>
				    </div>

				    <div class="form-inline">
						<label class="col-lg-2 control-label">Filter by </label>
						<span class="fieldsml custom-dropdown ">
						    <select class="fieldsml form-control" onchange="filterFunction()" title="All Categories" id="category_select">    
						        <option value="" selected disabled>All Categories</option>
								<?php
									foreach($query1 as $row)
									{
										echo "<option value='".$row->category_name."'>".$row->category_name."</option>";
									}
								?><!--option value="">Sarinah</option>  
						        <option value="">Gelora Bung Karno</option>
						        <option value="">Atrium</option>
						        <option value="">Bank Indonesia</option-->
						    </select>
						</span>

						<span class="fieldsml custom-dropdown ">
						    <select class="fieldsml form-control" onchange="filterFunction()" title="All Location" id="location_select" style="margin-left: -10px;">    
						        <option value="" selected disabled>All Location</option>
						        <?php
									foreach($query2 as $row)
									{
										echo "<option value='".$row->city."'>".$row->city."</option>";
									}
								?>
						    </select>
						</span>

					    <span class="input-group col-lg-3">
						    <input class="fieldsml form-control" type="text" placeholder="Enter keyword..." id="name_select" style="width:162%;">
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
					<div class="col-lg-5 result" id="output_field">		
					
					<?php
							
							echo "<table border='1'>";
							foreach($query as $row)
							{
								echo "<tr>";
							//	echo "<td>".$row->category_name."</td>" ;
								echo "<td>".$row->place_name."</td>" ;
								//echo "<td>".$row->description."</td>" ;
								echo "</tr>";
								
							}
							echo "</table>";
	
					?>
					</div>
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
					


				</div>
			</div>
		</div>

	</div>

	<div class="col-lg-6" id="mapcanvas">
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
function myFunction() {
    var x = document.getElementById("mySelect").value;
    document.getElementById("output_field").innerHTML = "You selected: " + x;
}
</script>
  
	<script>
	function filterFunction(){
		
		//document.getElementById("output_field").innerHTML = "You selected: 1dfsdsdfgdfgdfgdfvbdfgbffvbfgbb" ;
		
		var x = document.getElementById("category_select").value;
		var y = document.getElementById("location_select").value;
		var z = document.getElementById("name_select").value;
		
		
		jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/searchCont/searchwisataCat/"+x,
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";
								for (var i=0 ; i<obj.query.length; i++){
									resultQuery = resultQuery + "<p>"+obj.query[i].place_name+"</p><br>";
								}
								
								$("#output_field").html(resultQuery);
				            }
							
				            }
                        }
                    );
	}
	</script>
  
</body>
</html>
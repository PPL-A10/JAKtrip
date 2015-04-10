<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="http://localhost/Jaktrip/assets/bootstrap/css/bootstrap.css"/>
	<link href="http://localhost/Jaktrip/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
	<link href="http://localhost/Jaktrip/assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen"/>
	<link href="http://localhost/Jaktrip/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen"/>

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	<link href="http://localhost/Jaktrip/assets/css/normalize.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/bootstrap.sandstone.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/bootstrap-datepicker3.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/font-awesome.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/jaktrip.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/ion.rangeSlider.skinFlat.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/ion.rangeSlider.css" type="text/css" rel="stylesheet"/>
	
	<script src="http://localhost/Jaktrip/assets/js/jquery-1.11.0.min.js"></script>
	<script src="http://localhost/Jaktrip/assets/js/ion.rangeSlider.min.js"></script>
	<script src="http://localhost/Jaktrip/assets/js/bootstrap.min.js"></script>
	<script src="http://localhost/Jaktrip/assets/js/jaktrip.js"></script>
	<script src="http://localhost/Jaktrip/assets/js/bootstrap-datepicker.min.js"></script>
	<script src="http://localhost/Jaktrip/assets/js/gmaps.js"></script>
   <!--script src="http://localhost/Jaktrip/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="http://localhost/Jaktrip/assets/bootstrap/js/bootstrap.js"></script>
	<script src="http://localhost/Jaktrip/assets/bootstrap/js/jquery-1.11.2.js"></script>
	<script src="http://localhost/Jaktrip/assets/bootstrap/js/bootstrap1.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script-->
	<!--link rel="stylesheet" href="http://localhost/Jaktrip/assets/bootstrap/css/bootstrap.css"/>
	<link href="http://localhost/Jaktrip/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
	<link href="http://localhost/Jaktrip/assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen"/>
	<link href="http://localhost/Jaktrip/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen"/>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	<script src="http://localhost/Jaktrip/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="http://localhost/Jaktrip/assets/bootstrap/js/bootstrap.js"></script>
	<script src="http://localhost/Jaktrip/assets/bootstrap/js/jquery-1.11.2.js"></script>
	<script src="http://localhost/Jaktrip/assets/bootstrap/js/bootstrap1.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script-->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {
        	 showTheItinerary();
    //      	 $(".collapse").collapse()
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
    	var arrayTripChoosen = [];
		var arrayTripPriceChoosen =[];
		var tripCost = 0;
		var AllTourAttr = [];
		var gmarkers = [];
		var indexMarkerChoosen = -1;
		var current_halte = ":P";
		var arrayTransport_info = [];
		var countTrip = 0;
		var arrayHalteChoosen = [];
		var indexCurrentHalte = -1;
		var arrayIsJalan = [false,false,false,false,false,false];
		var arrayPlaceInfo = [];
		var arrayAngkotBefore = [];
		var firstHalte = "";
    	function addTrip(price,transport_price,place_name,halte_name,transport_info,place_info){		
			
    		current_halte = $('#current_halte').val();
    		if(countTrip == 0)
    		{
    			firstHalte = current_halte;
    		}

    		var budgetNeeded = 0;
    		if(halte_name == current_halte)
    		{
    			budgetNeeded = parseInt(price) + parseInt(transport_price);
    		}
    		else
    		{
    			budgetNeeded = parseInt(price) + parseInt(transport_price) + 3500;
    		}
			
			tripCost = tripCost + price;
			var budgetRemains = parseInt($('input#input_price').val()) - price;
			$('input#input_price').val(budgetRemains);
			arrayTripChoosen.push(place_name);
			arrayTripPriceChoosen.push(price);
			arrayHalteChoosen.push(halte_name);
			arrayPlaceInfo.push(place_info);
			arrayAngkotBefore.push(transport_price);
			
			
			
			if(countTrip != 1)
			{
				if(place_info == arrayPlaceInfo[indexCurrentHalte])
				{
					arrayIsJalan[indexCurrentHalte] = true;
				}	
			}
			// arrayTransport_info.push(transport_info);
			// alert("indexCurrentHalte : " + indexCurrentHalte);
			// alert("arrayTripChoosen : " + arrayTripChoosen);
			// alert("arrayTripPriceChoosen : " + arrayTripPriceChoosen);
			// alert("arrayHalteChoosen : " + arrayHalteChoosen);
			// alert("arrayTransport_info : " + arrayTransport_info);
			// alert("arrayPlaceInfo : " + arrayPlaceInfo);
			// alert("arrayIsJalan : " + arrayIsJalan);
			
			showTheSuggestionList(budgetRemains, halte_name);
			
			showTheItinerary();
			$('#current_halte').val(halte_name);

			if(indexCurrentHalte == arrayTripChoosen.length-1)
			{
				indexCurrentHalte++;	
			}
			else
			{
				indexCurrentHalte = arrayTripChoosen.length-1;
			}

			for(var i=0; i<arrayTripChoosen.length; i++)
			{
				alert(arrayTripChoosen[i] + " , " + arrayTripPriceChoosen[i] + " , " + indexCurrentHalte);
			}

			
			// var tempmarker = gmarkers[searchIndexListTourAttr(y)];
			// tempmarker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png');
			// var ditambahkan = y ;
			// arrayTripChoosen.push(ditambahkan);
			// arrayTripPriceChoosen.push(parseInt(x));

			// showTheItinerary();
			// $("#showSuccess").html("you success adding " + y +" to your itinerary");
			// $("#alertAddItinerary").modal('show');
			// $("#confirmSuccessAddItinerary").unbind().click(function(){
			// 	var popover = $('.buttonAtasToggle').data('popover');
	  // 			$('[data-toggle="popover"]').popover('show');
			// });
		}
		function collapseMap()
		{
			$("#mapcanvas").hide();
	//		alert("ya");
		}
		function showTheSuggestionList(budget, halte)
			{

				jQuery.ajax({
			        type: "POST",
			        url: "http://localhost/Jaktrip/index.php/searchCtr/searchWithinBudget/"+budget + "/",
			        success: function(res) {
			            if (res)
			            {
			       
			            	var obj = jQuery.parseJSON(res);
			            	alert("countTrip : " + countTrip);
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
			         					var hargaAngkot = parseInt(arrayAngkotBefore[indexCurrentHalte]);
			         					
			         					var hargaBusway = 3500;
			         					var hargaTiket = -1;
			         					var priceDet = "";
			         					var price = 0;
			         					if(obj.isWeekend == false)
			         					{
			         						hargaTiket = parseInt(obj.query[i].weekend_price);
			         						priceDet = priceDet + hargaTiket + " (weekend price)";
			         					}
			         					else
			         					{
			         						hargaTiket = parseInt(obj.query[i].weekday_price);
			         						priceDet = priceDet + hargaTiket + " (weekday price)";
			         					}
			         					var hargaAngkotKeTempatWisata = parseInt(obj.query[i].transport_price);
			         					
			         					if(countTrip == 0)
			         					{
			         					//	alert("current halte : " + current_halte);
			         				//		alert("arrayTripChoosen : "+ arrayTripChoosen +" , arrayAngkotBefore : " + arrayAngkotBefore + " , indexCurrentHalte : " + indexCurrentHalte + " , arrayPlaceInfo : "+ arrayPlaceInfo+" , arrayHalteChoosen : "+arrayHalteChoosen+"  , placeinfo : " + obj.query[i].place_info + " , halte_name : " + obj.query[i].halte_name);
			         						if(firstHalte == obj.query[i].halte_name)
			         						{
			         							hargaBusway = 0;
			         						}
			         					}
			         					else
			         					{
			         				//		alert("arrayTripChoosen : "+ arrayTripChoosen +" , arrayAngkotBefore : " + arrayAngkotBefore + " , indexCurrentHalte : " + indexCurrentHalte + " , arrayPlaceInfo : "+ arrayPlaceInfo+" , arrayHalteChoosen : "+arrayHalteChoosen+"  , placeinfo : " + obj.query[i].place_info + " , halte_name : " + obj.query[i].halte_name);
			         						if(arrayPlaceInfo[indexCurrentHalte]==obj.query[i].place_info)
			         						{
				         						hargaAngkot = 0;
				         						hargaBusway = 0;
				         						hargaAngkotKeTempatWisata = 0;
				         			//			alert("info sama : " + obj.query[i].place_info + ", indexCurrentHalte = " + indexCurrentHalte);
				         					}
				         					else if (arrayHalteChoosen[indexCurrentHalte]==obj.query[i].halte_name)
				         					{
				         						hargaBusway = 0;
				         				//		alert("halte sama : " + obj.query[i].halte_name + ", indexCurrentHalte = " + indexCurrentHalte);
				         					}
			         					}
			         					price = hargaTiket + hargaAngkot + hargaBusway + hargaAngkotKeTempatWisata;
			         					if(budget >= price)
			         					{
			         						hasilPemilihan = hasilPemilihan + "<tr><td style='width:100px;'><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query[i].place_name+"<br><p>halte "+obj.query[i].halte_name+"</p><p>"+hargaAngkot+" (angkot ke halte) + "+hargaBusway+" (busway) + "+hargaAngkotKeTempatWisata+" (angkot ke tempat wisata) + "+priceDet+" = "+price+"</p><p>rating = "+obj.query[i].rate_avg+"/5</p><button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\""+obj.query[i].place_name+"\" onclick=\"addTrip("+price+","+obj.query[i].transport_price+",'"+obj.query[i].place_name+"' , '"+obj.query[i].halte_name+"','"+obj.query[i].transport_info+"','"+obj.query[i].place_info+"')\">Add to trip</button><br><a class='toZoom' onclick='return setMapLocationZoom(\""+obj.query[i].place_name+"\")'>see location in map<a></td></tr>";
			         					}
			         					
			         				 }
			         				 
			            	}

			            	hasilPemilihan = hasilPemilihan + "</table>";
			            	$("#blogMain").html(hasilPemilihan);
			            	$("#input_price").val(budget);
			            	countTrip++;
			            	$("#theTrip").html("trip(" + countTrip+")<span class='fa fa-bus'></span>")
			            	
			            }
	                }
	            });
			}
			function showTheItinerary()
			{
				var yangDipilih = "";
					yangDipilih = yangDipilih + "<table class='table'><tr><th>Daftar tempat wisata</th></tr></table>";
			    	yangDipilih = yangDipilih + "<div class='canScroll'><table class='table table-hover'>";
			    	for(var i = 0; i<arrayTripChoosen.length; i++)
			    	{
			    		if(arrayTripChoosen[i]!='terhapus')
			    		{
			    			yangDipilih  = yangDipilih + "<tr><td><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='50' height='50'></td><td>"+arrayTripChoosen[i]+"<br>"+arrayTripPriceChoosen[i]+"<br> <a class='toZoom' onclick='return setMapLocationZoom(\""+arrayTripChoosen[i]+"\")'>see location in map<a></td><td><a class ='removeTrip' onclick='return removeTrip(\""+arrayTripChoosen[i]+"\",\""+arrayTripPriceChoosen[i]+"\")' ><span class='glyphicon glyphicon-trash' area-hidden='true' ></span></a></td></tr>";
			    		}
			    		
			    	}
			    	yangDipilih = yangDipilih + "</table></div>";
			    	yangDipilih = yangDipilih + "<table class='table'><tr><th>Your Trip Cost</th><th>Rp "+tripCost+"</th></tr></table>"

			    
			    	$(".buttonAtasToggle").popover({
			        html : true,
   					content: function(){
   						return yangDipilih;	
   					}
			    	});
			    	$('.buttonAtasToggle').attr('data-content', yangDipilih);
			    	var popover = $('.buttonAtasToggle').data('popover');
			    	$('[data-toggle="popover"]').popover('hide');

			}
			function removeTrip(trip, budgetRemove)
			{
				var indexToRemove = -1;
				for(var i=0; i< arrayTripChoosen.length; i++)
				{
					if(arrayTripChoosen[i] == trip)
					{
						indexToRemove = i;
						i=arrayTripChoosen.length;
					}
				}
				alert("indexToRemove : " + indexToRemove);
				arrayTripChoosen[indexToRemove] = "terhapus";
				arrayTripPriceChoosen[indexToRemove] = -1;
				
				configureTrip(indexToRemove);
				// for(var i=0; i<arrayTripChoosen.length; i++)
				// {
					
				// }
				alert(arrayTripChoosen + " , " + arrayTripPriceChoosen + " , " + indexCurrentHalte);
				alert("indexCurrentHalte : " + indexCurrentHalte);
				// var budgetAfterRemove = parseInt($('#inputBudgetDinamic').val()) + parseInt(budgetRemove);
				// $('#inputBudgetDinamic').val(budgetAfterRemove);
				// tripCost = tripCost - parseInt(budgetRemove);

				// showTheSuggestionList(budgetAfterRemove);
				 showTheItinerary();
		  //   	var tempmarker = gmarkers[searchIndexListTourAttr(trip)];
				// tempmarker.setIcon(null);
			}

			function configureTrip(indexToRemove)
			{
				alert("indexToRemove : " + indexToRemove + " , indexCurrentHalte : " + indexCurrentHalte);
				
				if(indexToRemove == indexCurrentHalte)
				{	
					indexCurrentHalte = indexCurrentHalte -1;
				}
				else
				{
					if(arrayPlaceInfo[indexToRemove - 1] == arrayPlaceInfo[indexToRemove + 1])
					{
						arrayTripPriceChoosen[indexToRemove +1] = parseInt(arrayTripPriceChoosen[indexToRemove +1]) - 3500 - parseInt(arrayAngkotBefore[indexToRemove]) ;
					}
					else if(arrayHalteChoosen[indexToRemove -1]==arrayHalteChoosen[indexToRemove +1])
					{
						arrayTripPriceChoosen[indexToRemove +1] = parseInt(arrayTripPriceChoosen[indexToRemove +1]) - 3500 - parseInt(arrayAngkotBefore[indexToRemove])  + parseInt(arrayAngkotBefore[indexToRemove-1]) ;
					}
					else
					{
						alert(arrayAngkotBefore[indexToRemove]);
						arrayTripPriceChoosen[indexToRemove +1] = parseInt(arrayTripPriceChoosen[indexToRemove +1]) - parseInt(arrayAngkotBefore[indexToRemove]) + parseInt(arrayAngkotBefore[indexToRemove-1]);
					}
				}

				

			}

			function getDetail(place_name)
				{
					//alert(place_name);
					jQuery.ajax({
			        type: "POST",
			        data:place_name,
			        url: "http://localhost/Jaktrip/index.php/Detailctr/detail/"+place_name+ "/",
			        success: function(res) {
			            if (res)
			            {
			       
			            	var obj = jQuery.parseJSON(res);
			            //	alert("countTrip : " + countTrip);
			         		var hasilPemilihan = "";
			         		hasilPemilihan = "<table class='table'>";
			         		var detailResult = "";
			         		detailResult = detailResult  + obj.query[0].description;	
			            	$("#info").html(detailResult);
			            	$("#detailtitle").html("&nbsp; "+ obj.query[0].place_name);
			            	$("#mapcanvas").hide();
			            	$("#detail").show();
			            //	alert(obj.query[0].place_name);
			            }
	                }
	            	});
				}
    </script>

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
	<nav class="navbar navbar-default navbar-fixed-top " id="TestForm">
	  <div class="container-fluid">
	    <div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
	      <a class="navbar-brand" href="index.html" style="background-image: url('http://localhost/Jaktrip/assets/img/logo.png')"></a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><input id="current_halte" class="fieldsml form-control" type="text" style="width: 93%;" value="<?php echo $_COOKIE['halte_name'] ?>" placeholder="Budget"></li>
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
	        
	        <li id="popoverEdit1"><a type="button" id="theTrip" class="btn buttonAtasToggle" data-container="#popoverEdit1" data-placement="bottom"		
			        data-toggle="popover">Trip (0)  <span class="fa fa-bus"></span></a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<div class="col-lg-6">
		
		<div class="row">

			<div class="searchbox">
				<form class="form-horizontal " >
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
						    <input id="input_price" class="fieldsml form-control" type="text" style="width: 93%;" value=<?php echo $_COOKIE['budget'] ?> placeholder="Budget">
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
				<button type="button" class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" data-target="#rating" onclick="collapseMap()">
    Horizontal Collapsible
</button>
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
					<div class="col-lg-11" id="blogMain">
						<?php
							echo "<table class='table table-hover'>";

							foreach ($query as $row) {
								# code...
								if($_COOKIE['isWeekend']=="true")
								{
									$priceDet = $row->weekend_price." (weekend price)";
									$price = $row->weekend_price;
								}
								else
								{
									$priceDet = $row->weekday_price." (weekday price)";
									$price = $row->weekday_price;
								}
								$stringAdditionalAngkot = "";
								$stringAdditionalAngkot = " + ".$row->transport_price." (angkutan umum tambahan) ";

								if($row->halte_name == $_COOKIE["halte_name"])
								{
									$result_price = $price + $row->transport_price;
									echo "<tr>
										<td style='width:100px;'>
											<img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td>
										<td>".$row->place_name."
											<br><p>halte ".$row->halte_name."</p>
											<p>".$priceDet."".$stringAdditionalAngkot." = ".(intval($price) + $row->transport_price)."</p>
											<p>rating = ".$row->rate_avg."/5</p>
											<button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\"".$row->place_name."\" onclick=\"addTrip(".$result_price.",".$row->transport_price.",'".$row->place_name."' , '".$row->halte_name."','".$row->transport_info."','".$row->place_info."')\">Add to trip</button>
											<br><a class='toZoom' onclick='return setMapLocationZoom(\"".$row->place_name."\")'>see location in map</a><br><a href=\"javascript: getDetail('".$row->place_name."')\">see detail</a></td></tr>";
								}
								else
								{
									$result_price = $price + 3500 + $row->transport_price;
									echo "<tr><td style='width:100px;'><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>".$row->place_name."<br><p>halte ".$row->halte_name."</p><p>".$priceDet." + 3500 (busway) ".$stringAdditionalAngkot." = ".(intval($price) + 3500 + $row->transport_price)."</p>
										<p>rating = ".$row->rate_avg."/5</p>
										<button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\"".$row->place_name."\" onclick=\"addTrip(".$result_price.",".$row->transport_price.",'".$row->place_name."' , '".$row->halte_name."','".$row->transport_info."','".$row->place_info."')\">Add to trip</button>
										<br><a class='toZoom' onclick='return setMapLocationZoom(\"".$row->place_name."\")'>see location in map</a><br><a href=\"javascript:getDetail('".$row->place_name."')\">see detail</a></td></tr>";
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

	

	<div class="col-lg-6 rating collapse width" id="rating">
			<div class="row">
				<div class="col-lg-12 redbar">
					<a class="text-danger" href="#"  data-toggle="collapse" data-target="#rating"><span class="fa fa-angle-left" style="font-size: 28px; vertical-align:middle;"></span>
					<span class="tuffyh3" style="vertical-align:middle;">&nbsp; Rate and Review</span></a>
				</div>
				<?php $CI =& get_instance(); ?>
				<!--?php if($this->form_validation->run() == TRUE){
					echo '<div class="alert alert-dismissible alert-success col-lg-11" style="text-align: center; margin: 15px;">';
					echo '<button type="button" class="close" data-dismiss="alert">×</button>';
					echo '<strong>Thank you!</strong> You successfully submitted your review. </div>';
				}
				?-->

				<?php 
				$attributes = array('class' => 'col-lg-12');
				echo form_open('ratingCtr', $attributes); ?>
					<div class="formrating form-group">
					  <div class="col-lg-9">
						<label class="control-label">Rating</label><br>
  						 <span class="starRating">
					        <input id="rating5" type="radio" name="rate" value="5">
					        <label for="rating5">5</label>
					        <input id="rating4" type="radio" name="rate" value="4">
					        <label for="rating4">4</label>
					        <input id="rating3" type="radio" name="rate" value="3" checked>
					        <label for="rating3">3</label>
					        <input id="rating2" type="radio" name="rate" value="2">
					        <label for="rating2">2</label>
					        <input id="rating1" type="radio" name="rate" value="1">
					        <label for="rating1">1</label>
					     </span>
				      </div>
				    </div>
					<br>
					<div class="formrating form-group">
					  <div class="col-lg-9">
						<label class="control-label">Title</label>
  						<input class="form-control" type="text" id="title" name="title">
				      </div>
				    </div>
					<br>
					<div class="formrating form-group">
					  <div class="col-lg-9">
						<label class="control-label">Review</label>
  						<textarea class="form-control" rows="3" id="textArea" id="review" name="review"></textarea>
				      </div>
				    </div>
					<br>
					<button class="btn btn-warning" type="submit">SUBMIT</button>
				<?php echo form_close(); ?>
			</div>

		</div>
		<div class="col-lg-6 collapse in width"  id="mapcanvas">
	</div>
	<div class="col-lg-6 rating" id="detail" hidden>
			<div class="row">
				<div class="col-lg-12 redbar">
					<a class="text-danger" href="#"><span class="fa fa-angle-left" style="font-size: 28px; vertical-align:middle;"></span>
					<span class="tuffyh3" style="vertical-align:middle;" id="detailtitle">&nbsp; Eco Cruise</span></a>
				</div>
				<div class="col-lg-12 headerdetail"><img src="http://localhost/Jaktrip/assets/img/hd.gif"/>
				</div>

				<ul id="main-menu" class="sm sm-clean submenu nav navbar-nav" style="margin: -7px 0px; ">
				<li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
				<li><a class="submenua" href="#info">Information</a></li>
		        <li><a class="submenua" href="#photos">Photos</a></li>
		        <li><a class="submenua" href="#reviews">Reviews</a></li>
		        <li><div class="formrating form-group">
					  <div class="col-lg-3">
  						 <span class="starRating small">
					        <input id="rating5" type="radio" name="rate" value="5">
					        <label for="rating5">5</label>
					        <input id="rating4" type="radio" name="rate" value="4">
					        <label for="rating4">4</label>
					        <input id="rating3" type="radio" name="rate" value="3" checked>
					        <label for="rating3">3</label>
					        <input id="rating2" type="radio" name="rate" value="2">
					        <label for="rating2">2</label>
					        <input id="rating1" type="radio" name="rate" value="1">
					        <label for="rating1">1</label>
					     </span>
				      </div>
				    </div></li>
				   <li><span class="fa fa-google-plus-square icondetail"></span></li>
				   <li><span class="fa fa-twitter-square icondetail"></span></li>
				   <li><span class="fa fa-facebook-square icondetail"></span></li>
				   <li>&nbsp;&nbsp;</li>
				   <li><span class="fa fa-check-circle icondetail"></span></li>
				   <li>&nbsp;&nbsp;</li>
				   <li><span class="fa fa-heart icondetail"></span></li>
				</ul>
				<section class="textdetail" id="info">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
					dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
					dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br><br><br>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
					dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br><br>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
					dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum
				</section>
				<section class="textdetail tabcontent hide" id="photos">
					Gallery photos
				</section>
				<section class="textdetail tabcontent hide" id="reviews">
					Reviews
				</section>
			</div>

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



<!--div id="container" style="width:200px;height:70px;">
    <div id="demo" class="collapse in width" style="background-color:yellow;">
        <div style="padding: 20px; overflow:hidden; width:200px;">
            Here is my content
        </div>
    </div>
</div-->
  
</body>

</html>
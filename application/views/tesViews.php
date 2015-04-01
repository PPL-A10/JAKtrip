
<html>
	<head>
		<meta charset="UTF-8">
		<title>tes dropdown</title>
		<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css"/>
		<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
		<link href="../assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen"/>
		<link href="../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen"/>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
		<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="../assets/bootstrap/js/bootstrap.js"></script>
		<script src="../assets/bootstrap/js/jquery-1.11.2.js"></script>
		<script src="../assets/bootstrap/js/bootstrap1.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		


		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script>
			var arrayTripChoosen = [];
			var arrayTripPriceChoosen =[];
			var tripCost = 0;
			var AllTourAttr = [];
			var gmarkers = [];
			var indexMarkerChoosen = -1;
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
			
			
			function showTheSuggestionList(budget)
			{
				jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/Jaktrip/index.php/tesController/chooseTouristAttr/"+budget,
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

			function showTheItinerary()
			{
				var yangDipilih = "";
					yangDipilih = yangDipilih + "<table class='table'><tr><th>Daftar tempat wisata</th></tr></table>";
			    	yangDipilih = yangDipilih + "<div class='canScroll'><table class='table table-hover'>";
			    	for(var i = 0; i<arrayTripChoosen.length; i++)
			    	{
			    		if(arrayTripChoosen[i]!='terhapus')
			    		{
			    			yangDipilih  = yangDipilih + "<tr><td><img src='../assets/bootstrap/img/superman.jpg' class='img-rounded' width='50' height='50'></td><td>"+arrayTripChoosen[i]+"<br>"+arrayTripPriceChoosen[i]+"<br> <a class='toZoom' onclick='return setMapLocationZoom(\""+arrayTripChoosen[i]+"\")'>see location in map<a></td><td><a class ='removeTrip' onclick='return confirmDelete(\""+arrayTripChoosen[i]+"\",\""+arrayTripPriceChoosen[i]+"\")' ><span class='glyphicon glyphicon-trash' area-hidden='true' ></span></a></td></tr>";
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

			function confirmDelete(trip, budgetRemove)
			{
				$('#showWarning').html("do you want to remove " + trip + " from your itinerary");
				var popover = $('.buttonAtasToggle').data('popover');
			    $('[data-toggle="popover"]').popover('hide');
				$("#alertRemoveItinerary").modal('show');

				$('#confirmDeletefromItinerary').unbind().click(function(){
					
					$('#showSuccessRemove').html("success removing " + trip + " from your itinerary");
					removeTrip(trip, budgetRemove);
					$('#alertSuccessRemovefromItinerary').modal('show');
					
					$('#confirmSuccessRemove').unbind().click(function(){
						$('[data-toggle="popover"]').popover('show');
					});
				});	
				
				$('.cancelDelete').unbind().click(function(){
					var popover = $('.buttonAtasToggle').data('popover');
			  		$('[data-toggle="popover"]').popover('show');
				});		
				
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

				arrayTripChoosen[indexToRemove] = "terhapus";
				arrayTripPriceChoosen[indexToRemove] = -1;
				
				var budgetAfterRemove = parseInt($('#inputBudgetDinamic').val()) + parseInt(budgetRemove);
				$('#inputBudgetDinamic').val(budgetAfterRemove);
				tripCost = tripCost - parseInt(budgetRemove);

				showTheSuggestionList(budgetAfterRemove);
				showTheItinerary();
		    	var tempmarker = gmarkers[searchIndexListTourAttr(trip)];
				tempmarker.setIcon(null);
			

			}

			function searchIndexListTourAttr(tourAttr)
			{
				
				
				for(var i = 0; i< AllTourAttr.length; i++)
				{
					
					if(AllTourAttr[i]==tourAttr)
					{
						
						return i;
					}	
				}
				
			}

			function setMapLocationZoom(tourAttr)
			{
				var indexToZoom = searchIndexListTourAttr(tourAttr);
				map.setCenter(gmarkers[indexToZoom].position);
				if(indexMarkerChoosen != -1)
				{
					gmarkers[indexMarkerChoosen].setAnimation(null);
				}
				gmarkers[indexToZoom].setAnimation(google.maps.Animation.BOUNCE);
				indexMarkerChoosen = indexToZoom;
			    map.setZoom(15);
			}

			function resetMaps()
			{
				var myCenter = new google.maps.LatLng(-6.195456, 106.822229);
				map.setCenter(myCenter);
			//	alert(indexMarkerChoosen);
				if(indexMarkerChoosen != -1)
				{
					gmarkers[indexMarkerChoosen].setAnimation(null);
				}
				indexMarkerChoosen = -1;

				map.setZoom(11);
			}

			$(document).ready(function()
			{
				
				 showTheItinerary();
				 $("#myModal").modal('show');

			//	 resetMaps();
				 $('#saveInputBudget').click(function(){
					var budget = $("input#inputBudget").val();
					$('input#inputBudgetDinamic').val(budget);
					 $("#myModal").modal('hide');


					 jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/Jaktrip/index.php/tesController/chooseTouristAttr/"+budget,
				        success: function(res) {
				            if (res)
				            {
				            	var obj = jQuery.parseJSON(res);
				         		var hasilPemilihan = "";
				         		hasilPemilihan = "<table class='table'>";
				            	for(var i = 0; i<obj.query.length; i++)
				            	{
				           		
				         				hasilPemilihan = hasilPemilihan + "<tr><td style='width:100px;'><img src='../assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query[i].place_name+"<br>"+obj.query[i].weekday_price+"<br><button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\""+obj.query[i].place_name+"\" onclick=\"addTrip("+obj.query[i].weekday_price+",'"+obj.query[i].place_name+"')\""+obj.query[i].place_name+"\">"+obj.query[i].weekday_price+"</button><br><a class='toZoom' onclick='return setMapLocationZoom(\""+obj.query[i].place_name+"\")'>see location in map<a></td></tr>";

				           	
				            	}
				            	hasilPemilihan = hasilPemilihan + "</table>";
				            	$("#blogMain").html(hasilPemilihan);
				            }
                        }
                    });
				});


				
				
			});
			
		</script>
		
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script>
			var map;
			var markers = [];
			function initialize() {
			  var mapProp = {
			    center:new google.maps.LatLng(-6.195456, 106.822229),
			    zoom:11,
			    mapTypeId:google.maps.MapTypeId.ROADMAP
			  };
			  map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
			  jQuery.ajax({
			        type: "POST",
			        url: "http://localhost/Jaktrip/index.php/tesController/getAll",
			        success: function(res) {
			            if (res)
			            {	
			            	var obj = jQuery.parseJSON(res);
			         		var hasilPemilihan = "";
			         	
			            	for(var i = 0; i<obj.query.length; i++)
			            	{
			           		
			         			var tempplace_name = obj.query[i].place_name;
			         			var templongitude = obj.query[i].longitude;
			         			var templattitude = obj.query[i].lattitude;
			         			
			         			AllTourAttr.push(tempplace_name);
			         			var location = new google.maps.LatLng(parseFloat(templongitude),parseFloat(templattitude));
			         	
			           			var marker = new google.maps.Marker({
								    position: location
								  });
			           			gmarkers.push(marker);
			           			marker.setMap(map);

			            	}
			            }
	                }
	            });
				
			}
			
			google.maps.event.addDomListener(window, 'load', initialize);

			google.maps.event.addListener(map, 'click', function(event) {
			   placeMarker(event.latLng);
			});

			function placeMarker(location) {
			    var marker = new google.maps.Marker({
			        position: new google.maps.LatLng(-6.195456, 106.822229), 
			        map: map
			    });
			}
		</script>
	</head>
	<body>
	
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
		<div id="alertAddItinerary" class="modal fade" data-backdrop="static">
		    <div class="modal-dialog modal-sm">
		        <div class="modal-content">
		        		<div class="modal-header">
			                <div class="alert alert-success">
						        <strong>Success add to itinerary</strong>
						    </div>
			            </div>
			            <div class="modal-body">
			                <p id="showSuccess"></p>
			            </div>
			            <div class="modal-footer">
			                <button type="button" id="confirmSuccessAddItinerary" data-dismiss="modal" class="btn btn-success">ok</button>
			            </div>
		        </div>
		    </div>
		</div>
		<div id="alertRemoveItinerary" class="modal fade" data-backdrop="static">
		    <div class="modal-dialog modal-sm">
		        <div class="modal-content">
		        		<div class="modal-header">
		        			 <div class="alert alert-warning">
			                	<button type="button" class="close cancelDelete" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <strong>Warning</strong>
						    </div>
			            </div>
			            <div class="modal-body">
			                <p id="showWarning"></p>
			            </div>
			            <div class="modal-footer">
			            	<button type="button" data-dismiss="modal" class="btn btn-default cancelDelete">cancel</button>
			                <button id="confirmDeletefromItinerary" type="button" data-dismiss="modal" class="btn btn-danger">remove</button>
			            </div>
		        </div>
		    </div>
		</div>
		<div id="alertSuccessRemovefromItinerary" class="modal fade" data-backdrop="static">
		    <div class="modal-dialog modal-sm">
		        <div class="modal-content">
		        		<div class="modal-header">
			                <div class="alert alert-success">
						        <strong>Success to remove from itinerary</strong>
						    </div>
			            </div>
			            <div class="modal-body">
			                <p id="showSuccessRemove"></p>
			            </div>
			            <div class="modal-footer">
			                <button type="button" id="confirmSuccessRemove" data-dismiss="modal" class="btn btn-success">ok</button>
			            </div>
		        </div>
		    </div>
		</div>
		<div id="loginFormModal" class="modal fade" data-backdrop="static">
		    <div class="modal-dialog modal-sm">
		        <div class="modal-content">
		        		<div class="modal-header">
			                <div class="alert alert-success">
						        <strong>Success to remove from itinerary</strong>
						    </div>
			            </div>
			            <div class="modal-body">
			                <p id="showSuccessRemove"></p>
			            </div>
			            <div class="modal-footer">
			                <button type="button" id="confirmSuccessRemove" data-dismiss="modal" class="btn btn-success">ok</button>
			            </div>
		        </div>
		    </div>
		</div>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      
	      <a class="navbar-brand" href="#">JAKtrip</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      </ul>

	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input id="inputBudgetDinamic" type="text" class="form-control" placeholder="Your budget">
	        </div>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	      	<li>
	      		<a type="button" class="btn" onclick="return resetMaps()" >Reset Map Zoom</a>
	      	</li>
	       	<li id="popoverEdit1">
			        <a  type="button" class="btn buttonAtasToggle" data-container="#popoverEdit1" data-placement="bottom"		
			        data-toggle="popover">Trip</a>
	        </li>
	  		<li>
	  				<a  type="button" class="btn">Login</a>
	  		</li>>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
		<div class="container-fluid">
			<div class="row">
				<div id="blogMain" class="col-md-6 canScrollMain" >
				<?php
					echo "<table class='table table-hover'>";
					foreach ($query->result() as $row) {
						# code...
						echo "<tr><td style='width:100px;'><img src='../assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>".$row->place_name."<br>".$row->weekday_price."<br><button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\"".$row->place_name."\" onclick=\"addTrip(".$row->weekday_price.",'".$row->place_name."')\"".$row->place_name."\">".$row->weekday_price."</button><br><a class='toZoom' onclick='return setMapLocationZoom(\"".$row->place_name."\")'>see location in map<a></td></tr>";
					}
					echo "</table>";
				?>
				</div>
				<div class="col-md-6" id="googleMap" style="height:550px;">
	 		 		
	 		 	</div>
			</div>
		</div>
				
	</body>

</html>
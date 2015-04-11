$(document).ready(function () {
        
        $('.datepicker').datepicker({
            format: "dd/mm/yyyy"
        });  

    });

$(function() {
		  $('#main-menu').smartmenus();
		});

	$("#tab1 #checkAll").click(function () {
	        if ($("#tab1 #checkAll").is(':checked')) {
	            $("#tab1 input[type=checkbox]").each(function () {
	                $(this).prop("checked", true);
	            });

	        } else {
	            $("#tab1 input[type=checkbox]").each(function () {
	                $(this).prop("checked", false);
	            });
	        }
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
			         		detailResult = detailResult  + "<br><br>"+obj.query[0].description;	
			            	$("#info").html(detailResult);
			            	$("#detailtitle").html("&nbsp; "+ obj.query[0].place_name);
			            	$("#mapcanvas").hide();
			            	$("#detail").show();
			            //	alert(obj.query[0].place_name);
			            }
	                }
	            	});
				}

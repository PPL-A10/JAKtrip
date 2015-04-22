$(document).ready(function () {
        showTheItinerary1();

        $('.datepicker').datepicker({
            format: "mm/dd/yyyy"
        });  

    });

$(function() {
		  $('#main-menu').smartmenus();
		});

				$('.navbar-nav > li > a').click(function(event){
					//event.preventDefault();//stop browser to take action for clicked anchor	
					
					//get displaying tab content jQuery selector
					var active_tab_selector = $('.navbar-nav > li.active > a').attr('href');					
					
					//find actived navigation and remove 'active' css
					var actived_nav = $('.navbar-nav > li.active');
					actived_nav.removeClass('active');

					//add 'active' css into clicked navigation
					$(this).parents('li').addClass('active');
					
					//hide displaying tab content
					$(active_tab_selector).removeClass('active');
					$(active_tab_selector).addClass('hide');
					
					//show target tab content
					var target_tab_selector = $(this).attr('href');
					$(target_tab_selector).removeClass('hide');
					$(target_tab_selector).addClass('active');
				});
		   $("#faqs dd").hide();
		    $("#faqs dt").click(function () {
		        $(this).next("#faqs dd").slideToggle(500);
		        $(this).toggleClass("expanded");
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
    	var budgetmax = $("#input_price").val();
        $(".range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 500000,
            from: 0,
            to: budgetmax,
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
        var map = new google.maps.Map(mapCanvas, mapOptions);
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

				function showRating(place_name)
		        {
		        	
		          $("#mapcanvas").hide();
		          $("#detailrating").show();
		          $("#isireview").hide();

		          jQuery.ajax({
		                type: "POST",
		                url: "http://localhost/JAKtrip/index.php/DetailCtr/getdetail/" + place_name,
		                success: function(res) {
		                    if (res)
		                    {

		                var obj = jQuery.parseJSON(res);
		                var resultQuery = "";
		                var resultQuerydetail = "";
		                var resultQueryShare= "";
		                for (var i=0 ; i<obj.query.length; i++){
		                  //resultQuery = resultQuery +obj.query[i].place_name+"<br>";
		                  resultQueryname = resultQuery +obj.query[i].place_name;
		                  resultQuerydetail = resultQuerydetail +obj.query[i].description;
		                  resultQueryShare  = resultQueryShare + obj.query[i].place_name;
		                }
		             $("#shareDetail").html("<span class='fa fa-twitter-square icondetail'></span><div id='shareFacebook' class='fb-share-button' data-href='"+resultQueryShare+"' data-layout='icon'></div><span class='fa fa-check-circle icondetail'></span><span class='fa fa-heart icondetail'></span>");
		              $("#namatempat").html(resultQueryname);
		              $("#info").html(resultQuerydetail);
		              
		              }             
		            }
		                }
		            );
		          getReview(place_name);
		        }

		         function getReview(place_name){
		
		//$("#reviews").html("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
		//var y = document.getElementById("location_select").value;
			//	alert(place_name);
					
					jQuery.ajax({
							        type: "POST",
							        url: "http://localhost/JAKtrip/index.php/ReviewCtr/detailrev/"+ place_name,
							        success: function(res) {
							            if (res)
							            {
											var obj = jQuery.parseJSON(res);
											var resultQuery = "";
											var resultQueryname = "";
											for (var i=0 ; i<obj.query.length; i++){
												if(i>0)
												{
												resultQuery = resultQuery +"<div class='reviewmember col-lg-12'><br><div class='reviewkiri col-lg-4'><div class='ava'><img src='/JAKtrip/assets/img/50.jpg'/></div><div class='author' id='namauser'><b>"+obj.query[i].username+"</b></div><div class='hasreviewed'>Reviewed 7 places</div></div><div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o' ></span><span class='fa fa-star-o'></span><span class='deleterev close fa fa-trash-o'><a href=''></a></span><br><span class='judulreview tuffyh3a' id='temareview'>"+obj.query[i].title+"</span><br><span class='isireview' id='deskripsireview'>"+obj.query[i].review+"</span></div></div>";	
												}
												else
												{
												resultQuery = resultQuery +"<div class='reviewmember col-lg-12'><button class='btn btn-warning col-lg-11' type='submit'>ADD NEW REVIEW</button><br><div class='reviewkiri col-lg-4'><div class='ava'><img src='/JAKtrip/assets/img/50.jpg'/></div><div class='author' id='namauser'><b>"+obj.query[i].username+"</b></div><div class='hasreviewed'>Reviewed 7 places</div></div><div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o' ></span><span class='fa fa-star-o'></span><span class='deleterev close fa fa-trash-o'><a href=''></a></span><br><span class='judulreview tuffyh3a' id='temareview'>"+obj.query[i].title+"</span><br><span class='isireview' id='deskripsireview'>"+obj.query[i].review+"</span></div></div>";
												resultQueryname = resultQueryname +obj.query[i].place_name;
												}
											}
									//		$("#namatempat").html(resultQueryname);	
										$("#reviews").html(resultQuery);
										
										}							
							            }
			                        }
			                    );
				}

				function filterFunctionFinal(){		
		//document.getElementById("output_field").innerHTML = "You selected: 1dfsdsdfgdfgdfgdfvbdfgbffvbfgbb" ;		
					var x = document.getElementById("category_select").value;
					var y = document.getElementById("location_select").value;
					var z = document.getElementById("name_select").value;
							
					jQuery.ajax({
							        type: "POST",
							        url: "http://localhost/JAKtrip/index.php/searchCont/searchwisataCatLocKey/"+x+"/"+y+"/"+z,
							        success: function(res) {
							            if (res)
							            {
											var obj = jQuery.parseJSON(res);
											var resultQuery = "";
											for (var i=0 ; i<obj.query.length; i++){
												resultQuery = resultQuery +obj.query[i].place_name+"<br>";
											}
											
										$("#output_field").html(resultQuery);
			//								$("#output_field").html(obj.query[0].place_name;
				}
										
							            }
			                        }
			                    );
				}

				function mengisiReview()
				{
					$("#isireview").show();
					$("#mapcanvas").hide();
					$("#detailrating").hide();
				}

				function tutupDetailRating()
				{

					$("#detailrating").hide(); 
					$("#mapcanvas").show();
					$("#isireview").hide();
				}

				function tutupReview()
				{
					$("#detailrating").hide(); 
					$("#mapcanvas").show();
					$("#isireview").hide();
				}

//faq----------

$("#gscon").show();
		    $("#aapcon").hide();
		    $("#plcon").hide();
		    $("#revcon").hide();
		    $("#otcon").hide();

		    $("#gs").click(function(){
		    	$("#aapcon").hide();
		    	$("#plcon").hide();
			    $("#revcon").hide();
			    $("#otcon").hide();
		    	$("#gscon").show();
		    });

		    $("#aap").click(function(){
		    	$("#gscon").hide();
		    	$("#plcon").hide();
			    $("#revcon").hide();
			    $("#otcon").hide();
		    	$("#aapcon").show();
		    });

		    $("#pl").click(function(){
		    	$("#gscon").hide();
		    	$("#aapcon").hide();
			    $("#revcon").hide();
			    $("#otcon").hide();
		    	$("#plcon").show();
		    });

		    $("#rev").click(function(){
		    	$("#gscon").hide();
		    	$("#plcon").hide();
			    $("#aapcon").hide();
			    $("#otcon").hide();
		    	$("#revcon").show();
		    });

		    $("#ot").click(function(){
		    	$("#gscon").hide();
		    	$("#plcon").hide();
			    $("#revcon").hide();
			    $("#aapcon").hide();
		    	$("#otcon").show();
		    });
//---------------------------------------------------------

//------------------------PLACES-----------------------------
			$("#infocon").show();
		    $("#photoscon").hide();
		    $("#reviewscon").hide();

		    $("#inf").click(function(){
		    	$("#photoscon").hide();
		    	$("#reviewscon").hide();
		    	$("#infocon").show();
		    });

		    $("#pho").click(function(){
			    $("#infocon").hide();
			    $("#reviewscon").hide();
		    	$("#photoscon").show();
		    });

		    $("#revi").click(function(){
			    $("#infocon").hide();
			    $("#photoscon").hide();
		    	$("#reviewscon").show();
		    });

		    $("#addrevform").hide();
		    $("#addrevbtn").click(function(){
			    $("#addrevform").toggle();
			    $(this).text(function(i, text){
			          return text === "ADD NEW REVIEW" ? "CLOSE FORM" : "ADD NEW REVIEW";
			      })
		    });

		   
//---------------
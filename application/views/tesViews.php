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
			var cars1 = [];
			var cars2 = "";
			var arrayTripChoosen = [];
			var arrayTripPriceChoosen =[];
			var tripCost = 0;
			var isEdit = false;
			var AllTourAttr = [];
			var AllLongitude = [];
			var AllLattitude = [];
			function fui(x,y){
					//alert(x);
					//alert(y);
					var budget = parseInt(x);
					tripCost = tripCost + budget;
					budget = parseInt($('input#inputBudgetDinamic').val()) - parseInt(x);
					$('input#inputBudgetDinamic').val(budget);
					alert(budget);	
				//	window.location.href = '//localhost/codeigniter/index.php/tesController/chooseTouristAttr/' + budget;
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
				           		//	alert(obj.query[i].Nama);
				         //  			hasilPemilihan = hasilPemilihan + "<div class=\"blog-post well\"><p>"+obj.query[i].Nama+" <button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\""+obj.query[i].Nama+"\" onclick=\"fui("+obj.query[i].Budget+",'"+obj.query[i].Nama+"')\""+obj.query[i].Nama+"\">"+obj.query[i].Budget+"</button></p></div>";
				         				var sudahDipilih = false;
				         				for(var j = 0; j<arrayTripChoosen.length; j++)
				         				{
				         					
				         					if(obj.query[i].place_name == arrayTripChoosen[j] && arrayTripChoosen[i] != "terhapus")
				         					{
				         						sudahDipilih = true;
				         					}
				         				}
				         				if(!sudahDipilih)
				         				{
				         					hasilPemilihan = hasilPemilihan + "<tr><td style='width:100px;'><img src='../assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query[i].place_name+"<br>"+obj.query[i].weekday_price+"<br><button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\""+obj.query[i].place_name+"\" onclick=\"fui("+obj.query[i].weekday_price+",'"+obj.query[i].place_name+"')\""+obj.query[i].place_name+"\">"+obj.query[i].weekday_price+"</button></td></tr>";
				         				}
				         				

				           	//		$("#blogMain").html("<div class=\"blog-post well\"><p>"+obj.query[i].Nama+"<button type=\"button\" class=\"btn btn-xs btn-success\" id=\""+obj.query[i].Nama+"\" onclick=\"fui('"+obj.query[i].Budget+"')\""+obj.query[i].Nama+"\">"+obj.query[i].Budget+"</button></p></div>");
				            	}
				            	hasilPemilihan = hasilPemilihan + "</table>";
				            	$("#blogMain").html(hasilPemilihan);

				            }
                        }
                    });
					var ditambahkan = y ;
					//alert(ditambahkan);
				//	cars1.push(ditambahkan);
				//	alert(ditambahkan);
					arrayTripChoosen.push(ditambahkan);
					arrayTripPriceChoosen.push(parseInt(x));

					var yangDipilih = "";
					yangDipilih = yangDipilih + "<table class='table'><tr><th>Daftar tempat wisata</th></tr></table>";
			    	yangDipilih = yangDipilih + "<div class='canScroll'><table class='table table-hover'>";
			    	for(var i = 0; i<arrayTripChoosen.length; i++)
			    	{
			    		yangDipilih  = yangDipilih + "<tr><td><img src='../assets/bootstrap/img/superman.jpg' class='img-rounded' width='50' height='50'></td><td>"+arrayTripChoosen[i]+"<br>"+arrayTripPriceChoosen[i]+"</td><td><a class ='removeTrip' onclick='return removeTrip(\""+arrayTripChoosen[i]+"\",\""+arrayTripPriceChoosen[i]+"\")' ><span class='glyphicon glyphicon-trash' area-hidden='true' ></span></a></td>	</tr>";
			    	}
			    	yangDipilih = yangDipilih + "</table></div>";
			    	yangDipilih = yangDipilih + "<table class='table'><tr><th>Your Trip Cost</th><th>Rp "+tripCost+"</th></tr></table>"


			    	alert(yangDipilih);
			    	$(".buttonAtasToggle").popover({
			        html : true,
   					content: function(){
   						return yangDipilih;	
   					}
			    	});
			    	$('.buttonAtasToggle').attr('data-content', yangDipilih);
			    	var popover = $('.buttonAtasToggle').data('popover');
			    	popover.setContent();
			    	popover.$tip.addClass(popover.options.placement);

					$("#listItinirary").html('');
					jQuery.each(cars1, function(index, item){
					//	alert(item);
						$("#listItinirary").append('<li><a href="#"><p>'+item+'</p><div class="col-xs-1"><button type="button" class="btn btn-danger btn-xs">Action</button></div></a></li>');
					});
			}
			
			function tetot()
			{
				alert("tetot");
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

				jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/Jaktrip/index.php/tesController/chooseTouristAttr/"+budgetAfterRemove,
				        success: function(res) {
				            if (res)
				            {
				            	var obj = jQuery.parseJSON(res);
				         		var hasilPemilihan = "";
				         		hasilPemilihan = "<table class='table'>";
				         		
				            	for(var i = 0; i<obj.query.length; i++)
				            	{
				           		//	alert(obj.query[i].Nama);
				         //  			hasilPemilihan = hasilPemilihan + "<div class=\"blog-post well\"><p>"+obj.query[i].Nama+" <button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\""+obj.query[i].Nama+"\" onclick=\"fui("+obj.query[i].Budget+",'"+obj.query[i].Nama+"')\""+obj.query[i].Nama+"\">"+obj.query[i].Budget+"</button></p></div>";
				         				var sudahDipilih = false;
				         				for(var j = 0; j<arrayTripChoosen.length; j++)
				         				{
				         					
				         					if(obj.query[i].place_name == arrayTripChoosen[j] && arrayTripChoosen[i] != "terhapus")
				         					{
				         						sudahDipilih = true;
				         					}
				         				}
				         				if(!sudahDipilih)
				         				{
				         					hasilPemilihan = hasilPemilihan + "<tr><td style='width:100px;'><img src='../assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query[i].place_name+"<br>"+obj.query[i].weekday_price+"<br><button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\""+obj.query[i].place_name+"\" onclick=\"fui("+obj.query[i].weekday_price+",'"+obj.query[i].place_name+"')\""+obj.query[i].place_name+"\">"+obj.query[i].weekday_price+"</button><br><a class='toZoom' onclick='return setMapLocationZoom(\""+obj.query[i].place_name+"\")'>see location in map<a></td></tr>";
				         				}
				         				

				           	//		$("#blogMain").html("<div class=\"blog-post well\"><p>"+obj.query[i].Nama+"<button type=\"button\" class=\"btn btn-xs btn-success\" id=\""+obj.query[i].Nama+"\" onclick=\"fui('"+obj.query[i].Budget+"')\""+obj.query[i].Nama+"\">"+obj.query[i].Budget+"</button></p></div>");
				            	}
				            	hasilPemilihan = hasilPemilihan + "</table>";
				            	$("#blogMain").html(hasilPemilihan);
				            }
                        }
                    });
					var yangDipilih = "";
					yangDipilih = yangDipilih + "<table class='table'><tr><th>Daftar tempat wisata</th></tr></table>";
			    	yangDipilih = yangDipilih + "<div class='canScroll'><table class='table table-hover'>";
			    	for(var i = 0; i<arrayTripChoosen.length; i++)
			    	{
			    		if(arrayTripChoosen[i] != "terhapus")
			    		yangDipilih  = yangDipilih + "<tr><td><img src='../assets/bootstrap/img/superman.jpg' class='img-rounded' width='50' height='50'></td><td>"+arrayTripChoosen[i]+"<br>"+arrayTripPriceChoosen[i]+"</td><td><a class ='removeTrip' onclick='return removeTrip(\""+arrayTripChoosen[i]+"\",\""+arrayTripPriceChoosen[i]+"\")' ><span class='glyphicon glyphicon-trash' area-hidden='true' ></span></a></td>	</tr>";
			    	}
			    	yangDipilih = yangDipilih + "</table></div>";
			    	yangDipilih = yangDipilih + "<table class='table'><tr><th>Your Trip Cost</th><th>Rp "+tripCost+"</th></tr></table>"


			    //	alert(yangDipilih);
			    	$(".buttonAtasToggle").popover({
			        html : true,
   					content: function(){
   						return yangDipilih;	
   					}
			    	});
			    	$('.buttonAtasToggle').attr('data-content', yangDipilih);
			    	var popover = $('.buttonAtasToggle').data('popover');
			    	$('[data-toggle="popover"]').popover('hide');
			    	//alert("hoam");
			}

			    
			// var popover = $('#testpopover').data('popover');

			// setTimeout(function() {
			//     $('#testpopover').attr('data-content', 'hello');
			//     var popover = $('#testpopover').data('popover');
			//     popover.setContent();
			//     popover.$tip.addClass(popover.options.placement);
			// },5000);

			function setTripList(setEdit)
			{ 

				isEdit = setEdit;
				
				
		//		alert(cars2);
				var yangDipilih = "";
				if(arrayTripChoosen.length == 0)
		    	{
			    	yangDipilih = yangDipilih + "<table class='table'><tr><th>Daftar tempat wisata</th></tr></table>";
			    	yangDipilih = yangDipilih + "<div class='canScroll'><table class='table table-hover'>";
			    	for(var i = 0; i<0; i++)
			    	{
			    		yangDipilih  = yangDipilih + "<tr><td><img src='../assets/bootstrap/img/superman.jpg' class='img-rounded' width='50' height='50'></td><td>Ini tempat wisata yang ada di jakarta</td><td><a class ='removeTrip'><span class='glyphicon glyphicon-trash' area-hidden='true' ></span></a></td>	</tr>";
			    	}
			    	yangDipilih = yangDipilih + "</table></div>";
			    	yangDipilih = yangDipilih + "<table class='table'><tr><th>Your Budget</th><th>Rp "+tripCost+"</th></tr></table>"
		    	}
		    	else
		    	{
		    		yangDipilih = yangDipilih + "<table class='table'><tr><th>Daftar tempat wisata</th><th><a class='editTrip' onclick=' return setTripList(false)'>done</a></th></tr></table>";
			    	yangDipilih = yangDipilih + "<div class='canScroll'><table class='table table-hover'>";
			    	for(var i = 0; i<4; i++)
			    	{
			    		yangDipilih  = yangDipilih + "<tr><td><img src='../assets/bootstrap/img/superman.jpg' class='img-rounded' width='50' height='50'></td><td>Ini tempat wisata yang ada di jakarta</td><td><a class ='removeTrip'><span class='glyphicon glyphicon-trash' area-hidden='true' ></span></a></td>	</tr>";
			    	}
			    	yangDipilih = yangDipilih + "</table></div>";
		    	}

		    	$(".buttonAtasToggle").popover({
			        html : true
   					// content: function(){
   					// 	return yangDipilih;	
   					// }
			    });
		//    	alert(yangDipilih);
			    $('.buttonAtasToggle').attr('data-content', yangDipilih);
		    	 // var popover = $('.buttonAtasToggle').data('popover');
			   	 // popover.setContent();
		    	 // popover.$tip.addClass(popover.options.placement);
		  	//	popover.options.content = "asa";
		  		
	  	// 	    if ($(".buttonAtasToggle").next('div.popover:visible').length){
				// 	popover.show();
				// }
			}


		// 	$(function(){
    
		// 	    // Enabling Popover Example 1 - HTML (content and title from html tags of element)
		// //	    $("[data-toggle=popover]").popover();

		// 	    // Enabling Popover Example 2 - JS (hidden content and title capturing)
		// 	    // $("#popoverExampleTwo").popover({
		// 	    //     html : true, 
		// 	    //     content: function() {
		// 	    //       return $('#popoverExampleTwoHiddenContent').html();
		// 	    //     },
		// 	    //     title: function() {
		// 	    //       return $('#popoverExampleTwoHiddenTitle').html();
		// 	    //     }
		// 	    // });

		// 	    var yangDipilih = "";
		// 	    if(cars1.length == 0)
		// 	    {
		// 	    	yangDipilih = yangDipilih + "<table class='table'><tr><th>Daftar tempat wisata</th><th><a class='editTrip'>edit</a></th></tr></table>";
		// 	    	yangDipilih = yangDipilih + "<div class='canScroll'><table class='table table-hover'>";
		// 	    	for(var i = 0; i<4; i++)
		// 	    	{
		// 	    		yangDipilih  = yangDipilih + "<tr><td><img src='../assets/bootstrap/img/superman.jpg' class='img-rounded' width='50' height='50'></td><td>Ini tempat wisata yang ada di jakarta</td><td><a class ='removeTrip'><span class='glyphicon glyphicon-remove' area-hidden='true'></span></a></td>	</tr>";
		// 	    	}
		// 	    	yangDipilih = yangDipilih + "</table></div>";
		// 	    }
		// 	     for(var i=0; i<cars1.length; i++)
		// 	     {
		// 	     	yangDipilih = yangDipilih + "<div style=\"display: none\"><div><b>Popover Example</b> 2 - Content</div></div>";
		// 	     }

		// 	   //  alert(yangDipilih);
		// 	     $(".buttonAtasToggle").popover({
		// 	        html : true,
  //  					content: function(){
  //  						return yangDipilih;	
  //  					}
		// 	    });

		// 	     //alert($('#popoverExampleTwo').data('popover'));
			     
	          	

		// 	});


			// $(function(){ 
			// 	var yangDipilih = "";
			// 	yangDipilih = yangDipilih + "<table class='table'><tr><th>Daftar tempat wisata</th></tr></table>";
			//     	yangDipilih = yangDipilih + "<div class='canScroll'><table class='table'>";
			//     	for(var i = 0; i<4; i++)
			//     	{
			//     		yangDipilih  = yangDipilih + "<tr><td><img src='../assets/bootstrap/img/superman.jpg' class='img-rounded' width='50' height='50'></td><td>Ini tempat wisata yang ada di jakarta</td><td><button type='button' class='btn btn-danger btn-sm sharp'><span class='glyphicon glyphicon-remove' area-hidden='true'></span></button></td>	</tr>";
			//     	}
			//     	yangDipilih = yangDipilih + "</table></div>";
			// 	$('#popoverBtn').popover({
			//         html : true,
   // 					content: function(){
   // 						return yangDipilih;	
   // 					}
			//     }); 
			// });

			$('#right').popover({
			    html : true,
			    title: 'When finished loading, will reposition correctly',
			    content: "<button class='btn btn-primary' onclick='tetot()'>click me</button>"
			});


			setTimeout(function() {
			    $('#right').attr('data-content', "<button class='btn btn-danger'>hellow</button>");
			    var popover = $('#right').data('popover');
			    popover.setContent();
			    popover.$tip.addClass(popover.options.placement);
			    // if popover is visible before content has loaded
			    if ($("#right").next('div.popover:visible').length){
			        popover.show();
			    }
			},6000);


			$('#justapopover').popover({
		  		html:true,
		        placement : 'top'
		    });
			function changeButton() {
			    $('#justapopover').attr('data-content', "<button class='btn btn-danger'>hellow</button>");
			    var popover = $('#justapopover').data('popover');
			    popover.setContent();
			    popover.$tip.addClass(popover.options.placement);
			    // if popover is visible before content has loaded
			    if ($("#justapopover").next('div.popover:visible').length){
			      //  $(this).popover('hide');
			        popover.show();
			    }
			}
			
			function searchIndexListTourAttr(tourAttr)
			{
				
				alert(AllTourAttr);
				for(var i = 0; i< AllTourAttr.length-1; i++)
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
				var longitudeToZoom = parseFloat(AllLongitude[indexToZoom]);
				var lattitudeToZoom = parseFloat(AllLattitude[indexToZoom]);
			//	alert(indexToZoom + "," + longitudeToZoom+","+lattitudeToZoom);
				map.setCenter(new google.maps.LatLng(longitudeToZoom, lattitudeToZoom));
			    map.setZoom(15);
			}
			$(document).ready(function()
			{
				
				 setTripList(false);
				 $("#myModal").modal('show');

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
				           		//	alert(obj.query[i].Nama);
				         //  			hasilPemilihan = hasilPemilihan + "<div class=\"blog-post well\"><p>"+obj.query[i].Nama+" <button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\""+obj.query[i].Nama+"\" onclick=\"fui("+obj.query[i].Budget+",'"+obj.query[i].Nama+"')\""+obj.query[i].Nama+"\">"+obj.query[i].Budget+"</button></p></div>";
				         				hasilPemilihan = hasilPemilihan + "<tr><td style='width:100px;'><img src='../assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query[i].place_name+"<br>"+obj.query[i].weekday_price+"<br><button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\""+obj.query[i].place_name+"\" onclick=\"fui("+obj.query[i].weekday_price+",'"+obj.query[i].place_name+"')\""+obj.query[i].place_name+"\">"+obj.query[i].weekday_price+"</button><br><a class='toZoom' onclick='return setMapLocationZoom(\""+obj.query[i].place_name+"\")'>see location in map<a></td></tr>";

				           	//		$("#blogMain").html("<div class=\"blog-post well\"><p>"+obj.query[i].Nama+"<button type=\"button\" class=\"btn btn-xs btn-success\" id=\""+obj.query[i].Nama+"\" onclick=\"fui('"+obj.query[i].Budget+"')\""+obj.query[i].Nama+"\">"+obj.query[i].Budget+"</button></p></div>");
				            	}
				            	hasilPemilihan = hasilPemilihan + "</table>";
				            	$("#blogMain").html(hasilPemilihan);
				            }
                        }
                    });
				});


				
				// alert("yes it is");
				  
			// 	$("#somebutton1").click(function(){
			//         $("#somebutton2").remove();
			//     });


   //  			$("#somebutton").click(function () {
			// 	  $("#row1").append('<div class="col-md-3" id="apa"><button type="button" class="btn btn-primary">Action</button></div>');
			// 	});

			// 	jQuery.each(cars1, function(index, item){
			// 		$("#row1").append('<div class="col-md-3"><button type="button" class="btn btn-primary pil-row pil-row1">'+item+'</button></div>');
			// 	});

			// 	jQuery.each(cars1, function(index, item){
			// 		$("#listItinirary").append('<li><a href="#">'+item+'</a></li>');
			// 	});

				
				
			// 	$(".mobil").click(function(){
			// 		var ditambahkan = $(this).html();
			// 		cars1.push(ditambahkan);
			// 		$("#row1").append('<div class="col-md-3"><button type="button" class="btn btn-primary pil-row pil-row1">'+ditambahkan+'</button></div>');

			// 		$("#row3").html('<div class="col-md-3">'+cars1+'</div>');
					

			// 		$("#listItinirary").html('');
			// 		jQuery.each(cars1, function(index, item){
			// 		$("#listItinirary").append('<li><a href="#">'+item+'</a></li>');
			// 		});
					
			// 		$(".pil-row1").click(function(){
			// 			var itemToRemove = $(this).text();
			// 			cars1 = jQuery.grep(cars1, function(value){
			// 				return value != itemToRemove;
			// 			});
			// 			$(this).parent().remove();

			// 			$(".pil-row1").click(function () {
	  //     				$(this).parent().remove();
	  //   				});

			// 			$("#row3").html('<div class="col-md-3">'+cars1+'</div>');
						
			// 			//location.reload();
			// 		});
			// 	});
				
			// 	$(".submit1").click(function(event) {
			// 		jQuery.ajax({
   //                      type: "POST",
   //                      url: "http://localhost/codeigniter/index.php/chooseTouristAttr/",
   //                    	datatype : "json",
   //                      data: jsonObj[0],
   //                      success: function(res) {
   //                          if (res)
   //                          {
   //                              // Show Entered Value
   //                             // jQuery("div#test").show();
   //                             // jQuery("div#value").html(res.username);
   //                         //     jQuery("div#value_pwd").html(res.pwd);
   //                         		alert(res.username);
   //                          }
   //                      }
   //                  });
			// 	});
				

			// 	$(".submit").click(function(event) {
   //                  event.preventDefault();
   //                  //var user_name = $("input#name").val();
   //                  //var password = $("input#pwd").val();
   //                  var tempjson = "{ akb:";

   //                  for (i = 0; i < cars1.length; i++)
   //                  {
                    	
   //                  	if(i==cars1.length-1)
   //                  		tempjson = tempjson +  cars1[i] + "}";
   //                  	else	
   //                  		tempjson = tempjson +  cars1[i] + ",";
   //                  }
   //                 //	var tempjson1 = "[" + tempjson + "]";
   //                //  var myjson = JSON.parse(tempjson1);
   //               // 	var tempjson1 = {akb: + tempjson + };
   //                  var str = '[{"id":1,"name":"Test1"},{"id":2,"name":"Test2"}]';
			// 		var jsonObj = JSON.parse('[' + tempjson + ']');
   //                 //	alert(tempjson);
   //                 	var mama = JSON.parse(str);
   //              //    alert(tempjson1); 
   //                   alert(jsonObj[0]);
   //                  jQuery.ajax({
   //                      type: "POST",
   //                      url: "http://localhost/codeigniter/index.php/tesController/userDataSubmit",
   //                    	datatype : "json",
   //                      data: jsonObj[0],
   //                      success: function(res) {
   //                          if (res)
   //                          {
   //                              // Show Entered Value
   //                             // jQuery("div#test").show();
   //                             // jQuery("div#value").html(res.username);
   //                         //     jQuery("div#value_pwd").html(res.pwd);
   //                         		alert(res.username);
   //                          }
   //                      }
   //                  });
   //              });
			});
			
		</script>
		<?php
			$cars = array("Volvo", "BMW", "Toyota");
		?>
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
			         	//	hasilPemilihan = "<table class='table'>";
			            	for(var i = 0; i<obj.query.length; i++)
			            	{
			           		//	alert(obj.query[i].Nama);
			         //  			hasilPemilihan = hasilPemilihan + "<div class=\"blog-post well\"><p>"+obj.query[i].Nama+" <button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\""+obj.query[i].Nama+"\" onclick=\"fui("+obj.query[i].Budget+",'"+obj.query[i].Nama+"')\""+obj.query[i].Nama+"\">"+obj.query[i].Budget+"</button></p></div>";
			         			//	hasilPemilihan = hasilPemilihan + "<tr><td style='width:100px;'><img src='../assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query[i].place_name+"<br>"+obj.query[i].weekday_price+"<br><button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\""+obj.query[i].place_name+"\" onclick=\"fui("+obj.query[i].weekday_price+",'"+obj.query[i].place_name+"')\""+obj.query[i].place_name+"\">"+obj.query[i].weekday_price+"</button></td></tr>";
			         			var tempplace_name = obj.query[i].place_name;
			         			var templongitude = obj.query[i].longitude;
			         			var templattitude = obj.query[i].lattitude;
			         			
			         			AllTourAttr.push(tempplace_name);
			         			AllLongitude.push(templongitude);
			         			AllLattitude.push(templattitude);
			         			var location = new google.maps.LatLng(parseFloat(templongitude),parseFloat(templattitude));
			         			// if(i == obj.query.length-1)
			         			// {
			         			// 	map.setCenter(new google.maps.LatLng(parseFloat(obj.query[i].longitude), parseFloat(obj.query[i].lattitude)));
			         			// 	map.setZoom(13);
			         			// }
			           	//		$("#blogMain").html("<div class=\"blog-post well\"><p>"+obj.query[i].Nama+"<button type=\"button\" class=\"btn btn-xs btn-success\" id=\""+obj.query[i].Nama+"\" onclick=\"fui('"+obj.query[i].Budget+"')\""+obj.query[i].Nama+"\">"+obj.query[i].Budget+"</button></p></div>");
			           			var marker = new google.maps.Marker({
								    position: location
								  });
			           			marker.setMap(map);

			            	}
			            	//hasilPemilihan = hasilPemilihan + "</table>";
			            //	$("#blogMain").html(hasilPemilihan);
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
	<!--div id="popoverEdit">
		<button  id="buttonAtasToggle" type="button" class="btn btn-lg btn-danger buttonAtasToggle " data-container="#popoverEdit" data-placement="bottom"		
	        data-toggle="popover" >
	  	Click to toggle popover
		</button>
	</div-->
	<!--div id="wrap">
		<button id="popoverBtn" type="button" class="btn btn-default" data-container="#wrap" data-toggle="popover" html="true" data-placement="bottom" >
		  Popover on right</button>
	</div-->
	<!--button type="button" class="btn btn-lg btn-danger" 
        data-toggle="popover" title="Popover title" 
        data-content="And here's some amazing content. It's very engaging. Right?">
  	Click to toggle popover
	</button-->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Brand</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu" id="listItinirary">
	            <li><a href="#">Action</a></li>
	            <ul class="dropdown-menu" role="menu">
	            	<li><a href="#">Another action</a></li>
	            </ul>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	            <li class="divider"></li>
	            <li><a href="#">One more separated link</a></li>
	          </ul>
	        </li>
	      </ul>

	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input id="inputBudgetDinamic" type="text" class="form-control" placeholder="Your budget">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	       	<li id="popoverEdit1">
		        
			        <a  type="button" class="btn buttonAtasToggle" data-container="#popoverEdit1" data-placement="bottom"		
			        data-toggle="popover">Trip</a>
		     
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div id="myModal" class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title">How many budget do you have?</h4>
	            </div>
	            <div class="modal-body">
	                <input id="inputBudget"type="text" class="form-control" placeholder="Text input">
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                <button id="saveInputBudget"type="button" class="btn btn-primary">Save changes</button>
	            </div>
	        </div>
	    </div>
	</div>
		<!--button id="somebutton" type="button" class="btn btn-danger haha">Action</button>
		<button id="somebutton1" type="button" class="btn btn-danger haha">Action</button>
		<button id="somebutton2" type="button" class="btn btn-danger haha">Test</button>
		<button type="button" id="popOverOnBottom" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="bottom">
  Popover on bottom
	</button-->
		<?php
			// foreach($cars as $key => $value)
			// {
			// 	echo "<button id=\"somebutton\" type=\"button\" class=\"btn btn-danger\">".$value."</button>";
			// }
		?>
		<!--button class="btn btn-inverse" id="testpopover" data-placement="right" data-toggle="popover">John Doe</button-->
		<div class=container>
			<div class="row" id="row1">
				
			</div>
			<!--div class="dropdown">
			  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
			    Dropdown
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
			  	<?php
			  // 		foreach ($query->result() as $row) 
			  // 		{
					// 	echo "<li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"#\">".$row->A."</a></li>";
					// }
			  	?>
			  </ul>
			</div-->
		</div>
		<div class="row" id="row2">
			<?php
					// foreach ($cars as $key => $value) {
					// 	echo "<div class=\"col-md-3\"><button type=\"button\" class=\"btn btn-primary mobil\">".$value."</button></div>";
					// }
			?>
		</div>
		<div class="row" id="row3"></div>
		<?php

		?>
		
		<div id="valuess"></div>
		<!--button class="btn btn-inverse" onclick="tetot()">try to click me</button>

		<br><br>
		<button id="right" class="btn btn-primary" data-placement="bottom" data-toggle="popover">Click me before 6 seconds</button>
		<br><br-->
		<div class="bs-example">
		<div class="container-fluid">
			<div class="row">
				<div id="blogMain" class="col-md-6 canScrollMain" >
				<?php
					echo "<table class='table table-hover'>";
					foreach ($query->result() as $row) {
						# code...
						echo "<tr><td style='width:100px;'><img src='../assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>".$row->place_name."<br>".$row->weekday_price."<br><button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\"".$row->place_name."\" onclick=\"fui(".$row->weekday_price.",'".$row->place_name."')\"".$row->place_name."\">".$row->weekday_price."</button><br><a class='toZoom' onclick='return setMapLocationZoom(\"".$row->place_name."\")'>see location in map<a></td></tr>";
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
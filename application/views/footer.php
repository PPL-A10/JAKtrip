<footer>
	<div class="container-fluid">
		<div class="col-lg-12">
				<div class="col-md-1"><img src="<?php echo base_url('assets/img/logo2.png');?>" class="img-responsive" /></div>
				<div class="row">
					<span class="tuffyh3 col-md-6">Explore fun places within your budget in Jakarta</span>
					<ul class="linkfooter nav navbar-nav navbar-left col-md-6">
						<li><a class="linkfooter" href="about.html">About</a></li>
						<li><a href="<?php echo base_url('contactus');?>">Contact Us</a></li>
						<li><a href="<?php echo base_url('faq');?>">F.A.Q</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Site Map</a></li>
						<li><a href="#">Mobile</a></li>
					</ul>
				</div>
		</div>
	</div>
</footer>


<script src="<?php echo base_url('assets/js/ion.rangeSlider.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js')?>"></script>
<!--script src="<?php //echo base_url('assets/js/gmaps.js')?>"></script-->
<script src="<?php echo base_url('assets/js/jquery.smartmenus.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/notifjaktrip.js')?>"></script>
<script src="<?php echo base_url('assets/js/jsjaktrip.js')?>"></script>
<script src="<?php echo base_url('assets/js/classie.js')?>"></script>
<script src="<?php echo base_url('assets/js/modernizr.custom.js')?>"></script>
<script src="<?php echo base_url('assets/js/notificationFx.js')?>"></script>


	
		<script>	
	var lokasi = "All";
	function setLokasi(city){
		lokasi=city;
	}
	function setphotopublish(id_pic){		
		//document.getElementById("output_field123").innerHTML = "You selected: 1dfsdsdfgdfgdfgdfvbdfgbffvbfgbb" ;	

		
				jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/SuggestionCtr/publish/"+id_pic,
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";

								for (var i=0 ; i<obj.query.length; i++){
								//$("#output_field123").html("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa "+id_pic);	
									if(obj.query[i].is_publish == 0)
									{resultQuery = resultQuery +  "<tr><td>"+obj.query[i].place_name+"</td><td>"+obj.query[i].pic+"</td><td>ahmadibrahim</td><td><a href='javascript:setphotopublish("+obj.query[i].id_pic+")'>&nbsp;&nbsp;Publish?</a></td>";}
									else
									{resultQuery = resultQuery +  "<tr><td>"+obj.query[i].place_name+"</td><td>"+obj.query[i].pic+"</td><td>ahmadibrahim</td><td><span class='fa fa-trash-o'></span>&nbsp;&nbsp;Published</td>";}
								}
								
							$("#output_field123").html(resultQuery);
//								$("#output_field").html(obj.query[0].place_name;
	}
							
				            }
                        }
                    );
	}
	
	function filterFunctionTour(input){		
		//document.getElementById("output_field").innerHTML = "You selected: 1dfsdsdfgdfgdfgdfvbdfgbffvbfgbb" ;	
		//var y = document.getElementById("category_select").value;
		//var z = document.getElementById("name_select").value;
		//$("#output_field").html("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa "+input);	
		jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/ManageTourAttrCtr/searchtour/"+input,
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";
								for (var i=0 ; i<obj.tourattr.length; i++){
									resultQuery = resultQuery +  "<tr><td>"+ obj.tourattr[i].place_name +"</td><td>"+ obj.tourattr[i].author +"</td><td>"+ obj.cat[i] +"</td><td>"+ obj.tourattr[i].last_modified +"</td><td>"+ obj.tourattr[i].hits +"</td><td><a href='admin/places/delete/"+obj.tourattr[i].place_name+"' class='link-class'><span class='fa fa-trash-o'></span>&nbsp;&nbsp;Delete</a></td><td><a href='admin/places/edit/"+obj.tourattr[i].place_name+"' class='link-class'><span class='fa fa-pencil'></span>&nbsp;&nbsp;Edit</a></td><td><a href=''><span class='fa fa-eye'></span>&nbsp;&nbsp;View</a></td></tr>"	;
									//resultQuery = resultQuery + obj.query[i].username;
								}
								
							$("#output_field").html(resultQuery);
//								$("#output_field").html(obj.query[0].place_name;
	}
							
				            }
                        }
                    );
	}
	
	function filterFunctionFinal2(input){		
		//document.getElementById("output_field").innerHTML = "You selected: 1dfsdsdfgdfgdfgdfvbdfgbffvbfgbb" ;	
		//var y = document.getElementById("category_select").value;
		//var z = document.getElementById("name_select").value;
			//$("#output_field").html("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa "+inpu);	
		jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/ManageMemberCtr/searchwisataKey2/"+input,
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";
								for (var i=0 ; i<obj.query.length; i++){
									resultQuery = resultQuery +  "<tr><td><input type='checkbox' value=''></td><td>"+obj.query[i].username+"</td><td>"+obj.query[i].email+"</td><td></td><td>"+obj.query[i].join_date+"</td><td></td><td>"+obj.query[i].last_active+"</td><td><a href='manageMemberCtr/del/"+obj.query[i].username+"' class='link-class'><span class='fa fa-trash-o'></span>&nbsp;&nbsp;Delete</a></td></tr>";
									//resultQuery = resultQuery + obj.query[i].username;
								}
								
							$("#output_field").html(resultQuery);
//								$("#output_field").html(obj.query[0].place_name;
	}
							
				            }
                        }
                    );
	}

		function deleteFunction(id,tempat){
//$("#isi_field").html(id+"asakslndskjbddsbcsdkbckdsbskdvjnsdkjvnsdkjvn"+tempat);
//window.location.reload();

		jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/ReviewCtr/del/"+tempat+"/"+id,
				        success: function(res) {
				           if (res)
				            {
								//$("#isi_field").html(id+"asakslndskjbddsbcsdkbckdsbskdvjnsdkjvnsdkjvn"+tempat);
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";
								for (var i=0 ; i<obj.query2.length; i++){
									if(obj.query2[i].rate == 0){
									resultQuery = resultQuery + "<div class='reviewmember col-lg-12'><div class='reviewkiri col-lg-4'><div class='ava'><img src='/JAKtrip/assets/img/50.jpg'/></div><div class='author' ><b>"+obj.query2[i].username+"</b></div><div class='hasreviewed'>Reviewed 7 places</div></div><div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o' ></span><span class='fa fa-star-o'></span><a href='javascript:deleteFunction("+'"'+obj.query2[i].id_rate+'","'+obj.query2[i].place_name+'"'+")'><span class='deleterev close fa fa-trash-o' id='nilaiid' value=''></span></a><br><span class='judulreview tuffyh3a' id='judul'><p>"+obj.query2[i].title+"</p></span><br><span class='isireview' id='isireview'><p>"+obj.query2[i].review+"</p></span></div></div>";}

									if(obj.query2[i].rate == 1){
									resultQuery = resultQuery + "<div class='reviewmember col-lg-12'><div class='reviewkiri col-lg-4'><div class='ava'><img src='/JAKtrip/assets/img/50.jpg'/></div><div class='author' ><b>"+obj.query2[i].username+"</b></div><div class='hasreviewed'>Reviewed 7 places</div></div><div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><a href='javascript:deleteFunction("+'"'+obj.query2[i].id_rate+'","'+obj.query2[i].place_name+'"'+")'><span class='deleterev close fa fa-trash-o' id='nilaiid' value=''></span></a><br><span class='judulreview tuffyh3a' id='judul'><p>"+obj.query2[i].title+"</p></span><br><span class='isireview' id='isireview'><p>"+obj.query2[i].review+"</p></span></div></div>";}

									if(obj.query2[i].rate == 2){
									resultQuery = resultQuery + "<div class='reviewmember col-lg-12'><div class='reviewkiri col-lg-4'><div class='ava'><img src='/JAKtrip/assets/img/50.jpg'/></div><div class='author' ><b>"+obj.query2[i].username+"</b></div><div class='hasreviewed'>Reviewed 7 places</div></div><div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><a href='javascript:deleteFunction("+'"'+obj.query2[i].id_rate+'","'+obj.query2[i].place_name+'"'+")'><span class='deleterev close fa fa-trash-o' id='nilaiid' value=''></span></a><br><span class='judulreview tuffyh3a' id='judul'><p>"+obj.query2[i].title+"</p></span><br><span class='isireview' id='isireview'><p>"+obj.query2[i].review+"</p></span></div></div>";}

									if(obj.query2[i].rate == 3){
									resultQuery = resultQuery + "<div class='reviewmember col-lg-12'><div class='reviewkiri col-lg-4'><div class='ava'><img src='/JAKtrip/assets/img/50.jpg'/></div><div class='author' ><b>"+obj.query2[i].username+"</b></div><div class='hasreviewed'>Reviewed 7 places</div></div><div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><a href='javascript:deleteFunction("+'"'+obj.query2[i].id_rate+'","'+obj.query2[i].place_name+'"'+")'><span class='deleterev close fa fa-trash-o' id='nilaiid' value=''></span></a><br><span class='judulreview tuffyh3a' id='judul'><p>"+obj.query2[i].title+"</p></span><br><span class='isireview' id='isireview'><p>"+obj.query2[i].review+"</p></span></div></div>";}

									if(obj.query2[i].rate == 4){
									resultQuery = resultQuery + "<div class='reviewmember col-lg-12'><div class='reviewkiri col-lg-4'><div class='ava'><img src='/JAKtrip/assets/img/50.jpg'/></div><div class='author' ><b>"+obj.query2[i].username+"</b></div><div class='hasreviewed'>Reviewed 7 places</div></div><div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><a href='javascript:deleteFunction("+'"'+obj.query2[i].id_rate+'","'+obj.query2[i].place_name+'"'+")'><span class='deleterev close fa fa-trash-o' id='nilaiid' value=''></span></a><br><span class='judulreview tuffyh3a' id='judul'><p>"+obj.query2[i].title+"</p></span><br><span class='isireview' id='isireview'><p>"+obj.query2[i].review+"</p></span></div></div>";}

									if(obj.query2[i].rate == 5){
									resultQuery = resultQuery + "<div class='reviewmember col-lg-12'><div class='reviewkiri col-lg-4'><div class='ava'><img src='/JAKtrip/assets/img/50.jpg'/></div><div class='author' ><b>"+obj.query2[i].username+"</b></div><div class='hasreviewed'>Reviewed 7 places</div></div><div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><a href='javascript:deleteFunction("+'"'+obj.query2[i].id_rate+'","'+obj.query2[i].place_name+'"'+")'><span class='deleterev close fa fa-trash-o' id='nilaiid' value=''></span></a><br><span class='judulreview tuffyh3a' id='judul'><p>"+obj.query2[i].title+"</p></span><br><span class='isireview' id='isireview'><p>"+obj.query2[i].review+"</p></span></div></div>";}
									//resultQuery= resultQuery + obj.query[i].place_name;
								}
								//$("#output_field").html("http://localhost/JAKtrip/index.php/AllplacesCtr/"+x);
							$("#isi_field").html(resultQuery);
//								$("#output_field").html(obj.query[0].place_name;
//$("#isi_field").html(id+"asakslndskjbddsbcsdkbckdsbskdvjnsdkjvnsdkjvn"+tempat);
							//location.reload();
							}
						//	window.location.reload();
				            }
                        }
                    );
					//location.reload();
					//window.location.reload();
	}

	function myFunction() {
		
	var x = document.getElementById("range");
    var defaultVal = x.defaultValue;
    var currentVal = x.value;
	var res = currentVal.split(";");
	var min = res[0];
	var max = res[1];
//$("#output_field").html(min+ "   fsdfsdfmsdkplfmsdfmsdokf  "+max);
	
			jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/AllplacesCtr/searchwisataprice/"+min+"/"+max,
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";
								for (var i=0 ; i<obj.query.length; i++){
									resultQuery = resultQuery +"<div class='col-lg-3 containerimg'><a href='place/"+obj.query[i].place_name+"'><div class='txtonimg'>"+obj.query[i].place_name+"</div><img class='img-responsive' src='<?php echo base_url('assets/img/image.png');?>'/></a></div>";
								}
								
							$("#output_field").html(resultQuery);
//								$("#output_field").html(obj.query[0].place_name;
	}
							
				            }
                        }
                    );
}

function sortFunction(){

		var x = document.getElementById("sort_select").value;
		var y = document.getElementById("category_select").value;
		var z = document.getElementById("name_select").value;
		//$("#output_field").html("http://localhost/JAKtrip/index.php/AllplacesCtr/"+x);
		jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/AllplacesCtr/"+x+"/"+y+"/"+lokasi+"/"+z,
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";
								for (var i=0 ; i<obj.query.length; i++){
									resultQuery = resultQuery +"<div class='col-lg-3 containerimg'><a href='place/"+obj.query[i].place_name+"'><div class='txtonimg'>"+obj.query[i].place_name+"</div><img class='img-responsive' src='<?php echo base_url('assets/img/image.png');?>'/></a></div>";
								}
								//$("#output_field").html("http://localhost/JAKtrip/index.php/AllplacesCtr/"+x);
							$("#output_field").html(resultQuery);
//								$("#output_field").html(obj.query[0].place_name;
	}
							
				            }
                        }
                    );
	}	

	function filter(city){		
		//document.getElementById("output_field").innerHTML = "You selected: 1dfsdsdfgdfgdfrgergregergwergwergwreggdfvbdfgbffvbfgbb" ;
		setLokasi(city);
		jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/AllplacesCtr/searchwisataLoc/"+city,
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";
								for (var i=0 ; i<obj.query.length; i++){
									resultQuery = resultQuery +"<div class='col-lg-3 containerimg'><a href='place/"+obj.query[i].place_name+"'><div class='txtonimg'>"+obj.query[i].place_name+"</div><img class='img-responsive' src='<?php echo base_url('assets/img/image.png');?>'/></a></div>";
								}
								
							$("#output_field").html(resultQuery);
//								$("#output_field").html(obj.query[0].place_name;
	}
							
				            }
                        }
                    );
	}
	
	function filterpromo(city){		
		//document.getElementById("output_field").innerHTML = "You selected: 1dfsdsdfgdfgdfrgergregergwergwergwreggdfvbdfgbffvbfgbb" +city ;
		setLokasi(city);
		jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/AllPromosCtr/searchpromoloc/"+city,
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";
								for (var i=0 ; i<obj.query.length; i++){
									resultQuery = resultQuery +"<div class='col-lg-3 containerimg'><a href='place/"+obj.query[i].title+"'><div class='txtonimg'>"+obj.query[i].title+"</div><img class='img-responsive' src='<?php echo base_url('assets/img/image.png');?>'></a></div>";
								}
								
							$("#output_field").html(resultQuery);
//								$("#output_field").html(obj.query[0].place_name;
	}
							
				            }
                        }
                    );
	}

	function filterFunctionFinal(){		
		//document.getElementById("output_field").innerHTML = "You selected: 1dfsdsdfgdfgdfgdfvbdfgbffvbfgbb" ;		
		//var x = document.getElementById("category_select").value;
		//var y = "Jakarta%20Timur";
		//var z = document.getElementById("name_select").value;
		//$("#output_field").html("asasdslkdnjsdljknsdkjnsdkjnsdkjn");
		var y = document.getElementById("category_select").value;
		var z = document.getElementById("name_select").value;
		
				//$("#output_field").html("asasdslkdnjsdljknsdkjnsdkjnsdkjn"+y+"dsdsd"+z + "dsds"+lokasi);
		jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/AllplacesCtr/searchwisataCatLocKey/"+y+"/"+lokasi+"/"+z,
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";
								for (var i=0 ; i<obj.query.length; i++){
									resultQuery = resultQuery +"<div class='col-lg-3 containerimg'><a href='place/"+obj.query[i].place_name+"'><div class='txtonimg'>"+obj.query[i].place_name+"</div><img class='img-responsive' src='<?php echo base_url('assets/img/image.png');?>'/></a></div>";
								}
								
							$("#output_field").html(resultQuery);
//								$("#output_field").html(obj.query[0].place_name;
	}
							
				            }
                        }
                    );
	}
	
function filterFunctionpromo(){		
		var z = document.getElementById("name_select").value;
		//$("#output_field").html("asasdslkdnjsdljknsdkjnsdkjnsdkjndsdsd"+z + "dsds"+lokasi);
		jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/AllPromosCtr/searchpromokey/"+lokasi+"/"+z,
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";
								for (var i=0 ; i<obj.query.length; i++){
									resultQuery = resultQuery +"<div class='col-lg-3 containerimg'><a href='place/"+obj.query[i].title+"'><div class='txtonimg'>"+obj.query[i].title+"</div><img class='img-responsive' src='<?php echo base_url('assets/img/image.png');?>'></a></div>";
								}
								
							$("#output_field").html(resultQuery);
//								$("#output_field").html(obj.query[0].place_name;
	}
							
				            }
                        }
                    );
	}
	
	</script>

	<script>
	<?php foreach($query as $row){$lat = $row->lattitude;$long = $row->longitude;$place = $row->place_name;} ?>
	var myCenter=new google.maps.LatLng(<?php echo $long; ?>,<?php echo $lat; ?>);

	function initialize2() {
		  var mapProp = {
		    center:new google.maps.LatLng(-6.190035,106.838075),
		    zoom:11,
		    mapTypeId:google.maps.MapTypeId.ROADMAP
		  };

		  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
		  
		  var marker=new google.maps.Marker({
		  position:myCenter,
		  animation:google.maps.Animation.BOUNCE
		  });
			marker.setMap(map);
			
		  var infowindow = new google.maps.InfoWindow({
			  content:"<?php echo $place; ?>"
			  });
			  infowindow.open(map,marker);
			  google.maps.event.addListener(marker, 'click', function() {
			  infowindow.open(map,marker);
			  });
			}
		google.maps.event.addDomListener(window, 'load', initialize2);
</script>

<script>
	    $(document).ready(function() {
		
 // --------------------- HOME -----------------------------------

		    $("#showRec, #showOwntr").hide();
		    $("#recomm").click(function () {
		        $('#showRec').toggle();
		        $('#showOwntr').hide();
		    });
		    $("#owntr").click(function () {
		        $('#showOwntr').toggle();
		        $('#showRec').hide();
		    });
		});

 // --------------------- ADMIN/STATISTICS ------------------------------------
 		$(document).ready(function() {
		    $("#livis > a").css("color", "#fff");
			$("#livis > a").css("background-color", "#db2719"); 
			$("#rating").hide();
		   	$("#budget").hide();
			$("#visitors").show();

			$('.fak > li > a').click(function(e){
		    	e.preventDefault();
			    $('.fak > li > a').css("background-color", "");
			    $('.fak > li > a').css("color", "");
			    $(this).css("color", "#fff");
			    $(this).css("background-color", "#db2719");  
			});

			$("#livis").click(function(){
		    	$("#rating").hide();
		    	$("#budget").hide();
			    $("#visitors").show();
			});
			$("#lirat").click(function(){
		    	$("#visitors").hide();
		    	$("#budget").hide();
			    $("#rating").show();
			});
			$("#libud").click(function(){
		    	$("#rating").hide();
		    	$("#visitors").hide();
			    $("#budget").show();
			});
		});

 // --------------------- MENU ADMIN ------------------------------------
 		$(document).ready(function() {
			if(window.location.pathname == '/JAKtrip/admin/places'){
	            $("#sm-pla").css("color", "#db2719");
				$("#sm-pla").css("padding-bottom", "15px"); 
				$("#sm-pla").css("border-bottom", "solid 5px #db2719"); 
            }
            else if(window.location.pathname == '/JAKtrip/admin/promo'){
	            $("#sm-pro").css("color", "#db2719");
				$("#sm-pro").css("padding-bottom", "15px"); 
				$("#sm-pro").css("border-bottom", "solid 5px #db2719"); 
            }
            else if(window.location.pathname == '/JAKtrip/admin/members'){
	            $("#sm-mem").css("color", "#db2719");
				$("#sm-mem").css("padding-bottom", "15px"); 
				$("#sm-mem").css("border-bottom", "solid 5px #db2719"); 
            }
            else if(window.location.pathname == '/JAKtrip/admin/suggestions'){
	            $("#sm-sug").css("color", "#db2719");
				$("#sm-sug").css("padding-bottom", "15px"); 
				$("#sm-sug").css("border-bottom", "solid 5px #db2719"); 
            }
            else if(window.location.pathname == '/JAKtrip/admin/feedback'){
	            $("#sm-fee").css("color", "#db2719");
				$("#sm-fee").css("padding-bottom", "15px"); 
				$("#sm-fee").css("border-bottom", "solid 5px #db2719"); 
            }
            else if(window.location.pathname == '/JAKtrip/admin/spam'){
	            $("#sm-spa").css("color", "#db2719");
				$("#sm-spa").css("padding-bottom", "15px"); 
				$("#sm-spa").css("border-bottom", "solid 5px #db2719"); 
            }
            else if(window.location.pathname == '/JAKtrip/admin/statistics'){
	            $("#sm-sta").css("color", "#db2719");
				$("#sm-sta").css("padding-bottom", "15px"); 
				$("#sm-sta").css("border-bottom", "solid 5px #db2719"); 
            }
            else{
            	;
            }
        });
		

 // --------------------- ADMIN/SUGGESTIONS ------------------------------------
 		$(document).ready(function() {

		    $("#liplac > a").css("color", "#fff");
			$("#liplac > a").css("background-color", "#db2719"); 
			$("#places").show();
			$("#photos").hide();

			$('.fak > li > a').click(function(e){
		    	e.preventDefault();
			    $('.fak > li > a').css("background-color", "");
			    $('.fak > li > a').css("color", "");
			    $(this).css("color", "#fff");
			    $(this).css("background-color", "#db2719");  
			});

			$("#liplac").click(function(){
		    	$("#photos").hide();
			    $("#places").show();
			});
			$("#liphot").click(function(){
		    	$("#places").hide();
			    $("#photos").show();
			});
		});

 // --------------------- PLACE -----------------------------------
 		$(document).ready(function() {

			$("#addphoform").hide();
		    $("#addphobtn").click(function(){
			    $("#addphoform").toggle();
			    $(this).text(function(i, text){
			          return text === "ADD NEW PHOTO(S)" ? "CLOSE FORM" : "ADD NEW PHOTO(S)";
			      });
		    });
		});

 // --------------------- USER -----------------------------------
 		$(document).ready(function() {
 			$("#wishlist").hide();
	    	$("#achievement").hide();
	    	$("#reviews").hide();
		    $("#trips").show();

		    $("#litrip > a").css("color", "#fff");
			$("#litrip > a").css("background-color", "#db2719"); 

		    $('.navprofile > li > a').click(function(e){
		    	e.preventDefault();
			    $('.navprofile > li > a').css("background-color", "");
			    $('.navprofile > li > a').css("color", "");
			    $(this).css("color", "#fff");
			    $(this).css("background-color", "#db2719");  
			});

 			$("#litrip").click(function(){
		    	$("#wishlist").hide();
		    	$("#achievement").hide();
		    	$("#reviews").hide();
			    $("#trips").show();
			});

			$("#liwish").click(function(){
		    	$("#wishlist").show();
		    	$("#achievement").hide();
		    	$("#reviews").hide();
			    $("#trips").hide();
			});

			$("#liachi").click(function(){
		    	$("#wishlist").hide();
		    	$("#achievement").show();
		    	$("#reviews").hide();
			    $("#trips").hide();
			});

			$("#lirevi").click(function(){
		    	$("#wishlist").hide();
		    	$("#achievement").hide();
		    	$("#reviews").show();
			    $("#trips").hide();
			});
		});

 // --------------------- WISHLIST/ACHIEVEMENT -----------------------------------
 		

 // --------------------- CONTACT US -----------------------------------
$(document).ready(function() {
 			$("#formfeedback").show();
		    $("#formsuggestion").hide();

		  	$("input[name=jenis]:radio").on('change',function() {
				if(this.value=='suggestion') {
			            $("#formsuggestion").show();
			            $("#formfeedback").hide();
				} else {
			            $('#formsuggestion').hide();
			            $("#formfeedback").show();
			    } 
			}); 


});


	</script>

	<script>
	function filterFunctionFinalMember(){		
		//document.getElementById("output_field").innerHTML = "You selected: 1dfsdsdfgdfgdfgdfvbdfgbffvbfgbb" ;	
		
		var z = document.getElementById("name_select").value;
			//$("#output_field").html("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa "+ z);	
		jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/ManageMemberCtr/searchwisataKey/"+z,
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";
								for (var i=0 ; i<obj.query.length; i++){
									resultQuery = resultQuery +  "<tr><td><input type='checkbox' value=''></td><td>"+obj.query[i].username+"</td><td>"+obj.query[i].email+"</td><td></td><td>"+obj.query[i].join_date+"</td><td></td><td>"+obj.query[i].last_active+"</td><td><a href='localhost/JAKtrip/ManageMemberCtr/del/"+obj.query[i].username+"' class='link-class'><soan class='fa fa-trash-o'></span>&nbsp;&nbsp;Delete</a></td></tr>";
									//resultQuery = resultQuery + obj.query[i].username;
								}
								
							$("#output_field").html(resultQuery);
//								$("#output_field").html(obj.query[0].place_name;
	}
							
				            }
                        }
                    );
	}
	
		function filterFunctionFinalTour(){		
		//document.getElementById("output_field").innerHTML = "You selected: 1dfsdsdfgdfgdfgdfvbdfgbffvbfgbb" ;	
		
		var z = document.getElementById("name_select").value;
			//$("#output_field").html("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa "+ z);	
		jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/ManageTourAttrCtr/searchkeywordtour/"+z,
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";
								for (var i=0 ; i<obj.tourattr.length; i++){
									resultQuery = resultQuery +  "<tr><td>"+ obj.tourattr[i].place_name +"</td><td>"+ obj.tourattr[i].author +"</td><td>"+ obj.cat[i] +"</td><td>"+ obj.tourattr[i].last_modified +"</td><td>"+ obj.tourattr[i].hits +"</td><td><a href='admin/places/delete/"+obj.tourattr[i].place_name+"' class='link-class'><span class='fa fa-trash-o'></span>&nbsp;&nbsp;Delete</a></td><td><a href='admin/places/edit/"+obj.tourattr[i].place_name+"' class='link-class'><span class='fa fa-pencil'></span>&nbsp;&nbsp;Edit</a></td><td><a href=''><span class='fa fa-eye'></span>&nbsp;&nbsp;View</a></td></tr>"	;
									//resultQuery = resultQuery + obj.query[i].username;
								}
								
							$("#output_field").html(resultQuery);
//								$("#output_field").html(obj.query[0].place_name;
	}
							
				            }
                        }
                    );
	}
	</script>

</body>
</html>
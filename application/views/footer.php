<footer>
	<div class="container-fluid">
		<div class="col-lg-12">
				<div class="col-md-1"><img src="<?php echo base_url('assets/img/logo2.png');?>" class="img-responsive" /></div>
				<div class="row">
					<span class="tuffyh3 col-md-6">Explore fun places within your budget in Jakarta</span>
					<ul class="linkfooter nav navbar-nav navbar-left col-md-6">
						<li><a class="linkfooter" href="about.html">About</a></li>
						<li><a href="<?php echo base_url('index.php/FeedbackCtr');?>">Contact Us</a></li>
						<li><a href="<?php echo base_url('index.php/FaqCtr');?>">F.A.Q</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Site Map</a></li>
						<li><a href="#">Mobile</a></li>
					</ul>
				</div>
		</div>
	</div>
</footer>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/ion.rangeSlider.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js')?>"></script>

<script src="<?php echo base_url('assets/js/jquery.smartmenus.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/menuselector.js')?>"></script>
<script src="<?php echo base_url('assets/js/jsjaktrip.js')?>"></script>


		<script>

		var lokasi = "";
	
	function setLokasi(city){
		lokasi=city;
	}
	function filterFunctionFinal2(){		
		//document.getElementById("output_field").innerHTML = "You selected: 1dfsdsdfgdfgdfgdfvbdfgbffvbfgbb" ;	
		var y = document.getElementById("category_select").value;
		var z = document.getElementById("name_select").value;
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
									resultQuery = resultQuery +  "<tr><td><input type='checkbox' value=''></td><td>"+obj.query[i].username+"</td><td>"+obj.query[i].email+"</td><td></td><td>"+obj.query[i].join_date+"</td><td></td><td>"+obj.query[i].last_active+"</td><td><a href='localhost/JAKtrip/ManageMemberCtr/del/"+obj.query[i].username+"' class='link-class'><span class='fa fa-trash-o'></span>&nbsp;&nbsp;Delete</a></td></tr>";
									//resultQuery = resultQuery + obj.query[i].username;
								}
								
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
									resultQuery = resultQuery +"<div class='col-lg-3 containerimg'><a href='javascript:filterFunctionFinal("+obj.query[i].city+")'><div class='txtonimg'>"+obj.query[i].place_name+"</div><img class='img-responsive' src='../assets/img/image.png'/></a></div>";
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
									resultQuery = resultQuery +"<div class='col-lg-3 containerimg'><a href='DetailCtr/"+obj.query[i].place_name+"'><div class='txtonimg'>"+obj.query[i].place_name+"</div><img class='img-responsive' src='../assets/img/image.png'/></a></div>";
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
									resultQuery = resultQuery +"<div class='col-lg-3 containerimg'><a href='DetailCtr/"+obj.query[i].place_name+"'><div class='txtonimg'>"+obj.query[i].place_name+"</div><img class='img-responsive' src='../assets/img/image.png'/></a></div>";
								}
								//$("#output_field").html("http://localhost/JAKtrip/index.php/AllplacesCtr/"+x);
							$("#output_field").html(resultQuery);
//								$("#output_field").html(obj.query[0].place_name;
	}
							
				            }
                        }
                    );
	}
	</script>

	<script>
	    $(document).ready(function () {
		    $("#showRec, #showOwntr").hide();
		    $("#recomm").click(function () {
		        $('#showRec').show();
		        $('#showOwntr').hide();
		    });
		    $("#owntr").click(function () {
		        $('#showOwntr').show();
		        $('#showRec').hide();
		    });
		});
	</script>

</body>
</html>
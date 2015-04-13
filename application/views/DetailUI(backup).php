<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/JAKtrip/assets/css/normalize.css" type="text/css" rel="stylesheet"/>
	<link href="/JAKtrip/assets/css/bootstrap.sandstone.css" type="text/css" rel="stylesheet"/>
	<link href="/JAKtrip/assets/css/font-awesome.css" type="text/css" rel="stylesheet"/>
	<link href="/JAKtrip/assets/css/jaktrip.css" type="text/css" rel="stylesheet"/>
	<link href="/JAKtrip/assets/css/sm-core-css.css" type="text/css" rel="stylesheet"/>
	<link href="/JAKtrip/assets/css/sm-clean.css" type="text/css" rel="stylesheet"/>

	<style>
		header{
			background-image: url('/JAKtrip/assets/img/header.png');
			height: 530px;
		}

		@font-face { 
			font-family: Tuffy; 
			src: url('/JAKtrip/assets/fonts/Tuffy.otf');
		}

		@font-face { 
			font-family: TuffyBold; 
			src: url('/JAKtrip/assets/fonts/Tuffy_Bold.otf');
		}

		@font-face { 
			font-family: Lato; 
			src: url('/JAKtrip/assets/fonts/lato-regular.ttf');
		}

		@font-face { 
			font-family: LatoBlack; 
			src: url('/JAKtrip/assets/fonts/lato-black.ttf');
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
	      <a class="navbar-brand" href="index.html" style="background-image: url('/JAKtrip/assets/img/logo.png')"></a>
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

	
		<div class="col-lg-6"></div>

		<div class="col-lg-6 rating">
			<div class="row">
				<div class="col-lg-12 redbar">
					<a class="text-danger" href="#"><span class="fa fa-angle-left" style="font-size: 28px; vertical-align:middle;"></span>
					<span class="tuffyh3" id="namatempat" style="vertical-align:middle;">&nbsp; Eco Cruise</span></a>
				</div>
				<div class="col-lg-12 headerdetail"><img src="/JAKtrip/assets/img/hd.gif"/>
				</div>

				<ul id="main-menu" class="sm sm-clean submenu nav navbar-nav detail" style="margin: -7px 0px; ">
				<li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
				<li><a href="#info" class="submenua" >Information</a></li>
		        <li><a href="#photos" class="submenua" >Photos</a></li>
		        <li><a href="#reviews" class="submenua" >Reviews</a></li>
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
				   <li><span class="fa fa-google-plus-square icondetail"></span>
				   <span class="fa fa-twitter-square icondetail"></span>
				   <span class="fa fa-facebook-square icondetail"></span>
				   <span class="fa fa-check-circle icondetail"></span>
				   <span class="fa fa-heart icondetail"></span></li>
				<button onclick="getReview()">Try it</button>
				</ul>

				<section id="info" class="textdetail" >
					<div>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
					dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
					dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
					</div>
				</section>
				<section id="photos" class="textdetail tabcontent hide">
					<div>
					Gallery photos
					</div>
				</section>
				<section id="reviews" class="textdetail tabcontent hide" >
					<div class="reviewmember col-lg-12">
						<button class="btn btn-warning col-lg-11" type="submit">ADD NEW REVIEW</button><br>
						<div class="reviewkiri col-lg-4">
							<div class="ava"><img src="/JAKtrip/assets/img/50.jpg"/></div>
							<div class="author" id="namauser"><b>Ahmad Ibrahim</b></div>
							<div class="hasreviewed">Reviewed 7 places</div>
						</div>
						<div class="reviewkanan col-lg-8" style="margin-left:-20px; padding-top: 10px;">
		  						<span class="fa fa-star" style="color: #F7E51E"></span><span class="fa fa-star" style="color: #F7E51E"></span><span class="fa fa-star" style="color: #F7E51E"></span>
						    	<span class="fa fa-star-o" ></span><span class="fa fa-star-o"></span>
						    	<span class="deleterev close fa fa-trash-o"><a href=""></a></span>
						    	<br>
						    	<span class="judulreview tuffyh3a" id="temareview">Tempatnya super menarik!</span><br>
						    	<span class="isireview" id="deskripsireview">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
						    		incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
						    		ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, quis nostrud exercitation 
						    		ullamco.
						    	</span>
						</div>
					</div>

					<div class="reviewmember col-lg-12">
						<div class="reviewkiri col-lg-4">
							<div class="ava"><img src="/JAKtrip/assets/img/50.jpg"/></div>
							<div class="author"><b>Ahmad Ibrahim</b></div>
							<div class="hasreviewed">Reviewed 7 places</div>
						</div>
						<div class="reviewkanan col-lg-8" style="margin-left:-20px; padding-top: 10px;">
		  						<span class="fa fa-star" style="color: #F7E51E"></span><span class="fa fa-star" style="color: #F7E51E"></span><span class="fa fa-star" style="color: #F7E51E"></span>
						    	<span class="fa fa-star-o" ></span><span class="fa fa-star-o"></span>
						    	<span class="deleterev close fa fa-trash-o"><a href=""></a></span><br>
						    	<span class="judulreview tuffyh3a">Tempatnya super menarik!</span><br>
						    	<span class="isireview">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
						    		incididunt ut labore et dolore magna aliqua. 
						    	</span>
						</div>
					</div>

					<div class="reviewmember col-lg-12">
						<div class="reviewkiri col-lg-4">
							<div class="ava"><img src="/JAKtrip/assets/img/50.jpg"/></div>
							<div class="author"><b>Ahmad Ibrahim</b></div>
							<div class="hasreviewed">Reviewed 7 places</div>
						</div>
						<div class="reviewkanan col-lg-8" style="margin-left:-20px; padding-top: 10px;">
		  						<span class="fa fa-star" style="color: #F7E51E"></span><span class="fa fa-star" style="color: #F7E51E"></span><span class="fa fa-star" style="color: #F7E51E"></span>
						    	<span class="fa fa-star-o" ></span><span class="fa fa-star-o"></span>
						    	<span class="deleterev close fa fa-trash-o"><a href=""></a></span><br>
						    	<span class="judulreview tuffyh3a">Tempatnya super menarik!</span><br>
						    	<span class="isireview">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
						    		incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
						    		ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, quis nostrud exercitation 
						    		ullamco laboris nisi ut aliquip ex ea commodo consequat. 
						    	</span>
						</div>
					</div>

				</section>
			</div>

		</div>

	
	<footer>
		<div class="container-fluid">
			<div class="col-lg-12">
					<div class="col-md-1"><img src="/JAKtrip/assets/img/logo2.png" class="img-responsive" /></div>
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
			<div>
		</div>
	</footer>

	<script src="/JAKtrip/assets/js/jquery-1.11.0.min.js"></script>
	<script src="/JAKtrip/assets/js/bootstrap.min.js"></script>
	<script src="/JAKtrip/assets/js/jaktrip.js"></script>
	<script src="/JAKtrip/assets/js/jquery.smartmenus.min.js"></script>
	<script src="/JAKtrip/assets/js/menuselector.js"></script>

	<script>
		  $(function() {
			  $('#main-menu').smartmenus();
			});
	</script>

   <script>
			$(document).ready(function() {
				$('.navbar-nav > li > a').click(function(event){
					event.preventDefault();//stop browser to take action for clicked anchor
					
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
			});
		</script>
		
		<script>
	function getDetail(){
		//$("#info").html("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");;
		//var x = document.getElementById("category_select").value;
		
		jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/DetailCtr/getdetail/Museum%20Indonesia",
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";
								var resultQueryname = "";
								var resultQuerydetail = "";
								for (var i=0 ; i<obj.query.length; i++){
									//resultQuery = resultQuery +obj.query[i].place_name+"<br>";
									if(i==0){
									resultQueryname = resultQueryname +obj.query[i].place_name;
									resultQuerydetail = resultQuerydetail +obj.query[i].description;
									}
									else{
									resultQuerydetail = resultQuerydetail +obj.query[i].description;	
									}
								}
								
							$("#namatempat").html(resultQueryname);
							$("#info").html(resultQuerydetail);
							}							
				            }
                        }
                    );
	}
	</script>
	
			<script>
	function getReview(){
		
		//$("#reviews").html("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
		//var y = document.getElementById("location_select").value;
		
		jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/ReviewCtr/detailrev/Museum%20Indonesia",
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";
								var resultQueryname = "";
								for (var i=0 ; i<obj.query.length; i++){
									if(i>0)
									{
									resultQuery = resultQuery +"<div class='reviewmember col-lg-12'><br><div class='reviewkiri col-lg-4'><div class='ava'><img src='/JAKtrip/assets/img/50.jpg'/></div><div class='author' id='namauser'><b>"+obj.query[i].username+"</b></div><div class='hasreviewed'>Reviewed 7 places</div></div><div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o' ></span><span class='fa fa-star-o'></span><span class='deleterev close fa fa-trash-o'><a href='../ReviewCtr/del/"+obj.query[i].place_name+"/"+obj.query[i].id_rate+"'>tes delete</a><a href='javascript:delReview('qqq','qqqq')'>asasasasasas</a></span><br><span class='judulreview tuffyh3a' id='temareview'>"+obj.query[i].title+"</span><br><span class='isireview' id='deskripsireview'>"+obj.query[i].review+"</span></div></div>";	
									}
									else
									resultQuery = resultQuery +"<div class='reviewmember col-lg-12'><button class='btn btn-warning col-lg-11' type='submit'>ADD NEW REVIEW</button><br><div class='reviewkiri col-lg-4'><div class='ava'><img src='/JAKtrip/assets/img/50.jpg'/></div><div class='author' id='namauser'><b>"+obj.query[i].username+"</b></div><div class='hasreviewed'>Reviewed 7 places</div></div><div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o' ></span><span class='fa fa-star-o'></span><span class='deleterev close fa fa-trash-o'><a href='../ReviewCtr/del/"+obj.query[i].place_name+"/"+obj.query[i].id_rate+"'>tes delete</a><a href='javascript:delReview("+obj.query[i].place_name+","+obj.query[i].id_rate+")'>asasasasasas</a></span><br><span class='judulreview tuffyh3a' id='temareview'>"+obj.query[i].title+"</span><br><span class='isireview' id='deskripsireview'>"+obj.query[i].review+"</span></div></div>";
									{
									resultQueryname = resultQueryname +obj.query[i].place_name;
									}
								}
								$("#namatempat").html(resultQueryname);	
							$("#reviews").html(resultQuery);
						
							}							
				            }
                        }
                    );
	}
	</script>
	
				<script>
	function delReview(nama,id){
		
		$("#reviews").html("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa" +nama +"aasas"+id);
		//var y = document.getElementById("location_select").value;
		
		/*jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/ReviewCtr/del/"+nama+"/"+id,
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = "";
								var resultQueryname = "";
								for (var i=0 ; i<obj.query.length; i++){
									if(i>0)
									{
									resultQuery = resultQuery +"<div class='reviewmember col-lg-12'><br><div class='reviewkiri col-lg-4'><div class='ava'><img src='/JAKtrip/assets/img/50.jpg'/></div><div class='author' id='namauser'><b>"+obj.query[i].username+"</b></div><div class='hasreviewed'>Reviewed 7 places</div></div><div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o' ></span><span class='fa fa-star-o'></span><span class='deleterev close fa fa-trash-o'><a href='javascript:delreview('"+obj.query[i].place_name+"','"+obj.query[i].id_rate+"'>tes delete</a></a></span><br><span class='judulreview tuffyh3a' id='temareview'>"+obj.query[i].title+"</span><br><span class='isireview' id='deskripsireview'>"+obj.query[i].review+"</span></div></div>";	
									}
									else
									resultQuery = resultQuery +"<div class='reviewmember col-lg-12'><button class='btn btn-warning col-lg-11' type='submit'>ADD NEW REVIEW</button><br><div class='reviewkiri col-lg-4'><div class='ava'><img src='/JAKtrip/assets/img/50.jpg'/></div><div class='author' id='namauser'><b>"+obj.query[i].username+"</b></div><div class='hasreviewed'>Reviewed 7 places</div></div><div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o' ></span><span class='fa fa-star-o'></span><span class='deleterev close fa fa-trash-o'><a href='javascript:delreview('"+obj.query[i].place_name+"','"+obj.query[i].id_rate+"'>tes delete</a></span><br><span class='judulreview tuffyh3a' id='temareview'>"+obj.query[i].title+"</span><br><span class='isireview' id='deskripsireview'>"+obj.query[i].review+"</span></div></div>";
									{
									resultQueryname = resultQueryname +obj.query[i].place_name;
									}
								}
								$("#namatempat").html(resultQueryname);	
							$("#reviews").html(resultQuery);
						
							}							
				            }
                        }
                    );*/
	}
	</script>
	
</body>
</html>
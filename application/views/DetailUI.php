<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../assets/css/normalize.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/bootstrap.sandstone.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/font-awesome.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/jaktrip.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/sm-core-css.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/sm-clean.css" type="text/css" rel="stylesheet"/>

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

	
		<div class="col-lg-6"></div>

		<div class="col-lg-6 rating">
			<div class="row">
				<div class="col-lg-12 redbar">
					<a class="text-danger" href="#"><span class="fa fa-angle-left" style="font-size: 28px; vertical-align:middle;"></span>
					<span class="tuffyh3" style="vertical-align:middle;">&nbsp; Eco Cruise</span></a>
				</div>
				<div class="col-lg-12 headerdetail"><img src="../assets/img/hd.gif"/>
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
			<div>
		</div>
	</footer>

	<script src="../assets/js/jquery-1.11.0.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/jaktrip.js"></script>
	<script src="../assets/js/jquery.smartmenus.min.js"></script>
	<script src="../assets/js/menuselector.js"></script>

	<script>
		  $(function() {
			  $('#main-menu').smartmenus();
			});
	</script>
    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {
            
            $('.contactus').validator();
        
        });
    </script>
    <script>
			$(document).ready(function() {
				$('#mainmenu > li > a').click(function(event){
					event.preventDefault();//stop browser to take action for clicked anchor
					
					//get displaying tab content jQuery selector
					var active_tab_selector = $('#mainmenu > li.active > a').attr('href');					
					
					//find actived navigation and remove 'active' css
					var actived_nav = $('#mainmenu > li.active');
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
</body>
</html>
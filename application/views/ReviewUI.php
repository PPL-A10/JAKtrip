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
				<section class="textdetail tabcontent hide" id="info">
				</section>
				<section class="textdetail tabcontent hide" id="photos">
					Gallery photos
				</section>
				<section class="textdetail tabcontent active" id="reviews">
				<div class='reviewmember col-lg-12'>
					<button class='btn btn-warning col-lg-11' type='submit'>ADD NEW REVIEW</button><br>
				</div>
	
	<?php
	foreach($query as $row){
					
					
					echo "<div class='reviewmember id='isi_field' col-lg-12'>";				
						echo "<div class='reviewkiri col-lg-4'>";
							echo "<div class='ava'><img src='../assets/img/50.jpg'/></div>";
							echo "<div class='author' id='namapengguna'><b>".$row->username."</b></div>";
							echo "<div class='hasreviewed'>Reviewed 7 places</div>";
						echo "</div>";
						echo "<div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'>";
							if ($row->rate == 0)
						    {echo "<span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o' ></span><span class='fa fa-star-o'></span>";}
							if ($row->rate == 1)
							{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}
							if ($row->rate == 2)
							{echo"<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}
							if ($row->rate == 3)
							{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}
							if ($row->rate == 4)
							{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span>";}
							if ($row->rate == 5)
							{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span>";}
						    echo	"<a href='javascript:delFunction()'><span class='deleterev close fa fa-trash-o' id='nilaiid' value='".$row->id_rate."'></span></a>";	
							//echo	"<span class='deleterev close fa fa-trash-o'>".anchor('ReviewCtr/del/' .$row->id_rate, 'Delete')."</span>";
						    echo	"<br>";
						    echo	"<span class='judulreview tuffyh3a' id='judul'>"	;													
							echo 	"<p>".$row->title."</p>" ;																
							echo	"</span><br>";
						    echo	"<span class='isireview' id='isireview'>";
							echo 	"<p>".$row->review."</p>" ;		
						    echo	"</span>";
					echo	"</div>";
				echo	"</div>";
					
	}
	?>

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
	function delFunction(){
		
		//document.getElementById("output_field").innerHTML = "You selected: 1dfsdsdfgdfgdfgdfvbdfgbffvbfgbb" ;
		var x = document.getElementById("nilaiid").value;
		jQuery.ajax({
				        type: "POST",
				        url: "http://localhost/JAKtrip/index.php/ReviewCtr/del/"+x,
				        success: function(res) {
				            if (res)
				            {
								var obj = jQuery.parseJSON(res);
								var resultQuery = [];
								var resultQueryname = [];
								var resultQuerytitle = [];
								var resultQueryreview = [];
								var resultQueryid = [];
								for (var i=0 ; i<obj.query.length; i++){
									resultQuery.push("<div class='reviewkiri col-lg-4'><div class='ava'><img src='../assets/img/50.jpg'/></div><div class='author' id='namapengguna'><b>"+obj.query[i].username+"</b></div><div class='hasreviewed'>Reviewed 7 places</div></div><div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o' ></span><span class='fa fa-star-o'></span><a href='javascript:delFunction()'><span class='deleterev close fa fa-trash-o' id='nilaiid' value='"+obj.query[i].id_rate+"'></span></a><br><span class='judulreview tuffyh3a' id='judul'><p>"+obj.query[i].title+"</p></span><br><span class='isireview' id='isireview'><p>"+obj.query[i].review+"</p>	</span></div>");
								}
								/*for (var i=0 ; i<obj.query.length; i++){
									resultQueryname.push(obj.query[i].username);
								}
								for (var i=0 ; i<obj.query.length; i++){
									resultQuerytitle.push(obj.query[i].title);
								}
								for (var i=0 ; i<obj.query.length; i++){
									resultQueryreview.push(obj.query[i].review);
								}
								for (var i=0 ; i<obj.query.length; i++){
									resultQueryid.push(obj.query[i].id_rate);
								}*/
								
								for (var i=0 ; i<resultQuery.length; i++){
									$("#isi_field").html("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");;
								}
								
								//$("#output_field").html(resultQuery);
								//for (var i=0 ; i<resultQueryname.length; i++)
								//{$("#namapengguna").html(resultQueryname[i]);}
								//$("#judul").html(resultQuerytitle);
								//$("#isireview").html(resultQueryreview);
							}
							
				            }
                        }
                    );
	}
	</script>
	
	
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
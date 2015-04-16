<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://localhost/Jaktrip/assets/css/normalize.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/bootstrap.sandstone.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/bootstrap-datepicker3.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/font-awesome.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/jaktrip.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/ion.rangeSlider.skinFlat.css" type="text/css" rel="stylesheet"/>
	<link href="http://localhost/Jaktrip/assets/css/ion.rangeSlider.css" type="text/css" rel="stylesheet"/>

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



<body>
	


	<div class="col-lg-6">
		<div class="row">

			<div class="searchbox">
				<form class="form-horizontal" action="http://localhost/Jaktrip/index.php/searchCtr/setInitialVariable/" method="post">
					
					<input type="text" name="budget" placeholder="budget">
					<br>
					<br>
				    <span class="input-group col-lg-3">
				 		<input class="fieldsml small datepicker" name="datepicker" id="datepicker" type="text" placeholder="Date" style="margin-left: 2px;">
				    </span>
			    	<br>
			    	<span class="fieldsml custom-dropdown bordered">
						    <select class="fieldsml form-control" title="Popularity" name="halte">    
						        <?php
						        // foreach ($query as $row) {
						        // 	echo "<option value='".$row->halte_code."'>".$row->halte_name."</option>";
						        // }	

						        ?>
						        <option value="" selected>Popularity</option>  
						        <option value="">Highest Rating</option>
						        <option value="">Name: A-Z</option>
						        <option value="">Name: Z-A</option>
						        <option value="">Price: Low to High</option>
						        <option value="">Price: High to Low</option>
						    </select>
						</span>

					<br>
					<select name="pos" id="pos_select" class="form_input">
					    <option value="0">about_history_title</option>
					    <option vlaue="1">about_history</option>
					</select>
					<br>
			    	<input type="submit" value="Submit">


				   
				</form>
			</div>

			
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

	<script src="http://localhost/Jaktrip/assets/js/jquery-1.11.0.min.js"></script>
	<script src="http://localhost/Jaktrip/assets/js/ion.rangeSlider.min.js"></script>
	<script src="http://localhost/Jaktrip/assets/js/bootstrap.min.js"></script>
	<script src="http://localhost/Jaktrip/assets/js/jaktrip.js"></script>
	<script src="http://localhost/Jaktrip/assets/js/bootstrap-datepicker.min.js"></script>
	<script src="http://localhost/Jaktrip/assets/js/gmaps.js"></script>
    <script type="text/javascript">
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
				         					hasilPemilihan = hasilPemilihan + "<tr><td style='width:100px;'><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query[i].place_name+"<br>"+obj.query[i].weekday_price+"<br><button type=\"button\" class=\"btn btn-xs btn-success tempatWisata\" id=\""+obj.query[i].place_name+"\" onclick=\"addTrip("+obj.query[i].weekday_price+",'"+obj.query[i].place_name+"')\""+obj.query[i].place_name+"\">"+obj.query[i].weekday_price+"</button><br><a class='toZoom' onclick='return setMapLocationZoom(\""+obj.query[i].place_name+"\")'>see location in map<a></td></tr>";
				         				}
				            	}
				            	hasilPemilihan = hasilPemilihan + "</table>";
				     

				            }
                        }
                    });
			}
			function getTheDate(){
				var datechoosen = $("#datepicker").datepicker('getDate')
				var n =datechoosen.getUTCDay();
				
				
			}
    </script>
    
    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {
            
            $('.datepicker').datepicker({
                format: "dd-mm-yyyy"
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

    
  
</body>
</html>
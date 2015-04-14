<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" type="image/x-icon" 
	href="<?php echo base_url('assets/img/logo2.png');?>" />

	<link href="<?php echo base_url('assets/css/normalize.css');?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/bootstrap.sandstone.css'); ?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/bootstrap-datepicker3.css');?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/font-awesome.css');?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/jaktrip.css');?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/ion.rangeSlider.skinFlat.css');?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/ion.rangeSlider.css');?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/sm-core-css.css');?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/sm-clean.css');?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/sm-clean2.css');?>" type="text/css" rel="stylesheet"/>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
  <link href="http://localhost/Jaktrip/assets/css/normalize.css" type="text/css" rel="stylesheet"/>
  <link href="http://localhost/Jaktrip/assets/css/bootstrap.sandstone.css" type="text/css" rel="stylesheet"/>
  <link href="http://localhost/Jaktrip/assets/css/bootstrap-datepicker3.css" type="text/css" rel="stylesheet"/>
  <link href="http://localhost/Jaktrip/assets/css/font-awesome.css" type="text/css" rel="stylesheet"/>
  <link href="http://localhost/Jaktrip/assets/css/jaktrip.css" type="text/css" rel="stylesheet"/>
  <link href="http://localhost/Jaktrip/assets/css/ion.rangeSlider.skinFlat.css" type="text/css" rel="stylesheet"/>
  <link href="http://localhost/Jaktrip/assets/css/ion.rangeSlider.css" type="text/css" rel="stylesheet"/>
  
  <script src="http://localhost/Jaktrip/assets/js/jquery-1.11.0.min.js"></script>
  <script src="http://localhost/Jaktrip/assets/js/ion.rangeSlider.min.js"></script>
  <script src="http://localhost/Jaktrip/assets/js/bootstrap.min.js"></script>
  <script src="http://localhost/Jaktrip/assets/js/jaktrip.js"></script>
  <script src="http://localhost/Jaktrip/assets/js/bootstrap-datepicker.min.js"></script>
  <script src="http://localhost/Jaktrip/assets/js/gmaps.js"></script>

  <script src="/JAKtrip/assets/js/jquery-1.11.0.min.js"></script>
  <script src="/JAKtrip/assets/js/bootstrap.min.js"></script>
  <script src="/JAKtrip/assets/js/jaktrip.js"></script>
  <script src="/JAKtrip/assets/js/jquery.smartmenus.min.js"></script>
  <script src="/JAKtrip/assets/js/menuselector.js"></script>

  <link href="/JAKtrip/assets/css/normalize.css" type="text/css" rel="stylesheet"/>
  <link href="/JAKtrip/assets/css/bootstrap.sandstone.css" type="text/css" rel="stylesheet"/>
  <link href="/JAKtrip/assets/css/font-awesome.css" type="text/css" rel="stylesheet"/>
  <link href="/JAKtrip/assets/css/jaktrip.css" type="text/css" rel="stylesheet"/>
  <link href="/JAKtrip/assets/css/sm-core-css.css" type="text/css" rel="stylesheet"/>
  <link href="/JAKtrip/assets/css/sm-clean.css" type="text/css" rel="stylesheet"/>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


		


		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<title> JAKtrip: Explore fun places within your budget in Jakarta</title>

	<style>
		header{
			background-image: url('<?php echo base_url("assets/img/header.png");?>');
			height: 530px;
		}

		@font-face { 
			font-family: Tuffy; 
			src: url('<?php echo base_url("assets/fonts/Tuffy.otf");?>');
		}

		@font-face { 
			font-family: TuffyBold; 
			src: url('<?php echo base_url("assets/fonts/Tuffy_Bold.otf");?>');
		}

		@font-face { 
			font-family: Lato; 
			src: url('<?php echo base_url("assets/fonts/lato-regular.ttf");?>');
		}

		@font-face { 
			font-family: LatoBlack; 
			src: url('<?php echo base_url("assets/fonts/lato-black.ttf");?>');
		}
	</style>
	<script>
function addTrip1(place_name1, halte_name1, busway_price1, angkot_price1, ticket_price1, total_price1, transport_info1, place_info1)
        {
       //   alert("nama tempat : " + place_name1 +"<br>nama halte : "+halte_name1+"<br>busway : "+busway_price1+"<br>angkot : "+angkot_price1 + "<br>tiket : " + ticket_price1+"<br>total :"+total_price1);
           
            var place_name =  getCookie("placeName");
            var halte_name = getCookie("halteName");
            var busway_price = getCookie("buswayPrice");
            var angkot_price = getCookie("angkotPrice");
            var ticket_price = getCookie("ticketPrice");
            var total_price = getCookie("totalPrice");
            var transport_info = getCookie("transportInfo");
            var place_info = getCookie("placeInfo");
            tempdata = place_name1 + "-" +halte_name1+ "-"+busway_price1+ "-"+angkot_price1+ "-"+ticket_price1+ "-"+total_price1+ "-"+transport_info1+ "-"+ place_info1;
      //      alert(getCookie("placeName"));
          
           
             jQuery.ajax({
              type: "POST",
              data : {
                'datanya' :  tempdata},
              url: "http://localhost/Jaktrip/index.php/rangkaianPerjalananCtr/addingTrip/",
              success: function(res) {
                  if (res)
                  {

                    var output = getCookie("placeName").replace(/\+/gi, " ");
                    alert(res);
                   var obj = jQuery.parseJSON(res);
             //       alert(obj.query.result[0].place_name);
                     output = "<table class='table table-hover'>";
                    
                     for(var i = 0; i<obj.query.result.length; i++)
                    {
                        output = output +  "<tr><td style='width:100px;'><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td><td>"+obj.query.result[i].place_name+"<br>halte "+obj.query.result[i].halte_name+"<br>harga  : "+obj.query.hargaAngkotSebelum[i]+" (harga angkot ke halte) + "+obj.query.hargaBusway[i]+" (harga Busway) + " +obj.query.hargaAngkotSetelah[i]+" (harga Angkot ke Tempat Wisata) + "+obj.query.result[i].weekday_price+" (harga tiket) = "+obj.query.harga[i]+" "+obj.query.sudahDipilih[i]+"<br><button onclick=\"addTrip1('"+obj.query.result[i].place_name+"','"+obj.query.result[i].halte_name+"','"+obj.query.hargaBusway[i]+"','"+obj.query.result[i].transport_price+"','"+obj.query.result[i].weekday_price+"','"+obj.query.harga[i]+"','"+obj.query.result[i].transport_info+"','"+obj.query.result[i].place_info+"')\">add to trip</button></td></tr>";
                    }
                    output = output+ "</table>";
                 //   alert(output);
                   $("#blogMain").html(output);
                   showTheItinerary1();
                  }
                  }
                });
        }

        function showTheItinerary1()
        {
          var itineraryPlace = getCookie("placeName").replace(/\+/gi, " ");
          var itineraryPlaceArray = itineraryPlace.split("xx");
          var itineraryTotalPrice = getCookie("totalPrice").replace(/\+/gi, " ");
          var itineraryTotalPriceArray = itineraryTotalPrice.split("xx");
           var yangDipilih = "";
          yangDipilih = yangDipilih + "<table class='table'><tr><th>Daftar tempat wisata</th></tr></table>";
            yangDipilih = yangDipilih + "<div class='canScroll'><table class='table table-hover'>";
          for(var i=0; i<itineraryPlaceArray.length; i++)
          {
            if(itineraryPlaceArray[i]!='terhapus' && itineraryPlaceArray[i]!="")
              {
                yangDipilih  = yangDipilih + "<tr><td><img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='50' height='50'></td><td>"+itineraryPlaceArray[i]+"<br>"+itineraryTotalPriceArray[i]+"<br> <a class='toZoom' onclick='return setMapLocationZoom(\""+itineraryPlaceArray[i]+"\")'>see location in map<a></td><td><a class ='removeTrip' onclick='return removeTrip1(\""+itineraryPlaceArray[i]+"\")' ><span class='glyphicon glyphicon-trash' area-hidden='true' ></span></a></td></tr>";
              }
            
          }
            yangDipilih = yangDipilih + "</table></div>";
            yangDipilih = yangDipilih + "<table class='table'><tr><th>Your Trip Cost</th><th>Rp "+tripCost+"</th></tr></table>"

          alert(getCookie("placeName").replace(/\+/gi, " "));
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
        function setCookie(cname,cvalue,exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*60*60*1000));
            var expires = "expires=" + d.toGMTString();
            document.cookie = cname+"="+cvalue+"; "+expires;
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1);
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function showRating(place_name)
        {
          $("#mapcanvas").hide();
          $("#detailrating").show();
          jQuery.ajax({
                type: "POST",
                url: "http://localhost/JAKtrip/index.php/DetailCtr/getdetail/" + place_name,
                success: function(res) {
                    if (res)
                    {

                var obj = jQuery.parseJSON(res);
                var resultQuery = "";
                var resultQuerydetail = "";
                for (var i=0 ; i<obj.query.length; i++){
                  //resultQuery = resultQuery +obj.query[i].place_name+"<br>";
                  resultQueryname = resultQuery +obj.query[i].place_name;
                  resultQuerydetail = resultQuerydetail +obj.query[i].description;
                }
                
              $("#namatempat").html(resultQueryname);
              $("#info").html(resultQuerydetail);
              }             
            }
                }
            );
        }

		
</script>
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
	      <a class="navbar-brand" href="<?php echo base_url('index.php/homeCtr')?>" style="background-image: url(<?php echo base_url('assets/img/logo.png');?>"></a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
        	<li>&nbsp;&nbsp;&nbsp;</li>
        	<li><a href="<?php echo base_url('index.php/allPlacesCtr');?>">PLACES</a></li>
        	<li><a href="#">PROMO</a></li>
          </ul>

	      <ul class="nav navbar-nav navbar-right sm sm-clean2">
	        <li><a href="#">Sign Up</a></li>
	        <!--<?php
				//if(isset($_COOKIE["username"]))
				{

				//	echo "<li><a href='http://localhost/Jaktrip/index.php/searchCtr/logout'>Selamat datang ".$_COOKIE['username']."</a></li>";	
				}
				//else
				{
				//	echo "<li><a href='#openLogin'>Log In</a></li>";
				}
			?>-->
	        <li><a href="#openLogin">Log In</a></li>
		        <div id="openLogin" class="openModal">
		        	<div>
						<a href="#close" title="Close" class="close"><span class="fa fa-times"></span></a>
						<center><div class="tuffyh2a">Log In to JAKtrip</div></center><br>

						<form role="form" class="form-group">
							<input class="form-control form-group" type="email" placeholder="E-mail" required>
							<input class="form-control form-group" type="password" placeholder="Password" required>
							<span class="col-lg-6"><input type="checkbox" name="remember"> Remember me</span>
							<span class="col-lg-6" style="text-align: right;"><a href="#">Forgot password?</a></span><br><br>
							<button class="login btn btn-warning" type="submit">LOG IN</button><br><br>
							<center>Or login with your account below<center><br>
							<div class="iconsocial">
								<a href="#"><span class="fa fa-google-plus-square" style="color: #E03F3F;"></span></a>
								<a href="#"><span class="fa fa-facebook-square" style="color: #43468C;"></span></a>
								<a href="#"><span class="fa fa-twitter-square" style="color: #2EA0F2;"></span></a>
							</div>
							<br>
							<center>Don't have an account? <a href="#">Sign Up.</a><center>
						</form>
					</div>
		        </div>
	        <li id="popoverEdit1"><a type="button" id="theTrip" class="btn buttonAtasToggle" data-container="#popoverEdit1" data-placement="bottom"   
              data-toggle="popover">Trip (0)  <span class="fa fa-bus"></span></a>
	        <!-- if udah login <li><a href="#">Michelle <img src="../assets/img/25.png" class="ava-rounded" style="position: relative;"/></a>
	        	<ul>
	        		<li><a  href="#">Edit Profile</a></li>
	        		<li><a  href="#">My Trips</a></li>
	        		<li><a  href="#">Collection</a></li>
	        		<li><a  href="#">Reviews</a></li>
	        		<li><a  href="#">Logout</a></li>
	        	</ul>-->
	        </li> 
	      </ul>
	    </div>
	  </div>
	</nav>
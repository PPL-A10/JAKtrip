<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../assets/css/normalize.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/bootstrap.sandstone.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/font-awesome.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/jaktrip.css" type="text/css" rel="stylesheet"/>

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

	<div class="container-fluid">
		<div class="row">
			<header class="headersmall">
				<div class="title">
					<div class="tuffyh1a">Frequently Asked Questions</div>
				</div>
				
			</header>
			
			<ul class="submenufaq nav navbar-nav">
				<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
				<li><a href="#getting-started" class="submenua">Getting Started</a></li>
				<li><a href="#account-and-profile" class="submenua">Account and Profile</a></li>
				<li><a href="#places" class="submenua">Places</a></li>
		        <li><a href="#reviews" class="submenua">Reviews</a></li>
		        <li><a href="#others" class="submenua">Others</a></li>
			</ul>

			<div class="col-lg-12 even">
				<section id="getting-started" class="tab-content active">
					<div class="faq">
						<dl id="faqs">
						  <dt>Apa itu JAKtrip?</dt>
						  <dd>JAKtrip adalah sebuah sistem rekomendasi tempat wisata di Jakarta berdasarkan anggaran yang dimiliki oleh pengguna.</dd>
						 
						  <dt>Apakah kami dapat mengatur rencana perjalanan sendiri?</dt>
						  <dd>Ya, untuk membuat suatu rangkaian perjalanan sendiri, pengguna dapat menyusun rangkaiannya di <a href="">sini</a>.</dd>
						 
						  <dt>Apakah pada saat membuat rangkaian perjalanan, harga yang dihitung oleh sistem bergantung pada hari yang dipilih?</dt>
						  <dd>Ya, harga yang dihitung berdasarkan hari yang dipilih oleh pengguna, apakah hari biasa atau hari libur.</dd>

						  <dt>Bagaimana dengan ketetapan harga tiket masuk ke suatu tempat wisata dan harga transportasi yang tercantum pada JAKtrip?</dt>
						  <dd>Harga tiket masuk tempat wisata dan harga transportasi yang tercantum pada situs JAKtrip merupakan estimasi harga yang mendekati dan terkini pada situs resminya.</dd>				

						</dl>
					</div>
				</section>
				<section id="account-and-profile" class="tab-content hide">
					<div class="faq">
						<dl id="faqs">
						  <dt>Bagaimana cara mengubah profil akun?</dt>
						  <dd>Lalalala.</dd>
						 
						  <dt>Bagaimana cara saya melihat tempat wisata yang sudah pernah dikunjungi atau tempat wisata yang ingin dikunjungi?</dt>
						  <dd>Member dapat melihat tempat wisata yang telah dikunjungi dengan cara:<br>
							1. Mengarahkan mouse pada nama Anda di sebelah kanan atas <br>
							2. Pilih menu Collection<br>
							Akan ditampilkan daftar tempat wisata yang sudah dikunjungi dan tempat wisata yang ingin dikunjungi.</dd>
						 
						</dl>
					</div>
				</section>
				<section id="places" class="tab-content hide">
					<div class="faq">
						<dl id="faqs">
						  <dt>Adakah tempat wisata yang memiliki promo tertentu?</dt>
						  <dd>Ya, jika suatu tempat wisata sedang memiliki promo pada periode tertentu, maka JAKtrip akan menampilkan promo tersebut pada <a href="">halaman ini</a> atau pada detail informasi tempat wisata terkait.</dd>
						 
						  <dt>Apakah pengguna dapat mengupload foto tempat wisata?</dt>
						  <dd>Yang dapat mengupload foto tempat wisata adalah member atau pengguna yang memiliki akun JAKtrip. 
						  	Member dapat mengupload foto pada suatu tempat wisata untuk kemudian disetujui oleh admin agar dapat ditampilkan pada detail suatu tempat wisata. 
						  	Nantinya foto tersebut dapat dilihat oleh seluruh pengguna yang membuka detail tempat wisata tersebut.
						  </dd>
						 
						  <dt>Apakah ada harga tiket masuk khusus untuk anak-anak?</dt>
						  <dd>Secara default harga yang JAKtrip tampilkan adalah harga umum. Akan tetapi, pengguna dapat melihat harga tiket masuk secara lebih rinci pada detail informasi tempat wisata.</dd>

						</dl>
					</div>
				</section>
				<section id="reviews" class="tab-content hide">
					<div class="faq">
						<dl id="faqs">
						  <dt>Pertanyaan 1</dt>
						  <dd>Lalalala.</dd>
						 
						  <dt>Pertanyaan 2</dt>
						  <dd>Lalalala.</dd>

						</dl>
					</div>
				</section>
				<section id="others" class="tab-content hide">
					<div class="faq">
						<dl id="faqs">
						  <dt>Dapatkah kami memberikan kontribusi pada JAKtrip, apa yang dapat kami lakukan?</dt>
						  <dd>1. Kamu dapat bantu menyebarkan informasi mengenai JAKtrip dengan berbagi informasi kepada teman atau kerabat lainnya.
						  	<br>2. Member atau pengguna yang mempunyai akun dapat memberikan kontribusi dengan cara menambahkan saran tempat wisata yang belum ada di JAKtrip dan juga dapat memberikan foto suatu tempat wisata. Namun sebelum tempat wisata baru dan foto ditampilkan, admin akan memberikan persetujuan.
						  </dd>
						 
						  <dt>Pertanyaan lain?</dt>
						  <dd>Pertanyaan lain yang belum dijelaskan pada halaman ini dapat dikirimkan melalui <a href="">halaman ini</a>. </dd>

						</dl>
				</section>
			</div>
			
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
	<script src="../assets/js/menuselector.js"></script>
	<script src="../assets/js/jaktrip.js"></script>
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
		<script type="text/javascript">
		    $("#faqs dd").hide();
		    $("#faqs dt").click(function () {
		        $(this).next("#faqs dd").slideToggle(500);
		        $(this).toggleClass("expanded");
		    });
		</script>
</body>
</html>
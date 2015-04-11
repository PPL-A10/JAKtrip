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

	<div class="container-fluid">
		<div class="row menuhover">			
			<ul id="main-menu" class="sm sm-clean submenu nav navbar-nav" style="padding-top: 70px;">
				<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
				<li><a class="submenupost" href="#">Posts</a>
					<ul class="subsubmenu">
						<li><a class="smp" href="manageTourAttrCtr">All Posts</a></li>
						<li><a class="smp" href="TourAttrCtr">Add New Post</a></li>
						<li><a class="smp" href="#">Categories</a></li>
					</ul>
				</li>
				<li><a class="submenua" href="#">Members</a></li>
		        <li><a class="submenusugg" href="#">Suggestions</a>
		        	<ul class="subsubmenu">
						<li><a class="sms" href="#">Tourist Attractions</a></li>
						<li><a class="sms" href="#">Photos</a></li>
					</ul>
		        </li>
		        <li><a class="submenua" href="#">Feedback</a></li>
		        <li><a class="submenua" href="#">Spam</a></li>
		        <li><a class="submenustat" href="#">Statistics</a>
		        	<ul class="subsubmenu">
						<li><a class="smst" href="#">By Visitor</a></li>
						<li><a class="smst" href="#">By Rating</a></li>
						<li><a class="smst" href="#">By Budget</a></li>
					</ul>
		        </li>
			</ul>


			<div class="col-lg-8">
				<div class="tuffyh2a admintitle">All Member Accounts</div>
				
				
				
				<span class="input-group col-lg-7" style="margin-left: 150px;">
				    <input class="fieldsml form-control" type="text" placeholder="Member search/JAKtrip.">
				    <span class="input-group-btn">
				      <button class="fieldsml btn btn-default" type="button" style="width:40%; padding-left: 20px; padding-right: 20px;"><span class="fa fa-search"></span></button>
				    </span>
			    </span><br>

			    <div class="searchmember col-lg-12">
			    	<ul class="letters">
			    		<li><a href="">A</a></li>
			    		<li><a href="">B</a></li>
			    		<li><a href="">C</a></li>
			    		<li><a href="">D</a></li>
			    		<li><a href="">E</a></li>
			    		<li><a href="">F</a></li>
			    		<li><a href="">G</a></li>
			    		<li><a href="">H</a></li>
			    		<li><a href="">I</a></li>
			    		<li><a href="">J</a></li>
			    		<li><a href="">K</a></li>
			    		<li><a href="">L</a></li>
			    		<li><a href="">M</a></li>
			    		<li><a href="">N</a></li>
			    		<li><a href="">O</a></li>
			    		<li><a href="">P</a></li>
			    		<li><a href="">Q</a></li>
			    		<li><a href="">R</a></li>
			    		<li><a href="">S</a></li>
			    		<li><a href="">T</a></li>
			    		<li><a href="">U</a></li>
			    		<li><a href="">V</a></li>
			    		<li><a href="">W</a></li>
			    		<li><a href="">X</a></li>
			    		<li><a href="">Y</a></li>
			    		<li><a href="">Z</a></li>
			    	</ul>			    	
			    </div>
			    <br><br>
			    <span id="openLogin" class="newpost"><br>
				<a href="" style="margin-left: 150px;"><span class="fa fa-trash-o"></span>&nbsp;&nbsp;Remove Account</a></span><br><br>
				
				

				<table id="tab1" class="newpost table table-striped table-hover">
				  <thead >
				    <tr style="text-align: center;">
				      <th><input type="checkbox" value="" name="checkAll" id="checkAll"/></th>
				      <th>Name</th>
				      <th>E-mail</th>
				      <th>Status</th>
				      <th>Joined Date</th>
				      <th>Reviews</th>
				      <th>Last Active</th>
				    </tr>
				  </thead>
				  
				  <tbody>
				    <tr class="active">
					  	<?php
							//echo "<table border='1'>";
							foreach($query as $row)
							{
							//echo "<tr>";
							echo"<td><input type='checkbox' value=''></td>";
							echo "<td>".$row->username."</td>";
							echo "<td>".$row->email	."</td>";
							echo "<td>".$row->email	."</td>";
							echo "<td>".$row->email	."</td>";
							echo "<td>". anchor('reviewCont/del/' .$row->username, 'Delete') ."</td>";
							echo "</tr>";
							}
							//echo "</table>";
	
						?>
				      <!--td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				    </tr>
				    <tr>
				      <td><input type="checkbox" value=""/></td>
				      <td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				      <td>Column content</td>
				    </tr-->
				  </tbody>
				</table><br>

				<ul class="pager">
				  <li><a href="#">Previous</a></li>
				  <li><a href="#">Next</a></li>
				</ul><br>
			</div>


			
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
	</script>
	<script>
		  $(function() {
			  $('#main-menu').smartmenus();
			});
	</script>
</body>
</html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" 
			  href="<?php echo "$base/$css"?>">
		<link href='http://fonts.googleapis.com/css?family=Rum+Raisin' rel='stylesheet' type='text/css'>
		
	</head>
	<body>
		<div id="container">
			<div id="header">
				<? $this->load->view('guest_header'); ?>
			</div>
			<div id="menu">
				<? $this->load->view('guest_menu'); ?>
			</div>
			<div id="widget">
				<br><br>
				<div id="clock">
				<script src="http://www.clocklink.com/embed.js"></script><script type="text/javascript" language="JavaScript">obj=new Object;obj.clockfile="5030-green.swf";obj.TimeZone="GMT0700";obj.width=127;obj.height=150;obj.TimeFormat="H:mm:ss";obj.wmode="transparent";showClock(obj);</script>
				</div><br>
			<div id="motto">
			<h2>Cerdas</h2>
			<h2>Modern</h2>
			<h2>Religius</h2></div>
			</div>

			<div id="content">
				<? echo heading('Admin?',1); ?>
				<form method="post" action="<?php echo base_url();?>index.php/guest/ceklogin">
								
								<table>
								<tr>
									<td><label for="emailadmin">Email	: </label></td>
									<td><input type="email" name="emailadmin" placeholder="yourname@email.com" required></td>
								</tr>
								<tr>
								<td><label for="password">Password	: </label></td>
									<td><input type="password" name="password" placeholder="password" required></td>
								</tr>
								<tr>
									<td colspan="2"><br><input id="button1" type="submit" value="Masuk!"></td>
								</tr>
								</table>
							</form>
				<br><br><br>
				
			</div>
		</div>

		<div id="footer">
			<? $this->load->view('guest_footer'); ?>
		</div>

	</body>
</html>
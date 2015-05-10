<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../assets/css/normalize.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/bootstrap.sandstone.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/bootstrap-datepicker3.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/font-awesome.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/jaktrip.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/ion.rangeSlider.skinFlat.css" type="text/css" rel="stylesheet"/>
	<link href="../assets/css/ion.rangeSlider.css" type="text/css" rel="stylesheet"/>

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
	<!--nav class="navbar navbar-default navbar-fixed-top">
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
	</nav-->


	<div class="container-fluid">
		<div class="col-lg-6" >
			<div class="tuffyh2a viewbox">View Trip</div>
			<div style="margin-left: 40px; margin-bottom: 80px;">
				<?php
				// echo json_encode($place_name);
				// echo json_encode($place_info);
				// echo json_encode($total_price);
				// echo json_encode($transport_info);
				$indexpertamaKali = -1;
				for($k=0; $k<count($place_name)-1; $k++)
				{
					if((strcmp($place_name[$k], "terhapus")  != 0))
					{
						$indexpertamaKali = $k;
						$k = $k<count($place_name)-1;
					}
				}
				if($indexpertamaKali == -1)
				{
					echo "<p>Anda belum menambahkan trip.</p>";
				}
				else
				{
					echo "<table style='margin-bottom: 10px;'>";
					echo "<tr>";
					echo "<td rowspan='5' style='background-color:#db2719; width: 30px; color: #fff; text-align: center; margin-top: 10px'></td>";
					echo "<td rowspan='5'><img src='".base_url('assets/img/150.jpg')."'/></td>";
					echo "<td height='30px' class='tuffyh3a'>".$place_name[$indexpertamaKali]."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td height='30px'>Rp ".$total_price[$indexpertamaKali]."</td>";
					echo "</tr>";
					echo "<tr> <td>";
					echo "<br>";
					echo "<br>1. Dimulai dari halte ".$halte_awal[0].",";
					if((strcmp($halte_awal[0], $halte_name[$indexpertamaKali])  == 0))
					{
						echo $transport_info[$indexpertamaKali]." menuju ".$place_name[$indexpertamaKali];
					}
					else
					{
						echo " naik busway ke halte ".$halte_name[$indexpertamaKali].", lalu ".$transport_info[$indexpertamaKali]." menuju ".$place_name[$indexpertamaKali];
					}
					echo "</td></tr>";
					echo "</table>";

					for($i=$indexpertamaKali+1; $i<(count($place_name)-1); $i++)
					{

					//	echo (count($place_name)-1);
					//	echo $i;
						
						if($place_name[$i] != "terhapus" && $i>0)
						{
							
							echo "<table style='margin-bottom: 10px;'>";
							echo "<tr>";
							echo "<td rowspan='5' style='background-color:#db2719; width: 30px; color: #fff; text-align: center; margin-top: 10px'></td>";
							echo "<td rowspan='5'><img src='".base_url('assets/img/150.jpg')."'/></td>";
							echo "<td height='30px' class='tuffyh3a'>".$place_name[$i]."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td height='30px'>Rp ".$total_price[$i]." </td>";
							echo "</tr>";
							echo "<tr> <td>";
							$indexSebelum = -1;
							for($j=($i-1); $j >= 0; $j--)
							{
								// echo $i;
								// echo ($i-1);
								if((strcmp($place_name[$j], "terhapus")  != 0))
								{
									$indexSebelum = $j;
									$j = -1;

								}
				//				echo $indexSebelum;
				//				echo $i;

								
							}

							if( (strcmp($place_info[$i], $place_info[($indexSebelum)])  == 0) && $indexSebelum != (-1) && (strcmp($place_info[$i], "null")  != 0))
							{
								echo "<br>1. Jalan kaki saja menuju ".$place_name[$i];
							}
							// if((strcmp($place_info[$i], $place_info[($indexSebelum)])  == 0) && $indexSebelum != (-1))
							// {
							// 	echo "<br>1jalan kaki saja menuju ".$place_name[$i];
							// }
							else if((strcmp($halte_name[$i], $halte_name[($indexSebelum)])  == 0) && $indexSebelum != -1)
							{
								echo "<br>1. ".$transport_info[($indexSebelum)]." menuju halte ".$halte_name[($indexSebelum)];
								echo "<br>2. ".$transport_info[$i]." menuju ".$place_name[$i];	
							}
							else if($indexSebelum != -1)
							{
								echo "<br>1. ".$transport_info[($indexSebelum)]." menuju halte ".$halte_name[($indexSebelum)];
								echo "<br>2. Naik busway dari halte ".$halte_name[($indexSebelum)]." menuju halte ".$halte_name[$i];
								echo "<br>3. ".$transport_info[$i]." menuju ".$place_name[$i];	
							}
							
						//	echo "<td valign='top' rowspan='3' height='90px'>1. Naik busway dmwdmwd odwdijwqodj <br>2. Jalan kaki 0.4 km ke arah barat</td>";
							echo "</td></tr>";
							echo "</table>";
						}
					
					}
					
				}
				

				?>
				<!--table style="margin-bottom: 10px;">
					<tr>
						<td rowspan="5" style="background-color:#db2719; width: 30px; color: #fff; text-align: center; margin-top: 10px"><b>1</b></td>
						<td rowspan="5"><img src="../assets/img/150.jpg"/></td>
						<td height="30px" class="tuffyh3a">Ice Age Arctic Adventure</td>
					</tr>
					<tr>
						<td height="30px">Rp 25000 - 15 min - Indoor Play</td>
					</tr>
					<tr>
						<td valign="top" rowspan="3" height="90px">1. Naik busway dmwdmwd odwdijwqodj <br>2. Jalan kaki 0.4 km ke arah barat</td>
					</tr>
				</table>

				<table style="margin-bottom: 10px;">
					<tr>
						<td rowspan="5" style="background-color:#db2719; width: 30px; color: #fff; text-align: center; margin-top: 10px"><b>2</b></td>
						<td rowspan="5"><img src="../assets/img/150.jpg"/></td>
						<td height="30px" class="tuffyh3a">Ice Age Arctic Adventure</td>
					</tr>
					<tr>
						<td height="30px">Rp 25000 - 15 min - Indoor Play</td>
					</tr>
					<tr>
						<td valign="top" rowspan="3" height="90px">1. Naik busway dmwdmwd odwdijwqodj <br>2. Jalan kaki 0.4 km ke arah barat</td>
					</tr>
				</table-->
			</div>
			<?php
			echo "<div class='total'>";
			$harga = 0;
			for($i=0; $i<count($total_price)-1; $i++)
			{
				if((strcmp($place_name[$i], "terhapus")  != 0))	
				{
					$harga = $harga + intval($total_price[$i]);
				}
				
			}
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total : Rp ".$harga."<br>";
			echo "</div>";
			?>
			
			
			<a href="<?php if(isset($_COOKIE['username'])){echo base_url('trip/savetrip');}else{echo '#openLogin';} ?>"><button class="btn btn-warning" type="submit" style="font-size: 14px; margin-bottom: 80px; float: right; margin-right: 40px;">SAVE TO MY TRIPS</button></a>
		</div>

		
		
		

	<div class="col-lg-6"></div>
</div>

	<!--footer>
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
			</div>
		</div>
	</footer-->

	<script src="../assets/js/jquery-1.11.0.min.js"></script>
	<script src="../assets/js/ion.rangeSlider.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/jaktrip.js"></script>
	<script src="../assets/js/bootstrap-datepicker.min.js"></script>
	<script src="../assets/js/gmaps.js"></script>
    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {
            
            $('.datepicker').datepicker({
                format: "dd/mm/yyyy"
            });  

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
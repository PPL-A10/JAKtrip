
	<div class="container-fluid">
		<div class="intro">
					<div class="tuffyh1aa">All Places</div>
				</intro>
		<div class="row places">
			<div class="col-lg-12 location">
				<div class="btn btn-warning" onclick="filter('Jakarta%20Timur')">Jakarta Timur</div>
				<div class="btn btn-warning" onclick="filter('Jakarta%20Barat')">Jakarta Barat</div>
				<div class="btn btn-warning" onclick="filter('Jakarta%20Pusat')">Jakarta Pusat</div>
				<div class="btn btn-warning" onclick="filter('Jakarta%20Utara')">Jakarta Utara</div>
				<div class="btn btn-warning" onclick="filter(Jakarta%20Selatan)">Jakarta Selatan</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="col-lg-1"></div>
					<div class="col-lg-10" id="output_field">
					<?php
					foreach($query as $row){
						echo "<div class='col-lg-3 containerimg'>";
						echo "<a href='DetailCtr/".$row->place_name."'><div class='txtonimg'>".$row->place_name."</div>";
						echo "<img class='img-responsive' src='../assets/img/image.png'/></a>";
						echo "</div>";
					}
					?>
					</div>
					<div class="col-lg-1"></div>
				</div>
				
			

			
		</div>
	</div>
	</div>
</div>

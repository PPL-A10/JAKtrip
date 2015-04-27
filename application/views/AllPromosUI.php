
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12" style="background-color: #e0e0e0; height: 450px; ">
				<div class="intro" style="margin-top:-30px;">
					<div class="tuffyh1aa">All Promo</div>
				</div>

			<div class="row places" style="padding-top: 200px;">
				<div class="col-lg-12 location">
					<div class="btn btn-warning" onclick="window.location.reload()">ALL PLACES</div>
					<div class="btn btn-warning" onclick="filter('Jakarta%20Timur')">Jakarta Timur</div>
					<div class="btn btn-warning" onclick="filter('Jakarta%20Barat')">Jakarta Barat</div>
					<div class="btn btn-warning" onclick="filter('Jakarta%20Pusat')">Jakarta Pusat</div>
					<div class="btn btn-warning" onclick="filter('Jakarta%20Utara')">Jakarta Utara</div>
					<div class="btn btn-warning" onclick="filter('Jakarta%20Selatan')">Jakarta Selatan</div>
					
				</div>

				<div class="col-lg-12 location" style="margin-top: -20px;">
					<div class="form-inline">
	   					 <label class="control-label">Filter by :  </label>
	   					 <span class="field custom-dropdown ">
	   					 	 <select class="field form-control" onchange="filterFunctionFinal()" title="All Categories" id="category_select">    
							        <option value='All' >All Types</option>
									<?php
										foreach($query1 as $row)
										{
											echo "<option value='".$row->category_name."'>".$row->category_name."</option>";
										}
									?><!--option value="">Sarinah</option>  
							        <option value="">Gelora Bung Karno</option>
							        <option value="">Atrium</option>
							        <option value="">Bank Indonesia</option-->
							    </select>
	   					 </span>

	   					 <span class="input-group col-lg-3">
	   					 	<input class="field form-control" type="text" id="name_select" placeholder="Enter keyword..." >
	   					 	<span class="input-group-btn">
	   					   	<button class="field btn btn-default" type="button" onclick="filterFunctionFinal()" style="margin-left: -9px;"><span class="fa fa-search"></span></button>
	   					 	</span>
	   				 	</span>
	  		 	
	   			 	</div>
	   			</div>
	   		</div>

			</div>
		</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="col-lg-1"></div>
					<div class="col-lg-10" id="output_field" style="margin-bottom: 30px;">
						<div class="col-lg-3 containerimg">
							<a href='#'><div class='txtonimg'>Discount 35% for Students</div>
							<img class='img-responsive' src='<?php echo base_url("assets/img/image.png");?>'></a>
						</div>

						<div class="col-lg-3 containerimg">
							<a href='#'><div class='txtonimg'>Buy 3 Get 1 Free</div>
							<img class='img-responsive' src='<?php echo base_url("assets/img/image.png");?>'></a>
						</div>
					
					</div>
					<div class="col-lg-1"></div>
				</div>
			</div>
	</div>
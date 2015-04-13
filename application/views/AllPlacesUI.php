
	<div class="container-fluid">
		<div style="background-color: #e0e0e0; height: 420px; ">
			<div class="intro" style="margin-top:-30px;">
				<div class="tuffyh1aa">All Places</div>
			</div>

		<div class="row places" style="padding-top: 200px;">
			<div class="col-lg-12 location">
				<div class="btn btn-warning" onclick="filter('Jakarta%20Timur')">Jakarta Timur</div>
				<div class="btn btn-warning" onclick="filter('Jakarta%20Barat')">Jakarta Barat</div>
				<div class="btn btn-warning" onclick="filter('Jakarta%20Pusat')">Jakarta Pusat</div>
				<div class="btn btn-warning" onclick="filter('Jakarta%20Utara')">Jakarta Utara</div>
				<div class="btn btn-warning" onclick="filter('Jakarta%20Selatan')">Jakarta Selatan</div>
			</div>

			<div class="col-lg-12 location" style="margin-top: -20px;">
				<div class="form-inline">
   					 <label class="control-label">Filter by :  </label>
   					 <span id="ddcontainer" class="fieldsml custom-dropdown ">
   					 	 <select class="fieldsml form-control" onchange="filterFunctionFinal()" title="All Categories" id="category_select">    
						        <option value='All' >All Categories</option>
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
   					 	<input class="fieldsml form-control" type="text" id="name_select" placeholder="Enter keyword..." >
   					 	<span class="input-group-btn">
   					   	<button class="fieldsml btn btn-default" type="button" onchange="filterFunctionFinal()" style="margin-left: -18px;"><span class="fa fa-search"></span></button>
   					 	</span>
   				 	</span>
  	
					<span class="fieldsml custom-dropdown bordered">
   					 	<select class="fieldsml form-control" title="Popularity">    
   					     	<option value="" selected>Popularity</option>  
   					     	<option value="">Highest Rating</option>
   					     	<option value="">Name: A-Z</option>
   					     	<option value="">Name: Z-A</option>
   					     	<option value="">Price: Low to High</option>
   					     	<option value="">Price: High to Low</option>
   					 	</select>
   					 </span>			 	
   			 	</div>
   			</div>
   		</div>

	</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="col-lg-1"></div>
					<div class="col-lg-10" id="output_field" style="margin-bottom: 30px;">
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
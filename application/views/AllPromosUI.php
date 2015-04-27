
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12" style="background-color: #e0e0e0; height: 450px; ">
				<div class="intro" style="margin-top:-30px;">
					<div class="tuffyh1aa">All Promo</div>
				</div>

			<div class="row places" style="padding-top: 200px;">
				<div class="col-lg-12 location">
					<div class="btn btn-warning" onclick="window.location.reload()">ALL PLACES</div>
					<div class="btn btn-warning" >Jakarta Timur</div>
					<div class="btn btn-warning" >Jakarta Barat</div>
					<div class="btn btn-warning" >Jakarta Pusat</div>
					<div class="btn btn-warning" >Jakarta Utara</div>
					<div class="btn btn-warning" >Jakarta Selatan</div>
					
				</div>

				<div class="col-lg-12 location" style="margin-top: -20px;">
					<div class="form-inline">
	   					 <label class="control-label">Filter by :  </label>
	   					 <span class="field custom-dropdown ">
	   					 	 <select class="field form-control" onchange="" title="All Categories" id="category_select">    
							        <option value='All' >All Types</option>
									<?php
										foreach($query1 as $row)
										{
											echo "<option value='".$row->type."'>".$row->type."</option>";
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
	   					   	<button class="field btn btn-default" type="button" onclick="" style="margin-left: -9px;"><span class="fa fa-search"></span></button>
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
						<?php
						foreach($query as $row){
							echo "<div class='col-lg-3 containerimg'>";
							echo "<a href='place/".$row->title."'><div class='txtonimg'>".$row->title."</div>";
							echo "<img class='img-responsive' src='".base_url('assets/img/image.png')."'></a>";
							echo "</div>";
						}
						?>
					
					</div>
					<div class="col-lg-1"></div>
				</div>
			</div>
	</div>
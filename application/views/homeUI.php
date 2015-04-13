

	<div class="container-fluid">
		<div class="row">
			<header>
				<div class="intro">
					<div class="tuffyh1">Going Somewhere?</div>
					<div class="tuffyh2">Explore fun places within your budget in Jakarta</div>
				</div>

				<div class="col-lg-12" style="margin-top: 240px;">
					<div class="col-lg-3"></div>
					<div class="col-lg-6 box img-rounded ">
						<button id="recomm" class="field btn btn-warning" type="button">GIVE ME SOME RECOMMENDATION</button>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<button id="owntr" class="field btn btn-warning" type="button">I WANT TO MAKE MY OWN TRIP</button>
					</div>
					<div class="col-lg-3"></div>
				</div><br><br>


				<div id="showRec">				
					<div class="col-lg-12" style="margin-top: 20px;">
						<div class="col-lg-2"></div>
							<div class="col-lg-8 box img-rounded ">
								<form class="form-inline" action="http://localhost/Jaktrip/index.php/searchCtr/setInitialVariable/" method="post">
								<span class="field custom-dropdown " id="ddcontainerh">
								    <select id="ddbush" class="field form-control" title="Nearest bus stop?" type="dropdown" name="mydropdown">    
								        <option value="" selected disabled>Nearest bus stop?</option>
								        <?php
								        	foreach ($query as $row) {
								        		# code...
								        		echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";	
								        	}
								        	
								        ?>
								    </select>
								</span>
								
							  <span class="input-group col-lg-3">
							    <span class="field input-group-addon">Rp</span>
							    <input class="field form-control" type="text" placeholder="Budget" name="budget">
							  </span>

							  <span class="input-group col-lg-3">
							 	 <input class="field datepicker" type="text" placeholder="Date" name="datepicker">
							  </span>

							  <button class="field btn btn-warning" type="submit">SEARCH</button>

							  </form>
							</div>
							<div class="col-lg-2"></div>
				</div>
			</div>

			<div id="showOwntr">				
					<div class="col-lg-12" style="margin-top: 20px;">
						<div class="col-lg-3"></div>
						<div class="col-lg-6 box img-rounded ">
							<form class="form-inline" action="http://localhost/Jaktrip/index.php/searchCtr/setInitialVariable/" method="post">
								<span class="field custom-dropdown " id="ddcontainerh">
								    <select id="ddbush" class="field form-control" title="Nearest bus stop?" type="dropdown" name="mydropdown">    
								        <option value="" selected disabled>Nearest bus stop?</option>
								        <?php
								        	foreach ($query as $row) {
								        		# code...
								        		echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";	
								        	}
								        	
								        ?>
								    </select>
								</span>

						  <span class="input-group col-lg-3">
						 	 <input class="field datepicker" type="text" placeholder="Date">
						  </span>
						  &nbsp;&nbsp;&nbsp;&nbsp;
						  <button class="field btn btn-warning" type="submit">SEARCH</button>

						  </form>
						</div> 
						<div class="col-lg-3"></div>
					</div>
				</div>


			</header>
			
			<div class="col-lg-12 even">
				<div class="tuffyh1b">MOST POPULAR</div>	
				<div class="col-lg-1"></div>
				<div class="col-lg-10">
					<div class="col-lg-4 homeimg"><img class=".img-responsive img-rounded" src="http://localhost/Jaktrip/assets/img/image.png"/></div>	
					<div class="col-lg-4 homeimg"><img class=".img-responsive img-rounded" src="http://localhost/Jaktrip/assets/img/image.png"/></div>
					<div class="col-lg-4 homeimg"><img class=".img-responsive img-rounded" src="http://localhost/Jaktrip/assets/img/image.png"/></div>
				</div>
				<div class="col-lg-1"></div>
			</div>
			
			<div class="col-lg-12 odd">
				<div class="tuffyh1b">BROWSE CATEGORIES</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="col-lg-1"></div>
						<div class="col-lg-10">
							<div class="col-lg-4"><img class=".img-responsive img-rounded" src="http://localhost/Jaktrip/assets/img/image2.png"/></div>	
							<div class="col-lg-4"><img class=".img-responsive img-rounded" src="http://localhost/Jaktrip/assets/img/image2.png"/></div>
							<div class="col-lg-4"><img class=".img-responsive img-rounded" src="http://localhost/Jaktrip/assets/img/image2.png"/></div>
						</div>
						<div class="col-lg-1"></div>
					</div>

					<div class="col-lg-12">
						<div class="col-lg-1"></div>
						<div class="col-lg-10">
							<div class="col-lg-4"><img class=".img-responsive img-rounded" src="http://localhost/Jaktrip/assets/img/image2.png"/></div>	
							<div class="col-lg-4"><img class=".img-responsive img-rounded" src="http://localhost/Jaktrip/assets/img/image2.png"/></div>
							<div class="col-lg-4"><img class=".img-responsive img-rounded" src="http://localhost/Jaktrip/assets/img/image2.png"/></div>
						</div>
						<div class="col-lg-1"></div>
					</div>

					
					<div class="col-lg-12" style="margin-top: 20px;">
						<div class="col-lg-5"></div>
							<button class="col-lg-2 field btn btn-warning" type="button">BROWSE ALL</button>
						<div class="col-lg-5"></div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

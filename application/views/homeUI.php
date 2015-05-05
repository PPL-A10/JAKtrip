

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
								<form class="form-inline" action="http://localhost/Jaktrip/index.php/searchCtr/setInitialVariableRec/" method="post">
								<span class="field custom-dropdown " id="ddcontainerh">
								    <select id="ddbush" class="field form-control" title="Your starting point?" type="dropdown" name="mydropdown" required>    
								        <option value="" selected disabled>Your starting point?</option>
								        <?php							        	
							        		# code...
								        	$label="1";
							        		foreach ($query as $row) {
					        					if ((strcmp(substr($row->halte_code, 0, 3), "K1.")==0) && ($label=="1")){
						        					echo "<optgroup label='Koridor 1'>";	
						        					foreach ($query as $row) {
						        						if (strcmp(substr($row->halte_code, 0, 3), "K1.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="2";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K2.")==0) && ($label=="2")){
						        					echo "<optgroup label='Koridor 2'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K2.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="3";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K3.")==0) && ($label=="3")){
						        					echo "<optgroup label='Koridor 3'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K3.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="4";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K4.")==0) && ($label=="4")){
						        					echo "<optgroup label='Koridor 4'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K4.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="5";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K5.")==0) && ($label=="5")){
						        					echo "<optgroup label='Koridor 5'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K5.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="6";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K6.")==0) && ($label=="6")){
						        					echo "<optgroup label='Koridor 6'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K6.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="7";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K7.")==0) && ($label=="7")){
						        					echo "<optgroup label='Koridor 7'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K7.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="8";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K8.")==0) && ($label=="8")){
						        					echo "<optgroup label='Koridor 8'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K8.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="9";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K9.")==0) && ($label=="9")){
						        					echo "<optgroup label='Koridor 9'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K9.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="10";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K10")==0) && ($label=="10")){
						        					echo "<optgroup label='Koridor 10'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K10")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="11";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K11")==0) && ($label=="11")){
						        					echo "<optgroup label='Koridor 11'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K11")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="12";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K12")==0) && ($label=="12")){
						        					echo "<optgroup label='Koridor 12'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K12")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="13";
						        				}
						        			}        		
								        ?>
								    </select>
								</span>
								
							  <span class="input-group col-lg-3">
							    <span class="field input-group-addon">Rp</span>
							    <input class="field form-control" type="text" placeholder="Budget" name="budget" required>
							  </span>

							  <span class="input-group col-lg-3">
							 	 <input class="field datepicker" type="text" placeholder="Date" name="datepicker" required>
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
								    <select id="ddbush" class="field form-control" title="Your starting point?" type="dropdown" name="mydropdown" required>    
								        <option value="" selected disabled>Your starting point?</option>
								        <?php							        	
							        		# code...
								        	$label="1";
							        		foreach ($query as $row) {
					        					if ((strcmp(substr($row->halte_code, 0, 3), "K1.")==0) && ($label=="1")){
						        					echo "<optgroup label='Koridor 1'>";	
						        					foreach ($query as $row) {
						        						if (strcmp(substr($row->halte_code, 0, 3), "K1.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="2";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K2.")==0) && ($label=="2")){
						        					echo "<optgroup label='Koridor 2'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K2.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="3";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K3.")==0) && ($label=="3")){
						        					echo "<optgroup label='Koridor 3'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K3.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="4";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K4.")==0) && ($label=="4")){
						        					echo "<optgroup label='Koridor 4'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K4.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="5";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K5.")==0) && ($label=="5")){
						        					echo "<optgroup label='Koridor 5'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K5.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="6";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K6.")==0) && ($label=="6")){
						        					echo "<optgroup label='Koridor 6'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K6.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="7";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K7.")==0) && ($label=="7")){
						        					echo "<optgroup label='Koridor 7'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K7.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="8";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K8.")==0) && ($label=="8")){
						        					echo "<optgroup label='Koridor 8'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K8.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="9";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K9.")==0) && ($label=="9")){
						        					echo "<optgroup label='Koridor 9'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K9.")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="10";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K10")==0) && ($label=="10")){
						        					echo "<optgroup label='Koridor 10'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K10")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="11";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K11")==0) && ($label=="11")){
						        					echo "<optgroup label='Koridor 11'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K11")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="12";
						        				}
						        				else if ((strcmp(substr($row->halte_code, 0, 3), "K12")==0) && ($label=="12")){
						        					echo "<optgroup label='Koridor 12'>";	
						        					foreach ($query as $row) {
							        					if (strcmp(substr($row->halte_code, 0, 3), "K12")==0){
							        					echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
							        					}
							        				}
						        					echo "</optgroup>";
						        					$label="13";
						        				}
						        			}        		
								        ?>
								    </select>
								</span>

						  <span class="input-group col-lg-3">
						 	 <input class="field datepicker" type="text" placeholder="Date" name="datepicker" required>
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
							<a href="http://localhost/Jaktrip/index.php/allPlacesCtr"><button class="col-lg-2 field btn btn-warning" type="button">BROWSE ALL</button></a>
						<div class="col-lg-5"></div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
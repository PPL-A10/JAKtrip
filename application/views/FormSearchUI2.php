
    <div class="col-lg-6">
   	 
   	 <div class="row">
   		 <div class="searchbox">
   			 <form class="form-horizontal " >
   				 <div class="form-inline">
   					 <label class="col-lg-2 control-label">Going from </label>
   					 <span id="ddcontainer" class="fieldsml custom-dropdown ">
   					 	<select id="ddbus" class="fieldsml form-control" title="Nearest bus stop?">    
   							 <option value="" selected disabled>Nearest bus stop?</option>
   					      	<?php
   				    		foreach ($query as $row) {
   				    			# code...
								if(strcmp($_COOKIE['halte_name'], $row->halte_name)==0){
									echo "<option value=\"".$row->halte_name."\" selected>".$row->halte_name."</option>";
								}else{
									echo "<option value=\"".$row->halte_name."\">".$row->halte_name."</option>";
								}
							}
   				    		 
   				   			  ?>
   					 	</select>
   					 </span>

   					 <span class="input-group col-lg-3">
   					 	<span class="fieldsml input-group-addon">Rp</span>
   					 	<input id="input_price" class="fieldsml form-control" type="text" style="width: 93%;" value=<?php echo $_COOKIE['budget'] ?> placeholder="Budget">
   				 	</span>

   				 	<span class="input-group col-lg-3">
              <input class="fieldsml datepicker" type="text" placeholder="Date" style="margin-left: 2px;" value=<?php echo $_COOKIE['datechoosen'] ?> >
              </span>
   			 	</div>

   			 	<div class="form-inline">
   					 <label class="col-lg-2 control-label">Filter by </label>
   					 <span id="ddcontainer" class="fieldsml custom-dropdown ">
   					 	<select  id="ddbus" class="fieldsml form-control" title="All Categories">    
   					     	<option value="" selected disabled>All Categories</option>
   					     	<?php
                  foreach($query1 as $row)
                  {
                    echo "<option value='".$row->category_name."'>".$row->category_name."</option>";
                  }
                ?>
   					 	</select>
   					 </span>

   					 <span id="ddcontainer" class="fieldsml custom-dropdown ">
   					 	<select  id="ddbus" class="fieldsml form-control" title="All Location" style="margin-left: -10px;">    
   					     	<option value="" selected disabled>All Location</option>
   					     	<?php
                  foreach($query2 as $row)
                  {
                    echo "<option value='".$row->city."'>".$row->city."</option>";
                  }
                ?>
   					 	</select>
   					 </span>

   				 	<span class="input-group col-lg-3">
   					 	<input class="fieldsml form-control" type="text" placeholder="Enter keyword..." style="width:134%;">
   					 	<span class="input-group-btn">
   					   	<button class="fieldsml btn btn-default" type="button" style="width:40%; margin-left: 45%; margin-right: 5px; padding-left: 20px; padding-right: 20px;"><span class="fa fa-search"></span></button>
   					 	</span>
   				 	</span>
   			 	</div>

   			 	<div class="form-inline" style="margin-top: 10px;">
   					 <label class="col-lg-2 control-label">Price range </label>
   					 <div style="position: relative; padding-right: 27px; padding-left: 122px;">
   						 <input type="text" class="col-lg-9 range" name="range" value="" />
   						 <div class="col-lg-3"></div>
   					 </div>
   				 </div>
   			 </form>
   			 <button type="button" class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" data-target="#rating" onclick="collapseMap()">
	Horizontal Collapsible
</button>
   		 </div>

   		 <div class="searchres">
   			 <div class="row">
   				 <div class="col-lg-5 result">Show all places in Jakarta</div>
   				 <div class="col-lg-2"></div>
   			 
   				 <div class="col-lg-5 form-inline" style="margin-right: -150px;">
   					 <label class="control-label">Sort by </label>
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
   				 <div class="col-lg-11" id="blogMain">
   					  <?php
              echo "<table class='table table-hover'>";
           //   echo $query['result'];
              $counter = 0;
              foreach ($query['result'] as $row) {
                # code...
                  echo "<tr>
                    <td style='width:100px;'>
                      <img src='http://localhost/Jaktrip/assets/bootstrap/img/superman.jpg' class='img-rounded' width='100' height='100'></td>
                    <td>".$row->place_name."<br>halte ".$row->halte_name."<br>harga : ".$query['hargaBusway'][$counter]." (harga Busway) + ".$row->transport_price." (harga Angkot) + ".$row->weekday_price." (harga tiket) = ".$query['harga'][$counter]."
                      <br><button onclick=\"addTrip1('".$row->place_name."','".$row->halte_name."','".$query['hargaBusway'][$counter]."','".$row->transport_price."','".$row->weekday_price."','".$query['harga'][$counter]."','".$row->transport_info."','".$row->place_info."')\">add to trip</button> 
                      <br><a href=\"javascript:showRating('".$row->place_name."')\">see rating</a>
                      </td></tr>";
                      $counter++;
              }
              echo "</table>";
            ?>
   					 
   				 </div>


   			 </div>
   		 </div>
   	 </div>

    </div>

    

    <div class="col-lg-6 rating collapse width" id="rating">
   		 <div class="row">
   			 <div class="col-lg-12 redbar">
   				 <a class="text-danger" href="#"  data-toggle="collapse" data-target="#rating"><span class="fa fa-angle-left" style="font-size: 28px; vertical-align:middle;"></span>
   				 <span class="tuffyh3" style="vertical-align:middle;">&nbsp; Rate and Review</span></a>
   			 </div>
   			 <?php $CI =& get_instance(); ?>
   			 <!--?php if($this->form_validation->run() == TRUE){
   				 echo '<div class="alert alert-dismissible alert-success col-lg-11" style="text-align: center; margin: 15px;">';
   				 echo '<button type="button" class="close" data-dismiss="alert">×</button>';
   				 echo '<strong>Thank you!</strong> You successfully submitted your review. </div>';
   			 }
   			 ?-->

   			 <?php
   			 $attributes = array('class' => 'col-lg-12');
   			 echo form_open('ratingCtr', $attributes); ?>
   				 <div class="formrating form-group">
   				   <div class="col-lg-9">
   					 <label class="control-label">Rating</label><br>
     					  <span class="starRating">
   				     	<input id="rating5" type="radio" name="rate" value="5">
   				     	<label for="rating5">5</label>
   				     	<input id="rating4" type="radio" name="rate" value="4">
   				     	<label for="rating4">4</label>
   				     	<input id="rating3" type="radio" name="rate" value="3" checked>
   				     	<label for="rating3">3</label>
   				     	<input id="rating2" type="radio" name="rate" value="2">
   				     	<label for="rating2">2</label>
   				     	<input id="rating1" type="radio" name="rate" value="1">
   				     	<label for="rating1">1</label>
   				  	</span>
   			   	</div>
   			 	</div>
   				 <br>
   				 <div class="formrating form-group">
   				   <div class="col-lg-9">
   					 <label class="control-label">Title</label>
     					 <input class="form-control" type="text" id="title" name="title">
   			   	</div>
   			 	</div>
   				 <br>
   				 <div class="formrating form-group">
   				   <div class="col-lg-9">
   					 <label class="control-label">Review</label>
     					 <textarea class="form-control" rows="3" id="textArea" id="review" name="review"></textarea>
   			   	</div>
   			 	</div>
   				 <br>
   				 <button class="btn btn-warning" type="submit">SUBMIT</button>
   			 <?php echo form_close(); ?>
   		 </div>

   	 </div>
   	 <div class="col-lg-6 collapse in width"  id="mapcanvas">
    </div>
    <div class="col-lg-6 rating" id="detail" hidden>
   		 <div class="row">
   			 <div class="col-lg-12 redbar">
   				 <a class="text-danger" href="#"><span class="fa fa-angle-left" style="font-size: 28px; vertical-align:middle;"></span>
   				 <span class="tuffyh3" style="vertical-align:middle;" id="detailtitle">&nbsp; Eco Cruise</span></a>
   			 </div>
   			 <div class="col-lg-12 headerdetail"><img src="http://localhost/Jaktrip/assets/img/hd.gif"/>
   			 </div>

   			 <ul id="main-menu" class="sm sm-clean submenu nav navbar-nav" style="margin: -7px 0px; ">
   			 <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
   			 <li><a class="submenua" href="#info">Information</a></li>
   	     	<li><a class="submenua" href="#photos">Photos</a></li>
   	     	<li><a class="submenua" href="#reviews">Reviews</a></li>
   	     	<li><div class="formrating form-group">
   				   <div class="col-lg-3">
     					  <span class="starRating small">
   				     	<input id="rating5" type="radio" name="rate" value="5">
   				     	<label for="rating5">5</label>
   				     	<input id="rating4" type="radio" name="rate" value="4">
   				     	<label for="rating4">4</label>
   				     	<input id="rating3" type="radio" name="rate" value="3" checked>
   				     	<label for="rating3">3</label>
   				     	<input id="rating2" type="radio" name="rate" value="2">
   				     	<label for="rating2">2</label>
   				     	<input id="rating1" type="radio" name="rate" value="1">
   				     	<label for="rating1">1</label>
   				  	</span>
   			   	</div>
   			 	</div></li>
   				<li><span class="fa fa-google-plus-square icondetail"></span></li>
   				<li><span class="fa fa-twitter-square icondetail" id="shareDetailTwitter"></span><script>
window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
</script></li>
   				<li><span class="fa fa-facebook-square icondetail" id="shareDetailFacebook"></span></li>
   				<li>&nbsp;&nbsp;</li>
   				<li><span class="fa fa-check-circle icondetail"></span></li>
   				<li>&nbsp;&nbsp;</li>
   				<li><span class="fa fa-heart icondetail"></span></li>
   			 </ul>
   			 <section class="textdetail" id="info">
   				 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
   				 Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
   				 dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
   				 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
   				 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
   				 Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
   				 dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
   				 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br><br><br>
   				 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
   				 Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
   				 dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
   				 proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br><br>
   				 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
   				 Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
   				 dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
   				 proident, sunt in culpa qui officia deserunt mollit anim id est laborum
   			 </section>
   			 <section class="textdetail tabcontent hide" id="photos">
   				 Gallery photos
   			 </section>
   			 <section class="textdetail tabcontent hide" id="reviews">
   				 lol
   			 </section>
   		 </div>

   	 </div>

    



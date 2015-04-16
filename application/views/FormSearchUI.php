

    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
                    echo "<option id='goingFrom' value=\"".$_COOKIE["halteAwal"]."\" selected>Halte ".$_COOKIE["halteAwal"]."</option>";
                   
                    ?>
              </select>
             </span>

             <span class="input-group col-lg-3">
              <span class="fieldsml input-group-addon">Rp</span>
              <input id="input_price" class="fieldsml form-control" type="text" style="width: 93%;" value="<?php if(isset($_COOKIE['budget'])) {echo $_COOKIE['budget'];} ?>" placeholder="Budget">
            </span>

            <span class="input-group col-lg-3">
              <input class="fieldsml datepicker" type="text" placeholder="Date" id="sisaBudget" style="margin-left: 2px;" value=<?php echo $_COOKIE['datechoosen'] ?> >
              </span>
          </div>

          <div class="form-inline">
             <label class="col-lg-2 control-label">Filter by </label>
             <span id="ddcontainer" class="fieldsml custom-dropdown ">
              <select  id="ddbus" class="fieldsml form-control" onchange="filterFunctionFinal()" title="All Categories">    
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
              <select  id="ddbus" onchange="filterFunctionFinal()" class="fieldsml form-control" title="All Location" style="margin-left: -10px;">    
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
         <!--button type="button" class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" data-target="#rating" onclick="collapseMap()">
  Horizontal Collapsible
</button-->



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

             
               if($isRekomendasi == "true")
               {
                     $counter = 0;
                    $ticketprice = 0;
                      echo "<table class='table-hover' style='margin-bottom: 20px; margin-left: 20px;'>";
                  foreach ($query['result'] as $row) {
                    # code...
                    
                    if($isWeekend == "true")
                    {
                      $ticketprice = $row->weekend_price;
                      
                    }
                    else
                    {
                      $ticketprice = $row->weekday_price;
                    }
                    if($budget>=$query['harga'][$counter])
                    {
                      echo "<tr onclick='javascript:showRating(".$row->place_name.")'>";
                       echo "<td><img src='http://localhost/Jaktrip/assets/img/150.jpg'/></td>";
                        echo "<td height='20px' class='tuffyh3a'>".$row->place_name."<br><div style='font-family:Lato; font-size:14px;'>Rp ".$query['harga'][$counter]." - Indoor Play - ".$row->city."</span><br>".$query['hargaBusway'][$counter]." (harga busway) + ".$row->transport_price." (harga angkot) + ".$ticketprice." (harga tiket)<br><br><button class='btn btn-warning' onclick=\"addTrip11('".$row->place_name."','".$row->halte_name."','".$query['hargaBusway'][$counter]."','".$row->transport_price."','".$ticketprice."','".$query['harga'][$counter]."','".$row->transport_info."','".$row->place_info."')\">ADD TO TRIP</button><br><a href=\"http://localhost/Jaktrip/index.php/PlaceCtr/".$row->place_name."\">see details</a></td>";
                      echo "</tr>";  
                    }
                      
                     $counter++;
                  
                  }
                  echo "</table>";
               }
               else
               {
                   $counter = 0;
                   $ticketprice = 0;
                      echo "<table class='table-hover' style='margin-bottom: 20px; margin-left: 20px;'>";
                    foreach ($query['result'] as $row) {
                      # code...
                      
                      if($isWeekend == "true")
                      {
                        $ticketprice = $row->weekend_price;
                        
                      }
                      else
                      {
                        $ticketprice = $row->weekday_price;
                      }
                   
                   echo "<tr onclick='javascript:showRating(".$row->place_name.")'>";
                       echo "<td><img src='http://localhost/Jaktrip/assets/img/150.jpg'/></td>";
                        echo "<td height='20px' class='tuffyh3a'>".$row->place_name."<br><div style='font-family:Lato; font-size:14px;'>Rp ".$query['harga'][$counter]." - Indoor Play - ".$row->city."</span><br>".$query['hargaBusway'][$counter]." (harga busway) + ".$row->transport_price." (harga angkot) + ".$ticketprice." (harga tiket)<br><br><button class='btn btn-warning' onclick=\"addTrip1('".$row->place_name."','".$row->halte_name."','".$query['hargaBusway'][$counter]."','".$row->transport_price."','".$ticketprice."','".$query['harga'][$counter]."','".$row->transport_info."','".$row->place_info."')\">ADD TO TRIP</button><br><a href=\"http://localhost/Jaktrip/index.php/PlaceCtr/".$row->place_name."\">see details</a></td>";
                      echo "</tr>"; 
                       
                    // echo "<tr>";
                    //  echo "<td><img src='http://localhost/Jaktrip/assets/img/150.jpg'/></td>";
                    //   echo "<td height='20px' class='tuffyh3a'>".$row->place_name."<br>Rp 25000 - Indoor Play -<br><span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star'></span><span class='fa fa-star'></span><br>harga : ".$query['hargaBusway'][$counter]." (harga Busway) + ".$row->transport_price." (harga Angkot) + ".$ticketprice." (harga tiket) = ".$query['harga'][$counter]."<br><button class='btn btn-warning' onclick=\"addTrip1('".$row->place_name."','".$row->halte_name."','".$query['hargaBusway'][$counter]."','".$row->transport_price."','".$ticketprice."','".$query['harga'][$counter]."','".$row->transport_info."','".$row->place_info."')\">ADD TO TRIP</button><br><a href=\"javascript:showRating('".$row->place_name."')\">see rating</a><a href=\"javascript:mengisiReview()\">                 see review</a></td>";
                    // echo "</tr>";
                    
                    
                            $counter++;
                    }
                    echo "</table>";
               }

               
             
            ?>
             
           </div>


         </div>
       </div>
     </div>

    </div>


    

     <div class="col-lg-6 collapse in width"  id="mapcanvas">
    </div>

    <div class="col-lg-6 rating" id="isireview" hidden>
      <div class="row">
        <div class="col-lg-12 redbar">
          <a class="text-danger" href="javascript:tutupReview()"><span class="fa fa-angle-left" style="font-size: 28px; vertical-align:middle;"></span>
          <span class="tuffyh3" style="vertical-align:middle;">&nbsp; Rate and Review</span></a>
        </div>

        <?php 
          // if($this->form_validation->run() == TRUE){
          // echo '<div class="alert alert-dismissible alert-success col-lg-11" style="text-align: center; margin: 15px;">';
          // echo '<button type="button" class="close" data-dismiss="alert">×</button>';
          // echo '<strong>Thank you!</strong> You successfully submitted your review. </div>';
        // }
        ?>

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

    <div class="col-lg-6 rating" id="detailrating" style="height:710px;" hidden>
      <div class="row">
        <div class="col-lg-12 redbar">
          <a class="text-danger" href="javascript:tutupDetailRating();"><span class="fa fa-angle-left" style="font-size: 28px; vertical-align:middle;"></span>
          <span class="tuffyh3" id="namatempat" style="vertical-align:middle;" >&nbsp; Eco Cruise</span></a>
        </div>
        <div class="col-lg-12 headerdetail"><img src="/JAKtrip/assets/img/hd.gif"/>
        </div>

        <ul id="main-menu" class="sm sm-clean submenu nav navbar-nav detail" style="margin: -7px 0px; ">
            <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
            <li><a href="#info" class="submenua" >Information</a></li>
            <li><a href="#photos" class="submenua" >Photos</a></li>
            <li><a href="#reviews" class="submenua" >Reviews</a></li>
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
           <li><span class="fa fa-google-plus-square icondetail"></span>
           <span class="fa fa-twitter-square icondetail"></span>
           <div id='shareFacebook' class='fb-share-button' data-href='' data-layout='icon'></div>
           <span class="fa fa-check-circle icondetail"></span>
           <span class="fa fa-heart icondetail"></span></li>

        </ul>

        <div id="info" class="textdetail tabcontent active" style="margin-top: -100px;">
          <div >
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
          dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
          dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
          </div>
        </div>
        <div id="photos" class="textdetail tabcontent hide" style="margin-top: -150px;">
          <div >
          Gallery photos
          </div>
        </div>
        <div id="reviews" class="textdetail tabcontent hide" style="margin-top: -100px;">
          <div class="reviewmember col-lg-12" >
            <button class="btn btn-warning col-lg-11" type="submit">ADD NEW REVIEW</button><br>
            <div class="reviewkiri col-lg-4">
              <div class="ava"><img src="/JAKtrip/assets/img/50.jpg"/></div>
              <div class="author" id="namauser"><b>Ahmad Ibrahim</b></div>
              <div class="hasreviewed">Reviewed 7 places</div>
            </div>
            <div class="reviewkanan col-lg-8" style="margin-left:-20px; padding-top: 10px;">
                  <span class="fa fa-star" style="color: #F7E51E"></span><span class="fa fa-star" style="color: #F7E51E"></span><span class="fa fa-star" style="color: #F7E51E"></span>
                  <span class="fa fa-star-o" ></span><span class="fa fa-star-o"></span>
                  <span class="deleterev close fa fa-trash-o"><a href=""></a></span>
                  <br>
                  <span class="judulreview tuffyh3a" id="temareview">Tempatnya super menarik!</span><br>
                  <span class="isireview" id="deskripsireview">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, quis nostrud exercitation 
                    ullamco.
                  </span>
            </div>
          </div>

          <div class="reviewmember col-lg-12">
            <div class="reviewkiri col-lg-4">
              <div class="ava"><img src="/JAKtrip/assets/img/50.jpg"/></div>
              <div class="author"><b>Ahmad Ibrahim</b></div>
              <div class="hasreviewed">Reviewed 7 places</div>
            </div>
            <div class="reviewkanan col-lg-8" style="margin-left:-20px; padding-top: 10px;">
                  <span class="fa fa-star" style="color: #F7E51E"></span><span class="fa fa-star" style="color: #F7E51E"></span><span class="fa fa-star" style="color: #F7E51E"></span>
                  <span class="fa fa-star-o" ></span><span class="fa fa-star-o"></span>
                  <span class="deleterev close fa fa-trash-o"><a href=""></a></span><br>
                  <span class="judulreview tuffyh3a">Tempatnya super menarik!</span><br>
                  <span class="isireview">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                    incididunt ut labore et dolore magna aliqua. 
                  </span>
            </div>
          </div>

          <div class="reviewmember col-lg-12">
            <div class="reviewkiri col-lg-4">
              <div class="ava"><img src="/JAKtrip/assets/img/50.jpg"/></div>
              <div class="author"><b>Ahmad Ibrahim</b></div>
              <div class="hasreviewed">Reviewed 7 places</div>
            </div>
            <div class="reviewkanan col-lg-8" style="margin-left:-20px; padding-top: 10px;">
                  <span class="fa fa-star" style="color: #F7E51E"></span><span class="fa fa-star" style="color: #F7E51E"></span><span class="fa fa-star" style="color: #F7E51E"></span>
                  <span class="fa fa-star-o" ></span><span class="fa fa-star-o"></span>
                  <span class="deleterev close fa fa-trash-o"><a href=""></a></span><br>
                  <span class="judulreview tuffyh3a">Tempatnya super menarik!</span><br>
                  <span class="isireview">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, quis nostrud exercitation 
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                  </span>
            </div>
          </div>

        </div>
      </div>

    </div>
   

    



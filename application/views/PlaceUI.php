<div class="row" style="background-color: #fff">
	<div class="col-lg-12">
	
		<div class="headerdetail"><img src="<?php echo base_url('assets/img/header.jpg');?>"/></div>
	
		<div class="col-lg-1"></div>
		<div class="col-lg-10">
			<span class="tuffyh2a" style="margin-top: 5px;"><?php foreach($query as $row){echo $row->place_name;}?></span>&nbsp;&nbsp;&nbsp;&nbsp;
			<span><?php foreach($query as $row){echo $row->city;}?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<!--span class="starRating" style="margin-bottom: 10px;"-->
		        <!--input id="rating5" type="radio" name="rate" value="5">
		        <label for="rating5">5</label>
		        <input id="rating4" type="radio" name="rate" value="4">
		        <label for="rating4">4</label>
		        <input id="rating3" type="radio" name="rate" value="3" checked>
		        <label for="rating3">3</label>
		        <input id="rating2" type="radio" name="rate" value="2">
		        <label for="rating2">2</label>
		        <input id="rating1" type="radio" name="rate" value="1">
		        <label for="rating1">1</label-->
			<?php foreach($query as $row){
				if ($row->rate_avg == 0)
					{echo "<span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o' ></span><span class='fa fa-star-o'></span>";}
				if ($row->rate_avg == 1)
					{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}
				if ($row->rate_avg == 2)
					{echo"<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}
				if ($row->rate_avg == 3)
					{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}
				if ($row->rate_avg == 4)
					{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span>";}
				if ($row->rate_avg == 5)
				{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span>";}
			}?>
			<!--/span-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<span style="font-size: 24px;">
			 <a href="#"><span class="fa fa-google-plus-square" style="color: #E03F3F;"></span></a>&nbsp;
			 <?php foreach($query as $row){ 
			 	echo "<div class='fb-share-button' data-href='".$row->place_name."' data-layout='icon' data-width:'24'></div>";
			 	//echo "<a href='https://www.facebook.com/sharer/sharer.php?app_id=309437425817038&sdk=joey&u=".base_url()."PlaceCtr%2F".$row->place_name."&display=popup&ref=plugin&src=share_button'><span class='fa fa-facebook-square' style='color: #43468C;''></span></a>&nbsp;";
			 } ?>
             <!--a href="#"><span class="fa fa-facebook-square" style="color: #43468C;"></span></a-->&nbsp;
             <a href="#"><span class="fa fa-twitter-square" style="color: #2EA0F2;"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </span>
		    <a href="#"><span class="fa fa-check-circle icondetail"></span></a>
		   <a href="#"> <span class="fa fa-heart icondetail"></span></a>
		    
		</div><br><br>
		<ul id="main-menu" class="sm sm-clean submenu nav navbar-nav detail" style="border-top: 1px solid #c4c4c4;">
			<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
			<li id="inf"><a href="#info" class="submenua" >Information</a></li>
	        <li id="pho"><a href="#photos" class="submenua" >Photos</a></li>
	        <li id="revi"><a href="#reviews" class="submenua" >Reviews</a></li>
		</ul>


		<div class="even isi" >
			<span id="info" style="margin-top: -300px; height: 300px; display: block; visibility: hidden;"></span>
			<section id="infocon" class="textdetail" >
				<div class="col-lg-9">
				<?php foreach($query as $row){echo "<br>Harga<br>&nbsp&nbsp&nbsp&nbspWeekend: Rp ".$row->weekend_price."<br>&nbsp&nbsp&nbsp&nbspWeekday : Rp ".$row->weekday_price."<br><br> <p>".$row->description; } ?>
				
				</div>
			</section>
			<span id="photos" style="margin-top: -300px; height: 300px; display: block; visibility: hidden;"></span>
			<section id="photoscon" class="textdetail">
				<div class="col-lg-9">
				Gallery photos
				</div>
			</section>
			<span id="reviews" style="margin-top: -300px; height: 300px; display: block; visibility: hidden;"></span>
			<section id="reviewscon" class="textdetail" >
				<div class="reviewmember col-lg-9" ><br>
					<button id="addrevbtn" class="field btn btn-warning col-lg-9" type="button">ADD NEW REVIEW</button>
					<?php foreach($query as $row){
						$attributes = array('id' => 'addrevform');
						echo form_open('PlaceCtr/'.$row->place_name, $attributes);
					} ?>
					<br><br>
						<div class="formrating form-group">
						  <div class="col-lg-9">
							<label class="control-label">Rating</label><br>
	  						 <span class="starRating">
						        <input id="rating5" type="radio" name="rate" value="5">
						        <label for="rating5">5</label>
						        <input id="rating4" type="radio" name="rate" value="4">
						        <label for="rating4">4</label>
						        <input id="rating3" type="radio" name="rate" value="3">
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
						<br><br>
						<div class="formrating form-group">
							<div class="col-lg-9"><br>
							<button class="field btn btn-warning" type="submit">SUBMIT</button>
						</div>
						</div>
					</form>
					
					<br><br><br><br>
					<div id="isi_field" >
					<?php
					foreach($query2 as $row){
						echo "<div class='reviewmember col-lg-12' >";				
						echo "<div class='reviewkiri col-lg-4'>";
						echo "<div class='ava'><img src='/JAKtrip/assets/img/50.jpg'/></div>";
						echo "<div class='author' ><b>".$row->username."</b></div>";
						echo "<div class='hasreviewed'>Reviewed 7 places</div>";
						echo "</div>";
						echo "<div class='reviewkanan col-lg-8' style='margin-left:-20px; padding-top: 10px;'>";
							if ($row->rate == 0)
						    {echo "<span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o' ></span><span class='fa fa-star-o'></span>";}
							if ($row->rate == 1)
							{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}
							if ($row->rate == 2)
							{echo"<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}
							if ($row->rate == 3)
							{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";}
							if ($row->rate == 4)
							{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star-o'></span>";}
							if ($row->rate == 5)
							{echo "<span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span><span class='fa fa-star' style='color: #F7E51E'></span>";}
					    echo	"<a href='javascript:deleteFunction(".'"'.$row->id_rate.'","'.$row->place_name.'"'.")' onclick='return confirm(\"Are you sure?\")'><span class='deleterev close fa fa-trash-o' id='nilaiid' value=''></span></a>";	
						//echo 	"<a href='localhost/JAKtrip/ReviewCtr/del/".$row->place_name."/".$row->id_rate."'>tes delete</a>";
						//echo "<a href='javascript:myFunction(".$row->id_rate.",'asasasasee')'>asasasasasasas</a>"
						//echo	anchor('ReviewCtr/del/'.$row->place_name.'/'.$row->id_rate, '<span class="deleterev close fa fa-trash-o"></span>');
					    echo	"<br>";
					    echo	"<span class='judulreview tuffyh3a' id='judul'>"	;													
						echo 	"<p>".$row->title."</p>" ;																
						echo	"</span><br>";
					    echo	"<span class='isireview' id='isireview'>";
						echo 	"<p>".$row->review."</p>" ;		
					    echo	"</span>";
						echo	"</div>";
						echo	"</div>";
					
					}?>
					</div>

			</section>
		</div>
		<div class="col-lg-1"></div>
	</div>
</div>
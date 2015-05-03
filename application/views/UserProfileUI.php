<div class="row" style="margin:120px 0px;">
		<div class="col-lg-1"></div>
		<div class="col-lg-3">
			<div class="tuffyh2a">Syifa Khairunnisa <a href="<?php echo base_url('user/edit');?>"><span class="fa fa-pencil-square-o pull-right someicon" title="Edit profile"></span></a></div>
			<div class="userphoto"><img src="<?php echo base_url('assets/img/150.jpg');?>"></div>
			
			<br><br>
			<div class="usermenu">
				<ul class="nav nav-pills nav-stacked navprofile">
					<li id="litrip"><a href="#trips">Trips<span class="fa fa-angle-right pull-right" style="font-size: 18px;"></span></a></li>
					<li id="liachi"><a href="#achievement">Achievement<span class="fa fa-angle-right pull-right" style="font-size: 18px;"></span></a></li>
					<li id="liwish"><a href="#wishlist">Wishlist<span class="fa fa-angle-right pull-right" style="font-size: 18px;"></span></a></li>
					<li id="lirevi"><a href="#reviews">Reviews<span class="fa fa-angle-right pull-right" style="font-size: 18px;"></span></a></li>
				</ul>
			</div>
		</div>

		<div class="col-lg-6">
			<div id="trips" class="usercontent">
				<div class="row coll">
					<a href="<?php echo base_url('trip/view');?>">
						<div class="col-lg-2"><img src="<?php echo base_url('assets/img/50.jpg');?>"></div>
						<div class="col-lg-8">
							<div class="tuffyh3a">2 Places</div>
							In <b>24 Apr '15</b> | Start from <b>Dunia Fantasi</b> | Total: <b>Rp 157000</b>
						</div>
						<div class="col-lg-2"><span class="fa fa-trash-o iconcol a-none"></span></div>
					</a>
				</div>
			</div>

			<div id="wishlist" class="usercontent">
				<?php
					foreach ($wishlist as $row) {
						echo '<div class="row coll"><a href="#">';
						echo '<div class="col-lg-2"><img src='.base_url("assets/img/50.jpg").'></div>';
						echo '<div class="col-lg-8">';
						echo '<div class="tuffyh3a" id="">'.$row->place_name.'</div>';
						echo $row->city;
						echo '</div><div class="col-lg-2"><span class="fa fa-heart iconcol w"></span></div>';
						echo '</a></div>';
					}
				?>
				
				<!-- <div class="row coll">
					<a href="#">
						<div class="col-lg-2"><img src="<?php // echo base_url('assets/img/50.jpg');?>"></div>
						<div class="col-lg-8">
							<div class="tuffyh3a">Planetarium</div>
							Jakarta Barat
						</div>
						<div class="col-lg-2"><span class="fa fa-heart iconcol w"></span></div>
					</a>
				</div> -->
			</div>

			<div id="achievement" class="usercontent">
				<?php
					foreach ($visited as $row) {
						echo '<div class="row coll"><a href="#">';
						echo '<div class="col-lg-2"><img src='.base_url("assets/img/50.jpg").'></div>';
						echo '<div class="col-lg-8">';
						echo '<div class="tuffyh3a">'.$row->place_name.'</div>';
						echo $row->city;
						echo '</div><div class="col-lg-2"><span class="fa fa-check-circle iconcol a"></span></div>';
						echo '</a></div>';
					}
				?>
				<!-- <div class="row coll">
					<a href="#">
						<div class="col-lg-2"><img src="<?php //echo base_url('assets/img/50.jpg');?>"></div>
						<div class="col-lg-8">
							<div class="tuffyh3a">Museum Nasional</div>
							Jakarta Pusat
						</div>
						<div class="col-lg-2"><span class="fa fa-check-circle iconcol a"></span></div>
					</a>
				</div> -->
			</div>

			<div id="reviews" class="usercontent">
				<div class="row collrev">
					<a href="#">
						<div class="col-lg-2"><img src="<?php echo base_url('assets/img/50.jpg');?>"></div>
						<div class="col-lg-8">
							<div class="tuffyh3a">Planetarium</div>
							<span class='fa fa-star' style='color: #F7E51E'></span>
							<span class='fa fa-star' style='color: #F7E51E'></span>
							<span class='fa fa-star' style='color: #F7E51E'></span>
							<span class='fa fa-star' style='color: #F7E51E'></span>
							<span class='fa fa-star-o'></span>
						</div>
						<div class="col-lg-2"></div>
					</a>
				</div>
				<div class="row collrev">
					<a href="#">
						<div class="col-lg-2"><img src="<?php echo base_url('assets/img/50.jpg');?>"></div>
						<div class="col-lg-8">
							<div class="tuffyh3a">Museum Wayang</div>
							<span class='fa fa-star' style='color: #F7E51E'></span>
							<span class='fa fa-star' style='color: #F7E51E'></span>
							<span class='fa fa-star-o'></span>
							<span class='fa fa-star-o'></span>
							<span class='fa fa-star-o'></span>
						</div>
						<div class="col-lg-2"></div>
					</a>
				</div>
			</div>

		</div>

		<div class="col-lg-2"></div>

</div>	


<script type="text/javascript">
$(document).ready(function() {
	$("span.iconcol").click(function(){
		if($(this).hasClass("w")){
			var c = confirm("Are you sure you want to remove this from your wishlist?");
			if(c==true){
				$(this).removeClass("w");
				$(this).addClass("w-none");
				setTimeout(function () {
					location.href='removeWishlist';
				}, 3500); 
				notifDelWishlist();
			}
		}
		else if($(this).hasClass("a")){
			var c = confirm("Are you sure you want to remove this from your achievement?");
			if(c==true){
				$(this).removeClass("a");
				$(this).addClass("a-none");
				setTimeout(function () {
					location.href='removeVisited';
				}, 3500); 
				notifDelAchievement();
			}
		}				
		else{}
	});
});
</script>
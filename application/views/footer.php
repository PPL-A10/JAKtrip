<footer>
	<div class="container-fluid">
		<div class="col-lg-12">
				<div class="col-md-1"><img src="../assets/img/logo2.png" class="img-responsive" /></div>
				<div class="row">
					<span class="tuffyh3 col-md-6">Explore fun places within your budget in Jakarta</span>
					<ul class="linkfooter nav navbar-nav navbar-left col-md-6">
						<li><a class="linkfooter" href="about.html">About</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">F.A.Q</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Site Map</a></li>
						<li><a href="#">Mobile</a></li>
					</ul>
				</div>
		</div>
	</div>
</footer>

<script src="../assets/js/jquery-1.11.0.min.js"></script>
<script src="../assets/js/ion.rangeSlider.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jaktrip.js"></script>
<script src="../assets/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/js/gmaps.js"></script>
<script src="../assets/js/jquery.smartmenus.min.js"></script>
<script src="../assets/js/menuselector.js"></script>

<script>
	  $(function() {
		  $('#main-menu').smartmenus();
		});
</script>
<script type="text/javascript">
    // When the document is ready
    $(document).ready(function () {
        
        $('.datepicker').datepicker({
            format: "dd/mm/yyyy"
        });  

    });

    $(function () {

        $(".range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 500000,
            from: 10000,
            to: 75000,
            type: 'double',
            step: 500,
            prefix: "Rp ",
            grid: true
        });

    });
</script>

<script>
  function initialize() {
    var mapCanvas = document.getElementById('mapcanvas');
    var mapOptions = {
      center: new google.maps.LatLng(-6.190035, 106.838075),
      zoom: 12,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions)
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script>
		$("#tab1 #checkAll").click(function () {
	        if ($("#tab1 #checkAll").is(':checked')) {
	            $("#tab1 input[type=checkbox]").each(function () {
	                $(this).prop("checked", true);
	            });

	        } else {
	            $("#tab1 input[type=checkbox]").each(function () {
	                $(this).prop("checked", false);
	            });
	        }
	    });
	</script>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var gmarkers = [];
var counter = 0;
var map;
var myCenter=new google.maps.LatLng(-6.190035, 106.838075);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:11,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

  google.maps.event.addListener(map, 'click', function(event) {
   // map.setMap(null);
    if(counter!=0)
       gmarkers[counter-1].setMap(null);
    counter++;
    placeMarker(event.latLng);
  });
}

function placeMarker(location) {
   
  var marker = new google.maps.Marker({
    position: location,
    map: map,
  });
  gmarkers.push(marker);
  var infowindow = new google.maps.InfoWindow({
    content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng() + '<br><button onclick="addLocation('+location.lat()+', '+location.lng()+')">Add Location</button>'
  });
  infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', initialize);

function addLocation(lat,lng){
 //code....
}
</script>
</head>

<body>
<div id="googleMap" style="width:500px;height:380px;"></div>

</body>
</html>

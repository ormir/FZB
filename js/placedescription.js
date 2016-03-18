// Google Maps
var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 48.2171205, lng: 16.3918585},
    zoom: 14
  });
}
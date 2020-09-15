<!DOCTYPE html>
<html>
  <head>
    <title>Marker Labels</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmri8Sivjksp-rJazre_I3F0BVFwC2jf0&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <link rel="stylesheet" type="text/css" href="../styles/user-map2.css" />
   // In the following example, markers appear when the user clicks on the map.
// Each marker is labeled with a single alphabetical character.
const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
let labelIndex = 0;

function initMap() {
  const bangalore = { lat: 12.97, lng: 77.59 };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: bangalore
  });
  // This event listener calls addMarker() when the map is clicked.
  google.maps.event.addListener(map, "click", event => {
    addMarker(event.latLng, map);
  });
  // Add a marker at the center of the map.
  addMarker(bangalore, map);
}

// Adds a marker to the map.
function addMarker(location, map) {
  // Add the marker at the clicked location, and add the next-available label
  // from the array of alphabetical characters.
  new google.maps.Marker({
    position: location,
    label: labels[labelIndex++ % labels.length],
    map: map
  });
}

  </head>
  <body>
    <div id="map"></div>
  </body>
</html>

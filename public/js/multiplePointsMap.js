// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.
var map;
var markers = [];

function initMap() {
    var haightAshbury = {lat: 4.6097100, lng: -74.0817500};

    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: haightAshbury,
      mapTypeId: 'terrain'
    });

    // This event listener will call addMarker() when the map is clicked.
    //marca direccion en el mapa al dar click
    map.addListener('click', function(event) {
      addMarker(event.latLng);
    });

    // Adds a marker at the center of the map.
    //addMarker(haightAshbury);

    addMarkerByDB();
  }

  // Adds a marker to the map and push to the array.
  function addMarker(location) {
    var marker = new google.maps.Marker({
      position: location,
      map: map
    });
    markers.push(marker);
  }

  // Sets the map on all markers in the array.
  function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(map);
    }
  }

  // Removes the markers from the map, but keeps them in the array.
  function clearMarkers() {
    setMapOnAll(null);
  }

  // Shows any markers currently in the array.
  function showMarkers() {
    setMapOnAll(map);
  }

  // Deletes all markers in the array by removing references to them.
  function deleteMarkers() {
    clearMarkers();
    markers = [];
  }


  function addMarkerByDB() {

    var url = "getPoints";

    var points = "";

    var latitude = "";

    var longitude = "";

    $.ajax({
        url : url,
        type : "get",
        async: false,
        success : function (data) {
           points = data;
        }
    });

    for (let i in points) {

        latitude = points[i].latitude;
        longitude = points[i].longitude;

        console.log(longitude);

        var object = {lat:parseFloat(latitude),lng:parseFloat(longitude)};

        console.log(object);

        var marker = new google.maps.Marker({
            position: object,
            map: map
        });

        markers.push(marker);

    }


  }

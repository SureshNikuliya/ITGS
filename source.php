<?php

session_start();

?>

<!DOCTYPE html>
<html>
  <head>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['btn'])) { 

        include 'sorting.php';
        
    }
}
?>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Current Location</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
         border: 2px solid #999;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        bottom:10%;
        left: 25%;
        z-index: 10;
        background-color: #fff;
        padding: 10px;
        border: 2px solid #999;
        text-align: center;
        font-family: Consolas;
        line-height: 30px;
        padding-left: 10px;
      }
      #latlng {
        width: 225px;
      }
    </style>
  </head>
  <body onload="getLocation()">
    <div id="floating-panel">
      <ul>
      <li><form action="sorting.php" method="POST">
      Laltitude : <input id="lat" type="text"  name="l1">
      Longitude : <input id="lng" type="text"  name="l2"></li>
       <input id="submit" type="button" value="Get Your current Location" >
       <button type="submit" name="btn" >Find Nearest Place</button> </li>
     </ul>
    </form>
    </div>
    <div id="map"></div>
    <script>
      

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: 15.2993, lng: 74.1240}
        });
        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

        document.getElementById('submit').addEventListener('click', function() {
          geocodeLatLng(geocoder, map, infowindow);
        });
      }

      function geocodeLatLng(geocoder, map, infowindow) {
        var input = document.getElementById('lat').value +','+ document.getElementById('lng').value;
        var latlngStr = input.split(',', 2);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              map.setZoom(11);
              var marker = new google.maps.Marker({
                position: latlng,
                map: map
              });
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
       }

          var xx;
          var yy;
          function getLocation() {
              if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
              } 
              else { 
                    x.innerHTML = "Geolocation is not supported by this browser.";
              }
          }

            function showPosition(position) {
              xx = position.coords.latitude;
              yy = position.coords.longitude;
              document.getElementById('lat').value=xx;
              document.getElementById('lng').value=yy;  
            }



    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRZ8di7cKfG8IXF3Fn5U80gOysHZDP9wg&callback=initMap">
    </script>
  </body>
</html>
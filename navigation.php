

<?php
session_start();
require_once 'config.php';
require_once 'functions.php';

$admin = new Admin();
$db = new dbClass();
$admin->checkSession($_SESSION);
// if(empty($_session)){
//   echo "<script>window.location.href='login.php'</script>";
// }else{
  // print_r($_SESSION);
// }







?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVNAHRAuqVZnHg5QZUpUyzIf6-oRDh-ys"></script>
   
    <script>
      let marker1, marker2, marker3, marker4;
      let poly;
      let step = 0.005;
      let numSteps = 200;
      let timePerStep = 10;
      
      function initMap() {
          const map = new google.maps.Map(document.getElementById("map"), {
              zoom: 12,
              center: { lat: 31.561920, lng: 74.348080 },
          });
      
          map.controls[google.maps.ControlPosition.TOP_CENTER].push(
              document.getElementById("info")
          );
          marker1 = new google.maps.Marker({
              map,
              draggable: true,
              position: { lat: 31.561950, lng: 74.348080 },
          });
          marker2 = new google.maps.Marker({
              map,
              draggable: true,
              position: { lat: 31.561962, lng: 74.348088 },
          });
          marker3 = new google.maps.Marker({
              map,
              draggable: true,
              position: { lat: 31.561976, lng: 74.348170 },
          });
          marker4 = new google.maps.Marker({
              map,
              draggable: true,
              position: { lat: 31.561980, lng: 74.348180 },
          });
          map.addListener("click", function (e) {
              console.log(e);
              addMarker(e.latLng);
          });
          const bounds = new google.maps.LatLngBounds(
              marker1.getPosition(),
              marker2.getPosition(),
              marker3.getPosition(),
              marker4.getPosition()
          );
          console.log(bounds);
          map.fitBounds(bounds);
          google.maps.event.addListener(marker1, "position_changed", update);
          google.maps.event.addListener(marker2, "position_changed", update);
          google.maps.event.addListener(marker3, "position_changed", update);
          google.maps.event.addListener(marker4, "position_changed", update);
      
          poly = new google.maps.Polyline({
              strokeColor: "#FF0000",
              strokeOpacity: 1.0,
              strokeWeight: 5,
              map: map,
          });
      
          update();
      }
      
      function update() {
          const path = [
              marker1.getPosition(),
              marker2.getPosition(),
              marker3.getPosition(),
              marker4.getPosition(),
          ];
      
          poly.setPath(path);
      
          const heading1 = google.maps.geometry.spherical.computeHeading(
              marker1.getPosition(),
              marker2.getPosition()
          );
          const heading2 = google.maps.geometry.spherical.computeHeading(
              marker2.getPosition(),
              marker3.getPosition()
          );
          const heading3 = google.maps.geometry.spherical.computeHeading(
              marker3.getPosition(),
              marker4.getPosition()
          );
      
          animateMarker(marker1, marker2.getPosition(), heading1, numSteps, timePerStep, step);
          animateMarker(marker2, marker3.getPosition(), heading2, numSteps, timePerStep, step);
          animateMarker(marker3, marker4.getPosition(), heading3, numSteps, timePerStep, step);
      }
      
      function animateMarker(marker, target, heading, numSteps, timePerStep, step) {
          let i = 0;
          const interval = setInterval(function () {
              if (i >= numSteps) {
                  clearInterval(interval);
                  return;
              }
              const newPosition = google.maps.geometry.spherical.computeOffset(
                  marker.getPosition(),
                  step,
                  heading
              );
              marker.setPosition(newPosition);
              i++;
          }, timePerStep);
      }
      
      window.initMap = initMap;
      </script>
      

</head>

<body onload="initMap()">
    <div class="container">

      

        <?php require_once("globals/top.php"); ?>

        <section>

            <div class="left">
                <ul>

                    <li><a href="#">Drone Operation</a></li>
                    <li><a href="admin.php">Admin</a></li>
                    <li><a href="#">Upload Video</a></li>


                </ul>
                <a class="lgout" href="welcome.php">log out</a>
            </div>
        </section>
        <main class="content" style="display: flex; justify-content: center;">
            <div class="ratio-16x9">
            <div id="container">this contain the information box  </div>
            <div id="map" style="border: 20px   solid rgba(255, 255, 255, 0.76); height: 800px; width: 1200px;"></div>
        </div>
        </main>
        <footer class="footer">© Copyright drn pjct</footer>
    </div>



</body>

</html>
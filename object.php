

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
    <title>Object Recognition</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVNAHRAuqVZnHg5QZUpUyzIf6-oRDh-ys"></script>
    <script>
        var map;
        var marker;
        var path = [];
    
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 20,
                center: { lat: 31.469729, lng: 74.313842 }
            });
    
            marker = new google.maps.Marker({
                position: { lat: 31.469729, lng: 74.313842 },
                map: map,
                draggable: true
            });
    
            path = [marker.getPosition()];
    
            polyline = new google.maps.Polyline({
                path: path,
                geodesic: true,
                strokeColor: 'blue',
                strokeOpacity: 3.0,
                strokeWeight: 5
            });
    
            polyline.setMap(map);
    
            map.addListener('click', function (e) {
                path.push(e.latLng);
    
                if (polyline) {
                    polyline.setMap(null);
                }
    
                polyline = new google.maps.Polyline({
                    path: path,
                    geodesic: true,
                    strokeColor: 'blue',
                    strokeOpacity: 3.0,
                    strokeWeight: 5
                });
    
                polyline.setMap(map);
            });
    
            marker.addListener('dragend', function () {
                path[0] = marker.getPosition();
                polyline.setPath(path);
            });
        }
    </script>
    
</head>

<body onload="initMap()">
    <div class="container">

     

        <?php require_once("globals/top.php"); ?>

        <section>

            <div class="left">
                <ul>

                    <li><a href="#">Drone Operation</a></li>
                    <!-- <li><a href="admin.php">Admin</a></li> -->
                    <!-- <li><a href="user.php">User</a></li> -->
                    <li><a href="#">Upload Video</a></li>


                </ul>
                <a class="lgout" href="welcome.php">log out</a>
            </div>
        </section>
        <main class="content" style="display: flex; justify-content: center;">
            <div class="ratio-16x9">
            <div id="map" style="border: 20px   solid rgba(255, 255, 255, 0.76); height: 800px; width: 1200px;"></div>
        </div>
        </main>
        <footer class="footer">© Copyright drn pjct</footer>
    </div>



</body>

</html>
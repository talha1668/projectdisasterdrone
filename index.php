
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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Drone</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="main.css">

</head>

<body>



  <div class="container">
   
    
    
    <?php require_once("globals/top.php"); ?>

    <section>

      <!-- <div class="col-lg-4 left"> -->
        <!-- <ul>

          <li><a href="#">Drone Operation</a></li>
          <li><a href="#">Upload Video</a></li>


        </ul> -->
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
      
       
    </section>
    <main class="content">

      <div class="box ratio-16x9">
        <iframe width="1100" height="600" src="https://www.youtube.com/embed/6dnqGrSKudM" title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen></iframe>





      </div>
    </main>
    <footer class="footer">© Copyright drn pjct</footer>
  </div>
</body>
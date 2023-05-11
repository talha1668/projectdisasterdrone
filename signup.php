<?php
session_start();

require_once 'authentications.php';
require_once 'config.php';
require_once 'functions.php';
$db = new dbClass();
$admin = new Admin();
$auth = new Authentication();
if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $mobile = $_POST["mobile"];
  $address = $_POST["address"];

  // Check if email already exists in database
  $result = $admin->getDataByUniqueColumn("users", "email", $email);

  if ($result) {
    // Email already exists, show error message
    echo "<script>alert('Email is already being used!');</script>";
  } else {
    // Email does not exist, register user and login
    $data = ["email" => $email, "password" => $password, "mobile" => $mobile, "address" => $address];
    $insert = $admin->addData($data, "users");
    if ($insert) {
      $login = $auth->Login($email, $password);
      if ($login) {
        if (empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["mobile"]) || empty($_POST["address"])) {
          // If any of the required fields are empty, show error message
          echo "<script>alert('Please fill all the required fields!');</script>";
        } else {
          // Redirect to index page after successful registration and login
          echo "<script>alert('User registered successfully!');</script>";
          echo "<script>window.location.href='index.php';</script>";
        }
      } else {
        echo "<script>alert('Failed to login!');</script>";
      }
    } else {
      echo "<script>alert('Failed to register user!');</script>";
    }
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="style.css">
</head>

<body>




  <div class="login">


    <h2 class="active"><a href="signup.php"> signup </a> </h2>
    <h2 class="nonactive"><a href="login.php">login </a></h2>
    <form id="myForm" action="" enctype="multipart/form-data" method="post">


      <label for="email">EMAIL</label>
      <input type="text" class="text" name="email" id="email">

      <div id="em_err" style="    margin: -29px 20px; position: absolute;"></div>

      <label for="password">PASSWORD</label>
      <input type="password" class="text" name="password" id="password">

      <div id="pw_err" style="    margin: -29px 20px; position: absolute;"></div>

      <label for="mobile">PHONE NUMBER</label>
      <input type="text" class="text" name="mobile" id="mobile">

      <div id="mb_err" style="    margin: -29px 20px; position: absolute;"></div>

      <label for="address">ADDRESS</label>
      <input type="textarea" class="text" name="address" id="address">

      <div id="ad_err" style="    margin: -29px 20px; position: absolute;"></div>



      <input type="checkbox" id="checkbox-1-1" class="custom-checkbox" />
      <label for="checkbox-1-1">Keep me signin </label>

      <button class="sign_in" type="submit" name="submit" id="submit">
        Sign In


        <hr>

        <a href="#">Forgot Password?</a>
    </form>

  </div>


</body>

</html>
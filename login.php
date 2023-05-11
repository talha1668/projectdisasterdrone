<?php
session_start();

require_once 'authentications.php';
require_once 'config.php';
require_once 'functions.php';
$db = new dbClass();
$admin = new Admin();
$auth = new Authentication();
if (isset($_POST["email"]) && isset($_POST["password"])) { // check if email and password are set in POST request

  $email = $db->addStr($_POST["email"]);
  $password = $db->addStr($_POST["password"]);
  $result = $auth->Login($email, $password);
  if ($result == true) {
    if (empty($_POST["email"])) { // check if email is empty
      echo "Please enter your email";
    } else if (empty($_POST["password"])) { // check if password is empty
      echo "Please enter your password";
    } else {
      echo "<script>window.location.href='index.php';</script>"; // redirect to index.php
    }
  } else {
    echo "<script>alert('Incorrect email or password');</script>"; // display error message for incorrect email or password
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
    <h2 class="active"><a href="login.php">login </a></h2>

    <h2 class="nonactive"><a href="signup.php"> signin </a> </h2>
    <form id="myForm" action="" method="post">



      <label for="email">EMAIL</label>
      <input type="text" class="text" name="email" id="email">

      <div id="em_err" style="    margin: -29px 20px; position: absolute;"></div>




      <label for="password">PASSWORD</label>
      <input type="password" class="text" name="password" id="password">


      <input type="checkbox" id="checkbox-1-1" class="custom-checkbox" />
      <label for="checkbox-1-1">Keep me log in</label>

      <button class="log_in" name="submit" type="submit">
        Log In
      </button>


      <hr>

      <a href="#">Forgot Password?</a>
    </form>

  </div>
  <script>
    // get the form element
    const form = document.getElementById("myForm");

    // add event listener to form submit event
    form.addEventListener("submit", function(event) {
      // prevent the form from submitting
      // event.preventDefault();

      // get the input fields
      // const nameInput = document.getElementById("name");
      const emailInput = document.getElementById("email");
      const passwordInput = document.getElementById("password");

      const em_err = document.getElementById("em_err");
      const pw_err = document.getElementById("pw_err");


      // check if the input values are valid

      const email_regex = /^\S+@\S+\.\S+$/;
      if (emailInput.validity.typeMismatch || emailInput.value === "") {
        em_err.innerHTML = "Please enter your email";
        em_err.style.color = "red";
        return false;
      }
      // else if (!email_regex.test(email)) {
      //   em_err.innerHTML = "Please enter a valid email address";
      //   em_err.style.color = "white";
      //   return false;
      // } 
      else {
        em_err.innerHTML = "";
      }


      if (passwordInput.value === "") {
        pw_err.innerHTML = "Please enter your password";
        pw_err.style.color = "red";
        return false;
      } else {
        pw_err.innerHTML = "";
      }


      return true;
    });


    // if all input values are valid, submit the form
  </script>
</body>

</html>
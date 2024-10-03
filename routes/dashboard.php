<?php
  session_start();
  if(!isset($_SESSION['userdata'])){
    header("location: ../");
  }
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    .hero-image {
      background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("https://picsum.photos/1100/800");
      height: 50%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
    }

    .hero-text {
      text-align: center;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
    }



</style>
</head>
<body>

<div class="hero-image">
  <div class="hero-text"><h1>Voting is your fundamental right</h1>
  <button type="button" href="registration.html" class="btn btn-primary" style=" position: fixed;
            top: -80px;
            right: -310px;">Logout</button>
  <a href = "href="registration.html">  "<button   type="button" class="btn btn-info"style=" position: fixed;
            top: -80px;
            left: -310px;">Back</button>
 
  </div>
</div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
</html>
<?php

?>

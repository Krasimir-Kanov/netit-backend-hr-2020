<?php session_start(); ?>
<?php include './src/db/Database.php'; ?>
<?php include './src/models/Auth.php'; ?>
<?php include './src/util/form.php'; ?>
<?php include './src/util/Pagination.php'; ?>
<?php include './src/util/redirect.php'; ?>
<!doctype html>
<html lang="en">

<head>
  <title>net-it-project-krasimir-kanov</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!-- My Custom CSS -->
  <link rel="stylesheet" href="css/style.css" />
  <!--Animations-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
</head>

<body id="body">
  <nav class="navbar navbar-expand-lg navbar-light static-top">
    <?php if (Auth::isNotAuthenticated()) { ?>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"> <a class="nav-link" href="index.php"> 
        <img src="./img/home.png" width="30" height="30" class="d-inline-block align-top"></a> </li>
        <li class="nav-item"> <a class="nav-link" href="signup.php">Employ</a> </li>
        <li class="nav-item"> <a class="nav-link" href="signup-employer.php">Employer</a> </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a>
      </ul>
    <?php } ?>

    <?php if (Auth::isAuthenticated()) { ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"> <a class="nav-link" href="signout.php">Sign Out</a>
      </ul>
    <?php } ?>
  </nav>
  </div id="content">
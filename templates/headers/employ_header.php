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
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Job Category</a>

      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php $categoryFetch = Database::query("SELECT * FROM tm_job_categories"); ?>
        <?php while ($jobCategory = Database::fetch($categoryFetch)) {  ?>
          <?php $categoryId = $jobCategory['id']; ?>
          <a class="dropdown-item" href="<?php echo "http://localhost/KKP/jobs.php?category=$categoryId" ?>">
            <?php echo $jobCategory['title'] ?> </a>
        <?php } ?>
        <a class="dropdown-item" href="http://localhost/KKP/jobs.php">Clear </a>
      </div>

      <div>
        <form method="$_GET">
          <section class="row justify-content-left">
            <div class="col"><input class="input pd-7" type="text" placeholder="Search Offers" name="q"></div>
            <div class="row">
              <select class="input pd-7" name="q_selector">
                <option value="title">Search by Title</option>
                <option value="content">Search by Content</option>
              </select>
            </div>
            <div class="col">
              <input type="submit" class="btn btn-light specialbtn">
              <a class="btn btn-light specialbtn" href="http://localhost/KKP/jobs.php">Clear</a>
            </div>
            <input type="hidden" name="job_search_tokken" value="1">
          </section>
        </form>
      </div>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="signout.php">Sign Out</a>
      </ul>
    <?php } ?>
    </div>
  </nav>
</div id="content">
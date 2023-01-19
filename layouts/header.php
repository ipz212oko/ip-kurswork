<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ua">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Кіноджем</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- Bootstrap Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- //// -->
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light  py-3 fixed-top">
    <div class="container">
      <a href="index.php"><img class="logo" src="assets/imgs/logo.jpeg" /></a>
      <a href="index.php">
        <h2 class="brand">КІНОДЖЕМ</h2>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link" href="index.php">Головна</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="film.php">Фільми</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cartoons.php">Мультфільми</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="serial.php">Серіали</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="category-movies.php">Категорії</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="contact.php">Контакти</a>
          </li>

          <li class="nav-item">

            <a href="account.php"><i class="fas fa-user"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <form class=" " role="search" method="post" action="" style="margin:13vh 0 2vh;">
    <div class="d-flex align-items-center position-relative">
      <input type="text" name="search" class="m-auto form-control w-50 border border-dark " placeholder="Пошук" require>
      <button style="margin-right: 25%;" type="submit" value="Search" class="btn btn-default position-absolute bottom-45 end-0"><i class="fas fa-search"></i></button>
    </div>
  </form>

  <?php
  if (isset($_POST['search'])) {
    require "./server/search.php";
    if (count($results) > 0) {
      foreach ($results as $r) { ?>
        <div class=" d-flex flex-row" style="height:100px;">
          <a class="container d-flex align-items-center w-100 mb-3" style="background-color: rgba(0, 0, 0, 0.05);" href="<?php echo "single_product.php?product_id=" . $r['product_id']; ?>">
            <img class="img-fluid w-5" style="height:100%; width:50px" src="assets/imgs/<?php echo $r['product_image']; ?>" />
            <h5 class="m-5 p-name"><?php echo $r['product_name']; ?></h5>
          </a>
        </div>
  <?php }
    } else {
      echo "<div></div>";
    }
  }
  ?>
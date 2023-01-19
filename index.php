<?php include('layouts/header.php');
include('server/connection.php'); ?>

<section id="home">
  <div class="container-fluid">
    <div class=" bg-info">
      <div id="demo" class="carousel slide p-4" data-ride="carousel">

        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
        </ul>

        <div class="carousel-inner">

          <div class="carousel-item active">
            <div class="d-flex justify-content-around">

              <img class="img_carousel" src="assets/imgs/001-movie.jpg" alt="" width="200" height="300">
              <img src="assets/imgs/002-serial.jpg" alt="" width="200" height="300">
              <img src="assets/imgs/003-serial.jpg" alt="" width="200" height="300">
              <img src="assets/imgs/004-serial.jpg" alt="" width="200" height="300">

            </div>
          </div>

          <div class="carousel-item">
            <div class="d-flex justify-content-around">
              <img class="img_carousel" src="assets/imgs/004-serial.jpg" alt="" width="200" height="300">
              <img src="assets/imgs/008-movie.jpg" alt="" width="200" height="300">
              <img src="assets/imgs/002-cartoon.jpg" alt="" width="200" height="300">
              <img src="assets/imgs/007-cartoon.jpg" alt="" width="200" height="300">
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </div>
  </div>
</section>

<section id="featured" class="my-3 pb-3">
  <div class="container text-left mt-3 py-3">
    <h3>Популярні</h3>
    <hr class="mx-auto">
  </div>
  <div class="row mx-auto container-fluid">
    <?php include('server/get_featured_products.php'); ?>
    <?php while ($row = $featured_products->fetch_assoc()) { ?>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <a href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>"> <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
          <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
        </a>
      </div>
    <?php } ?>
  </div>
</section>

<section id="novelty" class="my-3">
  <div class="container mt-3 py-3">
    <h3>Новинки</h3>
    <hr class="mx-auto">
  </div>
  <div class="row mx-auto container-fluid">
    <?php include('server/get_novelty.php'); ?>
    <?php while ($row = $novelty->fetch_assoc()) { ?>

      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <a href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>"> <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
          <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
        </a>
      </div>
    <?php } ?>
  </div>
</section>

<section id="shortly" class="my-3">
  <div class="container  mt-3 py-3">
    <h3>Скоро</h3>
    <hr class="mx-auto">
  </div>
  <div class="row mx-auto container-fluid">
    <?php include('server/get_shortly.php'); ?>
    <?php while ($row = $shortly->fetch_assoc()) { ?>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <a href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>"> <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
          <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
        </a>
      </div>
    <?php } ?>
  </div>
</section>

<section id="random" class="my-3">
  <div class="container mt-3 py-3">
    <h3>Випадковий вибір</h3>
    <hr class="mx-auto">
  </div>
  <div class="row mx-auto container-fluid">
    <?php include('server/get_random.php'); ?>
    <?php while ($row = $random->fetch_assoc()) { ?>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <a href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>"> <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
          <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
        </a>
      </div>
    <?php } ?>
  </div>
</section>
</div>
</section>

<?php include('layouts/footer.php'); ?>
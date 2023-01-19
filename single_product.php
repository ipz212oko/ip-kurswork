<?php include('layouts/header.php');

include('server/connection.php');
if (isset($_GET['product_id'])) {
  $product_id =  $_GET['product_id'];

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
  $stmt->bind_param("i", $product_id);
  $stmt->execute();

  $product = $stmt->get_result();
} else {
  header('location: index.php');
}

?>
<section class="container single-product my-3 pt-3">
  <div class="row mt-3 mb-3">
    <?php while ($row = $product->fetch_assoc()) { ?>
      <div class=" col-md-6 col-sm-12 m-3 center">
        <img style="height:90%; width:60%" class="img-fluid  pb-1" src="assets/imgs/<?php echo $row['product_image']; ?>" id="mainImg" />
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 m-3 pt-5">
        <h5>Назва</h5>
        <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" />
        <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>" />
        <h6 class="mt-3 mb-3">Опис</h6>
        <span><?php echo $row['product_description']; ?>
        </span>
      </div>
      <iframe width="560" height="515" src="<?php echo $row['video']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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
<?php include('layouts/footer.php'); ?>
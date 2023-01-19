<?php include('layouts/header.php'); ?>

<section id="serial" class="my-5">
    <div class="container  mt-5 py-5">
        <h3>Серіали</h3>
        <hr class="mx-auto">
    </div>
    <div class="row mx-auto container-fluid">
        <?php include('server/get_serial.php'); ?>
        <?php while ($row = $serial->fetch_assoc()) { ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <a href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>"> <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
                    <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                </a>
            </div>
        <?php } ?>
    </div>
</section>
<?php include('layouts/footer.php'); ?>
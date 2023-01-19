<?php include('layouts/header.php');
include('server/connection.php');

if (isset($_POST['search'])) {

  if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
  } else {
    $page_no = 1;
  }

  $category = $_POST['category'];

  $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products WHERE product_category=? ");
  $stmt1->bind_param('s', $category);
  $stmt1->execute();
  $stmt1->bind_result($total_records);
  $stmt1->store_result();
  $stmt1->fetch();

  $total_records_per_page = 8;

  $offset = ($page_no - 1) * $total_records_per_page;

  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;

  $adjacents = "2";

  $total_no_of_pages = ceil($total_records / $total_records_per_page);

  $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category=? LIMIT $offset,$total_records_per_page");
  $stmt2->bind_param("s", $category);
  $stmt2->execute();
  $products = $stmt2->get_result(); //[]

} else {
  if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
  } else {
    $page_no = 1;
  }

  $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products");
  $stmt1->execute();
  $stmt1->bind_result($total_records);
  $stmt1->store_result();
  $stmt1->fetch();

  $total_records_per_page = 8;

  $offset = ($page_no - 1) * $total_records_per_page;

  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;

  $adjacents = "2";

  $total_no_of_pages = ceil($total_records / $total_records_per_page);

  $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
  $stmt2->execute();
  $products = $stmt2->get_result();
}
?>

<section id="search" class="my-5 py-5 ms-2">
  <div class="container mt-2 py-5">
    <p>Пошук по категоріям</p>
    <hr>
  </div>

  <form action="category-movies.php" method="POST">
    <div class="row mx-auto container">
      <div class="col-lg-12 col-md-12 col-sm-12">

        <p>Категорії</p>
        <div class="form-check">
          <input class="form-check-input" value="film" type="radio" name="category" id="category_one" <?php if (isset($category) && $category == 'film') {
                                                                                                        echo 'checked';
                                                                                                      } ?>>
          <label class="form-check-label" for="flexRadioDefault1">
            Фільми
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" value="cartoons" type="radio" name="category" id="category_two" <?php if (isset($category) && $category == 'cartoons') {
                                                                                                            echo 'checked';
                                                                                                          } ?>>
          <label class="form-check-label" for="flexRadioDefault2">
            Мультфільми
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" value="serial" type="radio" name="category" id="category_two" <?php if (isset($category) && $category == 'serial') {
                                                                                                          echo 'checked';
                                                                                                        } ?>>
          <label class="form-check-label" for="flexRadioDefault2">
            Серіали
          </label>
        </div>


      </div>
    </div>

    <div class="form-group my-3 mx-3">
      <input type="submit" name="search" value="Пошук" class="btn btn-default ">
    </div>
    <form>
</section>

<section id="category-movies" class="my-5 py-5">
  <div class="container mt-2 py-5">
    <h3>Фільми</h3>
    <hr>
  </div>
  <div class="row mx-auto container">

    <?php while ($row = $products->fetch_assoc()) { ?>
      <div onclick="window.location.href='single_product.html';" class="product text-center col-lg-3 col-md-4 col-sm-12">
        <a class="" href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>">
          <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
          <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
        </a>
      </div>
    <?php } ?>

    <nav aria-label="Page navigation example" class="mx-auto">
      <ul class="pagination mt-5 mx-auto">
        <li class="page-item <?php if ($page_no <= 1) {
                                echo 'disabled';
                              } ?> ">
          <a class="page-link" href="<?php if ($page_no <= 1) {
                                        echo '#';
                                      } else {
                                        echo "?page_no=" . ($page_no - 1);
                                      } ?>">Назад</a>
        </li>
        <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
        <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

        <?php if ($page_no >= 3) { ?>
          <li class="page-item"><a class="page-link" href="#">...</a></li>
          <li class="page-item"><a class="page-link" href="<?php echo "?page_no=" . $page_no; ?>"><?php echo $page_no; ?></a></li>
        <?php } ?>

        <li class="page-item <?php if ($page_no >=  $total_no_of_pages) {
                                echo 'disabled';
                              } ?>">
          <a class="page-link" href="<?php if ($page_no >= $total_no_of_pages) {
                                        echo '#';
                                      } else {
                                        echo "?page_no=" . ($page_no + 1);
                                      } ?>">Вперед</a>
        </li>
      </ul>
    </nav>
  </div>
</section>
<?php include('layouts/footer.php'); ?>
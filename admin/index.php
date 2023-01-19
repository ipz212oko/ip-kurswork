<?php include('header.php');
if (!isset($_SESSION['admin_logged_in'])) {
  header('location: login.php');
  exit();
}
if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
  $page_no = $_GET['page_no'];
} else {
  $page_no = 1;
}
?>

<div class="container-fluid">
  <div class="row" style="min-height: 1000px">
    <?php include('sidemenu.php'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Адмін панель</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          </div>
        </div>
      </div>

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
  </main>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>

</html>
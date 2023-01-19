<?php include('layouts/header.php');
include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
  header('location: account.php');
  exit;
}
if (isset($_POST['register'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  if ($password !== $confirmPassword) {
    header('location: register.php?error=passwords do not match');
  } else if (strlen($password) < 6) {
    header('location: register.php?error=password must be at least 6 characters');
  } else {
    $stmt1 = $conn->prepare("SELECT count(*) FROM users where user_email=?");
    $stmt1->bind_param('s', $email);
    $stmt1->execute();
    $stmt1->bind_result($num_rows);
    $stmt1->store_result();
    $stmt1->fetch();

    if ($num_rows != 0) {
      header('location: register.php?error=user with this email already exists');
    } else {
      $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password) 
                        VALUES (?,?,?)");

      $stmt->bind_param('sss', $name, $email, md5($password));

      if ($stmt->execute()) {
        $user_id = $stmt->insert_id;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
        $_SESSION['logged_in'] = true;
        header('location: account.php?register_success=You registered successfully');
      } else {
        header('location: register.php?error=could not create an account at the moment');
      }
    }
  }
}
?>

<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">
    <h2 class="form-weight-bold">Реєстрація</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container">
    <form id="register-form" method="POST" action="register.php">
      <p style="color: red;"><?php if (isset($_GET['error'])) {
                                echo $_GET['error'];
                              } ?></p>
      <div class="form-group">
        <label>Ім'я</label>
        <input type="text" class="form-control" id="register-name" name="name" placeholder="Ім'я" required />
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required />
      </div>
      <div class="form-group">
        <label>Пароль</label>
        <input type="password" class="form-control" id="register-password" name="password" placeholder="Пароль" required />
      </div>
      <div class="form-group">
        <label>Підтвердіть пароль</label>
        <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Підтвердіть пароль" required />
      </div>
      <div class="form-group">
        <input type="submit" class="btn" id="register-btn" name="register" value="Зареєструватися" />
      </div>
      <div class="form-group">
        <a id="login-url" href="login.php" class="btn">Вже є аккаунт? Ввійдіть</a>
      </div>
    </form>
  </div>
</section>
<?php include('layouts/footer.php'); ?>
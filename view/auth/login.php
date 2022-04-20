<?php
if (!isset($_SESSION)) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php
  $pageTitle = 'Inloggen';
  include("view/components/header.php"); ?>
    <link rel="stylesheet" href="view/assets/Login.css">

</head>

<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <a href="index.php?con=home&op=home">
          <img src="view/assets/payment/logo.png" alt="IMG">
        </a>
        </div>

        <form class="login100-form validate-form" method="post" action="index.php?con=auth&op=login">
          <span class="login100-form-title">
          <h5 class="text-black">Inloggen</h5>
          </span>

          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
              <input class="input100" type="email" name="email" placeholder="Email" require>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password is required">
              <input class="input100" type="password" name="password" placeholder="Password" require>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="container-login100-form-btn">
              <input class="login100-form-btn" value="Login" type="submit" name="loginUser">
          </div>

            <div class="text-center pt-3">
            <span class="txt1">Wachtwoord</span>
            <a class="txt2" href="#">Vergeten?</a>
          </div>

          <div class="text-center ">
            <a class="txt2" href="index.php?con=auth&op=registreer">Maak een account aan<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a><br/>
            
            <span class="txt1">Terug naar hoofdpagina?</span>
            <a class="txt2" href="index.php">Klik hier</a>
          </div>

        </form>
      </div>
    </div>
  </div>

  <script>
<?php if(isset($_SESSION['msg'])): ?>
  toastr.info("<?= $this->Display->flash('msg') ?>");
  <?php endif ?>



  <?php if(isset($_SESSION['success'])): ?>
  toastr.success("<?= $_SESSION['success'] ?>");
  <?php unset($_SESSION['success']); endif ?>


  <?php if(isset($_SESSION['danger'])): ?>
  toastr.error("<?= $_SESSION['danger'] ?>");
  <?php unset($_SESSION['danger']); endif ?>

</script>

</body>

</html>
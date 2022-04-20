<head>
  <?php

if (!isset($_SESSION)) {
  session_start();
}

  $pageTitle = "Home";
  include "components/header.php";
  ?>
  <link rel="stylesheet" href="view/assets/Home.css">
  <link rel="stylesheet" href="view/assets/navbar.css">
  <link rel="stylesheet" href="view/assets/footer.css">
    <link rel="stylesheet" href="view/assets/bestselling.css">
</head>

<body>

  <?php include "components/navbar.php"; ?>

  <section>
    <div id="reclamebanner" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#reclamebanner" data-slide-to="0" class="active"></li>
        <li data-target="#reclamebanner" data-slide-to="1"></li>
        <li data-target="#reclamebanner" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
          <div class="carousel-item active">
            <picture>
              <source srcset="./view/assets/image/2000x200.png" style="width: -webkit-fill-available;" alt="2000x200" media="(min-width: 1400px)">
              <source srcset="./view/assets/image/1400x200.png" style="width: -webkit-fill-available;" alt="1400x200" media="(min-width: 768px)">
              <source srcset="./view/assets/image/800x200.png" style="width: -webkit-fill-available;" alt="800x200" media="(min-width: 576px)">
              <img srcset="./view/assets/image/600x200.png" style="width: -webkit-fill-available;" alt="600x200" class="d-block img-fluid">
            </picture>
            <div class="carousel-caption d-none d-md-block">
            </div>

        </div>
          <div class="carousel-item">
            <picture>
            <source srcset="./view/assets/image/2000x200(2).png" style="width: -webkit-fill-available;" alt="2000x200" media="(min-width: 1400px)">
              <source srcset="./view/assets/image/1400x200(2).png" style="width: -webkit-fill-available;" alt="1400x200" media="(min-width: 768px)">
              <source srcset="./view/assets/image/800x200(2).png" style="width: -webkit-fill-available;" alt="800x200" media="(min-width: 576px)">
              <img srcset="./view/assets/image/600x200(2).png" style="width: -webkit-fill-available;" alt="600x200" class="d-block img-fluid">
            </picture>
            <div class=" carousel-caption d-none d-md-block">
            </div>
        </div>
          <div class="carousel-item">
            <picture>
            <source srcset="./view/assets/image/2000x200(3).png" style="width: -webkit-fill-available;" alt="2000x200" media="(min-width: 1400px)">
              <source srcset="./view/assets/image/1400x200(3).png" style="width: -webkit-fill-available;" alt="1400x200" media="(min-width: 768px)">
              <source srcset="./view/assets/image/800x200(3).png" style="width: -webkit-fill-available;" alt="800x200" media="(min-width: 576px)">
              <img srcset="./view/assets/image/600x200(3).png" style="width: -webkit-fill-available;" alt="600x200" class="d-block img-fluid">
            </picture
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
      </div>
      <a class="carousel-control-prev" href="#reclamebanner" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#reclamebanner" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

  </section>
  <?php include 'components/bestselling.php' ?>

  <?= $categories_items; ?>


  <?php include 'components/footer.php'; ?>

  <script>
<?php if(isset($_SESSION['success'])): ?>
  toastr.success("<?= $_SESSION['success'] ?>");
  <?php unset($_SESSION['success']); endif ?>


  <?php if(isset($_SESSION['danger'])): ?>
  toastr.error("<?= $_SESSION['danger'] ?>");
  <?php unset($_SESSION['danger']); endif ?>

</script>

</body>

</html>
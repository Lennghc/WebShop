<?php $active = 'active';
if(empty($_GET['op'])){$op= 'home';}else{$op = $_GET['op'];}
?>
<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col">
        <a class="navbar-brand" href="index.php?op=home">GameaHolic <span></span></a>
      </div>
      <div class="col d-flex justify-content-end">
        <p class="mb-0 d-flex">
        <div class="dropdown-menu" aria-labelledby="dropdown05">
          <?php
          if (empty($_SESSION['customer_id'])) {
          ?>
            <a class="dropdown-item" href="index.php?con=auth&op=login">Login</a>
            <a class="dropdown-item" href="index.php?con=auth&op=registreer">Registreer</a>
          <?php
          } else {
            if ($_SESSION['customer_admin'] === '1') {
              echo '<a class="dropdown-item" href="index.php?con=admin&op=products">Admin omgeving</a>';
            }
          ?>
            <a class="dropdown-item" href="index.php?con=home&op=settings">Wijzig gevens</a>
            <a class="dropdown-item" href="index.php?con=auth&op=logout">Logout</a>
          <?php
          }
          ?>
        </div>
        <a href="#" class="d-flex align-items-center justify-content-center login-user nav-link dropdown-toggle" id="navbarDropmenu-69" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-015 fa-user"><i class="sr-only">user</i></span></a>

        <a href="index.php?con=home&op=cart" class="d-flex align-items-center justify-content-center"><span id="cart" class="fas fa-shopping-basket fa-015"><i class="sr-only">Winkel</i></span></a>
        </p>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
      </button>
      <form action="index.php?con=home&op=search" method="POST" class="searchform order-lg-last">
        <div class="form-group d-flex">
          <input type="text" name="query" class="form-control pl-3" placeholder="Zoeken..">
          <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
        </div>
      </form>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php if($op == 'home'){echo $active;}?>"><a href="index.php?op=home" class="nav-link">Home</a></li>
          <li class="nav-item dropdown <?php if($op == 'categories'){echo $active;}?>">
            <a class="nav-link dropdown-toggle" href="?op=categories" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorieën</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <!-- <a class="dropdown-item" href="index.php?op=#">Page 1</a> -->
              <?= $categories ?>
            </div>
          </li>
          <li class="nav-item <?php if($op == 'about'){echo $active;}?>"><a href="index.php?con=home&op=about" class="nav-link">Over-ons</a></li>
          <li class="nav-item <?php if($op == 'contact'){echo $active;}?>"><a href="index.php?con=home&op=contact" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>


</section>
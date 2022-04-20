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


<div class="container py-4">
    <h2>Zoeken: <?= $query ?></h2>

    <?php if (count($products) > 0): ?>

    <div class="row">
<?php
        foreach ($products as $key => $value) {
        $image = 'view/assets/image/' . $value['product_thumbnail'];
        $image = ($value['product_thumbnail'] != '' ? $image : "https://via.placeholder.com/350x430");
        $link = $value['id'];
      ?>
        <div class=col-md-3>
          <form method='post'>
            <div class="bestseller">
              <!-- Image 3 -->
              <div class="content_img">
                <a href='?op=details&id= <?= $link ?> '>
                  <img class="bestSellerImage" src="<?= $image ?>" alt="">
                </a>
                <div>
                <a href='?op=details&id= <?= $link ?> '>Lees meer over dit product</a>
                </div>
              </div>
              <div class="product_title">
                <h4>
                  <?= $value['product_name'] ?>
                </h4>
              </div>
              <div class="bottom_bestseller">
                <div class="price">

                  <span><?= $value['product_price'] ?></span>
                </div>

                <div class="text-center d-md-inline">
                  <!-- <input type='hidden' name='product_id' value='<?= $value['id'] ?>' id='<?= $value['id'] ?>'> -->
                  <button type="submit" name="add" class="rounded-circle roundbutton border-0 add_cart" id="<?= $value['id'] ?>"><i class="fas fa-plus fa-010" aria-hidden="true"></i></button>
                </div>
              </div>

            </div>
          </form>
        </div>
      <?php } ?>



    </div>

    <?php else: ?>
        <p class="text-center">
            Er zijn geen producten gevonden die voldoen aan uw zoekopdracht
        </p>
    <?php endif; ?>
</div>

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
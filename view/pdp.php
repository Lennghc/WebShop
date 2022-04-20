<head>
    <?php

    if ( ! isset($_SESSION)) {
        session_start();
    }

    $pageTitle = "Home";
    include "components/header.php";
    ?>
    <link rel="stylesheet" href="view/assets/Home.css">
    <link rel="stylesheet" href="view/assets/navbar.css">
    <link rel="stylesheet" href="view/assets/footer.css">
    <link rel="stylesheet" href="view/assets/bestselling.css">
    <link rel="stylesheet" href="view/assets/details.css">
</head>

<body>

<?php include "components/navbar.php"; ?>

<?php
$product_information = $product_information[0];
$image = 'view/assets/image/' . $product_information['product_thumbnail'];
$image = ($product_information['product_thumbnail'] != '' ? $image : "https://via.placeholder.com/350x430");

//die($image);
?>
<!--    id, product_name,product_price,product_categorie,product_title,product_thumbnail-->

<div class="container">
    <div class="product_details">
        <div class="row">
            <div class="col-md-3">
                <div class="imgBox">
                    <img width="100%" height="100%" src="<?= $image ?>" alt="product image">
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 product_header">
                        <h1>
                            <?= $product_information['product_name'] ?>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p>
                            <?= $product_information['product_description']; ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="row priceCard">
                            <div class="col-md-12">
                                <div class="price">
                                    <h3>
                                        <?= $product_information['product_price'] ?>
                                    </h3>
                                </div>
                            </div>

                        </div>
                        <div class="row addToCardRow">
                            <div class="col-md-12 pdpAddToCard">
                                <a href="">
                                    <button type="submit" name="add" class="add_cart" id="<?=$product_information['id']?>">Add to card</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
<?php

if (!isset($_SESSION)) {
    session_start();
  }

  if(empty($_SESSION['customer_admin']) || $_SESSION['customer_admin'] === '0'){

    $_SESSION['danger'] = 'U heeft geen toegang';
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    $pageTitle = 'Producten';
    include 'view/components/header.php';
    ?>
    <link href="view/assets/sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php include 'view/components/sidebar.php'; ?>

        <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Producten Overzicht</h1>
        <a class="btn btn-primary" href='index.php?con=admin&op=products&page=create'>Maak product</a>
    </div>
    <div class="m-3">
    <?= $products ?>

    <?= $nav ?>
    </div>     

</div>
</div>

    </div>

    <script>
<?php if(isset($_SESSION['success'])): ?>
  toastr.success("<?= $_SESSION['success'] ?>");
  <?php unset($_SESSION['success']); endif ?>


  <?php if(isset($_SESSION['danger'])): ?>
  toastr.error("<?= $_SESSION['danger'] ?>");
  <?php unset($_SESSION['danger']); endif ?>

</script>

    <script src="view/assets/sidebar.js"></script>

</body>
</html>
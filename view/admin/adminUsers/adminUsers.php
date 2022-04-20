<?php

if (!isset($_SESSION)) {
    session_start();
  }

  if(empty($_SESSION['customer_admin']) || $_SESSION['customer_admin'] === '0'){

    $_SESSION['danger'] = "U heeft geen toegang";
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    $pageTitle = 'Admin Gebruikers';
    include 'view/components/header.php';
    ?>
    <link href="view/assets/sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php include 'view/components/sidebar.php'; ?>

        <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Admin Gebruikers Overzicht</h1>
    </div>
    <div class="m-3">
    <?= $adminUsers ?>
    </div>     

</div>
</div>
        
    </div>

    <script src="view/assets/sidebar.js"></script>

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
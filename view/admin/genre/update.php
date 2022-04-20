<?php
if (!isset($_SESSION)) {
  session_start();
}

if ($_SESSION['customer_admin'] === '0') {

  $_SESSION['danger'] = 'U heeft geen toegang';
  header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $pageTitle = 'Update genre';
  include 'view/components/header.php';
  ?>
  <link href="view/assets/sidebar.css" rel="stylesheet">

</head>

<body>


  <div id="wrapper">

    <?php include 'view/components/sidebar.php'; ?>

    <div class="container-fluid">
      <h1 class="h3 mb-4 text-gray-800">Genre <u><?= $html['categorie_name'] ?></u> updaten</h1>
    </div>
    <div class="m-3">


      <form action="index.php?con=admin&op=genre&page=update&id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">


        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Naam:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="categorie_name" value="<?= $html['categorie_name'] ?>">
          </div>
        </div>


        <input type="submit" class="btn btn-primary" name="updateSubmit" value="Wijzig">

      </form>

    </div>

  </div>
  </div>

  </div>

  <script src="view/assets/sidebar.js"></script>

</body>

</html>
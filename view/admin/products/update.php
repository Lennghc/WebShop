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
  $pageTitle = 'Update product';
  include 'view/components/header.php';
  ?>
  <link href="view/assets/sidebar.css" rel="stylesheet">

</head>

<body>


  <div id="wrapper">

    <?php include 'view/components/sidebar.php'; ?>

    <div class="container-fluid">
      <h1 class="h3 mb-4 text-gray-800">Product <u><?= $html['product_title'] ?></u> updaten</h1>
    </div>
    <div class="m-3">


      <form action="index.php?con=admin&op=products&page=update&id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
      <input type="submit" class="btn btn-primary" name="updateSubmit" value="Wijzig">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label"> Geselecteerde Genre:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="product_categorie" value="<?= $html['product_categorie'] ?> "readonly>
          </div>
          <label class="col-sm-2 col-form-label"> Nieuwe Genre:</label>
          <select name="categorie" id="categorie">
            <?php
              var_dump($list);
              foreach($list as $item) {
                  echo "<option value='$item[categorie_name]'>$item[categorie_name]</option>";
              }
            ?>
            </select><br>
        </div>
        
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Naam:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="product_name" value="<?= $html['product_name'] ?>">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Prijs:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="product_price" value="<?= $html['product_price'] ?>">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Details:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="product_details" value="<?= $html['product_details'] ?>">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Titel:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="product_title" value="<?= $html['product_title'] ?>">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Beschrijving:</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="product_description" rows="3"><?= $html['product_description'] ?></textarea>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Thumbnail:</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" name="file">
            <img style="height:50%" src="view/assets/image/<?=$html['product_thumbnail']?>">
          </div>
        </div>

      </form>

    </div>

  </div>
  </div>

  </div>

  <script src="view/assets/sidebar.js"></script>

</body>

</html>
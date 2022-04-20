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
  $pageTitle = 'Update Klant';
  include 'view/components/header.php';
  ?>
  <link href="view/assets/sidebar.css" rel="stylesheet">

</head>

<body>

  <div id="wrapper">

    <?php include 'view/components/sidebar.php'; ?>

    <div class="container-fluid">
      <h1 class="h3 mb-4 text-gray-800">Klant Update</h1>
    </div>
    <div class="container-fluid mt-3 mb-4">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card bg-default shadow">
            <div class="card-body">

              <form action="index.php?con=admin&op=customers&page=update&id=<?=$_GET['id']?>" method="POST">

                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="InputFirstname">Voornaam:</label>
                    <input type="text" class="form-control" name="firstname" id="InputFirstname" value="<?= $update['customer_firstname'] ?>" />
                  </div>
                  <div class="col-sm-6">
                    <label for="InputLastname">Achternaam:</label>
                    <input type="text" class="form-control" name="lastname" id="InputLastname" value="<?= $update['customer_lastname'] ?>" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="InputStreet">Straat:</label>
                    <input type="text" class="form-control" name="street" id="InputStreet" value="<?= $update['customer_street'] ?>" />
                  </div>
                  <div class="col-sm-6">
                    <label for="InputHouseNumber">Huis nummer:</label>
                    <input type="text" class="form-control" name="housenumber" id="InputHouseNumber" value="<?= $update['customer_housenumber'] ?>" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="InputLocation">Plaats:</label>
                    <input type="text" class="form-control" name="location" id="InputLocation" value="<?= $update['customer_location'] ?>" />
                  </div>
                  <div class="col-sm-3">
                    <label for="InputZipcode">Postcode:</label>
                    <input type="text" class="form-control" name="zipcode" id="InputZipcode" value="<?= $update['customer_zipcode'] ?>" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="InputEmail">Email-address:</label>
                    <input type="email" class="form-control" name="email" placeholder="info@GAMEAHOLIC.nl" id="InputEmail" value="<?= $update['customer_email'] ?>" />
                  </div>
                </div>

                <input type="submit" name="updateSubmit" class="btn btn-success px-4 float-right" value="Wijzig gegevens">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>

  </div>

  <script src="view/assets/sidebar.js"></script>



</body>

</html>
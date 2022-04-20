<head>
  <?php

if (!isset($_SESSION)) {
  session_start();
}

if(!isset($_SESSION['customer_id'])){

  $_SESSION['danger'] = 'U bent niet ingelogd';
  header("Location: index.php");
}

  $pageTitle = "Gebruikers instellingen";
  include "components/header.php";
  ?>
  <link rel="stylesheet" href="view/assets/Home.css">
  <link rel="stylesheet" href="view/assets/navbar.css">
  <link rel="stylesheet" href="view/assets/footer.css">
</head>

<body class="d-flex flex-column min-vh-100">

  <?php include "components/navbar.php";?>

  <div class="container-fluid mt-3 mb-4">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card bg-default shadow">
              <h5 class="card-header">Account Gegevens</h5>
              <div class="card-body">
                <form method="post" action="index.php?con=auth&op=settings" enctype='multipart/form-data'>

                  <div class="form-group row">
                        <div class="col-sm-6">
                        <label for="InputFirstname">Voornaam:</label>
                    <input type="text" class="form-control" name="firstname" id="InputFirstname" value="<?= $data['customer_firstname'] ?>" />
                        </div>
                        <div class="col-sm-6">
                        <label for="InputLastname">Achternaam:</label>
                    <input type="text" class="form-control" name="lastname" id="InputLastname" value="<?= $data['customer_lastname'] ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                        <label for="InputStreet">Straat:</label>
                    <input type="text" class="form-control" name="street" id="InputStreet" value="<?= $data['customer_street'] ?>" />
                        </div>
                        <div class="col-sm-6">
                        <label for="InputHouseNumber">Huis nummer:</label>
                    <input type="text" class="form-control" name="housenumber" id="InputHouseNumber" value="<?= $data['customer_housenumber'] ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                        <label for="InputLocation">Plaats:</label>
                    <input type="text" class="form-control" name="location" id="InputLocation" value="<?= $data['customer_location'] ?>" />
                        </div>
                        <div class="col-sm-3">
                        <label for="InputZipcode">Postcode:</label>
                    <input type="text" class="form-control" name="zipcode" id="InputZipcode" value="<?= $data['customer_zipcode'] ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                        <label for="InputEmail">Email-address:</label>
                    <input type="email" class="form-control" name="email" placeholder="info@GAMEAHOLIC.nl" id="InputEmail" value="<?= $data['customer_email'] ?>" />
                        </div>
                    </div>

                  <input type="submit" name="accountSubmit" class="btn btn-success px-4 float-right" value="Wijzig gegevens">
                </form>
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
  </script>

</body>

</html>
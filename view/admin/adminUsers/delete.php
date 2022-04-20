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
  $pageTitle = 'Verwijder Admin';
  include 'view/components/header.php';
  ?>
  <link href="view/assets/sidebar.css" rel="stylesheet">

</head>

<body>

  <div id="wrapper">

    <?php include 'view/components/sidebar.php'; ?>

    <div class="container-fluid">
      <h1 class="h3 mb-4 text-gray-800">Verwijder Admin</h1>
      <p >Weet je het zeker?</p>
    

              <form action="index.php?con=admin&op=customers&page=delete&id=<?=$_GET['id']?>" method="POST">

                <a class="btn btn-success px-4" href="index.php?con=admin&op=customers&page=adminUsers">Nee</a>
                <input type="submit" name="deleteSubmit" class="btn btn-danger px-4" value="Ja">
              </form>
              </div>

  </div>
  </div>

  </div>

  <script src="view/assets/sidebar.js"></script>



</body>

</html>
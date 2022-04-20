<head>
  <?php

if (!isset($_SESSION)) {
  session_start();
}

  $pageTitle = "WinkelMand";
  include "components/header.php";
  ?>
  <link rel="stylesheet" href="view/assets/Home.css">
  <link rel="stylesheet" href="view/assets/navbar.css">
  <link rel="stylesheet" href="view/assets/shopcart.css">
  <link rel="stylesheet" href="view/assets/footer.css">
</head>

<body class="d-flex flex-column min-vh-100">

  <?php include "components/navbar.php";?>


  <section>

    <div class="container">
      <div class="card get_cart mt-4 container shadow">

      <div class='container padding-bottom-3x mb-1'>  
  <div class='table-responsive shopping-cart'>
      <table class='table'>
          <thead>
              <tr>
                  <th>Product Naam</th>
                  <th class='text-center'>Aantal</th>
                  <th class='text-center'></th>
                  <th class='text-center'>Subtotaal</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>

          <?=$output?>


          </tbody>
      </table>
  </div>
  <div class='shopping-cart-footer'>
    <?php $price = str_replace('.',',', $_SESSION['total_price']) ?>
      <div class='column text-lg'>Totaal: <span class='text-medium'>€ <?=$price?></span></div>
  </div>
  <div class='shopping-cart-footer'>
      <div class='column'><a class='btn btn-outline-secondary' href='index.php'><i class='fa fa-arrow-left'></i>&nbsp;Terug winkelen</a></div>
      <div class='column'><a class='btn btn-success' href='#'>Betalen</a></div>
  </div>
</div>


      </div>
   
    </div>



    </section>


  <?php include 'components/footer.php'; ?>

</body>

</html>
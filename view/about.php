<head>
  <?php

if (!isset($_SESSION)) {
  session_start();
}

  $pageTitle = "Over Ons";
  include "components/header.php";
  ?>
  <link rel="stylesheet" href="view/assets/Home.css">
  <link rel="stylesheet" href="view/assets/navbar.css">
  <link rel="stylesheet" href="view/assets/footer.css">
</head>

<body class="d-flex flex-column min-vh-100">

  <?php include "components/navbar.php";?>


  <section>
      <div>


              <div class="m-2">
                <div class="card container rounded shadow">
                  <h3 class="">Over ons</h3>
                  <p class="">Hoe het eigenlijk echt begon?</p>
                </div>
              </div>



        <div class="m-2">
          <div class="container rounded-lg shadow card">
            <p class="m-2"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lacinia placerat nisi, non aliquet metus facilisis at. Integer a varius est. Aenean non lacinia nisi. Aliquam sollicitudin vel lorem nec blandit. Maecenas non sagittis ex, et auctor ex. Curabitur eget facilisis felis. Cras facilisis libero eu dolor tincidunt, eget facilisis justo lacinia. Etiam ut justo pharetra, suscipit arcu ac, lacinia ligula. Quisque vitae nulla sagittis, consectetur orci vel, iaculis ante. Fusce vitae tellus eu odio lacinia luctus vitae quis nisi. Etiam purus eros, sagittis sit amet dapibus sed, volutpat in purus. Etiam rhoncus velit ex, at commodo orci gravida ut. Morbi imperdiet imperdiet orci, nec mollis enim sollicitudin sed. Nunc porttitor lacus eu est auctor sollicitudin. Duis pulvinar sed risus vel aliquet. Aenean libero neque, facilisis et condimentum ac, luctus ac magna.<br><br>

Sed dictum enim sed ex lobortis mattis. Pellentesque tempus lorem at lacus ullamcorper dapibus. Vivamus sed vestibulum neque. Proin ultrices non dolor id finibus. Cras lobortis gravida volutpat. Nam ut urna porttitor, blandit nunc non, aliquam leo. Morbi ut urna non sem sollicitudin congue in vel eros. Vivamus ut nisi vitae felis pellentesque luctus id vel metus. Curabitur hendrerit eget quam at molestie. Donec vel ultrices odio.<br><br>

Nunc pretium ligula odio, quis gravida tellus hendrerit vitae. Aenean non orci orci. Nam malesuada tempor enim, ut malesuada tellus. Suspendisse potenti. Sed dictum nisi dui, eu convallis enim volutpat nec. Integer in nibh placerat, accumsan magna eu, euismod erat. Donec tincidunt molestie tortor. Nullam venenatis, justo sit amet tristique varius, sem elit commodo odio, nec iaculis sapien eros vitae purus. Fusce ac ornare ipsum. Curabitur eu dolor blandit, facilisis justo id, mattis lacus. Sed molestie commodo lobortis. Etiam vulputate nisi fermentum odio malesuada, vitae posuere augue semper. Nam magna augue, pretium at dignissim vitae, pretium vitae diam. Vestibulum malesuada, quam ac pharetra suscipit, justo nibh consectetur augue, ac congue augue mi a urna. Aliquam sit amet lectus maximus, interdum lorem eu, laoreet augue. Quisque interdum eget metus eget elementum.
            </p>
          </div>
        </div>
      </div>
    </section>


  <?php include 'components/footer.php'; ?>

</body>

</html>
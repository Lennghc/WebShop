<head>
  <?php

  if (!isset($_SESSION)) {
    session_start();
  }

  $pageTitle = "Contact";
  include "components/header.php";
  ?>
  <link rel="stylesheet" href="view/assets/Home.css">
  <link rel="stylesheet" href="view/assets/navbar.css">
  <link rel="stylesheet" href="view/assets/footer.css">
</head>

<body class="d-flex flex-column min-vh-100">

  <?php include "components/navbar.php"; ?>

  <section> 
  <div class="container">

    <div class="row">

      <div class="col-xl-8 offset-xl-2 py-5">

        <form method="post" action="">

        <div class="controls">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_name">Voornaam *</label>
                  <input id="form_name" type="text" name="name" class="form-control" placeholder="Voeg uw voornaam in *" required="required">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_lastname">Achternaam *</label>
                  <input id="form_lastname" type="text" name="lastname" class="form-control" placeholder="Voeg uw achternaam in *" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_email">Email *</label>
                  <input id="form_email" type="email" name="email" class="form-control" placeholder="Voeg uw email adres *" required="required">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_need">Wat voor soort vraag heeft u *</label>
                  <select id="form_need" name="need" class="form-control" required="required">
                    <option value=""></option>
                    <option value="Hulp nodig met activeren">Hulp nodig met activeren</option>
                    <option value="Aanvraag duurt te lang">Aanvraag duurt te lang</option>
                    <option value="Other">Anders</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="form_message">Bericht *</label>
                  <textarea id="form_message" name="message" class="form-control" placeholder="Bericht voor *" rows="4" required="required"></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Send message">
              </div>
            </div>
          </div>

        </form>


      </div>

    </div>

  </div>
  </section>

  <?php include 'components/footer.php'; ?>

</body>

</html>
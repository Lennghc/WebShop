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
    $pageTitle = 'Delete product';
    include 'view/components/header.php';
    ?>
    <link href="view/assets/sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php include 'view/components/sidebar.php'; ?>

        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Delete een product</h1>
        </div>
        <div class="m-3">

            <form action="index.php?con=admin&op=products&page=delete&id=<?=$_GET['id']?>" method="POST">
                
                <input type="submit" name="deletesubmit" value="Verwijder">

            </form>

        </div>

    </div>
    </div>

    </div>

    <script src="view/assets/sidebar.js"></script>

</body>

</html>
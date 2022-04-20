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
    $pageTitle = 'Maak product';
    include 'view/components/header.php';
    ?>
    <link href="view/assets/sidebar.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <?php include 'view/components/sidebar.php'; ?>

        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Voeg een product toe</h1>
        </div>
        <div class="m-3">
<!--        --><?php //var_dump($list) ?>
            <form action="index.php?con=admin&op=products&page=create" method="POST" novalidate>
                <label for="product_categorie">Product Categorie:</label><br>
                <select name="categorie" id="categorie">
                    <?php
                    //var_dump($list);
                    foreach($list as $item) {
                        echo "<option value='$item[categorie_name]'>$item[categorie_name]</option>";
                    }
                    ?>
                </select><br>


            <label for="product_name">Product Naam:</label><br>
            <input type="text" id="product_name" name="product_name" required><br>

            <label for="product_price">Product Prijs:</label><br>
            <input type="number" placeholder="0" required name="product_price" min="0" value="0" step="0.01" title="product_price" pattern="^\d+(?:\.\d{1,2})?$" onblur="
        this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'"><br>

            <label for="product_details">Product Details:</label><br>
            <textarea type="text" id="product_details" name="product_details" rows="4" cols="50" required></textarea><br>

            <label for="product_thumbnail">Product Thumbnail:</label><br>
            <input type="file" id="product_thumbnail" name="file" required><br>

            <label for="product_title">Product Titel:</label><br>
            <input type="text" id="product_title" name="product_title" required><br>

            <label for="product_description">Product Beschrijving:</label><br>
            <textarea type="textarea" id="product_description" name="product_description" rows="4" cols="50" required></textarea><br>

            <input type="submit" name="Productsubmit" value="Voeg Toe">
            <input type="reset" value="Reset">
        </form>

    </div>

</div>
</div>

</div>

<script src="view/assets/sidebar.js"></script>
    </div>
    <script>
        tinymce.init({
        selector: 'textarea#basic-example',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>
    <script src="view/assets/sidebar.js"></script>

</body>

</html>
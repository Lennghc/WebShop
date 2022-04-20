<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/assets/style.css">
    <title>Document</title>
</head>
<body>
    <?php require 'header.php';?>

    <h1>
        Create Form
    </h1>
    <form action="index.php?op=create" method="POST" enctype="multipart/form-data">


    <div>
        <input type="reset">
        <input type="submit" name="submit" value="Submit">
    </div>
  </form>


    </div>
</div>
<?php require 'footer.php';?>
    
</body>
</html>
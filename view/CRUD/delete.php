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


    <form action="index.php?op=delete&id=<?=$html['id']?>" method="POST">
    
    <input type="submit" name="submit" value="JA">
    
    <a href="index.php"> Nee</a>

  </form>


    </div>
</div>
<?php require 'footer.php';?>
    
</body>
</html>
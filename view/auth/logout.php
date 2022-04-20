<?php 

session_start();

if(isset($_SESSION)){

    session_destroy();

}

session_start();
$_SESSION['danger'] = "U bent uitgelogd.";

header("Location: index.php");
?>
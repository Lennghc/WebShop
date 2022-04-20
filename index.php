<?php
if (!isset($_SESSION)) {
    session_start();
  }

require_once 'controller/MainController.php';

$controller = new MainController();
$controller->handleRequest();
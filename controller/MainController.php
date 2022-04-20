<?php
require_once 'controller/AuthController.php';
require_once 'controller/CustomerController.php';
require_once 'controller/ProductController.php';
require_once 'controller/HomeController.php';
require_once 'controller/AdminController.php';
require_once 'controller/ShopController.php';

class MainController {
    public function __construct() {
        $this->AuthController = new AuthController();
        $this->ProductController = new ProductController();
        $this->CustomerController = new CustomerController();
        $this->HomeController = new HomeController();
        $this->AdminController = new AdminController();
        $this->ShopController = new ShopController();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            $controller = isset($_GET['con']) ? $_GET['con'] : '';

            switch ($controller) {
                case 'home':
                    $this->HomeController->handleRequest();
                    break;

                case 'auth':
                    $this->AuthController->handleRequest();
                    break;

                case 'admin';
                    $this->AdminController->handleRequest();
                    break;

                case 'cart':
                    $this->ShopController->handleRequest();
                    break;

                default:
                    $this->HomeController->handleRequest();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }
}
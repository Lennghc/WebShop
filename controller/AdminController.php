<?php
require_once 'model/Display.php';
require_once 'controller/ProductController.php';
require_once 'controller/CustomerController.php';
require_once 'controller/GenreController.php';

class AdminController {
    public function __construct() {
        $this->ProductController = new ProductController();
        $this->CustomerController = new CustomerController();
        $this->GenreController = new GenreController();
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            isset($_GET['con']) === 'admin' ? $_GET['con'] : '';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {     
                case 'products':
                    $this->ProductController->handleRequest();
                    break;

                case 'customers':
                    $this->CustomerController->handleRequest();
                    break;
                
                case 'genre':
                    $this->GenreController->handleRequest();
                    break;
                case 'adminUsers':
                    $this->CustomerController->handleRequest();
                    break;
            
                default:
                    $this->readAllProducts();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }


        public function readAllProducts(){

            $this->ProductController->collectReadallProducts();

        }

        public function readAllCustomers(){

            $this->CustomerController->collectReadallCustomers();

        }

}
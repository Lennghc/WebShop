<?php
require_once 'model/HomeLogic.php';
require_once 'model/GenreLogic.php';
require_once 'model/Display.php';
require_once 'model/ShopLogic.php';
require_once 'controller/AuthController.php';

class HomeController {
    public function __construct() {
        $this->HomeLogic = new HomeLogic();
        $this->Display = new Display();
        $this->AuthController = new AuthController();
        $this->ShopController = new ShopController();
        $this->GenreLogic = new GenreLogic();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

           //isset($_GET['con']) === 'home' ? $_GET['con'] : 'home';
            $op = isset($_GET['op']) ? $_GET['op'] : 'home';

            switch ($op) {  
                case 'home':
                    $this->readHomeFile();
                    break;    

                case 'about':
                    $this->readAboutFile();
                    break;

                case 'contact':
                    $this->readContactFile();
                    break;
                    
                case 'settings':
                    $this->AuthController->collectReadUpdateCustomer();
                    break;

                case 'categories':
                    $this->readCategoriesFile();
                    break;

                case 'cart':
                    $this->ShopController->readShopCart();
                    break;
                
                case 'search':
                    $this->searchoutput();
                    break;

                case 'details':
                    $this->readProductDetails();
                    break;

                default:
                    $this->readHomeFile();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }
        public function searchoutput(){

                $query = $_REQUEST['query'] ?? '';
                $products = [];
                $categories = $this->HomeLogic->getAllCategories(false,true);

                if ($query) {
                    $products = $this->HomeLogic->searchProducts($query);
                }

                include 'view/search.php';
        }

        public function readHomeFile(){

            $categories = $this->HomeLogic->getAllCategories(false,true);
             $bestselling = $this->HomeLogic->getAllBestSelling();
//             $bestselling = $this->Display->createCard();
             $categories_names = $this->HomeLogic->getAllCategories(true);
            $categories_items = $this->HomeLogic->readAllProductsList($categories_names);
            include 'view/home.php';

        }
        public function readCategoriesFile(){
            $categories = $this->HomeLogic->getAllCategories(false,true);
            $list = $this->HomeLogic->getAllCategories();
            $categories_names = $this->HomeLogic->getAllCategories(true);
            $items = $this->HomeLogic->getAllProducts();
            include 'view/categories.php';
        }

        public function readAboutFile(){

            $categories = $this->HomeLogic->getAllCategories(false,true);

            include 'view/about.php';
        }

        public function readContactFile(){

            $categories = $this->HomeLogic->getAllCategories(false,true);

            include 'view/contact.php';
        }

        public function readProductDetails(){
        $id=$_GET['id'];
        $product_information = $this->HomeLogic->readProductsDetails($id);
        $categories = $this->HomeLogic->getAllCategories(false,true);
        include 'view/pdp.php';
        }
}
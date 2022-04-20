<?php

require_once 'model/ProductsLogic.php';
require_once 'model/HomeLogic.php';
require_once 'model/Display.php';


class ProductController {
    public function __construct() {
        $this->ProductsLogic = new ProductsLogic();
        $this->Display = new Display();
        $this->HomeLogic = new HomeLogic();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            isset($_GET['con']) === 'admin' ? $_GET['con'] : 'admin';

            $page = isset($_GET['page']) ? $_GET['page'] : '';

            switch ($page) {  
                case 'create': 
                    $this->collectCreateProduct();
                    break;  

                case 'delete':
                    $this->collectDeleteProduct($_REQUEST['id']);
                    break;

                case 'update':
                    $this->collectUpdateProduct($_REQUEST['id']);
                    break;

                case 'read':
                    $this->collectReadProduct($_REQUEST['id']);
                    break;

                case 'search':
                    $this->collectSearchProduct();
                    break;          
                default:
                    # code...
                    $this->collectReadallProducts();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

        public function collectReadallProducts(){

            $page = isset($_GET['number']) ? (int)$_GET['number'] : 1;      
            $perPage = 5;
            $limit = ($page > 1) ? ($page * $perPage) - $perPage : 0;

            $res = $this->ProductsLogic->readAllProducts($limit,$perPage);

            $pages = $res[0];
            $nav = $this->Display->PageNavigation($pages,$page);
            
            $products = $this->Display->createTable($res[1], true);
            
            include 'view/admin/products/products.php';
        }

        public function collectReadProduct(){

            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

            $res = $this->ProductsLogic->readProducts($id);
            $html = $this->Display->CreateCardProducts($res);

            include 'view/admin/products/read.php';
        }

        public function collectUpdateProduct(){
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] :null;
            $product_categorie = isset($_REQUEST['categorie']) ? $_REQUEST['categorie'] : null;
            $product_name = isset($_REQUEST['product_name']) ? $_REQUEST['product_name'] : null;
            $product_price = isset($_REQUEST['product_price']) ? $_REQUEST['product_price'] : null;
            $product_details = isset($_REQUEST['product_details']) ? $_REQUEST['product_details'] : null;
            $product_title = isset($_REQUEST['product_title']) ? $_REQUEST['product_title'] : null;
            $product_description = isset($_REQUEST['product_description']) ? $_REQUEST['product_description'] : null;
            $product_thumbnail = isset($_REQUEST['file']) ? $_REQUEST['file'] : null;
    
            $list = $this->HomeLogic->getAllCategoriesAdmin();

            if (isset($_POST['updateSubmit'])) {
                
                $res = $this->ProductsLogic->updateProduct($id, $product_categorie, $product_name, $product_price, $product_details, $product_title, $product_description,$product_thumbnail);
                $html = $this->ProductsLogic->readProducts($id);   
                $html = $this->Display->CreateCardProducts($html);
                
                var_dump($_FILES);

                // header("Location: index.php?con=admin&op=products&page=read&id=$id");
            }
    
            $html = $this->ProductsLogic->readProducts($id);
            $html = $html->fetch(PDO::FETCH_ASSOC);
    
            include 'view/admin/products/update.php';
        }

        public function collectCreateProduct(){

            $product_categorie = isset($_REQUEST['categorie']) ? $_REQUEST['categorie'] : null;
            $product_name = isset($_REQUEST['product_name']) ? $_REQUEST['product_name'] : null;
            $product_price = isset($_REQUEST['product_price']) ? $_REQUEST['product_price'] : null;
            $product_details = isset($_REQUEST['product_details']) ? $_REQUEST['product_details'] : null;
            $product_title = isset($_REQUEST['product_title']) ? $_REQUEST['product_title'] : null;
            $product_description = isset($_REQUEST['product_description']) ? $_REQUEST['product_description'] : null;
            $product_thumbnail = isset($_REQUEST['product_thumbnail']) ? $_REQUEST['product_thumbnail'] : null;

            $list = $this->HomeLogic->getAllCategoriesAdmin();
            if(isset($_POST['Productsubmit'])){

               $check = $this->ProductsLogic->createProduct($product_categorie, $product_name, $product_price, $product_details, $product_title, $product_description, $product_thumbnail);


                if(isset($check)){
                    $_SESSION['success'] = "Product is met success toegevoegd";
                    header("Location: index.php?con=admin&op=products");
                }

            }

            include 'view/admin/products/create.php';
        }
        
        public function collectDeleteProduct(){

            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] :null;
    
            if (isset($_POST['deletesubmit'])) {

                echo 'test';

                $html = $this->ProductsLogic->deleteProduct($id);
    
                $msg = $html;
            }
    
            $html = $this->ProductsLogic->readProducts($id);
            $html = $html->fetch(PDO::FETCH_ASSOC);
    
            include 'view/admin/products/delete.php';
        }

        public function collectSearchProduct(){

            $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : null;

            if(isset($_POST['searchSubmit'])){

                $html = $this->ProductsLogic->searchProduct($search);
                $html = $this->Display->createTable($html, false);

            }

            include 'view/products/search.php';
        }
}
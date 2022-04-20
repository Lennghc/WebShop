<?php
require_once 'model/ShopLogic.php';
require_once 'model/Display.php';
require_once 'model/HomeLogic.php';

class ShopController
{
    public function __construct()
    {
        $this->ShopLogic = new ShopLogic();
        $this->Display = new Display();
        $this->HomeLogic = new HomeLogic();
    }
    public function __destruct()
    {
    }
    public function handleRequest()
    {
        try {

            isset($_GET['con']) === 'cart' ? $_GET['con'] : 'cart';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {

                case 'add':
                    $this->addProductToCart();
                    break;

                case 'remove':
                    $this->removeProductFromCart();
                    break;

                case 'cart':
                    $this->readShopCart();
                    break;

                default:
                    $this->addProductToCart();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function readShopCart(){
        $categories = $this->HomeLogic->getAllCategories(false,true);

        if(!empty($_SESSION['mycart'])){
            $output = "";
            
                foreach($_SESSION['mycart'] as $key => $value){

                $id = $value['product_id'];

                $res = $this->ShopLogic->readShopCart($id);

                $output .= $this->Display->ShopCart($res, $value['count']);
                
            }
        
        }else{
            unset($_SESSION['total_price']);
            $_SESSION['danger'] = 'Winkelmand is leeg';
            header("Location: index.php");
        }
        
        include 'view/shopcart.php';
    }


    public function addProductToCart()
    {

        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

        if ($id != NULL) {

            $item_array = array(
                'product_id'  => $id,
                'count' => 1
            );

            if (isset($_SESSION['mycart'])) {
                $cart = $_SESSION['mycart'];

                $found = false;
                for ($i = 0; $i <= count($cart); $i++) {
                    if ($cart[$i]['product_id'] == $id) {
                        $cart[$i]['count'] = $cart[$i]['count'] + 1;
                        $found = true;
                        break;
                    }
                }

                if ($found === false) {

                    $_SESSION['mycart'][] = $item_array;
                } else {
                    $_SESSION['mycart'] = $cart;
                }
            } else {
                $_SESSION['mycart'][] = $item_array;
            }
        }

        $to = 0;

        if (!empty($_SESSION['mycart'])) {

            foreach ($_SESSION['mycart'] as $key => $value) {

                $to = $to + $value['count'];
            }
        }

        $data['da'] = $to;

        if (isset($_SESSION['mycart'])) {
            $data['out'] = $_SESSION['mycart'];
        }

        echo json_encode($data);
    }

    public function removeProductFromCart(){

        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

        if ($id != NULL) {

            if(isset($_SESSION['mycart'])){                

                $new_array = $_SESSION['mycart'];


                foreach($new_array  as $key=>$val) {
                    if($new_array[$key]['product_id'] === $id){
                        if($new_array[$key]['count'] <= 1){
                            unset($new_array[$key]);
                            $_SESSION['mycart'] = $new_array;
                        } else {
                            $new_array[$key]['count'] = $new_array[$key]['count'] - 1;
                            $_SESSION['mycart'] = $new_array;
                        }
                   
                    }
                }


                $_SESSION['mycart'] = $new_array;


                $to = 0;

                if (!empty($_SESSION['mycart'])) {
        
                    foreach ($_SESSION['mycart'] as $key => $value) {
        
                        $to = $to + $value['count'];
                    }
                }
        
                $data['da'] = $to;
        
                if (isset($_SESSION['mycart'])) {
                    $data['out'] = $_SESSION['mycart'];
                }
        
                echo json_encode($data);
                

            }
        }
    }
}

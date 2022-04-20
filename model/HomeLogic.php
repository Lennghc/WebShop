<?php

require_once "model/DataHandler.php";
require_once "model/Display.php";


class HomeLogic
{

    public function __construct()
    {
        $this->Display = new Display();
        $this->DataHandler = new Datahandler("HOST", "mysql", "DATABASE_NAME", "USERNAME", "PASSWORD");
    }

    public function __destruct()
    {
    }


    public function searchProducts($queryString)
    {
        try {
            $sql = "SELECT product_id as id, product_name, Replace(Replace(Concat('€ ', Format(`product_price`, 2)), ',', ''), '.', ',') AS `product_price`, product_categorie, product_title, product_name, product_thumbnail FROM products WHERE product_name LIKE ?";
            $results = $this->DataHandler->preparedQuery($sql, [
                "%" . $queryString . "%",
            ]);

            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAllBestselling()
    {
        $sql = "SELECT product_id as id, product_name, Replace(Replace(Concat('€ ', Format(`product_price`, 2)), ',', ''), '.', ',') AS `product_price`, product_categorie, product_title, product_name, product_thumbnail FROM products WHERE product_best_seller = 1";
        $results = $this->DataHandler->readsData($sql);
        $results = $results->fetchall(PDO::FETCH_ASSOC);

        return $results;
    }

    public function getAllCategories($array = false, $dropdown = false)
    {
        try {
            if ($array) {
                $sql = "SELECT * FROM  product_categories LIMIT 4";
            } else {
                $sql = "SELECT * FROM  product_categories";
            }
            $results = $this->DataHandler->readsData($sql);
            $categories = "";
            if ($array) {
                $row = $results->fetchall(PDO::FETCH_ASSOC);

                //          echo "<pre>";
                return $row;
            }
            while ($row = $results->fetchall(PDO::FETCH_ASSOC)) {
                foreach ($row as $item) {
                    if ($dropdown) {
                        $categories .= "<a class='dropdown-item' href='index.php?op=categories&select={$item['categorie_name']}'>{$item['categorie_name']}</a>";
                    } else {
                        if($_GET['select'] == $item['categorie_name']){$active = 'active';}else{ $active ='';}
                        $categories .= "<ul class='list-group'>";
                        $categories .= "<a class='list-group-item list-group-item-action $active'' href='index.php?op=categories&select={$item['categorie_name']}'>{$item['categorie_name']}</a>";
                        $categories .= "</ul>";
                        
                    }
                }
            }

            return $categories;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAllCategoriesAdmin() {
        try {
            $sql = "SELECT * FROM  product_categories";
            $result = $this->DataHandler->readsData($sql);

            return $result;
        } catch (Exception $e) {
        throw $e;
    }
    }

    public function getProductsByGenre($categorie)
    {
        try {
            $sql = "SELECT * FROM `products` WHERE `product_categorie`='{$categorie}'";
            $result = $this->DataHandler->readsData($sql);

            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function readAllProductsList($items)
    {
        $html = "<div class='bestselling'><div class='container'>";
        foreach ($items as $key => $item) {
            $header = $item['categorie_name'];
            $html .= "<div class='cat_header'><h2>$header</h2></div>";
            $html .= "<div class='row'>";

//            die($header);
            //get sql statement and put in foreach
            $sql = "SELECT product_id as id, product_name, Replace(Replace(Concat('€ ', Format(`product_price`, 2)), ',', ''), '.', ',') AS `product_price`, product_categorie, product_title, product_name, product_thumbnail FROM products WHERE product_categorie = '$header' limit 4";
            $items = $this->DataHandler->readsData($sql);
            $items = $items->fetchall(PDO::FETCH_ASSOC);

            foreach ($items as $key => $item) {
                $html .= $this->Display->createCard($item);
            }
            $html .="</div>";
        }
        $html .= "</div></div>";

        return $html;
    }

    public function getAllProducts()
    {
        $sql = "SELECT product_id as id, product_name, Replace(Replace(Concat('€ ', Format(`product_price`, 2)), ',', ''), '.', ',') AS `product_price`, product_categorie, product_title, product_name, product_thumbnail FROM products WHERE product_categorie = '{$_GET['select']}'";

        if (isset($_GET['order']) && ($_GET['order'] == 'ASC' || $_GET['order'] == 'DESC'  )) {
            $sql .= " ORDER BY product_price {$_GET['order']}";
        }
    
        //        die($sql);
        $items = $this->DataHandler->readsData($sql);
        $items = $items->fetchall(PDO::FETCH_ASSOC);

        return $items;
    }

    public function readProductsDetails($id){
        $sql = "SELECT product_id as id, product_name, Replace(Replace(Concat('€ ', Format(`product_price`, 2)), ',', ''), '.', ',') AS `product_price`, product_categorie, product_title, product_name, product_thumbnail,product_description FROM products WHERE product_id = {$id}";
        $product_information = $this->DataHandler->readsData($sql);
        $product_information = $product_information->fetchAll(PDO::FETCH_ASSOC);
        return $product_information;
    }
}

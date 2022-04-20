<?php

require_once "model/DataHandler.php";
require_once 'model/FileUpload.php';


class ProductsLogic
{
  public function __construct()
  {
    $this->DataHandler = new Datahandler("HOST", "mysql", "DATABASE_NAME", "USERNAME", "PASSWORD");  
    $this->FileUpload = new FileUpload();
  }

  public function __destruct(){}
  
  public function searchProduct($search){

    try{
      $sql = "SELECT * FROM `products` WHERE `product_name` LIKE '%{$search}%', OR LIKE '%{$search}%', OR `product_price` LIKE '%{$search}%'";
      $results = $this->DataHandler->readsData($sql);
      return $results;
      $sql = null;
      $this->DataHandler = null;

    } catch (Exception $e){
      throw $e;
    }

  }

  public function createProduct($product_categorie, $product_name, $product_price, $product_details, $product_title, $product_description, $product_thumbnail){

    try{

      $image = $this->FileUpload->ImageUpload($_FILES['file']['name']);

      $sql = "INSERT INTO `products` (`product_id`, `product_categorie`, `product_name`, `product_price`, `product_details`, `product_title`, `product_description`, `product_thumbnail`) VALUES (NULL, '{$product_categorie}', '{$product_name}', '{$product_price}', '{$product_details}', '{$product_title}', '{$product_description}', '{$image}')";
      $result = $this->DataHandler->createData($sql);
      return $result;
      $sql = null;
      $this->DataHandler = null;

    }catch (Exception $e){
      throw $e;
    }

  }

  public function updateProduct($id, $product_categorie, $product_name, $product_price, $product_details, $product_title, $product_description,$product_thumbnail) {

    try{

      if($product_thumbnail != ""){
        $image = $this->FileUpload->ImageUpload($_FILES['file']['name']);
      }else{
        $sql = "SELECT product_thumbnail FROM `products` WHERE `product_id`='{$id}'";
        $result = $this->DataHandler->readData($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $image = $row['product_thumbnail'];
      }

      $sql = "UPDATE `products` SET `product_categorie`='{$product_categorie}', `product_name`='{$product_name}', `product_price`='{$product_price}', `product_details`='{$product_details}', `product_title`='{$product_title}', `product_description`='{$product_description}', `product_thumbnail`='{$image}' WHERE `product_id`='{$id}'";
      $results = $this->DataHandler->updateData($sql);
      return $results;

    } catch (Exception $e){
      throw $e;
    }
  }

  public function readAllProducts($limit, $perPage){

    try{

      $sql = "SELECT FOUND_ROWS() as total FROM products";
      $result1 = $this->DataHandler->countPages($sql, $perPage);

      $sql = "SELECT product_id as id, product_name, Replace(Replace(Concat('€ ', Format(`product_price`, 2)), ',', ''), '.', ',') AS `product_price`, product_categorie as Genre, product_title as Titel,product_name as naam FROM products LIMIT $limit, $perPage";
      $results = $this->DataHandler->readsData($sql);

      $arry = [$result1, $results];
      return $arry;

  }catch (Exception $e){
      throw $e;
  }

  }

  public function readProducts($id){

    try{

      $sql = "SELECT * FROM `products` WHERE `product_id`='{$id}'";
      $results = $this->DataHandler->readData($sql);
      return $results;

    } catch (Exception $e){
      throw $e;
    }

  }



  public function deleteProduct($id){

    try{

      $sql = "DELETE FROM `products` WHERE `product_id`='{$id}'";
      $result = $this->DataHandler->deleteData($sql);
      return $result;

    }catch(Exception $e){
      throw $e;
    }

  }
}
<?php

require_once "model/DataHandler.php";


class ShopLogic
{
  public function __construct()
  {
    $this->DataHandler = new Datahandler("HOST", "mysql", "DATABASE_NAME", "USERNAME", "PASSWORD");  
  }

  public function __destruct(){}
  
  
  public function readShopCart($id){
    
    try {

      $sql = "SELECT * FROM products WHERE `product_id`='{$id}'";
      $result = $this->DataHandler->readsData($sql);
      return $result;
      
      
    } catch (Exception $e){
      throw $e;
    }
  }
}
<?php

require_once "model/DataHandler.php";


class GenreLogic
{
  public function __construct()
  {
    $this->DataHandler = new Datahandler("HOST", "mysql", "DATABASE_NAME", "USERNAME", "PASSWORD");  
  }

  public function __destruct(){}
  
  public function searchgenre($search){

    try{
      $sql = "SELECT * FROM `product_categories` WHERE `categorie_name` LIKE '%{$search}%'";
      $results = $this->DataHandler->readsData($sql);
      return $results;

    } catch (Exception $e){
      throw $e;
    }

  }

  public function creategenre($genre_categorie){

    try{

      $sql = "INSERT INTO `product_categories` (`categorie_id`, `categorie_name`) VALUES (NULL, '{$genre_categorie}')";
      $result = $this->DataHandler->createData($sql);
      
      return $result;

    }catch (Exception $e){
      throw $e;
    }

  }

  public function updategenre($id, $genre_categorie) {

    try{

      $sql = "UPDATE `product_categories` SET `categorie_name`='{$genre_categorie}' WHERE `categorie_id`='{$id}'";
      $results = $this->DataHandler->updateData($sql);
      return $results;

    } catch (Exception $e){
      throw $e;
    }
  }

  public function readAllGenres($limit, $perPage){

    try{

      $sql = "SELECT FOUND_ROWS() as total FROM product_categories";
      $result1 = $this->DataHandler->countPages($sql, $perPage);

      $sql = "SELECT categorie_id as id, categorie_name as Genre FROM product_categories";
      $results = $this->DataHandler->readsData($sql);

      $arry = [$result1, $results];
      return $arry;

  }catch (Exception $e){
      throw $e;
  }

  }

  public function readgenres($id){

    try{

      $sql = "SELECT * FROM `product_categories` WHERE `categorie_id`='{$id}'";
      $results = $this->DataHandler->readData($sql);
      return $results;

    } catch (Exception $e){
      throw $e;
    }

  }



  public function deletegenre($id){

    try{

      $sql = "DELETE FROM `product_categories` WHERE `categorie_id`='{$id}'";
      $result = $this->DataHandler->deleteData($sql);
      return $result;

    }catch(Exception $e){
      throw $e;
    }

  }
}
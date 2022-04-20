<?php

require_once "model/DataHandler.php";


class CustomersLogic
{
  public function __construct()
  {
    $this->DataHandler = new Datahandler("HOST", "mysql", "DATABASE_NAME", "USERNAME", "PASSWORD");
  }

  public function __destruct(){}
  

  public function readAllCustomers($admin = false){

    try{
      if ($admin) {
        $sql = "SELECT customer_id as id, customer_firstname as Naam, customer_email as Email, customer_admin as Admin FROM customer WHERE customer_admin = 1";
        $result = $this->DataHandler->readsData($sql);
      } else {
        $sql = "SELECT customer_id as id, customer_firstname as Naam, customer_email as Email, customer_admin as Admin FROM customer WHERE customer_admin = 0";
        $result = $this->DataHandler->readsData($sql);
      }

      return $result;

  }catch (Exception $e){
      throw $e;
  }

  }


  public function readCustomer($id){

    try{

      $sql = "SELECT * FROM `customer` WHERE customer_id='{$id}'";
      $result = $this->DataHandler->readData($sql);
      $result = $result->fetch(PDO::FETCH_ASSOC);

      return $result;
      
    }catch (Exception $e){
      throw $e;
    }

  }

  public function deleteCustomer($id){

    try{

      $sql = "DELETE FROM `customer` WHERE customer_id='{$id}'";
      $result = $this->DataHandler->deleteData($sql);
      $_SESSION['success'] = "Gebruiker met ID:'{$id}' is verwijderd";

      return $result;

    }catch (Exception $e){
      throw $e;
    }

  }

  public function updateCustomer($id, $firstname, $lastname, $email, $street, $housenumber, $location, $zipcode){

    try{

      $sql = "UPDATE `customer` SET `customer_firstname`='{$firstname}', `customer_lastname`='{$lastname}', `customer_email`='{$email}', `customer_street`='{$street}', `customer_housenumber`='{$housenumber}', `customer_location`='{$location}', `customer_zipcode`='{$zipcode}' WHERE `customer_id`='{$id}'";
      $results = $this->DataHandler->updateData($sql);
      $_SESSION['success'] = "Informatie is opgeslagen.";
      return $results;

    } catch (Exception $e){
      throw $e;
    }

  }



}

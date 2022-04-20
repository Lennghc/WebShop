<?php
require_once "model/DataHandler.php";
require_once 'model/Display.php';


class AuthsLogic
{
  public function __construct(){
    $this->DataHandler = new Datahandler("HOST", "mysql", "DATABASE_NAME", "USERNAME", "PASSWORD");
    $this->Display = new Display();
  }

  public function __destruct(){}

  public function readCustomer($id){

    try{

      $sql = "SELECT * FROM `customer` WHERE `customer_id`='{$id}'";
      $results = $this->DataHandler->readData($sql);
      $results= $results->fetch(PDO::FETCH_ASSOC);
      return $results;

    } catch (Exception $e){
      throw $e;
    }

  }

  public function loginCheck($email, $password)  {

    try {

      $sql = "SELECT customer_id, customer_email, customer_password, customer_admin FROM `customer` WHERE `customer_email`='{$email}'";
      $results = $this->DataHandler->existEmail($sql);

      if ($results === true && $results == true) {

        $results = $this->DataHandler->readData($sql);

        while ($row = $results->fetch(PDO::FETCH_ASSOC)){

          if (password_verify($password, $row['customer_password'])){

            $_SESSION['customer_id'] = $row['customer_id'];
            $_SESSION['customer_email'] = $row['customer_email'];
            $_SESSION['customer_admin'] = $row['customer_admin'];
            $_SESSION['success'] = "Welkom terug";

            header("Location: index.php");
          } else {
            return $this->Display->flash("msg", "Uw wachtwoord is onjuist. Probeer nogmaals");
          }
        }
      }
    } catch (Exception $e) {
      throw $e;
    }
  }



  public function createCustomer($email, $password){

    try {
      $password = password_hash($password, PASSWORD_DEFAULT);

      $sql = "INSERT INTO `customer`(`customer_id`, `customer_email`, `customer_password`, `customer_admin`) VALUES (null,'{$email}','{$password}',0)";
      $results = $this->DataHandler->createData($sql);

      return $results;

    } catch (Exception $e) {
      throw $e;
    }
  }



public function checkEmail($email){

  try{

    $sql = "SELECT customer_email FROM `customer` WHERE `customer_email`='{$email}'";
    $results = $this->DataHandler->checkEmail($sql);

    return $results;

  } catch (Exception $e){
    throw $e;
  }

}


}

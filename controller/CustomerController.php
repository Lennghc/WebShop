<?php

require_once 'model/CustomersLogic.php';
require_once 'model/Display.php';

class CustomerController {
    public function __construct() {
        $this->CustomersLogic = new CustomersLogic();
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            $op = isset($_GET['op']) ? $_GET['op'] : 'customers';
            $page = isset($_GET['page']) ? $_GET['page'] : '';

            switch ($page) {  
                case 'delete':
                    $this->collectDeleteCustomer();
                    break;

                case 'update':
                    $this->collectUpdateCustomer();
                    break;

                case 'read':
                    $this->collectreadCustomer();
                    break;

                case 'adminUsers':
                    $this->collectReadallAdminUsers();
                    break;
                
                default:
                    $this->collectReadallCustomers();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }


        public function collectReadallCustomers(){

            $customers = $this->CustomersLogic->readAllCustomers(false);  
            $customers = $this->Display->createTable($customers, true);
            
            include 'view/admin/customers/customers.php';           
            
        }

        public function collectreadCustomer() {
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

            $res = $this->CustomersLogic->readCustomer($id);
            $html = $this->Display->CreateCardCustomer($res);

            include 'view/admin/customers/read.php';
        }

        public function collectReadallAdminUsers(){

            $adminUsers = $this->CustomersLogic->readAllCustomers(true);  
            $adminUsers = $this->Display->createTable($adminUsers, true);
            
            include 'view/admin/adminUsers/adminUsers.php';           
            
        }

        public function collectDeleteCustomer(){
            
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

            if(isset($_POST['deleteSubmit'])){

               $res = $this->CustomersLogic->deleteCustomer($id);

                if($res === 1){
                    header("Location: index.php?con=admin&op=customers");
                }

            }

            include 'view/admin/customers/delete.php';

        }

        public function collectUpdateCustomer(){

            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            $firstname = isset($_REQUEST['firstname']) ? $_REQUEST['firstname'] : null;
            $lastname = isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : null;
            $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
            $street = isset($_REQUEST['street']) ? $_REQUEST['street'] : null;
            $housenumber = isset($_REQUEST['housenumber']) ? $_REQUEST['housenumber'] : null;
            $location = isset($_REQUEST['location']) ? $_REQUEST['location'] : null;
            $zipcode = isset($_REQUEST['zipcode']) ? $_REQUEST['zipcode'] : null;

            if(isset($_POST['updateSubmit'])){

                $res = $this->CustomersLogic->updateCustomer($id, $firstname, $lastname, $email, $street, $housenumber, $location, $zipcode);
                
                if($res === 1){
                    header("Location: index.php?con=admin&op=customers");
                }

            }
            
            $update = $this->CustomersLogic->readCustomer($id);
            include 'view/admin/customers/update.php';

        }

}
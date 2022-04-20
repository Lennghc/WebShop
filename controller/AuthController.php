<?php

require_once 'model/AuthsLogic.php';
require_once 'model/Display.php';
require_once 'model/HomeLogic.php';
require_once 'model/CustomersLogic.php';

class AuthController
{
    public function __construct()
    {
        $this->AuthsLogic = new AuthsLogic();
        $this->Display = new Display();
        $this->CustomersLogic = new CustomersLogic();
        $this->HomeLogic = new HomeLogic();
    }
    public function __destruct()
    {
    }
    public function handleRequest()
    {
        try {

            isset($_GET['con']) === 'auth' ? $_GET['con'] : '';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'login':
                    $this->collectLogin();
                    break;

                case 'registreer':
                    $this->collectRegister();
                    break;

                case 'settings':
                    $this->collectReadUpdateCustomer();
                    break;

                case 'logout':
                    $this->destroyLogin();
                    break;

                default:
                    $this->collectLogin();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function collectReadUpdateCustomer()
    {

        $id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : null;
        $firstname = isset($_REQUEST['firstname']) ? $_REQUEST['firstname'] : null;
        $lastname = isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : null;
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
        $street = isset($_REQUEST['street']) ? $_REQUEST['street'] : null;
        $housenumber = isset($_REQUEST['housenumber']) ? $_REQUEST['housenumber'] : null;
        $location = isset($_REQUEST['location']) ? $_REQUEST['location'] : null;
        $zipcode = isset($_REQUEST['zipcode']) ? $_REQUEST['zipcode'] : null;


        if (isset($_POST['accountSubmit'])) {

            $check = $this->CustomersLogic->updateCustomer($id, $firstname, $lastname, $email, $street, $housenumber, $location, $zipcode);
        }

        $categories = $this->HomeLogic->getAllCategories(false, true);

        $data = $this->AuthsLogic->readCustomer($id);

        include 'view/accountSettings.php';
    }


    public function collectLogin()
    {


        if (isset($_POST['loginUser'])) {

            $email = isset($_POST['email']) ? $_POST['email'] : null;
            $password = isset($_POST['password']) ? $_POST['password'] : null;

            $check = $this->AuthsLogic->checkEmail($email);
            if ($check === 1) {

                $login = $this->AuthsLogic->loginCheck($email, $password);
            } else {
                $login = $this->Display->flash("msg", "Uw heeft nog geen account");
            }
        }

        include 'view/auth/login.php';
    }

    public function collectRegister()
    {

        if (isset($_POST['createUser'])) {

            $email = isset($_POST['createEmail']) ? $_POST['createEmail'] : null;
            $password = isset($_POST['createPassword']) ? $_POST['createPassword'] : null;

            $check = $this->AuthsLogic->checkEmail($email);


            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                if ($check === 0) {
                    $register = $this->AuthsLogic->createCustomer($email, $password);
                    $_SESSION['success'] = "Uw kunt nu inloggen";
                } else {
                    $register = $this->Display->flash("msg", "Deze mail bestaat al");
                }
            } else {

                $register = $this->Display->flash("msg", "Deze mail is ongeldig");
            }
        }

        include 'view/auth/register.php';
    }

    public function destroyLogin()
    {
        include 'view/auth/logout.php';
    }
}

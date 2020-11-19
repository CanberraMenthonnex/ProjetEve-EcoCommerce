<?php
namespace Controller;

use Core\Http;
use Core\Session;

class UserController extends Controller {

    const SESSION_NAME = "user";

    protected function protectForUser() {
        if(!Session::get(self::SESSION_NAME)) {
            Http::redirect(HOME_ROUTE);
            die();
        }
    }

    public function displayCustomerProfil(){
        $this->protectForUser();
        $this->render('customer_profil.php');
    }
    
}
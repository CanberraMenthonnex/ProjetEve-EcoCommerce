<?php
namespace Controller;

use Core\Controller\Controller;
use Core\Session;

class UserController extends Controller {

    const SESSION_NAME = "user";

    public function displayCustomerProfil(){
        $this->protectFor("user", HOME_ROUTE);
        $userSession = Session::get('user');
        $this->render('customer_profil', compact("userSession"));
    }
    
}
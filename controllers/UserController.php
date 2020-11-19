<?php
namespace Controller;

use Tools\Http;
use Tools\Session;

abstract class UserController extends Controller {

    const SESSION_NAME = "user";

    protected static function protectForUser() {
        if(!Session::get(self::SESSION_NAME)) {
            Http::redirect(HOME_ROUTE);
            die();
        }
    }

    Public static function displayCustomerProfil(){
        self::protectForUser();
        self::render('customer_profil.php');
    }
    
}
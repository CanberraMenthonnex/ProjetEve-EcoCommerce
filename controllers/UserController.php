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
    
}
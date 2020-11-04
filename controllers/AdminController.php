<?php
namespace Controller;

use Tools\Http;
use Tools\Session;

abstract class AdminController extends Controller {

    const SESSION_NAME = "admin";

    protected static function protectForAdmin() {
        if(!Session::get(self::SESSION_NAME)) {
            Http::redirect(HOME_ROUTE);
            die();
        }
    }

}
<?php
namespace Controller;

use Core\Http;
use Core\Session;

abstract class AdminController extends Controller {

    const SESSION_NAME = "admin";

    protected  function protectForAdmin() {
        if(!Session::get(self::SESSION_NAME)) {
            Http::redirect(HOME_ROUTE);
            die();
        }
    }

}
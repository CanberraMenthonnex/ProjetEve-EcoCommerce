<?php
namespace Controller;

use Tools\Http;
use Tools\Session;

abstract class AdminController extends Controller {

    const SESSION_NAME = "admin";

<<<<<<< HEAD
    public static function logAdminPage() {
        self::render("log-page.php");
    }

    public static function loadPage(string $pathPage){
        if(checkSession()){
            self::render($pathPage);
        }else{
            throw new \Exception(NO_PERMISSION);
        }       
    }

    public static function login() {

        if(self::checkPostKeys($_POST, [ "pwd", "email"])) {
        
            $email = htmlspecialchars($_POST['email']);
            $pwd = htmlspecialchars($_POST['pwd']);
            $admin = AdminModel::find($email);

            if($admin) {

                if(password_verify($pwd, $admin[0]->mdp)) {
                    Session::set(self::SESSION_NAME, $_POST);
                    Http::redirect("/admin/login");
                }
                else
                {
                    throw new \Exception(BAD_PASSWORD);
                }
            }
            else
            {
                throw new \Exception(BAD_EMAIL);
            }
        }
        else
        {
            throw new \Exception(BAD_KEYS);
=======
    protected static function protectForAdmin() {
        if(!Session::get(self::SESSION_NAME)) {
            Http::redirect(HOME_ROUTE);
            die();
>>>>>>> main
        }
    }

}
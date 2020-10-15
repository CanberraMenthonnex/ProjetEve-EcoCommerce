<?php
 
namespace Controller;

use Model\AdminModel;
use Tools\Http;
use Tools\Session;

class AdminController extends Controller {

    const SESSION_NAME = "admin";

    public static function logAdminPage() {
        self::render("log-page.php");
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
        }
    
    }


}
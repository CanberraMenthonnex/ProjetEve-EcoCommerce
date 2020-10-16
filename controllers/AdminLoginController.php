<?php
 
namespace Controller;

use Model\AdminRepository;
use Tools\Http;
use Tools\Session;

class AdminLoginController extends AdminController {

    public static function logAdminPage() {
        self::render("log-page.php");
    }

    public static function login() {

        if(self::checkPostKeys($_POST, [ "pwd", "email"])) {
        
            $email = htmlspecialchars($_POST['email']);
            $pwd = htmlspecialchars($_POST['pwd']);
            $admin = AdminRepository::find($email);

            if($admin) {

                if(password_verify($pwd, $admin[0]->getPassword())) {
                    Session::set(self::SESSION_NAME, $admin[0]);
                    Http::redirect(ADMIN_GET_PRODUCT_ROUTE);
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

    public static function logout() {
        Session::clean(self::SESSION_NAME);
        Http::redirect(HOME_ROUTE);
    }


}
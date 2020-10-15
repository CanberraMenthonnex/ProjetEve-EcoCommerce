<?php
 
namespace Controller;

use Model\AdminRepository;
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
            $admin = AdminRepository::find($email);

            if($admin) {

                if(password_verify($pwd, $admin[0]->getPassword())) {
                    Session::set(self::SESSION_NAME, $_POST);
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


}
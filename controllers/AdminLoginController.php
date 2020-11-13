<?php
 
namespace Controller;

use Model\AdminRepository;
use Core\Http;
use Core\Model\EntityManager;
use Core\Session;

class AdminLoginController extends AdminController {

    public  function logAdminPage() {
        $this->render("log-page.php");
    }

    public  function login() {

        if($this->checkPostKeys($_POST, [ "pwd", "email"])) {

            $em = new EntityManager("Admin");
        
            $email = htmlspecialchars($_POST['email']);
            $pwd = htmlspecialchars($_POST['pwd']);
            $admin = $em->find(["mail"=>$email]);

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

    public  function logout() {
        Session::clean(self::SESSION_NAME);
        Http::redirect(HOME_ROUTE);
    }


}
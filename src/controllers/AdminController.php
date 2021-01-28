<?php
 
namespace Controller;

use Core\Controller\Controller;
use Core\Http;
use Core\Model\EntityManager;
use Core\Session;

class AdminController extends Controller {

    const SESSION_NAME = "admin";

    public  function logAdminPage() {
        $this->render("admin-login");
    }

    public  function login() {

        if($this->checkPostKeys($_POST, [ "pwd", "email"])) {

            $em = new EntityManager("Admin");
        
            $email = htmlspecialchars($_POST['email']);
            $pwd = htmlspecialchars($_POST['pwd']);
            $admin = $em->findOne(["mail"=>$email]);
            
            if($admin) {

                if(password_verify($pwd, $admin->getPassword())) {
                    Session::set(self::SESSION_NAME, $admin);
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
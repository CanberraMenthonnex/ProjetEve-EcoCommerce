<?php
 
namespace Controller;

use Core\Http;
use Core\Model\EntityManager;
use Core\Session;

class AdminLoginController extends AdminController {

    public  function logAdminPage() {
        $this->render("log-page.php");
    }

    public  function login() {

<<<<<<< HEAD:controllers/AdminLoginController.php
        if(self::checkPostKeys($_POST, ["pwd", "email"])) {
=======
        if($this->checkPostKeys($_POST, [ "pwd", "email"])) {

            $em = new EntityManager("Admin");
>>>>>>> b1d55888d9ac98e7a0e89e70ce94a327f85f785f:src/controllers/AdminLoginController.php
        
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
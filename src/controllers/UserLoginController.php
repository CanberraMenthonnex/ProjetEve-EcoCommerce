<?php

namespace Controller;

use Core\Http;
use Core\Model\EntityManager;
use Core\Session;

class UserLoginController extends UserController {

    private array $log_error = [];

    public function getError()
    {
        return $this->error;
    }

    public function logAdminPage() {
        $this->render("log-page");
    }

    public function login() {

        if($this->checkPostKeys($_POST, ["username", "pwd"])) {
        
            $email = htmlspecialchars($_POST['username']);
            $pwd = htmlspecialchars($_POST['pwd']);

            $em = new EntityManager("User");
            $user = $em->findOne(["email"=>$email]);
            if($user){

                if(password_verify($pwd, $user->getPassword())) {
                    Session::set("user", $user);

                    Http::redirect(CUSTOMER_PROFIL_ROUTE);
                }
                else
                {
                    //throw new \Exception(BAD_PASSWORD);
                    $log_error = "L'identifiant et/ou le mot de passe de connexion ne sont pas reconnus.";
                    $this->render("sign-customer-page", compact("log_error"));
                }
            }
            else
            {
                //throw new \Exception(BAD_EMAIL);
                $log_error = "L'identifiant et/ou le mot de passe de connexion ne sont pas reconnus.";
                $this->render("sign-customer-page", compact("log_error"));
            }
        }
        else
        {   
            throw new \Exception(BAD_KEYS);
        }
    
    }

    public function logout() {
        Session::clean("user");
        Http::redirect(HOME_ROUTE);
    }
}
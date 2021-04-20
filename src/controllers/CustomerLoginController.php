<?php

namespace Controller;

use Core\Http;
use Core\Model\EntityManager;
use Core\Session;
use Core\Controller\Controller;

class CustomerLoginController extends Controller {

    public function loginPage(){
        $this->render("client-login");
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
                    $this->redirectWithError(CUSTOMER_POST_LOGIN_ROUTE, $log_error);
                }
            }
            else
            {

                $em_pending = new EntityManager("User_pending");
                $user_pending = $em_pending->findOne(["email"=>$email]);

                if($user_pending) {
                    Http::redirect(CUSTOMER_VERIFY_ROUTE);
                }
                else {
                    //throw new \Exception(BAD_EMAIL);
                    $log_error = "L'identifiant et/ou le mot de passe de connexion ne sont pas reconnus.";
                    $this->render("sign-customer-page", compact("log_error"));
                }
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
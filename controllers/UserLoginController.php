<?php

namespace Controller;

use Model\UserRepository;
use Tools\Http;
use Tools\Session;

class UserLoginController extends UserController {

    private array $log_error = [];

    public function getError()
    {
        return $this->error;
    }

    public static function logAdminPage() {
        self::render("log-page.php");
    }

    public static function login() {

        if(self::checkPostKeys($_POST, ["username", "pwd"])) {
        
            $email = htmlspecialchars($_POST['username']);
            $pwd = htmlspecialchars($_POST['pwd']);
            $user = UserRepository::find($email);

            if($user) {

                if(password_verify($pwd, $user[0]->getPassword())) {
                    Session::set(self::SESSION_NAME, $user[0]);
                    Http::redirect(HOME_ROUTE);
                }
                else
                {
                    //throw new \Exception(BAD_PASSWORD);
                    $log_error = "L'identifiant et/ou le mot de passe de connexion ne sont pas reconnus.";
                    require_once "../views/sign-customer-page.php";
                }
            }
            else
            {
                //throw new \Exception(BAD_EMAIL);
                $log_error = "L'identifiant et/ou le mot de passe de connexion ne sont pas reconnus.";
                require_once "../views/sign-customer-page.php";
            }
        }
        else
        {   
            echo "hello";
            //throw new \Exception(BAD_KEYS);
        }
    
    }

    public static function logout() {
        Session::clean(self::SESSION_NAME);
        Http::redirect(HOME_ROUTE);
    }
}
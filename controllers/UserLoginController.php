<?php

namespace Controller;

use Model\UserRepository;
use Tools\Http;
use Tools\Session;

class UserLoginController extends UserController {

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
                    
                    $userSession = Session::get(self::SESSION_NAME);
                    echo($userSession->getFirstname());
                    //Http::redirect(HOME_ROUTE);
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
            echo "hello";
            //throw new \Exception(BAD_KEYS);
        }
    
    }

    public static function logout() {
        Session::clean(self::SESSION_NAME);
        Http::redirect(HOME_ROUTE);
    }
}
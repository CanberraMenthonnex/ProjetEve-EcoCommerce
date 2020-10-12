<?php
 
namespace Controller;

class AdminController extends Controller {


    public static function logAdminPage() {
        self::render("log-page.php");
    }

    static public function login() {

        if(isset($_POST["send"]) && isset($_POST["pwd"]) && isset($_POST["email"])) {
        
            $email = htmlspecialchars($_POST['email']);
            $pwd = htmlspecialchars($_POST['pwd']);
    
            $id = getID($email);
            
            
            if($email) {
    
                if(password_verify($_POST["pwd"], $id['mdp'])) {
                    echo "Vous êtes co";
                }
                else
                {
                    echo BAD_PASSWORD;
                }
            }
            else
            {
                echo BAD_EMAIL;
            }
        }
        else
        {
            throw new Exception("404");
        }
    
    }


}
<?php

use Tools\ValidatorString;
use Tools\ValidatorInt;

class UsersSignController extends UserController{

    private $sign_error = [];


    public static function signUserPage() {
        self::render("sign-page.php");
    }

    public static function sign(){
        $infos = ["lastname", "firstname", "email", "pwd","pwd_check", "month", "day", "year", "adress", "phone"];
        if(self::checkPostKeys($_POST, $infos)) {

            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $pwd = $_POST["pwd"];
            $pwd_check = $_POST["pwd_check"];
            $adress = $_POST["adress"];
            $phone = $_POST["phone"];
            
            $month = $POST["month"];
            $day = $POST["day"];
            $year = $POST["year"];
           

            //------------------------ Validate Input-----------------------------------------

            $validator = new ValidatorString($lastname);
            $validator
            ->validateString()
            ->validateLength(2, 20)
            ->validateNoSpecialChar();
            $sign_error[] = $validator->getError();

            $validator = new ValidatorString($firstname);
            $validator
            ->validateString()
            ->validateLength(2, 20)
            ->validateNoSpecialChar();
            $sign_error[] = $validator->getError();

            $validator = new ValidatorString($email);
            $validator
            ->validateEmail();
            $sign_error[] = $validator->getError();

            $validator = new ValidatorString($pwd);
            $validator
            ->validatePwd();
            $sign_error[] = $validator->getError();


            $validator = new ValidatorString($adress);
            $validator
            ->validateString()
            ->validateLength()
            ->validateNoSpecialChar();
            $sign_error[] = $validator->getError();


            $validator = new ValidatoString($phone);
            $validator
            ->validatePhoneNumber(); 
            $sign_error[] = $validator->getError();

            $validator = new ValidatorInt($month, $day, $year);
            $validator
            ->validateInt()
            ->validateDate()
            ->validateAge();
            $sign_error[] = $validator->getError();

            if($sign_error === ""){
                //------------------------------------- prepare les input -------------------  

                if($pwd===$pwd_check){
                    //------------------------------------- push les input ----------------------

                    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
                    $resp = Model\UserRepository::save($lastname, $firstname, $email, $pwd, $birth_date, $adress, $phone);
                }else{
                    echo "Mdp non corresp";
                }        
                
            }else{
                foreach($sign_error as $error){
                    throw new \Exception("error");
                }
                
            }


            
        }else{
            echo "il manque des informations";
        }
    }

}
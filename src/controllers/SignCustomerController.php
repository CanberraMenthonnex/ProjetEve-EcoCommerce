<?php

namespace Controller;

use Core\Model\EntityManager;
use Exception;
use Model\Entity\User;
use Core\ValidatorString;
use Core\ValidatorInt;
use Core\Session;
use Core\Http;



class SignCustomerController extends UserController{

    public function signCustomerPage() {
        $this->render("sign-customer-page.php");
    }
    public function sign(){

        //infos perso

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $pwd_check = $_POST["pwd_check"];
        $phone = $_POST["phone"];

        //aniversaire
        $month = $_POST["month"];
        $day = $_POST["day"];
        $year = $_POST["year"];

        //adresse

        $road = $_POST["road"];
        $road_number = $_POST["road_number"];
        $zip_code = $_POST["zip_code"];
        $city = $_POST["city"];
        $country = $_POST["country"];

        //condition d'utilisation
        $check_guc = $_POST["check_guc"];

        $infos = ["firstname", "lastname", "email", "pwd", "pwd_check", "phone", "month", "day", "year", "road", "road_number", "zip_code", "city", "country", "check_guc"];

        $month = (int)$month;
        $day = (int)$day;
        $year = (int)$year;
    
        if(!$this->checkPostKeys($_POST, $infos)) {
            throw new Exception(BAD_KEYS);
        }
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


        $validator = new ValidatorString($road_number);
        $validator
        ->validateString()
        ->validateLength(1, 10)
        ->validateNoSpecialCharButWithNumber();
        $sign_error[] = $validator->getError();

        $validator = new ValidatorString($road);
        $validator
        ->validateString()
        ->validateLength(5, 50)
        ->validateNoSpecialCharButWithNumber();
        $sign_error[] = $validator->getError();

        $validator = new ValidatorString($zip_code);
        $validator
        ->validateString()
        ->validateLength(2, 10)
        ->validateNoSpecialCharButWithNumber();
        $sign_error[] = $validator->getError();


        $validator = new ValidatorString($city);
        $validator
        ->validateString()
        ->validateLength(2, 100)
        ->validateNoSpecialChar();
        $sign_error[] = $validator->getError();

        
        $validator = new ValidatorString($country);
        $validator
        ->validateString()
        ->validateLength(4, 100)
        ->validateNoSpecialChar();
        $sign_error[] = $validator->getError();

        $validator = new ValidatorString($phone);
        $validator
        ->validatePhoneNumber();   
        $sign_error[] = $validator->getError();


        $validator = new ValidatorInt($month, $day, $year);
        $validator
        ->validateDateInt()
        ->validateDate()            
        ->validateAge();            
        $sign_error[] = $validator->getError();


        if(!$sign_error && $check_guc == "yes"){
                
            if($pwd!==$pwd_check){
                $signError = "Les mots de passes ne sont pas bons ";
                $this->render("sign-customer-page", compact("signError")); 
            }

            $adress = $road_number . " " . $road . " " . $city . " " . $zip_code . " " . $country;
            $birth_date = $_POST['day'] . "/" . $_POST['month'] . "/" . $_POST['year'];
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);

            $em = new EntityManager('User');
            $user = new User();
            $user
            ->setFirstname($firstname)
            ->setLastname($lastname)
            ->setEmail($email)
            ->setPhone($phone)
            ->setPassword($pwd)
            ->setBirth_date($birth_date)
            ->setAdress($adress);

            $answer = $em->save($user);

            if($answer) {
                Session::set($this->SESSION_NAME, $user[0]);
                Http::redirect(CUSTOMER_PROFIL_ROUTE);
            }
            else {  //une erreure serveur
                throw new \Exception(ERROR_SAVING_BDD);
                
            }
                
            
                
        }
            
    }
            
        
}
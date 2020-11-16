<?php

namespace Controller;


use Tools\ValidatorString;
use Tools\ValidatorInt;


class SignCustomerPage extends Controller{

    public static function signCustomerPage() {
        self::render("sign-customer-page.php");
    }
    public static function sign(){

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
        $condition = $_POST["check_guc"];

        $infos = ["firstname", "lastname", "email", "pwd", "pwd_check", "phone", "month", "day", "year", "road", "road_number", "zip_code", "city", "country", "check_guc"];

        $adress = $road_number . " " . $road . " " . $city . " " . $zip_code . " " . $country;

        $month = (int)$month;
        $day = (int)$day;
        $year = (int)$year;
        //echo $adress;

        if(self::checkPostKeys($_POST, $infos)) {
            //------------------------ Validate Input-----------------------------------------
            $validator = new ValidatorString($lastname);
            $validator
            ->validateString()
            ->validateLength(2, 20)
            ->validateNoSpecialChar(); //!
            $sign_error[] = $validator->getError();

            $validator = new ValidatorString($firstname);
            $validator
            ->validateString()
            ->validateLength(2, 20)
            ->validateNoSpecialChar();  //!
            $sign_error[] = $validator->getError();

            $validator = new ValidatorString($email);
            $validator
            ->validateEmail(); // ! 
            $sign_error[] = $validator->getError();

            $validator = new ValidatorString($pwd);
            $validator
            ->validatePwd();
            $sign_error[] = $validator->getError();

            $validator = new ValidatorString($adress);
            $validator
            ->validateString()
            ->validateLength(10, 200)
            ->validateNoSpecialCharButWithNumber();
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

            echo "<pre>";
            var_dump($sign_error);
            var_dump($infos);
            echo "</pre>";
            if(empty($sign_error)){
                //------------------------------------- prepare les input -------------------  

                if($pwd===$pwd_check){
                    //------------------------------------- push les input ----------------------

                    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //$resp = Model\UserRepository::save($lastname, $firstname, $email, $pwd, $birth_date, $adress, $phone);
                }else{
                    echo "Mdp non corresp";
                }        
                
            }else{
                foreach($sign_error as $error){
                    throw new \Exception("error");
                }
                
            }
            
        }else{

            echo "<pre>";
            var_dump($_POST);

           
            echo "/<pre>";
            
           
        }
    }

}




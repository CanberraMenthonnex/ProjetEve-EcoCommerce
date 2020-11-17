<?php

namespace Controller;

use Model;
use Tools\ValidatorString;
use Tools\ValidatorInt;
use Tools\Http;



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
        $check_guc = $_POST["check_guc"];

        $infos = ["firstname", "lastname", "email", "pwd", "pwd_check", "phone", "month", "day", "year", "road", "road_number", "zip_code", "city", "country", "check_guc"];

        $month = (int)$month;
        $day = (int)$day;
        $year = (int)$year;
    
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

            $error = 0;
            foreach ($sign_error as $key) {
                if(!empty($key)){
                    $error++;
                }
            }
            if($error == 0 && $check_guc == "yes"){
                 
                if($pwd===$pwd_check){
                    
                    $adress = $road_number . " " . $road . " " . $city . " " . $zip_code . " " . $country;
                    $birth_date = $_POST['day'] . "/" . $_POST['month'] . "/" . $_POST['year'];
                    $pwd = password_hash($pwd, PASSWORD_DEFAULT);

                    $resp = Model\UserRepository::save($lastname,$firstname,$email,$pwd,$birth_date,$adress,$phone);

                    if($resp) {
                        Http::redirect(HOME_ROUTE);
                    }
                    else {  //une erreure serveur
                        throw new \Exception(ERROR_SAVING_BDD);
                    }

                }else{      //Les deux mots de passes ne corespondents pas 
                    
                }        
                
            }else{//les entrées ne sont pas bonnes 
                foreach($sign_error as $error){
                    if (!empty($error)){
                        //throw new \Exception($error[0]);
                        $that_fuking_error = $error[0];
                        require_once "../views/sign-customer-page.php";
                        
                    }
                    
                }
                
            }
            
        }else{  //il manque des infos
           
        }
    }


    

}




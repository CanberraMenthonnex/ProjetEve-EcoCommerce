<?php

namespace Controller;

use Core\Controller\Controller;
use Core\Model\EntityManager;
use Core\Session;
use Exception;
use Core\ValidatorString;
use Core\ValidatorInt;
use Core\Http;
use Core\Model\Converters\TypeConverter;
use Model\Entity\UserPending;

class SignCustomerController extends Controller{

    private $em; 

    public function __construct() {
        $this->em = new EntityManager("User");
    }

    public function sendMail() {
        $code = rand();
        $msg = "Code de vérification : " . $code;
        mail("nicolas.mopin@gmail.com", "Mail de vérification", $msg);
        $this->render("home", compact("code"));
    }



    public function signCustomerPage() {
        $this->render("client-sign-in", ["signData" => Session::flash("sign-data")]);
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
        ->validateLength(3, 50)
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

        $sign_error = array_values(array_filter($sign_error));

        $userAlreadyExisting =  $this->em->findOne(["email" => $email]);

        if($userAlreadyExisting !== null) {
            $sign_error[] = "Email has already been taken";
        }



        if(!$sign_error && $check_guc == "yes"){
                
            if($pwd!==$pwd_check){
                $signError = "Les mots de passes ne sont pas bons ";
                $this->render("client-sign-in", compact("signError")); 
            }

            $adress = $road_number . " " . $road . " " . $city . " " . $zip_code . " " . $country;
            $birth_date_string = $_POST['year']. "-" . $_POST['month'] . "-" . $_POST['day'] ;
            $birth_date = TypeConverter::convertToDate($birth_date_string);
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            $code = rand();

        

            $em = new EntityManager('UserPending');
            $user_pending = new UserPending();
            $user_pending
            ->setFirstname($firstname)
            ->setLastname($lastname)
            ->setEmail($email)
            ->setPhone($phone)
            ->setPassword($pwd)
            ->setBirth_date($birth_date)
            ->setAdress($adress)
            ->setCode($code);

            $answer = $em->save($user_pending);

            if($answer) {
                $header="MIME-Version: 1.0\r\n";
                $header.='Content-Type:text/html; charset="uft-8"'."\n";
                $header.='Content-Transfer-Encoding: 8bit';
                $msg =
                "
                <body style='border-style:solid;padding-bottom:25px;'>
                    <h1 style='text-align:center;'>Bienvenue chez Projet Eve !</h1> 
                    <h3 style='text-align:center;'>Voici le code pour valider votre inscription :</h3> 
                    <h2 style='text-align:center;background-color:grey;width:200px;padding:5px;color:white;margin:auto;'>$code</h2>           
                </body>
                ";

                mail($user_pending->getEmail(), "Mail de vérification", $msg, $header); 
                
                Http::redirect(CUSTOMER_VERIFY_ROUTE);

            }
            else {  //une erreure serveur
                throw new \Exception(ERROR_SAVING_BDD);
                
            }
            
        } 
        else
        {

            Session::set("sign-data", $_POST);

            $this->redirectWithError(CUSTOMER_POST_SIGN_ROUTE, $sign_error[0][0]);
        }
            
    }


    public function displayVerify() {
        $this->render("client-verify");
    }


    public function verifyCustomer() {

        if(isset($_POST['verify'])) {

            $emailSubmitted = $_POST['email'];
            $codeSubmitted = $_POST['code'];

            $em = new EntityManager("UserPending");
            $result = $em->findOne(["email"=>$emailSubmitted], ["code"]);

            if(!$result) {
                throw new \Exception(VERIFYING_WRONG_EMAIL);
            }

            $realCode = $result->getCode();

            if($codeSubmitted == $realCode) {

                $db = EntityManager::getDatabase();
                $query = $db->prepare("INSERT INTO user (lastname, firstname, email, password, birth_date, adress, phone) SELECT lastname, firstname, email, password, birth_date, adress, phone FROM user_pending WHERE email = :email");
                $query->execute(["email"=>$emailSubmitted]);

                if($query) {
                    $em->delete(["email"=>$emailSubmitted]);

                    Http::redirect(CUSTOMER_POST_LOGIN_ROUTE);
                }
                else {
                    throw new \Exception(\ERROR_DELETE_BDD);
                }

                
            }
            else {
                throw new \Exception(VERIFYING_WRONG_CODE);
            }

        }

    }



    public function resendCode() {

        $newCode = rand();
        $email= $_POST['email'];

        $em = new EntityManager("UserPending");

        $result = $em->findOne(["email"=>$email]);

        if($result) {
            $result
            ->setCode($newCode);

            $resp = $em->update($result, ["email"=>$email]);

            if($resp) {

                $header="MIME-Version: 1.0\r\n";
                $header.='Content-Type:text/html; charset="uft-8"'."\n";
                $header.='Content-Transfer-Encoding: 8bit';
                $msg =
                "
                    <body style='border-style:solid;padding-bottom:25px;'>
                        <h1 style='text-align:center;'>Bienvenue chez Projet Eve !</h1> 
                        <h3 style='text-align:center;'>Voici le nouveau code pour valider votre inscription :</h3> 
                        <h2 style='text-align:center;background-color:grey;width:200px;padding:5px;color:white;margin:auto;'>$newCode</h2>           
                    </body>
                ";

                mail($email, "Mail de vérification", $msg, $header); 
                
                echo "Le code a été renvoyé par mail";

            }
            else {
                throw new \Exception(\ERROR_UPDATE_BDD);
            }
        }
        else {
            echo "Aucune inscription n'a été enregistrée avec cette email";
        }

    }



            
        
}
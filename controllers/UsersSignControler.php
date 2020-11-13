<?php

use Tools\Validators;

class UsersSignController extends UserController{

    private $sign_error = [];


    public static function signUserPage() {
        self::render("sign-page.php");
    }

    public static function sign(){
        $infos = ["lastname", "firstname", "email", "pwd", "birth_date", "adress", "phone"];
        if(self::checkPostKeys($_POST, $infos)) {

            //------------------------ Validate Input-----------------------------------------

            $validator = new Validators($infos["lastname"]);
            $validator
            ->validateString()
            ->validateLength()
            ->validateNoSpecialChar();
            //$sign_error[] = $validator->getError();

            $validator = new Validators($infos["firstname"]);
            $validator
            ->validateString()
            ->validateLength()
            ->validateNoSpecialChar();
            //$sign_error[] = $validator->getError();

            $validator = new Validators($infos["email"]);
            $validator
            ->validateEmail();
            //$sign_error[] = $validator->getError();

            $validator = new Validators($infos["pwd"]);
            $validator
            ->validatePwd();
            //$sign_error[] = $validator->getError();

            // $validator = new Validators($infos["birth_date"]);
            // $validator
            // ->validateString()
            // ->validateLength()
            // ->validateNoSpecialChar();

            // $validator = new Validators($infos["adress"]);
            // $validator
            // ->validateString()
            // ->validateLength()
            // ->validateNoSpecialChar();

            // $validator = new Validators($infos["phone"]);
            // $validator
            // ->validateString()
            // ->validateLength()
            // ->validateNoSpecialChar();   
    

            //------------------------------------- prepare les input -------------------


            //------------------------------------- push les input ----------------------
        }
    }

}
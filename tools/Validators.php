<?php
//faire pleins de validator (o mwin 1 par champs) 
//Adress
//telephone
 
namespace Tools;
//["lastname", "firstname", "email", "pwd", "birth_date", "adress"]

class Validators{


    public static function validateString(string $input): bool{
        return is_string($input);
    }


    public static function validatePhoneNumber(string $input): bool{
        return (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $input));
    }

    public static function validateLength(string $name, int $min, int $max): bool{ 
        return strlen($name) < $max && strlen($name) > $min;
    }

    public static function validateInt(string $name){
        return (preg_match("\W", $name));
    }

    public static function validateNoSpecialChar(string $name ){
        return (!ctype_alpha($name)) || (preg_match('[0-9]', $name));
    }

    public static function validateEmail(string $email): bool{
        if (filter_var($email, FILTER_VALIDATE_IP)){
            return true;
        }
    }

    public static function validatePwd(string $pwd): bool {
        if(preg_match('#[a-z]#', $pwd) && (preg_match('#[A-Z]#', $pwd)) && (preg_match('#[_?/:!$]#' , $pwd)) || (preg_match('#[0-9]#', $pwd))){
            return true;
        }
    }
        
    public static function validateAdult(int $month , int $day , int $year) : bool {
        return checkdate($month , $day , $year);
    }
}            
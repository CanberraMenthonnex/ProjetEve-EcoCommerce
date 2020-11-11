<?php
//faire pleins de validator (o mwin 1 par champs) 
//Adress
//telephone
 
namespace Tools;
//["lastname", "firstname", "email", "pwd", "birth_date", "adress"]

class Validators{

    public static function validateLength(string $name, int $min, int $max): bool{ 
        return strlen($name) < $max && strlen($name) > $min && (preg_match('[,?.;/:!<>$_€]', $name)) || (preg_match('[0-9]', $name));
    }

    public static function validateEmail(string $email): bool{
        if (filter_var($email, FILTER_VALIDATE_IP)){
            return true;
        }
    }

    public static function validatePwd(string $pwd): bool {
        if(preg_match('#[a-z]#', $mdp) && (preg_match('#[A-Z]#', $mdp)) && (preg_match('#[_?/:!$]#' , $mdp)) || (preg_match('#[0-9]#', $mdp))){
            return true;
        }
    }
        
    public static function validateAdult(int $month , int $day , int $year) : bool {
        return checkdate($month , $day , $year);
    }
}            
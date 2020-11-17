<?php

 
namespace Tools;
//["lastname", "firstname", "email", "pwd", "birth_date", "adress"]

class ValidatorString{

    private array $error = [];
    private $input;

    public function __construct($input){
        $this->input = $input;
    }

    /**
     * Get the value of error
     */ 
    public function getError()
    {
        return $this->error;
    }

    public function validateString(){
        if(!is_string($this->input)){
            $this->error[]= "L'inserstion n'est pas une chaine de caractère";
        }
        return $this;
    }

    public function validatePhoneNumber(){
        if(!preg_match("#^0[1-9]([-. ]?[0-9]{2}){4}$#", $this->input)){
            $this->error[]= "Numéro de téléphone incorrecte";
        } 
        return $this;      
    }

    public function validateLength(int $min, int $max){ 
        if(!(strlen($this->input) <= $max && strlen($this->input) >= $min)){
            $this->error[]= "Entrée incorrecte";
        }
        return $this;
    }

    public function validateInt(){
        if (!preg_match("\W", $this->input)){
            $this->error[]= "La saisie ne pas doit comporter de nombre";
        }
        return $this;
    }

    public function validateNoSpecialChar(){
        if(!ctype_alpha(str_replace([' ','-'], '', $this->input))){  
            $this->error[]= "Les caractères spéciaux ne sont pas autorisés"; 
        }
        return $this;
    }

    public function validateNoSpecialCharButWithNumber(){
        if(!ctype_alnum(str_replace([' ','-'], '', $this->input))){  
            $this->error[]= "Les caractères spéciaux ne sont pas autorisés"; 
        }
        return $this;
    }

 
    public function validateEmail(){
        if (!filter_var($this->input, FILTER_VALIDATE_EMAIL)){
            $this->error[]= "L'email renseigné n'a pas le bon format";
        }
        return $this;
    }

    public function validatePwd(){
        if(!(preg_match('#[a-z]#', $this->input) && (preg_match('#[A-Z]#', $this->input)) && (preg_match('#[_?/:!$]#' , $this->input)) || (preg_match('#[0-9]#', $this->input)))){
            $this->error[]= "Votre mot de passe est incorrect";
        }
        return $this;
    }
}
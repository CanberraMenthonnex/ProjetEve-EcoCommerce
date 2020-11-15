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

    public function validateString(): bool{
        if(!is_string($this->input)){
            $this->error[]= "L'inserstion n'est pas une chaine de caractère";
        }
        return $this;
    }


    public function validatePhoneNumber(): bool{
        if(!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $this->input)){
            $this->error[]= "Numéro de téléphone incorrecte";
        } 
        return $this;      
    }

    public function validateLength(int $min, int $max): bool{ 
        if(!(strlen($this->input) <= $max && strlen($this->input) >= $min)){
            $this->error[]= "Nom ou prénom pas de la bonne taille";
        }
        return $this;
    }

    public function validateInt(){
        if (!preg_match("\W", $this->input)){
            $this->error[]= "La saisie ne pas doit comporter de nombre";
        }
        return $this;
    }

    public function validateNoSpecialChar(): string{
        if((ctype_alpha($this->input)) || (!preg_match('[0-9]', $this->input))){  
            $this->error[]= "Les caractères spéciaux ne sont pas autorisés";
        }
        return $this;
    }

    public function validateEmail(): bool{
        if (!filter_var($this->input, FILTER_VALIDATE_IP)){
            $this->error[]= "L'email renseigné n'a pas le bon format";
        }
        return $this;
    }

    public function validatePwd(): bool{
        if(!(preg_match('#[a-z]#', $this->input) && (preg_match('#[A-Z]#', $this->input)) && (preg_match('#[_?/:!$]#' , $this->input)) || (preg_match('#[0-9]#', $this->input)))){
            $this->error[]= "Votre mot de passe est incorrect";
        }
        return $this;
    }
}            
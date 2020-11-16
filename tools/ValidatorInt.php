<?php

 
namespace Tools;


class ValidatorInt{

    private array $error = [];

    private $day;
    private $month;
    private $year;

    public function __construct($day, $month, $year){
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    /**
     * Get the value of error
     */ 
    public function getError()
    {
        return $this->error;
    }


    public static function validateInt($int){
        return(is_int($int));
    }

    public function validateDateInt(){
        if(!(is_string($this->day) && is_string($this->month) && is_string($this->year))){
            $this->error[]= "Veuillez entrer des nombres";
        }
        return $this;
    }
    


    public function validateDate(){
        if(!checkdate($this->month, $this->day , $this->year)){
            $this->error[]= "La date renseignée est incorrecte";
        }
        return $this;
    }


    public function validateAge(){
        if($this->year+10 >= date('Y')){
            $this->error[]= "Tu dois être plus agé our effectuer des achats";
        }
        return $this;
    }


}            
<?php

 
namespace Tools;


class ValidatorInt{

    private array $error = [];

    private $day;
    private $month;
    private $year;

    public function __construct($month, $day, $year){
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
        if(!(is_int($this->day) && is_int($this->month) && is_int($this->year))){
            $this->error[]= "Veuillez entrer une date";
        }
        return $this;
    }
    

    public function validateDate(){
        if(checkdate($this->month, $this->day , $this->year)){
        }else{
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
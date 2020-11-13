<?php

namespace Model\Entity;

    
abstract class EntityBase {

    const DATE_FORMAT = "Y-m-d H:i:s";
    

    protected function createDate($date)
    {
        if(!$date) return new \DateTime();

        if(gettype($date) === "string") {
            $formatedDate = \DateTime::createFromFormat(self::DATE_FORMAT, $date);
            return $formatedDate; 
        } 
        
        if(get_class($date) === "DateTime") {
            return $date;
        }

        return null;

        
    }
}
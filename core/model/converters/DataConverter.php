<?php

namespace Core\Model\Converters;

class DataConverter {

    /**
     * For managing data conversion (according its type)
     * 
     * @param string $type 
     * @param $values
     * 
     * @return $value
     */
    public static function convertToType($type, $value) {
        switch($type) {

            case "DateTime" : 
                return TypeConverter::convertToDate($value);
            
            case "string" :
                
                if(gettype($value) === "object") 
                {
                    $class = get_class($value);

                    if($class === "DateTime") return TypeConverter::stringifyDate($value);

                } 
                else
                {
                    return strval($value);
                }
            
            default : 
                return $value;
        }
        
    }

}
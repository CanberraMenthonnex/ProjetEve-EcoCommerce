<?php 

namespace Core;

use ReflectionClass;
use ReflectionProperty;

class DataMapper {

     /**
     * For mapping an object (with getters) to  array of sql params
     * 
     * @param array $properties
     * @param IEntity $entity
     * 
     * return array
     */
    public static function MapToSqlParams($object) : array {

        $reflect = new ReflectionClass($object);

        $reflectedProperties = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);

        $properties = array_map(function ($reflectedProp) {

            return $reflectedProp->name;

        }, $reflectedProperties);


        $values = [];

        foreach($properties as $property) {

            $columnValue = call_user_func([$object, "get". ucfirst($property)]);
            
            if(gettype($columnValue) === "object") {
                $columnValue = get_class($columnValue) === "DateTime" ?  TypeConverter::stringifyDate($columnValue) : $columnValue;
            }

            $values[] = $columnValue;
        }

        return ["properties"=>$properties,"values" =>$values];
    }

    /**
     * For mapping data results in Entities (SQL result to Entity Object)
     * 
     * @param array $propertiesWithValues ["property"=>"value"]
     * @param Class $entityClass (with setters)
     * 
     * return array 
     */
    public static function MapToObject ($propertiesWithValues, $entityClass) {
       
            $newEntity = new $entityClass;

            foreach($propertiesWithValues as $property=>$value ) {
                call_user_func([$newEntity, "set" . ucfirst($property)], $value);
            }
            
            return $newEntity;
    }

}
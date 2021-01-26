<?php 

namespace Core\Model\Converters;

use Core\Model\Annotations\AnnotationManager;
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

        foreach($properties as $k=>$property) {

            $metaIndex = AnnotationManager::getMetaData($object, $property, "@index", "index");

            if(!$metaIndex) {

                $columnValue = call_user_func([$object, "get". ucfirst($property)]);
                
                $columnValue = DataConverter::convertToType("string", $columnValue);

                $values[] = $columnValue;   
            } else {
                unset($properties[$k]);
            }
            
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

                $metaType = AnnotationManager::getMetaData($newEntity, $property, "@type", "type");
               
                $value = DataConverter::convertToType($metaType, $value);

                call_user_func([$newEntity, "set" . ucfirst($property)], $value);
            }
            
            return $newEntity;
    }

}
<?php

namespace Model\Entity;

use ReflectionClass;
use ReflectionProperty;

abstract class EntityBase implements IEntity {

    const DATE_FORMAT = "Y-m-d H:i:s";
    

    public function getDefinableProperties(): array
    {
        $reflect = new ReflectionClass($this);

        $properties = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
      
        $formatedProperties = array_map(function ($item) {
            return $item->name;
        }, $properties);

        $formatedProperties = array_filter($formatedProperties, function ($property) {
            return $property !== "id";
        });

        return $formatedProperties;
    }

    protected function createDate($date)
    {   
        
        if(get_class($date) === "DateTime") {
            return $date;
        }

        $formatedDate = \DateTime::createFromFormat(self::DATE_FORMAT, $date);
        return $formatedDate;
    }
}
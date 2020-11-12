<?php

namespace Model\Repository;

use Model\Entity\IEntity;
use Model\Model as ModelBase;
use Tools\TypeConverter;

class Repository extends ModelBase {

    private string $_entity;
    private string $_table;

    public function __construct(string $entity)
    {
        $this->_entity = "Model\Entity\\" . $entity;
        $this->_table = strtolower( $entity );
    }

    /**
     * For finding data according parameters
     * 
     * 
     * @param $filters : array ["key" => "value"]
     * @param $wantedValue : array ["wantedValue"]
     * @param $limit : array ["start-number", "offset-number"]
     * @param $order : array ["by"=>key, "desc" => boolean]
     * 
     * return array<Entity>
     */
    public function find (array $filters, array $wantedValues = ["*"], array $limit = [], array $order = []) : array {

        $res = $this->_find($this->_table, $filters, $wantedValues, $limit, $order);

        $mapping = $this->mapToObject($res);

        return $mapping;
    }

    public function save( IEntity $entity ) {

        $properties = $entity->getDefinableProperties();
        $values = $this->mapToArray($properties, $entity);
        var_dump($values);
        return $this->_save($this->_table,$properties, $values);
    }

    /**
     * For mapping data results in Entities
     * 
     * @param array $results
     * 
     * return array 
     */
    private function mapToObject (array $results) {
        return array_map(function ($properties) {

            $newEntity = new $this->_entity;

            foreach($properties as $property=>$value ) {
                call_user_func([$newEntity, "set" . ucfirst($property)], $value);
            }
            
            return $newEntity;

        }, $results);
    }

    /**
     * For mapping data in array 
     */
    private function mapToArray (array $properties, IEntity $entity) {

        $values = [];

        foreach($properties as $property) {

            $columnValue = call_user_func([$entity, "get". ucfirst($property)]);
            
            if(gettype($columnValue) === "object") {
                $columnValue = get_class($columnValue) === "DateTime" ?  TypeConverter::stringifyDate($columnValue) : $columnValue;
            }

            $values[] = $columnValue;
        }

        return $values;
    }

 
}
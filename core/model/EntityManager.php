<?php

namespace Core\Model;

use Core\Model\Converters\DataMapper;

class EntityManager extends Model {

    private string $_entity;
    private string $_table;

    public function __construct(string $entity)
    {
        parent::__construct();
        $this->_entity = "Model\\Entity\\" . $entity;
        $this->_table = strtolower( $entity );
    }

    /**
     * For finding data according parameters
     *
     *
     * @param array $filters : array ["key" => "value"]
     * @param array $wantedValues
     * @param array $limit : array ["start-number", "offset-number"]
     * @param array $order : array ["by"=>key, "desc" => boolean]
     *
     *
     * @return array (Entity)
     */
    public function find (array $filters = [], array $wantedValues = ["*"], array $limit = [], array $order = []) : array {
        
        $res = $this->_find($this->_table, $filters, $wantedValues, $limit, $order);
        $mapping = array_map(function ($properties) {
            return DataMapper::MapToObject($properties, $this->_entity);
        }, $res);

        return $mapping;
    }

    /**
     * For finding data according parameters
     *
     *
     * @param array $filters : array ["key" => "value"]
     * @param array $wantedValues
     *
     *
     * @return Entity
     */
    public function findOne (array $filters = [], array $wantedValues = ["*"]) {
        $res = $this->_find($this->_table, $filters, $wantedValues, [0,1]);
        if($res) {
            return DataMapper::MapToObject($res[0], $this->_entity);
        } 
        return null;
        
    }

    /**
     * For saving data from entity in DB
     * 
     * @param $entity
     * 
     * @return bool
     */
    public function save( Object $entity ) : bool {

        $requirements = DataMapper::MapToSqlParams($entity);

        return $this->_save($this->_table, $requirements["properties"], $requirements["values"]);
    }

    /**
     * For deleting from DB
     *
     * @param $filters
     *
     * @return bool
     **/
    public function delete(array $filters) : bool {
        return $this->_delete( $this->_table, $filters );
    }

    /**
     * For updating data from entity in database
     *
     * @param Object $entity
     * @param array $filters
     *
     * @return int (number of modified rows)
     * */
    public function update ( Object $entity ) : int {
        $data = DataMapper::MapToSqlParams($entity);
        $formatedData = array_combine($data["properties"], $data["values"]);
        return $this->_update($this->_table, $formatedData, ["id"=>$entity->getId()]);
    }
 
}
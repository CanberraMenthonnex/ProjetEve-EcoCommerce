<?php

namespace Core\Model;

abstract class Model {

    private $_db;


    public function __construct()
    {
        $this->_db = self::getDatabase();
    }


    public static function getDatabase()
    {
        return new \PDO(
            'mysql:host='. DB_HOST . ';dbname=' . DB_NAME , DB_USERNAME , DB_PASSWORD,
            array(\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_WARNING,\PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_OBJ , \PDO::ATTR_EMULATE_PREPARES=> false)
        );
    }

    /**
     * For getting element from db table
     *
     * @param $table : string
     * @param $filters : array ["key" => "value"]
     * @param $wantedValue : array ["wantedValue"]
     * @param $limit : array ["start-number", "offset-number"]
     * @param $order : array ["by"=>key, "desc" => boolean]
     *
     * return array
     * */
    protected function _find(string $table, array $filters = [], array $wantedValue = ["*"], array $limit = [], array $order = [], bool $isRegex = false) : array {
       $vars = [];

       $query = QueryBuilder::select($wantedValue, $table);

        if($filters) {

            $query .= " " . QueryBuilder::filters(array_keys($filters),$isRegex);
            $vars = array_values($filters);
        }

        if($limit) {
            $query .= " " .  QueryBuilder::limit();
            $vars= array_merge($vars, $limit);
        }

        if($order) {
             $query =" " .  QueryBuilder::order($order["by"], $order["desc"] );
        }
 
        $req = $this->_db->prepare($query);
        $req->execute($vars);

        return $req->fetchall();

    }

    /**
     * For saving elements in db table
     *
     * @param string $table (table name)
     * @param array $values (values to insert)
     *
     * return boolean
     * */
    protected function _save(string $table, array $keys, array $values) : bool {
        
        $sql = QueryBuilder::insert($table,$keys,[$values]);

        $req = $this->_db->prepare($sql);

        return $req->execute($values);

    }

    /**
     * For removing element(s) from db table
     *
     * @param string $table
     * @param array $filters ["KEY"=>"value"]
     *
     * return boolean
     * */
    protected function _delete(string $table, array $filters) {

        $keyFilters = array_keys($filters);

        $sql = QueryBuilder::delete($table, $keyFilters);

        $req = $this->_db->prepare($sql);

        $req->execute(array_values($filters));

        return $req->rowCount() > 0;

    }

     /**
     * For updating element(s) from db table
     * 
     * @param string $table
     * @param array $data
     * @param array $filters
     * 
     * return int (number of updated rows)
     */
    protected function _update (string $table, array $data, array $filters) : int {

        $dataKeys = array_keys($data);
        $filterKey = array_keys($filters);

        $query = QueryBuilder::update($table, $dataKeys);

        if($filters) {
            $query .= " " . QueryBuilder::filters($filterKey);
        }
    
        $preparedArray = array_merge(array_values($data), array_values( $filters ));
        $req = $this->_db->prepare($query);
        $req->execute($preparedArray);

        return $req->rowCount();
    }

}
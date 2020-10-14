<?php

namespace Model;

abstract class Model {

    /*
     * For connecting to database
     *
     * return PDO
     * */
    private static function getDb() : \PDO{
        return new \PDO(
            'mysql:host='. DB_HOST . ';dbname=' . DB_NAME , DB_USERNAME , DB_PASSWORD,
            array(\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_WARNING,\PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_OBJ)
        );
    }

    /*
     * For getting element from db table
     *
     * @param $table : string
     * @param $filters : array ["key" => "value"]
     * @param $wantedValue : array ["wantedValue"]
     * @param $limit : array ["start-number", "offset-number"]
     *
     * return array
     * */
    protected static function _find(string $table, array $filters, array $wantedValue = ["*"], array $limit = []) : array {
       $db = self::getDb();

        $wanted = array_reduce($wantedValue, function ( $accumulator, $item) {
            return $accumulator .=  $item . ", ";

        });

        $wanted = trim($wanted, ", ");

        $sqlFilters = "";

        if($filters) {

            foreach ($filters as $key => $filter) {
                $sqlFilters .= $key . " = " . "?" . "AND ";
            }

            $sqlFilters = trim($sqlFilters, "AND ");
            $sqlFilters = " WHERE " . $sqlFilters;

        }

        $sqlLimit = $limit ? " LIMIT " . $limit[0] . ", " . $limit[1] : "";

        $sql = "SELECT {$wanted} FROM {$table} {$sqlFilters} {$sqlLimit}";
        $req = $db->prepare($sql);
        $req->execute(array_values($filters));

        return $req->fetchall();

    }

    /*
     * For saving elements in db table
     *
     * @param string $table (table name)
     * @param array $values (values to insert)
     *
     * return boolean
     * */
    protected static function _save(string $table, array $keys, array $values) : bool {
        $db = self::getDb();


        $keyValues = implode(", ", $keys);

        $preparedValues = array_reduce($values, function ( $accumulator, $value) {
            return $accumulator .= "?, ";
        });
        $preparedValues = trim($preparedValues, ", ");

        $sql = "INSERT INTO {$table} ({$keyValues}) VALUES ( {$preparedValues} )";

        $req = $db->prepare($sql);

        return $req->execute($values);

    }

    /*
     * For removing element(s) from db table
     *
     * @param string $table
     * @param array $filters ["KEY"=>"value"]
     *
     * return boolean
     * */
    public static function _delete(string $table, array $filters) {
        $db = self::getDb();

        $keyFilters = array_keys($filters);

        $keyFilters = array_map(function ($val){
            return $val . "= ?";
        }, $keyFilters);

        $sqlFilters = implode(" AND ", $keyFilters);

        $sql = "DELETE FROM {$table} WHERE {$sqlFilters}";

        $req = $db->prepare($sql);

        $req->execute(array_values($filters));

        return $req->rowCount() > 0;

    }

    public static function _update (string $table, array $data, array $filters) {

    }

}
<?php

namespace Model;

abstract class Model {

    public function __construct()
    {
        $this->dbconnect();
    }

    /*
     * For connecting to database
     *
     * return PDO
     * */
    private static function dbconnect() : \PDO{
        return new \PDO(
            'mysql:host='. DB_HOST . ';dbname=' . DB_NAME , DB_USERNAME , DB_PASSWORD,
            array(\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_WARNING)
        );
    }

    /*
     * For getting element from db
     *
     * @param $table : string
     * @param $filters : array ["key" => "value"]
     * @param $wantedValue : array ["wantedValue"]
     * @param $limit : array ["start-number", "offset-number"]
     *
     * return array
     * */
    public static function _find(string $table, array $filters, array $wantedValue = ["*"], array $limit = []) : array {
       $db = self::dbconnect();

        $wanted = array_reduce($wantedValue, function ( $accumulator, $item) {
            return $accumulator .=  $item . ", ";

        });

        $wanted = trim($wanted, ", ");

        $sqlFilters = "";

        foreach ($filters as $key => $filter) {
            $sqlFilters .= $key . " = " . "?" . ", ";
        }

        $sqlFilters = trim($sqlFilters, ", ");

        $sqlLimit = $limit ? " LIMIT " . $limit[0] . ", " . $limit[1] : "";

        $sql = "SELECT " . $wanted . " FROM " . $table . " WHERE " . $sqlFilters . $sqlLimit;

        echo $sql;
       $req = $db->prepare($sql);
       $req->execute(array_values($filters));

        return $req->fetchall();

    }

    protected function save() {

    }
}
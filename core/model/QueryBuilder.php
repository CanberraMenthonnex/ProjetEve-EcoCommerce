<?php 

namespace Core\Model;

class QueryBuilder {

    /**
     * For generating selection query
     * 
     * @param array $wantedValues                
     * 
     * @return string
     */
    public static function select (array $wantedValues, string $table) : string {
        return "SELECT " .implode(", ", $wantedValues) . " FROM " . $table ;
    }

    /**
     * For generating insertion query (with multiple insertion)
     * 
     * @param string $table
     * @param array $groupOfValues [0 => [...first group of values], 1 => [...second group of values]]
     * 
     * @return string
     */
    public static function insert(string $table, array $keys, array $groupOfValues) {
        $qGroups = array_map(function ($values) {
            return self::insertValues($values);
        }, $groupOfValues);

        return "INSERT INTO " . $table . "(" . implode(", ", $keys) . ") VALUES ". implode(", ", $qGroups);
    }

    /**
     * For generating deletion query
     * 
     * @param string $table
     * @param array $filters (only keys)
     * 
     * @return string
     */
    public static function delete (string $table, array $filters) {
        return "DELETE FROM " . $table . " " . self::filters($filters);
    }

    /**
     * For generating update query 
     * 
     * @param string $table 
     * @param array $columnsToUpdate
     * 
     * @return string
     */
    public static function update (string $table, array $columnsToUpdate) {
        $qColumns = array_map(function($columun) {
            return $columun ." = ?";
        }, $columnsToUpdate);
        return "UPDATE $table SET " . implode(", ", $qColumns); 
    }

    /**
     * For generating inserted values of query 
     * 
     * @param array $keys
     * 
     * @return string
     */
    public static function insertValues (array $values) {
        $vals = array_map(function ($k) {
            return "?";
        }, $values);

        return "(" . implode(", ", $vals) . ")";
    }

    /**
     * For generating filters in query
     * 
     * @param array $filters (only keys)
     * 
     * @return string
     */
    public static function filters(array $filters, bool $isRegex = false) : string {
        $filtersQ = array_reduce ($filters, function($acc, $filter) use ($isRegex) {
            return $acc .= $filter . ($isRegex ? " LIKE " : " = ") . "?" . " AND ";
        });
        $filtersQ = trim($filtersQ, "AND ");
        return "WHERE " . $filtersQ;
    }

    /**
     * For generating limit in query
     * 
     * 
     * @return string
     */
    public static function limit () : string {
        return "LIMIT ?, ? ";
    }

    /**
     * For generating order in query
     * 
     * @param string $orderBy
     * @param bool $orderDesc
     * 
     * @return string
     */
    public static function order(string $orderBy, bool $orderDesc = false) : string {
        return "ORDER BY $orderBy" . ($orderDesc || "");
    }

}
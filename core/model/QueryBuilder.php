<?php 

namespace Core\Model;

class QueryBuilder {

    /**
     * For generating wanted values in query
     * 
     * @param array $wantedValues
     * 
     * @return string
     */
    public static function select (array $wantedValues, string $table) : string {
        return "SELECT " .implode(", ", $wantedValues) . " FROM " . $table ;
    }

    /**
     * For generating filters in query
     * 
     * @param array $filters (keys)
     * 
     * @return string
     */
    public static function filters(array $filters, bool $isRegex = false) : string {
        $filtersQ = array_reduce ($filters, function($acc, $filter) use ($isRegex) {
            return $acc .= $filter . ($isRegex ? " LIKE " : " = ") . "?" . "AND ";
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
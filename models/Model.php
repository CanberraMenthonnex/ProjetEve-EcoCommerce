<?php

namespace Model;

abstract class Model {

    protected $db;

    public function __construct()
    {
        $this->dbconnect();
    }

    /*
     * For connecting to database
     * */
    private function dbconnect(){
        $this->db = new PDO(
            'mysql:host='. DB_HOST . ';dbname=' . DB_NAME . ', ' . DB_USERNAME . ', ' . DB_PASSWORD,
            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING)
        );
    }
}
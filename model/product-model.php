<?php

function dbconnect(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=back_office', 'root', 'root', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
        return $db;
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}


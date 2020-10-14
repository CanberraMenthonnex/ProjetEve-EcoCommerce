<?php

function dbconnect(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=back_office', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
        return $db;
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

function addProduct($productData) {

    $db = dbconnect();

    $query = $db->prepare(
        "INSERT INTO product (name, description, price) VALUES (:prdtName, :prdtDesc, :prdtPrice)"
    );

    return $query->execute($productData);
}

?>
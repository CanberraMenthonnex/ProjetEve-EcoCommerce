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
        "INSERT INTO product (name, description, price, product_reference) VALUES (:prdtName, :prdtDesc, :prdtPrice, :prdtRef)"
    );

    $query->execute($productData);
}

function productList() {

    $db = dbconnect();

    $requete = $db->prepare(
        "SELECT * FROM product ORDER BY date DESC"
    );

    $requete->execute();

    return $requete->fetchAll(PDO::FETCH_ASSOC);
    
}

?>
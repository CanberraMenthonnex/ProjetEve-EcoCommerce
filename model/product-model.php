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

function addProduct() {

    $db = dbconnect();

    $prdtInfo = [
        "prdtName" => $_POST["name"],
        "prdtDesc" => $_POST["description"],
        "prdtPrice" => $_POST["price"],
        "prdtRef" => $_POST["product_reference"],
    ];

    $query = $db->prepare(
        "INSERT INTO product (name, description, price, product_reference) VALUES (:prdtName, :prdtDesc, :prdtPrice, :prdtRef)"
    );

    $query->execute($prdtInfo);
}


?>
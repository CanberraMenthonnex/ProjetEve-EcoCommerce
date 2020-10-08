<?php
require('../models/product-model.php');

function createProductPage() {
    require('../views/create-product.php');
}

function createProduct() {

    //$isOk = checkPostKeys(["name", "description", "price", "product_reference"], $_POST); --> vérifier les clés du POST
    if(isset($_POST["create-product"])) {
        //vérifier les types et le contenu
        $prdtInfo = [
            "prdtName" => $_POST["name"],
            "prdtDesc" => $_POST["description"],
            "prdtPrice" => $_POST["price"],
            "prdtRef" => $_POST["product_reference"],
        ];

        addProduct($prdtInfo);
        //Afficher une view
    }
}


// createProductPage();             /*Pour tester, enlever les commentaires des fonctions*/
// createProduct();

?>